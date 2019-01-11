<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_customer', function (Blueprint $table) {
            $table->increments('id_customer');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->string('full_name');
            $table->string('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('phones', 50)->nullable();
            $table->date('dt_birthday')->nullable();
            $table->string('mail', 150)->nullable();
            $table->string('url_site', 150)->nullable();
            $table->binary('photo')->nullable();
            $table->string('cpf_cnpj', 20)->nullable();
            $table->string('rg_ie', 20)->nullable();
            $table->string('login', 20)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('ind_tp_customer', 10)->nullable();
            $table->string('ind_education', 10)->nullable();
            $table->string('ind_gender', 10)->nullable();
            $table->string('ind_marital_status', 10)->nullable();
            $table->string('ind_occupation', 10)->nullable();
            $table->string('ind_st_customer', 10)->nullable();
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
        Schema::dropIfExists('siaf_customer');
    }
}
