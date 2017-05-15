$( document ).ready(function() {

    function addPayForm(data1, signature) {

    }

    function addScript(src){
        var script = document.createElement('script');
        script.src = src;
        //script.async = false; // чтобы гарантировать порядок
        document.head.appendChild(script);
    }




   $('form.donate-form').submit(function(e) {
       e.preventDefault();
       var th = $(this);
       $.ajax({
           type: "POST",
           url: "http://dana-temple.loc/payment", //Change
           data: th.serialize(),
           success: function(msg) {

               //$('.view_content').fadeOut(1000);
               //include();
               console.log(msg);
               $('#liqpay_checkout').css('display', 'block');
               $('.center_content').hide();


              // $('body > header').append('').show(3000);
               window.LiqPayCheckoutCallback = function() {
                   LiqPayCheckout.init({
                       data: msg.data,
                       signature: msg.signature,
                       embedTo: "#liqpay_checkout",
                       mode: "embed" // embed || popup,
                   }).on("liqpay.callback", function(data){
                       console.log(data.status);
                       console.log(data);
                   }).on("liqpay.ready", function(data){
                       // ready
                   }).on("liqpay.close", function(data){
                       // close
                   });
               };
               addScript('//static.liqpay.com/libjs/checkout.js');
           }
       });
   });

});