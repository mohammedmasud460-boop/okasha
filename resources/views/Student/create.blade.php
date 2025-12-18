
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>إضافة طالب جديد</title>
  <style>
    body{font-family:"Tahoma","Segoe UI",system-ui,Arial,sans-serif; background:#f7f7fb; color:#1f2937; margin:0; padding:20px;}
    .container{max-width:720px; margin:0 auto; background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:16px; box-shadow:0 6px 18px rgba(0,0,0,.06);}
    .field{margin-bottom:12px;}
    label{display:block; margin-bottom:6px; font-size:14px; color:#374151;}
    input{width:100%; padding:10px 12px; border:1px solid #e5e7eb; border-radius:8px; font-size:14px;}
    .actions{display:flex; gap:8px; flex-wrap:wrap; margin-top:12px;}
    .btn{padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb; background:#fff; cursor:pointer;}
    .btn-primary{background:#4f46e5; color:#fff; border-color:#4f46e5;}
    .btn-outline{background:#fff;}
    .error{color:#dc2626; font-size:12px; margin-top:6px;}
    .alert-success{background:#ecfdf5; color:#065f46; border:1px solid #d1fae5; padding:10px 12px; border-radius:10px; margin-bottom:12px;}
    .alert-danger{background:#fef2f2; color:#991b1b; border:1px solid #fecaca; padding:10px 12px; border-radius:10px; margin-bottom:12px;}
  </style>
</head>
<body>
  <div class="container">
    <h2 style="margin:0 0 12px;">إضافة طالب جديد</h2>

    @if($errors->any())
      <div class="alert-danger">
        <strong>تحقق من الحقول التالية:</strong>
        @foreach($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    @if(session('success'))
      <div class="alert-success">{{ session('success') }}</div>
    @endif

    <!-- تصحيح: يجب أن يكون action إلى route('students.store') -->
    <form method="POST" action="{{ route('students.store') }}">
      @csrf

      <div class="field">
        <label>الاسم</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label>الدورة</label>
        <input type="text" name="course" value="{{ old('course') }}" required>
        @error('course') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label>تاريخ الدورة</label>
        <input type="date" name="course_date" value="{{ old('course_date') }}" required>
        @error('course_date') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label>الدرجة</label>
        <input type="number" name="degree" value="{{ old('degree') }}" min="0" max="100" required>
        @error('degree') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="actions">
        <button type="submit" class="btn btn-primary">إضافة</button>
        <a href="{{ route('dashboard') }}" class="btn btn-outline">رجوع</a>
      </div>
    </form>
  </div>
</body>
</html>
