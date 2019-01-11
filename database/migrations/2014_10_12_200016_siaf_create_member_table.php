<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_member', function (Blueprint $table) {
            $table->increments('id_member');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('fks_client');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id_customer')->on('siaf_customer');
            $table->string('code_registry',20);
            $table->date('dt_initial');
            $table->date('dt_finish')->nullable();
            $table->string('observation', 255)->nullable();
            $table->string('ind_tp_member', 10)->nullable();
            $table->string('ind_st_member', 10)->nullable();
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
        Schema::dropIfExists('siaf_member');
    }
}
