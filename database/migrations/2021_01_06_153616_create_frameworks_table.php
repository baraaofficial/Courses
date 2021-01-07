<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameworksTable extends Migration {

	public function up()
	{
		Schema::create('frameworks', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('language_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('frameworks');
	}
}
