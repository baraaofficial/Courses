<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsOptionsTable extends Migration {

	public function up()
	{
		Schema::create('questions_options', function(Blueprint $table) {
			$table->increments('id');
			$table->string('option');
			$table->boolean('correct');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('questions_options');
	}
}
