@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

@if(auth()->id()==3)
    <a href="{{ route('listaRecomendacoesAdmin') }}" id="voltar">Voltar</a><br>
    <a href="{{ route('admindashboard') }}" id="logout">Dashboard</a>
@else
    <a href="{{ route('listaRecomendacoesComerc') }}" id="voltar">Voltar</a><br>
    <a href="{{ route('comercdashboard') }}" id="logout">Dashboard</a>
@endif

<br><br>
<div class="box_editrec" align="center">
<h4>Editar Recomendação</h4><br>

@if(auth()->id()==3)
    <form action="{{ route('atualizarRecomendacaoAdmin', $recomendacao->id )}}">
@else
    <form action="{{ route('atualizarRecomendacaoComerc', $recomendacao->id )}}">
@endif
    <input type="text" class="form-control" name="updatedRecomendation" value="{{ $recomendacao->recomendacao }}">
    <br><button class="btn btn-success btn" type="submit">Atualizar</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>

@endsection