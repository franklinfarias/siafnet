<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiafCompanyController extends Controller
{

    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //$companys = FksClient::ofCustomer()->get();
        $companys = FksClient::all();
        return view('company.list', compact('companys'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $company = new FksClient();
        return view('company.create', compact('company'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $company = FksClient::find($id);
        return view('company.edit', compact('company'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $result = false;
        $idClient = Auth::user()->id_client;
        $dataForm = $request->all();

        // remove masks
        $dataForm['cpf_cnpj'] = preg_replace(array('/\./', '/\-/', '/\//'),'', $dataForm['cpf_cnpj']);
        $dataForm['zip_code'] = preg_replace(array('/\./', '/\-/'),'', $dataForm['zip_code']);
        $request->replace($dataForm);

        if (array_key_exists('id_client', $dataForm) && (!empty($dataForm['id_client'])
                && (($dataForm['id_client'] == $idClient) || ($idClient == 1)))) {
            $company = FksClient::find($dataForm['id_client']);

            $company->name = $dataForm['name'];
            $company->cpf_cnpj = $dataForm['cpf_cnpj'];
            $company->address = $dataForm['address'];
            $company->zip_code = $dataForm['zip_code'];
            $company->city = $dataForm['city'];
            $company->uf = $dataForm['uf'];
            $company->url = $dataForm['url'];
            $company->mail = $dataForm['mail'];
            $company->login = $dataForm['login'];
            if ($dataForm['password'] === null)
                $company->password = bcrypt($dataForm['password']);

            /*
             * Validação de Dados
             * Aqui possui duas formas de validar os dados
             * 1. usando o método do controller, assim as mensagens virão do resource/lang;
             * 2. usando o contrutor do Validator para personalizar as mensagens;
             */
            // 1º Método
            $this->validate($request, $company->rulesCompany($company->id_client));

            $result = $company->save();
        }
        if ($result)
            return redirect('company/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('company.list')]);
    }
}
