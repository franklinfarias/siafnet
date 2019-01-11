<?php
/**
 * 2014_10_12_0000002_create_user_table.php.php : PHP
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
 * Time: 8:09 PM
 *
 * @package ${NAMESPACE}
 * @version 1.0
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fks_user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('cpf_cnpj',14);
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('zip_code',8)->nullable();
            $table->string('city')->nullable();
            $table->string('uf',2)->nullable();
            $table->string('url')->nullable();
            $table->string('mail');
            $table->string('login',20);
            $table->string('password',255);
            $table->string('ind_tp_client', 10)->nullable();
            $table->string('ind_st_client', 10)->nullable();
            $table->timestamps(); // cria colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fks_user');
    }
}