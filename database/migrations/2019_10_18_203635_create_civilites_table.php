<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCivilitesTable extends Migration {

	public function up()
	{
		Schema::create('civilites', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('civ', 8)->unique();
		});
	}

	public function down()
	{
		Schema::drop('civilites');
	}
}