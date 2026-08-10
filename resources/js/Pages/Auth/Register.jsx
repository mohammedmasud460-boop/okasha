import { useForm, Link } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function Register() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    function submit(e) {
        e.preventDefault();
        post('/register');
    }

    return (
        <AuthLayout title="إنشاء حساب جديد">
            <form onSubmit={submit}>
                <h1>إنشاء حساب جديد</h1>
                <p className="auth-subtitle">أدخل بيانات الجهة للانضمام إلى المنصة</p>

                <div className="input-box">
                    <input
                        type="text"
                        placeholder="اسم الجهة التعليمية"
                        value={data.name}
                        onChange={e => setData('name', e.target.value)}
                        required autoFocus
                    />
                    <span className="icon">🏛</span>
                </div>
                {errors.name && <div className="error-msg">{errors.name}</div>}

                <div className="input-box">
                    <input
                        type="email"
                        placeholder="البريد الإلكتروني"
                        value={data.email}
                        onChange={e => setData('email', e.target.value)}
                        required
                    />
                    <span className="icon">✉</span>
                </div>
                {errors.email && <div className="error-msg">{errors.email}</div>}

                <div className="input-row">
                    <div className="input-box">
                        <input
                            type="password"
                            placeholder="كلمة المرور"
                            value={data.password}
                            onChange={e => setData('password', e.target.value)}
                            required
                        />
                        <span className="icon">🔒</span>
                    </div>
                    <div className="input-box">
                        <input
                            type="password"
                            placeholder="تأكيد كلمة المرور"
                            value={data.password_confirmation}
                            onChange={e => setData('password_confirmation', e.target.value)}
                            required
                        />
                        <span className="icon">✅</span>
                    </div>
                </div>
                {errors.password && <div className="error-msg">{errors.password}</div>}

                <button type="submit" className="auth-btn" disabled={processing}>
                    {processing ? 'جارٍ التسجيل...' : 'تسجيل الحساب'}
                </button>

                <div className="auth-link-row">
                    لديك حساب بالفعل؟ <Link href="/login">سجل الدخول</Link>
                </div>

                <p className="auth-note">بالنقر على "تسجيل"، فإنك توافق على سياسات المنصة وشروط الاستخدام.</p>
            </form>
        </AuthLayout>
    );
}
