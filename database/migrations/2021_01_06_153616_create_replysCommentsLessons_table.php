<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplysCommentsLessonsTable extends Migration {

	public function up()
	{
		Schema::create('replysCommentsLessons', function(Blueprint $table) {
			$table->increments('id');
			$table->text('reply');
			$table->string('comment_id');
			$table->string('user_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('replysCommentsLessons');
	}
}
