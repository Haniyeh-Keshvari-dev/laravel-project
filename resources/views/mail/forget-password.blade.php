<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>بازیابی رمز عبور</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            color: #212529;
        }
        .btn {
            display: inline-block;
            padding: 10px 25px;
            background-color: #0d6efd;
            color: #fff !important;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
<div class="container">
    <h2>درخواست بازیابی رمز عبور</h2>
    <p>برای تغییر رمز عبور خود، روی دکمه زیر کلیک کنید:</p>
    <a href="{{ route('resetpassword',['token'=> $token]) }}" class="btn">تغییر رمز عبور</a>
    <p style="margin-top:20px;">اگر شما این درخواست را ارسال نکرده‌اید، لطفاً این ایمیل را نادیده بگیرید.</p>
</div>
</body>
</html>

