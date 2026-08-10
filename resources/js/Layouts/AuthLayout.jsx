import { Head } from '@inertiajs/react';

const authStyles = `
    .auth-page {
        background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .auth-wrapper {
        width: clamp(320px, 90vw, 480px);
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        color: #1f2937;
    }
    .auth-wrapper h1 {
        font-size: 26px;
        text-align: center;
        color: #4f46e5;
        margin-bottom: 8px;
        font-weight: 800;
    }
    .auth-subtitle {
        text-align: center;
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 25px;
        line-height: 1.6;
    }
    .auth-status {
        background: rgba(16,185,129,0.1);
        color: #065f46;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 20px;
        font-size: 14px;
        text-align: center;
        border: 1px solid rgba(16,185,129,0.2);
    }
    .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        margin: 20px 0;
    }
    .input-box input {
        width: 100%;
        height: 100%;
        background: #fff;
        border: 1px solid #e5e7eb;
        outline: none;
        border-radius: 12px;
        font-size: 15px;
        color: #333;
        padding: 0 45px 0 15px;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    .input-box input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
    }
    .input-box .icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: #4f46e5;
    }
    .input-row {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    .input-row .input-box { flex: 1; min-width: 180px; }
    .error-msg {
        color: #dc2626;
        font-size: 12px;
        margin-top: -15px;
        margin-bottom: 10px;
        padding-right: 5px;
    }
    .auth-btn {
        width: 100%;
        height: 48px;
        background: #4f46e5;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-size: 16px;
        color: #fff;
        font-weight: bold;
        transition: all 0.3s ease;
        margin-top: 10px;
        font-family: inherit;
    }
    .auth-btn:hover {
        background: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79,70,229,0.3);
    }
    .auth-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
    .auth-link-row {
        font-size: 14px;
        text-align: center;
        margin-top: 20px;
        color: #4b5563;
    }
    .auth-link-row a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 700;
    }
    .auth-link-row a:hover { text-decoration: underline; }
    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        margin-bottom: 20px;
        color: #4b5563;
    }
    .remember-forgot label {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }
    .remember-forgot label input { accent-color: #4f46e5; width: 16px; height: 16px; }
    .remember-forgot a { color: #4f46e5; text-decoration: none; font-weight: 600; }
    .back-link {
        display: block;
        text-align: center;
        color: #6b7280;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        margin-top: 14px;
        transition: 0.3s;
    }
    .back-link:hover { color: #4f46e5; }
    .auth-note { font-size: 11px; text-align: center; color: #9ca3af; margin-top: 20px; }
`;

export default function AuthLayout({ title, children }) {
    return (
        <div className="auth-page">
            <Head title={title} />
            <style>{authStyles}</style>
            <div className="auth-wrapper">
                {children}
            </div>
        </div>
    );
}
