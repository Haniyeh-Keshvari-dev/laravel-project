<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش محصول</title>
    <!-- لینک به فایل CSS بوت‌استرپ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>ویرایش محصول</h2>
        </div>
        <div class="card-body">
            <!-- فرم ویرایش محصول -->
            <form action="{{route('posts.update',$post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">نام محصول</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $post->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="brand_id" class="form-label">برند محصول</label>
                    <select name="brand_id" id="brand_id" class="form-select" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $post->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">قیمت محصول</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $post->price }}"
                           required>
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">ویژگی‌ها:</label>
                    <div id="features-container">
                        @forelse($post->features as $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" value="{{ $feature->name }}">
                                <button type="button" class="btn btn-danger remove-feature">حذف</button>
                            </div>
                        @empty
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" placeholder="ویژگی جدید">
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
                    <a href="{{ route('posts.show',$post->id )}}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- لینک به فایل JavaScript بوت‌استرپ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

