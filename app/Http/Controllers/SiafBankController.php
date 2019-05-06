<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafBankController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $banks = SiafBank::all();
        return view('bank.list', compact('banks'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $bank = new SiafBank();
        $clients = SiafBank::lookupTable(FksClient::all(),'id_client','name');
        $indTpBank = SiafBank::lookupDomain('ind_tp_bank');
        $indStBank = SiafBank::lookupDomain('ind_st_ativo_inativo');
        return view('bank.create', compact('bank','clients', 'indTpBank', 'indStBank'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $bank = SiafBank::find($id);
        $clients = SiafBank::lookupTable(FksClient::all(),'id_client','name');
        $indTpBank = SiafBank::lookupDomain('ind_tp_bank');
        $indStBank = SiafBank::lookupDomain('ind_st_ativo_inativo');
        return view('bank.edit', compact('bank','clients', 'indTpBank', 'indStBank'));
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

        if (array_key_exists('id_bank', $dataForm) && (!empty($dataForm['id_bank'])))
            $obj = SiafBank::find($dataForm['id_bank']);
        else
            $obj = new SiafBank;

        $obj->id_client = $idClient;
        $obj->code = $dataForm['code'];
        $obj->name = $dataForm['name'];
        $obj->agency = $dataForm['agency'];
        $obj->number_account = $dataForm['number_account'];
        $obj->param01 = $dataForm['param01'];
        $obj->param02 = $dataForm['param02'];
        $obj->param03 = $dataForm['param03'];
        $obj->param04 = $dataForm['param04'];
        $obj->param05 = $dataForm['param05'];
        $obj->param06 = $dataForm['param06'];
        $obj->param07 = $dataForm['param07'];
        $obj->param08 = $dataForm['param08'];
        $obj->param09 = $dataForm['param09'];
        $obj->param10 = $dataForm['param10'];
        $obj->param11 = $dataForm['param11'];
        $obj->param12 = $dataForm['param12'];
        $obj->param13 = $dataForm['param13'];
        $obj->param14 = $dataForm['param14'];
        $obj->param15 = $dataForm['param15'];
        $obj->ind_tp_bank = $dataForm['ind_tp_bank'];
        $obj->ind_st_bank = $dataForm['ind_st_bank'];

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
            return redirect('bank/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafBank::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('bank.list')]);
    }
}
