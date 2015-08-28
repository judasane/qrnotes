<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cartones', function(Blueprint $table){
			$table->increments("id");
			$table->string("estado");
			$table->string("alias");
			$table->integer("cant_notes");
			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cartones');
	}

}
