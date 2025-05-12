<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentResultController extends Controller
{
    public function showPaymentResult()
    {
        $infoBooking = session('info_booking');
        $dataBooking = json_decode(session('info_booking')['data']);
        return view('payment.payment-result', compact('dataBooking', 'infoBooking'));
    }
}