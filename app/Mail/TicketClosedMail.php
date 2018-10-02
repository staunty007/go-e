<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketClosedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $mailSubject;
    public $ticket;
    public $ticketOwner;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $ticketOwner)
    {
        $this->ticket = $ticket;
        $this->ticketOwner = $ticketOwner;
        $this->mailSubject = "RE:" .$this->ticket->title." (TICKET ID: ".$this->ticket->ticket_id." ) has been closed";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mailSubject)
                    ->from('support@goenergee.com')
                    ->view('emails.tickets.ticket-status', compact($this->ticket,$this->ticketOwner));
    }
}
