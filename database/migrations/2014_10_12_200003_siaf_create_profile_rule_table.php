<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateProfileRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_profile_rule', function (Blueprint $table) {
            $table->integer('id_profile')->unsigned();
            $table->integer('id_rule')->unsigned();
            $table->foreign('id_profile')->references('id_profile')->on('siaf_profile');
            $table->foreign('id_rule')->references('id_rule')->on('siaf_rule');
            $table->unique(array('id_profile','id_rule'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siaf_profile_rule');
    }
}
