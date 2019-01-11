<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_budget', function (Blueprint $table) {
            $table->increments('id_budget');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->string('code', 15)->nullable();
            $table->string('name');
            $table->string('year_month_ref', 6);
            $table->string('ind_tp_budget',10)->nullable();
            $table->string('ind_st_budget',10)->nullable();
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
        Schema::dropIfExists('siaf_budget');
    }
}
