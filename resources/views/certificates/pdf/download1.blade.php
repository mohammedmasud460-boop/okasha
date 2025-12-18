
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>شهادة إنجاز - {{ $student->name }}</title>
    <style>
@page { margin: 40px; }

/* الخط والعرض العام */
body {
    font-family: "DejaVu Sans", sans-serif;
    direction: rtl;
    text-align: center;
    color: #222;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef); /* خلفية ناعمة */
    padding: 20px;
}

/* إطار الشهادة */
.frame {
    border: 10px solid #2c3e50;
    border-radius: 12px;
    padding: 30px;
    position: relative;
    background: #ff0202ff;
    box-shadow: 0 0 20px rgba(0,0,0,0.15); /* ظل أنيق */
}
.inner {
    border: 3px dashed #2c3e50;
    border-radius: 8px;
    padding: 40px 60px;
    background: #00d5ffff;
}

/* العناوين */
h1.title {
    font-size: 40px;
    margin: 0 0 15px;
    color: #2c3e50;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.subtitle {
    font-size: 20px;
    color: #6c757d;
    margin-bottom: 25px;
    font-style: italic;
}
.recipient {
    font-size: 32px;
    font-weight: bold;
    margin: 20px 0;
    color: #007bff;
}
.course {
    font-size: 22px;
    margin: 10px 0 20px;
    color: #343a40;
}
.meta {
    font-size: 16px;
    color: #555;
    margin-top: 14px;
}

/* تذييل الشهادة */
.footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 35px;
    font-size: 14px;
}
.sign {
    text-align: center;
    font-weight: bold;
    color: #2c3e50;
}

/* ختم دائري بدون صورة */
.seal {
    width: 120px;
    height: 120px;
    border: 4px dashed #007bff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    color: #007bff;
    background: #f8f9fa;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
}

/* مربع QR تجريبي */
.qr {
    width: 120px;
    height: 120px;
    border: 3px solid #2c3e50;
    display: inline-block;
    position: relative;
    background: repeating-linear-gradient(45deg, #2c3e50, #2c3e50 10px, #fff 10px, #fff 20px);
}

/* أزرار العرض */
.actions {
    margin: 24px 0;
    text-align: center;
}
.btn {
    display:inline-block;
    padding:10px 16px;
    border-radius: border-radius:8px;
    text-decoration:none;
    font-weight: bold;
}
.btn-primary {
    background:#2c3e50;
    color:#fff;
}
.btn-secondary {
    background:#6c757d;
    color:#fff;
}
    </style>
</head>
<body>

    <!-- أزرار العرض (ستُخفى عادة عند التوليد) -->

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
