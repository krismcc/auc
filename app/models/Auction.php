<?php

class Auction extends \Eloquent {
    
    protected $table = 'auction';
    
    protected $fillable = ['auctioneer_id', 'startdate', 'title', 'location', 'description', 'contact_phone', 'auction_house_name', 'contact_email'];
        
    public function items()
    {
        return $this->belongsToMany('Item');
    }
        
    public function auctioneer()
    {
        return $this->belongsTo('User');
    }
}