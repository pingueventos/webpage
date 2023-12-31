@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

<a href="{{  route('aniversdashboard')  }}" id="logout">Dashboard</a> <br><br>

<div class="tudo" align="center">
    
    <div class="pac_escolhido">
        <h4 align="center"><b>Pacote Escolhido </b></h4>
        <h4>{{ $solicitacao->pacotecomida}}</h4><br>
    


    <form action="{{ route('editar.pacote', ['id' => $solicitacao->id]) }}" method="get">
        @csrf
            <button type="submit" class="btn btn-primary btn-sm" id="botaopadrao">Editar</button><br><br>
    </form>
    </div>

    <br><br>
    <table class="tabela">
        <thead>
            <tr>
                <th scope="col">Descrição Comidas</th>
                <th scope="col">Descrição Bebidas</th>
                <th scope="col">Imagem 1</th>
                <th scope="col">Imagem 2</th>
                <th scope="col">Imagem 3</th>
                <th scope="col">Preço</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">{!! $solicitacao->comida_pacote !!}
                    </td>
                    <td scope="col">{!! $solicitacao->bebida_pacote !!}</td>
                    <td scope="col">
                        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $solicitacao->imagem1_pacote)}}" alt="{{ $solicitacao->pacotecomida }}">
                    </td>
                    <td scope="col">
                        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $solicitacao->imagem2_pacote)}}" alt="{{ $solicitacao->pacotecomida }}">
                    </td>
                    <td scope="col">
                        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $solicitacao->imagem3_pacote)}}" alt="{{ $solicitacao->pacotecomida }}">
                    </td>
                    <td scope="col">{{ $solicitacao->preco_pacote . " reais"}}</td>
                </tr>
            </tbody>
        </table>
</div>

@endsection
