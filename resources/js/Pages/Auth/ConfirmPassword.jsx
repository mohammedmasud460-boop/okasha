import { useForm } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function ConfirmPassword() {
    const { data, setData, post, processing, errors } = useForm({ password: '' });

    function submit(e) {
        e.preventDefault();
        post('/confirm-password');
    }

    return (
        <AuthLayout title="تأكيد كلمة المرور">
            <form onSubmit={submit}>
                <h1>تأكيد كلمة المرور</h1>
                <p className="auth-subtitle">
                    هذه منطقة آمنة. يرجى تأكيد كلمة مرورك قبل المتابعة.
                </p>

                <div className="input-box">
                    <input
                        type="password"
                        placeholder="كلمة المرور"
                        value={data.password}
                        onChange={e => setData('password', e.target.value)}
                        required autoFocus
                    />
                    <span className="icon">🔒</span>
                </div>
                {errors.password && <div className="error-msg">{errors.password}</div>}

                <button type="submit" className="auth-btn" disabled={processing}>
                    {processing ? 'جارٍ التأكيد...' : 'تأكيد'}
                </button>
            </form>
        </AuthLayout>
    );
}
