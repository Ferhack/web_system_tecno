<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaSocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia_socio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ci_socio')->unsigned();
            $table->foreign('ci_socio')->references('ci')->on('users');
            $table->integer('id_asistencia')->unsigned();
            $table->foreign('id_asistencia')->references('id')->on('asistencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencia_socio');
    }
}
