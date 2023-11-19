@extends('anivers.layouts.app')

@section('content')@if(auth()->id() == 3)
<a href="{{  route('admindashboard')  }}">Dashboard</a> <br><br>
@else 
<a href="{{  route('comercdashboard')  }}">Dashboard</a> <br><br>
@endif

    <div class="container text-center">
        <h3 align="center" class="mt-5">Pacotes Comida</h3>
        <br>
        @if (auth()->id()==3)
            <a href="{{ route('pacotescomidaAdmin.index') }}">Adicionar Pacotes</a><br>
        @else
            <a href="{{ route('pacotescomidaComerc.index') }}">Adicionar Pacotes</a><br>
        @endif

        @if (isset($success))
            <div class="alert alert-success">
                {{ $success }}
            </div>
        
    </div>
    @endif

    <div class="d-flex justify-content-center">
        <table class="table mt-3 mx-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição Comidas</th>
                    <th scope="col">Descrição Bebidas</th>
                    <th scope="col">Imagem 1</th>
                    <th scope="col">Imagem 2</th>
                    <th scope="col">Imagem 3</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Apagar</th>
                    <th scope="col"></th>
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
                            @if (auth()->id() == 3)<form action="{{ route('pacotesAdmin.delete', $pacote->id) }}" method="POST" style ="display:inline">
                            @else <form action="{{ route('pacotesComerc.delete', $pacote->id) }}" method="POST" style ="display:inline"> @csrf
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




@endsection