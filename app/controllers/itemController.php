<?php

    use domain\Forms\BidForm;

class ItemController extends \BaseController {
        private $BidForm;
       // public $itemId = Item::id;
        /**
        * @param createAuctionForm $createAuctionForm
        */
        function __construct(BidForm $BidForm)
        {
             $this->BidForm = $BidForm;
        }
	/**
	 * Display a listing of the resource.
	 * GET /item
	 *
	 * @return Response
	 */
	public function index()
	{
             $allItems = Item::paginate(1);
             return View::make('items.index', ['allItems' => Item::paginate(1)]);

//		$query = Request::get('q');
//                
//                if($query){
//                 $items = Item::where('title', 'LIKE', "%$query%")->get();
//                
//                    if($items){
//                     //return $items;
//                    return View::make('items.index')->with('items', $items);
//                    }
//                }
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /item/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /item
	 *
	 * @return Response
	 */
	public function store()
	{
        if(Request::ajax()){
            
            $input = Input::only('item_id', 'bidder_id', 'bid_amount', 'permission');
            //assign user_id in the array to the id of he authenticated (and previously validated) data
            $input['bidder_id'] = Auth::User()->id;
            //manually assigning auction id until auction dropdown can be creaed and validation performed 
            $input['permission'] = 'auctioneer'; 
            return Bid::create($input);    
            
            }
                                
        }            
//                        if(Request::ajax()){
//
//		$input = Input::only('item_id', 'user_id', 'bid_amount', 'permission');
//               // var_dump($input['item_id']);
//          //  assign data to new variable
//           // $updated_input = Input::all();
//            //assign user_id in the array to the id of he authenticated (and previously validated) data
//            $input['user_id'] = Auth::User()->id;
//            //manually assigning auction id until auction dropdown can be creaed and validation performed 
//           // $updated_input['item_id'] = id;
//            $input['permission'] = 'auctioneer';
//            var_dump($input);
//            
//           
//            //var_dump($test);
//            //create a new entry in item table using the item model and the created data
//            //var_dump($input);
//            $bid = Bid::create($input);
//                        }

	/**
	 * Display the specified resource.
	 * GET /item/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            if(Auth::check()){

                $item = Item::find($id);
                //find higest bid fo item_auction id 
                $winningBid = Item::find($id)->bids()->max('bid_amount');
                $bidHistory = Item::find($id)->bids->take(7);
                // var_dump($item->user_id);
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
            else {
                    return Redirect::home();

            }

	}
        
        public function bids($id){
            $bidHistory = Item::find($id)->bids;

            if(Request::ajax()){
                return $bidHistory;
                //return $bidHistory;
            }
        }


	/**
	 * Show the form for editing the specified resource.
	 * GET /item/{id}/edit
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
	 * PUT /item/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /item/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        
        public function complete()
        {
            if(Request::ajax()){
                $input = Input::only('item_id', 'user_id', 'sale_price', 'paddle_number');

                $check = Purchase::where('item_id', $input['item_id'])->get()->toArray();
                var_dump($check);
                
                
                //console.log($input);
                //assign user_id in the array to the id of he authenticated (and previously validated) data
                $input['buyer_id'] = Auth::User()->id;
                //manually assigning auction id until auction dropdown can be creaed and validation performed 
             // console.log($input['paddle_number']);
                return Purchase::create($input);
               }
        }

}