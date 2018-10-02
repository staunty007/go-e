<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject = "[Ticket ID: ".$this->data->ticket_id."] ".$this->data->title;
        return 
        $this
            ->subject($this->subject)
            ->withUser(auth()->user())
            ->withTicket($this->data)
            ->view('emails.tickets.ticket-info');
    }
}
