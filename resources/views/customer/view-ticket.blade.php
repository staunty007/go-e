@extends('customer.master')
@section('customer-section')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>{!! $ticket->message !!}</p>
                        <hr>
                        <p>Category: {{ $ticket->category->name }}</p>
                        <p>
                        @if ($ticket->status === 'Open')
                            Status: <span class="label label-success">{{ $ticket->status }}</span>
                        @else
                            Status: <span class="label label-danger">{{ $ticket->status }}</span>
                        @endif
                        </p>
                        <p>Created: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                    <div class="comments">
                        @foreach($comments as $comment)
                        
                        <div class="panel panel-{{ $ticket->user->id === $comment->user_id ? 'default':'primary' }}">
                            <div class="panel-heading">
                                {{ $comment->user->first_name }} 
                                {{ $comment->user->last_name }} 
                                <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                            </div>
                
                            <div class="panel-body">
                                {{ $comment->comment }}        
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <h5>Post a Comment <i class="fa fa-comment"></i></h5>
                        <form action="{{ route('ticket.comment') }}" method="POST" class="form">
                            @csrf

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection