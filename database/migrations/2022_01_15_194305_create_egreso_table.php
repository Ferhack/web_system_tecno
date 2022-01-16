<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egreso', function (Blueprint $table) {
            $table->increments('nro_egreso');
            $table->string('detalle',255); 
            $table->date('fecha_egreso'); 
            $table->string('actor_receptor',255); 
            $table->integer('ci_empleado')->unsigned();
            $table->foreign('ci_empleado')->references('ci')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egreso');
    }
}
