@extends('anivers.layouts.app')
@section('content')

<h2>Comercial Dashboard</h2>

<a href="{{ route('todasSolicitacoesComerc') }}">Solicitacoes de Festa</a><br><br>
<a href="{{ route('pacotesComerc') }}">Pacotes de Comida</a><br><br>
<a href="{{ route('pacotescomidaComerc.index') }}">Adicionar Pacotes</a><br>
<a href="{{ route('listaRecomendacoesComerc') }}">Recomendações pré-festa</a><br><br>
<a href="{{ route('agendacomerc') }}">Agenda</a><br>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>

@endsection
