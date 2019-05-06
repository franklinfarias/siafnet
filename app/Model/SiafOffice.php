<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafOffice extends SiafModel
{

    protected $table = 'siaf_office';
    protected $primaryKey = 'id_office';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules(){
        return [
            'id_department' => 'required',
            'name' => 'required|min:3|max:100|unique:siaf_office,name' .
                ($this->id_office?','.$this->id_office.',id_office,id_client,'.$this->id_client:'NULL,id_office,id_client,'.$this->id_client),
            'ind_tp_office' => 'required',
            'ind_st_office' => 'required',
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

    public function indStOffice(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_office);
    }

    public function indTpOffice(){
        return SiafDomain::getStatus('ind_tp_department', $this->ind_tp_office);
    }

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

    public function department(){
        return $this->hasOne('App\Model\SiafDepartment','id_department','id_department');
    }

}
