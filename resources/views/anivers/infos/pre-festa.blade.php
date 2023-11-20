@extends('anivers.layouts.app')

@section('content')

<a href="{{  route('aniversdashboard')  }}">Dashboard</a> <br><br>

<br><br>

<div class="container">
    <h4 align="center">Recomendações Pré-Festa</h4>

<table class="table mt-5">
    <thead class="text-center">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Recomendações</th>
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

