<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <style>
     @page {
        margin: 0;
        background-image: url("{{ $backgroundImage }}");
        background-image-resize: 6;
    }

        body {
            margin: 0;
            padding: 0;
            direction: rtl;
            font-family: 'sans-serif'; /* خط mPDF المدمج لدعم العربية */
            text-align: center;
            color: #1f2937;
        }

        .certificate-content {
            width: 100%;
            height: 100%;
        }

        .title {
            color: #4338ca;
            font-size: 45pt;
            padding-top: 100pt; /* نفس الإزاحة في كود المعاينة */
            font-weight: bold;
        }

        .recipient-section {
            margin: 40pt 0;
        }

        .subtitle-text {
            font-size: 22pt;
            color: #4b5563;
        }

        .student-name {
            font-size: 35pt;
            color: #b91c1c;
            font-weight: bold;
            display: block;
            margin-top: 10pt;
            text-decoration: underline;
        }

        .course-info {
            font-size: 20pt;
            line-height: 1.6;
            margin: 30pt 50pt;
        }

        .course-name {
            color: #111827;
            font-weight: bold;
            font-size: 24pt;
        }

        .meta-data {
            font-size: 13pt;
            color: #6b7280;
            margin-top: 20pt;
        }

        /* التذييل المنظم باستخدام الجداول (الأضمن في mPDF) */
        .footer-table {
            width: 90%;
            margin: 50pt auto 0;
            border-collapse: collapse;
        }

        .footer-cell {
            width: 33.3%;
            vertical-align: middle;
            text-align: center;
        }

        .signature-line {
            border-top: 1.5pt solid #374151;
            width: 140pt;
            margin: 0 auto 5pt;
        }

        .manager-title {
            font-weight: bold;
            font-size: 15pt;
        }

        .seal-area img {
            width: 90pt;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="certificate-content">
        
        <div class="title">شهادة إنجاز</div>

        <div class="recipient-section">
            <span class="subtitle-text">تمنح هذه الشهادة تقديراً للجهود المتميزة لـ :</span>
            <div class="student-name">{{ $student->name }}</div>
        </div>

        <div class="course-info">
            لاجتيازه بنجاح البرنامج التدريبي المكثف بعنوان:<br>
            <span class="course-name">" {{ $student->course ?? 'دورة تدريبية متقدمة' }} "</span><br>
            والذي عُقد بتقدير عام بلغ <strong>{{ $student->degree }}%</strong>.
        </div>

        <div class="meta-data">
            رقم الشهادة: {{ $student->id . str_pad($student->id, 5, '0', STR_PAD_LEFT) }} &nbsp; | &nbsp; 
            تاريخ الإصدار: {{ $student->course_date ? \Carbon\Carbon::parse($student->course_date)->format('Y/m/d') : date('Y/m/d') }}م
        </div>

        <table class="footer-table">
            <tr>
                <td class="footer-cell">
                    <div class="signature-area">
                        <div class="signature-line"></div>
                        <div class="manager-title">{{ auth()->user()->name ?? 'مدير الأكاديمية' }}</div>
                        <div style="font-size: 11pt;">المدير العام</div>
                    </div>
                </td>

                <td class="footer-cell">
                    <div class="seal-area">
                        @if(isset($logoDataUri))
                            {{-- في التحميل يفضل استخدام المسار المباشر أو Base64 --}}
                            <img src="{{ $logoDataUri }}">
                        @else
                            <div style="border: 2pt dashed #ccc; width: 80pt; height: 80pt; border-radius: 50%; line-height: 80pt; margin: 0 auto; color: #ccc; font-size: 10pt;">الختم الرسمي</div>
                        @endif
                    </div>
                </td>

                <td class="footer-cell">
                    <div style="font-size: 10pt; color: #6b7280;">
                        يمكن التحقق من صحة الشهادة عبر<br> مسح رمز الاستجابة السريع (QR)
                    </div>
                </td>
            </tr>
        </table>
        
    </div>

</body>
</html>
