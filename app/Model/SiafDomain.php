<?php
/**
 * SiafDominio.php.php : PHP
 * Website: http://fksapiens.com.br/
 *
 * Copyright (c) 1999 - 2017 Franklin Farias <franklin@fksapiens.com.br>
 * All Rights Reserved.
 *
 * This software is released under the terms of the GNU Lesser General Public License v2.1
 * A copy of which is available from http://www.gnu.org/copyleft/lesser.html
 *
 * Written for PHP 5.4, should work with older PHP 4.x versions.
 *
 * Please submit bug reports, patches, etc to http://wiki.fksapiens.com.br/
 * Thanks. :)
 *
 * User: franklin
 * Date: 6/1/18
 * Time: 11:43 AM
 *
 * @package App\Models
 * @version 1.0
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;

class SiafDomain extends SiafModel
{
    protected $table = 'siaf_domain';
    protected $primaryKey = '';

    public static function lookup($nameColumn){
        $domains = DB::table('siaf_domain')
            ->select('*')
            ->where('name_column',$nameColumn)
            ->get();

        $lookup[''] = __('messages.select-empty');
        foreach ($domains as $item){
            $lookup[$item->desc_code] = $item->desc_status;
        }
        return $lookup;
    }

    public static function getStatus($nameColumn, $descCode){
        $domains = DB::table('siaf_domain')
            ->select('desc_status')
            ->where('name_column','=',$nameColumn)
            ->where('desc_code','=',$descCode)
            ->get();
        $descStatus = __('messages.empty');
        foreach ($domains as $item){
            $descStatus = $item->desc_status;
        }
        return $descStatus;
    }

}