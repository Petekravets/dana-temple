<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    protected $public_key = 'i11010743535';
    protected $private_key = 'yh62IfJgulyMIGBT3fFwHirwIt7SgfhS6JyVPnQS';

    public function pay(Request $request)
    {
        //$liqpay = new \LiqPay('i11010743535', 'yh62IfJgulyMIGBT3fFwHirwIt7SgfhS6JyVPnQS');

        $params = array(
            'action'         => 'pay',
            'version'        => '3',
            'sandbox'        => '1',
            'amount'         => $request->input('sum'),
            'currency'       => 'UAH',
            'description'    => 'Пожертвование на пол',
            'card'           => '5168755520678992',
            'card_exp_month' => '11',
            'card_exp_year'  => '19',
            'card_cvv'       => '278'
        );

        $public_key  = $this->public_key;
        $private_key = $this->private_key;
        $data        = base64_encode(json_encode(array_merge(compact('public_key'), $params)));
        $signature   = base64_encode(sha1($private_key.$data.$private_key, 1));

        $response = [
            'data' => $data,
            'signature' => $signature
        ];

        return \Response::json($response);
    }
}
