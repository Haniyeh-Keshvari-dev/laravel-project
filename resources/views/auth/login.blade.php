@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>ورود</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loginPost')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">رمز عبور</label>
                                <input type="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required>

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

