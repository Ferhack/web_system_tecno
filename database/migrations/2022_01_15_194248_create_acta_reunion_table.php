<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaReunionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acta_reunion', function (Blueprint $table) {
            $table->increments('nro_acta');
            $table->date('fecha_reunion'); 
            $table->string('descripcion',255);  
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
        Schema::dropIfExists('acta_reunion');
    }
}
