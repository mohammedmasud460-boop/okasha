<div class="wrapper">
    <h1>تأكيد الهوية</h1>
    <p class="subtitle">هذه منطقة آمنة، يرجى تأكيد كلمة المرور الخاصة بك قبل المتابعة.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="input-box">
            <input type="password" name="password" placeholder="كلمة المرور" required autocomplete="current-password">
            <i class='bx bxs-lock-alt'></i>
        </div>
        @error('password') <p style="color:#dc2626; font-size:12px; margin-top:-15px; margin-bottom:10px;">{{ $message }}</p> @enderror

        <button type="submit" class="btn">تأكيد كلمة المرور</button>
    </form>
</div>