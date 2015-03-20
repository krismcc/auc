@extends('layouts/layout')

@section('content')

<h1>{{$item->title}}</h1>
<h2> {{$item->description}}</h2>
<h4 id="winner">Current Bid: {{$winningBid }}</h4>


<div class="starter-template">

<form id="bidForm">
        <div class="form-group" id="divCheckbox" style="visibility: hidden">
            {{ Form::hidden('item_id', $item->id) }}
            {{ Form::hidden('user_id', Auth::User()->id) }}
        </div>
        <!-- bid    -->
        <div class="form-group">
            {{Form::label('bid_amount', 'Bid:') }}
            {{Form::text('bid_amount', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'bid-amount']) }}
        </div>
        <!-- max bid   
        <div class="form-group">
            {{Form::label('max_bid', 'Max Bid:') }}
            {{Form::text('max_bid', null, ['class' => 'form-control']) }}
        </div> -->
        {{ Form::hidden('permission', "userr") }}

         <!-- submit``    -->
        <div class="form-group">
          {{Form::submit('Bid', ['class' => 'btn btn-primary']) }} 
        </div>
         {{ Form::close() }}
</div>

<div>
    <table border="1" style="width:60%">
        <th style="width: 25%" >User Number</th>
        <th style="width: 30%"> Bid Amount </th>
        <th style="width: 45%"> Bid Time</th>
        @foreach($bidHistory as $bidHistory)

        <tr>
            <td> {{$bidHistory->user_id}} </td> 
            <td> {{$bidHistory->bid_amount}} </td> 
            <td> {{$bidHistory->created_at}} </td> 

        </tr>
        @endforeach
    </table>
</div>
<script>
    
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
setInterval(updateBid, 5000); 

//(function() {
//$('form[data-remote]').on('submit', function(e){
$( "#bidForm" ).submit(function( e ) {
    // Async submit a form's input.
         e.preventDefault();
        var form = $(this);
        var method = 'POST';
        var url= "/items/" + {{ $item->id }}; 
        
        //form.prop('action'),
        $.ajax({
            type: method,
            url: url,
            data: form.serialize(),
            action:"http://localhost:8000/items" + {{ $item->id }},
            success: function(data) {
                 console.log("AJAX request was successfull");
                $('#bid-amount').val('');
            },
             failure: function() {
                    console.log("AJAX request failed");
             }

        });
        
        
    });
 
 //$("#refresh").click(function(e){
//    e.preventDefault();   
//    $.ajax({
//           type: "GET", 
//           url: "/items/" + {{ $item->id }},
//       //  //data: form.serialize(),
//         success: function(data){
//           console.log(data);
//        $('#winner').empty().append(data)
//           }
//       });
//        
//    
// });
//$("#bidButton").click(function(e){
//   e.preventDefault();
// //  var url: form.prop('action');
//        var form = $(this);
//        type: "POST";        
//        //data: form.serialize();
//        url: "/items/" + {{ $item->id }},
//
//    $.ajax({
//        type: "POST",
//        data: form.serialize(),
//        url: "/items/" + {{ $item->id }},
//        success: function(){
//          console.log("AJAX request was successfull");
//      }
//    });
//});
//
//$( "#bidForm" ).submit(function( event ) {
// 
//  // Stop form from submitting normally
//  event.preventDefault();
//        var form = $(this);
//        var method = form.find('input[name="_method"]').val() || 'POST';
//        var url: $(this).attr("action");
//        $.ajax({
//            type: method,
//            url: url,
//            data: form.serialize(),
//            success: function() {
//               // $.publish('ajax.request.success', form);
  //          }
 //       });
 //


//});

</script>
@stop
