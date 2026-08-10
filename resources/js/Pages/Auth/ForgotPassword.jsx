import { useForm, Link } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function ForgotPassword({ status }) {
    const { data, setData, post, processing, errors } = useForm({ email: '' });

    function submit(e) {
        e.preventDefault();
        post('/forgot-password');
    }

    return (
        <AuthLayout title="نسيت كلمة المرور">
            <form onSubmit={submit}>
                <h1>نسيت كلمة المرور؟</h1>
                <p className="auth-subtitle">
                    لا تقلق، فقط أدخل بريدك الإلكتروني وسنرسل لك رابطاً لتعيين كلمة مرور جديدة.
                </p>

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

                <button type="submit" className="auth-btn" disabled={processing}>
                    {processing ? 'جارٍ الإرسال...' : 'إرسال رابط التعيين'}
                </button>

                <Link href="/login" className="back-link">العودة لتسجيل الدخول</Link>
            </form>
        </AuthLayout>
    );
}
