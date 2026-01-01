<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function send(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
        Mail::send('emails.contact_template', ['data' => $data], function($message) use ($data) {
            $message->to('mohammed.masud460@gmail.com') 
                    ->subject('رسالة جديدة: ' . $data['subject']);
        });

        // رسالة في حالة النجاح
        return back()->with('success', 'تم إرسال رسالتك بنجاح! شكراً لتواصلك معنا.');

    } catch (\Exception $e) {
        // رسالة في حالة الفشل (مثلاً مشكلة في السيرفر أو إعدادات SMTP)
        return back()->with('error', 'نعتذر، حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة لاحقاً.');
    }
}
}