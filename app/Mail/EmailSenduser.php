<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSenduser extends Mailable
{
    use Queueable, SerializesModels;
    public $maildata;

    public function __construct()
    {
    }
    public function build()
    {
        return $this->markdown('admin.mailfb')
        ->subject('Test');
    }
}