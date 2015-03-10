<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        
        /**
	 * fillable fields
	 *
	 * @var array
	 */
        
        // to protect agINst mass assignment when registering
        protected $fillable = [
            'username', 'email', 'password' 
        ];
        /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        
        //hash password
        public function setPasswordAttribute($password){ 
            $this->attributes['password'] = Hash::make($password);
            
        }
        //A user has many items
        public function items (){
            return $this->hasMany('Item');
        }
        
        public function auctions(){
            return $this->hasMany('Auction');
        }
        
        public function purchases(){
            return $this->hasMany('Purchase');
        }

}
