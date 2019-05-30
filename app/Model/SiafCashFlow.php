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
            'id_client' => 'required',
            'id_account_plan' => 'required',
            'dt_expired' => 'required',
            'vl_amount' => 'required',
            'id_bank' => 'required',
            'id_account_plan' => 'required',
            //'code' => 'required|min:3|max:100|unique:siaf_bank,code' .
            //    ($this->id_bank?','.$this->id_bank.',id_bank,id_client,'.$this->id_client:',NULL,id_bank,id_client,'.$this->id_client),
            //'name' => 'required|min:3|max:100|unique:siaf_account_plan,name' .
            //    ($this->id_bank?','.$this->id_bank.',id_bank,id_client,'.$this->id_client:',NULL,id_bank,id_client,'.$this->id_client),
            'ind_tp_cash_flow' => 'required',
            'ind_st_cash_flow' => 'required',
        ];
    }

    /**
     *
     */
    public function attributes(){
        return [
            'id_cash_flow' => __('messages.siaf_cash_flow-id_cash_flow'),
            'id_client' => __('messages.siaf_cash_flow-id_client'),
            'id_account_plan' => __('messages.siaf_cash_flow-id_account_plan'),
            'id_bank' => __('messages.siaf_cash_flow-id_bank'),
            'id_supplier' => __('messages.siaf_cash_flow-id_supplier'),
            'num_document' => __('messages.siaf_cash_flow-num_document'),
            'dt_emission' => __('messages.siaf_cash_flow-dt_emission'),
            'dt_expired' => __('messages.siaf_cash_flow-dt_expired'),
            'dt_payment' => __('messages.siaf_cash_flow-dt_payment'),
            'vl_amount' => __('messages.siaf_cash_flow-vl_amount'),
            'vl_payment' => __('messages.siaf_cash_flow-vl_payment'),
            'comment' => __('messages.siaf_cash_flow-comment'),
            'ind_tp_cash_flow' => __('messages.siaf_cash_flow-ind_tp_cash_flow'),
            'ind_st_cash_flow' => __('messages.siaf_cash_flow-ind_st_cash_flow'),
            'created_by' => __('messages.siaf_cash_flow-created_by'),
            'updated_by' => __('messages.siaf_cash_flow-updated_by'),
            'created_at' => __('messages.siaf_cash_flow-created_at'),
            'updated_at' => __('messages.siaf_cash_flow-updated_at'),

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
