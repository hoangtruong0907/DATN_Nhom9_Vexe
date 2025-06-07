<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đặt Vé Của Bạn - Đại Lý Vé Xe</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #fff7e6;
            line-height: 1.8;
        }
        .container {
            max-width: 700px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 2px solid #ffd700;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            width: 120px;
        }
        h1 {
            color: #d4af37;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .section-title {
            font-size: 1.4em;
            margin: 20px 0 10px;
            color: #d4af37;
            border-bottom: 2px solid #ffd700;
            padding-bottom: 5px;
        }
        .info-item {
            margin: 15px 0;
            padding: 15px;
            background: #fff2cc;
            border-left: 5px solid #ffd700;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .value {
            color: #000;
            font-size: 1.1em;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.95em;
            color: #555;
        }
        .contact-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #ffd700;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .contact-button:hover {
            background-color: #d4af37;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="https://sbaygroup.com/images/logosbaytravel.png" alt="Đại Lý Vé Xe Logo">
        <h1>Chi Tiết Đặt Vé Của Bạn</h1>
    </div>

    <div class="section-title">Thông Tin Đặt Vé</div>
    <div class="info-item"><span class="label">Mã Booking:</span> <span class="value">{{ $data[0]['booking_id'] }}</span></div>
    <div class="info-item"><span class="label">Mã Đặt Chỗ:</span> <span class="value">{{ $data[0]['code'] }}</span></div>
    <div class="info-item"><span class="label">Trạng Thái:</span> <span class="value">{{ $data[0]['description'] }}</span></div>
    <div class="info-item"><span class="label">Số Ghế:</span> <span class="value">{{ $data[0]['seats'] }}</span></div>
    <div class="info-item"><span class="label">Giá Vé:</span> <span class="value">{{ number_format($data[0]['fare'], 0, ',', '.') }} VND</span></div>
    <div class="info-item"><span class="label">Tổng Giá:</span> <span class="value">{{ number_format($data[0]['final_price'], 0, ',', '.') }} VND</span></div>
    <div class="info-item"><span class="label">Điểm Khởi Hành:</span> <span class="value">{{ $data[0]['from'] }}</span></div>
    <div class="info-item"><span class="label">Điểm Đến:</span> <span class="value">{{ $data[0]['to'] }}</span></div>

    <div class="section-title">Thông Tin Khách Hàng</div>
    <div class="info-item"><span class="label">Tên Khách Hàng:</span> <span class="value">{{ $data[0]['customer']['name'] }}</span></div>
    <div class="info-item"><span class="label">Số Điện Thoại:</span> <span class="value">{{ $data[0]['customer']['phone'] }}</span></div>
    <div class="info-item"><span class="label">Email:</span> <span class="value">{{ $data[0]['customer']['email'] }}</span></div>
    <div class="info-item"><span class="label">Giờ Đón:</span> <span class="value">{{ $data[0]['ticket']['detail_info'][0]['pickup_time'] }}</span></div>
    <div class="info-item"><span class="label">Điểm Trả Khách:</span> <span class="value">{{ $data[0]['ticket']['detail_info'][0]['drop_off_info'] }}</span></div>

    <div class="footer">
        Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!<br>
        Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi.
        <div>
            <a href="https://example.com/contact" class="contact-button">Liên Hệ Chúng Tôi</a>
        </div>
    </div>
</div>

</body>
</html>
