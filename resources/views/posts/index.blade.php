<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ادمین</title>
    <!-- لینک به فایل CSS بوت‌استرپ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <!-- بخش پنل ادمین -->
    <div class="card text-center mb-4">
        <div class="card-body">
            <h2 class="card-title">پنل مدیریت</h2>
            <a href="{{route('posts.create')}}" class="btn btn-success">اضافه کردن محصول جدید</a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        @foreach ($post as $posts)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $posts->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">برند: {{ $posts->brand->name }}</h6>
                        <p class="card-text">قیمت: {{ number_format($posts->price) }} تومان</p>

                        <p class="mt-3 mb-1"><strong>ویژگی‌ها:</strong></p>
                        <ul class="list-unstyled">
                            @forelse($posts->features as $feature)
                                <li>✅ {{ $feature->name }}</li>
                            @empty
                                <li>⛔ بدون ویژگی</li>
                            @endforelse
                        </ul>
                        <a href="{{ route('posts.show', $posts->id) }}" class="btn btn-primary mt-3">مشاهده محصول</a>
                        <div class="text-start mt-2">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- لینک جاوااسکریپت بوت‌استرپ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
