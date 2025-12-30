<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Mpdf\Mpdf;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $templateNum;
    public $base64Image;

    /**
     * Constructor يستقبل البيانات الثلاثة الضرورية
     */
    public function __construct($student, $templateNum, $base64Image)
    {
        $this->student = $student;
        $this->templateNum = $templateNum;
        $this->base64Image = $base64Image;
    }

    /**
     * إعداد محتوى الرسالة (القالب الزجاجي الذي صممناه)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.certificate_notification', // تأكد من وجود هذا الملف
        );
    }

    /**
     * توليد الـ PDF وإرفاقه (بأسلوب الـ Controller)
     */
    public function attachments(): array
    {
        // إعداد mPDF بنفس إعدادات الـ Controller بالضبط
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
            'tempDir' => sys_get_temp_dir(),
        ]);

        $mpdf->SetDirectionality('rtl');

        // استدعاء ملف الـ Blade المقابل للقالب
        $html = view('certificates.pdf.download' . $this->templateNum, [
            'student' => $this->student,
            'backgroundImage' => $this->base64Image
        ])->render();

        $mpdf->WriteHTML($html);
        
        // إخراج الملف كـ String للإرسال
        $pdfOutput = $mpdf->Output('', 'S');

        return [
            Attachment::fromData(fn () => $pdfOutput, "Certificate_{$this->student->name}.pdf")
                ->withMime('application/pdf'),
        ];
    }
}