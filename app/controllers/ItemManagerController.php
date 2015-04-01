<?php
    
    use domain\Forms\createItemForm;
    
class ItemManagerController extends \BaseController {
    
      private $createItemForm;
        /**
        * @param createItemForm $createItemForm
        */
        function __construct(createItemForm $createItemForm)
        {
             $this->createItemForm = $createItemForm;
        }
	/**
	 * Display a listing of the resource.
	 * GET /itemmanager
	 *
	 * @return Response
	 */
	public function index()
	{     
            if(Auth::check()){
            $logged_in_user = Auth::User()->id;
            $itemsToSell = User::find($logged_in_user)->itemsToSell;
            $itemsForSale = User::find($logged_in_user)->itemsForSale;
            
            return View::make('ItemManager.index', ['itemsToSell' => $itemsToSell, 'itemsForSale' => $itemsForSale]);
            
            }
	}
        
	/**
	 * Show the form for creating a new resource.
	 * GET /itemmanager/create
	 *
	 * @return Response
	 */
	public function create()
	{
            //creates a linked list of auction title and id and passes it to create item page
            $auctions = Auction::lists('title', 'id');
            $users = User::lists('email', 'id');
            //var_dump($auctions);
            return View::make('ItemManager.create', array('auctions' => $auctions, 'users' => $users));
            //return View::make('ItemManager.create', compact('users', 'auctions'));

            //compact('item', 'winningBid', 'bidHistory')
	}
        
	/**
	 * Store a newly created resource in storage.
	 * POST /itemmanager
	 *
	 * @return Response
	 */
	public function store()
	{     
             //check if image has been uploaded
            if(Input::hasFile('thumbnail')){
                $file = Input::file('thumbnail');
                // move image to real path
                $file->move(public_path().'/images/', time(). '-'.$file->getClientOriginalName());
                //store image as inm relation to public foler(necessary for php to access it)
                $originalName = $file->getClientOriginalName();
                $storage = "images/".time()."-".$originalName;
            } 
            
            //get data to be updated
            $updated_input = Input::all();
            
            //assiogn thumbnail field to be relational path
            $updated_input['thumbnail'] = $storage;
            
            //assign user_id in the array to the id of he authenticated (and previously validated) data
            $updated_input['auctioneer_id'] = Auth::User()->id;
            $updated_input['seller_id'] = $updated_input['user_email'];
             
            //create a new entry in item table using the item model and the created data
            $item = Item::create($updated_input);
            $auction_id = $updated_input['auction_title'];
            $selected_auction = Auction::find($auction_id);
            // $lastinsert = DB::getPdo()->lastInsertId();
            $selected_auction->items()->attach($item->id);
          
            return Redirect::route('manageItems.index');
	}
        
	/**
	 * Display the specified resource.
	 * GET /itemmanager/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
        
	/**
	 * Show the form for editing the specified resource.
	 * GET /itemmanager/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}
        
	/**
	 * Update the specified resource in storage.
	 * PUT /itemmanager/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            //get the id of the item being update 
            $updated_input = Input::all();
            $id = $updated_input['item_id'];
            
            //find tyhe item 
            // this is so that the item can be updated and the view can be refreshed with correct info 
	    $item = Item::find($id);
            $item->title = $updated_input['title'];
            $item->description = $updated_input['description'];
            $item->reserve = $updated_input['reserve'];
            $item->save();
            
            //find higest bid fo item_auction id 
            $winningBid = Item::find($id)->bids()->max('bid_amount');
            $bidHistory = Item::find($id)->bids->take(7);
            
            if(Request::ajax()){
                return $winningBid;
                //return $bidHistory;
            }
            // return the view for the auctioneer if the item being viewed if being viewed by the registered auctioneer
            if(Auth::User()->id == $item->auctioneer_id){
                return View::make('items.auctioneer', compact('item', 'winningBid', 'bidHistory'));
            }
            else{
                return View::make('items.show', compact('item', 'winningBid', 'bidHistory'));;
            }

	}
        
	/**
	 * Remove the specified resource from storage.
	 * DELETE /itemmanager/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
}