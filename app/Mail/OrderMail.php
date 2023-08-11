<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

  
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('mitchele18@gmail.com','CRO')->subject('Order Made ')->view('emails.order')->with('data', $this->data);
    }


    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Order Mail',
    //     );
    // }

 
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

 
    // public function attachments()
    // {
    //     return [];
    // }
}
