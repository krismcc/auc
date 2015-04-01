<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('auctioneer_id')->unsigned();
                        $table->integer('seller_id')->unsigned();
                        $table->string('title');
			$table->string('description');
			$table->decimal('reserve', 8 , 2)->nullable;
                        $table->decimal('estimation', 8 , 2)->nullable;
                        $table->string('auction_status');
                        $table->string('thumbnail');
			//$table->integer('auction_id')->unsigned();
			$table->timestamps();  
                        $table->foreign('auctioneer_id')->references('id')->on('users');
                        $table->foreign('seller_id')->references('id')->on('users');

                        //$table->foreign('auction_id')->references('id')->on('auction');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item');
	}

}
