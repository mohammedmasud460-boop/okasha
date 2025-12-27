<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
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
            /* استعارة الخلفية المتدرجة من الكود الثاني */
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .wrapper {
            width: clamp(320px, 90vw, 500px);
            /* تأثير زجاجي (Glassmorphism) يتناسب مع الهوية الجديدة */
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            color: #1f2937;
        }

        .wrapper h1 {
            font-size: 26px;
            text-align: center;
            margin-bottom: 8px;
            color: var(--primary);
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 25px;
            color: #6b7280;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 20px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: #fff;
            border: 1px solid var(--border);
            outline: none;
            border-radius: 12px;
            font-size: 14px;
            color: #333;
            padding: 0 45px 0 15px; /* RTL: الأيقونة يمين */
            transition: all 0.3s ease;
        }

        .input-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .input-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--primary);
        }

        .input-row {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .input-row .input-box {
            flex: 1;
            min-width: 180px;
        }

        .error-message {
            color: var(--danger);
            font-size: 12px;
            margin-top: -15px;
            margin-bottom: 10px;
            padding-right: 5px;
        }

        /* استعارة نمط الزر من الكود الثاني */
        .wrapper .btn {
            width: 100%;
            height: 48px;
            background: var(--primary);
            border: none;
            outline: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: bold;
            margin-top: 15px;
            transition: 0.3s;
        }

        .wrapper .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }

        .register-link {
            font-size: 14px;
            text-align: center;
            margin: 25px 0 10px;
            color: #4b5563;
        }

        .register-link p a {
            color: var(--primary);
            text-decoration: none;
            font-weight: bold;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        .note {
            font-size: 11px;
            text-align: center;
            color: #9ca3af;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <h1>إنشاء حساب جديد</h1>
            <p class="subtitle">أدخل بيانات الجهة للانضمام إلى المنصة</p>

            <div class="input-box">
                <input type="text" name="name" placeholder="اسم الجهة التعليمية" value="{{ old('name') }}" required autofocus>
                <i class='bx bxs-institution'></i>
            </div>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror

            <div class="input-box">
                <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required>
                <i class='bx bxs-envelope'></i>
            </div>
            @error('email') <div class="error-message">{{ $message }}</div> @enderror

            <div class="input-row">
                <div class="input-box">
                    <input type="password" name="password" placeholder="كلمة المرور" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder=" تأكيد كلمة المرور" required>
                    <i class='bx bxs-check-shield'></i>
                </div>
            </div>
            @error('password') <div class="error-message">{{ $message }}</div> @enderror

            <button type="submit" class="btn">تسجيل الحساب</button>

            <div class="register-link">
                <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل الدخول</a></p>
            </div>

            <p class="note">بالنقر على "تسجيل"، فإنك توافق على سياسات المنصة وشروط الاستخدام.</p>
        </form>
    </div>

</body>
</html>