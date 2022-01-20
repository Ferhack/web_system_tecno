<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAportePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aporte_pago', function (Blueprint $table) {
            $table->integer('nro_pago')->unsigned();
            $table->foreign('nro_pago')->references('nro_pago')->on('pago');
            $table->integer('id_aporte')->unsigned();
            $table->foreign('id_aporte')->references('id')->on('aporte');
            $table->decimal('monto_mora');
            $table->primary(['nro_pago', 'id_aporte']);
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aporte_pago');
    }
}
