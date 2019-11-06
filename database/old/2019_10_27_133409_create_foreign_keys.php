<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('profil_id')->references('id')->on('profils')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('civilite_id')->references('id')->on('civilites')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('ville_id')->references('id')->on('villes')
                ->onDelete('cascade');
        });


        Schema::table('accessoirepublicites', function (Blueprint $table) {
            $table->foreign('typeannonce_id')->references('id')->on('typeannonces')
                ->onDelete('cascade');
        });
        Schema::table('accessoirepublicites', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });


        Schema::table('commentaires', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('commentaires', function (Blueprint $table) {
            $table->foreign('media_id')->references('id')->on('medias')
                ->onDelete('cascade');
        });


        Schema::table('dons', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });


        Schema::table('medias', function (Blueprint $table) {
            $table->foreign('categorie_id')->references('id')->on('categories')
                ->onDelete('cascade');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });


        Schema::table('tchats', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });


        Schema::table('villes', function (Blueprint $table) {
            $table->foreign('countrie_id')->references('id')->on('villes')
                ->onDelete('cascade');
        });
    }
}
