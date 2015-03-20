//(function (){
//$( "#refresh" ).click(function() {
//  alert( "Handler for .click() called." );
//});
    
$("#refresh").click(function(e){
    e.preventDefault();   
    $.ajax({
           type: "GET", 
           url: "{{ link_to_route(/items/$item->id) }}",
       //  //data: form.serialize(),
         success: function(data){
        //   // alert('success');
           console.log(data);
        //  // $('#winner').empty().append(data)
           }
       });
        
    
 });
//0})();

var delay = 5000;

var getCurrentHighestBid = function() {
    // perform validation here, if necessary
    var url = '/items';   // insert your URL here

    $.get(url, null, handleGetCurrentHighestBidResponse);
};

var handleGetCurrentHighestBidResponse = function(response) {
    // check for nulls in response here, handle exceptions, etc
    // then insert your bid data into the DOM, which may look
    // something like:
    $('.winner').html(response.Html);

    setTimeout(getCurrentHighestBid , delay);
};
