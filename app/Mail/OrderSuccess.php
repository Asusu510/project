<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    private $shopping;
    private $order;
    private $c_name;



    public function __construct($shopping,$order,$c_name)
    {

        $this->shopping = $shopping;
        $this->order = $order;
        $this->c_name = $c_name;
  


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order')->with([

            'shopping' => $this->shopping,
            'order' => $this->order,
            'c_name' => $this->c_name

        ]);

    }
}
