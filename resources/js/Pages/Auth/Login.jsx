import { useForm, Link } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function Login({ status }) {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    function submit(e) {
        e.preventDefault();
        post('/login');
    }

    return (
        <AuthLayout title="تسجيل الدخول">
            <form onSubmit={submit}>
                <h1>تسجيل الدخول</h1>
                <p className="auth-subtitle">مرحباً بك مجدداً في منصة شهادتي</p>

                {status && <div className="auth-status">{status}</div>}

                <div className="input-box">
                    <input
                        type="email"
                        placeholder="البريد الإلكتروني"
                        value={data.email}
                        onChange={e => setData('email', e.target.value)}
                        required autoFocus
                    />
                    <span className="icon">✉</span>
                </div>
                {errors.email && <div className="error-msg">{errors.email}</div>}

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
                {errors.password && <div className="error-msg">{errors.password}</div>}

                <div className="remember-forgot">
                    <label>
                        <input
                            type="checkbox"
                            checked={data.remember}
                            onChange={e => setData('remember', e.target.checked)}
                        />
                        تذكرني
                    </label>
                    <Link href="/forgot-password">نسيت كلمة المرور؟</Link>
                </div>

                <button type="submit" className="auth-btn" disabled={processing}>
                    {processing ? 'جارٍ الدخول...' : 'دخول'}
                </button>

                <Link href="/" className="back-link">← رجوع</Link>

                <div className="auth-link-row">
                    ليس لديك حساب؟ <Link href="/register">سجل الآن</Link>
                </div>
            </form>
        </AuthLayout>
    );
}
