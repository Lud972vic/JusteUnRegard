<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeannoncesTable extends Migration {

	public function up()
	{
		Schema::create('typeannonces', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('lib_type_ann', 9)->unique();
		});
	}

	public function down()
	{
		Schema::drop('typeannonces');
	}
}