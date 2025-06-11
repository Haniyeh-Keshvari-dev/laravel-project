<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت پست‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- کادر عنوان مدیریت پست‌ها -->
    <div class="card bg-light text-dark text-center p-3 mb-4 shadow-lg border-0 rounded">
        <h2 class="fw-bold">مدیریت پست‌ها</h2>
    </div>

    <div class="row">
        @foreach ($post as $posts)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm rounded">
                    <!-- تصویر محصول -->
                    <img src="{{ asset('storage/' . $posts->image) }}" class="card-img-top img-fluid rounded" alt="{{ $posts->name }}">

                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $posts->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">برند: {{ $posts->brand->name }}</h6>
                        <p class="card-text">💰 قیمت: <strong>{{ number_format($posts->price) }}</strong> تومان</p>

                        <p class="mt-3 fw-semibold">ویژگی‌ها:</p>
                        <ul class="list-group list-group-flush">
                            @forelse($posts->features as $feature)
                                <li class="list-group-item">✅ {{ $feature->name }}</li>
                            @empty
                                <li class="list-group-item text-muted">⛔ بدون ویژگی</li>
                            @endforelse
                        </ul>

{{--                        <a href="{{ route('posts.show', $posts->id) }}" class="btn btn-outline-secondary btn-lg mt-3 rounded-pill">--}}
{{--                            <i class="bi bi-eye"></i> مشاهده محصول--}}
{{--                        </a>--}}

                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a href="{{ route('posts.edit', $posts->id) }}" class="btn btn-outline-warning btn-sm rounded-pill">
                                <i class="bi bi-pencil-square"></i> ویرایش
                            </a>
                            <form action="{{ route('posts.delete', $posts->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('آیا مطمئن هستید؟')">
                                    <i class="bi bi-trash"></i> حذف
                                </button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- دکمه صفحه‌بندی -->
    <div class="d-flex justify-content-center mt-4">
        {{ $post->links('pagination::bootstrap-5') }}
    </div>

    <div class="text-center mt-4 mb-5">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-dark btn-md rounded-pill px-3">
            <i class="bi bi-arrow-left-circle"></i> بازگشت به پنل مدیریت
        </a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
