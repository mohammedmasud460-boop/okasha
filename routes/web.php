<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;
// عرض الصفحات 
Route::get('/', function () {
    return view('welcome1');
})->name('welcome1');
Route::get('/services',function (){
return view('services');
})->name('services');
Route::get('/about',function (){
return view('about');
})->name('about');
Route::get('/conecte',function (){
return view('conecte');
})->name('conecte');

// مسار عرض لوحة التحكم الرئيسية
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// السارات التي تعرض الطلاب للوجهات لوحت التحكم للجهات 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
});


// بيانات الاعدادات و المسارات الشخصية

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});












// مسارات الطلاب تحتاج الى تتعديل 


// Route::get('/dashboard', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/students', [StudentController::class, 'create'])->name('students.create');
 Route::post('/students', [StudentController::class, 'store'])->name('students.store');
 Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
 Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
 Route::delete('/dashboard/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // معرض القوالب للطالب المختار
    Route::get('/certificates/gallery/{student}', [CertificateController::class, 'index'])->name('certificates.index');

    // عرض القوالب (المعاينة)
    Route::get('/certificates/show1/{student}', [CertificateController::class, 'show1'])->name('certificate.show1');
    Route::get('/certificates/show2/{student}', [CertificateController::class, 'show2'])->name('certificate.show2');
    Route::get('/certificates/show3/{student}', [CertificateController::class, 'show3'])->name('certificate.show3');
    Route::get('/certificates/show4/{student}', [CertificateController::class, 'show4'])->name('certificate.show4');
    Route::get('/certificates/show5/{student}', [CertificateController::class, 'show5'])->name('certificate.show5');
    Route::get('/certificates/show6/{student}', [CertificateController::class, 'show6'])->name('certificate.show6');
    Route::get('/certificates/show7/{student}', [CertificateController::class, 'show7'])->name('certificate.show7');
    Route::get('/certificates/show8/{student}', [CertificateController::class, 'show8'])->name('certificate.show8');
    Route::get('/certificates/show9/{student}', [CertificateController::class, 'show9'])->name('certificate.show9');

    // تحميل الـ PDF (باستخدام mPDF لجميع القوالب لضمان الجودة)
    Route::get('/certificates/download1/{student}', [CertificateController::class, 'download1'])->name('pdf.download1');
    Route::get('/certificates/download2/{student}', [CertificateController::class, 'download2'])->name('pdf.download2');
    Route::get('/certificates/download3/{student}', [CertificateController::class, 'download3'])->name('pdf.download3');
    Route::get('/certificates/download4/{student}', [CertificateController::class, 'download4'])->name('pdf.download4');
    Route::get('/certificates/download5/{student}', [CertificateController::class, 'download5'])->name('pdf.download5');
    Route::get('/certificates/download6/{student}', [CertificateController::class, 'download6'])->name('pdf.download6');
    Route::get('/certificates/download7/{student}', [CertificateController::class, 'download7'])->name('pdf.download7');
    Route::get('/certificates/download8/{student}', [CertificateController::class, 'download8'])->name('pdf.download8');
    Route::get('/certificates/download9/{student}', [CertificateController::class, 'download9'])->name('pdf.download9');
});


require __DIR__.'/auth.php';