<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateMemberOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_member_office', function (Blueprint $table) {
            $table->increments('id_member_office');
            $table->integer('id_member')->unsigned();
            $table->foreign('id_member')->references('id_member')->on('siaf_member');
            $table->integer('id_office')->unsigned();
            $table->foreign('id_office')->references('id_office')->on('siaf_office');
            $table->date('dt_initial');
            $table->date('dt_finish')->nullable();
            $table->string('observation', 255)->nullable();
            $table->string('ind_tp_member_office', 10)->nullable();
            $table->string('ind_st_member_office', 10)->nullable();
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
        Schema::dropIfExists('siaf_member_office');
    }
}
