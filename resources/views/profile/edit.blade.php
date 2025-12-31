<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعدادات الملف الشخصي | منصة شهادتي</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --danger: #dc2626;
            --border: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            /* استعارة نفس الخلفية المتدرجة */
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            min-height: 100vh;
            color: #1f2937;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* --- شريط التنقل الزجاجي الموحد --- */
        nav {
            display: flex;
            padding: 10px 5%;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav img { width: clamp(80px, 10vw, 120px); }

        .nav-links ul { display: flex; list-style: none; gap: 15px; }
        .nav-links ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        /* --- حاوية المحتوى --- */
        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-header h2 {
            font-size: 26px;
            color: var(--primary);
            font-weight: 800;
        }

        /* --- البطاقات الزجاجية (Matching the Slider Item Style) --- */
        .card {
            background: rgba(255, 255, 255, 0.7); /* زجاجي شفاف */
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .card h3 {
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card .desc {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding-bottom: 10px;
        }

        /* --- النماذج والحقول --- */
        .field { margin-bottom: 15px; }
        .label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 14px;
            background: white;
            transition: 0.3s;
        }

        .input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* --- الأزرار --- */
        .actions { display: flex; gap: 12px; align-items: center; margin-top: 10px; }

        .btn {
            padding: 10px 25px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-2px); }

        .btn-danger { background: #fee2e2; color: var(--danger); border: 1px solid #fecaca; }
        .btn-danger:hover { background: var(--danger); color: white; }

        .btn-back {
            text-decoration: none;
            color: #6b7280;
            font-weight: bold;
            font-size: 14px;
        }

        /* --- الرسائل --- */
        .status-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #d1fae5;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
        }

        .note {
            background: #fffbeb;
            border: 1px solid #fef3c7;
            color: #92400e;
            padding: 15px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }

        @media (max-width: 640px) {
            .row { grid-template-columns: 1fr; }
            nav { padding: 10px 2%; }
          
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo-area">
            <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
                <li><a href="{{ route('dashboard') }}">قائمة الطلاب</a></li>
                 <li><a><form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        تسجيل الخروج
                    </button>
                </form></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2>إعدادات الملف الشخصي</h2>
        </div>

        <div class="card">
            <h3><i class='bx bx-user-circle'></i> معلومات الجهة</h3>
            <p class="desc">تعديل اسم الجهة والبريد الإلكتروني المعتمد.</p>

            @if (session('status') === 'profile-updated')
                <div class="status-success">تم التحديث بنجاح.</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="field">
                    <label class="label">اسم الجهة</label>
                    <input type="text" name="name" class="input" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                </div>

                <div class="field">
                    <label class="label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="input" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    <a href="{{ url()->previous() }}" class="btn-back">رجوع</a>
                </div>
            </form>
        </div>

        <div class="card">
            <h3><i class='bx bx-shield-quarter'></i> أمان الحساب</h3>
            <p class="desc">تحديث كلمة المرور لزيادة الأمان.</p>

            @if (session('status') === 'password-updated')
                <div class="status-success">تم تغيير كلمة المرور.</div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label">كلمة المرور الحالية</label>
                    <input type="password" name="current_password" class="input" required>
                </div>

                <div class="row">
                    <div class="field">
                        <label class="label">كلمة المرور الجديدة</label>
                        <input type="password" name="password" class="input" required>
                    </div>
                    <div class="field">
                        <label class="label">تأكيد الكلمة</label>
                        <input type="password" name="password_confirmation" class="input" required>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">تحديث الأمان</button>
                </div>
            </form>
        </div>

        <div class="card" style="border: 1px solid rgba(220, 38, 38, 0.3);">
            <h3 style="color: var(--danger);"><i class='bx bx-error-alt'></i> منطقة الخطر</h3>
            <p class="desc">حذف الحساب بشكل نهائي من المنصة.</p>

            <div class="note">
                تحذير: سيؤدي هذا الإجراء إلى مسح كافة الطلاب والشهادات المرتبطة بهذا الحساب.
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <div class="field">
                    <input type="password" name="password" class="input" placeholder="أدخل كلمة المرور للتأكيد" required>
                </div>
                <div class="actions">
                    <button type="submit" class="btn btn-danger">حذف الحساب نهائياً</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>