@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('home') }}" method="GET"
              class="d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-center">
            <input type="text" name="search" class="form-control mb-2 mb-sm-0 me-sm-2" placeholder="جستجوی محصول..."
                   value="{{ request('search') }}" style="width: 250px;">
            <button type="submit" class="btn btn-primary">جستجو</button>
        </form>
        @if(auth()->check() && auth()->user()->is_admin)
            <div class="container text-center mt-5 rtl-container">
                <a href="{{route('posts.index')}}" class="btn btn-primary btn-lg">
                    ورود به پنل ادمین
                </a>
            </div>
        @endif


    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                 alt="{{ $product->name }}">
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
                            <x-product-button url="{{ route('products.show', $product->id) }}" text="مشاهده محصول"/>
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
