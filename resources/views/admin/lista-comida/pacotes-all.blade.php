@extends('anivers.layouts.app')

@section('content')

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

@if(auth()->id() == 3)
<a href="{{  route('admindashboard')  }}" id="logout">Dashboard</a> <br><br>
@else
<a href="{{  route('comercdashboard')  }}" id="logout">Dashboard</a> <br><br>
@endif

    <div class="tudo">
        <div class="container text-center">
            <h3 align="center" id="toptext">Pacotes Comida</h3>
            <br>
            @if (auth()->id()==3)
                <a href="{{ route('pacotescomidaAdmin.index') }}" id="botaolista">Adicionar Pacotes</a><br><br>
            @else
                <a href="{{ route('pacotescomidaComerc.index') }}" id="botaolista">Adicionar Pacotes</a><br><br>
            @endif
            @if (isset($success))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
        </div>
        @endif
        <div class="d-flex justify-content-center">
            <table class="tabela">
                <thead>
                    <tr>
                        <th id="nomecol" scope="col">#</th>
                        <th id="nomecol" scope="col">Nome</th>
                        <th id="nomecol" scope="col">Descrição Comidas</th>
                        <th id="nomecol" scope="col">Descrição Bebidas</th>
                        <th id="nomecol" scope="col">Imagem 1</th>
                        <th id="nomecol" scope="col">Imagem 2</th>
                        <th id="nomecol" scope="col">Imagem 3</th>
                        <th id="nomecol" scope="col">Preço</th>
                        <th id="nomecol" scope="col">Editar</th>
                        <th id="nomecol" scope="col">Remover</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pacotes as $key => $pacote )
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $pacote->titulo}}</td>
                            <td scope="col">{!! $pacote->comidas !!}
                            </td>
                            <td scope="col">{!! $pacote->bebidas !!}</td>
                            <td scope="col">
                                <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $pacote->imagem1)}}" alt="{{ $pacote->titulo }}">
                            </td>
                            <td scope="col">
                                <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $pacote->imagem2)}}" alt="{{ $pacote->titulo }}">
                            </td>
                            <td scope="col">
                                <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $pacote->imagem3)}}" alt="{{ $pacote->titulo }}">
                            </td>
                            <td scope="col">{{ $pacote->preco . " reais"}}</td>
                            <td scope="col">
                                @if (auth()->id() == 3)<a href="{{  route('pacoteseditAdmin.index', $pacote->id) }}">
                                @else <a href="{{  route('pacoteseditComerc.index', $pacote->id) }}">
                                @endif
                                <button class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                                </a>
                            </td>
                            <td scope="col">
                                @if (auth()->id() == 3)
                                    <form action="{{ route('pacotesAdmin.delete', $pacote->id) }}" method="POST" style ="display:inline">
                                        @csrf
                                @else
                                    <form action="{{ route('pacotesComerc.delete', $pacote->id) }}" method="POST" style ="display:inline">
                                        @csrf
                               @endif
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
        @endif
    </div>


@endsection
