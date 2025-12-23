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
    public function download1(Student $student) {
        return $this->generateMPDF($student, 'certificates.pdf.download1');
    }

    public function download2(Student $student) {
        return $this->generateMPDF($student, 'certificates.pdf.download2');
    }

    public function download3(Student $student) {
        return $this->generateMPDF($student, 'certificates.pdf.download3');
    }

    // دالة خاصة لإنشاء الـ PDF لتجنب تكرار الكود
    private function generateMPDF($student, $viewPath) {
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'margin_left' => 0, 'margin_right' => 0, 'margin_top' => 0, 'margin_bottom' => 0,
        ]);
        $mpdf->SetDirectionality('rtl');
        $mpdf->SetDefaultBodyCSS('background-image-resize', '6');
        
        $html = view($viewPath, compact('student'))->render();
        $mpdf->WriteHTML($html);
        return $mpdf->Output("certificate_{$student->name}.pdf", 'I');
    }
}