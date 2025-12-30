<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>تأكيد البريد الإلكتروني | منصة شهادتي</title>
    <style>
        :root {
            --primary-navy: #1e1b4b;
            --accent-blue: #4f46e5;
            --bg-solid: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #475569;
            --white: #ffffff;
            --border-light: #e2e8f0;
            --success: #16a34a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- شريط التنقل (نفس تنسيق الصفحة الثانية) --- */
        nav {
            display: flex;
            padding: 0 8%;
            height: 80px;
            justify-content: space-between;
            align-items: center;
            background-color: var(--white);
            border-bottom: 1px solid var(--border-light);
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
        }

        nav img { height: 45px; width: auto; }

        .nav-links ul {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links ul li a {
            color: var(--text-main);
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
        }

        /* --- حاوية المحتوى المركزي --- */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 20px 40px;
        }

        .verify-card {
            background: var(--white);
            max-width: 550px;
            width: 100%;
            padding: 45px;
            border-radius: 24px;
            border: 1px solid var(--border-light);
            box-shadow: 0 20px 40px rgba(0,0,0,0.06);
            text-align: center;
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #f0f0ff;
            color: var(--accent-blue);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 25px;
        }

        h1 {
            font-size: 26px;
            color: var(--primary-navy);
            margin-bottom: 15px;
            font-weight: 800;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .status-alert {
            background: #f0fdf4;
            color: var(--success);
            padding: 15px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 25px;
            border: 1px solid #dcfce7;
        }

        .actions-row {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .btn-primary {
            width: 100%;
            padding: 16px;
            background: var(--primary-navy);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: var(--accent-blue);
            transform: translateY(-2px);
        }

        .btn-logout {
            background: transparent;
            color: var(--text-muted);
            border: none;
            text-decoration: underline;
            font-size: 14px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-logout:hover { color: #ef4444; }

        @media (max-width: 768px) {
            .verify-card { padding: 30px 20px; }
            nav { padding: 0 5%; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo-area">
            <a href="#"><img src="{{asset('image/logono.png')}}" alt="شعار منصة شهادتي"></a>
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
                <li><a href="{{ route('services') }}">خدماتنا</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
            </ul>
        </div>
    </nav>

    <main class="main-content">
        <div class="verify-card">
            <div class="icon-box">
                <i class='bx bx-envelope-open'></i>
            </div>
            
            <h1>تأكيد البريد الإلكتروني</h1>
            
            <p class="subtitle">
                شكرًا لتسجيلك في منصة شهادتي! يُرجى التحقق من بريدك الإلكتروني والنقر على رابط التأكيد لتفعيل حسابك. إذا لم تصلك الرسالة، يمكننا إرسالها مجددًا.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="status-alert">
                    <i class='bx bx-check-circle'></i> تم إرسال رابط تحقق جديد بنجاح.
                </div>
            @endif

            <div class="actions-row">
                <form method="POST" action="{{ route('verification.send') }}" style="width: 100%;">
                    @csrf
                    <button type="submit" class="btn-primary">
                        إعادة إرسال رابط التحقق
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>