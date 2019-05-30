<?php

namespace App\Http\Controllers;

use App\Model\SiafProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiafProfileController extends Controller
{
    public function index(){
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os usuários
        $profiles = SiafProfile::all();
        return view('profile.list', compact('profiles'));
    }

    public function create() {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $profile = new SiafProfile();
        $indTpProfile = SiafProfile::lookupDomain('ind_tp_profile');
        return view('profile.create', compact('profile', 'indTpProfile'));
    }

    public function edit($id) {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $profile = SiafProfile::find($id);
        $indTpProfile = SiafProfile::lookupDomain('ind_tp_profile');
        return view('profile.edit', compact('profile','indTpProfile'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $dataForm = $request->all();
        if (array_key_exists('id_profile', $dataForm) && (!empty($dataForm['id_profile'])))
            $profile = SiafProfile::find($dataForm['id_profile']);
        else
            $profile = new SiafProfile;

        $profile->name_profile = $dataForm['name_profile'];
        $profile->ind_tp_profile = $dataForm['ind_tp_profile'];

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $profile->rules());

        $result = $profile->save();

        if ($result)
            return redirect('profile/list');
        else
            return redirect()->back();
    }

    public function delete(Request $request) {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $profile = SiafProfile::find($request->id);
        $profile->delete();

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('profile.list')]);
    }

}
