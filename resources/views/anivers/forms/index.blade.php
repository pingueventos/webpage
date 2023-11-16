@extends('anivers.layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Formulário de Convidados</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('forms.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nome do Convidado</label>
                            <input name="nome" type="text" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label>Idade</label>
                            <input name="idade" type="number" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>CPF</label>
                            <input name="CPF" type="number" class="form-control">

                        </div>
                    </div>

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

            @php
            $authId = DB::table('convidados')->where('festa_id',$festaId)->value('user_id');
            @endphp

            @auth
            @if($authId == auth()->id())
                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Convidado</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Apagar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $contador=0;
                        @endphp
                        @foreach ( $convidados as $convidado )
                            {{-- @if ($convidado->user_id == auth()->id()) --}}
                            @if ($convidado->festa_id == $festaId)
                                <tr>
                                    <td scope="col">{{ ++$contador }}</td>
                                    <td scope="col">{{ $convidado->nome }}</td>
                                    <td scope="col">{{ $convidado->CPF }}</td>
                                    <td scope="col">{{ $convidado->idade }}</td>
                                    <td scope="col">

                                    <form action="{{ route('forms.destroy', $convidado->id) }}" method="POST" style ="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                    </form>
                                    </td>
                                </tr>
                            @endif
                            {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
                @endif
            @endauth
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:rgba(55, 140, 209, 0.692);
        }

    </style>
@endpush
