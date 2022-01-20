<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {   
            $table->integer('ci')->unsigned();
            $table->date('fecha_inicio'); 
            $table->date('fecha_fin'); 
            $table->foreign('ci')->references('ci')->on('users');
        });

        DB::table('empleado')->insert(array('ci' => '824562091','fecha_inicio'=>'2021/1/12','fecha_fin'=>'2022/1/12'));
        DB::table('empleado')->insert(array('ci' => '9719822','fecha_inicio'=>'2021/1/12','fecha_fin'=>'2022/1/12'));
        DB::table('empleado')->insert(array('ci' => '87634201','fecha_inicio'=>'2021/1/12','fecha_fin'=>'2022/1/12'));
        DB::table('empleado')->insert(array('ci' => '72543190','fecha_inicio'=>'2021/1/12','fecha_fin'=>'2022/1/12'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
