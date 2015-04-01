<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('item_id')->unsigned();
			$table->integer('buyer_id')->unsigned();
                        $table->float('sale_price');
			$table->timestamps();
                        $table->foreign('item_id')->references('id')->on('item');
                        $table->foreign('buyer_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase');
	}

}
