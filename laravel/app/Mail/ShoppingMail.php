<?php

namespace App\Mail;

use App\Oder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//use App\Models\Oder;

class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $oder;
    public $orderdetail = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Oder $oder, $orderdetail)
    {
        //
        $this->oder = $oder;
        $this->orderdetail = $orderdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mail.shopping');
    }
}
