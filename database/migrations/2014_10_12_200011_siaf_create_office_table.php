<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_office', function (Blueprint $table) {
            $table->increments('id_office');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->integer('id_department')->unsigned();
            $table->foreign('id_department')->references('id_department')->on('siaf_department');
            $table->string('short_name', 15)->nullable();
            $table->string('name');
            $table->string('ind_st_office',10)->nullable();
            $table->string('ind_tp_office',10)->nullable();
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
        Schema::dropIfExists('siaf_office');
    }
}
