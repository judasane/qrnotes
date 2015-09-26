<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fileentries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('filename');
			$table->string('mime');
			$table->string('original_filename');
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
		Schema::table('fileentries', function(Blueprint $table)
		{
			Schema::drop('fileentries');
		});
	}

}
