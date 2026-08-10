import { Head, Link } from '@inertiajs/react';
import GuestLayout from '@/Layouts/GuestLayout';

const services = [
    {
        icon: '🏅',
        title: 'إصدار الشهادات',
        desc: 'نظام ذكي يتيح للجهات التعليمية إصدار شهادات احترافية للمستفيدين بضغطة زر واحدة مع نماذج متعددة وجذابة.',
    },
    {
        icon: '👤',
        title: 'إدارة المستفيدين',
        desc: 'نظم بيانات طلابك ومستفيديك بسهولة، تابع درجاتهم، وحدث بياناتهم من خلال لوحة تحكم عصرية وبسيطة.',
    },
    {
        icon: '🛡',
        title: 'أمان البيانات',
        desc: 'نولي حماية بيانات جهتك التعليمية أولوية قصوى، مع تشفير كامل لكافة السجلات والملفات المرفوعة على المنصة.',
    },
];

export default function Services() {
    return (
        <GuestLayout>
            <Head title="خدماتنا" />
            <style>{`
                .services-container {
                    max-width: 1200px;
                    margin: 50px auto;
                    padding: 0 20px;
                    text-align: center;
                }
                .services-heading {
                    font-size: clamp(1.8rem, 4vw, 2.5rem);
                    margin-bottom: 40px;
                    color: #1f2937;
                    font-weight: 800;
                }
                .services-heading span { color: #4f46e5; }
                .services-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                    gap: 25px;
                }
                .service-card {
                    background: rgba(255,255,255,0.7);
                    backdrop-filter: blur(5px);
                    padding: 40px 30px;
                    border-radius: 20px;
                    border: 1px solid rgba(255,255,255,0.3);
                    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
                    transition: all 0.4s ease;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                .service-card:hover {
                    transform: translateY(-10px);
                    background: white;
                    border-color: #4f46e5;
                }
                .service-icon { font-size: 3.5rem; margin-bottom: 20px; }
                .service-card h3 {
                    font-size: 1.4rem;
                    margin-bottom: 15px;
                    color: #1f2937;
                    font-weight: 700;
                }
                .service-card p {
                    font-size: 1rem;
                    color: #555;
                    line-height: 1.7;
                    margin-bottom: 25px;
                }
                .service-btn {
                    display: inline-block;
                    background: #4f46e5;
                    color: white;
                    padding: 10px 25px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: bold;
                    transition: 0.3s;
                    font-size: 14px;
                }
                .service-btn:hover {
                    background: #4338ca;
                    box-shadow: 0 5px 15px rgba(79,70,229,0.4);
                }
            `}</style>

            <div className="services-container">
                <h2 className="services-heading">خدماتنا <span>الذكية</span></h2>
                <div className="services-grid">
                    {services.map((s, i) => (
                        <div className="service-card" key={i}>
                            <div className="service-icon">{s.icon}</div>
                            <h3>{s.title}</h3>
                            <p>{s.desc}</p>
                            <Link href="/register" className="service-btn">ابدأ الآن</Link>
                        </div>
                    ))}
                </div>
            </div>
        </GuestLayout>
    );
}
