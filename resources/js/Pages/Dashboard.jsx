import { useState } from 'react';
import { Head, Link, router, usePage } from '@inertiajs/react';
import DashboardLayout from '@/Layouts/DashboardLayout';

export default function Dashboard({ students }) {
    const { flash } = usePage().props;
    const [active, setActive] = useState(Math.floor(students.length / 2));
    const gap = 150;

    function getItemStyle(index) {
        const diff = index - active;
        const abs = Math.abs(diff);
        if (diff === 0) {
            return { transform: 'translateX(-50%)', zIndex: 10, filter: 'none', opacity: 1, transition: '0.5s ease-in-out' };
        }
        const sign = diff > 0 ? 1 : -1;
        return {
            transform: `translateX(calc(-50% + ${sign * gap * abs}px)) scale(${1 - 0.2 * abs}) perspective(16px) rotateY(${sign > 0 ? -1 : 1}deg)`,
            zIndex: -abs,
            filter: 'blur(5px)',
            opacity: abs > 2 ? 0 : 0.6,
            transition: '0.5s ease-in-out',
        };
    }

    function handleDelete(id) {
        if (confirm('هل أنت متأكد من حذف هذا المستفيد؟')) {
            router.delete(`/dashboard/${id}`);
        }
    }

    return (
        <DashboardLayout>
            <Head title="قائمة الطلاب" />
            <style>{`
                .dash-container {
                    max-width: 1200px;
                    margin: 50px auto;
                    text-align: center;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                .dash-container h2 { color: #1e1b4b; font-size: 1.8rem; margin-bottom: 15px; }
                .btn-add {
                    background: #4f46e5;
                    color: white;
                    padding: 10px 25px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: bold;
                    margin-bottom: 40px;
                    display: inline-block;
                    transition: 0.3s;
                }
                .btn-add:hover { background: #4338ca; }
                .slider {
                    position: relative;
                    width: 100%;
                    height: 450px;
                    margin-top: 20px;
                    overflow: visible;
                }
                .card-item {
                    position: absolute;
                    width: clamp(220px, 60vw, 280px);
                    height: 380px;
                    background: #fff;
                    border-radius: 15px;
                    padding: 25px;
                    left: 50%;
                    top: 0;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    box-sizing: border-box;
                    align-items: center;
                    text-align: center;
                }
                .student-img {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    object-fit: cover;
                    border: 4px solid #fff;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
                    margin-bottom: 15px;
                    transition: transform 0.3s, border-color 0.3s;
                }
                .student-img:hover { transform: scale(1.05); border-color: #4f46e5; }
                .card-item h3 { font-size: 1.3rem; color: #333; margin: 8px 0; font-weight: bold; }
                .card-item p { font-size: 0.9rem; color: #555; margin: 3px 0; }
                .card-actions { display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; margin-top: 10px; }
                .edit-link { color: #4f46e5; font-weight: bold; text-decoration: none; font-size: 0.85rem; }
                .cert-btn { background: #4f46e5; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 0.8rem; }
                .delete-btn { color: #dc2626; background: none; border: none; cursor: pointer; font-weight: bold; font-size: 0.85rem; font-family: inherit; }
                .nav-btn {
                    position: absolute;
                    top: 45%;
                    transform: translateY(-50%);
                    color: #4f46e5;
                    background: white;
                    border: 2px solid #4f46e5;
                    border-radius: 50%;
                    width: 50px;
                    height: 50px;
                    font-size: 25px;
                    cursor: pointer;
                    z-index: 100;
                    transition: 0.3s;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .nav-btn:hover { background: #4f46e5; color: white; }
                .btn-prev { left: 5%; }
                .btn-next { right: 5%; }
                .flash-success {
                    background: #d4edda; color: #155724; border: 1px solid #c3e6cb;
                    padding: 12px 20px; border-radius: 10px; margin-bottom: 20px;
                    font-size: 14px; font-weight: 600;
                }
                @media (max-width: 768px) {
                    .btn-prev { left: 2%; }
                    .btn-next { right: 2%; }
                    .card-item { width: 220px; }
                }
            `}</style>

            <div className="dash-container">
                {flash?.success && <div className="flash-success">{flash.success}</div>}

                <h2>قائمة الطلاب</h2>
                <Link href="/students" className="btn-add">إضافة طالب +</Link>

                <div className="slider">
                    {students.length === 0 ? (
                        <div className="card-item" style={{ transform: 'translateX(-50%)', zIndex: 10, opacity: 1 }}>
                            <div>
                                <h3>لا يوجد بيانات</h3>
                                <p>ابدأ بإضافة طلاب جدد</p>
                            </div>
                        </div>
                    ) : (
                        students.map((student, index) => (
                            <div key={student.id} className="card-item" style={getItemStyle(index)}>
                                <div style={{ display: 'flex', flexDirection: 'column', alignItems: 'center' }}>
                                    <img
                                        className="student-img"
                                        src={student.image ? `/storage/${student.image}` : '/image/avtare1.png'}
                                        alt={student.name}
                                    />
                                    <h3>{student.name}</h3>
                                    <p><strong>الدورة:</strong> {student.course}</p>
                                    <p><strong>الدرجة:</strong> {student.degree}</p>
                                </div>
                                <div className="card-actions">
                                    <Link href={`/students/edit/${student.id}`} className="edit-link">تعديل</Link>
                                    <Link href={`/certificates/gallery/${student.id}`} className="cert-btn">إصدار شهادة</Link>
                                    <button className="delete-btn" onClick={() => handleDelete(student.id)}>حذف</button>
                                </div>
                            </div>
                        ))
                    )}

                    {students.length > 1 && (
                        <>
                            <button className="nav-btn btn-prev" onClick={() => setActive(a => Math.max(a - 1, 0))}>‹</button>
                            <button className="nav-btn btn-next" onClick={() => setActive(a => Math.min(a + 1, students.length - 1))}>›</button>
                        </>
                    )}
                </div>
            </div>
        </DashboardLayout>
    );
}
