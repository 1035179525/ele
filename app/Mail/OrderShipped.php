<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $all;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($all)
    {
        //
        $this->all=$all;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('1035179525@qq.com')
            ->view('emails.order',["all"=>$this->all]);
    }
}
