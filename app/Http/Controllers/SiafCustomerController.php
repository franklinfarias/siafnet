<?php

namespace App\Http\Controllers;

use App\Model\FKSapiens\FksClient;
use App\Model\SiafCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiafCustomerController extends Controller
{
    public function index(){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $customers = SiafCustomer::all();
        return view('customer.list', compact('customers'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $customer = new SiafCustomer();
        $clients = SiafCustomer::lookupTable(FksClient::all(),'id_client','name');
        $indTpCustomer = SiafCustomer::lookupDomain('ind_tp_customer');
        $indGender = SiafCustomer::lookupDomain('ind_gender');
        $indMaritalStatus = SiafCustomer::lookupDomain('ind_marital_status');
        $indOccupation = SiafCustomer::lookupDomain('ind_occupation');
        $indEducation = SiafCustomer::lookupDomain('ind_education');
        $indStCustomer = SiafCustomer::lookupDomain('ind_st_ativo_inativo');
        return view('customer.create', compact('customer','clients', 'indTpCustomer', 'indStCustomer',
            'indMaritalStatus','indGender','indOccupation','indEducation'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $customer = SiafCustomer::find($id);
        $clients = SiafCustomer::lookupTable(FksClient::all(),'id_client','name');
        $indTpCustomer = SiafCustomer::lookupDomain('ind_tp_customer');
        $indGender = SiafCustomer::lookupDomain('ind_gender');
        $indMaritalStatus = SiafCustomer::lookupDomain('ind_marital_status');
        $indOccupation = SiafCustomer::lookupDomain('ind_occupation');
        $indEducation = SiafCustomer::lookupDomain('ind_education');
        $indStCustomer = SiafCustomer::lookupDomain('ind_st_ativo_inativo');
        return view('customer.edit', compact('customer','clients', 'indTpCustomer', 'indStCustomer',
            'indMaritalStatus','indGender','indOccupation','indEducation'));
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

        if (array_key_exists('id_customer', $dataForm) && (!empty($dataForm['id_customer'])))
            $obj = SiafCustomer::find($dataForm['id_customer']);
        else
            $obj = new SiafCustomer;

        $obj->id_client = $idClient;
        $obj->full_name = $dataForm['full_name'];
        $obj->address = $dataForm['address'];
        $obj->city = $dataForm['city'];
        $obj->district = $dataForm['district'];
        $obj->zip_code = preg_replace(array('/\./', '/\-/'),'', $dataForm['zip_code']);
        $obj->phones = preg_replace(array('/\(/', '/\)/','/\-/','/\//','/\ /','/\_/'),'', $dataForm['phones']);
        $obj->dt_birthday = $dataForm['dt_birthday'];
        $obj->mail = $dataForm['mail'];
        $obj->url_site = $dataForm['url_site'];

        // Store Image
        $file = $request->file('photo');
        //to database
        if (!empty($file)) {
            $contents = $file->openFile()->fread($file->getSize());
            $obj->photo = $contents;
        }

        $obj->cpf_cnpj = preg_replace(array('/\./', '/\-/', '/\//'),'', $dataForm['cpf_cnpj']);
        $obj->rg_ie = $dataForm['rg_ie'];
        $obj->login = $dataForm['login'];
        if (!empty($dataForm['password']))
            $obj->password = bcrypt($dataForm['password']);
        $obj->ind_tp_customer = $dataForm['ind_tp_customer'];
        $obj->ind_education = $dataForm['ind_education'];
        $obj->ind_gender = $dataForm['ind_gender'];
        $obj->ind_marital_status = $dataForm['ind_marital_status'];
        $obj->ind_occupation = $dataForm['ind_occupation'];
        $obj->ind_st_customer = $dataForm['ind_st_customer'];

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
            return redirect('customer/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $obj = SiafCustomer::find($request->id);
        $obj->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('customer.list')]);
    }

    public function getImage($id){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        if ((!empty($id)) && ($id > 0)) {
            // By database
            // Find the user
            $obj = SiafCustomer::find($id);

            // Observer: You should use a leading \ if using a global class inside a namespace.
            $finfo = new \finfo(FILEINFO_MIME);
            // Return the image in the response with the correct MIME type
            return response()->make($obj->photo, 200, array(
                //'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($obj->image)
                'Content-Type' => $finfo->buffer($obj->photo)
            ));
        } else {
            $finfo = new \finfo(FILEINFO_MIME);
            return response()->make(url("assets/img/avatar-blank.png"), 200, array(
                //'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->image)
                'Content-Type' => $finfo->file(url("assets/img/avatar-blank.png"))
            ));
        }
    }
}
