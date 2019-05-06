<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafBudgetController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $budgets = SiafBudget::all();
        return view('budget.list', compact('budgets'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $budget = new SiafBudget();
        $clients = SiafBudget::lookupTable(FksClient::all(),'id_client','name');
        $indTpBudget = SiafBudget::lookupDomain('ind_tp_budget');
        $indStBudget = SiafBudget::lookupDomain('ind_st_ativo_inativo');
        return view('budget.create', compact('budget','clients', 'indTpBudget', 'indStBudget'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $budget = SiafBudget::find($id);
        $clients = SiafBudget::lookupTable(FksClient::all(),'id_client','name');
        $indTpBudget = SiafBudget::lookupDomain('ind_tp_office');
        $indStBudget = SiafBudget::lookupDomain('ind_st_ativo_inativo');
        return view('budget.edit', compact('budget','clients', 'indTpBudget', 'indStBudget'));
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

        if (array_key_exists('id_budget', $dataForm) && (!empty($dataForm['id_budget'])))
            $obj = SiafBudget::find($dataForm['id_budget']);
        else
            $obj = new SiafBudget;

        $obj->id_client = $idClient;
        $obj->code = $dataForm['code'];
        $obj->name = $dataForm['name'];
        $obj->year_month_ref = $dataForm['year_month_ref'];
        $obj->ind_tp_budget = $dataForm['ind_tp_budget'];
        $obj->ind_st_budget = $dataForm['ind_st_budget'];

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
            return redirect('budget/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafBudget::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('budget.list')]);
    }
}
