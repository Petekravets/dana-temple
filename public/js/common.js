$( document ).ready(function() {


    function addCustomerToDb(args) {
        $.ajax({
            type: "POST",
            url: location.origin + "/donation",
            data: args,
            success: function(msg) {
                console.log('suc' + msg.suc + msg.idd);
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log('error');
                console.log(jqXhr);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function addPayMethod(data1, signature, args) {
        window.LiqPayCheckoutCallback = function() {
            LiqPayCheckout.init({
                data: data1,
                signature: signature,
                embedTo: "#liqpay_checkout",
                mode: "embed" // embed || popup,
            }).on("liqpay.callback", function(data){
                console.log(data.status);
                console.log(data);
                args.donate = data.amount;
                addCustomerToDb(args);

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
        var donate = th.parents('#fake-form').find('input[name="donate"]').val();
        donate = Math.floor(donate);

        if( (donate == '') || ($.isNumeric(donate) === false)) {
            th.parents('#fake-form').find('label.control-label').remove();
            th.parents('#fake-form').find('input[name="donate"]').before('<label class="control-label" for="inputWarning2">Введите корректную сумму</label>');
            $i = 1;
            return false;
        }
        $('#donate-form').find('input[name="donate"]').val( donate );
        $('.center_content').hide();
        $('#donate-form').fadeIn(1000);
        //$('.center_content').html('<form id="donate-form" class="form-inline" method="post"><input type="hidden" name="donate" value="'+donate+'"><div class="form-group"><input type="text" name="name" placeholder="Ваше имя" class="form-control"></div><div class="form-group"><input type="text" name="female" placeholder="Фамилия" class="form-control"></div><div class="form-group"><input type="submit" class="btn btn-primary form-control" value="Перейти к оплате"></div></form>').hide().fadeIn(1000);
    });

   $('#donate-form').submit(function(e) {
       e.preventDefault();
       var th = $(this);
       if(($('input[name="name"]').val() == '') && (!$('input[name="anonim"]').is(':checked')))  {
           alert('Заполниле поля!');
           return false;
       }
       $.ajax({
           type: "POST",
           url: location.origin + "/payment", //Change
           data: th.serialize(),
           beforeSend: function(xhr) {
               $('.center_form').addClass('margin-form').html('<div class="text-center"><img src="http://dana-temple.loc/images/ajax_loader.gif"></div>');
           },
           success: function(msg) {
                console.log(msg);
               $('.center_form').fadeOut(500, function() {
                   $('#liqpay_checkout').addClass('margin-form').fadeIn(500);
               });

               addPayMethod(msg.data, msg.signature, th.serialize());
               addScript('//static.liqpay.com/libjs/checkout.js');
           },
           error: function (jqXhr, textStatus, errorThrown) {
               $('.center_content').fadeIn();
               return false;
           }
       });
   });

});