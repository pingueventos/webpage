<h1>Editar agenda</h1>

    <form method="POST" action="{{ route('update.global') }}">
        @csrf
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
                    <option value="Livre">Disponibilizar</option>
                    <option value="Indisp.">Indisponibilizar</option>
                </select>
            </label><br>

            <label for="inicioglobal">
                Começo do período alterado às
                <select name="inicioglobal" id="inicioglobal">
                    @for($hora=0; $hora<24; $hora++)
                        @php
                            $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                        @endphp
                        <option value="{{ $hora }}">{{ $horario }}h</option>
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
                        <option value="{{ $hora }}">{{ $horario }}h</option>
                    @endfor
                </select>
            </label><br>

            <button type="submit">Atualizar Globalmente</button>
    </form>

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

        <label for="acao">
            Ação de
            <select name="acao" id="acao">
                <option value="disponibilizar">Disponibilizar</option>
                <option value="indisponibilizar">Indisponibilizar</option>
            </select>
        </label><br>

        <label for="inicio">
            Começo do período alterado às
            <select name="inicio" id="inicio">
                @for($hora=0; $hora<24; $hora++)
                    @php
                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                    @endphp
                    <option value="{{ $hora }}">{{ $horario }}h</option>
                @endfor
            </select>
        </label><br>

        <label for="fim">
            Fim do período alterado às
            <select name="fim" id="fim">
                @for($hora=0; $hora<24; $hora++)
                    @php
                        $horario=str_pad($hora, 2, '0', STR_PAD_LEFT)
                    @endphp
                    <option value="{{ $hora }}">{{ $horario }}h</option>
                @endfor
            </select>
        </label><br>
<br>
<a href="{{  route('admindashboard')  }}">Dashboard</a>
