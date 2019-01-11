<?php
/**
 * FKSUserTableSeeder.php.php : PHP
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
 * Date: 6/19/18
 * Time: 8:13 PM
 *
 * @package ${NAMESPACE}
 * @version 1.0
 */

use Illuminate\Database\Seeder;

class FKSUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fks_user')->insert([
            'id_user' => null,
            'cpf_cnpj' => '91546273115',
            'name' => 'Franklin Farias',
            'address' => 'Quadra 16 Lote 7, Gama Leste',
            'zip_code' => '72450160',
            'city' => 'Brasília',
            'uf' => 'DF',
            'url' => 'fksapiens.com.br',
            'mail' => 'franklin@fksapiens.com.br',
            'login' => 'franklin.farias',
            'password' => bcrypt('123456'),
            'ind_tp_client' => '1',
            'ind_st_client' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

