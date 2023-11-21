@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

<div class="corpo_agendaadmin">
    <h1 id="toptext">Editar agenda</h1>
    
            @if(auth()->id() == 3)
                <form method="POST" action="{{ route('update.globaladmin') }}">
            @else
                <form method="POST" action="{{ route('update.globalcomerc') }}">
            @endif
    
            @csrf
            <div class="posicao_agenda">
                <div class="agenda_box">
                    <h2>Configuração semanal global</h2>
                        <label for="diasemana">
                            Alterar
                            <select name="diasemana" id="diasemana">
                                <option value="Domingo">Domingo</option>
                                <option value="Segunda">Segunda-feira</option>
                                <option value="Terça">Terça-feira</option>
                                <option value="Quarta">Quarta-feira</option>
                                <option value="Quinta">Quinta-feira</option>
                                <option value="Sexta">Sexta-feira</option>
                                <option value="Sábado">Sábado</option>
                            </select>
                            globalmente
                        </label><br>
                        <label for="acaoglobal">
                            Ação de
                            <select name="acaoglobal" id="acaoglobal">
                                <option value="0">Disponibilizar</option>
                                <option value="1">Indisponibilizar</option>
                            </select>
                        </label><br>
                        <label for="inicioglobal">
                            Começo do período alterado às
                            <select name="inicioglobal" id="inicioglobal">
                                @for($hora=0; $hora<24; $hora++)
                                    @php
                                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                                    @endphp
                                    <option value="{{ $hora }}">{{ $horario }}h00min</option>
                                @endfor
                            </select>
                        </label><br>
                        <label for="fimglobal">
                            Fim do período alterado às
                            <select name="fimglobal" id="fimglobal">
                                @for($hora=0; $hora<24; $hora++)
                                    @php
                                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                                    @endphp
                                    <option value="{{ $hora + 1 }}">{{ $horario}}h59min</option>
                                @endfor
                            </select>
                        </label><br><br><br>
                        <button type="submit">Atualizar Globalmente</button>
                            </form>
                </div>
                    
                        @if(auth()->id() == 3)
                <form method="POST" action="{{ route('update.especificoadmin') }}">
                        @else
                <form method="POST" action="{{ route('update.especificocomerc') }}">
                        @endif
                    @csrf
                <div class="agenda_box">
                    <h2>Configuração diária específica</h2>
                        <label for="diaespecifico">
                            Alterar
                            <select name="diaespecifico" id="diaespecifico">
                                @for ($i=7; $i<count($dias); $i++)
                                    <option value="{{ $dias[$i] }}">{{ $dias[$i] }}</option>
                                @endfor
                            </select>
                            especificamente
                        </label><br>
                        <label for="acaoespecifica">
                            Ação de
                            <select name="acaoespecifica" id="acaoespecifica">
                                <option value="0">Disponibilizar</option>
                                <option value="1">Indisponibilizar</option>
                            </select>
                        </label><br>
                        <label for="inicioespecifico">
                            Começo do período alterado às
                            <select name="inicioespecifico" id="inicioespecifico">
                                @for($hora=0; $hora<24; $hora++)
                                    @php
                                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                                    @endphp
                                    <option value="{{ $hora }}">{{ $horario }}h00min</option>
                                @endfor
                            </select>
                        </label><br>
                        <label for="fimespecifico">
                            Fim do período alterado às
                            <select name="fimespecifico" id="fimespecifico">
                                @for($hora=0; $hora<24; $hora++)
                                    @php
                                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                                    @endphp
                                    <option value="{{ $hora + 1 }}">{{ $horario }}h59min</option>
                                @endfor
                            </select>
                        </label><br><br><br>
                        <button type="submit">Atualizar Especificamente</button>
                            </form>
                        
                </div>
            </div>
    
    @if(auth()->id() == 3)
            <a href="{{  route('admindashboard')  }}" id="logout">Dashboard</a>
        @else
            <a href="{{  route('comercdashboard')  }}" id="logout">Dashboard</a>
        @endif
    
    <div class="corpo">
        <table>
            <caption>Padrão Semanal</caption>
            <thead>
                <th>Data</th>
                <th>Dia da semana</th>
                @for($hora=0; $hora<24; $hora++)
                    @php
                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                    @endphp
                    <th>{{ $horario }}h</th>
                @endfor
            </thead>
            <tbody id="agendaBody">
                @foreach($semanapadrao as $diapadrao)
                <tr>
                    <td>{{ $diapadrao->dia }}</td>
                    <td>{{ $diapadrao->diadasemana }}</td>
                    @for($hora = 0; $hora < 24; $hora++)
                        @php
                            $horario = 'h' . str_pad($hora, 2, '0', STR_PAD_LEFT);
                            if($diapadrao->$horario == 0)
                                $valor = 'Livre.';
                            else
                                $valor = 'Indisp.';
                        @endphp
                        <td>{{ $valor }}</td>
                    @endfor
                </tr>
            @endforeach
            </tbody>
        </table>
        
        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                        @endif
    </div>
</div>
