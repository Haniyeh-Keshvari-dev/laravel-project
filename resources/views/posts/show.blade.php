<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات محصول</title>
    <!-- لینک به فایل CSS بوت‌استرپ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->name }}" style="width: 200px; height: 200px;">
            <h3>{{ $post->name }}</h3>
            <h5 class="text-muted">برند: {{ $post->brand->name }}</h5>
            <p>قیمت: {{ number_format($post->price) }} تومان</p>

            <hr>

            <h6>ویژگی‌ها:</h6>
            <ul>
                @forelse($post->features as $feature)
                    <li>{{ $feature->name }}</li>
                @empty
                    <li>ویژگی‌ای ثبت نشده</li>
                @endforelse
            </ul>
            <div class="text-start mt-2">
                <!-- فرم ویرایش -->
                <form action="{{ route('posts.edit', $post->id) }}" method="" style="display: inline-block;">
                    @csrf
                    <button class="btn btn-outline-primary">ویرایش</button>
                </form>

                <!-- فرم حذف -->
                <form action="{{ route('posts.delete', $post->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">حذف</button>
                </form>
            </div>

            <!-- لینک بازگشت -->
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">بازگشت به پنل مدیریت</a>
        </div>
    </div>
</div>

<!-- لینک به فایل JavaScript بوت‌استرپ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
