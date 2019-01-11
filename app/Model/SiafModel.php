<?php
/**
 * SIAFModel.php : PHP
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
 * Time: 11:35 AM
 *
 * @package App\Models
 * @version 1.0
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiafModel extends Model
{

    /**
     * Retorna o lookup de uma tabela
     * @param $collection
     * @param $idField
     * @param $valueField
     * @return array
     */
    public static function lookupTable($collection,$idField,$valueField,$empty=true){
        $lookup = [];
        if ($empty)
            $lookup[''] = __('messages.select-empty');
        foreach ($collection as $item){
            $arFields = explode('->', $valueField);
            if (count($arFields) == 2){
                $field1 = $arFields[0];
                $field2 = $arFields[1];
                $lookup[$item->$idField] = $item->$field1->$field2;
            } else
                $lookup[$item->$idField] = $item->$valueField;
        }
        return $lookup;
    }

    /**
     * @param $collection
     * @param $idField
     * @param Array $arrayField
     * @param string $strSeparator
     * @return mixed
     */
    public static function lookupTableArray($collection,$idField,$arrayField,$strSeparator=' - '){
        //$lookup = [];
        $lookup[''] = __('messages.select-empty');
        foreach ($collection as $item){
            $value = '';
            foreach ($arrayField as $arItem){
                (empty($value)?$value .= $item->$arItem:$value .= $strSeparator.$item->$arItem);
            }
            $lookup[$item->$idField] = $value;
        }
        return $lookup;
    }

    /**
     * Retorna o lookup da tabela domínio
     * @param $nameColumn
     * @return mixed
     */
    public static function lookupDomain($nameColumn){
        return SiafDomain::lookup($nameColumn);
    }

}