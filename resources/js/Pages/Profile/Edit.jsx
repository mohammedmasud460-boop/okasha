import { Head, useForm, usePage } from '@inertiajs/react';
import DashboardLayout from '@/Layouts/DashboardLayout';

export default function ProfileEdit({ user }) {
    const { flash } = usePage().props;

    const profileForm = useForm({
        name: user?.name ?? '',
        email: user?.email ?? '',
    });

    const passwordForm = useForm({
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const deleteForm = useForm({ password: '' });

    function updateProfile(e) {
        e.preventDefault();
        profileForm.patch('/profile');
    }

    function updatePassword(e) {
        e.preventDefault();
        passwordForm.put('/password', {
            onSuccess: () => passwordForm.reset(),
        });
    }

    function deleteAccount(e) {
        e.preventDefault();
        if (confirm('هل أنت متأكد؟ سيتم حذف جميع البيانات نهائياً.')) {
            deleteForm.delete('/profile', { errorBag: 'userDeletion' });
        }
    }

    return (
        <DashboardLayout showLogout>
            <Head title="إعدادات الملف الشخصي" />
            <style>{`
                .profile-container { max-width: 850px; margin: 40px auto; padding: 0 20px; }
                .page-header { text-align: center; margin-bottom: 30px; }
                .page-header h2 { font-size: 26px; color: #4f46e5; font-weight: 800; }
                .card {
                    background: rgba(255,255,255,0.7);
                    backdrop-filter: blur(8px);
                    border: 1px solid rgba(255,255,255,0.5);
                    border-radius: 20px;
                    padding: 30px;
                    margin-bottom: 25px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
                }
                .card h3 { font-size: 18px; color: #4f46e5; margin-bottom: 8px; display: flex; align-items: center; gap: 8px; }
                .card-danger h3 { color: #dc2626; }
                .card .desc { color: #6b7280; font-size: 13px; margin-bottom: 20px; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 10px; }
                .field { margin-bottom: 15px; }
                .field label { display: block; margin-bottom: 6px; font-size: 14px; font-weight: 600; color: #374151; }
                .field input {
                    width: 100%;
                    padding: 12px 15px;
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    font-size: 14px;
                    background: white;
                    transition: 0.3s;
                    box-sizing: border-box;
                    font-family: inherit;
                }
                .field input:focus { outline: none; border-color: #4f46e5; box-shadow: 0 0 0 4px rgba(79,70,229,0.1); }
                .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
                .actions { display: flex; gap: 12px; align-items: center; margin-top: 10px; flex-wrap: wrap; }
                .btn { padding: 10px 25px; border-radius: 10px; border: none; font-size: 14px; font-weight: bold; cursor: pointer; transition: 0.3s; font-family: inherit; }
                .btn-primary { background: #4f46e5; color: white; }
                .btn-primary:hover { background: #4338ca; transform: translateY(-2px); }
                .btn-primary:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
                .btn-danger { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
                .btn-danger:hover { background: #dc2626; color: white; }
                .status-success { background: #ecfdf5; color: #065f46; border: 1px solid #d1fae5; padding: 10px; border-radius: 10px; margin-bottom: 15px; text-align: center; font-size: 14px; }
                .status-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; padding: 10px; border-radius: 10px; margin-bottom: 15px; text-align: center; font-size: 14px; }
                .note { background: #fffbeb; border: 1px solid #fef3c7; color: #92400e; padding: 15px; border-radius: 10px; font-size: 13px; margin-bottom: 15px; }
                .field-error { color: #dc2626; font-size: 12px; margin-top: 4px; }
                @media (max-width: 640px) { .grid-2 { grid-template-columns: 1fr; } }
            `}</style>

            <div className="profile-container">
                <div className="page-header">
                    <h2>إعدادات الملف الشخصي</h2>
                </div>

                {/* بطاقة معلومات الجهة */}
                <div className="card">
                    <h3>👤 معلومات الجهة</h3>
                    <p className="desc">تعديل اسم الجهة والبريد الإلكتروني المعتمد.</p>

                    {flash?.status === 'profile-updated' && <div className="status-success">تم التحديث بنجاح.</div>}

                    <form onSubmit={updateProfile}>
                        <div className="field">
                            <label>اسم الجهة</label>
                            <input type="text" value={profileForm.data.name} onChange={e => profileForm.setData('name', e.target.value)} required />
                            {profileForm.errors.name && <div className="field-error">{profileForm.errors.name}</div>}
                        </div>
                        <div className="field">
                            <label>البريد الإلكتروني</label>
                            <input type="email" value={profileForm.data.email} onChange={e => profileForm.setData('email', e.target.value)} required />
                            {profileForm.errors.email && <div className="field-error">{profileForm.errors.email}</div>}
                        </div>
                        <div className="actions">
                            <button type="submit" className="btn btn-primary" disabled={profileForm.processing}>
                                {profileForm.processing ? 'جارٍ الحفظ...' : 'حفظ التعديلات'}
                            </button>
                        </div>
                    </form>
                </div>

                {/* بطاقة أمان الحساب */}
                <div className="card">
                    <h3>🛡️ أمان الحساب</h3>
                    <p className="desc">تحديث كلمة المرور لزيادة الأمان.</p>

                    {flash?.status === 'password-updated' && <div className="status-success">تم تغيير كلمة المرور.</div>}
                    {passwordForm.errors.current_password && <div className="status-error">{passwordForm.errors.current_password}</div>}

                    <form onSubmit={updatePassword}>
                        <div className="field">
                            <label>كلمة المرور الحالية</label>
                            <input type="password" value={passwordForm.data.current_password} onChange={e => passwordForm.setData('current_password', e.target.value)} required />
                        </div>
                        <div className="grid-2">
                            <div className="field">
                                <label>كلمة المرور الجديدة</label>
                                <input type="password" value={passwordForm.data.password} onChange={e => passwordForm.setData('password', e.target.value)} required />
                                {passwordForm.errors.password && <div className="field-error">{passwordForm.errors.password}</div>}
                            </div>
                            <div className="field">
                                <label>تأكيد الكلمة</label>
                                <input type="password" value={passwordForm.data.password_confirmation} onChange={e => passwordForm.setData('password_confirmation', e.target.value)} required />
                            </div>
                        </div>
                        <div className="actions">
                            <button type="submit" className="btn btn-primary" disabled={passwordForm.processing}>
                                {passwordForm.processing ? 'جارٍ التحديث...' : 'تحديث الأمان'}
                            </button>
                        </div>
                    </form>
                </div>

                {/* منطقة الخطر */}
                <div className="card card-danger" style={{ border: '1px solid rgba(220,38,38,0.3)' }}>
                    <h3 style={{ color: '#dc2626' }}>⚠️ منطقة الخطر</h3>
                    <p className="desc">حذف الحساب بشكل نهائي من المنصة.</p>
                    <div className="note">
                        تحذير: سيؤدي هذا الإجراء إلى مسح كافة الطلاب والشهادات المرتبطة بهذا الحساب.
                    </div>
                    <form onSubmit={deleteAccount}>
                        <div className="field">
                            <input type="password" placeholder="أدخل كلمة المرور للتأكيد" value={deleteForm.data.password} onChange={e => deleteForm.setData('password', e.target.value)} required />
                            {deleteForm.errors.password && <div className="field-error">{deleteForm.errors.password}</div>}
                        </div>
                        <div className="actions">
                            <button type="submit" className="btn btn-danger" disabled={deleteForm.processing}>
                                {deleteForm.processing ? 'جارٍ الحذف...' : 'حذف الحساب نهائياً'}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </DashboardLayout>
    );
}
