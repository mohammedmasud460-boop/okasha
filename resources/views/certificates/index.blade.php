<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معرض القوالب - {{ $student->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, sans-serif; }
        .template-card { transition: transform 0.3s; border: none; border-radius: 15px; overflow: hidden; }
        .template-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .card-title { color: #4338ca; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">اختر قالب الشهادة</h1>
            <p class="text-muted">إصدار شهادة للطالب: <span class="badge bg-primary fs-6">{{ $student->name }}</span></p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw1.jpeg') }}" class="card-img-top" alt="القالب الكلاسيكي">
                    <div class="card-body text-center">
                        <h5 class="card-title">القالب الكلاسيكي</h5>
                        <p class="card-text text-muted small">يتميز بزخارف رسمية وخلفية تقليدية.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show1', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download1', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw2.jpeg') }}" class="card-img-top" alt="القالب العصري">
                    <div class="card-body text-center">
                        <h5 class="card-title">القالب العصري</h5>
                        <p class="card-text text-muted small">تصميم بسيط وألوان هادئة للشركات الناشئة.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show2', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download2', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw3.jpeg') }}" class="card-img-top" alt="القالب الذهبي">
                    <div class="card-body text-center">
                        <h5 class="card-title">القالب الذهبي</h5>
                        <p class="card-text text-muted small">تصميم فاخر مخصص للمناسبات الخاصة والجوائز.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show3', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download3', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>


               <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw4.jpeg') }}" class="card-img-top" alt="الدرع الرقمي">
                    <div class="card-body text-center">
                        <h5 class="card-title">الدرع الرقمي</h5>
                        <p class="card-text text-muted small">تصميم مستقبلي بنمط تقني عالي، مخصص لمجالات الأمن السيبراني والذكاء الاصطناعي</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show4', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download4', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>


               <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw5.jpeg') }}" class="card-img-top" alt="القالب الكلاسيكي">
                    <div class="card-body text-center">
                        <h5 class="card-title">القالب الكلاسيكي</h5>
                        <p class="card-text text-muted small">تصميم كلاسيكي بوقار مؤسسي، مثالي للشهادات الجامعية والاعتماد الحكومي.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show5', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download5', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>



             



               <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw6.jpeg') }}" class="card-img-top" alt="الإبداع الهندسي">
                    <div class="card-body text-center">
                        <h5 class="card-title">الإبداع الهندسي</h5>
                        <p class="card-text text-muted small">زخارف هندسية متداخلة تعبر عن الدقة، ممتاز للمجالات التقنية والبرمجية.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show6', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download6', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>


               <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw7.jpeg') }}" class="card-img-top" alt="الوسام المهني">
                    <div class="card-body text-center">
                        <h5 class="card-title">الوسام المهني</h5>
                        <p class="card-text text-muted small">تصميم رصين يركز على الكفاءة والخبرة، مثالي لشهادات الخبرة والتدريب الإداري.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show7', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download7', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>

               <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw8.jpeg') }}" class="card-img-top" alt="الطراز الأكاديمي">
                    <div class="card-body text-center">
                        <h5 class="card-title">الطراز الأكاديمي</h5>
                        <p class="card-text text-muted small">خلفية بنقوش خفيفة توحي بالعراقة العلمية، مخصص لشهادات التخرج والدبلومات</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show8', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download8', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                <div class="card h-100 template-card shadow-sm">
                    <img src="{{ asset('image/qw9.jpeg') }}" class="card-img-top" alt="مودرن جرافيك">
                    <div class="card-body text-center">
                        <h5 class="card-title">مودرن جرافيك</h5>
                        <p class="card-text text-muted small">تصميم معاصر يجمع بين الأناقة والابتكار، مثالي لشهادات التخرج والمشاريع الإبداعية.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('certificate.show9', $student->id) }}" class="btn btn-outline-primary">معاينة القالب</a>
                            <a href="{{ route('pdf.download9', $student->id) }}" class="btn btn-primary">تحميل PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="text-center mt-5">
            <a href="/dashboard" class="btn btn-link text-decoration-none">← العودة للوحة التحكم</a>
        </div>
    </div>
</body>
</html>