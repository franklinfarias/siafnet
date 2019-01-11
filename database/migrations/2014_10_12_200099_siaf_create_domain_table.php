<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiafCreateDomainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siaf_domain', function (Blueprint $table) {
            $table->string('name_column',200)->nullable();
            $table->string('desc_code',10)->nullable();
            $table->string('desc_status',200)->nullable();
            $table->string('ind_st_domain',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siaf_domain');
    }
}
