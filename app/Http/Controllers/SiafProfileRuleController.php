<?php

namespace App\Http\Controllers;

use App\Model\SiafProfile;
use App\Model\SiafProfileRule;
use App\Model\SiafRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SiafProfileRuleController extends Controller
{
    public function index(){
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        //Retorna todos os Profiles-Rules
        $profilesRules = SiafProfileRule::all();
        return view('profileRule.list', compact('profilesRules'));
    }

    public function create() {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $profileRule = new SiafProfileRule();
        $profiles = SiafProfile::all();
        $profiles = SiafProfileRule::lookupTable($profiles, 'id_profile', 'name_profile');
        $rules = SiafRule::all();
        $rules = SiafProfileRule::lookupTable($rules, 'id_rule', 'name_rule');
        return view('profileRule.create', compact('profileRule', 'profiles', 'rules'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $dataForm = $request->all();
        $profileRule = new SiafProfileRule;
        $profileRule->timestamps = false; // Not use created_at and updated_at

        $profileRule->id_profile = $dataForm['id_profile'];
        $profileRule->id_rule = $dataForm['id_rule'];

        /*
         * Validação de Dados
         * Aqui possui duas formas de validar os dados
         * 1. usando o método do controller, assim as mensagens virão do resource/lang;
         * 2. usando o contrutor do Validator para personalizar as mensagens;
         */
        // 1º Método
        $this->validate($request, $profileRule->rules);

        $result = $profileRule->save();

        if ($result)
            return redirect('profileRule/list');
        else
            return redirect()->back();

    }

    public function delete(Request $request) {
        if (Gate::denies('auth') || (Auth::user()->id_client != 1)) {
            abort(403,__('messages.br0002'));
        }

        $idProfile = $request->idProfile;
        $idRule = $request->idRule;
        $rowsAffected = DB::delete('delete from siaf_profile_rule where id_profile = ? and id_rule = ?', [$idProfile, $idRule]);

        return response()->json([ 'success' => 'The success executed.',
            'redirectTo' => route('profileRule.list')]);
    }
}
