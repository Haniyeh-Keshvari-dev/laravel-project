<form method="POST" action="{{ route('mail.forgetPassword') }}">
    @csrf
    <input type="email" name="email" placeholder="ایمیل خود را وارد کنید" required>
    <button type="submit">ارسال لینک بازیابی</button>
</form>
@if (session('status'))
    <div>{{ session('status') }}</div>
@endif
