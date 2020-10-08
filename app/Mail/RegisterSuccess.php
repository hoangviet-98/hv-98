<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterSuccess extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }


    public function build()
    {
        return $this->view('emails.email_register')->with([
            'name' => $this->name
        ]);
    }
}
