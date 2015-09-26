<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string("apellido");
            $table->enum('genero', ['masculino', 'femenino']);
            $table->string('email')->unique();
            $table->string("carrera");
            $table->date("nacimiento");
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            ['nombre' => "qrnotes",
                'apellido' => "qrnotes",
                'genero' => "femenino",
                'email' => "contacto@qrnotes.co",
                'carrera' => "",
                "password" => "ñslldfasd98070",
                'nacimiento' => "2015-09-1"
            ],]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
