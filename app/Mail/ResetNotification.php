<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($name='テスト', $text='テストです。')
    {
        $this->title = sprintf('%さん、ありがとうございます。', $name);
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.passwordReset_notification_html')
                    ->text('emails.passwordReset_notification')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                    ]);
    }
}
