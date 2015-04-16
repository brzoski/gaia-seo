<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('meta_title');
			$table->text('meta_keywords');
			$table->text('meta_description');
			$table->string('facebook_title');
			$table->text('facebook_description');
			$table->string('facebook_image');
			$table->string('twitter_title');
			$table->text('twitter_description');
			$table->string('twitter_image');
			$table->integer('seoable_id');
			$table->string('seoable_type');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seo');
	}

}
