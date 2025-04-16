@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>سبد خرید</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(count($cart) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>حذف</th>
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
                                <button class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                        <td>
                            <form method="" action="">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    ثبت سفارش
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>سبد خرید شما خالی است.</p>
        @endif
    </div>
@endsection

