<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoryRelationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('category_relations', function(Blueprint $table)
		{
			$table->foreign('child_category_id', 'category_relations_ibfk_1')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('parent_category_id', 'category_relations_ibfk_2')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('category_relations', function(Blueprint $table)
		{
			$table->dropForeign('category_relations_ibfk_1');
			$table->dropForeign('category_relations_ibfk_2');
		});
	}

}
