<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id')->index();
      $table->string('url');
      $table->integer('weight');
			$table->boolean('external');
			$table->timestamps();
		});

		Schema::create('menu_translations', function(Blueprint $table)
		{
			$table->increments('id')->index();
      $table->string('locale')->index();
      $table->integer('menu_id')->unsigned();
      $table->string('title');
      $table->unique(['menu_id','locale']);
      $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
    });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_translations');
		Schema::drop('menus');
	}
}
