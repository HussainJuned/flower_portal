<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmationMail extends Mailable
{
    public $order;
    public $type;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $order
     */
    public function __construct($order,$type)
    {
        $this->order = $order;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notifications@floweret.ca')->markdown('email.order_confirmation');
    }
}
