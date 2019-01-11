<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafDepartmentController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $departments = SiafDepartment::all();
        return view('department.list', compact('departments'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $department = new SiafDepartment();
        $clients = SiafDepartment::lookupTable(FksClient::all(),'id_client','name');
        $indTpDepartment = SiafDepartment::lookupDomain('ind_tp_department');
        $indStDepartment = SiafDepartment::lookupDomain('ind_st_ativo_inativo');
        return view('department.create', compact('department','clients', 'indTpDepartment', 'indStDepartment'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $department = SiafDepartment::find($id);
        $clients = SiafDepartment::lookupTable(FksClient::all(),'id_client','name');
        $indTpDepartment = SiafDepartment::lookupDomain('ind_tp_department');
        $indStDepartment = SiafDepartment::lookupDomain('ind_st_ativo_inativo');
        return view('department.edit', compact('department','clients', 'indTpDepartment', 'indStDepartment'));
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
        
        if (array_key_exists('id_department', $dataForm) && (!empty($dataForm['id_department'])))
            $obj = SiafDepartment::find($dataForm['id_department']);
        else
            $obj = new SiafDepartment;

        $obj->id_client = $idClient;
        $obj->short_name = $dataForm['short_name'];
        $obj->name = $dataForm['name'];
        $obj->mail = $dataForm['mail'];
        $obj->pwd_mail = $dataForm['pwd_mail'];
        $obj->phones = $dataForm['phones'];
        $obj->ind_tp_department = $dataForm['ind_tp_department'];
        $obj->ind_st_department = $dataForm['ind_st_department'];

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
            return redirect('department/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafDepartment::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('department.list')]);
    }
}
