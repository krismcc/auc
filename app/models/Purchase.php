<?php

class Purchase extends Eloquent {
        
	protected $fillable = ['item_id', 'buyer_id', 'sale_price'];

        protected $table = 'purchase';

        public function buyer(){
            
            return $this->hasOne('User');
        }
        
        public function item(){
            
            return $this->hasOne('Item');
        }
        
        
}