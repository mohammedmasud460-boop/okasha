<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Student;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    // عرض معرض القوالب للطالب المختار
    public function index(Student $student) {
        return view('certificates.index', compact('student'));
    }

    // دوال المعاينة (Preview)
   public function show1(Student $student) {
    // تحديد مسار الصورة
    $path = public_path('image/qw1.jpeg');
    $base64 = '';

    // التحقق من وجود الصورة وتحويلها
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    // تمرير الطالب وصورة الخلفية للمعاينة
    return view('certificates.certificate1', [
        'student' => $student,
        'backgroundImage' => $base64
    ]);
}

    public function show2(Student $student) {
// تحديد مسار الصورة
    $path = public_path('image/qw2.jpeg');
    $base64 = '';

    // التحقق من وجود الصورة وتحويلها
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    // تمرير الطالب وصورة الخلفية للمعاينة
    return view('certificates.certificate2', [
        'student' => $student,
        'backgroundImage' => $base64
    ]);    }

    public function show3(Student $student) {
// تحديد مسار الصورة
    $path = public_path('image/qw3.jpeg');
    $base64 = '';

    // التحقق من وجود الصورة وتحويلها
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    // تمرير الطالب وصورة الخلفية للمعاينة
    return view('certificates.certificate3', [
        'student' => $student,
        'backgroundImage' => $base64
    ]);    }

    // دوال التحميل (Download) باستخدام mPDF
    // دوال التحميل أصبحت بسيطة وتمرر رقم القالب فقط
public function download1(Student $student) { return $this->generateMPDF($student, 1); }
public function download2(Student $student) { return $this->generateMPDF($student, 2); }
public function download3(Student $student) { return $this->generateMPDF($student, 3); }

// دالة توليد الـ PDF الموحدة
private function generateMPDF($student, $templateNum) {
    // 1. تحديد صورة الخلفية بناءً على رقم القالب المختار
    $templateImages = [
        1 => 'qw1.jpeg',
        2 => 'qw2.jpeg',
        3 => 'qw.png', // تأكد من مطابقة مسميات الملفات في مجلد image
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
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'margin_left' => 0, 'margin_right' => 0, 'margin_top' => 0, 'margin_bottom' => 0,
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
}
