<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuctionItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auction_item', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('auction_id')->unsigned()->index();
			$table->foreign('auction_id')->references('id')->on('auction');
			$table->integer('item_id')->unsigned()->index();
			$table->foreign('item_id')->references('id')->on('item');
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
		Schema::drop('auction_item');
	}

}
