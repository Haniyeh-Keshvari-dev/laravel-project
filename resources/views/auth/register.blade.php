@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-3 bg-light">
                    <div class="card-header text-center bg-light border-0">
                        <h4 class="fw-bold text-dark">📝 ثبت‌نام</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf

                            <!-- نام -->
                            <div class="mb-3">
                                <label for="name" class="form-label">نام</label>
                                <input type="text" id="name" class="form-control rounded-pill border @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" placeholder="نام خود را وارد کنید...">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ایمیل -->
                            <div class="mb-3">
                                <label for="email" class="form-label">ایمیل</label>
                                <input type="email" id="email" class="form-control rounded-pill border @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید...">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- رمز عبور -->
                            <div class="mb-3">
                                <label for="password" class="form-label">رمز عبور</label>
                                <input type="password" id="password" class="form-control rounded-pill border @error('password') is-invalid @enderror"
                                       name="password" placeholder="رمز عبور انتخاب کنید...">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- تأیید رمز عبور -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">تأیید رمز عبور</label>
                                <input type="password" id="password_confirmation" class="form-control rounded-pill border"
                                       name="password_confirmation" placeholder="رمز عبور را مجدداً وارد کنید...">
                            </div>

                            <!-- دکمه ثبت‌نام -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-outline-secondary rounded-pill btn-lg px-4">🚀 ثبت‌نام</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
