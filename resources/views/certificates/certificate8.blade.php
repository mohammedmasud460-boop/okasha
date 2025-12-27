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
            color: var(--cert-navy);
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

        .student-name {
            font-size: 40pt;
            color: #111827;
            font-weight: bold;
            text-align: center;
            border-bottom: 2pt double var(--cert-gold);
            display: block;
            width: fit-content;
            margin: 5pt auto 20pt;
            padding-bottom: 5pt;
        }

        .course-text {
            font-size: 19pt;
            line-height: 1.6;
            color: #1e293b;
            text-align: center;
            margin-bottom: 30pt;
        }

        .course-name {
            color: var(--cert-navy);
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
        <a href="{{ route('pdf.download8', $student->id) }}" class="btn btn-download">💾 تحميل PDF</a>
        <a href="javascript:history.back()" class="btn btn-back">↩ رجوع</a>
    </div>

    <div class="certificate-container">
        <div class="certificate-paper">
            
            <div class="header">
                <div class="main-title">شهادة إنجاز</div>
                <div class="statement">تتشرف المنصة بمنح هذه الشهادة لـ :</div>
            </div>

            <div class="recipient">
                <div class="student-name">{{ $student->name }}</div>
            </div>

            <div class="course-text">
                وذلك لاجتيازه بنجاح البرنامج التدريبي بعنوان:<br>
                <span class="course-name">" {{ $student->course }} "</span><br>
                والمنعقد في تاريخ {{ $student->course_date }}م بتقدير {{ $student->degree }}%
            </div>

            <div class="cert-footer">
                <div class="footer-box right">
                    <div class="label-text">مدرب البرنامج</div>
                    <div class="sig-line"></div>
                    <div class="name-text">أ.{{ auth()->user()->name }}</div>
                </div>

                <div class="footer-box">
                    <div class="seal-box">الختم الرسمي</div>
                </div>

                <div class="footer-box left">
                    <div class="label-text">التوقيع </div>
                    <div class="sig-line"></div>
                    <div class="name-text"></div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>