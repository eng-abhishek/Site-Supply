<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class bookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $orderId='';
    public $invoiceName='';
    public function __construct($orderId,$invoiceName)
    {
     $this->orderId=$orderId;
     $this->invoiceName=$invoiceName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     return $this->subject('Site Supply Order Id')->view('email.bookingConfirmation')->attach(asset('/uploads/invoices/'. $this->invoiceName), [
                         'as' =>  $this->invoiceName,
                         'mime' => 'application/pdf',
                    ]);

       // view('emails.myDemoMail')
       //              ->attach(public_path('pdf/sample.pdf'), [
       //                   'as' => 'sample.pdf',
       //                   'mime' => 'application/pdf',
       //              ]);

    //attach(public_path().'/uploads/invoices/'.$invoiceName)

    }
}

