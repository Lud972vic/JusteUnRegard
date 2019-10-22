<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComptesTable extends Migration {

	public function up()
	{
		Schema::create('comptes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('lib_cpt', 20)->unique();
		});
	}

	public function down()
	{
		Schema::drop('comptes');
	}
}