import { useForm } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function ResetPassword({ token, email }) {
    const { data, setData, post, processing, errors } = useForm({
        token,
        email: email ?? '',
        password: '',
        password_confirmation: '',
    });

    function submit(e) {
        e.preventDefault();
        post('/reset-password');
    }

    return (
        <AuthLayout title="إعادة تعيين كلمة المرور">
            <form onSubmit={submit}>
                <h1>كلمة مرور جديدة</h1>
                <p className="auth-subtitle">أدخل كلمة مرور جديدة لحسابك</p>

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

                <div className="input-box">
                    <input
                        type="password"
                        placeholder="كلمة المرور الجديدة"
                        value={data.password}
                        onChange={e => setData('password', e.target.value)}
                        required autoFocus
                    />
                    <span className="icon">🔒</span>
                </div>
                {errors.password && <div className="error-msg">{errors.password}</div>}

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

                <button type="submit" className="auth-btn" disabled={processing}>
                    {processing ? 'جارٍ التعيين...' : 'تعيين كلمة المرور'}
                </button>
            </form>
        </AuthLayout>
    );
}
