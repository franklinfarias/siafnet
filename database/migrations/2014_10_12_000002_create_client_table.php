<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fks_client', function (Blueprint $table) {
            $table->increments('id_client');
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('fks_user');
            $table->string('cpf_cnpj',14);
            $table->string('short_name', 15)->nullable();
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
        Schema::dropIfExists('fks_client');
    }
}
