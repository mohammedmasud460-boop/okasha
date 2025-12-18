
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>الملف الشخصي</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root{
      --bg:#f7f7fb; --card:#fff; --text:#1f2937; --muted:#6b7280;
      --primary:#4f46e5; --primary-dark:#4338ca; --danger:#dc2626; --border:#e5e7eb; --ring:#c7d2fe;
    }
    html,body{
      margin:0; padding:0; background:var(--bg); color:var(--text);
      font-family:"Tahoma","Segoe UI",system-ui,Arial,sans-serif; line-height:1.6;
    }
    .container{max-width:960px; margin:40px auto; padding:0 16px;}
    header{margin-bottom:16px;}
    header h2{margin:0; font-size:22px; font-weight:700; color:#111827;}
    .grid{display:grid; grid-template-columns:1fr; gap:16px;}
    @media (min-width:640px){ .grid{grid-template-columns:1fr;} }
    @media (min-width:1024px){ .grid{grid-template-columns:1fr;} }

    .card{
      background:var(--card); border:1px solid var(--border); border-radius:12px;
      box-shadow:0 8px 24px rgba(0,0,0,.06); padding:20px;
    }
    .card h3{margin:0 0 8px; font-size:18px;}
    .card .desc{color:var(--muted); font-size:13px; margin-bottom:12px;}

    .field{margin-bottom:12px;}
    .label{display:block; margin-bottom:6px; font-size:14px; color:#374151;}
    .input, .textarea{
      width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:8px;
      font-size:14px; background:white; color:var(--text);
      transition:border-color .15s, box-shadow .15s;
    }
    .input:focus, .textarea:focus{
      outline:none; border-color:var(--primary);
      box-shadow:0 0 0 4px var(--ring);
    }
    .error{margin-top:6px; color:var(--danger); font-size:12px;}
    .hint{color:var(--muted); font-size:12px; margin-top:6px;}

    .actions{display:flex; gap:10px; flex-wrap:wrap; margin-top:12px;}
    .btn{
      appearance:none; border:none; border-radius:10px; background:var(--primary);
      color:white; padding:10px 16px; font-size:14px; cursor:pointer;
      transition:background .15s, transform .05s;
    }
    .btn:hover{background:var(--primary-dark);}
    .btn:active{transform:scale(.99);}
    .btn-outline{
      background:transparent; color:#374151; border:1px solid var(--border);
      padding:10px 16px; border-radius:10px; cursor:pointer;
    }
    .btn-danger{
      background:var(--danger); color:white;
    }

    .row{display:flex; gap:12px; flex-wrap:wrap;}
    .row .field{flex:1 1 240px;}
    .note{background:#fef3c7; border:1px solid #fde68a; color:#92400e; border-radius:8px; padding:10px 12px; font-size:13px;}

    /* رسائل عامّة */
    .status-success{background:#ecfdf5; color:#065f46; border:1px solid #d1fae5; border-radius:8px; padding:10px 12px; margin-bottom:12px; font-size:14px;}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h2>الملف الشخصي</h2>
    </header>

    <div class="grid">

      <!-- 1) تحديث معلومات الحساب -->
      <div class="card">
        <h3>تحديث المعلومات الشخصية</h3>
        <p class="desc">حدّث اسمك وبريدك الإلكتروني، وتحقّق من البريد إذا غيّرته.</p>

        {{-- إن كنت تعرض رسالة نجاح عامة بعد التحديث --}}
        @if (session('status') === 'profile-updated')
          <div class="status-success">تم تحديث معلومات الحساب بنجاح.</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
          @csrf
          @method('PATCH')

          <div class="field">
            <label class="label" for="name">الاسم</label>
            <input id="name" type="text" name="name" class="input" value="{{ old('name', auth()->user()->name ?? '') }}" required autocomplete="name">
            @error('name') <div class="error">{{ $message }}</div> @enderror
          </div>

          <div class="field">
            <label class="label" for="email">البريد الإلكتروني</label>
            <input id="email" type="email" name="email" class="input" value="{{ old('email', auth()->user()->email ?? '') }}" required autocomplete="username">
            @error('email') <div class="error">{{ $message }}</div> @enderror
            <div class="hint">إذا غيّرت بريدك، قد تحتاج إلى إعادة التحقق.</div>
          </div>

          <div class="actions">
            <button type="submit" class="btn">حفظ التغييرات</button>
          <a href="{{ url()->previous() }}">رجوع</a>
          </div>
        </form>
      </div>

      <!-- 2) تحديث كلمة المرور -->
      <div class="card">
        <h3>تحديث كلمة المرور</h3>
        <p class="desc">اختر كلمة مرور قوية. ستحتاج إلى كلمة المرور الحالية للمصادقة.</p>

        @if (session('status') === 'password-updated')
          <div class="status-success">تم تحديث كلمة المرور بنجاح.</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          @method('PUT')

          <div class="field">
            <label class="label" for="current_password">كلمة المرور الحالية</label>
            <input id="current_password" type="password" name="current_password" class="input" required autocomplete="current-password">
            @error('current_password') <div class="error">{{ $message }}</div> @enderror
          </div>

          <div class="row">
            <div class="field">
              <label class="label" for="password">كلمة المرور الجديدة</label>
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
            <button type="submit" class="btn">تحديث كلمة المرور</button>
          </div>
        </form>
      </div>

      <!-- 3) حذف الحساب -->
      <div class="card">
        <h3>حذف الحساب</h3>
        <p class="desc">سيتم حذف حسابك بشكل نهائي. أدخل كلمة المرور للتأكيد.</p>
        <div class="note">تحذير: لا يمكن التراجع عن هذه العملية. تأكد من أنك قمت بتنزيل بياناتك إن لزم.</div>

       
        <form method="POST" action="{{ route('profile.destroy') }}">
          @csrf
          @method('DELETE')

          <div class="field">
            <label class="label" for="password_delete">كلمة المرور</label>
            <input id="password_delete" type="password" name="password" class="input" required autocomplete="current-password">
            @error('password') <div class="error">{{ $message }}</div> @enderror
          </div>

          <div class="actions">
            <button type="submit" class="btn btn-danger">حذف الحساب نهائيًا</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</body>
</html>
