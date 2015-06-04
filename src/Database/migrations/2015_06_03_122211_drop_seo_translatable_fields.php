<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSeoTranslatableFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seo', function(Blueprint $table)
		{
			$table->dropColumn('meta_title');
			$table->dropColumn('meta_keywords');
			$table->dropColumn('meta_description');
			$table->dropColumn('facebook_title');
			$table->dropColumn('facebook_description');
			$table->dropColumn('twitter_title');
			$table->dropColumn('twitter_description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seo', function(Blueprint $table)
		{
			$table->string('meta_title');
			$table->text('meta_keywords');
			$table->text('meta_description');
			$table->string('facebook_title');
			$table->text('facebook_description');
			$table->string('twitter_title');
			$table->text('twitter_description');
		});
	}

}
