<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class SiafUserAuth extends SiafModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'siaf_user';
    protected $primaryKey = 'id_user';

    public function client(){
        return $this->hasOne('App\Model\FKSapiens\FksClient','id_client','id_client');
    }

    //public function profile(){
    //    return $this->hasOne('App\Model\SiafProfile','id_profile','id_profile');
    //}

    //public function notifications(){
    //    return $this->hasMany('App\Model\SiafNotification','id_user_destiny','id_user');
    //}


}
