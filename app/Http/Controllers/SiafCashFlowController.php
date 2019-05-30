<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafAccountPlan;
use App\Model\SiafBank;
use App\Model\SiafCashFlow;
use App\Model\SiafCustomer;
use App\Model\SiafMember;
use App\Model\SiafSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class SiafCashFlowController extends Controller
{
    public function index(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $cashs = null;
        // Search by: Customer
        if (!empty($request->cst)){
            $customer = SiafMember::lookupTable(SiafCustomer::where('id_customer', $request->cst)->get(),
                'id_customer', 'full_name', false);
            $cashs = SiafCashFlow::where('id_customer',$request->cst)->get();
        } else {
            $customer = [__('messages.siaf_cash_flow-search_a_customer')];
        }
        // Search by: Account Plan
        if (!empty($request->act)){
            $accountPlan = SiafAccountPlan::lookupTable(SiafAccountPlan::where('id_account_plan',$request->act)->get(),
                'id_account_plan', 'name', false);
            $cashs = SiafCashFlow::where('id_account_plan',$request->act)->get();
        } else {
            $accountPlan = [__('messages.siaf_cash_flow-search_a_accountPlan')];
        }
        // Search by: Bank
        if (!empty($request->bnk)){
            $bank = SiafBank::lookupTable(SiafBank::where('id_bank', $request->bnk)->get(),
                'id_bank', 'name', false);
            $cashs = SiafCashFlow::where('id_bank',$request->bnk)->get();
        } else {
            $bank = [__('messages.siaf_cash_flow-search_a_bank')];
        }

        if (empty($cashs)){
            $cashs = SiafCashFlow::all();
        }

        //Retorna todos os usuários
        return view('cashFlow.list', compact('cashs', 'customer', 'accountPlan', 'bank'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $cashFlow = new SiafCashFlow();
        $clients = SiafCashFlow::lookupTable(FksClient::all(),'id_client','name');
        $bank = [];
        $accountPlan = [];
        $supplier = [];
        $customer = [];
        $indTpCashFlow = SiafCashFlow::lookupDomain('ind_tp_cash_flow');
        $indStCashFlow = SiafCashFlow::lookupDomain('ind_st_ativo_inativo');
        return view('cashFlow.create', compact('cashFlow','clients',
            'bank', 'accountPlan', 'supplier', 'customer', 'indTpCashFlow', 'indStCashFlow'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $cashFlow = SiafCashFlow::find($id);

        // format attributes
        $cashFlow->dt_emission = $this->formatDateForDatePicker($cashFlow->dt_emission);
        $cashFlow->dt_expired = $this->formatDateForDatePicker($cashFlow->dt_expired);
        $cashFlow->dt_payment = $this->formatDateForDatePicker($cashFlow->dt_payment);
        $cashFlow->vl_amount = $this->formatCurrentForMaskMoney($cashFlow->vl_amount);

        $clients = SiafCashFlow::lookupTable(FksClient::all(),'id_client','name');
        $bank = [];
        $accountPlan = [];
        $supplier = [];
        $customer = [];
        $indTpCashFlow = SiafCashFlow::lookupDomain('ind_tp_cash_flow');
        $indStCashFlow = SiafCashFlow::lookupDomain('ind_st_ativo_inativo');
        return view('cashFlow.create', compact('cashFlow','clients',
            'bank', 'accountPlan', 'supplier', 'customer', 'indTpCashFlow', 'indStCashFlow'));
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

        if (array_key_exists('id_cash_flow', $dataForm) && (!empty($dataForm['id_cash_flow'])))
            $obj = SiafCashFlow::find($dataForm['id_cash_flow']);
        else {
            $obj = new SiafCashFlow;
            $obj->created_by = Auth::user()->id_user;
        }

        //
        $obj->id_client = $idClient;
        $obj->id_bank = 0;
        $obj->id_account_plan = 0;
        $obj->id_supllier = 0;
        $obj->id_customer = 0;
        $obj->num_document = $dataForm['num_document'];
        $obj->dt_emission = $this->removeFormatDatePicker($dataForm['dt_emission']);
        $obj->dt_expired = $this->removeFormatDatePicker($dataForm['dt_expired']);
        $obj->dt_payment = $this->removeFormatDatePicker($dataForm['dt_payment']);
        $obj->vl_amount = $this->removeFormatMaskMoney($dataForm['vl_amount']);
        $obj->vl_payment = $this->removeFormatMaskMoney($dataForm['vl_payment']);
        $obj->comment = $dataForm['comment'];
        $obj->updated_by = Auth::user()->id_user;
        $obj->ind_tp_cash_flow = $dataForm['ind_tp_cash_flow'];
        $obj->ind_st_cash_flow = $dataForm['ind_st_cash_flow'];
        //dd($obj);

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $obj->rules(), [], $obj->attributes());

        $result = $obj->save();

        if ($result)
            return redirect('cashFlow/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafCashFlow::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('cashFlow.list')]);
    }

    public function searchCustomer(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $customers = SiafCustomer::where('full_name','like', '%' . $request->full_name . '%')
            ->get();

        return response()->json([ 'success' => 'The success executed.',
            'data' => json_encode($customers)]);
    }

    public function searchAccountPlan(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafAccountPlan::where('name', 'like', '%' . $request->name . '%')
            ->get();

        return response()->json([ 'success' => 'The success executed.',
            'data' => json_encode($obj)]);

    }

    public function searchBank(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafBank::where('name','like', '%' . $request->name . '%')
            ->get();

        return response()->json([ 'success' => 'The success executed.',
            'data' => json_encode($obj)]);
    }

    public function searchSupplier(Request $request){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafSupplier::where('name','like', '%' . $request->name . '%')
            ->get();

        return response()->json([ 'success' => 'The success executed.',
            'data' => json_encode($obj)]);
    }


}
