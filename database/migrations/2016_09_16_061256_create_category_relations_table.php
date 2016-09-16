<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryRelationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_relations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('child_category_id')->unsigned()->index('child_category_id');
			$table->integer('parent_category_id')->unsigned()->index('parent_category_id');
			$table->timestamps();
			$table->unique(['child_category_id','parent_category_id'], 'child_category_id_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_relations');
	}

}
