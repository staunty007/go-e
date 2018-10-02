<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
    <p style="border: 1px dashed #000; padding: 1em; word-wrap:break-word">
        {{ $comment->comment }}
    </p>

    ---
    <p>Replied by: {{ $user->name or $user->first_name ." ".$user->last_name }}</p>

    <p>Title: {{ $ticket->title }}</p>
    <p>Ticket ID: {{ $ticket->ticket_id }}</p>
    <p>Status: {{ $ticket->status }}</p>

    <p>
        You can view the ticket at any time at <a href="{{ url('tickets/'. $ticket->ticket_id) }}">{{ url('tickets/'. $ticket->ticket_id) }}</a>
    </p>

</body>
</html>