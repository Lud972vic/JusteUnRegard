<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTchatsTable extends Migration {

	public function up()
	{
		Schema::create('tchats', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('msg_tchat', 255);
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('tchats');
	}
}