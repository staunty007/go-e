Welcome to your dashboard {{ Auth::user()->first_name }}

<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()">logout</a>
<form class="logout-form" method="POST" action="{{ route('logout') }}">
    {{ csrf_field()}}
</form>