@extends('anivers.layouts.app')

@section('content')

<a href="{{  route('aniversdashboard')  }}">Dashboard</a> <br><br>

    <div class="container-xg">

        <h3 align="center" class="mt-5">Nova Festa</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('novafesta.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" align="center">
                            <label>Num de Convidados</label>
                            <input name="numconvidados" type="number" class="form-control">
                        </div>
                        <div class="col-md-2" align="center">
                            <label>Idade</label>
                            <input name="idade" type="number" class="form-control">
                        </div>    

                        <div class="col-md-2" align="center">
                            <label>Início</label>
                            <select name="start" id="start" class="form-control" >
                                <option disabled selected>Horário inicial</option>
                                <option value="8" align="center">8:00</option>
                                <option value="9" align="center">9:00</option>
                                <option value="10" align="center">10:00</option>
                            </select>
                        </div>

                        <div class="col-md-2" align="center">
                            <label>Término</label>
                            <select name="end" id="end" class="form-control">
                                <option disabled selected>Horário final</option>
                                <option value="17" align="center">17:00</option>
                                <option value="18" align="center">18:00</option>
                                <option value="19" align="center">19:00</option>
                            </select>
                        </div>                  
                        <div class="col-md-3">
                            <label>Pacote de comidas:</label>
                            <select name="pacotecomida" class="form-control">
                            <option disabled selected>Selecione um pacote</option>
                            @foreach ( $pacotes as $pacote )
                                <option value="{{ $pacote->titulo }}" align="center">{{ $pacote->titulo }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="pacotecomida" value="{{ $pacote->titulo }}">

                    <div class="row">
                        <div class="col-md-12 mt-3" align="right">
                            <input type="submit" class="btn btn-primary" value="Solicitar">
                        </div>
                    </div>
                </form>

                @if (session('success'))
                    <div class="alert alert-success"> 
                        {{ session('success') }}
                @endif
            </div>
            </div>
        </div>
    </div>

    <div class="container-xg">
        <h3 align="center" class="mt-5">Pacotes Comida</h3>

            <table class="table mt-5 mb-5">
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
                </tr>
                </thead>
                <tbody>

                    @foreach ( $pacotes as $key => $pacote )
                    <tr> 
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $pacote->titulo}}</td>
                        <td scope="col">{!! $pacote->comidas !!}</td>
                        <td scope="col">{!! $pacote->bebidas !!}</td>
                        <td scope="col">
                            <img style="width: 250px; height: 250px;" src="{{asset("storage/" . $pacote->imagem1)}}" alt="{{ $pacote->titulo }}">
                        </td>
                        <td scope="col">
                            <img style="width: 250px; height: 250px;" src="{{asset("storage/" . $pacote->imagem2)}}" alt="{{ $pacote->titulo }}">
                        </td>
                        <td scope="col">
                            <img style="width: 250px; height: 250px;" src="{{asset("storage/" . $pacote->imagem3)}}" alt="{{ $pacote->titulo }}">
                        </td>
                        <td scope="col">{{ $pacote->preco . " reais"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:rgba(42, 120, 165, 0.692);
        }

    </style>
@endpush