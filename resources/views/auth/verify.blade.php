<div class="wrapper">
    <h1>تأكيد الهوية</h1>
    <p class="subtitle">يرجى التحقق من بريدك الإلكتروني للحصول على رابط التفعيل.</p>

    @if (session('resent'))
        <div style="background:rgba(16,185,129,0.1); color:#065f46; padding:12px; border-radius:12px; margin-bottom:20px; font-size:14px; text-align:center;">
            تم إرسال رابط تفعيل جديد إلى بريدك.
        </div>
    @endif

    <div style="text-align:center; color:#4b5563; font-size:14px; line-height:1.6;">
        قبل المتابعة، يرجى فحص بريدك الإلكتروني. إذا لم تتسلم الرابط،
        <form style="display:inline;" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" style="background:none; border:none; color:var(--primary); font-weight:bold; cursor:pointer; text-decoration:underline;">اضغط هنا لطلب رابط آخر</button>.
        </form>
    </div>
</div>