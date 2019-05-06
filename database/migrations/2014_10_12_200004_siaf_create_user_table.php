<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->integer('id_profile')->unsigned();
            $table->foreign('id_profile')->references('id_profile')->on('siaf_profile');
            $table->string('name');
            $table->string('login',50)->unique();
            $table->string('email',250);
            $table->string('cpf',11)->nullable();
            $table->binary('signature')->nullable();
            $table->string('password',255);
            $table->binary('photo')->nullable();
            $table->rememberToken();
            $table->string('ind_st_user')->nullable();
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
        Schema::dropIfExists('siaf_user');
    }
}
