@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

@if (auth()->id()==3)
    <a href="{{  route('admindashboard')  }}" id="logout">Dashboard</a>
@else
    <a href="{{  route('comercdashboard')  }}" id="logout">Dashboard</a>
@endif

<div class="corpo_recadmin" align="center">

<div class="box_rec">
    <h4>Recomendações pré-festa</h4>
    
    @if (auth()->id()==3)
        <form action="{{ route('adicionarRecomendacaoAdmin') }}" method="get">
    @else
        <form action="{{ route('adicionarRecomendacaoComerc') }}" method="get">
    @endif
        @csrf <br>
        {{-- <div class="container text-center" > --}}
            <input type="text" name="novaRecomendacao" id="novaRecomendacao">
        <button class="btn btn-success btn-sm" type="submit">Adicionar</button>
        </form>
    
        @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
    @endif
</div>

<table class="tabela">
    <thead class="text-center">
    <tr>
        <th id="nomecol" scope="col">#</th>
        <th id="nomecol" scope="col">Recomendação</th>
        <th id="nomecol" scope="col">Editar</th>
        <th id="nomecol" scope="col">Apagar</th>
    </tr>
    </thead>

    <tbody>
        @php
            $contador = 0;
        @endphp
        @foreach ($recomendacoes as $recomendacao)
            <tr class="text-center">
                <td scope="col"> {{++$contador}}</td>
                <td scope="col"> {{$recomendacao->recomendacao}}</td>
                <td scope="col">
                    @if (auth()->id()==3)
                        <a href="{{  route('editarRecomendacaoAdmin', $recomendacao->id) }}">
                    @else
                        <a href="{{  route('editarRecomendacaoComerc', $recomendacao->id) }}">
                    @endif
                        <button class="btn btn-primary btn-sm">Editar</button>
                        </a>
                </td>
               <td>
                    @if (auth()->id()==3)
                        <a href="{{  route('apagarRecomendacaoAdmin', $recomendacao->id) }}">
                    @else
                        <a href="{{  route('apagarRecomendacaoComerc', $recomendacao->id) }}">
                    @endif
                        <button class="btn btn-danger btn-sm">Apagar</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
</div>
