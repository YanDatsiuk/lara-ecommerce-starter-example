<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index('product_id');
			$table->integer('image_id')->unsigned()->index('image_id');
			$table->enum('media_type', array('App\Product'))->default('App\Product')->index('media_type');
			$table->timestamps();
			$table->unique(['product_id','image_id'], 'product_id_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_images');
	}

}
