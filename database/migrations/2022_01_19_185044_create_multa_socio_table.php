<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultaSocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multa_socio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ci_socio')->unsigned();
            $table->foreign('ci_socio')->references('ci')->on('users');
            $table->integer('id_multa')->unsigned();
            $table->foreign('id_multa')->references('id')->on('multa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multa_socio');
    }
}
