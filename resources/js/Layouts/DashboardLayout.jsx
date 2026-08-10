import { Link, router } from '@inertiajs/react';

export default function DashboardLayout({ children, showLogout = false }) {
    return (
        <div style={{ minHeight: '100vh', backgroundImage: 'linear-gradient(to top right, #5ce7f6ff, #ffffff)', fontFamily: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif", color: '#1f2937' }}>
            <style>{`
                .dash-nav {
                    display: flex;
                    padding: 10px 5%;
                    justify-content: space-between;
                    align-items: center;
                    background: rgba(255,255,255,0.4);
                    backdrop-filter: blur(10px);
                    border-bottom: 1px solid rgba(255,255,255,0.3);
                    position: sticky;
                    top: 0;
                    z-index: 1000;
                }
                .dash-nav img { width: clamp(80px, 10vw, 120px); }
                .dash-nav ul {
                    display: flex;
                    list-style: none;
                    gap: 15px;
                    margin: 0;
                    padding: 0;
                    align-items: center;
                    flex-wrap: wrap;
                }
                .dash-nav ul li a {
                    color: #333;
                    text-decoration: none;
                    font-weight: bold;
                    font-size: 14px;
                }
                .dash-nav ul li a:hover { color: #4f46e5; }
                .logout-btn {
                    background: none;
                    border: none;
                    color: #ef4444;
                    font-weight: bold;
                    font-size: 14px;
                    cursor: pointer;
                    padding: 0;
                    font-family: inherit;
                    transition: 0.3s;
                }
                .logout-btn:hover { color: #b91c1c; text-decoration: underline; }
            `}</style>
            <nav className="dash-nav">
                <Link href="/">
                    <img src="/image/logono.png" alt="logo" />
                </Link>
                <ul>
                    <li><Link href="/">الرئيسية</Link></li>
                    <li><Link href="/dashboard">قائمة الطلاب</Link></li>
                    <li><Link href="/profile">الإعدادات</Link></li>
                    {showLogout && (
                        <li>
                            <button className="logout-btn" onClick={() => router.post('/logout')}>
                                تسجيل الخروج
                            </button>
                        </li>
                    )}
                </ul>
            </nav>
            {children}
        </div>
    );
}
