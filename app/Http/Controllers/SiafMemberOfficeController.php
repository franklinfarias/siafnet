<?php

namespace App\Http\Controllers;

use App\Model\SiafMemberOffice;
use App\Model\SiafOffice;
use App\Model\SiafMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SiafMemberOfficeController extends Controller
{
    public function index(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $memberOffices = SiafMemberOffice::all();
        return view('memberOffice.list', compact('memberOffices'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $memberOffice = new SiafMemberOffice();
        $members = SiafMemberOffice::lookupTable(SiafMember::with('customer')->get(),'id_member', 'customer->full_name');
        $offices = SiafMemberOffice::lookupTable(SiafOffice::all(),'id_office', 'name');
        $indTpMemberOffice = SiafMember::lookupDomain('ind_tp_member_office');
        $indStMemberOffice = SiafMember::lookupDomain('ind_st_ativo_inativo');
        return view('memberOffice.create', compact('memberOffice','members', 'offices', 'indTpMemberOffice', 'indStMemberOffice'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $memberOffice = SiafMemberOffice::find($id);
        $members = SiafMemberOffice::lookupTable(SiafMember::with('customer')->get(),'id_member', 'full_name');
        $offices = SiafMemberOffice::lookupTable(SiafOffice::all(),'id_office', 'name');
        $indTpMemberOffice = SiafMember::lookupDomain('ind_tp_member_office');
        $indStMemberOffice = SiafMember::lookupDomain('ind_st_ativo_inativo');
        return view('memberOffice.edit', compact('memberOffice','members', 'offices', 'indTpMemberOffice', 'indStMemberOffice'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $dataForm = $request->all();

        if (array_key_exists('id_member_office', $dataForm) && (!empty($dataForm['id_member_office'])))
            $obj = SiafMemberOffice::find($dataForm['id_member_office']);
        else
            $obj = new SiafMemberOffice;

        $obj->id_member = $dataForm['id_member'];
        $obj->id_office = $dataForm['id_office'];
        $obj->dt_initial = $dataForm['dt_initial'];
        $obj->dt_finish = $dataForm['dt_finish'];
        $obj->observation = $dataForm['observation'];
        $obj->ind_tp_member_office = $dataForm['ind_tp_member_office'];
        $obj->ind_st_member_office = $dataForm['ind_st_member_office'];

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $obj->rules());

        $result = $obj->save();

        if ($result)
            return redirect('memberOffice/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafMemberOffice::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('memberOffice.list')]);
    }

}
