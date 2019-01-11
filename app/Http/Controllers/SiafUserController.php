<?php

namespace App\Http\Controllers;

use App\Model\SiafNotification;
use App\Model\FKSapiens\FksClient;
use App\Model\SiafUser;
use App\Model\SiafProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiafUserController extends Controller
{
    public function index(){

       if (Gate::denies('auth')) {
           abort(403,__('messages.br0002'));
       }

       //Retorna todos os usuários
       $users = SiafUser::all();
       return view('user.list', compact('users'));
    }

    public function create() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $user = new SiafUser();
        $clients = FksClient::lookupTable(FksClient::all(),'id_client','name');
        $profiles = SiafUser::lookupTable(SiafProfile::all(),'id_profile','name_profile');
        $indStUser = SiafUser::lookupDomain('ind_st_ativo_inativo');
        return view('user.create', compact('user','clients','profiles', 'indStUser'));
    }

    public function edit($id) {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $user = SiafUser::find($id);
        if (!($user === 0)) {
            $clients = FksClient::lookupTable(FksClient::all(), 'id_client', 'name');
            $profiles = SiafUser::lookupTable(SiafProfile::all(), 'id_profile', 'name_profile');
            $indStUser = SiafUser::lookupDomain('ind_st_ativo_inativo');
            return view('user.edit', compact('user', 'clients', 'profiles', 'indStUser'));
        } else abort(403, __('messages.br0001'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $dataForm = $request->all();

        // remove masks
        $dataForm['cpf'] = preg_replace(array('/\./', '/\-/'),'', $dataForm['cpf']);
        $request->replace($dataForm);

        if (array_key_exists('id_user', $dataForm) && (!empty($dataForm['id_user'])))
            $user = SiafUser::find($dataForm['id_user']);
        else
            $user = new SiafUser;
        // If not set Customer, then set Auth customer
        $user->id_client = (array_key_exists('id_client', $dataForm)?$dataForm['id_client']:Auth::user()->id_client);
        $user->id_profile = $dataForm['id_profile'];
        $user->name = $dataForm['name'];
        $user->login = $dataForm['login'];
        $user->email = $dataForm['email'];
        $user->cpf = $dataForm['cpf'];
        //$user->signature = $dataForm['signature'];
        if (!empty($dataForm['password']))
            $user->password = bcrypt($dataForm['password']);
        $user->ind_st_user = $dataForm['ind_st_user'];

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $user->rules());

        // Store Image
        $file = $request->file('photo');
        //to database
        if (!empty($file)) {
            $contents = $file->openFile()->fread($file->getSize());
            $user->photo = $contents;
        }
        $result = $user->save();

        if ($result)
            return redirect('user/list');
        else
            return redirect()->back();
    }

    public function profile() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $user = SiafUser::find(Auth::user()->id_user);
        return view('user.profile', compact('user'));
    }

    public function storeProfile(Request $request)
    {
        //if (Gate::denies('auth')) {
        //    abort(403,__('messages.br0002'));
        //}

        $dataForm = $request->all();

        // remove masks
        $dataForm['cpf'] = preg_replace(array('/\./', '/\-/'),'', $dataForm['cpf']);
        $request->replace($dataForm);

        $user = SiafUser::find($dataForm['id_user']);
        // If not set Customer, then set Auth customer
        $user->email = $dataForm['email'];
        $user->cpf = $dataForm['cpf'];
        //$user->signature = $dataForm['signature'];
        if (!empty($dataForm['password']))
            $user->password = bcrypt($dataForm['password']);

        // Store Image
        $file = $request->file('photo');
        //to database
        if (!empty($file)) {
            $contents = $file->openFile()->fread($file->getSize());
            $user->photo = $contents;
        }

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $user->rulesProfile);

        $result = $user->save();

        if ($result)
            return redirect('user/profile');
        else
            return redirect()->back();
    }

    public function notification() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        $user = SiafUser::find(Auth::user()->id_user);
        $notifications = SiafNotification::where('id_user_destiny',Auth::user()->id_user)
            ->orderBy('notification_time', 'desc')
            ->get();
        return view('user.notification', compact('user', 'notifications'));
    }

    public function readNotification() {
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        if (!empty($_REQUEST['id'])) {
            $id = $_REQUEST['id'];

            $notification = SiafNotification::find($id);
            $notification->ind_st_notification = '1'; // LIDO
            $result = $notification->save();
            return response()->json(
                ['response' => "Updated $result."]
            );
        } else
            response()->json(['response' => "Incorrect call."]);
    }

    public function getImage($id){
        if (Gate::denies('auth')) {
            abort(403,__('messages.br0002'));
        }

        if ((!empty($id)) && ($id > 0)) {
            // By database
            // Find the user
            $user = SiafUser::find($id);

            // Observer: You should use a leading \ if using a global class inside a namespace.
            $finfo = new \finfo(FILEINFO_MIME);
            // Return the image in the response with the correct MIME type
            return response()->make($user->photo, 200, array(
                //'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->image)
                'Content-Type' => $finfo->buffer($user->photo)
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