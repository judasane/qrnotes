<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cursos', function(Blueprint $table) {
            $table->increments("id");
            $table->string("nombre");
            $table->string("codigo");
            $table->string("profesor");
            $table->string("grupo");
            $table->timestamps();
        });
        DB::table('cursos')->insert([
            
            ['nombre' => "ninguno",
                'codigo' => "ninguno",
                'profesor' => "ninguno",
                'grupo' => "ninguno",
            ],]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cursos');
    }

}
