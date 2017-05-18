<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function pay(Request $request)
    {

        $payment = new Payment(['donate' => $request->input('donate')]); //$request->all()
        $this->validate($request, [
            'donate' => 'required|integer|not_in:0',
            //'name' => 'required:if,anonim,true'

        ]);
        $response = [
            'data' => $payment->getData(),
            'signature' => $payment->getSignature()
        ];

        return \Response::json($response);
    }
}
