<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafSupplierController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $suppliers = SiafSupplier::all();
        return view('supplier.list', compact('suppliers'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $supplier = new SiafSupplier();
        $clients = SiafSupplier::lookupTable(FksClient::all(),'id_client','name');
        $indStSupplier = SiafSupplier::lookupDomain('ind_st_ativo_inativo');
        return view('supplier.create', compact('supplier','clients', 'indStSupplier'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $supplier = SiafSupplier::find($id);
        $clients = SiafSupplier::lookupTable(FksClient::all(),'id_client','name');
        $indStSupplier = SiafSupplier::lookupDomain('ind_st_ativo_inativo');
        return view('supplier.edit', compact('supplier','clients', 'indStSupplier'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $dataForm = $request->all();
        
        $dataForm['cpf_cnpj'] = preg_replace(array('/\./', '/\-/', '/\//'),'', $dataForm['cpf_cnpj']);
        if (!empty($dataForm['id_client']) && ($dataForm['id_client'] <= 0))
            $idClient = Auth::user()->id_client;
        else
            $idClient = $dataForm['id_client'];
        
        if (array_key_exists('id_supplier', $dataForm) && (!empty($dataForm['id_supplier'])))
            $obj = SiafSupplier::find($dataForm['id_supplier']);
        else
            $obj = new SiafSupplier;

        $obj->id_client = $idClient;
        $obj->short_name = $dataForm['short_name'];
        $obj->name = $dataForm['name'];
        $obj->mail = $dataForm['mail'];
        $obj->cpf_cnpj = $dataForm['cpf_cnpj'];
        $obj->phones = $dataForm['phones'];
        $obj->ind_st_supplier = $dataForm['ind_st_supplier'];

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
            return redirect('supplier/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafSupplier::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('supplier.list')]);
    }
}
