<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration {

	public function up()
	{
		Schema::create('about_us', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->string('image');
			$table->integer('feature_id');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('about_us');
	}
}
