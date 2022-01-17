<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) { 
            $table->integer('ci')->unique();
            $table->string('nombre',255); 
            $table->string('telefono',8);
            $table->string('email',255); 
            $table->string('estado',1)->default('1');
            $table->string('password',255); 
            $table->string('direccion',255);
            $table->string('tipo_usuario',1); 
        });

        DB::table('users')->insert(array('ci' => '9719822','nombre'=>'zuleny','telefono'=>'76431901','email'=>'zuleny@gmail.com','estado'=>'1','password' => '11235813','direccion' => 'Avenida Banzer', 'tipo_usuario'=>'E'));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

