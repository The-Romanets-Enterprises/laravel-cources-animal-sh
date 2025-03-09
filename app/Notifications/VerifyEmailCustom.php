<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class VerifyEmailCustom extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        $mail = (new MailMessage)
            ->subject(__('messages.auth.verify_email_subject'))
            ->line(__('messages.auth.verify_email_line1'))
            ->action(__('messages.auth.verify_email_action'), $verificationUrl)
            ->line(__('messages.auth.verify_email_line2'));

        // Логируем только URL верификации
        Log::info('Verification email URL for: ' . $notifiable->email . ': ' . $verificationUrl);

        return $mail;
    }

    protected function verificationUrl($notifiable)
    {
        return \Illuminate\Auth\Notifications\VerifyEmail::verificationUrl($notifiable);
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
        ];
    }
}
