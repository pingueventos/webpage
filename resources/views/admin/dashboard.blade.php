@extends('anivers.layouts.app')

@section('content')

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

<div class="tudo" align="center">
    <br><h4 id="toptext">Admin Dashboard</h4>
    
    <div class="menu_comerc">
        <a href="{{ route('agendaadmin') }}">Agenda</a><br><br>
        <a href="{{ route('todasSolicitacoesAdm') }}">Solicitacoes de Festa</a><br><br>
        <a href="{{ route('pacotesAdmin') }}">Pacotes de Comida</a><br><br>
        <a href="{{ route('listaRecomendacoesAdmin') }}">Recomendações pré-festa</a><br><br>
        {{-- <a href="{{ route('resultadopesquisa') }}">Resultados: Pesquisa de Satisfação</a><br><br> --}}
    </div>
</div>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" id="logout">
    Logout</a>

</form>
@endsection
