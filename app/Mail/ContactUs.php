<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name='';
    public $email='';
    public $contactNo='';
    public $des='';
    public function __construct($name,$email,$contactNo,$des)
    {
    $this->name=$name;
    $this->email=$email;
    $this->contactNo=$contactNo;
    $this->des=$des;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->subject('Site Supply Order Status')->view('email.contactUs');
    }
}
