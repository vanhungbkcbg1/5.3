<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test')
            //pass param to view
            ->with(['name'=>'vanhung','imagePath'=>public_path('embed.jpg')])
            //attach file
            ->attach(public_path('laravel authentication.docx'))
            //subject
            ->subject('Hello')
            ;
    }
}
