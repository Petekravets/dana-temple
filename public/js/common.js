$( document ).ready(function() {

    function addPayForm(data1, signature) {
        window.LiqPayCheckoutCallback = function() {
            LiqPayCheckout.init({
                data: data1,
                signature: signature,
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
    }

    function addScript(src){
        var script = document.createElement('script');
        script.src = src;
        //script.async = false; // чтобы гарантировать порядок
        document.head.appendChild(script);
    }

    $('#fake-form button[name="donateBut"]').click(function(e) {
        e.preventDefault();
        var th = $(this);
        var sum = th.parents('#fake-form').find('input[name="sum"]').val();
        sum = Math.floor(sum);

        if( (sum == '') || ($.isNumeric(sum) === false)) {
            th.parents('#fake-form').find('label.control-label').remove();
            th.parents('#fake-form').find('input[name="sum"]').before('<label class="control-label" for="inputWarning2">Введите корректную сумму</label>');
            $i = 1;
            return false;
        }
        $('#donate-form').find('input[name="sum"]').val( sum );
        $('.center_content').hide();
        $('#donate-form').fadeIn(1000);
        //$('.center_content').html('<form id="donate-form" class="form-inline" method="post"><input type="hidden" name="sum" value="'+sum+'"><div class="form-group"><input type="text" name="name" placeholder="Ваше имя" class="form-control"></div><div class="form-group"><input type="text" name="female" placeholder="Фамилия" class="form-control"></div><div class="form-group"><input type="submit" class="btn btn-primary form-control" value="Перейти к оплате"></div></form>').hide().fadeIn(1000);
    });

   $('#donate-form').submit(function(e) {
       e.preventDefault();
       var th = $(this);
       $.ajax({
           type: "POST",
           url: "http://dana-temple.loc/payment", //Change
           data: th.serialize(),
           beforeSend: function(xhr) {
               $('.center_form').addClass('margin-form').html('<div class="text-center"><img src="http://dana-temple.loc/images/ajax_loader.gif"></div>');

           },
           success: function(msg) {
                console.log(msg);
               $('.center_form').fadeOut(500, function() {
                   $('#liqpay_checkout').addClass('margin-form').fadeIn(500);
               });

               addPayForm(msg.data, msg.signature);
               addScript('//static.liqpay.com/libjs/checkout.js');
           },
           error: function (jqXhr, textStatus, errorThrown) {
               $('.center_content').fadeIn();
               return false;
           }
       });
   });

});