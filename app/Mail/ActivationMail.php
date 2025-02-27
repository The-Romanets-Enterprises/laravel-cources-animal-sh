<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $activationUrl;

    public function __construct(string $activationUrl)
    {
        $this->activationUrl = $activationUrl;
    }

    public function build()
    {
        return $this->subject('Активация аккаунта')
            ->view('emails.activation')
            ->with(['activationUrl' => $this->activationUrl]);
    }
}
