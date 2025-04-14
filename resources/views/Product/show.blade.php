@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
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

                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">بازگشت به لیست محصولات</a>
            </div>
        </div>
    </div>
@endsection
