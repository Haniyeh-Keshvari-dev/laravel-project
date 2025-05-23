@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 200px; height: 200px;">
                <h3>{{ $product->name }}</h3>
                <h5 class="text-muted">برند: {{ $product->brand->name }}</h5>
                <p>قیمت: {{ number_format($product->price) }} تومان</p>

                <hr>

                <h6>ویژگی‌ها:</h6>
                <ul>
                    @forelse($product->features as $feature)
                        <li>{{ $feature->name }}</li>
                    @empty
                        <li>ویژگی‌ای ثبت نشده</li>
                    @endforelse
                </ul>
                <div class="text-start mt-2">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-success">افزودن به سبد خرید</button>
                    </form>
                </div>

                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">بازگشت به لیست محصولات</a>
            </div>
        </div>
    </div>
@endsection
