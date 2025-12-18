
<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController; // إن كان كنترولر الطلاب خاص بالـ API

// Auth (تسجيل وإنشاء توكين)
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// مسارات محمية بالتوكين
Route::middleware('auth:sanctum')->group(function () {

    // يرجّع المستخدم الحالي
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // CRUD للطلاب (أو beneficiaries/recipients حسب مسمّاك)
    // Route::get('/students',           [StudentController::class, 'index'])->name('students.index');
    // Route::post('/students',          [StudentController::class, 'store'])->name('students.store');
    // Route::get('/students/{id}',      [StudentController::class, 'show'])->name('students.show');
    // Route::patch('/students/{id}',    [StudentController::class, 'update'])->name('students.update');
    // Route::delete('/students/{id}',   [StudentController::class, 'destroy'])->name('students.destroy');

    // خروج (حذف التوكين الحالي)
    Route::post('/logout', [AuthController::class, 'logout']);
});
