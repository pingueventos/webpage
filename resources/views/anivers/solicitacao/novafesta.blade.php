@extends('anivers.layouts.app')

@section('content')

    <div class="container">

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
                            <select name="start" id="time" class="form-control" >
                                <option value="null">Selecione o inicio</option>
                                <option value="8" align="center">8:00</option>
                                <option value="9" align="center">9:00</option>
                                <option value="10" align="center">10:00</option>
                            </select>
                        </div>

                        <div class="col-md-2" align="center">
                            <label>Término</label>
                            <select name="end" id="time" class="form-control">
                                <option value="null">Selecione o término</option>
                                <option value="17" align="center">17:00</option>
                                <option value="18" align="center">18:00</option>
                                <option value="19" align="center">19:00</option>
                            </select>
                        </div>                  
                        <div class="col-md-3">
                            <label>Pacote de comidas:</label>
                            <select name="pacotecomida" class="form-control">
                                <option value="null">Selecione</option>
                                <option value="1" align="center">Pacote 1</option>
                                <option value="2" align="center">Pacote 2</option>
                                <option value="3" align="center">Pacote 3</option>
                                <option value="4" align="center">Pacote 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" align="right">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>
                @if (session('success'))
                    <div class="alert alert-success"> 
                        {{ session('success') }}
                @endif
            </div>
            </div>
        </div>
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