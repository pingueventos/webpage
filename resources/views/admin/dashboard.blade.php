@extends('anivers.layouts.app')

@section('content')
<br><h4 align="center">Admin Dashboard</h4><br><br>

<a href="{{ route('agendaadmin') }}">Agenda</a><br><br>
<a href="{{ route('todasSolicitacoesAdm') }}">Solicitacoes de Festa</a><br><br>
<a href="{{ route('pacotesAdmin') }}">Pacotes de Comida</a><br><br>
<a href="{{ route('listaRecomendacoesAdmin') }}">Recomendações pré-festa</a><br><br>
{{-- <a href="{{ route('resultadopesquisa') }}">Resultados: Pesquisa de Satisfação</a><br><br> --}}


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>
@endsection
