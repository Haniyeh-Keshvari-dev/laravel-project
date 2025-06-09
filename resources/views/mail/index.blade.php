@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-3 bg-light">
                    <div class="card-header text-center bg-light border-0">
                        <h4 class="fw-bold text-dark">🔑 بازیابی رمز عبور</h4>
                    </div>

                    <div class="card-body">
                        <!-- پیام موفقیت -->
                        @if (session('status'))
                            <div class="alert alert-success text-center shadow-sm rounded mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- پیام خطا -->
                        @if ($errors->has('error'))
                            <div class="alert alert-danger text-center shadow-sm rounded mb-3">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('mail.forgetPassword') }}">
                            @csrf

                            <!-- ایمیل -->
                            <div class="mb-3">
                                <label for="email" class="form-label">ایمیل</label>
                                <input type="email" id="email"
                                       class="form-control rounded-pill border @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید..." required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- دکمه ارسال لینک بازیابی -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-outline-secondary rounded-pill w-100 px-4">
                                    📩 ارسال لینک بازیابی
                                </button>
                            </div>

                            <!-- دکمه بازگشت به صفحه ورود -->
                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="text-muted fw-semibold">⬅ بازگشت به صفحه ورود</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
