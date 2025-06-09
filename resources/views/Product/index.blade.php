@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- پیام خطا -->
        @if(session('error'))
            <div class="alert alert-danger text-center shadow-sm rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- فرم جستجوی محصول -->
        <form action="{{ route('home') }}" method="GET"
              class="d-flex flex-column flex-sm-row justify-content-center align-items-center bg-light p-3 rounded shadow-sm">
            <input type="text" name="search" class="form-control mb-2 mb-sm-0 me-sm-2 rounded-pill border"
                   placeholder="🔍 جستجوی محصول..." value="{{ request('search') }}" style="width: 250px;">
            <button type="submit" class="btn btn-outline-secondary rounded-pill px-4">جستجو</button>
        </form>

        @can('isAdmin') {{--Authorization with gate--}}
        <!-- دکمه ورود به پنل ادمین -->
        <div class="text-center mt-4">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 shadow-sm">
                🚀 ورود به پنل ادمین
            </a>
        </div>
        @endcan
    </div>

    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-0 rounded">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid rounded"
                                 alt="{{ $product->name }}">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">برند: {{ $product->brand->name }}</h6>
                            <p class="card-text">💰 قیمت: <strong>{{ number_format($product->price) }}</strong> تومان</p>

                            <p class="mt-3 fw-semibold">ویژگی‌ها:</p>
                            <ul class="list-group list-group-flush">
                                @forelse($product->features as $feature)
                                    <li class="list-group-item border-0">✅ {{ $feature->name }}</li>
                                @empty
                                    <li class="list-group-item border-0 text-muted">⛔ بدون ویژگی</li>
                                @endforelse
                            </ul>

                            <!-- دکمه مشاهده محصول با رنگ‌های نود -->
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-secondary btn-lg mt-3 rounded-pill px-4">
                                <i class="bi bi-eye"></i> مشاهده محصول
                            </a>

                            <!-- دکمه افزودن به سبد خرید -->
                            <div class="mt-3">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-success rounded-pill px-4">🛒 افزودن به سبد خرید</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
        </div>
    </div>
@endsection
