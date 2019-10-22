<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVillesTable extends Migration {

	public function up()
	{
		Schema::create('villes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('code_postal_ville_geo', 5);
			$table->string('nom_ville_geo', 50);
			$table->smallInteger('region_ville_geo');
			$table->decimal('latitude_ville_geo')->nullable();
			$table->decimal('longitude_ville_geo')->nullable();
			$table->decimal('eloignement_ville_geo')->nullable();
			$table->integer('countrie_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('villes');
	}
}