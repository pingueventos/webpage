@extends('anivers.layouts.app')
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

@section('content')

    <a href="{{ route('aniversdashboard')}}">Dashboard</a>
    <div class="container">

        <h3 align="center" class="mt-5">Nova Festa</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('novafesta.store') }}" onsubmit="return validarSelecao()">
                    @csrf
                    <div class="row">

                        <div class="col-md-5" align="center">
                            <label>Nome completo do aniversariante</label>
                            <input type="text" name="nome" id="nome" class="form-control" oninput="validarNome(this)" title="Insira apenas letras e espaços" minlength="2" maxlength="255" required>
                        </div>

                        <div class="col-md-2" align="center">
                            <label>Idade</label>
                            <input type="number" name="idade" id="idade" class="form-control" pattern="[0-9]+" min="0" required>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2" align="center">
                            <label>Data</label>
                            <select name="data" id="data" class="form-control">
                                <option disabled selected align="center">Selecione</option>
                                @for ($i=$start; $i<count($agenda); $i++)
                                    <option align="center" value="{{ $agenda[$i]['dia'] }}">{{ $agenda[$i]['dia'] }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-2" align="center">
                            <label>Início</label>
                            <select name="inicio" id="inicio" class="form-control">
                                <option disabled selected align="center">Falta data</option>
                            </select>
                        </div>

                        <div class="col-md-2" align="center">
                            <label>Fim</label>
                            <select name="fim" id="fim" class="form-control">
                                <option disabled selected align="center">Falta início</option>
                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3" align="center">
                            <label>Num de Convidados</label>
                            <input type="number" name="numconvidados" id="numconvidados" class="form-control" pattern="[0-9]+" min="0" title="Apenas números inteiros são permitidos" required>
                        </div>

                        <div class="col-md-3">
                            <label>Pacote de comidas</label>
                            <select name="pacotecomida" id="pacotecomida" class="form-control">
                                <option disabled selected align="center">Selecione</option>
                                @foreach ($pacotes as $pacote)
                                    <option value="{{ $pacote->titulo }}" align="center">{{ $pacote->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="pacotecomida" value="{{ $pacote->titulo }}">
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


    <script>
        function validarSelecao() {
            var pacoteSelect = document.getElementById('pacotecomida');
            var dataSelecionada = diaSelect.options[diaSelect.selectedIndex].value;
            var inicioSelecionado = inicioSelect.options[inicioSelect.selectedIndex].value;
            var fimSelecionado = fimSelect.options[fimSelect.selectedIndex].value;
            var pacoteSelecionado = pacoteSelect.options[pacoteSelect.selectedIndex].value;

            if (dataSelecionada === 'Selecione') {
                alert('Por favor, selecione uma data válida.');
                return false;
            }

            if (inicioSelecionado === 'Selecione') {
                alert('Por favor, selecione um início válido.');
                return false;
            }

            if (fimSelecionado === 'Selecione') {
                alert('Por favor, selecione um fim válido.');
                return false;
            }

            if (pacoteSelecionado === 'Selecione') {
                alert('Por favor, selecione um pacote válido.');
                return false;
            }

            return true;
        }

        function addOptionInicio(hora) {
            var option = document.createElement('option');

            option.text = hora + 'h00min';
            option.value = hora; // por conta do tempo de limpeza
            option.style.textAlign = 'center';
            inicioSelect.add(option);
        }

        function addOptionFim(hora) {
            var option = document.createElement('option');

            option.text = hora + 'h59min';
            option.value = hora; // 1 por conta do for no controller e 1 por conta do tempo de limpeza
            option.style.textAlign = 'center';
            fimSelect.add(option);
        }

        function addDisabledOpt(select, text)
        {
            var option = document.createElement('option');

            option.text = text;
            option.disabled = 'true';
            option.selected = 'true';
            option.style.textAlign = 'center';
            select.add(option);
        }

        function validarNome(input) {
            input.value = input.value.replace(/[^a-zA-ZçÇ\u00C0-\u017F\s]/g, '');
        }

        var agenda = {!! json_encode($agenda) !!}
        var diaSelect = document.getElementById('data');
        var inicioSelect = document.getElementById('inicio');
        var fimSelect = document.getElementById('fim');
        var option = document.createElement('option');
        var linha;

        diaSelect.addEventListener('change', function() {
            inicioSelect.innerHTML = '';
            fimSelect.innerHTML = '';

            var diaSelecionado = this.value;
            linha = agenda.find(item => item.dia == diaSelecionado);

            addDisabledOpt(inicioSelect, 'Selecione');
            addDisabledOpt(fimSelect, 'Falta início');

            for(let hora=0; hora<24; hora++) {
                const horario = `h${hora.toString().padStart(2, '0')}`;
                if(linha[horario] == 0)
                    addOptionInicio(hora);
            }
        })

        inicioSelect.addEventListener('change', function() {
            fimSelect.innerHTML = '';
            var inicioSelecionado = this.value;

            option.text = 'Selecione';
            option.style.textAlign = 'center';
            option.disabled = 'true';
            option.selected = 'true';
            fimSelect.add(option);

            for(let hora=inicioSelecionado; hora<24; hora++) {
                const horario = `h${hora.toString().padStart(2, '0')}`;
                if(linha[horario] == 0)
                    addOptionFim(hora);
                else
                    exit;
            }

        })

    </script>

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