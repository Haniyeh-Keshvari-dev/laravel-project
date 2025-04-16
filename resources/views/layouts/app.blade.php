<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobile shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"> Mobile Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @php
                    $brands = \App\Models\Brand::all();
                @endphp

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            برندها
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($brands as $brand)
                                <li>
                                    <a class="dropdown-item" href="{{ route('brands.show', $brand->id) }}">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

            </ul>
            <div class="d-flex justify-content-end">
                <a href="{{ route('cart.index') }}" class="btn btn-warning position-relative">
                    🛒 سبد خرید
                    @php $count = count(session('cart', [])); @endphp
                    @if($count > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $count }}
                        </span>
                    @endif
                </a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">ورود</a>
                    <a href="{{ route('register') }} " class="btn btn-outline-light">ثبت‌نام</a>
                @else
                    @auth
                        <span
                            style="color: #f7fafc;margin-left: 20px;margin-top: 7px">welcome ! {{ auth()->user()->name}}</span>
                    @endauth
                    <a href="{{ route('logout') }}" class="btn btn-outline-light">خروج</a>
                @endguest

            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="bg-light text-center py-3 mt-5">
    <p class="mb-0">تمامی حقوق محفوظ است ©</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
