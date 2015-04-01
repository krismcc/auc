@extends('layouts/layout')

@section('content')
<h1 style="margin: auto"> {{$auctionid->title}}</h1>
<div class="container">
@foreach ($items as $item)
     <div class="panel panel-default" style="width:800px" style="height:200px" style="position: absolute">

        <div class="panel-heading">
           {{link_to("/items/{$item->id}", $item->title) }}
         </div>

        <div class="panel-body" style="height: 200px">
            {{$item->description}}
            <br>
            {{"Auction House:", $item->description}}
            <br>
            {{"Locations:", $item->location}}
            <br>
            {{"Contact Number:", $item->contact_phone}}
            <br>
            {{"Auction Start Date:", $item->startdate}}
            <br>
        </div>


    </div>

@endforeach
</div>

{{$items->links() }}