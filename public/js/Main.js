(function (){
    
    $('form[data-remote]').on('submit', function (e){
       var form = $(this);
       var method = form.find('input[name="_method"]').val() || 'POST';
       var url = form.prop('action');
       document.write('max_bid');
      // $.ajax({
       //    type: method, 
       //    url: url,
      //     data: form.serialize(),
      //     success: function(){
       //       alert('success');
           }
      // });
        e.preventDefault();
    });
})();
