<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شهادة إنجاز - {{ $student->name }}</title>
    <style>
        /* إعدادات الطباعة mPDF */
        @page {
            margin: 0;
            size: A4 landscape;
        }

        body {
            margin: 0;
            padding: 0;
            direction: rtl;
            font-family: 'sans-serif';
            background-color: #f3f4f6; /* لون خلفية الصفحة خارج الشهادة */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* حاوية الشهادة كأنها ورقة مستقلة */
        .certificate-paper {
            width: 297mm; /* عرض A4 landscape */
            height: 210mm; /* طول A4 landscape */
            background-image: url("{{ $backgroundImage ?? '' }}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); /* ظل للمعاينة فقط */
            position: relative;
            margin: 20px 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* المحتوى داخل الشهادة */
        .certificate-content {
            width: 85%;
            height: 80%;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .title {
            color: #4338ca;
            font-size: 45pt;
            font-weight: bold;
            margin-top: 40pt;
        }

        .recipient-section {
            margin: 25pt 0;
        }

        .subtitle-text {
            font-size: 20pt;
            color: #4b5563;
        }

        .student-name {
            font-size: 38pt;
            color: #b91c1c;
            font-weight: bold;
            display: block;
            margin-top: 10pt;
            border-bottom: 2pt solid #b91c1c;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .course-info {
            font-size: 20pt;
            line-height: 1.6;
            margin: 20pt auto;
            color: #1f2937;
        }

        .course-name {
            font-weight: bold;
            font-size: 24pt;
        }

        .meta-data {
            font-size: 12pt;
            color: #6b7280;
            margin-top: 15pt;
        }

        .footer-table {
            width: 100%;
            margin-top: 30pt;
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
            font-size: 14pt;
        }

        /* أزرار التحكم */
        .actions {
            width: 100%;
            padding: 15px 0;
            background: #ffffff;
            display: flex;
            justify-content: center;
            gap: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-primary { background: #4338ca; color: white; }
        .btn-secondary { background: #6b7280; color: white; }

        /* تعديلات الطباعة mPDF */
        @media print {
            body { background-color: white; }
            .actions { display: none; }
            .certificate-paper {
                margin: 0;
                box-shadow: none;
                width: 100%;
                height: 100%;
                background-image: url("{{ public_path('image/qw1.jpeg') }}") !important;
            }
        }

        /* للجوال */
        @media screen and (max-width: 297mm) {
            .certificate-paper {
                width: 95vw;
                height: 67vw; /* يحافظ على النسبة المئوية للـ A4 */
                background-size: cover;
            }
            .title { font-size: 25pt; }
            .student-name { font-size: 22pt; }
            .course-info { font-size: 12pt; }
        }
    </style>
</head>
<body>

    <div class="actions">
        <a href="{{ route('pdf.download2', $student->id) }}" class="btn btn-primary">💾 تحميل PDF</a>
        <a href="{{ route('certificates.index', $student->id) }}" class="btn btn-secondary">↩ رجوع</a>
    </div>

    <div class="certificate-paper">
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
                                <img src="{{ $logoDataUri }}" style="width: 80pt;">
                            @else
                                <div style="border: 1.5pt dashed #ccc; width: 60pt; height: 60pt; border-radius: 50%; line-height: 60pt; margin: 0 auto; color: #ccc; font-size: 9pt;">الختم الرسمي</div>
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
    </div>

</body>
</html>