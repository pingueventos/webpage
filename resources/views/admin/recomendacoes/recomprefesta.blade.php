@extends('anivers.layouts.app')

@section('content')

@if (auth()->id()==3)
    <a href="{{  route('admindashboard')  }}">Dashboard</a>
@else
    <a href="{{  route('comercdashboard')  }}">Dashboard</a>
@endif


<div class="container text-center">

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

<table class="table mt-5">
    <thead class="text-center">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Recomendação</th>
        <th scope="col">Ação</th>
        <th scope="col"></th>
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
