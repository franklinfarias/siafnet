<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafBudget extends SiafModel
{

    protected $table = 'siaf_budget';
    protected $primaryKey = 'id_budget';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules(){
        return [
            'code' => 'required|min:3|max:100|unique:siaf_budget,code' .
                ($this->id_budget?','.$this->id_budget.',id_budget,id_client,'.$this->id_client:'NULL,id_budget,id_client,'.$this->id_client),
            'name' => 'required|min:3|max:100|unique:siaf_budget,name' .
                ($this->id_budget?','.$this->id_budget.',id_budget,id_client,'.$this->id_client:'NULL,id_budget,id_client,'.$this->id_client),
            'year_month_ref' => 'required|min:6|max:6|unique:siaf_budget,year_month_ref' .
                ($this->id_budget?','.$this->id_budget.',id_budget,id_client,'.$this->id_client:'NULL,id_budget,id_client,'.$this->id_client),
            'ind_tp_budget' => 'required',
            'ind_st_budget' => 'required',
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

    public function indStBudget(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_budget);
    }

    public function indTpBudget(){
        return SiafDomain::getStatus('ind_tp_budget', $this->ind_tp_budget);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

}
