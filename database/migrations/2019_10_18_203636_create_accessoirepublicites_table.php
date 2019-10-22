<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessoirepublicitesTable extends Migration {

	public function up()
	{
		Schema::create('accessoirepublicites', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('lib_acc_pub', 255);
			$table->text('desc_acc_pub');
			$table->datetime('dt_debut_acc_pub');
			$table->datetime('dt_fin_acc_pub');
			$table->boolean('statut_visibilite_acc_pub')->default(1);
			$table->string('url_img_1_acc_pub', 255);
			$table->string('url_img_2_acc_pub', 255)->nullable();
			$table->string('url_img_3_acc_pub', 255)->nullable();
			$table->integer('typeannonce_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('accessoirepublicites');
	}
}