<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('username')->unique();
			$table->text('bio')->nullable();
			$table->string('phone')->unique();
			$table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('location')->nullable();
            $table->string('theme')->default('1');
            $table->boolean('status')->default('1');
            $table->boolean('language')->default('1');
            $table->string('image');
            $table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}
