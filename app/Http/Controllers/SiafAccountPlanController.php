<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafAccountPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafAccountPlanController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $accountPlans = SiafAccountPlan::all();
        return view('accountPlan.list', compact('accountPlans'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $accountPlan = new SiafAccountPlan();
        $clients = SiafAccountPlan::lookupTable(FksClient::all(),'id_client','name');
        $accountPlans = SiafAccountPlan::lookupTable(SiafAccountPlan::all(),'id_account_plan','name');
        $indFncAccountPlan = SiafAccountPlan::lookupDomain('ind_fnc_account_plan');
        $indTpAccountPlan = SiafAccountPlan::lookupDomain('ind_tp_account_plan');
        $indStAccountPlan = SiafAccountPlan::lookupDomain('ind_st_ativo_inativo');
        return view('accountPlan.create', compact('accountPlan','clients', 'accountPlans',
            'indFncAccountPlan', 'indTpAccountPlan', 'indStAccountPlan'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $accountPlan = SiafAccountPlan::find($id);
        $clients = SiafAccountPlan::lookupTable(FksClient::all(),'id_client','name');
        $accountPlans = SiafAccountPlan::lookupTable(SiafAccountPlan::all(),'id_account_plan','name');
        $indFncAccountPlan = SiafAccountPlan::lookupDomain('ind_fnc_account_plan');
        $indTpAccountPlan = SiafAccountPlan::lookupDomain('ind_tp_office');
        $indStAccountPlan = SiafAccountPlan::lookupDomain('ind_st_ativo_inativo');
        return view('accountPlan.edit', compact('accountPlan','clients', 'accountPlans',
            'indFncAccountPlan', 'indTpAccountPlan', 'indStAccountPlan'));
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

        if (array_key_exists('id_account_plan', $dataForm) && (!empty($dataForm['id_account_plan'])))
            $obj = SiafAccountPlan::find($dataForm['id_account_plan']);
        else
            $obj = new SiafAccountPlan;

        $obj->id_client = $idClient;
        $obj->id_sub_account_plan = $dataForm['id_sub_account_plan'];
        $obj->code = $dataForm['code'];
        $obj->name = $dataForm['name'];
        $obj->ind_fnc_account_plan = $dataForm['ind_fnc_account_plan'];
        $obj->ind_tp_account_plan = $dataForm['ind_tp_account_plan'];
        $obj->ind_st_account_plan = $dataForm['ind_st_account_plan'];

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
            return redirect('accountPlan/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafAccountPlan::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('accountPlan.list')]);
    }
}
