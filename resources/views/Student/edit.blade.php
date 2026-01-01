<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>تعديل بيانات الطالب | {{ $student->name }}</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --danger: #dc2626;
            --border: #e5e7eb;
        }

        body {
            /* استخدام نفس الخلفية المتدرجة الموحدة */
            background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
        }

        /* شريط التنقل الموحد */
        nav {
            display: flex;
            padding: 10px 5%;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        nav img { width: clamp(80px, 10vw, 120px); }

        .nav-links ul { 
            padding: 0; 
            margin: 0;
            display: flex;
            list-style: none;
        }

        .nav-links ul li { padding: 5px 10px; }

        .nav-links ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        /* حاوية النموذج بتنسيق البطاقة الزجاجية المتوافق مع التصميم الجديد */
        .container {
            max-width: 600px;
            width: 95%;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        h2 {
            color: var(--primary);
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .field { margin-bottom: 18px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }
/* عدل هذا الجزء في كود الـ CSS الخاص بك */
input, select { 
    width: 100%;
    padding: 12px 15px;
    border: 1px solid var(--border);
    border-radius: 10px;
    font-size: 14px;
    background: #fff;
    transition: 0.3s;
    box-sizing: border-box;
    /* إضافة شكل السهم بشكل أنيق */
    appearance: none; 
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: left 15px center; /* جعل السهم جهة اليسار لأن الكتابة عربي */
    background-size: 1em;
}

select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}
        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 14px;
            background: #fff;
            transition: 0.3s ease;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 13px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: #4b5563;
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background: rgba(0,0,0,0.05);
        }

        /* رسائل الخطأ والتنبيهات */
        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #d1fae5;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        .error { color: var(--danger); font-size: 12px; margin-top: 5px; }
    </style>
</head>
<body>

    <nav>
        <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a>
        <div class="nav-links">
            <ul>
                <li><a href="{{ route('welcome1') }}">الرئيسية</a></li>
                <li><a href="{{ route('dashboard') }}">قائمة الطلاب</a></li>
                 
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>تعديل بيانات الطلاب</h2>

        @if($errors->any())
            <div class="alert-danger">
                <strong>يرجى تصحيح الأخطاء التالية:</strong>
                <ul style="margin: 5px 0 0; padding-right: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="field">
                <label>الاسم الكامل</label>
                <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="field">
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="field">
                <label>المسمى التدريبي (الدورة)</label>
                <input type="text" name="course" value="{{ old('course', $student->course) }}" required>
                @error('course') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div style="display: flex; gap: 15px;">
                <div class="field" style="flex: 2;">
                    <label>تاريخ الدورة</label>
                    <input type="date" name="course_date" 
                           value="{{ old('course_date', is_object($student->course_date) ? $student->course_date->format('Y-m-d') : $student->course_date) }}" required>
                    @error('course_date') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="field" style="flex: 1;">
                    <label>الدرجة </label>
                     <select name="degree" required>
        <option value="" disabled>اختر التقدير</option>
        <option value="ممتاز" {{ old('degree', $student->degree) == 'ممتاز' ? 'selected' : '' }}>ممتاز</option>
        <option value="جيد جداً" {{ old('degree', $student->degree) == 'جيد جداً' ? 'selected' : '' }}>جيد جداً</option>
        <option value="جيد" {{ old('degree', $student->degree) == 'جيد' ? 'selected' : '' }}>جيد</option>
        <option value="مقبول" {{ old('degree', $student->degree) == 'مقبول' ? 'selected' : '' }}>مقبول</option>
    </select>
                    @error('degree') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="field">
    <label>تغيير صورة الطالب</label>
    <input type="file" name="image" accept="image/*">
    @error('image') <div class="error">{{ $message }}</div> @enderror
</div>
            <div class="actions">
                <button type="submit" class="btn btn-primary">تحديث البيانات</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline">رجوع</a>
            </div>
        </form>
    </div>

</body>
</html>