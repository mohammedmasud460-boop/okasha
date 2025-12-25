<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    
    <style>
        /* إعدادات الصفحة لـ mPDF */
       @page {
        margin: 0;
        background-image: url("{{ $backgroundImage }}");
        background-image-resize: 6;
    }

        body {
            margin: 0;
            padding: 0;
            direction: rtl;
            font-family: 'sans-serif';
            text-align: center;
            color: #1e1b4b; /* لون كحلي غامق رسمي */
        }

        .certificate-content {
            width: 100%;
            height: 100%;
            padding-top: 75pt; /* رفع أو خفض النص ليناسب الفراغ العلوي في التصميم */
        }

        .main-title {
            color: #1e3a8a;
            font-size: 52pt;
            font-weight: bold;
            margin-bottom: 10pt;
            letter-spacing: 1pt;
        }

        .statement {
            font-size: 18pt;
            color: #475569;
            margin-bottom: 15pt;
        }

        .student-name {
            font-size: 45pt;
            color: #0f172a;
            font-weight: bold;
            margin: 10pt auto;
            /* استبدال Underline بـ Border للحصول على تحكم أدق في المسافة */
            
            width: fit-content;
            padding: 0 50pt 8pt 50pt;
        }

        .course-description {
            font-size: 19pt;
            color: #1e293b;
            margin-top: 25pt;
            line-height: 1.4;
        }

        .course-name {
            color: #1e3a8a;
            font-weight: bold;
            font-size: 28pt;
            display: block;
            margin: 12pt 0;
        }

        .event-details {
            font-size: 17pt;
            color: #334155;
            margin-top: 10pt;
        }

        /* التذييل: تم ضبط الهوامش لضمان عدم الاصطدام بزخارف الإطار السفلي */
        .footer-table {
            width: 80%;
            margin: 55pt auto 0;
            border-collapse: collapse;
        }

        .footer-cell {
            width: 33.3%;
            vertical-align: bottom;
        }

        .label-text {
            font-size: 12pt;
            color: #64748b;
            margin-bottom: 5pt;
            font-weight: normal;
        }

        .name-text {
            font-weight: bold;
            font-size: 15pt;
            color: #0f172a;
            margin-top: 5pt;
        }

        /* خط التوقيع الوهمي */
        .sig-line {
            width: 120pt;
            border-top: 1pt solid #cbd5e1;
            margin: 5pt auto;
        }

        /* الختم الرسمي: تم تكبيره قليلاً ليتناسب مع الكتلة البصرية */
        .seal-box {
            width: 85pt;
            height: 35pt;
            border: 1.5pt double #c5a059;
            color: #c5a059;
            font-size: 10pt;
            line-height: 35pt;
            text-align: center;
            margin: 0 auto;
            font-weight: bold;
            transform: rotate(-2deg); /* ميلان خفيف ليعطي طابع الختم الحقيقي */
        }
    </style>
</head>
<body>

    <div class="certificate-content">
        
        <div class="main-title">شهادة إنجاز</div>
        <div class="statement">تتشرف المنصة بمنح هذه الشهادة لـ :</div>

        <div class="student-name">{{ $student->name }}</div>

        <div class="course-description">
            وذلك لاجتيازه بنجاح البرنامج التدريبي بعنوان:
            <span class="course-name">" {{ $student->course }} "</span>
        </div>

        <div class="event-details">
            والمنعقد في تاريخ {{ \Carbon\Carbon::parse($student->course_date)->format('d-m-Y') }}م بتقدير {{ $student->degree }}%
        </div>

        <table class="footer-table">
            <tr>
                <td class="footer-cell" style="text-align: right;">
                    <div class="label-text">اعتماد الإدارة</div>
                    <div class="sig-line" style="margin-right: 0;"></div>
                    <div class="name-text" style="color: #64748b; font-size: 10pt;">مصادقة رقمية</div>
                </td>

                <td class="footer-cell" style="text-align: center;">
                    <div class="seal-box">الختم الرسمي</div>
                </td>

                <td class="footer-cell" style="text-align: left;">
                    <div class="label-text">مدرب البرنامج</div>
                    <div class="sig-line" style="margin-left: 0;"></div>
                    <div class="name-text">أ. {{ auth()->user()->name }}</div>
                </td>
            </tr>
        </table>

    </div>

</body>
</html>