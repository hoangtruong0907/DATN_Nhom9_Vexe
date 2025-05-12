<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        $bookingData = json_decode(session('info_booking')['data']);
        // Trả về view `payments.payment`
        $response = Http::post('https://api.vietqr.io/v2/generate', [
            'accountNo' => "0021000337309",
            'accountName' => 'NGUYEN THE TRINH',
            'acqId' => 970436,
            'amount' => session('order_price'),
            'addInfo' => session('order_code'),
            'format' => 'text',
            'template' => 'compact'
        ]);
        $qr_code = "";
        if ($response->successful()) {
            $qr_code = $response['data']['qrDataURL'];
        } else {
            $qr_code = "https://img.vietqr.io/image/VCB-0021000337309-compact.png?amount=".session('order_price')."&addInfo=". session('order_code');
        }

        session([
            'qr_code' => $qr_code,
        ]);
        
        return view('payment.payment', compact('bookingData', 'qr_code'));
    }
}
