@extends('anivers.layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Solicitações</h3>


            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aniversariante</th>
                        <th scope="col">Data</th>
                        <th scope="col">Início da Festa</th>
                        <th scope="col">Término da Festa</th>
                        <th scope="col">Pacote de comidas</th>
                        <th scope="col">Confirmados</th>
                        <th scope="col">Ação</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $contador=0;
                    @endphp
                    @foreach ( $solicitacoes->sortBy('inicio')->sortBy('data') as $solicitacao )
                        <tr>
                            @if ($solicitacao->status == 1)
                                <td scope="col">{{ ++$contador }}</td>
                                <td scope="col">{{ $solicitacao->nome}}</td>
                                <td scope="col">{{ $solicitacao->data}}</td>
                                <td scope="col">{{ $solicitacao->inicio + 1}}h00min</td>
                                <td scope="col">{{ $solicitacao->fim - 1}}h00min</td>
                                <td scope="col">{{ $solicitacao->pacotecomida }}</td>
                                <td scope="col">{{ $solicitacao->confirmados }}</td>
                                <td><a href="{{ route('forms.show', ['form'=>$solicitacao->id]) }}">
                                    <button class="btn btn-secondary btn-sm">Lista de presenca</button></a></td>
                                <td>
                                    <form action="{{ route('finalizaFesta', ['id' => $solicitacao->id]) }}" method="get">
                                        @csrf
                                        <input type="hidden" name="novo_status" value="4">
                                        <button type="submit" class="btn btn-secondary btn-sm">Finalizar</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
    @endif

@endsection

<a href="{{  route('operacdashboard')  }}">Dashboard</a> <br><br>
