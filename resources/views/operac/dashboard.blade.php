<h2>Operacional Dashboard</h2>


<a href="{{  route('festas.operac') }}">Visualizar Festas</a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>