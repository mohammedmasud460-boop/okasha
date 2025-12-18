
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>استعادة كلمة المرور</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root{
      --bg:#f7f7fb; --card:#fff; --text:#1f2937; --muted:#6b7280;
      --primary:#4f46e5; --primary-dark:#4338ca; --danger:#dc2626;
      --border:#e5e7eb; --ring:#c7d2fe;
      --success-bg:#ecfdf5; --success-text:#065f46; --success-border:#d1fae5;
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

    /* Session Status */
    .status{
      background:var(--success-bg); color:var(--success-text);
      border:1px solid var(--success-border); border-radius:8px;
      padding:10px 12px; margin-bottom:12px; font-size:14px;
    }

    .field{margin-bottom:14px;}
    .label{display:block; margin-bottom:6px; font-size:14px; color:#374151;}
    .input{
      width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:8px;
      font-size:14px; background:white; color:var(--text);
      transition:border-color .15s, box-shadow .15s;
    }
    .input:focus{
      outline:none; border-color:var(--primary);
      box-shadow:0 0 0 4px var(--ring);
    }
    .error{margin-top:6px; color:var(--danger); font-size:12px;}

    .actions{display:flex; justify-content:flex-end; margin-top:16px;}
    .btn{
      appearance:none; border:none; border-radius:10px; background:var(--primary);
      color:white; padding:10px 16px; font-size:14px; cursor:pointer;
      transition:background .15s, transform .05s;
    }
    .btn:hover{background:var(--primary-dark);}
    .btn:active{transform:scale(.99);}
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>استعادة كلمة المرور</h1>
      <div class="subtitle">
        نسيت كلمة المرور؟ لا مشكلة. أدخل بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة المرور.
      </div>

      {{-- بديل <x-auth-session-status> لعرض رسالة نجاح مثل "تم إرسال الرابط" --}}
      @if (session('status'))
        <div class="status">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- البريد الإلكتروني -->
        <div class="field">
          <label class="label" for="email">البريد الإلكتروني</label>
          <input id="email" type="email" name="email" class="input"
                 value="{{ old('email') }}" required autofocus>
          @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="actions">
          <button type="submit" class="btn">إرسال رابط إعادة التعيين</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
