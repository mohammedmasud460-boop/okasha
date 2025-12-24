<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
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
            /* استبدل bg.jpg برابط الصورة الفعلي أو مسارها في Laravel */
            background: url("{{ asset('image/home.jpg') }}") no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(9px);
            color: #fff;
            border-radius: 12px;
            padding: 30px 40px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 10px;
        }

        .status {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
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
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            left: 20px; /* تم التعديل ليتناسب مع RTL */
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .error-message {
            color: #ff4d4d;
            font-size: 12px;
            margin-top: -20px;
            margin-bottom: 10px;
            padding-right: 15px;
        }

        .wrapper .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
        }

        .remember-forgot label input {
            accent-color: #fff;
            margin-left: 5px; /* مسافة للغة العربية */
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
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
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .wrapper .btn:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.02);
        }

        .btn-back {
            display: block;
            text-align: center;
            width: 100%;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
        }

        .wrapper .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <h1>تسجيل الدخول</h1>

            {{-- حالة الجلسة --}}
            @if (session('status'))
                <div class="status">
                    {{ session('status') }}
                </div>
            @endif

            <div class="input-box">
                <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required autofocus>
                <i class='bx bxs-user'></i>
            </div>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="input-box">
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> تذكرني</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                @endif
            </div>

            <button type="submit" class="btn">دخول</button>
            
            <a href="{{ url()->previous() }}" class="btn-back">رجوع</a>

            <div class="register-link">
                <p>ليس لديك حساب؟ <a href="{{ route('register') }}">سجل الآن</a></p>
            </div>
        </form>
    </div>

</body>
</html>
