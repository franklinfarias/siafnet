<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafAccountPlan;
use App\Model\SiafBudget;
use App\Model\SiafBudgetItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafBudgetItemController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $budgetItems = SiafBudgetItem::all();
        return view('budgetItem.list', compact('budgetItems'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $budgetItem = new SiafBudgetItem();
        $clients = SiafBudgetItem::lookupTable(FksClient::all(),'id_client','name');
        $budgets = SiafBudgetItem::lookupTableArray(SiafBudget::all(), 'id_budget', ['code','name']);
        $accountPlans = SiafBudgetItem::lookupTableArray(SiafAccountPlan::all(), 'id_account_plan', ['code','name']);
        $indBudgetRestrict = SiafBudgetItem::lookupDomain('ind_budget_restrict');
        return view('budgetItem.create', compact('budgetItem','clients', 'budgets', 'accountPlans',
            'indBudgetItem', 'indBudgetRestrict'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $budgetItem = SiafBudgetItem::find($id);
        $clients = SiafBudgetItem::lookupTable(FksClient::all(),'id_client','name');
        $budgets = SiafBudgetItem::lookupTableArray(SiafBudget::all(), 'id_budget', ['code','name']);
        $accountPlans = SiafBudgetItem::lookupTableArray(SiafAccountPlan::all(), 'id_account_plan', ['code','name']);
        $indBudgetRestrict = SiafBudgetItem::lookupDomain('ind_budget_restrict');
        return view('budgetItem.create', compact('budgetItem','clients', 'budgets', 'accountPlans',
            'indBudgetItem', 'indBudgetRestrict'));
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

        if (array_key_exists('id_budget_item', $dataForm) && (!empty($dataForm['id_budget_item'])))
            $obj = SiafBudgetItem::find($dataForm['id_budget_item']);
        else
            $obj = new SiafBudgetItem;

        $obj->id_client = $idClient;
        $obj->id_budget = $dataForm['id_budget'];
        $obj->id_account_plan = $dataForm['id_account_plan'];
        $obj->vl_budget = $dataForm['vl_budget'];
        $obj->ind_budget_restrict = $dataForm['ind_budget_restrict'];

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $obj->rules);

        $result = $obj->save();

        if ($result)
            return redirect('budgetItem/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafBudgetItem::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('budgetItem.list')]);
    }

    public function wizardBudgetItem(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $accountPlans = SiafAccountPlan::all();

        return view('budgetItem.wizard', compact('accountPlans'));
    }

    public function wizardStore(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $accountPlans = $request->accountPlan;
        $amounts = $request->amount;
        $budgetCode = $request->code;
        $budgetName = $request->name;
        $budgetYearMonth = $request->year_month_ref;


        // verifica se existe o orcamento
        if (SiafBudget::where('code', $budgetCode)->count()){
            return response()->json([ 'success' => false,
                'error' => __('business.rgn01.001')],500);
        } else {
            // registra o orcamento
            $budget = new SiafBudget;
            $budget->id_client = \Auth::user()->id_client;
            $budget->code = $budgetCode;
            $budget->name = $budgetName;
            $budget->year_month_ref = $this->formatYearMonthRef($budgetYearMonth);
            $budget->ind_tp_budget = '1';
            $budget->ind_st_budget = '1';
            //$budget->created_at = date('Y-m-d H:i:s');
            //$budget->updated_at = date('Y-m-d H:i:s');
            $result = $budget->save();

            //return response()->json(['error' => $result]);


            // registra os itens de orcamento
            for($i = 0; $i < count($accountPlans); ++$i){
                $item = new SiafBudgetItem;
                $item->id_client = \Auth::user()->id_client;
                $item->id_budget = $budget->id_budget;
                $item->id_account_plan = $accountPlans[$i];
                $item->vl_budget = $this->formatCurrent($amounts[$i]);
                $item->ind_budget_restrict = '0';
                //$item->created_at = date('Y-m-d H:i:s');
                //$item->updated_at = date('Y-m-d H:i:s');
                $item->save();
            }
        }

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('budgetItem.list')]);
    }
}
