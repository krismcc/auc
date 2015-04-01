    @extends('layouts/layout')

    @section('content')
    <div style="width:800px; margin:0 auto;">

        <div class="starter-template">
            <a id='btnAddAuction' class='btn btn-success' href='/manageAuctions/create'> Create Auction </a> 
        </div>

    @foreach($auctions as $auction)
        <li>
            <div class="panel panel-default" style="width:800px" style="height:200px" style="position: absolute">
                <div class="panel-heading">
                    {{link_to("/auctions/{$auction->id}", $auction->title) }}
                </div>

                <div class="pSanel-body" style="height: 200px">
                    {{"Description: ", $auction->description}}
                    <br>
                    {{"Location: ", $auction->location}}
                    <br>
                    {{"Contact Phone Number:",$auction->contact_phone}}
                    <br>
                    {{"Contact Email Address:",$auction->contact_email}}

                    <!--<img src="{{ asset($auction->thumbnail) }}" type="text/css" style="height: 100px"> -->
                </div>
            </div>
            <!--{{link_to("/auctions/{$auction->id}", $auction->title) }} -->
        </li>
 
    @endforeach
   </div>