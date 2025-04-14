<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobile shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body dir="rtl">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"> Mobile Shop</a>

    </div>

    <div class="container" style="padding-top: 20px;margin-right: 450px">
        <form action="{{ route('home') }}" method="GET" class="d-flex mb-4">
            <input type="text" name="search" class="form-control me-2" placeholder="جستجوی محصول..."
                   value="{{ request('search') }}" style="width: 250px">
            <button type="submit" class="btn btn-primary">جستجو</button>
        </form>

    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="bg-light text-center py-3 mt-5">
    <p class="mb-0">تمامی حقوق محفوظ است ©</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


