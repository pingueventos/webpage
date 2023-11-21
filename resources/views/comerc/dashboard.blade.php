@extends('anivers.layouts.app')
@section('content')

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

<div class="corpo_comerc" align="center">
    <h2 id="toptext">Área Comercial</h2>
    
    <div class="menu_comerc" >
        <a href="{{ route('todasSolicitacoesComerc') }}">Solicitacoes de Festa</a><br><br>
        <a href="{{ route('pacotesComerc') }}">Pacotes de Comida</a><br><br>
        <a href="{{ route('pacotescomidaComerc.index') }}">Adicionar Pacotes</a><br><br>
        <a href="{{ route('listaRecomendacoesComerc') }}">Recomendações pré-festa</a><br><br>
        <a href="{{ route('agendacomerc') }}">Agenda</a><br>
    </div>
    
</div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 this.closest('form').submit();" id="logout">
        Logout</a>
    
    </form>


@endsection
