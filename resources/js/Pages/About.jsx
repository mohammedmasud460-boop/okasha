import { Head, Link } from '@inertiajs/react';
import GuestLayout from '@/Layouts/GuestLayout';

export default function About() {
    return (
        <GuestLayout>
            <Head title="من نحن" />
            <style>{`
                .about-section {
                    padding: 60px 5%;
                    max-width: 1000px;
                    margin: 0 auto;
                    text-align: center;
                }
                .about-card {
                    background: #ffffff;
                    padding: 50px 30px;
                    border-radius: 20px;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
                }
                .about-logo {
                    width: 130px;
                    margin: 0 auto 25px;
                    display: block;
                    filter: drop-shadow(0 5px 15px rgba(0,0,0,0.08));
                }
                .about-card h2 {
                    font-size: 28px;
                    color: #1e1b4b;
                    margin-bottom: 10px;
                    font-weight: 800;
                }
                .about-card h2 span { color: #4f46e5; }
                .about-card h3 {
                    font-size: 16px;
                    color: #475569;
                    margin-bottom: 20px;
                    font-weight: 600;
                }
                .about-card p {
                    font-size: 17px;
                    color: #475569;
                    line-height: 1.8;
                    margin-bottom: 35px;
                    max-width: 800px;
                    margin-left: auto;
                    margin-right: auto;
                }
                .btn-services {
                    display: inline-block;
                    background: #4f46e5;
                    color: white;
                    padding: 12px 35px;
                    border-radius: 10px;
                    font-weight: 700;
                    text-decoration: none;
                    transition: 0.3s;
                }
                .btn-services:hover { background: #4338ca; }
                .social-links {
                    margin-top: 40px;
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                }
                .social-links a {
                    font-size: 2rem;
                    text-decoration: none;
                    transition: transform 0.3s;
                    display: inline-block;
                }
                .social-links a:hover { transform: scale(1.2); }
                @media (max-width: 768px) {
                    .about-card { padding: 30px 15px; }
                }
            `}</style>

            <main className="about-section">
                <div className="about-card">
                    <img src="/image/logono.png" alt="شعار المنصة" className="about-logo" />

                    <h2>رؤيتنا في <span>منصة شهادتي</span></h2>
                    <h3>نحو تحول رقمي آمن وموثوق للوثائق التعليمية</h3>

                    <p>
                        نحن فريق متخصص يسعى لتطوير الحلول التقنية التي تخدم المؤسسات التعليمية والأكاديمية.
                        انطلقت منصة "شهادتي" لتكون الجسر الذي يربط بين كفاءة الإدارة وجودة المخرجات،
                        من خلال أتمتة عمليات إصدار الشهادات وضمان صحتها بأحدث المعايير البرمجية،
                        مما يوفر الوقت والجهد ويضمن دقة البيانات.
                    </p>

                    <Link href="/services" className="btn-services">اكتشف خدماتنا</Link>

                    <div className="social-links">
                        <a href="https://facebook.com" target="_blank" rel="noreferrer" title="Facebook">🔵</a>
                        <a href="https://instagram.com" target="_blank" rel="noreferrer" title="Instagram">📸</a>
                        <a href="https://wa.me/966557977270" target="_blank" rel="noreferrer" title="WhatsApp">💬</a>
                        <a href="https://twitter.com" target="_blank" rel="noreferrer" title="Twitter">🐦</a>
                    </div>
                </div>
            </main>
        </GuestLayout>
    );
}
