@extends('layouts.app')

@section('content')

    <script>
        window.LiqPayCheckoutCallback = function() {
            LiqPayCheckout.init({
                data:"<?php echo $data;?>",
                signature: "<?php echo $signature; ?>",
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
    </script>
    {{--<script src=""></script>--}}
@stop