<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>بازیابی رمز عبور</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

<div class="container">
    <div class="card shadow-sm border-0 rounded-3 bg-white mx-auto" style="max-width: 500px; padding: 30px;">
        <h2 class="text-center text-dark fw-bold">🔑 درخواست بازیابی رمز عبور</h2>
        <p class="text-center text-muted">برای تغییر رمز عبور خود، روی دکمه زیر کلیک کنید:</p>

        <!-- دکمه تغییر رمز عبور -->
        <div class="text-center mt-3">
            <a href="{{ route('resetpassword',['token'=> $token]) }}" class="btn btn-outline-secondary rounded-pill px-4">
                🔄 تغییر رمز عبور
            </a>
        </div>

        <p class="text-center text-muted mt-4">اگر شما این درخواست را ارسال نکرده‌اید، لطفاً این ایمیل را نادیده بگیرید.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
