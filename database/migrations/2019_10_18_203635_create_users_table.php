<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->string('email', 255)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password', 255);
			$table->rememberToken();
			$table->string('pseudo_adh', 50);
			$table->string('prenom_adh', 50);
			$table->date('dt_naiss_adh')->nullable();
			$table->string('photo_adh', 255)->nullable();
			$table->text('descrip_adh')->nullable();
			$table->string('telephone_adh', 15)->unique()->nullable();
			$table->string('cpt_instagram', 255)->nullable();
			$table->string('cpt_facebook', 255)->nullable();
			$table->string('cpt_rs_autre', 255)->nullable();
			$table->string('ip_adh', 30)->nullable();
			$table->boolean('is_admin')->default(0);
			$table->integer('compte_id')->unsigned()->default(3);
			$table->integer('profil_id')->unsigned();
			$table->integer('civilite_id')->unsigned();
			$table->integer('ville_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
