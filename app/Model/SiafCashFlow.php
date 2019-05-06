<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafCashFlow extends SiafModel
{

    protected $table = 'siaf_cash_flow';
    protected $primaryKey = 'id_cash_flow';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules()
    {
        return [
            'id_account_plan' => 'required',
            'dt_expired' => 'required',
            'vl_amount' => 'required',
            //'code' => 'required|min:3|max:100|unique:siaf_bank,code' .
            //    ($this->id_bank?','.$this->id_bank.',id_bank,id_client,'.$this->id_client:',NULL,id_bank,id_client,'.$this->id_client),
            //'name' => 'required|min:3|max:100|unique:siaf_account_plan,name' .
            //    ($this->id_bank?','.$this->id_bank.',id_bank,id_client,'.$this->id_client:',NULL,id_bank,id_client,'.$this->id_client),
            'ind_tp_cash_flow' => 'required',
            'ind_st_cash_flow' => 'required',
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

    public function indStCashFlow(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_cash_flow);
    }

    public function indTpCashFlow(){
        return SiafDomain::getStatus('ind_tp_cash_flow', $this->ind_tp_cash_flow);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

    public function accountPlan(){
        return $this->hasOne('App\Model\SiafAccountPlan','id_account_plan','id_account_plan');
    }

    public function bank(){
        return $this->hasOne('App\Model\SiafBank','id_bank','id_bank');
    }

    public function supplier(){
        return $this->hasOne('App\Model\SiafSupplier','id_supplier','id_supplier');
    }

    public function customer(){
        return $this->hasOne('App\Model\SiafCustomer','id_customer','id_customer');
    }

    public function userCreate(){
        return $this->hasOne('App\Model\SiafUser','id_user','created_by');
    }

    public function userUpdate(){
        return $this->hasOne('App\Model\SiafUser','id_user','updated_by');
    }
}
