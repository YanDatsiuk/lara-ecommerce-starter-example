<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index('category_id');
			$table->string('title', 250)->index('title');
			$table->string('description', 5000);
			$table->string('slug', 200)->unique('slug');
			$table->enum('status', array('public','archive','private',''))->default('private')->index('status');
			$table->float('price_usd', 10, 0)->nullable()->index('price_usd');
			$table->float('price_uah', 10, 0)->nullable()->index('price_uah');
			$table->float('price_eur', 10, 0)->nullable()->index('price_eur');
			$table->enum('selected_currency', array('usd','uah','eur'))->nullable()->index('selected_currency');
			$table->enum('condition', array('new','used'))->default('used')->index('condition');
			$table->timestamps();
			$table->softDeletes()->index('deleted_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
