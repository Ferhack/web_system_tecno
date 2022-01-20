<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultaPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multa_pago', function (Blueprint $table) {
            $table->integer('nro_pago')->unsigned();
            $table->foreign('nro_pago')->references('nro_pago')->on('pago');
            $table->integer('id_multa')->unsigned();
            $table->foreign('id_multa')->references('id')->on('multa'); 
            $table->primary(['nro_pago', 'id_multa']);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multa_pago');
    }
}
