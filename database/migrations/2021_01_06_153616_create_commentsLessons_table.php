<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsLessonsTable extends Migration {

	public function up()
	{
		Schema::create('commentsLessons', function(Blueprint $table) {
			$table->increments('id');
			$table->text('comment');
			$table->string('lesson_id');
			$table->string('user_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('commentsLessons');
	}
}
