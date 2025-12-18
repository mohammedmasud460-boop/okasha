
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <!-- تصحيح الهيدر -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- خطوط وأيقونات (اختياري) -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">

    <title>قائمة المستفيدين</title>

    <style>
        body { font-family: "Tahoma","Segoe UI",system-ui,Arial,sans-serif; }
        nav { display:flex; align-items:center; justify-content:space-between; padding:10px 16px; background:#fff; border-bottom:1px solid #eee; }
        nav .nav-links ul { display:flex; gap:12px; list-style:none; margin:0; padding:0; }
        nav .nav-links a { text-decoration:none; color:#333; padding:8px 10px; border-radius:8px; }
        nav .nav-links a:hover { background:#f3f4f6; }
        .container { max-width:1100px; margin:24px auto; }

        

        :root{
            --bg:#f7f7fb; --card:#fff; --text:#1f2937; --muted:#6b7280;
            --primary:#4f46e5; --primary-dark:#4338ca; --danger:#dc2626; --border:#e5e7eb;
            --success:#16a34a; --ring:#c7d2fe;
        }
        html,body{margin:0; padding:0; background:var(--bg); color:var(--text); font-family:"Tahoma","Segoe UI",system-ui,Arial,sans-serif;}
        a{color:var(--primary); text-decoration:none;}
        a:hover{color:var(--primary-dark);}

        /* شريط التنقّل */
        nav{
            display:flex; align-items:center; justify-content:space-between;
            padding:12px 16px; background:#fff; border-bottom:1px solid var(--border);
            position:sticky; top:0; z-index:50;
        }
        nav .brand{display:flex; align-items:center; gap:10px; font-weight:700; color:#111827;}
        nav .brand img{height:40px; width:auto;}
        nav .nav-links ul{display:flex; gap:8px; list-style:none; margin:0; padding:0;}
        nav .nav-links a{display:inline-block; padding:8px 10px; border-radius:10px; color:#374151;}
        nav .nav-links a:hover{background:#f3f4f6;}

        /* الصفحة */
        .container{max-width:1100px; margin:24px auto; padding:0 16px;}
        .page-head{display:flex; align-items:center; justify-content:space-between; gap:16px; margin-bottom:12px;}
        .page-head h2{margin:0; font-size:22px; font-weight:700; color:#111827;}
        .card{
            background:#fff; border:1px solid var(--border); border-radius:14px;
            box-shadow:0 6px 18px rgba(0,0,0,.06); padding:16px;
        }

        /* أزرار */
        .btn{display:inline-flex; align-items:center; gap:6px; padding:10px 14px; border-radius:10px; border:1px solid var(--border); background:#fff; color:#374151; cursor:pointer; transition:all .15s;}
        .btn:hover{transform:translateY(-1px);}
        .btn-primary{background:var(--primary); color:#fff; border-color:var(--primary);}
        .btn-primary:hover{background:var(--primary-dark);}
        .btn-outline-primary{background:#fff; color:var(--primary); border-color:var(--ring);}
        .btn-outline-primary:hover{background:#eef2ff;}
        .btn-outline-danger{background:#fff; color:var(--danger); border-color:#fecaca;}
        .btn-outline-danger:hover{background:#fff1f2;}
        .btn-outline-secondary{background:#fff; color:#374151; border-color:var(--border);}
        .btn-outline-secondary:hover{background:#f3f4f6;}

        /* جدول */
        .table{width:100%; border-collapse:separate; border-spacing:0; background:#fff; border:1px solid var(--border); border-radius:14px; overflow:hidden;}
        .table thead th{
            background:#f3f4f6; color:#111827; font-size:14px; font-weight:600; padding:12px 10px; text-align:right; border-bottom:1px solid var(--border);
        }
        .table tbody td{
            padding:12px 10px; border-bottom:1px solid var(--border); color:#374151; font-size:14px;
        }
        .table tbody tr:hover{background:#fafafa;}
        .actions-cell{display:flex; gap:8px; flex-wrap:wrap;}

        /* تنبيهات */
        .alert{padding:10px 12px; border-radius:10px; font-size:14px; margin-bottom:12px;}
        .alert-success{background:#ecfdf5; color:#065f46; border:1px solid #d1fae5;}
        .alert-danger{background:#fef2f2; color:#991b1b; border:1px solid #fecaca;}

        /* رجوع */
        .back-area{margin-top:12px;}
  

    </style>
</head>
<body>

    <!-- شريط التنقّل -->
     <nav>
          <!-- <a href="#"><img src="{{asset('image/logono.png')}}" alt="logo"></a> -->
            <div class="nav-links" id="navLinks">
                <i class="bxl bx-instagram" onclick="hideMenu()"></i>
                <ul>
                    <li class="name1"><a href="#" >الصفحة الرئيسية</a></li>
                    <li class="name2"><a href="{{ route('register') }}">الجهات التعليمية</a></li>
                    <li class="name2"><a href="#">خدماتنا</a></li>
                    <li class="name2" ><a href="#">الاسئلة الشائعة</a></li>
                    <li class="name2"><a href="#">من نحن</a></li>
                    <li class="name2"><a href="{{ route('profile.edit') }}">الاعدادات</a></li>
                    
                </ul>
            </div>
            <i class="bxl bx-instagram"onclick="showMenu()"></i>
        </nav>

    <div class="container">
        <!-- زر إضافة مستفيد -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">قائمة المستفيدين</h2>
            <a href="{{ route('students.create') }}" class="btn btn-primary">
                <i class='bx bx-plus'></i> إضافة مستفيد
            </a>
        </div>

        <!-- رسائل النجاح -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- جدول المستفيدين -->
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الدورة</th>
                    <th style="width:180px">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course }}</td>
                        <td>
                            <a href="{{ route('students.edit',$student ) }}" class="btn btn-sm btn-outline-primary">
                                <i class='bx bx-edit'></i> تعديل
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('هل تريد حذف هذا المستفيد؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class='bx bx-trash'></i> حذف
                                </button>
                            </form>
                               <a href="{{ route('certificates.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class='bx bx-edit'></i> شهادة
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">لا توجد بيانات مستفيدين حتى الآن.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- زر رجوع -->
        <a href="{{ url()->previous() }}" class="btn btn-secondary">رجوع</a>
    </div>

  
</body>
</html>
