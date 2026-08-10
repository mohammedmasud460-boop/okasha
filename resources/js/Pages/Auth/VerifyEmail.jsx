import { useForm, Link } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function VerifyEmail({ status }) {
    const { post, processing } = useForm({});

    function resend(e) {
        e.preventDefault();
        post('/email/verification-notification');
    }

    return (
        <AuthLayout title="تأكيد البريد الإلكتروني">
            <h1>تحقق من بريدك</h1>
            <p className="auth-subtitle">
                شكراً للتسجيل! قبل البدء، يرجى التحقق من بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه.
                إذا لم تصلك الرسالة، سنرسل لك رسالة أخرى.
            </p>

            {status === 'verification-link-sent' && (
                <div className="auth-status">
                    تم إرسال رابط تحقق جديد إلى بريدك الإلكتروني.
                </div>
            )}

            <form onSubmit={resend}>
                <button type="submit" className="auth-btn" disabled={processing}>
                    {processing ? 'جارٍ الإرسال...' : 'إعادة إرسال رابط التحقق'}
                </button>
            </form>

            <form method="POST" action="/logout" style={{ marginTop: '14px' }}>
                <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.content} />
                <button type="submit" className="back-link" style={{ background: 'none', border: 'none', cursor: 'pointer', width: '100%' }}>
                    تسجيل الخروج
                </button>
            </form>
        </AuthLayout>
    );
}
