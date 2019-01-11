<?php

namespace App\Http\Controllers;

use App\Model\SiafNotification;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Retorna todas as notificações NAO LIDAS do usuário logado
     */
    public static function getAllNotificationUser(){
        return SiafNotification::where('ind_tp_notification','1')
            ->where('ind_st_notification','0')
            ->where('id_user_destiny',Auth::user()->id_user)
            ->orderBy('notification_time', 'desc')
            ->get();
    }

    /**
     * Retorna todas as mensagens NAO LIDAS do usuário logado
     */
    public static function getAllMessagesUser(){
        return SiafNotification::where('ind_tp_notification','2')
            ->where('ind_st_notification','0')
            ->where('id_user_destiny',Auth::user()->id_user)
            ->orderBy('notification_time', 'desc')
            ->get();
    }

    /**
     * @param $monthYear on format MM/YYYY
     * @return string YYYYMM
     */
    public function formatYearMonthRef($monthYear){
        $str = $monthYear;
        $str = str_replace('/','', $str);
        $str = substr($str,3,4) . substr($str,1,2);
        return $str;
    }

    /**
     * @param $monthYear on format MM/YYYY
     * @return string YYYYMM
     */
    public function formatCurrent($value){
        if (\App::isLocale('br')){
            $value = str_replace('.','',str_replace(',', '.', $value));
        }
        return $value;
    }



}
