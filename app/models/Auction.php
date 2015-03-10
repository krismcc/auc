<?php

class Auction extends \Eloquent {
    
    protected $table = 'auction';
    
    protected $fillable = ['user_id', 'startdate', 'title', 'location', 'description', 'contact_phone'];
        
    public function items()
    {
        
        return $this->belongsToMany('Item');
    }
        
    public function auctioneer()
    {
           
        return $this->belongsTo('User');
    }
}