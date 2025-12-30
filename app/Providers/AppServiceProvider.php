<?php

namespace App\Providers;
    use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    


public function boot(): void
{
    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage)
            ->subject('تفعيل حسابك - منصة شهادتي')
            ->greeting('مرحباً بك!')
            ->line('شكراً لتسجيلك معنا. يرجى الضغط على الزر أدناه لتفعيل حسابك.')
            ->action('تفعيل البريد الإلكتروني', $url)
            ->line('إذا لم تقم بإنشاء حساب، يمكنك تجاهل هذه الرسالة.')
            ->salutation('مع تحيات فريق العمل');
    });
    }
}
