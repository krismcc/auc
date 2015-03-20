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

</div>
<div class="starter-template">
<legend style="color:blue;font-weight:bold;">Auction Control</legend>

<form id="bidForm">
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
          {{Form::submit('Bid', ['class' => 'btn btn-primary', 'id' => 'bid']) }} 

        </div>
         {{ Form::close() }}
</div>

<div title="Item Management">
    <fieldset>
    <table cellspacing="100" >    
    <legend style="color:blue;font-weight:bold;">Item Management</legend>
    <tr>
     <td>
         <button id="sellItem" value="Sell Item" class="btn btn-primary" style="margin-top: 10px" style="width: 130px" style="height: 100px" title="ff"  href=""> Complete Sale</button>
     </td>
    </tr> 
   <tr>
     <td>
    <button id="deleteItem" value="Delete Item" class="btn btn-primary" style="margin-top: 10px" style="width: 130px" style="height: 100px" title="ff"  > Remove Item</button>
     </td>
    </tr> 
   <tr>
     <td>
    <button id="editItem" value="Edit Item" class="btn btn-primary" style="margin-top: 10px" style="width: 130px" style="height: 100px" title="ff"  > Edit Item</button>
     </td>
    </tr> 
    </table>
   </fieldset>
</div>
</br>
<div>
    <table border="1" style="width:60%">
        <th style="width: 25%" >User Number</th>
        <th style="width: 30%"> Bid Amount </th>
        <th style="width: 22%"> Bid Time</th>
                <th style="width: 23%"> Paddle Number(If Applicable)</th>

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
<script>
    
    
//$("#refresh").click(function(e){
//
//    $.ajax({
//    
//    });
//
//}):
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
//$( "#bidForm" ).submit(function( e ) {
//$('.submit').on('click', function(e){
//
//    // Async submit a form's input.
//        var form = $(this);
//         e.preventDefault();
//         var buttonId = $(this).attr('id');
//         if(buttonId == 'bid'){
//             
//                var item_id = document.getElementById("itemId").getAttribute("value");
//                var user_id = document.getElementById("userId").getAttribute("value");
//                var bid_amount = $("#bid-amount").val(); 
//                var permission = document.getElementById("permission").getAttribute("value");
//                var form = [item_id,user_id,bid_amount,permission];
//                console.log(form);
//                var method = 'POST';
//                var url= "/items/" + {{ $item->id }}; 
//                var bid = document.getElementById("winner").innerHTML;
//                var new_bid = $("#bid-amount").val(); 
//                     bigger = (new_bid > bid) ? true : false;
//                if(bigger){
//                    $.ajax({
//                        type: method,
//                        url: url,
//                        //data: form.serialize(),
//                        data: JSON.stringify(form),
//                        action:"http://localhost:8000/items" + {{ $item->id }},
//                        success: function(data) {
//                            console.log("AJAX request was successfull");
//                            $('#bid-amount').val('');
//                        },
//                        failure: function() {
//                            console.log("AJAX request failed");
//                        }
//
//                    });
//                }
//                else{
//                    window.alert("This is not a high bid");
//
//                }
//         }
//         else{
//             window.alert('post to purchases');
//         }
//    
//    });
//        
//        
////(function() {
////$('form[data-remote]').on('submit', function(e){
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
