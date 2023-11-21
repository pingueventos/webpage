@extends('anivers.layouts.app')

@section('content')

<div class="header">    
    <img src="/css/images_css/logo.png" id="logo">
</div>

<div class="tudo">
        <br><h3 id="toptext">Área do Aniversariante</h3>

        <div class="areabotoes">
            <span class="botoes"><a href="{{ route('solicitacoes') }}" id="opc">Reservas
            <br>    
            <img src="/css/images_css/agenda.png" alt="">
            </a></span>
        
            <span class="botoes"><a href="{{ route('novafesta.index') }}" id="opc">Solicitar festa
            <br>    
            <img src="/css/images_css/bolo.png" alt="">
            </a></span>

            <span class="botoes">
            <a href="{{ route('verRecomendacao')}}" id="opc">Recomendações pré-festa
            <br>
            <img src="/css/images_css/livro.png" alt="">
            </a></span>
        
        </div>
    </div>

<br><br><br>
<form method="POST" action="{{ route('logout') }}" id="logout">
    @csrf
    <a style="color: white;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>

@endsection