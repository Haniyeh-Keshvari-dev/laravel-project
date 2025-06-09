@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm border-0 rounded-3 bg-light">
            <div class="card-body text-center">
                <!-- تصویر محصول -->
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid rounded mb-3"
                     alt="{{ $product->name }}" style="width: 180px; height: 180px; object-fit: cover;">

                <!-- اطلاعات محصول -->
                <h3 class="fw-bold text-dark">{{ $product->name }}</h3>
                <h5 class="text-muted">برند: {{ $product->brand->name }}</h5>
                <p class="text-dark">💰 قیمت: <strong>{{ number_format($product->price) }}</strong> تومان</p>

                <hr>

                <!-- ویژگی‌های محصول -->
                <h6 class="fw-semibold">ویژگی‌ها:</h6>
                <ul class="list-group list-group-flush">
                    @forelse($product->features as $feature)
                        <li class="list-group-item text-dark border-0">✅ {{ $feature->name }}</li>
                    @empty
                        <li class="list-group-item text-muted border-0">⛔ ویژگی‌ای ثبت نشده</li>
                    @endforelse
                </ul>

                <!-- دکمه افزودن به سبد خرید -->
                <div class="mt-3">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-success rounded-pill px-4">🛒 افزودن به سبد خرید</button>
                    </form>
                </div>

                <!-- دکمه بازگشت به لیست محصولات -->
                <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill mt-3 px-4">
                    <i class="bi bi-arrow-left-circle"></i> بازگشت به لیست محصولات
                </a>
            </div>
        </div>
    </div>
@endsection
