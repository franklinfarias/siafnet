<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafCustomer extends SiafModel
{

    protected $table = 'siaf_customer';
    protected $primaryKey = 'id_customer';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules(){
        return [
            // Nome é único para o mesmo Cliente;
            'full_name' => 'required|min:3|max:100|unique:siaf_customer,full_name' .
                ($this->id_customer?','.$this->id_customer.',id_customer,id_client,'.$this->id_client:',NULL,id_customer,id_client,'.$this->id_client),
            'login' => 'nullable|min:3|max:20|unique:siaf_customer,login' .
                ($this->id_customer?','.$this->id_customer.',id_customer,id_client,'.$this->id_client:',NULL,id_customer,id_client,'.$this->id_client),
            'ind_tp_customer' => 'required',
            'ind_st_customer' => 'required',
            'mail' => 'required',
            'password' => 'nullable|confirmed|min:3|max:10',
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

    public function indTpCustomer(){
        return SiafDomain::getStatus('ind_tp_customer', $this->ind_tp_customer);
    }

    public function indEducation(){
        return SiafDomain::getStatus('ind_education', $this->ind_education);
    }

    public function indMaritalStatus(){
        return SiafDomain::getStatus('ind_marital_status', $this->ind_marital_status);
    }

    public function indOccupation(){
        return SiafDomain::getStatus('ind_occupation', $this->ind_occupation);
    }

    public function indStCustomer(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_customer);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

}
