@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

<a href="{{  route('aniversdashboard')  }}" id="logout">Dashboard</a> <br><br>

<br><br>

<div class="container">
    <h4 align="center" id="toptext">Recomendações Pré-Festa</h4>

<table class="tabela" align="center">
    <thead class="text-center">
    <tr>
        <th scope="col" id="nomecol">#</th>
        <th scope="col" id="nomecol">Recomendações</th>
    </tr>
    </thead>
    <tbody class="text-center">

        @foreach ( $recomendacoes as $key => $recomendacao )
        <tr>
            <td scope="col">{{ ++$key }}</td>
            <td scope="col">{{ $recomendacao->recomendacao }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

