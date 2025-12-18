
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>إنشاء حساب جديد</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS داخلي بسيط -->
  <style>
    :root{
      --bg:#f7f7fb;
      --card:#ffffff;
      --text:#1f2937;
      --muted:#6b7280;
      --primary:#4f46e5;
      --primary-dark:#4338ca;
      --danger:#dc2626;
      --border:#e5e7eb;
      --ring:#c7d2fe;
    }
    html,body{margin:0;padding:0;background:var(--bg);color:var(--text);font-family:"Tahoma","Segoe UI",system-ui,Arial,sans-serif;line-height:1.6;}
    .container{max-width:720px;margin:40px auto;padding:0 16px;}
    .card{background:var(--card);border:1px solid var(--border);border-radius:12px;box-shadow:0 8px 24px rgba(0,0,0,.06);padding:24px;}
    h1{margin:0 0 8px;font-size:22px;}
    .subtitle{color:var(--muted);font-size:14px;margin-bottom:16px;}

    .field{margin-bottom:16px;}
    .label{display:block;margin-bottom:6px;font-size:14px;color:#374151;}
    .input{
      width:100%;padding:10px 12px;border:1px solid var(--border);border-radius:8px;
      font-size:14px;background:white;color:var(--text);
      transition:border-color .15s,box-shadow .15s;
    }
    .input:focus{
      outline:none;border-color:var(--primary);
      box-shadow:0 0 0 4px var(--ring);
    }
    .error{margin-top:6px;color:var(--danger);font-size:12px;}
    .row{display:flex;gap:12px;flex-wrap:wrap;}
    .row .field{flex:1 1 240px;}

    .actions{display:flex;align-items:center;justify-content:space-between;margin-top:20px;gap:12px;flex-wrap:wrap;}
    .link{color:#374151;text-decoration:underline;font-size:13px;}
    .btn{
      appearance:none;border:none;border-radius:10px;background:var(--primary);
      color:white;padding:10px 16px;font-size:14px;cursor:pointer;
      transition: background .15s, transform .05s;
    }
    .btn:hover{background:var(--primary-dark);}
    .btn:active{transform:scale(.99);}
    .note{margin-top:10px;color:var(--muted);font-size:12px;}
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>إنشاء حساب جديد</h1>
      <div class="subtitle">أدخل بيانات الجهة لإنشاء حساب جديد.</div>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- الاسم -->
        <div class="field">
          <label class="label" for="name">اسم الجهة</label>
          <input id="name" type="text" name="name" class="input" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- البريد الإلكتروني -->
        <div class="field">
          <label class="label" for="email">البريد الإلكتروني</label>
          <input id="email" type="email" name="email" class="input" value="{{ old('email') }}" required autocomplete="username">
          @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- كلمة المرور + تأكيد -->
        <div class="row">
          <div class="field">
            <label class="label" for="password">كلمة المرور</label>
            <input id="password" type="password" name="password" class="input" required autocomplete="new-password">
            @error('password') <div class="error">{{ $message }}</div> @enderror
          </div>

          <div class="field">
            <label class="label" for="password_confirmation">تأكيد كلمة المرور</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="input" required autocomplete="new-password">
            @error('password_confirmation') <div class="error">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="actions">
          <a href="{{ route('login') }}" class="link">لديك حساب بالفعل؟ سجّل الدخول</a>
          <button type="submit" class="btn">تسجيل</button>
        </div>

        <div class="note">بالنقر على "تسجيل"، فإنك توافق على سياسات المنصة.</div>
      </form>
    </div>
  </div>
</body>
</html>
