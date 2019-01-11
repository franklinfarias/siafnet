<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafDepartment extends SiafModel
{

    protected $table = 'siaf_department';
    protected $primaryKey = 'id_department';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules(){
        return [
            'name' => 'required|min:3|max:100|unique:siaf_department,name' .
                ($this->id_department?','.$this->id_department.',id_department,id_client,'.$this->id_client:'NULL,id_department,id_client,'.$this->id_client),
            'ind_tp_department' => 'required',
            'ind_st_department' => 'required',
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

    public function indStDepartment(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_department);
    }

    public function indTpDepartment(){
        return SiafDomain::getStatus('ind_tp_department', $this->ind_tp_department);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

}
