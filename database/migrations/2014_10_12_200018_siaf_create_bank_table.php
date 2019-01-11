<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_bank', function (Blueprint $table) {
            $table->increments('id_bank');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->string('name');
            $table->string('code',10);
            $table->string('agency', 10);
            $table->string('number_account', 20);
            $table->string('param01', 100);
            $table->string('param02', 100);
            $table->string('param03', 100);
            $table->string('param04', 100);
            $table->string('param05', 100);
            $table->string('param06', 100);
            $table->string('param07', 100);
            $table->string('param08', 100);
            $table->string('param09', 100);
            $table->string('param10', 100);
            $table->string('param11', 100);
            $table->string('param12', 100);
            $table->string('param13', 100);
            $table->string('param14', 100);
            $table->string('param15', 100);

            $table->string('ind_tp_bank', 10)->nullable();
            $table->string('ind_st_bank', 10)->nullable();
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
        Schema::dropIfExists('siaf_bank');
    }
}
