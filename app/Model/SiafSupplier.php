<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafSupplier extends SiafModel
{

    protected $table = 'siaf_supplier';
    protected $primaryKey = 'id_supplier';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules(){
        return [
            'name' => 'required|min:3|max:100|unique:siaf_supplier,name' .
                ($this->id_supplier?','.$this->id_supplier.',id_supplier,id_client,'.$this->id_client:'NULL,id_supplier,id_client,'.$this->id_client),
            'ind_st_supplier' => 'required',
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

    public function indStSupplier(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_supplier);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

}
