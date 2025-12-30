<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        /* إعدادات الخلفية المستوحاة من تصميمك */
        body {
            background-color: #f0fdfa;
            background-image: linear-gradient(to top right, #5ce7f6, #ffffff);
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        /* حاوية الإيميل المركزية كأنها لوحة زجاجية */
        .email-wrapper {
            width: 100%;
            padding: 40px 0;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.7); /* خلفية شفافة */
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        /* الهيدر مع اللوجو */
        .header {
            background: rgba(255, 255, 255, 0.4);
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .header img {
            width: 120px;
        }

        /* جسم الرسالة */
        .body {
            padding: 40px 30px;
            text-align: center;
        }

        h1 {
            color: #4f46e5; /* لون البريماري من تصميمك */
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        /* الزر المنسق بنفس ستايل الموقع */
        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff !important;
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }

        /* التذييل */
        .footer {
            padding: 20px;
            font-size: 12px;
            color: #6b7280;
            text-align: center;
            background: rgba(0, 0, 0, 0.02);
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            
            <div class="header">
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('image/logono.png'))) }}" alt="logo">            </div>

            <div class="body">
                {{-- Greeting --}}
                @if (! empty($greeting))
                    <h1>{{ $greeting }}</h1>
                @else
                    <h1>@lang('مرحباً!')</h1>
                @endif

                {{-- Intro Lines --}}
                @foreach ($introLines as $line)
                    <p>{{ $line }}</p>
                @endforeach

                {{-- Action Button --}}
                @isset($actionText)
                    <a href="{{ $actionUrl }}" class="button">
                        {{ $actionText }}
                    </a>
                @endisset

                {{-- Outro Lines --}}
                @foreach ($outroLines as $line)
                    <p style="margin-top: 20px;">{{ $line }}</p>
                @endforeach

                {{-- Salutation --}}
                <div style="margin-top: 30px; font-weight: bold; color: #4f46e5;">
                    @if (! empty($salutation))
                        {{ $salutation }}
                    @else
                        @lang('تحياتنا،')<br>
                        {{ config('app.name') }}
                    @endif
                </div>
            </div>

            <div class="footer">
                @lang("إذا كنت تواجه مشكلة في الضغط على زر \":actionText\"، قم بنسخ الرابط أدناه ولصقه في متصفحك:", ['actionText' => $actionText])
                <br>
                <span style="word-break: break-all; color: #4f46e5;">{{ $actionUrl }}</span>
            </div>
        </div>
    </div>
</body>
</html>