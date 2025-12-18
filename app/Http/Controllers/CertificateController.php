<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Student;
class CertificateController extends Controller
{
    
    
// app/Http/Controllers/CertificateController.php
public function index() {
    $students = Student::where('user_id', auth()->id())->get();
    return view('certificates.index', compact('students'));
}




public function show1($id) {
    $student = Student::findOrFail($id);
    return view('certificates.certificate1', compact('student'));
}

public function show2($id) {
    $student = Student::findOrFail($id);
    return view('certificates.certificate2', compact('student'));
}

public function show3($id) {
    $student = Student::findOrFail($id);
    return view('certificates.certificate3', compact('student'));
}

public function download1($id)
{
    $student = Student::findOrFail($id);
    


  
     $pdf = Pdf::loadView('certificates.pdf.download1', compact('student'))  // القالب الثابت مع المتغيرات
              ->setPaper('a4', 'landscape'); // تحديد حجم الورق واتجاهه

    return $pdf->download('certificate.pdf');

}
public function download2($id)
{
    $student = Student::findOrFail($id);
    



     $pdf = Pdf::loadView('certificates.pdf.download2', compact('student'))  // القالب الثابت مع المتغيرات
              ->setPaper('a4', 'landscape'); // تحديد حجم الورق واتجاهه

    return $pdf->download('certificate.pdf');

}

public function download3($id)
{
    $student = Student::findOrFail($id);
    



     $pdf = Pdf::loadView('certificates.pdf.download3', compact('student'))  // القالب الثابت مع المتغيرات
              ->setPaper('a4', 'landscape'); // تحديد حجم الورق واتجاهه

    return $pdf->download('certificate.pdf');

}




}   