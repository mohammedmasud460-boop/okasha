<div class="wrapper">
    <h1>تعيين كلمة المرور</h1>
    <p class="subtitle">قم بتحديث كلمة المرور الخاصة بحسابك</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="input-box">
            <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ $email ?? old('email') }}" required readonly>
            <i class='bx bxs-envelope'></i>
        </div>
        @error('email') <div class="error-message">{{ $message }}</div> @enderror

        <div class="input-box">
            <input type="password" name="password" placeholder="كلمة المرور الجديدة" required autofocus>
            <i class='bx bxs-lock-alt'></i>
        </div>
        @error('password') <div class="error-message">{{ $message }}</div> @enderror

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
            <i class='bx bxs-check-shield'></i>
        </div>

        <button type="submit" class="btn">تحديث كلمة المرور <i class='bx bx-refresh'></i></button>
    </form>
</div>