<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seo_translations', function(Blueprint $table)
		{
			$table->increments('id');
			//Translatable attributes
			$table->string('meta_title');
			$table->text('meta_keywords');
			$table->text('meta_description');
			$table->string('facebook_title');
			$table->text('facebook_description');
			$table->string('twitter_title');
			$table->text('twitter_description');
		    // Translatable attributes

		    $table->integer('seo_id')->unsigned()->index();
		    $table->foreign('seo_id')->references('id')->on('seo')->onDelete('cascade');

		    $table->integer('locale_id')->unsigned()->index();
		    $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');

		    $table->unique(['seo_id', 'locale_id']);

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
		Schema::drop('seo_translations');
	}

}
