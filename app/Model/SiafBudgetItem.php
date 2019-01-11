<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafBudgetItem extends SiafModel
{

    protected $table = 'siaf_budget_item';
    protected $primaryKey = 'id_budget_item';

    /**
     * Regras de validacao dos dados do formulario
     */
    public $rules = [
        'id_budget' => 'required',
        'id_account_plan' => 'required',
        'vl_budget' => 'required',

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

    public function indBudgetRestrict(){
        return SiafDomain::getStatus('ind_budget_restrict', $this->ind_budget_restrict);
    }

    public function budget(){
        return $this->hasOne('App\Model\SiafBudget','id_budget','id_budget');
    }

    public function accountPlan(){
        return $this->hasOne('App\Model\SiafAccountPlan','id_account_plan','id_account_plan');
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

}
