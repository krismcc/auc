<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
        
	protected $table = 'users';

        // to protect agINst mass assignment when registering
        protected $fillable = [ 'username', 'email', 'password' ];

	protected $hidden = array('password', 'remember_token');

        //hash password
        public function setPasswordAttribute($password){ 
            
            $this->attributes['password'] = Hash::make($password);
            
        }
        
        //A user has many items
        public function itemsForSale (){
            return $this->hasMany('Item', 'seller_id');
        }
        
        public function itemsToSell (){
            
            return $this->hasMany('Item', 'auctioneer_id');
        }
        
        public function auctions(){
            
            return $this->hasMany('Auction', 'auctioneer_id');
        }
        
        public function purchases(){
            
            return $this->hasMany('Purchase');
        }

}
