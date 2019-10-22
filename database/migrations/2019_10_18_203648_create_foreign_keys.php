<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('profil_id')->references('id')->on('profils')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('civilite_id')->references('id')->on('civilites')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('ville_id')->references('id')->on('villes')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('accessoirepublicites', function(Blueprint $table) {
			$table->foreign('typeannonce_id')->references('id')->on('typeannonces')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('accessoirepublicites', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->foreign('media_id')->references('id')->on('medias')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('dons', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('medias', function(Blueprint $table) {
			$table->foreign('categorie_id')->references('id')->on('categories')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('medias', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('tchats', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('villes', function(Blueprint $table) {
			$table->foreign('countrie_id')->references('id')->on('villes')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_compte_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_profil_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_civilite_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_ville_id_foreign');
		});
		Schema::table('accessoirepublicites', function(Blueprint $table) {
			$table->dropForeign('accessoirepublicites_typeannonce_id_foreign');
		});
		Schema::table('accessoirepublicites', function(Blueprint $table) {
			$table->dropForeign('accessoirepublicites_user_id_foreign');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->dropForeign('commentaires_user_id_foreign');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->dropForeign('commentaires_media_id_foreign');
		});
		Schema::table('dons', function(Blueprint $table) {
			$table->dropForeign('dons_user_id_foreign');
		});
		Schema::table('medias', function(Blueprint $table) {
			$table->dropForeign('medias_categorie_id_foreign');
		});
		Schema::table('medias', function(Blueprint $table) {
			$table->dropForeign('medias_user_id_foreign');
		});
		Schema::table('tchats', function(Blueprint $table) {
			$table->dropForeign('tchats_user_id_foreign');
		});
		Schema::table('villes', function(Blueprint $table) {
			$table->dropForeign('villes_countrie_id_foreign');
		});
	}
}