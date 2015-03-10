<?php

class Purchase extends \Eloquent {
    
	protected $fillable = [];

        public function buyer(){
            return $this->hasOne('User');
        }
        
}