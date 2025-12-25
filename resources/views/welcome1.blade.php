<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>منصة شهادتي | الواجهة الرسمية</title>
    <style>
        :root {
            --primary-navy: #1e1b4b; /* كحلي رسمي صلب */
            --accent-blue: #4f46e5; /* أزرق احترافي */
            --bg-solid: #f8fafc;    /* خلفية صلبة مريحة للعين */
            --text-main: #0f172a;
            --text-muted: #475569;
            --white: #ffffff;
                    --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #14e3faff;
            --border: rgba(255, 255, 255, 0.3);
            --glass-bg: rgba(255, 255, 255, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body, html {
            height: 100%;
            background-color: var(--bg-solid);
               background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            overflow-x: hidden;
        }

        .header {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* شريط تنقل رسمي صلب بدون شفافية */
      nav {
            display: flex;
            padding: 10px 5%;
            justify-content: space-between;
            align-items: center;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav img { width: clamp(80px, 10vw, 120px); }

        .nav-links ul { 
            display: flex;
            list-style: none;
        }

        .nav-links ul li { padding: 5px 15px; }

        .nav-links ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav-links ul li a:hover { color: var(--primary); }

        /* حاوية المحتوى الرئيسية - توسيط كامل */
        .content-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center; /* توسيط النص */
            padding: 100px 20px 40px; /* تعويض ارتفاع الـ Nav */
        }

        .hero-section {
            max-width: 800px;
            width: 100%;
        }

        .hero-section .brand-mark {
            width: 140px;
            margin: 0 auto 30px; /* توسيط الصورة */
            display: block;
        }

        .hero-section h1 {
            font-size: clamp(32px, 5vw, 52px);
            color: var(--primary-navy);
            margin-bottom: 20px;
            font-weight: 800;
            line-height: 1.2;
        }

        .hero-section p {
            font-size: clamp(16px, 1.3vw, 20px);
            color: var(--text-muted);
            line-height: 1.8;
            margin: 0 auto 40px; /* توسيط الفقرة */
            max-width: 650px;
        }

        /* أزرار رسمية صلبة */
        .cta-group {
            display: flex;
            gap: 20px;
            justify-content: center; /* توسيط الأزرار */
            flex-wrap: wrap;
        }

        .btn-main {
            text-decoration: none;
            background-color: var(--primary-navy);
            color: var(--white);
            padding: 16px 50px;
            font-size: 17px;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-main:hover {
            background-color: var(--accent-blue);
            transform: translateY(-2px);
        }

        .btn-outline {
            text-decoration: none;
            background-color: transparent;
            border: 2px solid var(--primary-navy);
            color: var(--primary-navy);
            padding: 14px 48px;
            font-size: 17px;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-outline:hover {
            background-color: #f1f5f9;
        }

        /* التحكم في الجوال */
        .mobile-toggle {
            display: none;
            font-size: 32px;
            cursor: pointer;
            color: var(--primary-navy);
        }

        @media (max-width: 992px) {
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background-color: var(--white);
                transition: 0.4s;
                padding: 100px 30px;
                box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            }
            .nav-links.active { right: 0; }
            .nav-links ul { flex-direction: column; text-align: right; }
            .mobile-toggle { display: block; }
            .bx-x { position: absolute; top: 25px; right: 25px; font-size: 32px; cursor: pointer; }
        }
    </style>
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo-area">
                <a href="#"><img src="{{asset('image/logono.png')}}" alt="شعار منصة شهادتي"></a>
            </div>
            
            <div class="nav-links" id="navLinks">
                <i class="bx bx-x" onclick="toggleMenu()"></i>
                <ul>
                    <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
                    <li><a href="{{ route('register') }}">الجهات التعليمية</a></li>
                    <li><a href="{{ route('services') }}">خدماتنا</a></li>
                    <li><a href="{{ route('conecte') }}">تواصل معنا</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                </ul>
            </div>
            
            <i class="bx bx-menu-alt-right mobile-toggle" onclick="toggleMenu()"></i>
        </nav>

        <main class="content-wrapper">
            <section class="hero-section">
                <img src="{{asset('image/logono.png')}}" alt="Logo" class="brand-mark">
                <h1>منصة شهادتي الإلكترونية</h1>
                <p>
                    نظام مؤسسي متكامل لأتمتة إصدار وتوثيق الشهادات الأكاديمية والمهنية. نجمع بين دقة الأداء وسهولة الإدارة لتوفير تجربة رقمية موثوقة للجهات التعليمية.
                </p>
                <div class="cta-group">
                    <a href="{{ route('register') }}" class="btn-main">ابدأ الآن</a>
                    <a href="{{ route('about') }}" class="btn-outline">تعرف علينا</a>
                </div>
            </section>
        </main>
    </div>

    <script>
        function toggleMenu() {
            document.getElementById("navLinks").classList.toggle("active");
        }
    </script>
</body>
</html>