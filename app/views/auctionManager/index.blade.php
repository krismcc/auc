@extends('layouts/layout')

@section('content')

      <div class="starter-template">
            <a id='btnAddAuction' class='btn btn-success' href='/manageAuctions/create'> Create Auction </a> 
      </div>



@foreach($auctions as $auction)
<li>
    {{link_to("/auctions/{$auction->id}", $auction->title) }}
</li>
@endforeach
