<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>من نحن | منصة شهادتي</title>
    <style>
        :root {
            --primary-navy: #1e1b4b;
            --accent-blue: #4f46e5;
            --bg-solid: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #475569;
            --white: #ffffff;
            --border-light: #e2e8f0;
            --glass-bg: rgba(255, 255, 255, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
             background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            background-color: var(--bg-solid);
            color: var(--text-main);
            line-height: 1.6;
        }

        /* --- شريط التنقل الرئيسي --- */
        nav {
            display: flex;
            padding: 0 8%;
            height: 80px;
            justify-content: space-between;
            align-items: center;
            background-color: var(--white);
            border-bottom: 1px solid var(--border-light);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        nav .logo-area img {
            height: 45px;
            width: auto;
        }

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
            transition: 0.3s;
        }

        .nav-links ul li a:hover {
            color: var(--accent-blue);
        }

        /* أيقونة القائمة للجوال */
        .mobile-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
            color: var(--primary-navy);
        }

        /* --- القائمة الجانبية للجوال (Sidebar) --- */
        .sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            z-index: 2000;
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 30px;
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
            border-left: 1px solid var(--border-light);
        }

        .sidebar.active {
            right: 0;
        }

        .sidebar .close-icon {
            font-size: 32px;
            cursor: pointer;
            color: var(--primary-navy);
            margin-bottom: 40px;
            display: block;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 25px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: var(--text-main);
            font-weight: 700;
            font-size: 1.1rem;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            color: var(--accent-blue);
            padding-right: 10px;
        }

        /* الطبقة الشفافة خلف المنيو */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            z-index: 1500;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        /* --- محتوى الصفحة --- */
        .sub-header {
            height: 35vh;
            width: 100%;
            background-color: var(--primary-navy);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px;
            color: var(--white);
            text-align: center;
        }

        .sub-header h1 {
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 800;
        }

        .about-section {
            padding: 60px 5%;
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .about-card {
            background-color: var(--white);
            padding: 50px 30px;
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .about-img img {
            width: 130px;
            margin-bottom: 25px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.05));
        }

        .about-content h2 {
            font-size: 28px;
            color: var(--primary-navy);
            margin-bottom: 15px;
        }

        .about-content h2 span { color: var(--accent-blue); }

        .about-content p {
            font-size: 17px;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 35px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-read-more {
            display: inline-block;
            text-decoration: none;
            background-color: var(--primary-navy);
            color: var(--white);
            padding: 12px 35px;
            border-radius: 10px;
            font-weight: 700;
            transition: 0.3s;
        }

        .social-links {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-links a {
            color: var(--primary-navy);
            font-size: 28px;
            transition: 0.3s;
        }

        /* --- ميزات الجوال --- */
        @media (max-width: 992px) {
            .nav-links { display: none; }
            .mobile-toggle { display: block; }
            .about-card { padding: 30px 15px; }
            nav { padding: 0 5%; }
        }
    </style>
</head>
<body>

    <div class="overlay" id="overlay"></div>

    <div class="sidebar" id="sidebar">
        <i class='bx bx-x close-icon' id="closeMenu"></i>
        <ul>
            <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
            <li><a href="{{ route('register') }}">الجهات التعليمية</a></li>
            <li><a href="{{ route('services') }}">خدماتنا</a></li>
            <li><a href="{{ route('conecte') }}">تواصل معنا</a></li>
            <li><a href="{{ route('about') }}">من نحن</a></li>
        </ul>
    </div>

    <nav>
        <div class="logo-area">
            <a href="#"><img src="{{asset('image/logono.png')}}" alt="شعار شهادتي"></a>
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
                <li><a href="{{ route('register') }}">الجهات التعليمية</a></li>
                <li><a href="{{ route('services') }}">خدماتنا</a></li>
                <li><a href="{{ route('conecte') }}">تواصل معنا</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
            </ul>
        </div>
        <i class="bx bx-menu-alt-right mobile-toggle" id="openMenu"></i>
    </nav>

    <header class="sub-header">
        <h1>من نحن</h1>
    </header>

    <main class="about-section">
        <div class="about-card">
            <div class="about-img">
                <img src="{{asset('image/logono.png')}}" alt="شعار المنصة">
            </div>
            
            <div class="about-content">
                <h2>رؤيتنا في <span>منصة شهادتي</span></h2>
                <h3>نحو تحول رقمي آمن وموثوق للوثائق التعليمية</h3>
                <p>
                    نحن فريق متخصص يسعى لتطوير الحلول التقنية التي تخدم المؤسسات التعليمية والأكاديمية. انطلقت منصة "شهادتي" لتكون الجسر الذي يربط بين كفاءة الإدارة وجودة المخرجات، من خلال أتمتة عمليات إصدار الشهادات وضمان صحتها بأحدث المعايير البرمجية، مما يوفر الوقت والجهد ويضمن دقة البيانات.
                </p>
                <a href="{{ route('services') }}" class="btn-read-more">اكتشف خدماتنا</a>
            </div>

            <div class="social-links">
                <a href="https://facebook.com" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                <a href="https://instagram.com" target="_blank"><i class='bx bxl-instagram'></i></a>
                <a href="https://whatsapp.com" target="_blank"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://twitter.com" target="_blank"><i class='bx bxl-twitter'></i></a>
            </div>
        </div>
    </main>

    <script>
        const openMenu = document.getElementById('openMenu');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // فتح القائمة الجانبية
        openMenu.addEventListener('click', () => {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        // دالة الإغلاق
        const closeSidebar = () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        };

        closeMenu.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);
    </script>
</body>
</html>