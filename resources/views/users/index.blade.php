<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت کاربران</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card bg-light text-dark text-center p-3 mb-4 shadow-lg border-0 rounded">
        <h2 class="fw-bold">مدیریت کاربران</h2>
    </div>

    <table class="table table-striped text-center shadow-sm rounded">
        <thead class="table-dark">
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>نقش</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{$user->is_admin ? 'ادمین ' : 'کاربر عادی'}}</td>
                <td>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-warning btn-sm rounded-pill">
                        <i class="bi bi-pencil-square"></i> ویرایش
                    </a>
                    <form action="{{route('users.delete',$user->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('آیا مطمئن هستید؟')">
                            <i class="bi bi-trash"></i> حذف
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        <div class="text-center mt-4 mb-5">
            <a href="{{route('posts.index')}}" class="btn btn-outline-dark btn-md rounded-pill px-3">
                <i class="bi bi-arrow-left-circle"></i> بازگشت به داشبورد
            </a>
        </div>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

