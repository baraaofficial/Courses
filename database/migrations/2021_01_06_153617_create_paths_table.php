<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathsTable extends Migration {

	public function up()
	{
		Schema::create('paths', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('paths');
	}
}
