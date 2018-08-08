<?php

namespace App\Mail;

use App\Models\EventPrize;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $prize;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPrize $prize)
    {
        //
        $this->prize=$prize;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("1035179525@qq.com")
            ->view('emails.event',['prize'=>$this->prize]);
    }
}
