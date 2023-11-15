<h2>Comercial Dashboard</h2>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>