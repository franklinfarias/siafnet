<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafCustomer;
use App\Model\SiafMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SiafMemberController extends Controller
{
    public function index(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        if (!empty($request->id)){
            $customer = SiafMember::lookupTable(SiafCustomer::where('id_customer', $request->id)->get(),
                'id_customer', 'full_name', false);
            $members = SiafMember::where('id_customer',$request->id)->get();
        } else {
            $customer = [__('messages.siaf_member-search_a_customer')];
            $members = null;
        }

        return view('member.list', compact('customer','members'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $member = new SiafMember();
        $clients = SiafMember::lookupTable(FksClient::all(),'id_client','name');
        $customers = SiafMember::lookupTable(SiafCustomer::all(),'id_customer','full_name');
        $indTpMember = SiafMember::lookupDomain('ind_tp_member');
        $indStMember = SiafMember::lookupDomain('ind_st_ativo_inativo');
        return view('member.create', compact('member','clients', 'customers', 'indTpMember', 'indStMember'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $member = SiafMember::find($id);
        $clients = SiafMember::lookupTable(FksClient::all(),'id_client','name');
        $customers = SiafMember::lookupTable(SiafCustomer::all(),'id_customer','full_name');
        $indTpMember = SiafMember::lookupDomain('ind_tp_member');
        $indStMember = SiafMember::lookupDomain('ind_st_ativo_inativo');
        return view('member.edit', compact('member','clients', 'customers', 'indTpMember', 'indStMember'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $dataForm = $request->all();

        if (!empty($dataForm['id_client']) && ($dataForm['id_client'] <= 0))
            $idClient = Auth::user()->id_client;
        else
            $idClient = $dataForm['id_client'];

        if (array_key_exists('id_member', $dataForm) && (!empty($dataForm['id_member'])))
            $obj = SiafMember::find($dataForm['id_member']);
        else
            $obj = new SiafMember;

        $obj->id_client = $idClient;
        $obj->id_customer = $dataForm['id_customer'];
        $obj->code_registry = '-';
        $obj->dt_initial = $dataForm['dt_initial'];
        $obj->dt_finish = $dataForm['dt_finish'];
        $obj->observation = $dataForm['observation'];
        $obj->ind_tp_member = $dataForm['ind_tp_member'];
        $obj->ind_st_member = $dataForm['ind_st_member'];

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $obj->rules());

        $result = $obj->save();

        // after set values, get code registry
        $obj->code_registry = $obj->codeRegistry();
        $obj->save();

        if ($result)
            return redirect("member/list?id=$obj->id_customer");
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafMember::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('member.list')]);
    }

    public function searchCustomer(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $customers = DB::table('siaf_customer')
            ->select('*')
            ->where('full_name', 'like', $request->full_name . '%')
            ->get();

        return response()->json([ 'success' => 'The success executed.',
            'data' => json_encode($customers)]);
    }

    public function searchHistory(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $history = SiafMember::find($request->id);

        return response()->json([ 'success' => 'The success executed.',
            'data' => json_encode($history)]);
    }
}
