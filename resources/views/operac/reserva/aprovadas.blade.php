@extends('anivers.layouts.app')

@section('content')

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

    <div class="tudo">

        <h3 align="center" class="mt-5">Solicitações</h3>


            <table class="tabela" align="center">
                <thead>
                    <tr>
                        <th id="nomecol" scope="col">#</th>
                        <th id="nomecol" scope="col">Aniversariante</th>
                        <th id="nomecol" scope="col">Data</th>
                        <th id="nomecol" scope="col">Início da Festa</th>
                        <th id="nomecol" scope="col">Término da Festa</th>
                        <th id="nomecol" scope="col">Pacote de comidas</th>
                        <th id="nomecol" scope="col">Confirmados</th>
                        <th id="nomecol" scope="col">Ação</th>
                        <th id="nomecol" scope="col">Status</th>
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
                                    <button id="botaolista">Lista de presenca</button></a></td>
                                <td>
                                    <form action="{{ route('finalizaFesta', ['id' => $solicitacao->id]) }}" method="get">
                                        @csrf
                                        <input type="hidden" name="novo_status" value="4">
                                        <button type="submit" class="btn btn-secondary btn-sm" id="botaopadrao">Finalizar</button>
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

<a href="{{  route('operacdashboard')  }}" id="logout">Dashboard</a> <br><br>
