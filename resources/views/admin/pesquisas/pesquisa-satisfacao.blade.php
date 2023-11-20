@extends('anivers.layouts.app')

@section('content')

    <div class="container">
        <br><br><h4 align="center">Resultado: Pesquisa de Satisfação</h4>

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
@endsection
