import { useState } from 'react';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    const [menuOpen, setMenuOpen] = useState(false);

    return (
        <div className="guest-page">
            <style>{`
                .guest-page {
                    min-height: 100vh;
                    background-image: linear-gradient(to top right, #5ce7f6ff, #ffffffff);
                    overflow-x: hidden;
                    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
                }
                .guest-nav {
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
                .guest-nav img { width: clamp(80px, 10vw, 120px); }
                .nav-links { display: flex; list-style: none; gap: 0; }
                .nav-links li { padding: 5px 15px; }
                .nav-links li a {
                    color: #333;
                    text-decoration: none;
                    font-weight: bold;
                    transition: color 0.3s;
                }
                .nav-links li a:hover { color: #4f46e5; }
                .menu-icon {
                    display: none;
                    font-size: 2rem;
                    cursor: pointer;
                    color: #4f46e5;
                    background: none;
                    border: none;
                    line-height: 1;
                }
                .sidebar-nav {
                    display: none;
                    position: fixed;
                    top: 0; right: -100%;
                    width: 280px;
                    height: 100vh;
                    background: #fff;
                    transition: right 0.4s;
                    padding: 100px 30px;
                    box-shadow: -5px 0 15px rgba(0,0,0,0.1);
                    z-index: 2000;
                    flex-direction: column;
                }
                .sidebar-nav.open { right: 0; }
                .sidebar-close {
                    position: absolute;
                    top: 25px; right: 25px;
                    font-size: 32px;
                    cursor: pointer;
                    background: none; border: none;
                    color: #4f46e5;
                    line-height: 1;
                }
                .sidebar-nav ul { list-style: none; text-align: right; }
                .sidebar-nav ul li { padding: 12px 0; border-bottom: 1px solid #f1f5f9; }
                .sidebar-nav ul li a { color: #333; text-decoration: none; font-weight: bold; font-size: 16px; }
                @media (max-width: 992px) {
                    .nav-links { display: none !important; }
                    .menu-icon { display: block; }
                    .sidebar-nav { display: flex; }
                }
            `}</style>

            <nav className="guest-nav">
                <div>
                    <Link href="/">
                        <img src="/image/logono.png" alt="شعار منصة شهادتي" />
                    </Link>
                </div>

                <ul className="nav-links">
                    <li><Link href="/">الرئيسية</Link></li>
                    <li><Link href="/register">الجهات التعليمية</Link></li>
                    <li><Link href="/services">خدماتنا</Link></li>
                    <li><Link href="/conecte">تواصل معنا</Link></li>
                    <li><Link href="/about">من نحن</Link></li>
                </ul>

                <button className="menu-icon" onClick={() => setMenuOpen(true)} aria-label="فتح القائمة">
                    ☰
                </button>
            </nav>

            {/* Mobile Sidebar */}
            <div className={`sidebar-nav ${menuOpen ? 'open' : ''}`}>
                <button className="sidebar-close" onClick={() => setMenuOpen(false)} aria-label="إغلاق القائمة">
                    ✕
                </button>
                <ul>
                    <li><Link href="/" onClick={() => setMenuOpen(false)}>الرئيسية</Link></li>
                    <li><Link href="/register" onClick={() => setMenuOpen(false)}>الجهات التعليمية</Link></li>
                    <li><Link href="/services" onClick={() => setMenuOpen(false)}>خدماتنا</Link></li>
                    <li><Link href="/conecte" onClick={() => setMenuOpen(false)}>تواصل معنا</Link></li>
                    <li><Link href="/about" onClick={() => setMenuOpen(false)}>من نحن</Link></li>
                </ul>
            </div>

            <main>{children}</main>
        </div>
    );
}
