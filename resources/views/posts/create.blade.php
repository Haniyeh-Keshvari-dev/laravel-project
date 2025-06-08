<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ایجاد محصول جدید</title>
    <!-- لینک به فایل CSS بوت‌استرپ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>ایجاد محصول جدید</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">آپلود تصویر محصول</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">نام محصول</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="نام محصول را وارد کنید" required>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">برند محصول</label>
                    <select name="brand_id" id="brand" class="form-select" required>
                        <option value="" disabled selected>انتخاب برند</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">قیمت محصول</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="قیمت محصول را وارد کنید" required>
                </div>
                <div class="mb-3">
                    <label for="features" class="form-label">ویژگی‌ها</label>
                    <textarea name="features" id="features" class="form-control" rows="4" placeholder="ویژگی‌های محصول را وارد کنید"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">ایجاد محصول</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- لینک جاوااسکریپت بوت‌استرپ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
