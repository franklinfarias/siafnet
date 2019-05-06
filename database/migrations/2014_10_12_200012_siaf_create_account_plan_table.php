<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateAccountPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_account_plan', function (Blueprint $table) {
            $table->increments('id_account_plan');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->integer('id_sub_account_plan')->unsigned()->nullable();
            $table->foreign('id_sub_account_plan')->references('id_account_plan')->on('siaf_account_plan');
            $table->string('code', 15)->nullable();
            $table->string('name');
            $table->string('ind_fnc_account_plan',10)->nullable();
            $table->string('ind_tp_account_plan',10)->nullable();
            $table->string('ind_st_account_plan',10)->nullable();
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
        Schema::dropIfExists('siaf_account_plan');
    }
}
