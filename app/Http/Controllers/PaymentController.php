<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function pay(Request $request)
    {

        $payment = new Payment(['sum' => $request->input('sum')]);
        $this->validate($request, [
            'sum' => 'required|integer|not_in:0'
        ]);
        $response = [
            'data' => $payment->getData(),
            'signature' => $payment->getSignature()
        ];

        /*$response = [
            'data' => $validate
        ];*/

        return \Response::json($response);
    }
}
