@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('home') }}" method="GET"
              class="d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-center">
            <input type="text" name="search" class="form-control mb-2 mb-sm-0 me-sm-2" placeholder="جستجوی محصول..."
                   value="{{ request('search') }}" style="width: 250px;">
            <button type="submit" class="btn btn-primary">جستجو</button>
        </form>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">برند: {{ $product->brand->name }}</h6>
                            <p class="card-text">قیمت: {{ number_format($product->price) }} تومان</p>

                            <p class="mt-3 mb-1"><strong>ویژگی‌ها:</strong></p>
                            <ul class="list-unstyled">
                                @forelse($product->features as $feature)
                                    <li>✅ {{ $feature->name }}</li>
                                @empty
                                    <li>⛔ بدون ویژگی</li>
                                @endforelse
                            </ul>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mt-3">مشاهده محصول</a>
                            <div class="text-start mt-2">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-success">افزودن به سبد خرید</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
