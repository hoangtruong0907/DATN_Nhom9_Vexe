<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showPaymentPage()
{
    $bookingData = json_decode(session('info_booking')['data'], true); // decode mảng thay vì object

    $qr_code = "";
    $response = Http::post('https://api.vietqr.io/v2/generate', [
        'accountNo' => "8888090703",
        'accountName' => 'HOANG QUOC TRUONG',
        'acqId' => 970407,
        'amount' => session('order_price'),
        'addInfo' => session('order_code'),
        'format' => 'text',
        'template' => 'compact'
    ]);
    if ($response->successful()) {
        $qr_code = $response['data']['qrDataURL'];
    } else {
        $qr_code = "https://img.vietqr.io/image/TCB-8888090703-compact.png".session('order_price')."&addInfo=". session('order_code');
    }

    // Lấy seatTicket từ bookingData (đã decode thành array)
    $seatTicket = $bookingData['seatTicket'] ?? [];

    return view('payment.payment', compact('bookingData', 'qr_code', 'seatTicket'));
}

}
