@extends('anivers.layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Solicitações</h3>

            <table class="table mt-5">
                <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aniversariante</th>
                    <th scope="col">Nº de Convidados</th>
                    <th scope="col">Idade Comemorada</th>
                    <th scope="col">Data</th>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Pacote Escolhido</th>
                    <th scope="col">Status</th>
                    <th scope="col">Cancelar</th>
                    <th scope="col">Links</th>
                </tr>
                </thead>
                <tbody class="text-center">

                    @foreach ( $solicitacoes as $key => $solicitacao )
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $solicitacao->nome}}</td>
                        <td scope="col">{{ $solicitacao->numconvidados}}</td>
                        <td scope="col">{{ $solicitacao->idade }}</td>
                        <td scope="col">{{ $solicitacao->data }}</td>
                        <td scope="col">{{ $solicitacao->inicio+1 . 'h' }}</td>
                        <td scope="col">{{ $solicitacao->fim-1 . 'h'}}</td>
                        <td scope="col">
                            <form action="{{ route('show.pacote', ['id' => $solicitacao->id]) }}" method="get">
                            {{-- <form action="{{ route('editar.pacote', ['id' => $solicitacao->id]) }}" method="get"> --}}
                                @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">{{ $solicitacao->pacotecomida }}</button>
                            </form>
                        </td>
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
                        </td>
                        {{-- @if ($solicitacao->status !== 2) --}}

                        @if ($solicitacao->status === 0)
                            <form action="{{ route('cancelar', ['id' => $solicitacao->id]) }}" method="post">
                                @csrf
                                <td scope="col">
                                    <input type="hidden" name="novo_status" value="3">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                </td>
                            </form>
                        @elseif ($solicitacao->status === 1)
                            <form action="{{ route('cancelar', ['id' => $solicitacao->id]) }}" method="post">
                                @csrf
                                <td scope="col">
                                    <input type="hidden" name="novo_status" value="3">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                </td>
                            </form>
                        @else
                        <td scope="col"></td>
                        @endif

                        <td scope="col">
                        @if ($solicitacao->status === 1)
                        <a href="{{ route('forms.show', ['form'=>$solicitacao->id]) }}">Lista de convidados</a>
                        @elseif ($solicitacao->status === 4)
                        <a href="{{ route('pesquisadesatisfacao', ['id' => $solicitacao->id, 'user_id' => $solicitacao->user_id]) }}">Pesquisa de Satisfação</a>
                        @else
                        <p></p>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
@endsection

<a href="{{  route('aniversdashboard')  }}">Dashboard</a> <br><br>

<script>

    $(document).ready(function () {
        console.log('Diferença de preço: ');

    });

</script>
