<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * قائمة جميع الطلاب.
     */
  


public function index(): View
{
    $students = Student::where('user_id', auth()->id())->get();

    // بما أن الخطأ في dashboard1.blade.php، مرّر البيانات لهذه الصفحة:
    return view('dashboard', ['students' => $students]);

    // إن أردت صفحة أخرى:
    // return view('students.index', compact('students'));
}

    /**
     * عرض نموذج إضافة طالب.
     */
    public function create(): View
    {
        return view('Student.create');
    }

    /**
     * حفظ طالب جديد.
     */public function store(Request $request)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|string|email|max:255|unique:students,email',
        'course'      => 'required|string|max:255',
        'course_date' => 'required|date',
        'degree'      => 'required|string|min:0|max:100',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // معالجة رفع الصورة بشكل منفصل للتأكد من المسار
    $imagePath = null;
    if ($request->hasFile('image')) {
        // سيتم تخزينها في storage/app/public/student_images
        $imagePath = $request->file('image')->store('student_images', 'public');
    }

    $student = Student::create([
        'user_id'     => auth()->id(),
        'name'        => $validated['name'],
        'email'       => $validated['email'],
        'course'      => $validated['course'],
        'course_date' => $validated['course_date'],
        'degree'      => $validated['degree'],
        'image'       => $imagePath, // حفظ المسار الناتج
    ]);

    return redirect()
        ->route('students.create')
        ->with('success', 'تمت إضافة المستفيد بنجاح: ' . $student->name);
}

    /**
     * عرض نموذج تعديل طالب.
     */
    // public function edit($id): View
    // {
    //     $students = Student::findOrFail($id);
    //     return view('students.view', compact('students'));
    // }

    /**
     * تحديث بيانات الطالب.
     */
    

public function edit($id) {
    $student = Student::findOrFail($id);
    return view('Student.edit', compact('student'));
}



public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name'        => 'sometimes|required|string|max:255',
        'email'       => 'sometimes|required|string|email|max:255|unique:students,email,' . $id,
        'course'      => 'sometimes|required|string|max:255',
        'course_date' => 'sometimes|date',
        'degree'      => 'sometimes|string|min:0|max:100',
    ]);

    $student->update($validated);

    return redirect()
        ->route('dashboard') // أو ارجع لنفس صفحة التعديل إن رغبت: ->route('students.edit', $student->id)
        ->with('success', 'تم تحديث بيانات المستفيد بنجاح.');
}

    /**
     * حذف الطالب.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'تم حذف المستفيد بنجاح.');
    }
}
