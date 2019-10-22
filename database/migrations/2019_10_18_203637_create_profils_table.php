<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilsTable extends Migration {

	public function up()
	{
		Schema::create('profils', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('profil', 50)->unique();
		});
	}

	public function down()
	{
		Schema::drop('profils');
	}
}