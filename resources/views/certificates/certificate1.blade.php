
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>شهادة إنجاز - {{ $student->name }}</title>
    <style>
        /* هوامش الصفحة */
        @page { margin: 40px; }

        /* الخط والعرض العام */
        body {
            font-family: "DejaVu Sans", sans-serif;
            direction: rtl;
            text-align: center;
            color: #222;
            /* إن رغبت بلون خلفية قوي، استخدم صيغة سليمة: */
            background-color: #ff0e0e; /* بدلاً من #ff0e0eff */
        }

        /* إطار الشهادة */
        .frame {
            border: 12px solid #000000ff;
            padding: 30px;
            position: relative;
            background: #fff;
                 background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
            
        }
        .inner {
            border: 3px solid #e8f404ff;
            padding: 40px 60px;
            
        }

        /* العناوين */
        h1.title { font-size: 36px; margin: 0 0 10px; letter-spacing: 1px; color: #2c3e50; }
        .subtitle { font-size: 18px; color: #6c757d; margin-bottom: 25px; }
        .recipient { font-size: 28px; font-weight: bold; margin: 20px 0; }
        .course { font-size: 20px; margin: 6px 0 20px; }
        .meta { font-size: 14px; color: #555; margin-top: 14px; }

        /* تذييل الشهادة */
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 35px;
            font-size: 14px;
        }
        .sign { text-align: center; }
        .sign::after { /* لو أردت لاحقاً محتوى زخرفي */
            /* content: ""; */
            /* text-align: center; margin-bottom: 30px; */
        }

        /* صندوق الإطار/الشعار بنمط الكود المأخوذ من الصورتين */
  
        /* حاوية الختم (حدود دائرية متقطعة) */
        .seal {
            width: 110px;
            height: 110px;
            border: 3px dashed #2c3e50;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            background: #fff; /* خلفية بيضاء داخل إطار الختم */
        }
        /* صورة الشعار داخل الختم/الكارد */
        .logo { width: 100px; height: auto; display: block; }

        /* مربع QR تجريبي */
        .qr {
            width: 110px;
            height: 110px;
            border: 2px solid #2c3e50;
            display: inline-block;
             position: relative;
        }
        .qr::before, .qr::after {
            content: "";
            position: absolute;
            background: #2c3e50;
        }
        .qr::before { width: 24px; height: 24px; top: 8px; right: 8px; }
        .qr::after  { width: 18px; height: 18px; bottom: 10px; left: 10px; }

        /* أزرار الواجهة (للعرض في المتصفح فقط) */
        .actions { margin: 24px 0 0; text-align: center; }
        .btn { display:inline-block; padding:10px 16px; border-radius:8px; text-decoration:none; }
        .btn-primary { background:#2c3e50; color:#fff; }
        .btn-secondary { background:#6c757d; color:#fff; }

        /* وضع PDF: تعطيل الحركة لأن الـPDF لا يدعم الأنيميشن */
        @media print {
            .card::before {
                animation: none;
                transform: rotate(25deg); /* لقطة ثابتة شكلية */
            }
        }

        /* بدلاً من @media، يمكنك تمرير متغير Blade للتحكم اليدوي */
        @if(!empty($pdfMode))
        .card::before {
            animation: none;
            transform: rotate(25deg);
        }
        @endif
    </style>
</head>
<body>

    <!-- أزرار العرض (ستُخفى عادة عند التوليد) -->
    <div class="actions">
        <a href="{{ route('pdf.download1', $student) }}" class="btn btn-primary">💾 حفظ الشهادة PDF</a>
        <a href="{{ route('certificates.index') }}" class="btn btn-secondary">رجوع</a>
    </div>

    <div class="frame">
        <div class="inner">
            <h1 class="title">Certificate of Achievement</h1>
            <div class="subtitle">This certificate is awarded to</div>

            <div class="recipient">{{ $student->name }}</div>

            <div class="course">
                For successfully completing the program <strong>{{ $student->course ?? '—' }}</strong>
            </div>

            <div class="meta">
                Certificate No: {{ $student->counter ?? '—' }} &nbsp;|&nbsp;
                Issue Date:
                {{ \Illuminate\Support\Str::of($student->course_date)->isNotEmpty()
                    ? \Carbon\Carbon::parse($student->course_date)->format('Y-m-d')
                    : '—' }}
            </div>

            <div class="footer">
                <!-- التوقيع -->
                <div class="sign">
                    <div class="oo"><strong>{{ auth()->user()->name ?? 'Tech Academy' }}</strong></div>
                    <div class="oo">General Manager</div>
                </div>

                <!-- دمج الكود المأخوذ من الصورتين: نعرض الشعار داخل .card -->
                <div class="card">
                    <!-- الختم داخل الكارد -->
                    <div class="seal">
                        @isset($logoDataUri)
                            {{ $logoDataUri }}
                        @else
                            <!--Fallback عند غياب الشعار-->
                            <span>Official Seal</span>
                        @endisset
                    </div>
                </div>

                <!-- مربع QR تجريبي -->
                <div class="qr"></div>
            </div>
        </div>
    </div>

</body>
