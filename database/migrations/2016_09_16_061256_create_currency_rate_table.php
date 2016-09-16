<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrencyRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currency_rate', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('usd', 10, 0)->index('usd');
			$table->float('uah', 10, 0)->index('uah');
			$table->float('eur', 10, 0)->index('eur');
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
		Schema::drop('currency_rate');
	}

}
