@extends('anivers.layouts.app')

@section('content')

@if(auth()->id()==3)
    <a href="{{ route('listaRecomendacoesAdmin') }}">Voltar</a><br>
    <a href="{{ route('admindashboard') }}">Dashboard</a>
@else
    <a href="{{ route('listaRecomendacoesComerc') }}">Voltar</a><br>
    <a href="{{ route('comercdashboard') }}">Dashboard</a>
@endif

<br><br>
<div class="container text-center">
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