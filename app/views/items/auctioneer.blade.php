@extends('layouts/layout')

@section('content')

    <div class="arrang">
        
        <h1>{{$item->title}}</h1>
        <h2> {{$item->description}}</h2>
        <h3> Reserve: {{$item->reserve}}</h3>
        <h4 >Current Bid: </h4>
        <h5 id="winner"> {{$winningBid }}</h5>
        <h6>
            auctioneer
        </h6>
        
        <img src="{{ asset($item->thumbnail) }}" type="text/css" style="height: 100px">

    </div>
    
    <div class="starter-template">
        
        <legend style="color:blue;font-weight:bold;">Auction Control</legend>

        <form id="bidForm" class="row">

            <div class="form-group" id="divCheckbox" style="visibility: hidden">
                 {{ Form::hidden('item_id', $item->id, ['id' => 'itemId']) }}
                 {{ Form::hidden('user_id', Auth::User()->id, ['id' => 'userId']) }}
            </div>

            <!-- bid    -->
            <div class="form-group" style="width: 100px" style="text-align: right">
                 {{Form::label('bid_amount', 'Bid:') }}
                 {{Form::text('bid_amount', null, ['class' => 'form-control', 'id' => 'bid-amount']) }}
            </div>

            <!-- max bid   
            <div class="form-group">
                {{Form::label('max_bid', 'Max Bid:') }}
                {{Form::text('max_bid', null, ['class' => 'form-control']) }}
            </div> -->

            {{ Form::hidden('permission', "userr", ['id' => 'permission']) }}

             <!-- submit``    -->
            <div class="form-group">
                <!--  {{Form::submit('Bid', ['class' => 'btn btn-primary', 'id' => 'bid']) }}  -->
                {{Form::submit('Bid', ['class' => 'btn btn-primary submit', 'id' => 'bid']) }}
                {{Form::submit('Complete Sale', ['class' => 'btn btn-primary submit', 'id' => 'sale']) }}
            </div>

             {{ Form::close() }}
         
    </div>

    <div title="Item Management" class="accordion">
        <div class="accordion-section">
            <a class="accordion-section-title" href="#accordion-1">Update Item</a>
                <div id="accordion-1" class="accordion-section-content">

                    {{Form::model($item, ['route' => 'manageItems.update', 'method' => 'PUT']) }}
                        {{ Form::hidden('item_id', $item->id, ['id' => 'itemId']) }}
                 {{ Form::hidden('user_id', Auth::User()->id, ['id' => 'userId']) }}
                    <!-- Title -->
                    <div class="form-group">
                        {{Form::label('title', 'Title:') }}
                        {{Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
                        {{$errors->first('title', '<span class="error">:message</span>') }}
                    </div>

                    <!-- description -->
                    <div class="form-group">
                        {{Form::label('description', 'Description:') }}
                        {{Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) }}
                        {{$errors->first('description', '<span class="error">:message </span>')}}
                    </div>

                    <!-- reserve -->
                    <div class="form-group">
                        {{Form::label('reserve', 'Reserve:') }}
                        {{Form::text('reserve', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>

                     <!-- submit`` -->
                    <div class="form-group">
                        {{Form::submit('Update Item', ['class' => 'btn btn-primary']) }}
                    </div>

                    {{Form::close() }}
   
                </div>

            </br>
        </div>
        
        <div class="accordion-section">
            <a class="accordion-section-title" href="#accordion-2">Previous Bids</a>
                <div id="accordion-2" class="accordion-section-content">                 
                    <table border="1" style="width:60%" id="bidHistoryTable" class="table table-striped">
                        <th style="width: 25%" id="UserNo">User Number</th>

                        <th style="width: 30%" id="BidAmount"> Bid Amount </th>

                        <th style="width: 22%" id="BidTime"> Bid Time</th>

                        <th style="width: 23%" id="PaddleNo"> Paddle Number(If Applicable)</th>

                        @foreach($bidHistory as $bidHistory)

                            <tr>
                                <td> {{$bidHistory->user_id}} </td> 
                                <td> {{$bidHistory->bid_amount}} </td> 
                                <td> {{$bidHistory->created_at}} </td> 
                                <td> {{$bidHistory->paddle_number}} </td> 
                            </tr>
                        @endforeach
                    </table>
    
                </div>
        </div>
 
        </br>
    
   
<script>
    
var rootURL = "http://localhost:8000/items";

$(document).ready(function() {
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
 
    $('.accordion-section-title').click(function(e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
 
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();
 
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }
 
        e.preventDefault();
    });
});

$('.submit').on('click', function(e){
    e.preventDefault();
    var buttonId = $(this).attr('id');
    
    if(buttonId == 'bid'){
        postBid();
        //updateBidHistory();
    }
    else if(buttonId == 'sale'){
        completeSale();
        //var highBid = document.getElementById("winner").innerHTML;
        //console.log(highBid);
    }
    else{
         window.alert('post to purchases');
    }
    
});

function completeSale(){
    $.ajax({
         type: 'POST',
            url: "/items/complete", 
            data: prepareSaleJSON(),
            action: "http://localhost:8000/items/complete",
            dataType : "json",
            contentType : 'application/json',
            success: function(data) {
                 console.log("AJAX request was successfull"); 
            },
             failure: function() {
                    console.log("AJAX request failed");
             }
    });
}

function postBid(){
    $.ajax({
            type: 'POST',
            url: "/items/" + {{ $item->id }}, 
            data: prepareBidJSON(),
            action: "http://localhost:8000/items" + {{ $item->id }},
            dataType : "json",
            contentType : 'application/json',
            success: function(data) {
                 console.log("AJAX request was successfull");
                $('#bid-amount').val('');
            },
             failure: function() {
                    console.log("AJAX request failed");
             }

        });
}
function prepareSaleJSON() {
	return JSON.stringify({
		"item_id" : document.getElementById("itemId").getAttribute("value"),
		"buyer_id" : document.getElementById("userId").getAttribute("value"),
		"sale_price" : $("#bid-amount").val(),
	});
}

function prepareBidJSON() {
	return JSON.stringify({
		"item_id" : document.getElementById("itemId").getAttribute("value"),
		"bidder_id" : document.getElementById("userId").getAttribute("value"),
		"bid_amount" : $("#bid-amount").val(),
		"permission" : document.getElementById("permission").getAttribute("value"),
	});
}

function updateBid() {
    $.ajax({
           type: "GET", 
           url: "/items/" + {{ $item->id }},
       //  //data: form.serialize(),
         success: function(data){
           console.log(data);
        $('#winner').empty().append(data)
           }
       });
}

function updateBidHistory() {
    $.ajax({
           type: "GET", 
           url: "/items/bids/" + {{ $item->id }},
       //  //data: form.serialize(),
         success: function(data){
              //$('bidHistoryTable').replaceWith($bidHistory);
              console.log(data);
//           console.log(data);
//           var tr;
//            for (var i = 0; i < data.length; i++) {
//                tr = $('<tr/>');
//                tr.append("<td>" + data[i].bidder_id + "</td>");
//                tr.append("<td>" + data[i].bid_amount + "</td>");
//                tr.append("<td>" + data[i].created_at + "</td>");
//                tr.append("<td>" + data[i].bidder_id + "</td>");
//
//                $('bidHistoryTable').replaceWith(data);
//                console.log(data[0]);
               
       // }
           }
       });
}


setInterval(updateBid, 5000); 


</script>
@stop
