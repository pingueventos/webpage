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

        <h3 align="center" class="mt-5">Solicitações</h3>


            <table class="tabela">
                <thead>
                <tr>
                    <th id="nomecol" scope="col">#</th>
                    <th id="nomecol" scope="col">Aniversariante</th>
                    <th id="nomecol" scope="col">Número de Convidados</th>
                    <th id="nomecol" scope="col">Data</th>
                    <th id="nomecol" scope="col">Idade Comemorada</th>
                    <th id="nomecol" scope="col">Início da Festa</th>
                    <th id="nomecol" scope="col">Fim da Festa</th>
                    <th id="nomecol" scope="col">Pacote de comidas</th>
                    <th id="nomecol" scope="col">Status</th>
                    <th id="nomecol" scope="col">Aprovar</th>
                    <th id="nomecol" scope="col">Negar</th>
                </tr>
                </thead>

                <tbody>

                    @foreach ( $solicitacoes as $key => $solicitacao )
                    <tr>
                    {{-- @if ($solicitacao->id === Auth::user(id)) --}}
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $solicitacao->nome}}</td>
                        <td scope="col">{{ $solicitacao->numconvidados}}</td>
                        <td scope="col">{{ $solicitacao->data}}</td>
                        <td scope="col">{{ $solicitacao->idade }}</td>
                        <td scope="col">{{ $solicitacao->inicio + 1 }}</td>
                        <td scope="col">{{ $solicitacao->fim - 1 }}</td>
                        <td scope="col">{{ $solicitacao->pacotecomida }}</td>
                        <td scope="col">
                            @if ($solicitacao->status === 0)
                                <p>Solicitado</a></td>
                            @elseif ($solicitacao->status === 1)
                                <p class="text-success">Aprovada</p>
                            @elseif ($solicitacao->status === 2)
                                <p class="text-danger">Negada</p>
                            @elseif ($solicitacao->status === 3)
                                <p class="text-danger">Cancelada</p>
                            @else
                                <p class="text-secondary">Finalizada</p>
                            @endif

                            @if ($solicitacao->status === 0)
                            <td scope="col">
                                @if(auth()->id()==3)
                                    <form action="{{ route('statusAdmin', ['id' => $solicitacao->id]) }}" method="post">
                                @else
                                    <form action="{{ route('statusComerc', ['id' => $solicitacao->id]) }}" method="post">
                                @endif
                                @csrf
                                <input type="hidden" name="novo_status" value="1">
                                <button type="submit" class="btn btn-success btn-sm">Aprovar</button>
                            </form>
                            </td>
                            <td scope="col">
                                @if(auth()->id()==3)
                                    <form action="{{ route('statusAdmin', ['id' => $solicitacao->id]) }}" method="post">
                                @else
                                    <form action="{{ route('statusComerc', ['id' => $solicitacao->id]) }}" method="post">
                                @endif
                                @csrf
                                <input type="hidden" name="novo_status" value="2">
                                <button type="submit" class="btn btn-danger btn-sm">Negar</button>
                            </td>
                            </form>

                            @elseif ($solicitacao->status === 1)
                                @if(auth()->id()==3)
                                    <form action="{{ route('statusAdmin', ['id' => $solicitacao->id]) }}" method="post">
                                @csrf
                                <td scope="col">
                                    <input type="hidden" name="novo_status" value="3">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                </td>
                                    </form>
                                @endif
                            @elseif ($solicitacao->status === 2)
                            <td></td>
                            @elseif ($solicitacao->status == 5 && auth()->id() == 3)
                                <td><a href="{{ route('resultadospesquisa', ['id' => $solicitacao->id]) }}">Pesquisa de satisfação</a></td>
                            @endif
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('falha'))
    <div class="alert alert-danger">
        {{ session('falha') }}
    </div>
    @endif

@endsection
