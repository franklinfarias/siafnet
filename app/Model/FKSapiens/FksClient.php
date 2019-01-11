<?php
/**
 * FksClient.php : PHP
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
 * Time: 11:37 AM
 *
 * @package App\Models\FKSapiens
 * @version 1.0
 */

namespace App\Model\FKSapiens;


use App\Model\Scopes\CustomerScope;

class FksClient extends FksModel
{
    protected $table = 'fks_client';
    protected $primaryKey = 'id_client';

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

    /*
     * Regras de validacao dos dados do formulario
     */
    public function rulesCompany($id=0, $merge=[]){
        return array_merge([
            'cpf_cnpj' => 'required|min:3|max:100|unique:fks_client,cpf_cnpj' . ($id ? ",$id,id_client" : ''),
            'name' => 'required|min:10|max:100|unique:fks_client,name' . ($id ? ",$id,id_client" : ''),
            'mail' => 'required|email|unique:fks_client,mail' . ($id ? ",$id,id_client" : ''),
            'login' => 'required|min:5|max:100|unique:fks_client,login' . ($id ? ",$id,id_client" : ''),
            'address' => 'min:3|max:200',
            'zip_code' => 'min:0|max:10',
            'city' => 'min:3|max:200',
            'uf' => 'min:0|max:2',
            'url' => 'min:0|max:250',

        ], $merge);
    }

}