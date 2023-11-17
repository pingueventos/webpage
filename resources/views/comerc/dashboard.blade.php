<h2>Comercial Dashboard</h2>

<a href="{{ route('todasSolicitacoes') }}">Solicitacoes de Festa</a><br><br>
<a href="{{ route('pacotes') }}">Pacotes de Comida</a><br><br>
<a href="{{ route('pacotescomida.index') }}">Adicionar Pacotes</a><br>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>