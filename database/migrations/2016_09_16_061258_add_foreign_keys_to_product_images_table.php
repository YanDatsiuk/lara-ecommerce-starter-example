<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_images', function(Blueprint $table)
		{
			$table->foreign('product_id', 'product_images_ibfk_1')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('image_id', 'product_images_ibfk_2')->references('id')->on('images')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_images', function(Blueprint $table)
		{
			$table->dropForeign('product_images_ibfk_1');
			$table->dropForeign('product_images_ibfk_2');
		});
	}

}
