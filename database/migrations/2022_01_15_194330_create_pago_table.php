<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('nro_pago');
            $table->date('fecha_pago'); 
            $table->decimal('monto_total'); 
            $table->string('comprobante',255); 
            $table->integer('ci_empleado')->unsigned();
            $table->foreign('ci_empleado')->references('ci')->on('users');
            $table->integer('ci_socio')->unsigned();
            $table->foreign('ci_socio')->references('ci')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago');
    }
}
