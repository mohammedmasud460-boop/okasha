<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f8fafc;
            padding-bottom: 40px;
        }
        .main-card {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .header {
            background-color: #1e1b4b; /* الكحلي الرسمي */
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
        }
        h1 {
            color: #1e1b4b;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #475569;
            font-size: 16px;
            line-height: 1.6;
        }
        .highlight {
            color: #4f46e5; /* الأزرق الاحترافي */
            font-weight: bold;
        }
        .footer {
            padding: 20px;
            background-color: #f1f5f9;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <div class="header">
                {{-- تضمين اللوجو باستخدام Base64 لضمان الظهور --}}
            </div>
            
            <div class="content">
                <h1>تهانينا يا <span class="highlight">{{ $student->name }}</span>!</h1>
                <p>يسعدنا في <strong>منصة شهادتي</strong> أن نرسل لك شهادة الإنجاز الخاصة بك.</p>
                <p>لقد أتممت متطلباتك بنجاح، وتجد مرفقاً مع هذا البريد نسخة <strong>PDF</strong> من الشهادة جاهزة للتحميل والطباعة.</p>
                <p>نتمنى لك مزيداً من التوفيق والنجاح في مسيرتك العلمية والعملية.</p>
            </div>

            <div class="footer">
                © {{ date('Y') }} منصة شهادتي. جميع الحقوق محفوظة. <br>
                هذا البريد مرسل آلياً، يرجى عدم الرد.
            </div>
        </div>
    </div>
</body>
</html>