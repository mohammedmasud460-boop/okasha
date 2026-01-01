<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث كلمة المرور | منصة شهادتي</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
             <link rel="shortcut icon" href="{{asset('image/logono.png')}}" type="image/x-icon">

    <style>
        :root { 
            --primary: #4f46e5; 
            --primary-dark: #4338ca; 
            --danger: #ef4444; 
            --border: #e2e8f0;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        * { 
            margin: 0; padding: 0; box-sizing: border-box; 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
        }

        body { 
            background: linear-gradient(135deg, #6366f1 0%, #a5b4fc 50%, #f8fafc 100%);
            display: flex; justify-content: center; align-items: center; 
            min-height: 100vh; padding: 20px;
            overflow: hidden;
        }

        /* إضافة خلفية متحركة خفيفة (اختياري) */
        body::before {
            content: "";
            position: absolute;
            width: 300px; height: 300px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: -100px; right: -100px;
            z-index: -1;
        }

        .wrapper { 
            width: clamp(320px, 95vw, 450px); 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5); 
            border-radius: 24px; 
            padding: 40px; 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .wrapper:hover {
            transform: translateY(-5px);
        }

        h1 { 
            font-size: 28px; text-align: center; color: var(--text-main); 
            margin-bottom: 10px; font-weight: 800;
            letter-spacing: -0.5px;
        }

        .subtitle { 
            text-align: center; color: var(--text-muted); 
            font-size: 15px; margin-bottom: 30px; 
            line-height: 1.6;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
            padding-right: 5px;
        }

        .input-box { 
            position: relative; 
            width: 100%; 
            height: 54px; 
        }

        .input-box input { 
            width: 100%; height: 100%; 
            background: var(--white); 
            border: 2px solid var(--border); 
            border-radius: 14px; 
            padding: 0 45px 0 15px; 
            outline: none; 
            font-size: 15px;
            color: var(--text-main);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }

        .input-box input:focus { 
            border-color: var(--primary); 
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); 
        }

        /* تمييز الحقل الذي لا يمكن تعديله (Readonly) */
        .input-box input[readonly] {
            background-color: #f1f5f9;
            color: #94a3b8;
            cursor: not-allowed;
            border-style: dashed;
        }

        .input-box i { 
            position: absolute; right: 15px; top: 50%; 
            transform: translateY(-50%); 
            font-size: 22px; color: var(--text-muted); 
            transition: color 0.3s ease;
        }

        .input-box input:focus + i {
            color: var(--primary);
        }

        .btn { 
            width: 100%; height: 54px; 
            background: var(--primary); 
            border: none; border-radius: 14px; 
            color: white; font-size: 16px; font-weight: 700; 
            cursor: pointer; 
            display: flex; align-items: center; justify-content: center; gap: 10px;
            transition: all 0.3s ease; 
            margin-top: 15px;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .btn:hover { 
            background: var(--primary-dark); 
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .error-message { 
            color: var(--danger); font-size: 12px; 
            margin-top: 6px; text-align: right; 
            font-weight: 500;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* للهواتف الصغيرة */
        @media (max-width: 400px) {
            .wrapper { padding: 25px 20px; }
            h1 { font-size: 22px; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            
            <h1>تحديث كلمة المرور</h1>
            <p class="subtitle">قم بحماية حسابك عن طريق اختيار كلمة مرور قوية وسهلة التذكر.</p>

            <div class="input-group">
                <label>البريد الإلكتروني المسجل</label>
                <div class="input-box">
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" required readonly>
                    <i class='bx bxs-envelope'></i>
                </div>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label>كلمة المرور الجديدة</label>
                <div class="input-box">
                    <input type="password" name="password" placeholder="••••••••" required autofocus>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                @error('password') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label>تأكيد كلمة المرور</label>
                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder="••••••••" required>
                    <i class='bx bxs-check-shield'></i>
                </div>
            </div>

            <button type="submit" class="btn">
                <span>تحديث الآن</span>
                <i class='bx bx-refresh bx-spin-hover'></i>
            </button>
        </form>
    </div>
</body>
</html>