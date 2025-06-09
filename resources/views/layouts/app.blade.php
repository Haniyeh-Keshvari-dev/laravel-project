<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl">

<!-- هدر مینیمال -->
<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="{{ route('home') }}">📱 Mobile Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('home') }}">خانه</a>
                </li>
                @php
                    $brands = \App\Models\Brand::all();
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">برندها</a>
                    <ul class="dropdown-menu">
                        @foreach($brands as $brand)
                            <li><a class="dropdown-item" href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary rounded-pill position-relative px-4">
                    🛒 سبد خرید
                    @php $count = count(session('cart', [])); @endphp
                    @if($count > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">{{ $count }}</span>
                    @endif
                </a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary rounded-pill ms-2 px-4">ورود</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary rounded-pill px-4">ثبت‌نام</a>
                @else
                    <span class="ms-3 fw-semibold text-dark">👋 خوش آمدید، {{ auth()->user()->name }}!</span>
                    <a href="{{ route('logout') }}" class="btn btn-outline-secondary rounded-pill ms-3 px-4">خروج</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<!-- فوتر مینیمال -->
<footer class="bg-light text-center py-3 mt-5 shadow-sm">
    <p class="mb-0 text-muted">© تمامی حقوق محفوظ است | Mobile Shop</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
