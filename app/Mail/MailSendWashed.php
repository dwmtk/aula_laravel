<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSendWashed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = 
        "出張洗車完了のご連絡【　". $this->user->name ."様｜洗車日:" . date('Y/m/d',  strtotime($this->order->order_date)) . "　】";

        return $this->text('emails.washed')
        ->from('welcome@aula.email','sula')
        ->subject($subject)
        ->with([
            'order' => $this->order,
            'user' => $this->user
        ]);
    }
}
