@extends('anivers.layouts.app')

@section('content')

@auth
    @if(auth()->id() == 1)
        <a href="{{  route('operacdashboard')  }}">Dashboard</a> <br><br>
    @else
        <a href="{{  route('aniversdashboard')  }}">Dashboard</a> <br><br>
    @endif
@endauth

@php
    $authId = DB::table('convidados')->where('festa_id',$festaId)->value('user_id');
    $confirmados = DB::table('solicitacoes')->where('id',$festaId)->value('confirmados');
    $presentes = DB::table('solicitacoes')->where('id',$festaId)->value('presentes');
@endphp

@if (auth()->id()==1)
    <p>
        <div id="ElementoFixo" class="bg-secondary text-white p-3 rounded">
            Confirmados:<b> {{$confirmados}}</b> / Presentes: <b>{{$presentes}}</b>
        </div>
    </p>
@endif

    <div class="container">

    @if(auth()->id() == 1)
        <h3 align="center" class="mt-5">Adicionar Convidado Extra</h3>
    @else
        <h3 align="center" class="mt-5">Formulário de Convidados</h3>
    @endif

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area p-3 rounded">
                <div>
                    <button id="adicionar" name="adicionar">+</button>
                </div>
                <form method="POST" action="{{ route('forms.store') }}">
                    @csrf
                    <input type="hidden" value='1' name="quantidade" id="quantidade">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nome do Convidado</label>
                            <input name="nome1" type="text" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label>Idade</label>
                            <input name="idade1" type="number" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>CPF</label>
                            <input name="CPF1" type="number" class="form-control">

                        </div>
                    </div>

                    <div id="maisconvs">

                    </div>

                    @if (auth()->id() == 1)
                        <input type="hidden" name="status" value=1>
                    @else
                        <input type="hidden" name="status" value=0>
                    @endif
                    <input type="hidden" name="idFesta" value="{{  $festaId  }}">
                    <input type="hidden" name="idUsuario" value="{{  $usuarioId  }}">

                    <div class="row">
                        <div class="container mt-3" align="right">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>

                    </div>
                </form>

            </div>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
            @auth
                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Convidado</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Status</th>
                    @if (auth()->id() != 1)
                        <th scope="col">Aprovar</th>
                        <th scope="col">Apagar</th>
                    @else
                        <th scope="col">Confirmar</th>
                    @endif
                      </tr>
                    </thead>
                        @php
                            $contador=0;
                        @endphp
                        <tbody>
                        @foreach ( $convidados as $convidado )
                            @if((auth()->id()!=1 && $convidado->festa_id == $festaId && $authId == auth()->id()) || (auth()->id()==1 && $convidado->festa_id == $festaId))
                                @if (($convidado->status!=0 && auth()->id() == 1) || (auth()->id() != 1))
                                <tr>
                                    <td scope="col">{{ ++$contador }}</td>
                                    <td scope="col">{{ $convidado->nome }}</td>
                                    <td scope="col">{{ $convidado->CPF }}</td>
                                    <td scope="col">{{ $convidado->idade }}</td>
                                    <td scope="col">
                                    @if ($authId == auth()->id())
                                       @if ($convidado->status === 0)
                                            <p>Em espera</a></td>
                                        @elseif ($convidado->status == 1 || $convidado->status == 2)
                                            <p class="text-success">Aprovado</p>
                                        @endif

                                    @elseif (auth()->id() == 1)
                                        @if ($convidado->status == 1)
                                            <p class="">Em espera</p>
                                        @elseif ($convidado->status == 2)
                                            <p class="text-success">Presente</p>
                                        @endif
                                    @endif
                                    </td>

                                    @if ($convidado->status == 0)
                                        <form action="{{ route('status.update', ['id' => $convidado->id]) }}" method="post">
                                            @csrf
                                            <td scope="col">
                                                <input type="hidden" name="novo_status" value="1">
                                                <button type="submit" class="btn btn-success btn-sm">Aprovar</button>

                                            </td>
                                        </form>
                                    @elseif ($convidado->status == 1 && auth()->id() == 1)
                                        <form action="{{ route('status.update', ['id' => $convidado->id]) }}" method="post">
                                            @csrf
                                            <td scope="col">
                                                <input type="hidden" name="novo_status" value="2">
                                                <button type="submit" class="btn btn-success btn-sm">Presente</button>

                                            </td>
                                        </form>
                                    @else
                                    <td></td>
                                    @endif

                                    @if (auth()->id() != 1)
                                        <form action="{{ route('forms.destroy', $convidado->id) }}" method="POST" style ="display:inline">
                                            @csrf
                                            <td scope="col">
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Negar</button>
                                            </td>
                                        </form>
                                    @endif
                                </tr>
                            @endif
                    @endif
                @endforeach
                </tbody>
            </table>

            @endauth
            </div>
        </div>
    </div>

    <script>
        const addButton = document.getElementById('adicionar');
        const contador = document.getElementById('quantidade');
        const maisConvidados = document.getElementById('maisconvs');
        let cont = 1;

        addButton.addEventListener('click', function()
        {
            cont++;
            contador.value = cont;

            const novaDiv = document.createElement('div');
            novaDiv.classList.add('row');
            novaDiv.innerHTML = `
            <div class="col-md-6">
                <label>Nome do Convidado</label>
                <input name="nome${cont}" type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Idade</label>
                <input name="idade${cont}" type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label>CPF</label>
                <input name="CPF${cont}" type="number" class="form-control">
            </div>`;

                maisConvidados.appendChild(novaDiv);

        });
    </script>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:rgba(55, 140, 209, 0.692);
        }

        #ElementoFixo{
            position: fixed;
            top: 20px;
            right: 20px;
        }

    </style>
@endpush
