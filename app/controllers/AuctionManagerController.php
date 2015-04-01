<?php

    use domain\Forms\createAuctionForm;

class AuctionManagerController extends \BaseController {

      private $createAuctionForm;
        /**
        * @param createAuctionForm $createAuctionForm
        */
        function __construct(createAuctionForm $createAuctionForm)
        {
             $this->createAuctionForm = $createAuctionForm;
        }
        
	/**
	 * Display a listing of the resource.
	 * GET /auctionmanager
	 *
	 * @return Response
	 */
	public function index(){
            if(Auth::check()){
            //$auctions = Auction::where('title', '=', 'aa')->get()->toArray();
            $logged_in_user = Auth::User()->id;
            $auctions = User::find($logged_in_user)->auctions;
            return View::make('auctionManager.index', ['auctions' => $auctions]);

            }
            else{
               return Redirect::home();
            }
            
            //return View::make('auctionManager.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /auctionmanager/create
	 *
	 * @return Response
	 */
	public function create()
	{
             return View::make('auctionManager.create');

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /auctionmanager
	 *
	 * @return Response
	 */
	public function store()
	{
            //get data to be updated
            //user_id will be null because it is not an input field
            //assign data to new variable
            $updated_input = Input::all();
            //assign user_id(id of auctioneer) in the array to the id of he authenticated (and previously validated) data
            $updated_input['auctioneer_id'] = Auth::User()->id;
            //create a new entry in auction table using the auction model and the created data
            $auction = Auction::create($updated_input);
            return Redirect::route('manageAuctions.index');

            //return Redirect::auctions();
        }
	/**
	 * Display the specified resource.
	 * GET /auctionmanager/{id}
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
	 * GET /auctionmanager/{id}/edit
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
	 * PUT /auctionmanager/{id}
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
	 * DELETE /auctionmanager/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}