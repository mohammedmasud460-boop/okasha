<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدماتنا - شهادتي</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <style>
        :root {
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
        }

        body {
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        /* --- الهيدر --- */
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

        /* أيقونة القائمة للجوال */
        .menu-icon {
            display: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--primary);
        }

        /* --- القائمة الجانبية للجوال --- */
        .sidebar {
            position: fixed;
            top: 0;
            right: -100%; /* مخفية في البداية */
            width: 250px;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px);
            z-index: 2000;
            transition: 0.4s ease-in-out;
            padding: 20px;
            border-left: 1px solid var(--border);
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
        }

        .sidebar.active {
            right: 0; /* تظهر عند التفعيل */
        }

        .sidebar .close-icon {
            font-size: 2rem;
            cursor: pointer;
            color: var(--primary);
            margin-bottom: 30px;
            display: block;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 1.1rem;
            display: block;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            color: var(--primary);
            padding-right: 10px;
        }

        /* الطبقة الشفافة خلف القائمة */
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

        /* --- المحتوى --- */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            text-align: center;
        }

        .heading {
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #1f2937;
        }

        .heading span { color: var(--primary); }

        .serves-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .services-box {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(5px);
            padding: 40px 30px;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            transition: 0.4s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .services-box:hover {
            transform: translateY(-10px);
            background: white;
            border-color: var(--primary);
        }

        .services-box i {
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .services-box h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #1f2937;
        }

        .services-box p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: var(--primary-dark);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        }

        /* --- ميزات الجوال (Media Queries) --- */
        @media (max-width: 768px) {
            .nav-links { display: none; } /* إخفاء الروابط العادية */
            .menu-icon { display: block; } /* إظهار أيقونة المنيو */
            .heading { font-size: 1.8rem; margin-bottom: 25px; }
            .container { margin: 30px auto; }
            .services-box { padding: 30px 20px; }
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
    <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
    
    <div class="nav-links">
        <ul>
            <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
            <li><a href="{{ route('register') }}">الجهات التعليمية</a></li>
            <li><a href="{{ route('services') }}">خدماتنا</a></li>
            <li><a href="{{ route('conecte') }}">تواصل معنا</a></li>
            <li><a href="{{ route('about') }}">من نحن</a></li>
        </ul>
    </div>

    <i class='bx bx-menu menu-icon' id="openMenu"></i>
</nav>

<div class="container">
    <h2 class="heading">خدماتنا <span>الذكية</span></h2>

    <div class="serves-content">
        <div class="services-box">
            <i class='bx bx-certification'></i> 
            <h3>إصدار الشهادات</h3>
            <p>نظام ذكي يتيح للجهات التعليمية إصدار شهادات احترافية للمستفيدين بضغطة زر واحدة مع نماذج متعددة وجذابة.</p>
            <a href="#" class="btn">اكتشف المزيد</a>
        </div>

        <div class="services-box">
            <i class='bx bx-user-check'></i> 
            <h3>إدارة المستفيدين</h3>
            <p>نظم بيانات طلابك ومستفيديك بسهولة، تابع درجاتهم، وحدث بياناتهم من خلال لوحة تحكم عصرية وبسيطة.</p>
            <a href="#" class="btn">اكتشف المزيد</a>
        </div>

        <div class="services-box">
            <i class='bx bx-shield-quarter'></i> 
            <h3>أمان البيانات</h3>
            <p>نولي حماية بيانات جهتك التعليمية أولوية قصوى، مع تشفير كامل لكافة السجلات والملفات المرفوعة على المنصة.</p>
            <a href="#" class="btn">اكتشف المزيد</a>
        </div>
    </div>
</div>

<script>
    const openMenu = document.getElementById('openMenu');
    const closeMenu = document.getElementById('closeMenu');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    // فتح القائمة
    openMenu.addEventListener('click', () => {
        sidebar.classList.add('active');
        overlay.classList.add('active');
    });

    // إغلاق القائمة
    const closeFunc = () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    };

    closeMenu.addEventListener('click', closeFunc);
    overlay.addEventListener('click', closeFunc);
</script>

</body>
</html>