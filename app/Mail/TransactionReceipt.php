<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $user_type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $user_type)
    {
        $this->data = $data;
        switch ($user_type) {
            case 'PREPAID':
                $this->user_type = "Prepaid";
                break;

            default:
                $this->user_type = "Postpaid";
                break;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('GOENERGEE TRANSACTION RECEIPT')
            ->from('payments@goenergee.com')
            ->view('emails.receipt')->withData($this->data)->withUser($this->user_type);
    }
}
