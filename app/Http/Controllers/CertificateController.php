<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CertificateController extends Controller
{
    // عرض معرض القوالب للطالب المختار
    public function index(Student $student) {
        return Inertia::render('Certificates/Index', compact('student'));
    }

    // دوال المعاينة — تستدعي مساعداً موحداً
    public function show1(Student $student) { return $this->renderPreview($student, 1); }
    public function show2(Student $student) { return $this->renderPreview($student, 2); }
    public function show3(Student $student) { return $this->renderPreview($student, 3); }
    public function show4(Student $student) { return $this->renderPreview($student, 4); }
    public function show5(Student $student) { return $this->renderPreview($student, 5); }
    public function show6(Student $student) { return $this->renderPreview($student, 6); }
    public function show7(Student $student) { return $this->renderPreview($student, 7); }
    public function show8(Student $student) { return $this->renderPreview($student, 8); }
    public function show9(Student $student) { return $this->renderPreview($student, 9); }

    private function renderPreview(Student $student, int $num) {
        $path = public_path("image/qw{$num}.jpeg");
        $base64 = '';
        if (file_exists($path)) {
            $ext  = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = "data:image/{$ext};base64," . base64_encode($data);
        }
        return Inertia::render('Certificates/Preview', [
            'student'         => $student,
            'templateNum'     => $num,
            'backgroundImage' => $base64,
        ]);
    }

    // دوال التحميل (Download) باستخدام mPDF
    // دوال التحميل أصبحت بسيطة وتمرر رقم القالب فقط
public function download1(Student $student) { return $this->generateMPDF($student, 1); }
public function download2(Student $student) { return $this->generateMPDF($student, 2); }
public function download3(Student $student) { return $this->generateMPDF($student, 3); }
public function download4(Student $student) { return $this->generateMPDF($student, 4); }
public function download5(Student $student) { return $this->generateMPDF($student, 5); }
public function download6(Student $student) { return $this->generateMPDF($student, 6); }
public function download7(Student $student) { return $this->generateMPDF($student, 7); }
public function download8(Student $student) { return $this->generateMPDF($student, 8); }
public function download9(Student $student) { return $this->generateMPDF($student, 9); }

// دالة توليد الـ PDF الموحدة
private function generateMPDF($student, $templateNum) {
    // 1. تحديد صورة الخلفية بناءً على رقم القالب المختار
    $templateImages = [
        1 => 'qw1.jpeg',
        2 => 'qw2.jpeg',
        3 => 'qw3.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
        4 => 'qw4.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
        5 => 'qw5.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
        6 => 'qw6.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
        7 => 'qw7.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
        8 => 'qw8.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
        9 => 'qw9.jpeg', // تأكد من مطابقة مسميات الملفات في مجلد image
    ];

    $imageName = $templateImages[$templateNum] ?? 'qw1.jpeg';
    $imagePath = public_path('image/' . $imageName);

    // 2. تحويل الصورة إلى Base64 لمنع mPDF من محاولة إنشاء ملفات مؤقتة للصور
    $base64Image = '';
    if (file_exists($imagePath)) {
        $imgData = file_get_contents($imagePath);
        $base64Image = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode($imgData);
    }

    // 3. إعدادات mPDF مع استخدام مجلد النظام المؤقت العام لتجنب Permission Denied
    $mpdf = new Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
    'margin_left' => 0,   // هام جداً: تصفير الهوامش
        'margin_right' => 0,
        'margin_top' => 0,
        'margin_bottom' => 0,
        'margin_header' => 0,
        'margin_footer' => 0,
        'tempDir' => sys_get_temp_dir(), // يستخدم مجلد /tmp الخاص بالسيرفر المسموح به دائماً
    ]);

    $mpdf->SetDirectionality('rtl');
    
    // 4. استدعاء ملف الـ Blade المقابل (download1, download2, download3)
    $viewPath = 'certificates.pdf.download' . $templateNum;

    // نمرر الصورة كـ Base64 للـ View
    $html = view($viewPath, [
        'student' => $student,
        'backgroundImage' => $base64Image
    ])->render();

    $mpdf->WriteHTML($html);

    // 5. الإخراج المباشر للمتصفح دون حفظ ملفات على القرص
    return $mpdf->Output("certificate_{$student->name}.pdf", 'I');
}

    public function sendEmail(Student $student, $templateNum) 
{
    try {
        // 1. التاكد من وجود القالب
        $imageName = 'qw' . $templateNum . '.jpeg';
        $imagePath = public_path('image/' . $imageName);
        
        if (!file_exists($imagePath)) {
            return back()->with('error', '❌ فشل الإرسال: صورة قالب الشهادة غير موجودة على السيرفر.');
        }

        $imgData = file_get_contents($imagePath);
        $base64Image = 'data:image/jpeg;base64,' . base64_encode($imgData);

        // 2. إرسال الإيميل
        // ملاحظة: تأكد أن ملف App\Mail\SendMail مهيأ لاستقبال هذه المتغيرات
        \Mail::to($student->email)->send(new \App\Mail\SendMail($student, $templateNum, $base64Image));

        return back()->with('success', '✅ تم إرسال الشهادة إلى البريد (' . $student->email . ') بنجاح!');
        
    } catch (\Exception $e) {
        // عرض رسالة الخطأ إذا كانت إعدادات الـ .env غير صحيحة
        return back()->with('error', '⚠️ لم يتم الإرسال: تأكد من إعدادات SMTP أو اتصال السيرفر. الخطأ: ' . $e->getMessage());
    }
}
}
