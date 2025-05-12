<?php
return [
    'status_booking' => [
        'reserve'  => 1, // Đang đặt vé nhưng chưa chuyển khoản khoản
        'pending' => 2, // đợi thanh toán
        'refund' => 3,   // hoàn tiền
        'paid' => 4,    // Đã thanh toán
        'cancel' => 5, // Hủy đặt vé
    ],
    'sex' => [
        'female' => 0,
        'male' => 1, 
        'other' => 2,
    ],
    'role' => [
        'user' => 1,
        'admin' => 2
    ]
];

