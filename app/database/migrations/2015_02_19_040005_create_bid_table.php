<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBidTable extends Migration {
                                
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bid', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->integer('bidder_id')->unsigned();
			$table->float('bid_amount');
			$table->string('permission');
			$table->timestamps();           
                        $table->foreign('item_id')->references('id')->on('item');
                        $table->foreign('bidder_id')->references('id')->on('users');


		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bid');
	}

}
