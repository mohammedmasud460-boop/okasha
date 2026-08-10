import { Head, Link } from '@inertiajs/react';
import DashboardLayout from '@/Layouts/DashboardLayout';

const templates = [
    { num: 1, title: 'القالب الكلاسيكي',    desc: 'يتميز بزخارف رسمية وخلفية تقليدية.' },
    { num: 2, title: 'القالب العصري',        desc: 'تصميم بسيط وألوان هادئة للشركات الناشئة.' },
    { num: 3, title: 'القالب الذهبي',        desc: 'تصميم فاخر مخصص للمناسبات الخاصة والجوائز.' },
    { num: 4, title: 'الدرع الرقمي',         desc: 'تصميم مستقبلي بنمط تقني عالي، مخصص لمجالات الأمن السيبراني والذكاء الاصطناعي.' },
    { num: 5, title: 'القالب الكلاسيكي',    desc: 'تصميم كلاسيكي بوقار مؤسسي، مثالي للشهادات الجامعية والاعتماد الحكومي.' },
    { num: 6, title: 'الإبداع الهندسي',      desc: 'زخارف هندسية متداخلة تعبر عن الدقة، ممتاز للمجالات التقنية والبرمجية.' },
    { num: 7, title: 'الوسام المهني',        desc: 'تصميم رصين يركز على الكفاءة والخبرة، مثالي لشهادات الخبرة والتدريب الإداري.' },
    { num: 8, title: 'الطراز الأكاديمي',    desc: 'خلفية بنقوش خفيفة توحي بالعراقة العلمية، مخصص لشهادات التخرج والدبلومات.' },
    { num: 9, title: 'مودرن جرافيك',         desc: 'تصميم معاصر يجمع بين الأناقة والابتكار، مثالي لشهادات التخرج والمشاريع الإبداعية.' },
];

export default function CertificateIndex({ student }) {
    return (
        <DashboardLayout>
            <Head title={`معرض القوالب — ${student.name}`} />
            <style>{`
                .gallery-section { padding: 50px 5%; max-width: 1200px; margin: 0 auto; }
                .gallery-header { text-align: center; margin-bottom: 40px; }
                .gallery-header h1 { font-size: 2rem; font-weight: 800; color: #1e1b4b; margin-bottom: 10px; }
                .gallery-header p { color: #475569; font-size: 15px; }
                .gallery-header .student-badge {
                    display: inline-block;
                    background: #4f46e5;
                    color: white;
                    padding: 4px 14px;
                    border-radius: 20px;
                    font-size: 15px;
                    font-weight: bold;
                    margin-top: 5px;
                }
                .templates-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                    gap: 25px;
                }
                .template-card {
                    background: white;
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 5px 15px rgba(0,0,0,0.07);
                    border: 1px solid #e2e8f0;
                    transition: transform 0.3s, box-shadow 0.3s;
                }
                .template-card:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(0,0,0,0.12); }
                .template-card img { width: 100%; height: 180px; object-fit: cover; display: block; }
                .card-body { padding: 20px; text-align: center; }
                .card-body h5 { color: #4338ca; font-weight: bold; font-size: 17px; margin-bottom: 8px; }
                .card-body p { color: #64748b; font-size: 13px; line-height: 1.5; margin-bottom: 18px; }
                .card-btns { display: flex; flex-direction: column; gap: 8px; }
                .btn-preview {
                    display: block;
                    padding: 9px;
                    border: 2px solid #4f46e5;
                    border-radius: 8px;
                    color: #4f46e5;
                    text-decoration: none;
                    font-weight: bold;
                    font-size: 14px;
                    transition: 0.3s;
                }
                .btn-preview:hover { background: #4f46e5; color: white; }
                .btn-download {
                    display: block;
                    padding: 9px;
                    background: #4f46e5;
                    border-radius: 8px;
                    color: white;
                    text-decoration: none;
                    font-weight: bold;
                    font-size: 14px;
                    transition: 0.3s;
                }
                .btn-download:hover { background: #4338ca; }
                .back-link { display: block; text-align: center; margin-top: 40px; color: #4f46e5; text-decoration: none; font-weight: bold; }
                .back-link:hover { text-decoration: underline; }
            `}</style>

            <div className="gallery-section">
                <div className="gallery-header">
                    <h1>اختر قالب الشهادة</h1>
                    <p>إصدار شهادة للطالب:</p>
                    <span className="student-badge">{student.name}</span>
                </div>

                <div className="templates-grid">
                    {templates.map(t => (
                        <div key={t.num} className="template-card">
                            <img src={`/image/qw${t.num}.jpeg`} alt={t.title} />
                            <div className="card-body">
                                <h5>{t.title}</h5>
                                <p>{t.desc}</p>
                                <div className="card-btns">
                                    <Link href={`/certificates/show${t.num}/${student.id}`} className="btn-preview">
                                        معاينة القالب
                                    </Link>
                                    <a href={`/certificates/download${t.num}/${student.id}`} className="btn-download">
                                        تحميل PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

                <Link href="/dashboard" className="back-link">← العودة للوحة التحكم</Link>
            </div>
        </DashboardLayout>
    );
}
