<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
            $table->string('keyword');
			$table->text('content');
			$table->string('phone');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('linkedin');
			$table->string('youtube');
			$table->string('instagram');
			$table->string('mail');
			$table->boolean('status')->default('1');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
