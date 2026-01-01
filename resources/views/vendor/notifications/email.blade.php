<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* إعدادات البريد العامة لضمان التوافق */
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            background-color: #f0fdfa;
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        .email-wrapper {
            width: 100%;
            background-color: #f0fdfa;
            background-image: linear-gradient(to top right, #5ce7f6, #ffffff);
            padding: 40px 0;
            direction: rtl;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.85); /* زيادة كثافة اللون لضمان وضوح القراءة */
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
        }

        .header {
            padding: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .header img {
            max-width: 150px;
            height: auto;
        }

        .body {
            padding: 40px 35px;
            text-align: center;
        }

      h1 {
    color: #18181b;
    font-size: 18px;
    font-weight: bold;
    margin-top: 0;
    /* التعديل هنا لضمان التوسيط */
    text-align: center !important; 
}

    p {
    font-size: 16px;
    line-height: 1.5em;
    margin-top: 0;
    /* التعديل هنا لتوسيط الفقرات */
    text-align: center !important;
}

/* لضمان توسيط القوائم إذا وجدت */
ul, ol, blockquote {
    text-align: center;
}
        .button-container {
            margin: 35px 0;
        }

        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff !important;
            padding: 14px 40px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
        }

        .salutation {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 16px;
            color: #4f46e5;
            font-weight: bold;
        }

        .footer {
            padding: 25px;
            font-size: 13px;
            color: #6b7280;
            text-align: center;
            background: rgba(0, 0, 0, 0.03);
            line-height: 1.5;
        }

        .raw-link {
            display: block;
            margin-top: 15px;
            word-break: break-all;
            color: #4f46e5;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            
            <div class="header">
                {{-- استخدام $message->embed لضمان ظهور الصورة --}}
                <img src="{{ $message->embed(public_path('image/logono.png')) }}" alt="شعار المنصة">
            </div>

            <div class="body">
                {{-- التحية --}}
                <h1>{{ $greeting ?? 'مرحباً بك!' }}</h1>

                {{-- رسائل المقدمة --}}
                @foreach ($introLines as $line)
                    <p>{{ $line }}</p>
                @endforeach

                {{-- زر الإجراء --}}
                @isset($actionText)
                    <div class="button-container">
                        <a href="{{ $actionUrl }}" class="button">
                            {{ $actionText }}
                        </a>
                    </div>
                @endisset

                {{-- رسائل الخاتمة --}}
                @foreach ($outroLines as $line)
                    <p>{{ $line }}</p>
                @endforeach

                {{-- التوقيع --}}
                <div class="salutation">
                    @if (! empty($salutation))
                        {{ $salutation }}
                    @else
                        تحياتنا،<br>
                        فريق {{ config('app.name') }}
                    @endif
                </div>
            </div>

            <div class="footer">
                إذا كنت تواجه مشكلة في الضغط على زر "{{ $actionText ?? 'الإجراء' }}"، قم بنسخ الرابط أدناه ولصقه في متصفحك:
                <a href="{{ $actionUrl ?? '#' }}" class="raw-link">{{ $actionUrl ?? '' }}</a>
            </div>
        </div>
    </div>
</body>
</html>