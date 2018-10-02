<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketCommentMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailSubject;
    protected $owner;
    protected $commenter;
    protected $ticket;
    protected $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($owner, $commenter, $ticket , $comment)
    {
        $this->owner = $owner;
        $this->commenter = $commenter;
        $this->ticket = $ticket;
        $this->comment = $comment;

        // Compose the mail subject;
        $this->mailSubject = "RE: ".$this->ticket->title." (Ticket ID: ".$this->ticket->ticket_id.")";
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
                    ->withComment($this->comment)
                    ->withUser($this->owner)
                    ->withTicket($this->ticket)
                    ->view('emails.tickets.ticket-comments');
    }
}
