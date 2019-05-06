<?php

namespace App\Model;

class SiafProfileRule extends SiafModel
{
    protected $table = 'siaf_profile_rule';

    /**
     * Regras de validacao dos dados do formulario
     */
    public $rules = [
        'id_profile' => 'required',
        'id_rule' => 'required',
    ];

    public function rule(){
        return $this->belongsTo('App\Model\SiafRule','id_rule','id_rule');
    }

    public function profile(){
        return $this->belongsTo('App\Model\SiafProfile','id_profile','id_profile');
    }
}
