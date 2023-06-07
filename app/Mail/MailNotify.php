<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(){
        return $this->subject('Laravel Api notify')->view('mail.mail_form')->with('data', $this->data);
    }
}
