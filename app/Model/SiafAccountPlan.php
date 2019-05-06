<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafAccountPlan extends SiafModel
{

    protected $table = 'siaf_account_plan';
    protected $primaryKey = 'id_account_plan';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules()
    {
        return [
            'code' => 'required|min:3|max:100|unique:siaf_account_plan,code' .
                ($this->id_account_plan?','.$this->id_account_plan.',id_account_plan,id_client,'.$this->id_client:',NULL,id_account_plan,id_client,'.$this->id_client),
            'name' => 'required|min:3|max:100|unique:siaf_account_plan,name' .
                ($this->id_account_plan?','.$this->id_account_plan.',id_account_plan,id_client,'.$this->id_client:',NULL,id_account_plan,id_client,'.$this->id_client),
            'ind_fnc_account_plan' => 'required',
            'ind_tp_account_plan' => 'required',
            'ind_st_account_plan' => 'required',
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



    public function indFncAccountPlan(){
        return SiafDomain::getStatus('ind_fnc_account_plan', $this->ind_fnc_account_plan);
    }

    public function indStAccountPlan(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_account_plan);
    }

    public function indTpAccountPlan(){
        return SiafDomain::getStatus('ind_tp_department', $this->ind_tp_account_plan);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

    public function subAccountPlan(){
        return $this->hasOne('App\Model\SiafAccountPlan','id_account_plan','id_sub_account_plan');
    }

}
