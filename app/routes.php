<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------

all routes for my applications are explicitly defined here, making a concious effort to avoid implicit routing except where 
routes are automaticallly implicit e.g cntroller/create is an inherited route from a restful controller
*/

#home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

#sign up / register
Route::get('/register', 'RegistrationController@create');
Route::post('/register',['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

#authenticate
Route::get('login',['as' => 'login', 'uses' => 'sessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

#manage auctions 
Route::resource('/manageAuctions', 'AuctionManagerController');
Route::post('/manageAuctions',['as' => 'manageAuctions.store', 'uses' => 'AuctionManagerController@store']);

#manage items
Route::resource('/manageItems', 'ItemManagerController');

#auction
Route::get('/auctions', ['as' => 'auctions', 'uses' => 'auctionController@index']);
Route::get('/auctions/{id}', 'auctionController@show');

#items
Route::post('/items/complete',['as' => 'items.complete', 'uses' => 'itemController@complete']);
Route::get('/items/bids/{id}', 'itemController@bids');
Route::get('/items', ['as' => 'items', 'uses' => 'itemController@index']);
Route::get('/items/{id}', 'itemController@show');
Route::post('/items/{id}',['as' => 'items.store', 'uses' => 'itemController@store']);


//Route::post('/items/{id}', array('uses' => 'itemController@postBid'));



//Route::get('item/{id}', function()
//{
//return ;
    
//});








#test 
Route::get('/test', function (){
    
    var_dump(User::find(1)->itemsToSell);
//$test = User::first();
 //   $te = $test->items->toArray();
//return var_dump($te);
//$user = User::where('username', '=', 'kris');
//var_dump($user);
//    if(Auth::check()){
//    $user1 = Auth::User()->id;
//    //var_dump(Auth::User()->username);
//    //var_dump($user1);
//    return User::find(1)->auctions->toArray();
//    } 

//return $user(1)->toArray();
//return User::find(1);
    
 //return Item::all();  
    }
    
    
    
    
);