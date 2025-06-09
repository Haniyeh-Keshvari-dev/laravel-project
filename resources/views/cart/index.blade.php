@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- عنوان سبد خرید -->
        <div class="card bg-light text-center p-3 shadow-sm border-0 rounded">
            <h2 class="fw-bold text-dark">🛒 سبد خرید</h2>
        </div>

        <!-- پیام موفقیت -->
        @if(session('success'))
            <div class="alert alert-success text-center shadow-sm rounded mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <!-- جدول محصولات در سبد خرید -->
            <table class="table table-striped text-center shadow-sm border-0 mt-4">
                <thead class="bg-light">
                <tr class="text-dark fw-semibold">
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>حذف</th>
                    <th>ثبت سفارش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price']) }} تومان</td>
                        <td>{{ $item['count'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger rounded-pill px-3">❌ حذف</button>
                            </form>
                        </td>
                        <td>
                            <form method="" action="">
                                @csrf
                                <button type="submit" class="btn btn-outline-success rounded-pill px-3">
                                    ✅ ثبت سفارش
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted text-center mt-4">سبد خرید شما خالی است.</p>
        @endif

        <!-- دکمه بازگشت به لیست محصولات -->
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left-circle"></i> بازگشت به لیست محصولات
            </a>
        </div>
    </div>
@endsection
