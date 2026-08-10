import { Head } from '@inertiajs/react';
import { useForm, usePage } from '@inertiajs/react';
import GuestLayout from '@/Layouts/GuestLayout';

export default function Contact() {
    const { flash } = usePage().props;
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        subject: '',
        message: '',
    });

    function submit(e) {
        e.preventDefault();
        post('/contact-send', { onSuccess: () => reset() });
    }

    return (
        <GuestLayout>
            <Head title="تواصل معنا" />
            <style>{`
                .map-section {
                    width: 85%;
                    margin: 40px auto;
                    border-radius: 20px;
                    overflow: hidden;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
                }
                .map-section iframe { width: 100%; height: 400px; display: block; border: 0; }
                .contact-container {
                    width: 85%;
                    margin: 0 auto 60px;
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                    gap: 40px;
                }
                .contact-info, .contact-form-box {
                    background: #ffffff;
                    padding: 40px;
                    border-radius: 20px;
                    border: 1px solid #e2e8f0;
                }
                .info-item {
                    display: flex;
                    align-items: flex-start;
                    gap: 20px;
                    margin-bottom: 35px;
                }
                .info-icon {
                    font-size: 2rem;
                    background: #f0f0ff;
                    padding: 12px;
                    border-radius: 12px;
                    line-height: 1;
                }
                .info-item h5 { font-size: 17px; color: #1e1b4b; margin-bottom: 5px; font-weight: 700; }
                .info-item p { color: #475569; font-size: 14px; line-height: 1.6; }
                .contact-form-box input,
                .contact-form-box textarea {
                    width: 100%;
                    padding: 14px 15px;
                    margin-bottom: 16px;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    background: #fcfcfd;
                    font-size: 15px;
                    outline: none;
                    font-family: inherit;
                    transition: border-color 0.3s;
                }
                .contact-form-box input:focus,
                .contact-form-box textarea:focus { border-color: #4f46e5; }
                .contact-form-box textarea { resize: vertical; }
                .btn-send {
                    width: 100%;
                    padding: 16px;
                    background: #4f46e5;
                    color: white;
                    border: none;
                    border-radius: 10px;
                    font-size: 16px;
                    font-weight: 700;
                    cursor: pointer;
                    transition: 0.3s;
                    font-family: inherit;
                }
                .btn-send:hover { background: #4338ca; transform: translateY(-2px); }
                .btn-send:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
                .alert-success {
                    padding: 14px; margin-bottom: 18px; border-radius: 10px;
                    background: #d4edda; color: #155724; border: 1px solid #c3e6cb;
                    text-align: center; font-size: 14px; font-weight: 600;
                }
                .alert-error {
                    padding: 14px; margin-bottom: 18px; border-radius: 10px;
                    background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;
                    text-align: center; font-size: 14px; font-weight: 600;
                }
                .field-error { color: #dc2626; font-size: 12px; margin-top: -12px; margin-bottom: 10px; }
                @media (max-width: 992px) {
                    .map-section, .contact-container { width: 95%; }
                }
            `}</style>

            <section className="map-section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10409.926481390581!2d39.76678060243447!3d21.450138639021997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sar!2ssa!4v1767222893841!5m2!1sar!2ssa"
                    title="الموقع على الخريطة"
                    allowFullScreen
                    loading="lazy"
                />
            </section>

            <main className="contact-container">
                <div className="contact-info">
                    <div className="info-item">
                        <div className="info-icon">📍</div>
                        <div>
                            <h5>الموقع الرئيسي</h5>
                            <p>المملكة العربية السعودية، مكة<br />حي الزايدي، معهد هرماس</p>
                        </div>
                    </div>
                    <div className="info-item">
                        <div className="info-icon">✉️</div>
                        <div>
                            <h5>البريد الإلكتروني</h5>
                            <p>mohammed.masud460@gmail.com<br />info@shahadati.sa</p>
                        </div>
                    </div>
                    <div className="info-item">
                        <div className="info-icon">📞</div>
                        <div>
                            <h5>الدعم الفني</h5>
                            <p>+966557977270<br />من الأحد للخميس (8ص - 4م)</p>
                        </div>
                    </div>
                </div>

                <div className="contact-form-box">
                    {flash?.success && <div className="alert-success">{flash.success}</div>}
                    {flash?.error   && <div className="alert-error">{flash.error}</div>}

                    <form onSubmit={submit}>
                        <input
                            type="text"
                            placeholder="الاسم الكامل"
                            value={data.name}
                            onChange={e => setData('name', e.target.value)}
                            required
                        />
                        {errors.name && <div className="field-error">{errors.name}</div>}

                        <input
                            type="email"
                            placeholder="البريد الإلكتروني"
                            value={data.email}
                            onChange={e => setData('email', e.target.value)}
                            required
                        />
                        {errors.email && <div className="field-error">{errors.email}</div>}

                        <input
                            type="text"
                            placeholder="عنوان الرسالة"
                            value={data.subject}
                            onChange={e => setData('subject', e.target.value)}
                            required
                        />
                        {errors.subject && <div className="field-error">{errors.subject}</div>}

                        <textarea
                            rows="5"
                            placeholder="كيف يمكننا مساعدتك؟"
                            value={data.message}
                            onChange={e => setData('message', e.target.value)}
                            required
                        />
                        {errors.message && <div className="field-error">{errors.message}</div>}

                        <button type="submit" className="btn-send" disabled={processing}>
                            {processing ? 'جارٍ الإرسال...' : 'إرسال الرسالة'}
                        </button>
                    </form>
                </div>
            </main>
        </GuestLayout>
    );
}
