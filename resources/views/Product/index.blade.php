@extends('layouts.app')

@section('content')
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

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
