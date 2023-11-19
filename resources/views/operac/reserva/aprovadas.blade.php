@extends('anivers.layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Solicitações</h3>


            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aniversariante</th>
                        <th scope="col">Início da Festa</th>
                        <th scope="col">Término da Festa</th>
                        <th scope="col">Pacote de comidas</th>
                        <th scope="col">Confirmados</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $contador=0;
                    @endphp
                    @foreach ( $solicitacoes as $solicitacao )
                        <tr> 
                            @if ($solicitacao->status == 1)
                                <td scope="col">{{ ++$contador }}</td>
                                <td scope="col">{{ $solicitacao->nome}}</td>
                                <td scope="col">{{ $solicitacao->start}}</td>
                                <td scope="col">{{ $solicitacao->end }}</td>
                                <td scope="col">{{ $solicitacao->pacotecomida }}</td>
                                <td scope="col">{{ $solicitacao->confirmados }}</td>
                                <td><a href="{{ route('forms.show', ['form'=>$solicitacao->id]) }}">Lista de presenca</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection

<a href="{{  route('operacdashboard')  }}">Dashboard</a> <br><br>
