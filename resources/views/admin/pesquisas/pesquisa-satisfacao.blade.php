@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

<a href="{{  route('admindashboard')  }}" id="logout">Dashboard</a> <br><br>

    <div class="tudo" align="center">
        <h4 id="toptext">Resultado: Pesquisa de Satisfação</h4>

        <div class="comentarios">
            <p>O que achou do nosso espaço?</p>
            <p><b>{{$pesquisa->questao1}}</b></p><br>
            <p>O que achou da nossa comida?</p>
            <p><b>{{$pesquisa->questao2}}</b></p><br>
            <p>O que achou do nosso atendimento?</p>
            <p><b>{{$pesquisa->questao3}}</b></p><br>
            <p>O que achou do nosso site?</p>
            <p><b>{{$pesquisa->questao4}}</b></p><br>
            <p>Comentário</p>
            <p><b>{{$pesquisa->pesquisa}}</b></p>
        </div>
    </div>
@endsection
