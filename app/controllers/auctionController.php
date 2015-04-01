<?php

class AuctionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /auction
	 *
	 * @return Response
	 */
	public function index()
	{   $allAuctions = Auction::paginate(1);
            return View::make('auctions.index', ['allAuctions' => Auction::paginate(1)]);
            //$auctions = Auction::all();

            //return View::make('auctions.index', ['auctions' => $auctions]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /auction/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /auction
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /auction/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            //find the auction from the $id passed
            $auctionid = Auction::whereid($id)->first();
            
            //find all the items linked to that auction
            //$item = Auction::with('items')->get()->find($auctionid)->items->all();
            $items = Auction::with('items')->get()->find($auctionid)->items()->paginate(1);

            //return View::make('auctions.show', ['item' => $item]);
            return View::make('auctions.show', compact('items', 'auctionid'));


	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /auction/{id}/edit
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
	 * PUT /auction/{id}
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
	 * DELETE /auction/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}