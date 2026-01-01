<div class="wrapper">
    <h1>استعادة الحساب</h1>
    <p class="subtitle">أدخل بريدك لإرسال رابط إعادة تعيين كلمة المرور</p>
    
    @if (session('status'))
        <div style="background:rgba(16,185,129,0.1); color:#065f46; padding:10px; border-radius:10px; margin-bottom:15px; text-align:center; font-size:14px;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input-box">
            <input type="email" name="email" placeholder="بريدك الإلكتروني" required>
            <i class='bx bxs-envelope'></i>
        </div>
        @error('email') <div class="error-message">{{ $message }}</div> @enderror
        <button type="submit" class="btn">إرسال الرابط <i class='bx bx-paper-plane'></i></button>
        <a href="{{ route('login') }}" style="display:block; text-align:center; margin-top:15px; font-size:14px; color:#6b7280; text-decoration:none;">العودة للدخول</a>
    </form>
</div>