<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateBudgetItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_budget_item', function (Blueprint $table) {
            $table->increments('id_budget_item');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->integer('id_budget')->unsigned();
            $table->foreign('id_budget')->references('id_budget')->on('siaf_budget');
            $table->integer('id_account_plan')->unsigned();
            $table->foreign('id_account_plan')->references('id_account_plan')->on('siaf_account_plan');
            $table->decimal('vl_budget', 11, 2);
            $table->string('ind_budget_restrict',10)->nullable();
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
        Schema::dropIfExists('siaf_budget_item');
    }
}
