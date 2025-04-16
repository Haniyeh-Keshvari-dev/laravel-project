@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>محصولات برند {{ $brand->name }}</h2>

        <div class="row mt-4">
            @forelse($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p>{{ number_format($product->price) }} تومان</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">مشاهده محصول</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>محصولی برای این برند یافت نشد.</p>
            @endforelse
        </div>
    </div>
@endsection

