<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | منصة شهادتي</title>
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
            /* مطابقة الخلفية المتدرجة للكود الثاني */
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            width: clamp(320px, 90vw, 450px);
            /* مطابقة النمط الزجاجي (Glassmorphism) */
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            color: #1f2937;
        }

        .wrapper h1 {
            font-size: 28px;
            text-align: center;
            color: var(--primary);
            margin-bottom: 8px;
            font-weight: 800;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .status {
            background: rgba(16, 185, 129, 0.1);
            color: #065f46;
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
            border: 1px solid rgba(16, 185, 129, 0.2);
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
            font-size: 15px;
            color: #333;
            padding: 0 45px 0 15px; /* RTL: الأيقونة على اليمين */
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

        .error-message {
            color: var(--danger);
            font-size: 12px;
            margin-top: -15px;
            margin-bottom: 10px;
            padding-right: 5px;
        }

        .wrapper .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 25px;
            color: #4b5563;
        }

        .remember-forgot label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .remember-forgot label input {
            accent-color: var(--primary);
            margin-left: 8px;
            width: 16px;
            height: 16px;
        }

        .remember-forgot a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        /* مطابقة نمط الزر */
        .wrapper .btn {
            width: 100%;
            height: 48px;
            background: var(--primary);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .wrapper .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-back {
            display: block;
            text-align: center;
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-back:hover {
            color: var(--primary);
        }

        .register-link {
            font-size: 14px;
            text-align: center;
            margin-top: 25px;
            color: #4b5563;
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <h1>تسجيل الدخول</h1>
            <p class="subtitle">مرحباً بك مجدداً في منصة شهادتي</p>

            {{-- حالة الجلسة --}}
            @if (session('status'))
                <div class="status">
                    {{ session('status') }}
                </div>
            @endif

            <div class="input-box">
                <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required autofocus>
                <i class='bx bxs-envelope'></i>
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
            
            <a href="{{ url()->previous() }}" class="btn-back">
                <i class='bx bx-right-arrow-alt' style="vertical-align: middle;"></i> رجوع
            </a>

            <div class="register-link">
                <p>ليس لديك حساب؟ <a href="{{ route('register') }}">سجل الآن</a></p>
            </div>
        </form>
    </div>

</body>
</html>