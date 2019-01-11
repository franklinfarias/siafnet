<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafUser extends SiafModel
{

    protected $table = 'siaf_user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        //'name', 'login', 'extension', 'email',
        //'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules(){
        return [
            'id_profile' => 'required',
            //unique:table,column,except,idColumn
            'name' => 'required|min:3|max:100|unique:siaf_user,name' .
                ($this->id_user?','.$this->id_user.',id_user':''),
            'login' => 'required|min:5|max:20|unique:siaf_user,login' .
                ($this->id_user?','.$this->id_user.',id_user':''),
            'email' => 'required|email',
            'cpf' => 'required',
            'ind_st_user' => 'required',
            //'password' => 'filled|min:6|max:20',
        ];
    }

    public $rulesProfile = [
        'email' => 'required|email',
        'cpf' => 'required',
        //'password' => 'filled|min:6|max:20',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CustomerScope);
    }

    public function indStUser(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_user);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

    public function profile(){
        return $this->hasOne('App\Model\SiafProfile','id_profile','id_profile');
    }

    public function notifications(){
        return $this->hasMany('App\Model\SiafNotification','id_user_destiny','id_user');
    }
}
