import { Head, Link } from '@inertiajs/react';
import GuestLayout from '@/Layouts/GuestLayout';

export default function Welcome() {
    return (
        <GuestLayout>
            <Head title="منصة شهادتي | الواجهة الرسمية" />

            <style>{`
                .content-wrapper {
                    flex: 1;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    padding: 100px 20px 60px;
                    min-height: calc(100vh - 65px);
                }
                .hero-section { max-width: 800px; width: 100%; }
                .brand-mark { width: 140px; margin: 0 auto 30px; display: block; }
                .hero-section h1 {
                    font-size: clamp(32px, 5vw, 52px);
                    color: #1e1b4b;
                    margin-bottom: 20px;
                    font-weight: 800;
                    line-height: 1.2;
                }
                .hero-section p {
                    font-size: clamp(16px, 1.3vw, 20px);
                    color: #475569;
                    line-height: 1.8;
                    margin: 0 auto 40px;
                    max-width: 650px;
                }
                .cta-group {
                    display: flex;
                    gap: 20px;
                    justify-content: center;
                    flex-wrap: wrap;
                }
                .btn-main {
                    text-decoration: none;
                    background-color: #4f46e5;
                    color: #fff;
                    padding: 16px 50px;
                    font-size: 17px;
                    font-weight: 700;
                    border-radius: 12px;
                    transition: all 0.3s ease;
                    display: inline-block;
                }
                .btn-main:hover { background-color: #4338ca; transform: translateY(-2px); }
                .btn-outline {
                    text-decoration: none;
                    background-color: transparent;
                    border: 2px solid #1e1b4b;
                    color: #1e1b4b;
                    padding: 14px 48px;
                    font-size: 17px;
                    font-weight: 700;
                    border-radius: 12px;
                    transition: all 0.3s ease;
                    display: inline-block;
                }
                .btn-outline:hover { background-color: #f1f5f9; }
            `}</style>

            <div className="content-wrapper">
                <section className="hero-section">
                    <img src="/image/logono.png" alt="شعار شهادتي" className="brand-mark" />

                    <h1>منصة شهادتي الإلكترونية</h1>

                    <p>
                        نظام مؤسسي متكامل لأتمتة إصدار وتوثيق الشهادات الأكاديمية والمهنية.
                        نجمع بين دقة الأداء وسهولة الإدارة لتوفير تجربة رقمية موثوقة للجهات التعليمية.
                    </p>

                    <div className="cta-group">
                        <Link href="/register" className="btn-main">ابدأ الآن</Link>
                        <Link href="/about" className="btn-outline">تعرف علينا</Link>
                    </div>
                </section>
            </div>
        </GuestLayout>
    );
}
