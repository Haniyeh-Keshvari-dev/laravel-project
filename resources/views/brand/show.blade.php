@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- عنوان برند -->
        <div class="card bg-light text-center p-3 shadow-sm border-0 rounded">
            <h2 class="fw-bold text-dark">📌 محصولات برند {{ $brand->name }}</h2>
        </div>

        <div class="row mt-4">
            @forelse($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm border-0 rounded-3 bg-light">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <p class="text-dark">💰 قیمت: <strong>{{ number_format($product->price) }}</strong> تومان</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                                <i class="bi bi-eye"></i> مشاهده محصول
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center mt-4">⛔ محصولی برای این برند یافت نشد.</p>
            @endforelse
        </div>

        <!-- دکمه بازگشت به لیست برندها -->
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-dark rounded-pill px-4">
                <i class="bi bi-arrow-left-circle"></i> بازگشت به لیست برندها
            </a>
        </div>
    </div>
@endsection
