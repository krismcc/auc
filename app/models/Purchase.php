<?php

class Purchase extends Eloquent {
    
	protected $fillable = ['item_id', 'user_id', 'sale_price', 'paddle_number'];

        public function buyer(){
            return $this->hasOne('User');
        }
        
        public function item(){
            return $this->hasOne('Item');
        }
        
        
}