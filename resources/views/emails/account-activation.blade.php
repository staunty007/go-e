Welcome {{ $mailie->first_name }}

<p>Please click <a href='{{ url("registration/activate/$mailie->access_token") }}'>Here </a> to activate your account</p>