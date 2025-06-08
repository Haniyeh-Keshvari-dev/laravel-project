@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>تغییر رمز عبور</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="post" action="{{route('resetpasswordPost')}}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group mb-3">
                                <label for="password">رمز عبور جدید</label>
                                <input type="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" >

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation">تأیید رمز عبور</label>
                                <input type="password" id="password_confirmation"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation" >

                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary w-100">ذخیره رمز جدید</button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}">بازگشت به ورود</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
