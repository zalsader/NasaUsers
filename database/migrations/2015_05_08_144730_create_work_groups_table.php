<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('description');
			$table->string('permalink');
			$table->timestamps();
		});
		Schema::create('user_work_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('work_group_id')->unsigned();
			$table->foreign('work_group_id')->references('id')->on('work_groups');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_work_group');
		Schema::drop('work_groups');
	}

}
