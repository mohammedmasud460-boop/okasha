
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>شهادة إنجاز - {{  $student->name }}</title>
    <style>
        
        @page { margin: 40px; }
        body { font-family: "DejaVu Sans", sans-serif; direction: rtl; text-align: center; color: #222; background: #0fe204ff; }
        .frame { border: 12px solid #2c3e50; padding: 30px; position: relative; background: #fff; }
        .inner { border: 3px solid #2c3e50; padding: 40px 60px; }
        h1.title { font-size: 36px; margin: 0 0 10px; letter-spacing: 1px; color: #2c3e50; }
        .subtitle { font-size: 18px; color: #6c757d; margin-bottom: 25px; }
        .recipient { font-size: 28px; font-weight: bold; margin: 20px 0; }
        .course { font-size: 20px; margin: 6px 0 20px; }
        .meta { font-size: 14px; color: #555; margin-top: 14px; }
        .footer { display: flex; justify-content: space-between; align-items: center; margin-top: 35px; font-size: 14px; }
        .sign { text-align: center; }
        .seal { width: 110px; height: 110px; border: 3px dashed #2c3e50; border-radius: 50%;
                display: inline-flex; align-items: center; justify-content: center; font-size: 14px; }
        .qr { width: 110px; height: 110px; border: 2px solid #2c3e50; display: inline-block; position: relative; }
        .qr::before, .qr::after { content: "vsvs"; position: absolute; background: #2c3e50; }
        .qr::before { width: 24px; height: 24px; top: 8px; right: 8px; }
        .qr::after  { width: 18px; height: 18px; bottom: 10px; left: 10px; }
        .actions { margin: 24px 0 0; text-align: center; }
        .btn { display:inline-block; padding:10px 16px; border-radius:8px; text-decoration:none; }
        .btn-primary { background:#2c3e50; color:#fff; }
        .btn-secondary { background:#6c757d; color:#fff; }
       .sign::after { text-align: center; margin-bottom: 30px; }
  


    </style>
</head>
<body>

<div class="actions">
    <a href="{{ route('pdf.download2', ['student' => $student]) }}" class="btn btn-primary">💾 حفظ الشهادة PDF</a>
           <a href="{{ route('dashboard') }}" class="btn btn-outline">رجوع</a>
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
            Certificate No:  &nbsp;|&nbsp;
            Issue Date: {{ \Illuminate\Support\Str::of($student->course_date)->isNotEmpty() ? \Carbon\Carbon::parse($student->course_date)->format('Y-m-d') : '—' }}
        </div>

        <div class="footer">
            <div class="sign">
                <div class="oo"><strong>{{ auth()->user()->name ?? 'Tech Academy' }}</strong></div>
                <div class="oo">General Manager</div>
            </div>

            <div class="seal"><img class="seal" src=" {{ asset('image/logono.png') }}" ></div>

           
        </div>
    </div>
</div>

</body>
