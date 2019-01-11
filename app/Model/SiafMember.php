<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafMember extends SiafModel
{

    protected $table = 'siaf_member';
    protected $primaryKey = 'id_member';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules()
    {
        return [
            'id_customer' => 'required',
            'code_registry' => 'required',
            'dt_initial' => 'required',
            'dt_finish' => 'nullable|date|after:dt_initial',
            'ind_tp_member' => 'required',
            'ind_st_member' => 'required',
        ];
    }

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

    public function indTpMember(){
        return SiafDomain::getStatus('ind_tp_member', $this->ind_tp_member);
    }

    public function indStMember(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_member);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

    public function customer(){
        return $this->hasOne('App\Model\SiafCustomer','id_customer','id_customer');
    }

    /**
     * Return the registry formated with: TYPE_HISTORY + ID_MEMBER + YEAR_DT_INITIAL
     * eg. 00-000001-18
     * @return string
     */
    public function codeRegistry(){
        return str_pad($this->ind_tp_member,2,'0', STR_PAD_LEFT) .
            str_pad($this->id_member,6,'0',STR_PAD_LEFT) .
            substr($this->dt_initial,2,2);
    }
}
