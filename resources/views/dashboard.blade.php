<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>قائمة الطلاب</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --danger: #dc2626;
            --border: #e5e7eb;
        }

        body {
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        nav {
            display: flex;
            padding: 10px 5%;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
        }

        nav img { width: clamp(80px, 10vw, 120px); }

        .nav-links ul { 
            padding: 0; 
            margin: 0;
            display: flex;
        }

        .nav-links ul li {
            list-style: none;
            padding: 5px 10px;
        }

        .nav-links ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center; 
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 40px;
            z-index: 10;
        }

        /* حاوية السلايدر - التأكد من التمركز */
        .slider {
            position: relative;
            width: 100%;
            height: 450px;
            margin-top: 20px;
            overflow: visible; /* للسماح للبطاقات الجانبية بالظهور */
        }

        /* تعديل البطاقة لتكون في المنتصف تماماً */
        .item {
            position: absolute;
            width: clamp(220px, 60vw, 280px);
            height: 380px;
            background-color: #fff;
            border-radius: 15px;
            padding: 25px;
            transition: 0.5s ease-in-out;
            /* التمركز الجوهري */
            left: 50%;
            top: 0;
            transform: translateX(-50%); 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .aimg { width: 60px; height: 60px; margin: 0 auto; }
        .item h1 { font-size: 1.3rem; color: var(--primary); margin: 10px 0; }
        .item p { font-size: 0.9rem; color: #555; margin: 3px 0; }

        /* أزرار التنقل */
        #next, #prev {
            position: absolute;
            top: 45%;
            transform: translateY(-50%);
            color: var(--primary);
            background: white;
            border: 2px solid var(--primary);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 25px;
            cursor: pointer;
            z-index: 100;
            transition: 0.3s;
        }

        #prev { left: 5%; }
        #next { right: 5%; }

        /* تنسيق حاوية الصورة لضمان التوسط */
.item div:first-child {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* تنسيق الصورة الشخصية */
.aimg {
    width: 120px;          /* عرض ثابت */
    height: 120px;         /* ارتفاع ثابت */
    border-radius: 50%;    /* جعل الصورة دائرية تماماً */
    object-fit: cover;     /* أهم خاصية: تمنع تشوه الصورة وتملأ الدائرة */
    border: 4px solid #fff; /* إطار أبيض حول الصورة */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* ظل ناعم لإعطاء عمق */
    margin-bottom: 15px;   /* مسافة بين الصورة والاسم */
    transition: transform 0.3s ease; /* حركة عند تمرير الماوس */
}

/* تأثير عند تمرير الماوس على الصورة */
.aimg:hover {
    transform: scale(1.05); /* تكبير بسيط جداً */
    border-color: #4f46e5;  /* تغيير لون الإطار (اختياري حسب لون هويتك) */
}

/* تنسيق الاسم أسفل الصورة */
.item h1 {
    font-size: 1.4rem;
    color: #333;
    margin: 10px 0;
    font-weight: bold;
}

        @media (max-width: 768px) {
            #prev { left: 2%; }
            #next { right: 2%; }
            .item { width: 220px; }
        }

        .actions { 
            display: flex; 
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .edit-link { color: var(--primary); font-weight: bold; text-decoration: none; font-size: 0.85rem; }
        .delete-btn { color: var(--danger); background: none; border: none; cursor: pointer; font-weight: bold; font-size: 0.85rem; }
        .cert-btn { background: var(--primary); color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 0.8rem; }
    </style>
</head>
<body>

<nav>
    <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
    <div class="nav-links">
        <ul>
            <li class="name1"><a href="{{ route('welcome1') }}">الرئيسية</a></li>
            <li class="name2"><a href="{{ route('profile.edit') }}">الإعدادات</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>قائمة الطلاب</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">إضافة طالب +</a>

    <div class="slider">
        @forelse($students as $student)
            <div class="item">
                <div>
<img class="aimg" src="{{ $student->image ? asset('storage/' . $student->image) : asset('image/avtare1.png') }}" >                    <h1>{{ $student->name }}</h1>
                
                    <p><strong>الدورة:</strong> {{ $student->course }}</p>
                    <p><strong>الدرجة:</strong> {{ $student->degree }}</p>
                      <!-- <p><strong>البريد:</strong> {{ $student->email }}</p> -->
                </div>
                
                <div class="actions">
                    <a href="{{ route('students.edit', $student->id) }}" class="edit-link">تعديل</a>
                    <a href="{{ route('certificates.index', $student->id) }}" class="cert-btn">إصدار شهادة</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf @method('DELETE')
                        <button type="submit" class="delete-btn">حذف</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="item">
                <h1>لا يوجد بيانات</h1>
                <p>ابدأ بإضافة طلاب جدد</p>
            </div>
        @endforelse

        @if($students->count() > 0)
            <button id="prev">‹</button>
            <button id="next">›</button>
        @endif
    </div>
</div>

<script>
    let items = document.querySelectorAll('.slider .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    
    let active = Math.floor(items.length / 2);

    function loadShow(){
        if(items.length === 0) return;

        // حساب الفجوة بناءً على حجم الشاشة
        let gap = window.innerWidth < 768 ? 80 : 150;

        // العنصر النشط (دائماً في المنتصف)
        items[active].style.transform = `translateX(-50%)`;
        items[active].style.zIndex = 10;
        items[active].style.filter = 'none';
        items[active].style.opacity = 1;

        let stt = 0;
        // العناصر لليمين
        for(var i = active + 1; i < items.length; i++){
            stt++;
            items[i].style.transform = `translateX(calc(-50% + ${gap*stt}px)) scale(${1 - 0.2*stt}) perspective(16px) rotateY(-1deg)`;
            items[i].style.zIndex = -stt;
            items[i].style.filter = 'blur(5px)';
            items[i].style.opacity = stt > 2 ? 0 : 0.6;
        }

        stt = 0;
        // العناصر لليسار
        for(var i = active - 1; i >= 0; i--){
            stt++;
            items[i].style.transform = `translateX(calc(-50% - ${gap*stt}px)) scale(${1 - 0.2*stt}) perspective(16px) rotateY(1deg)`;
            items[i].style.zIndex = -stt;
            items[i].style.filter = 'blur(5px)';
            items[i].style.opacity = stt > 2 ? 0 : 0.6;
        }
    }

    loadShow();

    next.onclick = function(){
        active = active + 1 < items.length ? active + 1 : active;
        loadShow();
    }

    prev.onclick = function(){
        active = active - 1 >= 0 ? active - 1 : active;
        loadShow();
    }

    // إعادة الضبط عند تغيير حجم الشاشة لضمان التمركز
    window.addEventListener('resize', loadShow);
</script>

</body>
</html>