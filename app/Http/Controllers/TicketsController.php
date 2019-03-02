<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\TicketCategory;
use App\Mail\TicketMailer;
use Mail;
use App\TicketComment;
use App\Mail\TicketCommentMail;
use App\User;
use App\Mail\TicketClosedMail;

class TicketsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customerTickets()
    {    
        $id = auth()->id();       
        $tickets = Ticket::where('user_id',$id)->with('category')->get();
        return view('customer.tickets', compact('tickets'));
    }

    public function openTicket()
    {
        $categories = TicketCategory::all();
        return view('customer.open-ticket', compact('categories'));
    }

    public function storeTicket(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);

        $ticket = new Ticket;
        $ticket->title = $request->title;
        $ticket->user_id = auth()->id();
        $ticket->ticket_id = strtoupper(str_random(10));
        $ticket->category_id = $request->category;
        $ticket->priority = $request->priority;
        $ticket->message = $request->message;
        $ticket->status = 'Open';
        $ticket->save();
        
        Mail::to(auth()->user()->email)->send(new TicketMailer($ticket));
        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    public function showTicket($ticket)
    {
        $ticket = Ticket::where('ticket_id',$ticket)->with('category')->firstOrFail();
        $comments = $ticket->comments;
        // return $comments;
        return view('customer.view-ticket', compact('ticket','comments'));
    }

    public function commentTicket(Request $request)
    {
        $this->validate($request, [
            "comment" => "required"
        ]);

        // Validation passes
        $comment = TicketComment::create([
            "ticket_id" => $request->ticket_id,
            "user_id" => auth()->id(),
            "comment" => $request->comment
        ]);

        // send a mail if the user commenting is not the ticket owner
        if($comment->ticket->user->id === auth()->id() || $comment->ticket->user->id !== auth()->id()) {
            $ticketOwner = User::find($comment->ticket->user->id);
            
            $commenter = auth()->id();
            $ticket = $comment->ticket;
            // return $ticket;
            Mail::to($ticketOwner->email)->send(new TicketCommentMail($ticketOwner, $commenter, $ticket, $comment));
        }

        return redirect()->back()->with("status", "Your comment has be submitted.");
    }

    // Admin All Tickets
    public function adminTickets()
    {
        $tickets = Ticket::with('category')->get();
        return view('users.admin.tickets.index', compact('tickets'));
    }

    // Admin Show Tickets
    public function adminShowTicket($ticket)
    {
        $ticket = Ticket::where('ticket_id',$ticket)->with('category')->firstOrFail();
        $comments = $ticket->comments;
        return view('users.admin.tickets.show',compact('ticket','comments'));
    }

    // Close Ticket
    public function closeTicket($ticket)
    {
        $ticket = Ticket::where('ticket_id',$ticket)->firstOrFail();
        $ticket->status = "Closed";
        $ticket->save();

        $ticketOwner = $ticket->user;
        // return $ticketOwner;
        Mail::to($ticketOwner->email)->send(new TicketClosedMail($ticket, $ticketOwner));
        return redirect()->back()->with("status", "The ticket has been closed.");
    }


    public function AgentTickets()
    {
        $id = auth()->id();       
        $tickets = Ticket::where('user_id',$id)->with('category')->get();
        return view('users.agent.tickets',compact('tickets'));
    }

    public function AgentOpenTicket()
    {
        $categories = TicketCategory::all();
        return view('users.agent.open-ticket', compact('categories'));
    }

    public function AgentStoreTicket(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);

        $ticket = new Ticket;
        $ticket->title = $request->title;
        $ticket->user_id = auth()->id();
        $ticket->ticket_id = strtoupper(str_random(10));
        $ticket->category_id = $request->category;
        $ticket->priority = $request->priority;
        $ticket->message = $request->message;
        $ticket->status = 'Open';
        $ticket->save();
        
        Mail::to(auth()->user()->email)->send(new TicketMailer($ticket));
        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    public function AgentShowTicket($ticket)
    {
        $ticket = Ticket::where('ticket_id',$ticket)->with('category')->firstOrFail();
        $comments = $ticket->comments;
        // return $comments;
        return view('users.agent.view-ticket', compact('ticket','comments'));
    }
}
