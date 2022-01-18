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

        DB::table('users')->insert(array('ci' => '824562091','nombre'=>'admin','telefono'=>'68627871','email'=>'admin@gmail.com','estado'=>'1','password' => '$2y$10$aYdASNvadGXDHLnDCVbKKesg33lg5oegHeQlCC8CeFotp7j4hWKau','direccion' => 'Avenida Alemana y 4to anillo', 'tipo_usuario'=>'E'));
        DB::table('users')->insert(array('ci' => '9719822','nombre'=>'zuleny','telefono'=>'76431901','email'=>'zuleny.cr@gmail.com','estado'=>'1','password' => '$2y$10$x4rfS1iYXv65UxifZKuqHu38X/h5/2uYYZfQg833IIp1IfIxjJwZS','direccion' => 'Avenida Banzer', 'tipo_usuario'=>'E'));
        DB::table('users')->insert(array('ci' => '87634201','nombre'=>'ruddy','telefono'=>'69025431','email'=>'ruddyq18@gmail.com','estado'=>'1','password' => '$2y$10$x4rfS1iYXv65UxifZKuqHu38X/h5/2uYYZfQg833IIp1IfIxjJwZS','direccion' => 'Avenida Banzer', 'tipo_usuario'=>'E'));
        DB::table('users')->insert(array('ci' => '72543190','nombre'=>'stephani','telefono'=>'79025431','email'=>'stephani.hc@gmail.com','estado'=>'1','password' => '$2y$10$x4rfS1iYXv65UxifZKuqHu38X/h5/2uYYZfQg833IIp1IfIxjJwZS','direccion' => 'Avenida Banzer', 'tipo_usuario'=>'E'));
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

