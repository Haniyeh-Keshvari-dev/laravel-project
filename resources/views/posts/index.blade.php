@extends('layouts.app')

@section('content')
    @can('isAdmin')
        <div class="container mt-5">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="list-group shadow-sm rounded-3 bg-light">
                        <a href="" class="list-group-item list-group-item-action active bg-secondary text-white rounded">
                            <i class="bi bi-house-door-fill"></i> داشبورد
                        </a>
                        <a href="" class="list-group-item list-group-item-action text-dark">
                            <i class="bi bi-people-fill"></i> مدیریت کاربران
                        </a>
                        <a href="{{route('posts.managepost')}}" class="list-group-item list-group-item-action text-dark">
                            <i class="bi bi-file-text-fill"></i> مدیریت پست‌ها
                        </a>
                    </div>
                </div>

                <!-- Main Panel -->
                <div class="col-md-9">
                    <div class="card shadow-sm border-0 rounded-3 p-4 bg-light">
                        <h3 class="text-dark fw-bold">
                            <i class="bi bi-speedometer2"></i> خوش آمدید به پنل مدیریت
                        </h3>
                        <p class="text-muted">اینجا می‌توانید اطلاعات کاربران و پست‌ها را مدیریت کنید.</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-secondary btn-lg mt-3 rounded-pill px-4">
                            <i class="bi bi-plus-circle-fill"></i> ایجاد آیتم جدید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
