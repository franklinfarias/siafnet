<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafDepartment;
use App\Model\SiafOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafOfficeController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $offices = SiafOffice::all();
        return view('office.list', compact('offices'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $office = new SiafOffice();
        $clients = SiafOffice::lookupTable(FksClient::all(),'id_client','name');
        $departments = SiafOffice::lookupTable(SiafDepartment::all(),'id_department','name');
        $indTpOffice = SiafOffice::lookupDomain('ind_tp_office');
        $indStOffice = SiafOffice::lookupDomain('ind_st_ativo_inativo');
        return view('office.create', compact('office','clients', 'departments', 'indTpOffice', 'indStOffice'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $office = SiafOffice::find($id);
        $clients = SiafOffice::lookupTable(FksClient::all(),'id_client','name');
        $departments = SiafOffice::lookupTable(SiafDepartment::all(),'id_department','name');
        $indTpOffice = SiafOffice::lookupDomain('ind_tp_office');
        $indStOffice = SiafOffice::lookupDomain('ind_st_ativo_inativo');
        return view('office.edit', compact('office','clients', 'departments', 'indTpOffice', 'indStOffice'));
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

        if (array_key_exists('id_office', $dataForm) && (!empty($dataForm['id_office'])))
            $obj = SiafOffice::find($dataForm['id_office']);
        else
            $obj = new SiafOffice;

        $obj->id_client = $idClient;
        $obj->id_department = $dataForm['id_department'];
        $obj->short_name = $dataForm['short_name'];
        $obj->name = $dataForm['name'];
        $obj->ind_tp_office = $dataForm['ind_tp_office'];
        $obj->ind_st_office = $dataForm['ind_st_office'];

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
            return redirect('office/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafOffice::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('office.list')]);
    }
}
