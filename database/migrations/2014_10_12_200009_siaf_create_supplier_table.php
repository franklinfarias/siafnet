<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('siaf_supplier', function (Blueprint $table) {
            $table->increments('id_supplier');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->string('short_name', 15)->nullable();
            $table->string('name');
            $table->string('mail')->nullable();
            $table->string('cpf_cnpj',14)->nullable();
            $table->string('phones',30)->nullable();
            $table->string('ind_st_supplier',10)->nullable();
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
        Schema::dropIfExists('siaf_supplier');
    }
}
