<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification 
// implements ShouldQueue
{
    use Queueable;

    // public $queue = 'otp';
    public string $otp;
    /**
     * Create a new notification instance.
     */
    public function __construct($otp)
    {
        $this->otp = (string)$otp;
        // $this->otp = $otp ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('[Focus] Security Verification Code')
            ->greeting('Hello!')
            ->line('Your security verification code is:')
            ->line('**' . $this->otp . '**') // طباعة الـ OTP بخط عريض
            ->line('This code is valid for 2 minutes only.')
            ->line('If you did not request this, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
            'otp' => $this->otp
        ];
    }

 
// public function failed(\Throwable $exception)
// {
//     \Illuminate\Support\Facades\Log::error('=== الرمز السري للفشل هنا ===');
//     \Illuminate\Support\Facades\Log::error($exception->getMessage());
//     \Illuminate\Support\Facades\Log::error($exception->getTraceAsString());
// }
}
