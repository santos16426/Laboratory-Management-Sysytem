<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCorporateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$total)
    {
        $this->content = $content;
        $this->total = $total;
    }

 

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('CorporateEmail.CorporateEmail')->with('content',$this->content)->with('total',$this->total);    
    }
}
  