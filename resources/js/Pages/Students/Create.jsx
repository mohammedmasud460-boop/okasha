import { Head, useForm, usePage } from '@inertiajs/react';
import DashboardLayout from '@/Layouts/DashboardLayout';

export default function Create() {
    const { flash } = usePage().props;
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        course: '',
        course_date: '',
        degree: '',
        image: null,
    });

    function submit(e) {
        e.preventDefault();
        post('/students', { onSuccess: () => reset('name', 'email', 'course', 'course_date', 'degree', 'image') });
    }

    return (
        <DashboardLayout>
            <Head title="إضافة طالب جديد" />
            <style>{`
                .form-container {
                    max-width: 600px;
                    width: 90%;
                    margin: 50px auto;
                    background: rgba(255,255,255,0.8);
                    backdrop-filter: blur(15px);
                    border-radius: 20px;
                    padding: 30px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                    border: 1px solid rgba(255,255,255,0.5);
                }
                .form-container h2 { color: #4f46e5; text-align: center; margin: 0 0 25px; font-size: 22px; }
                .field { margin-bottom: 15px; }
                .field label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #374151; }
                .field input, .field select {
                    width: 100%;
                    padding: 12px 15px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    font-size: 14px;
                    background: #fff;
                    transition: 0.3s;
                    box-sizing: border-box;
                    font-family: inherit;
                }
                .field input:focus, .field select:focus { outline: none; border-color: #4f46e5; box-shadow: 0 0 0 3px rgba(79,70,229,0.1); }
                .field-row { display: flex; gap: 15px; }
                .field-row .field { flex: 1; }
                .field-row .field:first-child { flex: 2; }
                .actions { display: flex; gap: 10px; margin-top: 25px; }
                .btn { flex: 1; padding: 12px; border-radius: 10px; font-weight: bold; cursor: pointer; text-align: center; font-size: 15px; transition: 0.3s; border: none; font-family: inherit; }
                .btn-primary { background: #4f46e5; color: white; }
                .btn-primary:hover { background: #4338ca; transform: translateY(-2px); }
                .btn-primary:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
                .btn-outline { background: transparent; color: #4b5563; border: 1px solid #e5e7eb; cursor: pointer; text-decoration: none; display: flex; align-items: center; justify-content: center; }
                .btn-outline:hover { background: rgba(0,0,0,0.05); }
                .alert-danger { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 13px; }
                .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #d1fae5; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; text-align: center; }
                .field-error { color: #dc2626; font-size: 12px; margin-top: 4px; }
            `}</style>

            <div className="form-container">
                <h2>إضافة طالب جديد</h2>

                {flash?.success && <div className="alert-success">{flash.success}</div>}
                {Object.keys(errors).length > 0 && (
                    <div className="alert-danger">
                        <strong>تحقق من الحقول التالية:</strong>
                        <ul style={{ margin: '5px 0 0', paddingRight: '20px' }}>
                            {Object.values(errors).map((err, i) => <li key={i}>{err}</li>)}
                        </ul>
                    </div>
                )}

                <form onSubmit={submit} encType="multipart/form-data">
                    <div className="field">
                        <label>اسم الطالب الكامل</label>
                        <input type="text" placeholder="أدخل اسم الطالب" value={data.name} onChange={e => setData('name', e.target.value)} required autoFocus />
                        {errors.name && <div className="field-error">{errors.name}</div>}
                    </div>

                    <div className="field">
                        <label>البريد الإلكتروني</label>
                        <input type="email" placeholder="example@email.com" value={data.email} onChange={e => setData('email', e.target.value)} required />
                        {errors.email && <div className="field-error">{errors.email}</div>}
                    </div>

                    <div className="field">
                        <label>المسمى التدريبي (الدورة)</label>
                        <input type="text" placeholder="اسم الدورة التدريبية" value={data.course} onChange={e => setData('course', e.target.value)} required />
                        {errors.course && <div className="field-error">{errors.course}</div>}
                    </div>

                    <div className="field-row">
                        <div className="field">
                            <label>تاريخ الدورة</label>
                            <input type="date" value={data.course_date} onChange={e => setData('course_date', e.target.value)} required />
                            {errors.course_date && <div className="field-error">{errors.course_date}</div>}
                        </div>
                        <div className="field">
                            <label>التقدير العام</label>
                            <select value={data.degree} onChange={e => setData('degree', e.target.value)} required>
                                <option value="" disabled>اختر التقدير</option>
                                <option value="ممتاز">ممتاز</option>
                                <option value="جيد جداً">جيد جداً</option>
                                <option value="جيد">جيد</option>
                                <option value="مقبول">مقبول</option>
                            </select>
                            {errors.degree && <div className="field-error">{errors.degree}</div>}
                        </div>
                    </div>

                    <div className="field">
                        <label>صورة الطالب (اختياري)</label>
                        <input type="file" accept="image/*" onChange={e => setData('image', e.target.files[0])} />
                        {errors.image && <div className="field-error">{errors.image}</div>}
                    </div>

                    <div className="actions">
                        <button type="submit" className="btn btn-primary" disabled={processing}>
                            {processing ? 'جارٍ الحفظ...' : 'حفظ البيانات'}
                        </button>
                        <a href="/dashboard" className="btn btn-outline">إلغاء</a>
                    </div>
                </form>
            </div>
        </DashboardLayout>
    );
}
