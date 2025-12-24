<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Tahoma", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
          
            /* استخدام نفس الخلفية لتوحيد هوية النظام */
            background: url("{{ asset('image/home.jpg') }}") no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .wrapper {
            width: 500px; /* عرض أكبر قليلاً لاستيعاب حقول كلمة المرور بجانب بعضها */
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(9px);
            color: #fff;
            border-radius: 12px;
            padding: 30px 40px;
            margin: 20px;
        }

        .wrapper h1 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.8);
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 25px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 0 45px 0 20px; /* تنسيق RTL: الأيقونة على اليمين */
        }

        .input-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-box i {
            position: absolute;
            right: 20px; /* وضع الأيقونة في جهة اليمين للغة العربية */
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        /* تنسيق الحقول المزدوجة (كلمة المرور) */
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
            color: #ff4d4d;
            font-size: 11px;
            margin-top: -20px;
            margin-bottom: 10px;
            padding-right: 15px;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.3s;
        }

        .wrapper .btn:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.02);
        }

        .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 10px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        .note {
            font-size: 11px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <h1>إنشاء حساب</h1>
            <p class="subtitle">أدخل بيانات الجهة لإنشاء حساب جديد</p>

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
                    <input type="password" name="password_confirmation" placeholder="تأكيد الكلمة" required>
                    <i class='bx bxs-check-shield'></i>
                </div>
            </div>
            @error('password') <div class="error-message">{{ $message }}</div> @enderror

            <button type="submit" class="btn">تسجيل الحساب</button>

            <div class="register-link">
                <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل الدخول</a></p>
            </div>

            <p class="note">بالنقر على "تسجيل"، فإنك توافق على سياسات المنصة.</p>
        </form>
    </div>

</body>
</html>