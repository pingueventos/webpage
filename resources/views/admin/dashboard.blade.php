<h2>Admin Dashboard</h2>

<a href="{{ route('agenda') }}">Agenda</a><br><br>
<a href="{{ route('aprovada') }}">Festas Aprovadas</a><br><br>
<a href="{{ route('todasSolicitacoes') }}">Solicitacoes de Festa</a><br><br>
<a href="{{ route('pacotes') }}">Pacotes de Comida</a><br>
<a href="{{ route('pacotescomida.index') }}">Adicionar Pacotes</a><br>
<a href="{{ route('editarrecomendacoes') }}">Recomendoes Pré-Festa</a><br><br>
<a href="{{ route('resultadopesquisa') }}">Resultados: Pesquisa de Satisfação</a><br><br>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>