@extends('layouts/layout')

@section('content')
<h1> Upcoming Auctions </h1>

<div class="container">
@foreach ($allAuctions as $auction)
     <div class="panel panel-default" style="width:800px" style="height:200px" style="position: absolute">

        <div class="panel-heading">
           {{link_to("/auctions/{$auction->id}", $auction->title) }}
         </div>

        <div class="panel-body" style="height: 200px">
            {{$auction->description}}
            <br>
            {{"Auction House:", $auction->auction_house_name}}
            <br>
            {{"Locations:", $auction->location}}
            <br>
            {{"Contact Number:", $auction->contact_phone}}
            <br>
            {{"Auction Start Date:", $auction->startdate}}
            <br>
        </div>


    </div>

@endforeach
</div>
{{$allAuctions->links() }}