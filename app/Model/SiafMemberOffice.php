<?php

namespace App\Model;

use App\Model\Scopes\CustomerScope;

class SiafMemberOffice extends SiafModel
{

    protected $table = 'siaf_member_office';
    protected $primaryKey = 'id_member_office';

    /**
     * Regras de validacao dos dados do formulario
     */
    public function rules()
    {
        return [
            'id_member' => 'required',
            'id_office' => 'required',
            'dt_initial' => 'required',
            'dt_finish' => 'nullable|date|after:dt_initial',
            'ind_tp_member_office' => 'required',
            'ind_st_member_office' => 'required',
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

    public function indTpMemberOffice(){
        return SiafDomain::getStatus('ind_tp_member_office', $this->ind_tp_member_office);
    }

    public function indStMemberOffice(){
        return SiafDomain::getStatus('ind_st_ativo_inativo', $this->ind_st_member_office);
    }

    public function office(){
        return $this->hasOne('App\Model\SiafOffice','id_office','id_office');
    }

    public function member(){
        return $this->hasOne('App\Model\SiafMember','id_member','id_member');
    }

}
