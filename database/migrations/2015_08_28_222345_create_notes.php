<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('notes', function(Blueprint $table) {
            $table->increments("id");
            $table->integer('pack_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->text('titulo',30);
            $table->text('descripcion');
            $table->text("contenido");
            $table->integer("numero");
            $table->enum('tipo', ['imagen', 'video', 'audio', 'url']);
            $table->timestamps();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('notes');
    }

}
