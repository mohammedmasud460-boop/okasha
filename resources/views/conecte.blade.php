<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>تواصل معنا | منصة شهادتي</title>
    <style>
        :root {
            --primary-navy: #1b414bff; /* كحلي رسمي صلب */
            --accent-blue: #4f46e5; /* أزرق احترافي */
            --bg-solid: #f8fafc;    /* خلفية صلبة */
            --text-main: #0f172a;
            --text-muted: #475569;
            --white: #ffffff;
            --border-light: #e2e8f0;
            --glass-bg: rgba(255, 255, 255, 0.4);
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

        body {
           background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* --- شريط التنقل --- */
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

        /* أيقونة الجوال */
        .mobile-toggle {
            display: none;
            font-size: 32px;
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

        .sidebar.active { right: 0; }

        .sidebar .close-icon {
            font-size: 32px;
            cursor: pointer;
            color: var(--primary-navy);
            margin-bottom: 40px;
            display: block;
        }

        .sidebar ul { list-style: none; }
        .sidebar ul li { margin-bottom: 25px; }
        .sidebar ul li a {
            text-decoration: none;
            color: var(--text-main);
            font-weight: 700;
            font-size: 1.1rem;
        }
         .menu-icon {
           display: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--primary);
        }

        /* الطبقة المعتمة خلف المنيو */
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
        .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 10px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

        /* --- محتوى الصفحة --- */
        .sub-header {
            height: 30vh;
            width: 100%;
            background-color:  var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px;
            color: var(--white);
        }

        .sub-header h1 { font-size: clamp(28px, 4vw, 42px); font-weight: 800; }

        .map-section {
            width: 85%;
            margin: 40px auto;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-light);
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .map-section iframe { width: 100%; height: 400px; display: block; border: 0; }

        .contact-container {
            width: 85%;
            margin: 0 auto 60px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        .contact-info, .contact-form {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid var(--border-light);
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 35px;
        }

        .info-item i {
            font-size: 32px;
            color: var(--accent-blue);
            background: #f0f0ff;
            padding: 12px;
            border-radius: 12px;
        }

        .info-item h5 { font-size: 18px; color: var(--primary-navy); margin-bottom: 5px; }
        .info-item p { color: var(--text-muted); font-size: 15px; }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid var(--border-light);
            border-radius: 10px;
            background: #fcfcfd;
            font-size: 15px;
            outline: none;
        }

        .btn-send {
            width: 100%;
            padding: 16px;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-send:hover {
            background: var(--accent-blue);
            transform: translateY(-2px);
        }

        /* --- استجابة الجوال --- */
        @media (max-width: 992px) {
            .nav-links { display: none; }
            .mobile-toggle { display: block; }
            nav { padding: 0 5%; }
            .map-section, .contact-container { width: 95%; }
             .menu-icon { display: block; } /* إظهار أيقونة المنيو */
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
            <a href="#"><img src="{{asset('image/logono.png')}}" alt="شعار منصة شهادتي"></a>
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
        <i class='bx bx-menu menu-icon' id="openMenu"></i>
    </nav>

   

    <section class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10409.926481390581!2d39.76678060243447!3d21.450138639021997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sar!2ssa!4v1767222893841!5m2!1sar!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <main class="contact-container">
        <div class="contact-info">
            <div class="info-item">
                <i class='bx bx-map-pin'></i>
                <div>
                    <h5>الموقع الرئيسي</h5>
                    <p>المملكة العربية السعودية، مكة<br>حي الزايدي, معهد هرماس </p>
                </div>
            </div>
            <div class="info-item">
                <i class='bx bx-envelope'></i>
                <div>
                    <h5>البريد الإلكتروني</h5>
                    <p>mohammed.masud460@gmail.com<br>info@shahadati.sa</p>
                </div>
            </div>
            <div class="info-item">
                <i class='bx bx-phone-call'></i>
                <div>
                    <h5>الدعم الفني</h5>
                    <p>+966557977270<br>من الأحد للخميس (8ص - 4م)</p>
                </div>
            </div>
        </div>

        <div class="contact-form">
             @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <form action="{{ route('contact.send') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="الاسم الكامل" required>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="text" name="subject" placeholder="عنوان الرسالة" required>
    <textarea name="message" rows="5" placeholder="كيف يمكننا مساعدتك؟" required></textarea>
    <button type="submit" class="btn-send">إرسال الرسالة</button>
</form>
        </div>
    </main>

    <script>
        const openMenu = document.getElementById('openMenu');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        openMenu.addEventListener('click', () => {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        const closeSidebar = () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        };

        closeMenu.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);
    </script>
</body>
</html>