<?php

class Bid extends \Eloquent {
        protected $table = 'bid';

	protected $fillable = ['item_id','bidder_id','bid_amount','permission'];
        
        // a bid must be specifric to an item 
           //public function on(){
           // return $this->belongsTo('Item');       } 
} 