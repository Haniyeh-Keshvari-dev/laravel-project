@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-3 bg-light">
                    <div class="card-header text-center bg-light border-0">
                        <h4 class="fw-bold text-dark">🔒 تغییر رمز عبور</h4>
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

                        <form method="post" action="{{route('resetpasswordPost')}}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <!-- رمز عبور جدید -->
                            <div class="mb-3">
                                <label for="password" class="form-label">رمز عبور جدید</label>
                                <input type="password" id="password"
                                       class="form-control rounded-pill border @error('password') is-invalid @enderror"
                                       name="password" placeholder="رمز عبور جدید را وارد کنید..." required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- تأیید رمز عبور -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">تأیید رمز عبور</label>
                                <input type="password" id="password_confirmation"
                                       class="form-control rounded-pill border @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation" placeholder="تأیید رمز عبور..." required>
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- دکمه تغییر رمز عبور -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-outline-secondary rounded-pill w-100 px-4">
                                    🔁 ذخیره رمز جدید
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
