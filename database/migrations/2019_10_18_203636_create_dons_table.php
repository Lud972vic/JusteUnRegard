<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonsTable extends Migration {

	public function up()
	{
		Schema::create('dons', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('lib_don', 50);
			$table->integer('montant_don')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('dons');
	}
}