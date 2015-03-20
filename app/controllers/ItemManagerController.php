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
            $items = User::find($logged_in_user)->items;
           //var_dump($items);
            return View::make('ItemManager.index', ['items' => $items]);
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
            
            //var_dump($auctions);
            return View::make('ItemManager.create', array('auctions' => $auctions));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /itemmanager
	 *
	 * @return Response
	 */
	public function store()
	{
	//get data to be updated
            //user_id will be null because it is not an input field
            $input = Input::only('user_id', 'title', 'description', 'reserve');
            //assign data to new variable
            $updated_input = Input::all();
            //assign user_id in the array to the id of he authenticated (and previously validated) data
            $updated_input['user_id'] = Auth::User()->id;
            //manually assigning auction id until auction dropdown can be creaed and validation performed 
            //$updated_input['auction_id'] = 1;
            
           
            //var_dump($test);
            //create a new entry in item table using the item model and the created data
            
            $item = Item::create($updated_input);
             $auction_id = $updated_input['auction_title'];
            $selected_auction = Auction::find($auction_id);
           // $lastinsert = DB::getPdo()->lastInsertId();
           $selected_auction->items()->attach($item->id);
          return Redirect::route('manageItems.index');

         //  var_dump($selected_auction);
          // var_dump($auction_id);
            //var_dump($item->id);
            //var_dump($lastinsert);
            //Auth::login($auction);
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
		//
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