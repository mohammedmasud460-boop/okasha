
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>تسجيل الدخول</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root{
      --bg:#f7f7fb; --card:#fff; --text:#1f2937; --muted:#6b7280;
      --primary:#4f46e5; --primary-dark:#4338ca; --danger:#dc2626;
      --border:#e5e7eb; --ring:#c7d2fe;
    }
    html,body{
      margin:0; padding:0; background:var(--bg); color:var(--text);
      font-family:"Tahoma","Segoe UI",system-ui,Arial,sans-serif; line-height:1.6;
    }
    .container{max-width:640px; margin:40px auto; padding:0 16px;}
    .card{
      background:var(--card); border:1px solid var(--border); border-radius:12px;
      box-shadow:0 8px 24px rgba(0,0,0,.06); padding:24px;
    }
    h1{margin:0 0 8px; font-size:22px;}
    .subtitle{color:var(--muted); font-size:14px; margin-bottom:16px;}

    /* حالة الجلسة Session Status */
    .status{
      background:#ecfdf5; color:#065f46; border:1px solid #d1fae5;
      border-radius:8px; padding:10px 12px; margin-bottom:12px; font-size:14px;
    }

    .field{margin-bottom:14px;}
    .label{display:block; margin-bottom:6px; font-size:14px; color:#374151;}
    .input{
      width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:8px;
      font-size:14px; background:white; color:var(--text);
      transition:border-color .15s;
       box-shadow .15s;
    }
    .input:focus{
      outline:none; border-color:var(--primary);
      box-shadow:0 0 0 4px var(--ring);
    }
    .error{margin-top:6px; color:var(--danger); font-size:12px;}

    .checkbox-row{display:flex; align-items:center; gap:8px; margin-top:8px;}
    .checkbox-row input{width:16px; height:16px;}

    .actions{
      display:flex; align-items:center; justify-content:space-between;
      margin-top:16px; gap:12px; flex-wrap:wrap;
    }
    .link{color:#374151; text-decoration:underline; font-size:13px;}
    .btn{
      appearance:none; border:none; border-radius:10px; background:var(--primary);
      color:white; padding:10px 16px; font-size:14px; cursor:pointer;
      transition:background .15s; transform: .05s;
    }
    .btn:hover{background:var(--primary-dark);}
    .btn:active{transform:scale(.99);}
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>تسجيل الدخول</h1>
      <div class="subtitle">أدخل بريدك الإلكتروني وكلمة المرور للمتابعة.</div>

      {{-- بديل <x-auth-session-status> --}}
      @if (session('status'))
        <div class="status">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- البريد الإلكتروني -->
        <div class="field">
          <label class="label" for="email">البريد الإلكتروني</label>
          <input id="email" type="email" name="email" class="input"
                 value="{{ old('email') }}" required autofocus autocomplete="username">
          @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- كلمة المرور -->
        <div class="field">
          <label class="label" for="password">كلمة المرور</label>
          <input id="password" type="password" name="password" class="input"
                 required autocomplete="current-password">
          @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- تذكرني -->
        <div class="checkbox-row">
          <input id="remember_me" type="checkbox" name="remember">
          <label for="remember_me" class="label" style="margin:0;">تذكرني</label>
        </div>

        <div class="actions">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="link">نسيت كلمة المرور؟</a>
          @endif

          <button type="submit" class="btn">دخول</button>
          <button type="submit" class="btn"> <a href="{{ url()->previous() }}">رجوع</a></button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
