<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <title>شهادة إنجاز - {{ $student->name }}</title>
    <style>
        /* إعدادات الطباعة لـ mPDF */
        @page {
            margin: 0;
            size: A4 landscape;
        }

        :root {
            --cert-gold: #c5a059;
            --cert-navy: #1e3a8a;
            --cert-bg: #f8fafc;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0;
            direction: rtl;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--cert-bg);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* --- أزرار التحكم --- */
        .actions {
            width: 100%;
            padding: 15px;
            background: #fff;
            display: flex;
            justify-content: center;
            gap: 10px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn-download { background: var(--cert-navy); color: white; }
        .btn-back { background: #64748b; color: white; }

        /* --- حاوية الشهادة --- */
        .certificate-container {
            padding: 20px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .certificate-paper {
            width: 297mm;
            height: 210mm;
            background-image: url("{{ $backgroundImage ?? '' }}");
            background-size: 100% 100%;
            background-color: white;
            position: relative;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            display: flex;
            flex-direction: column;
            padding: 50pt 70pt;
        }

        .main-title {
          
            font-size: 48pt;
            font-weight: 800;
            text-align: center;
            margin-bottom: 10pt;
            margin-top: 10pt;
        }

        .statement {
            font-size: 18pt;
            color: #475569;
            text-align: center;
            margin: 15pt 0;
        }

  
        .name{
            font-size: 20pt;
            font-weight: bold;
            color: #111827;
            
        }

        .course-text {
            font-size: 19pt;
            line-height: 1.6;
            color: #1e293b;
            text-align: center;
            margin-bottom: 30pt;
        }

        .course-name {
      
            font-weight: bold;
            font-size: 24pt;
        }

        /* --- التذييل المحدث (المدرب يميناً والتوقيع يساراً) --- */
        .cert-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 30pt;
        }

        .footer-box {
            text-align: center;
            flex: 1;
        }

        .footer-box.right { text-align: right; } /* المدرب يمين */
        .footer-box.left { text-align: left; }   /* التوقيع يسار */

        .sig-line {
            border-top: 1.5pt solid #1e293b;
            width: 180pt;
            margin-bottom: 8pt;
        }
        
        /* موازنة الخطوط في المحاذاة الجانبية */
        .footer-box.left .sig-line { margin-left: 0; margin-right: auto; }
        .footer-box.right .sig-line { margin-right: 0; margin-left: auto; }

        .label-text {
            font-size: 12pt;
            color: #64748b;
            margin-bottom: 5pt;
        }

        .name-text {
            font-weight: bold;
            font-size: 16pt;
            color: #1e293b;
        }

        /* الختم في المنتصف */
        .seal-box {
            width: 80pt;
            height: 80pt;
            border: 2pt double var(--cert-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cert-gold);
            font-size: 10pt;
            font-weight: bold;
            transform: rotate(-15deg);
            margin: 0 auto;
        }

        /* حاوية الأزرار الرئيسية */
.actions {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px; /* المسافة بين الأزرار */
    margin-top: 30px;
    flex-wrap: wrap; /* لضمان التناسق في الشاشات الصغيرة */
}

/* التنسيق العام لجميع الأزرار */
.btn, .btn-send {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
    height: 42px; /* توحيد الطول */
}

/* زر تحميل PDF */
.btn-download {
     background: #4f46e5;
            color: white;
}
.btn-download:hover { background-color: #1e40af; transform: translateY(-2px); }

/* زر الرجوع */
.btn-back {
     background: #4f46e5;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            z-index: 10;
}
.btn-back:hover { background-color: #475569; transform: translateY(-2px); }

/* زر إرسال للبريد */
.btn-send {
    background: #4f46e5;
            color: white;
}
.btn-send:hover { background-color: #047857; transform: translateY(-2px); }

/* أيقونات داخل الأزرار */
.btn span, .btn i {
    margin-left: 8px;
}

.inline-form {
    display: inline-block;
}
        /* --- ميزات الجوال --- */
        @media screen and (max-width: 1024px) {
            .certificate-paper {
                width: 100%;
                height: auto;
                aspect-ratio: 297/210;
                padding: 5% 7%;
            }
            .main-title { font-size: 6vw; }
            .student-name { font-size: 5vw; }
            .course-text { font-size: 2.5vw; }
            .name-text { font-size: 2vw; }
            .sig-line { width: 25vw; }
        }

        @media print {
            .actions { display: none; }
            .certificate-paper { box-shadow: none; border: none; margin: 0; }
        }
    </style>
</head>
<body>

 <div class="actions">
    <a href="{{ route('pdf.download7', $student->id) }}" class="btn btn-download">
        <span>💾</span> تحميل PDF
    </a>
    
    <a href="javascript:history.back()" class="btn btn-back">
        <span>↩</span> رجوع
    </a>

    <form action="{{ route('certificates.sendEmail', [$student->id, 7]) }}" method="POST" class="inline-form">
        @csrf
        <button type="submit" class="btn btn-send" onclick="return confirm('هل أنت متأكد من إرسال الشهادة لبريد الطالب؟')">
            <i class='bx bx-paper-plane'></i> إرسال الشهادة الى بريد الطالب 
        </button>
    </form>
</div>
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
            {{ session('error') }}
        </div>
    @endif
</div>
    <div class="certificate-container">
       <div class="certificate-paper">
            
            <div class="header">
                <div class="main-title">شهادة إجتياز</div><br><br>
                <div class="statement">يـسرنا أن نشـهد بأن المتدرب/ـة: <span class="name">{{ $student->name }}</span></div>
            </div>

            

            <div class="course-text">
               قد اجتاز بنجاح الدورة التدريبية بعنوان :
                <span class="course-name">" {{ $student->course }} "</span><span style="color: #1e293b;"> التي أقيمت في مركزنا التدريبي</span><br><br>
             
والمنعقد في تاريخ {{ $student->course_date->format('Y-m-d') }} م وقد حصل على تقدير عام : {{ $student->degree }}
            </div>
            <div class="course-text">بناءً عليه، مُنحت له هذه الشهادة تقديراً لجهوده وتمنياتنا له بمزيد من التوفيق والنجاح.</div><br><br>
           <div class="date-text" style="text-align: center; font-size: 14pt; color: #475569; ">
                صدر في: {{ \Carbon\Carbon::now()->format('Y-m-d') }}
            </div>
          <table class="footer-table" style="width: 100%; border-collapse: collapse; ">
    <tr>
        <td class="footer-cell" style="width: 33%; text-align: center;">
         
            <div class="label-text">الجهة</div>
           
            <div class="name-text">{{ auth()->user()->name }}</div>
        </td>

        <td class="footer-cell" style="width: 33%; text-align: center; vertical-align: middle;">
            <div class="seal-box" style="margin: 0 auto;">الختم الرسمي</div>
        </td>

        <td class="footer-cell" style="width: 33%; text-align: center;">
          
            <div class="label-text">اعتماد التوقيع</div>
             
            <div class="name-text">رقمي</div>
        </td>
    </tr>
</table>

        </div>
    </div>

</body>
</html>