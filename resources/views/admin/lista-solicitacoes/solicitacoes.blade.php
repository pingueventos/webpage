@extends('anivers.layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Solicitações</h3>


            <table class="table mt-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aniversariante</th>
                    <th scope="col">Número de Convidados</th>
                    <th scope="col">Idade Comemorada</th>
                    <th scope="col">Início da Festa</th>
                    <th scope="col">Término da Festa</th>
                    <th scope="col">Pacote de comidas</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>

                    @foreach ( $solicitacoes as $key => $solicitacao )
                    <tr> 
                    {{-- @if ($solicitacao->id === Auth::user(id)) --}}
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $solicitacao->nome}}</td>
                        <td scope="col">{{ $solicitacao->numconvidados}}</td>
                        <td scope="col">{{ $solicitacao->idade }}</td>
                        <td scope="col">{{ $solicitacao->start }}</td>
                        <td scope="col">{{ $solicitacao->end }}</td>
                        <td scope="col">{{ $solicitacao->pacotecomida }}</td>
                        <td scope="col">
                            @if ($solicitacao->status === 0)
                                <p>Em espera</a></td>
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
                                <form action="{{ route('statusAprovado', ['id' => $solicitacao->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="novo_status" value="1">
                                <button type="submit" class="btn btn-success btn-sm">Aprovar</button>
                            </form>
                            </td>
                            <td scope="col">   
                            <form action="{{ route('statusAprovado', ['id' => $solicitacao->id]) }}" method="post">
                            @csrf            
                                <input type="hidden" name="novo_status" value="2">
                                <button type="submit" class="btn btn-danger btn-sm">Negar</button>
                            </td>
                            </form>
                            
                            @elseif ($solicitacao->status === 1)
                            <form action="{{ route('statusAprovado', ['id' => $solicitacao->id]) }}" method="post">
                                @csrf
                                <td scope="col">            
                                    <input type="hidden" name="novo_status" value="3">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                </td>
                            </form>
                            @elseif ($solicitacao->status === 2)
                            <td></td>
                            @endif
                        </td>

                
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection

<a href="{{  route('admindashboard')  }}">Dashboard</a> <br><br>