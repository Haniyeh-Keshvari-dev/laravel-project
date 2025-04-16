@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>ثبت‌نام</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >

                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">رمز عبور</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">تأیید رمز عبور</label>
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" >
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">ثبت‌نام</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

