<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <style>
        /* إعدادات الصفحة لـ mPDF لضمان خلفية كاملة وبدون هوامش بيضاء */
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


        /* الحاوية الرئيسية بأبعاد A4 landscape */
        .certificate-paper {
            
            width: 297mm;
            height: 210mm;
            position: relative;
        }

        .main-title {
            color: #1e3a8a;
            font-size: 48pt;
            font-weight: bold;
            padding-top: 60pt; /* تعديل الإزاحة لتناسب تصميم الخلفية */
            margin-bottom: 10pt;
            margin-top: 20px;
        }

        .statement {
            font-size: 18pt;
            color: #475569;
            margin: 15pt 0;
        }

        .student-name {
            font-size: 40pt;
            color: #111827;
            font-weight: bold;
            margin: 10pt auto 20pt;
            /* استخدام border بدلاً من text-decoration للتحكم في شكل الخط الذهبي */
         
            width: fit-content;
            padding-bottom: 5pt;
        }

        .course-text {
            font-size: 19pt;
            line-height: 1.6;
            color: #1e293b;
            margin: 0 60pt 30pt;
        }

        .course-name {
            color: #1e3a8a;
            font-weight: bold;
            font-size: 24pt;
        }

        /* استخدام الجداول هو الحل الوحيد المضمون في mPDF لتوزيع العناصر جانبيًا */
        .footer-table {
            width: 85%;
            margin: 40pt auto 0;
            border-collapse: collapse;
        }

        .footer-cell {
            width: 33.3%;
            vertical-align: bottom;
            text-align: center;
        }

        .footer-cell.right { text-align: right; }
        .footer-cell.left { text-align: left; }

        .sig-line {
            border-top: 1.5pt solid #1e293b;
            width: 160pt;
            margin-bottom: 8pt;
        }

        /* ضبط محاذاة الخطوط داخل خلايا الجدول */
        .footer-cell.left .sig-line { margin-left: 0; margin-right: auto; }
        .footer-cell.right .sig-line { margin-right: 0; margin-left: auto; }

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

        /* الختم الرسمي */
        .seal-box {
            width: 85pt;
            height: 85pt;
            border: 2pt double #c5a059;
            border-radius: 50%;
            line-height: 85pt;
            text-align: center;
            color: #c5a059;
            font-size: 11pt;
            font-weight: bold;
            margin: 0 auto;
            /* تأثير دوران بسيط كما في الكود السابق */
            transform: rotate(-15deg);
        }
    </style>
</head>
<body>
    <div class="certificate-paper">
        
        <div class="main-title">شهادة إنجاز</div>
        
        <div class="statement">تتشرف المنصة بمنح هذه الشهادة لـ :</div>

        <div class="student-name">{{ $student->name }}</div>

        <div class="course-text">
            وذلك لاجتيازه بنجاح البرنامج التدريبي بعنوان:
            <span class="course-name">" {{ $student->course }} "</span><br>
            والمنعقد في تاريخ {{ $student->course_date }}م بتقدير {{ $student->degree }}%
        </div>

        <table class="footer-table">
            <tr>
                <td class="footer-cell right">
                    <div class="label-text">مدرب البرنامج</div>
                    <div class="sig-line"></div>
                    <div class="name-text">أ. {{ auth()->user()->name }}</div>
                </td>

                <td class="footer-cell">
                    <div class="seal-box">الختم الرسمي</div>
                </td>

                <td class="footer-cell left">
                    <div class="label-text">اعتماد الإدارة</div>
                    <div class="sig-line"></div>
                    <div class="name-text">مصادقة رقمية</div>
                </td>
            </tr>
        </table>

    </div>
</body>
</html>