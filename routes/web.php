<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('home');
});



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


Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');



Route::get('certificates/certificate1/{student}', [CertificateController::class, 'show1'])->name('certificate.show1');
Route::get('certificates/certificate1/download/{student}', [CertificateController::class, 'download1'])->name('pdf.download1');

Route::get('certificates/certificate2/{student}', [CertificateController::class, 'show2'])->name('certificate.show2');
Route::get('certificates/certificate2/download/{student}', [CertificateController::class, 'download2'])->name('pdf.download2');

Route::get('certificates/certificate3/{student}', [CertificateController::class, 'show3'])->name('certificate.show3');
Route::get('certificates/certificate3/download/{student}', [CertificateController::class, 'download3'])->name('pdf.download3');

Route::get('home',[CertificateController::class,'download1'])->name('home');

use App\Http\Controllers\YourController;

Route::get('/certificate/image', [CertificateController::class, 'imge'])
    ->name('certificate.image');

require __DIR__.'/auth.php';
