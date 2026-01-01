<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>استعادة كلمة المرور | منصة شهادتي</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        :root { --primary: #4f46e5; --primary-dark: #4338ca; --border: #e5e7eb; --success: #059669; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, sans-serif; }
        body { background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff); display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .wrapper { width: clamp(320px, 90vw, 450px); background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 20px; padding: 40px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1); }
        h1 { font-size: 24px; text-align: center; color: var(--primary); margin-bottom: 8px; font-weight: 800; }
        .subtitle { text-align: center; color: #6b7280; font-size: 14px; margin-bottom: 25px; line-height: 1.6; }
        .status-msg { background: rgba(5, 150, 105, 0.1); color: var(--success); padding: 12px; border-radius: 10px; font-size: 13px; margin-bottom: 20px; text-align: center; border: 1px solid rgba(5, 150, 105, 0.2); }
        .input-box { position: relative; width: 100%; height: 50px; margin: 20px 0; }
        .input-box input { width: 100%; height: 100%; background: #fff; border: 1px solid var(--border); border-radius: 12px; padding: 0 45px 0 15px; outline: none; transition: 0.3s; }
        .input-box i { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); font-size: 20px; color: var(--primary); }
        .btn { width: 100%; height: 48px; background: var(--primary); border: none; border-radius: 12px; color: #fff; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn:hover { background: var(--primary-dark); transform: translateY(-2px); }
        .back-link { display: block; text-align: center; margin-top: 20px; font-size: 14px; color: #6b7280; text-decoration: none; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>نسيت كلمة المرور؟</h1>
        <p class="subtitle">لا تقلق، فقط أدخل بريدك الإلكتروني وسنرسل لك رابطاً لتعيين كلمة مرور جديدة.</p>

        @if (session('status'))
            <div class="status-msg">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-box">
                <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required autofocus>
                <i class='bx bxs-envelope'></i>
            </div>
            @error('email') <p style="color:#dc2626; font-size:12px; margin-top:-15px; margin-bottom:10px;">{{ $message }}</p> @enderror

            <button type="submit" class="btn">إرسال رابط التعيين</button>
            <a href="{{ route('login') }}" class="back-link">العودة لتسجيل الدخول</a>
        </form>
    </div>
</body>
</html>