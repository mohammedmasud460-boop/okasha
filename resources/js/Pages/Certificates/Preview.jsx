import { Head, useForm, usePage } from '@inertiajs/react';

export default function Preview({ student, templateNum, backgroundImage }) {
    const { flash, auth } = usePage().props;
    const { post, processing } = useForm({});
    const today = new Date().toISOString().substring(0, 10);
    const courseDate = student.course_date ? student.course_date.substring(0, 10) : '';

    function sendEmail() {
        if (confirm('هل أنت متأكد من إرسال الشهادة لبريد الطالب؟')) {
            post(`/certificates/send-email/${student.id}/${templateNum}`);
        }
    }

    return (
        <>
            <Head title={`شهادة — ${student.name}`} />
            <style>{`
                * { box-sizing: border-box; }
                body { margin: 0; direction: rtl; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; }
                .actions-bar {
                    width: 100%;
                    padding: 12px 20px;
                    background: #fff;
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                    position: sticky;
                    top: 0;
                    z-index: 1000;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                    flex-wrap: wrap;
                }
                .act-btn {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 10px 20px;
                    border-radius: 8px;
                    font-size: 14px;
                    font-weight: 600;
                    text-decoration: none;
                    transition: 0.3s;
                    cursor: pointer;
                    border: none;
                    height: 42px;
                    font-family: inherit;
                }
                .btn-download { background: #4f46e5; color: white; }
                .btn-download:hover { background: #1e40af; transform: translateY(-2px); }
                .btn-back { background: #4f46e5; color: white; }
                .btn-back:hover { background: #475569; transform: translateY(-2px); }
                .btn-send { background: #4f46e5; color: white; }
                .btn-send:hover { background: #047857; transform: translateY(-2px); }
                .btn-send:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
                .flash-msg { max-width: 800px; margin: 10px auto; padding: 14px; border-radius: 8px; text-align: center; }
                .flash-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
                .flash-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
                .cert-wrapper { padding: 20px; display: flex; justify-content: center; }
                .cert-paper {
                    width: 297mm;
                    height: 210mm;
                    background-size: 100% 100%;
                    background-color: white;
                    position: relative;
                    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
                    display: flex;
                    flex-direction: column;
                    padding: 50pt 70pt;
                }
                .main-title { font-size: 48pt; font-weight: 800; text-align: center; margin-bottom: 10pt; margin-top: 10pt; }
                .statement { font-size: 18pt; color: #475569; text-align: center; margin: 15pt 0; }
                .student-name-cert { font-size: 20pt; font-weight: bold; color: #111827; }
                .course-text { font-size: 19pt; line-height: 1.6; color: #1e293b; text-align: center; margin-bottom: 30pt; }
                .course-name { font-weight: bold; font-size: 24pt; }
                .date-text { text-align: center; font-size: 14pt; color: #475569; margin-bottom: 10pt; }
                .cert-footer { margin-top: auto; width: 100%; border-collapse: collapse; }
                .footer-cell { width: 33%; text-align: center; }
                .sig-line { border-top: 1.5pt solid #1e293b; width: 180pt; margin: 0 auto 8pt; }
                .label-text { font-size: 12pt; color: #64748b; margin-bottom: 5pt; }
                .name-text { font-weight: bold; font-size: 16pt; color: #1e293b; }
                .seal-box {
                    width: 80pt; height: 80pt;
                    border: 2pt double #c5a059;
                    border-radius: 50%;
                    display: flex; align-items: center; justify-content: center;
                    color: #c5a059; font-size: 10pt; font-weight: bold;
                    transform: rotate(-15deg); margin: 0 auto;
                }
                @media screen and (max-width: 1024px) {
                    .cert-paper { width: 100%; height: auto; aspect-ratio: 297/210; padding: 5% 7%; }
                    .main-title { font-size: 6vw; }
                    .statement { font-size: 2.5vw; }
                    .course-text { font-size: 2.2vw; }
                    .name-text { font-size: 2vw; }
                }
                @media print { .actions-bar { display: none; } .cert-paper { box-shadow: none; } }
            `}</style>

            <div className="actions-bar">
                <a href={`/certificates/download${templateNum}/${student.id}`} className="act-btn btn-download">
                    💾 تحميل PDF
                </a>
                <button onClick={() => history.back()} className="act-btn btn-back">
                    ↩ رجوع
                </button>
                <button className="act-btn btn-send" onClick={sendEmail} disabled={processing}>
                    ✉️ {processing ? 'جارٍ الإرسال...' : 'إرسال الشهادة الى بريد الطالب'}
                </button>
            </div>

            {flash?.success && <div className="flash-msg flash-success">{flash.success}</div>}
            {flash?.error   && <div className="flash-msg flash-error">{flash.error}</div>}

            <div className="cert-wrapper">
                <div className="cert-paper" style={{ backgroundImage: `url("${backgroundImage}")` }}>
                    <div className="main-title">شهادة إجتياز</div>
                    <div className="statement">
                        يشـهد معهد {auth?.user?.name} بأن المتدرب/ـة :{' '}
                        <span className="student-name-cert">{student.name}</span>
                    </div>

                    <div className="course-text">
                        قد اجتاز بنجاح الدورة التدريبية بعنوان :{' '}
                        <span className="course-name">"{student.course}"</span>
                        <span style={{ color: '#1e293b' }}> التي أقيمت في مركزنا التدريبي</span>
                        <br /><br />
                        والمنعقدة بتاريخ {courseDate} م وقد حصل على تقدير عام : {student.degree}
                    </div>

                    <div className="course-text">
                        بناءً عليه، مُنحت له هذه الشهادة تقديراً لجهوده وتمنياتنا له بمزيد من التوفيق والنجاح.
                    </div>

                    <div className="date-text">صدرة في: {today}</div>

                    <table className="cert-footer">
                        <tbody>
                            <tr>
                                <td className="footer-cell">
                                    <div className="label-text">الجهة</div>
                                    <div className="sig-line" />
                                    <div className="name-text">{auth?.user?.name}</div>
                                </td>
                                <td className="footer-cell">
                                    <div className="seal-box">الختم الرسمي</div>
                                </td>
                                <td className="footer-cell">
                                    <div className="label-text">اعتماد التوقيع</div>
                                    <div className="sig-line" />
                                    <div className="name-text">رقمي</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </>
    );
}
