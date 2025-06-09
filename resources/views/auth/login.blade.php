@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0 rounded-3 bg-light">
                    <div class="card-header text-center bg-light border-0">
                        <h4 class="fw-bold text-dark">🔐 ورود</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loginPost')}}">
                            @csrf

                            <!-- ایمیل -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">📩 ایمیل</label>
                                <input type="email" id="email" class="form-control rounded-pill @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- رمز عبور -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">🔑 رمز عبور</label>
                                <input type="password" id="password"
                                       class="form-control rounded-pill @error('password') is-invalid @enderror"
                                       name="password" required>

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- دکمه ورود -->
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-outline-secondary rounded-pill px-4">
                                    ✅ ورود
                                </button>
                            </div>

                            <!-- لینک فراموشی رمز عبور -->
                            <div class="text-center mt-3">
                                <a href="{{ route('mail.index') }}" class="text-muted">🔁 فراموشی رمز عبور</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
