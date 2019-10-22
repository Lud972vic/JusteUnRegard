<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediasTable extends Migration {

	public function up()
	{
		Schema::create('medias', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom_media', 255)->unique();
			$table->string('lib_media', 255);
			$table->double('taille_media');
			$table->integer('noto_media')->unsigned();
			$table->string('url_media', 255);
			$table->text('desc_media');
			$table->string('type_fichier_media', 15);
			$table->decimal('dure_media')->default('0');
			$table->integer('categorie_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('medias');
	}
}