<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش کاربر</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card bg-light text-dark text-center p-3 mb-4 shadow-lg border-0 rounded">
        <h2 class="fw-bold">ویرایش کاربر</h2>
    </div>

    <div class="card shadow-sm p-4 rounded">
        <form action="{{route('users.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">نام:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">ایمیل:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label fw-bold">نقش:</label>
                <select id="is_admin" name="is_admin" class="form-select">
                    <option value="0" {{$user->is_admin==0 ? 'selected' : ''}} >کاربر عادی</option>
                    <option value="1" {{$user->is_admin==1 ? 'selected' : ''}} >ادمین</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                    <i class="bi bi-arrow-left-circle"></i> بازگشت
                </a>
                <button type="submit" class="btn btn-success rounded-pill px-4">
                    <i class="bi bi-check-circle"></i> ذخیره تغییرات
                </button>
            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
