
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>تأكيد البريد الإلكتروني</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root{
      --bg:#f7f7fb; --card:#fff; --text:#1f2937; --muted:#6b7280;
      --primary:#4f46e5; --primary-dark:#4338ca; --success:#16a34a;
      --border:#e5e7eb; --ring:#c7d2fe;
    }
    html,body{
      margin:0; padding:0; background:var(--bg); color:var(--text);
      font-family:"Tahoma","Segoe UI",system-ui,Arial,sans-serif; line-height:1.6;
    }
    .container{max-width:720px; margin:40px auto; padding:0 16px;}
    .card{
      background:var(--card); border:1px solid var(--border); border-radius:12px;
      box-shadow:0 8px 24px rgba(0,0,0,.06); padding:24px;
    }
    h1{margin:0 0 8px; font-size:22px;}
    .subtitle{color:var(--muted); font-size:14px; margin-bottom:16px;}
    .status{
      margin-top:12px; color:var(--success); font-weight:600; font-size:14px;
    }
    .row{
      display:flex; align-items:center; justify-content:flex-start;
      gap:12px; margin-top:18px; flex-wrap:wrap;
    }
    .btn{
      appearance:none; border:none; border-radius:10px; background:var(--primary);
      color:white; padding:10px 16px; font-size:14px; cursor:pointer;
      transition:background .15s, transform .05s;
    }
    .btn:hover{background:var(--primary-dark);}
    .btn:active{transform:scale(.99);}
    .link-btn{
      background:transparent; color:#374151; text-decoration:underline;
      border:none; padding:8px 0; cursor:pointer; font-size:13px;
    }
    .form{margin:0;}
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>تحقق من بريدك الإلكتروني</h1>

      {{-- رسالة نجاح إذا تم إرسال رابط جديد --}}
      @if (session('resent'))
        <div class="status">تم إرسال رابط التحقق الجديد إلى بريدك الإلكتروني.</div>
      @endif

      <p class="subtitle">
        قبل المتابعة، يرجى التحقق من بريدك الإلكتروني والضغط على رابط التحقق الذي أُرسل إليك.
        إن لم تصلك الرسالة، يمكنك طلب إرسال رابط آخر.
      </p>

      <div class="row">
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button type="submit" class="btn">إعادة إرسال رابط التحقق</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
