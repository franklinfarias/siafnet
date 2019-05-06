<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateCashFlowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_cash_flow', function (Blueprint $table) {
            $table->increments('id_cash_flow');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->integer('id_account_plan')->unsigned();
            $table->foreign('id_account_plan')->references('id_account_plan')->on('siaf_account_plan');
            // References
            $table->integer('id_bank')->unsigned()->nullable();
            $table->foreign('id_bank')->references('id_bank')->on('siaf_bank');
            $table->integer('id_supplier')->unsigned()->nullable();
            $table->foreign('id_supplier')->references('id_supplier')->on('siaf_supplier');
            $table->integer('id_customer')->unsigned()->nullable();
            $table->foreign('id_customer')->references('id_customer')->on('siaf_customer');
            // fields
            $table->string('num_document', 20)->nullable();
            //$table->string('year_month_ref', 6)->nullable();
            $table->date('dt_emission')->nullable();
            $table->date('dt_expired');
            $table->date('dt_payment')->nullable();
            $table->decimal('vl_amount',11,2);
            $table->decimal('vl_payment',11,2)->nullable();
            $table->text('comment')->nullable();

            $table->string('ind_tp_cash_flow', 10)->nullable();
            $table->string('ind_st_cash_flow', 10)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id_user')->on('siaf_user');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id_user')->on('siaf_user');
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
        Schema::dropIfExists('siaf_cash_flow');
    }
}
