<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aporte', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('descripcion',255); 
            $table->date('fecha_inicio_pago'); 
            $table->decimal('monto'); 
            $table->date('fecha_limite'); 
            $table->smallInteger('porcentaje_mora'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aporte');
    }
}
