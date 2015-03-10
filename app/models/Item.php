<?php

class Item extends \Eloquent {
    protected $table = 'item';
    
	protected $fillable = ['user_id', 'title', 'description', 'reserve', 'auction_id'];
        
        //an item  belongs to a user 
        // wattch lis concept will be added in form of a seperate table. not in itinitial group of prioritised reqs
        public function owner(){
            return $this->belongsTo('User');
        }
        //an item can belong to many auctions e.g sale ot guaraneed and can be re listed
        public function auctions()
        {
            return $this->belongsToMany('Auction');
        }
        //an item may only be bought by once
        //therefore each item may only have one entry in purchase table
        public function boughtBy (){
            return $this->hasOne('Purchase');
        }
        
        //find the bids on an item 
        public function bids(){
            return $this->hasMany('Bid');
        }
}