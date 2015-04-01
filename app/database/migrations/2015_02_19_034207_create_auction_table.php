<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuctionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auction', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('auctioneer_id')->unsigned();
			$table->dateTime('startdate');
                        $table->string('title');
                        $table->string('auction_house_name');
			$table->string('location');
                        $table->string('description');
			$table->integer('contact_phone');
                        $table->string('contact_email');
			$table->timestamps();
                        
                        $table->foreign('auctioneer_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auction');
	}

}
