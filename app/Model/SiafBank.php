<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafBank extends SiafModel
{

    protected $table = 'siaf_bank';
    protected $primaryKey = 'id_bank';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules()
    {
        return [
            'code' => 'required|min:3|max:10',
            //'code' => 'required|min:3|max:100|unique:siaf_bank,code' .
            //    ($this->id_bank?','.$this->id_bank.',id_bank,id_client,'.$this->id_client:',NULL,id_bank,id_client,'.$this->id_client),
            'name' => 'required|min:3|max:100|unique:siaf_account_plan,name' .
                ($this->id_bank?','.$this->id_bank.',id_bank,id_client,'.$this->id_client:',NULL,id_bank,id_client,'.$this->id_client),
            'ind_tp_bank' => 'required',
            'ind_st_bank' => 'required',
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



    public function indStBank(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_bank);
    }

    public function indTpBank(){
        return SiafDomain::getStatus('ind_tp_bank', $this->ind_tp_bank);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

}
