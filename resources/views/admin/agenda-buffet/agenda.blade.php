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
            </label><br>

            <button type="submit">Atualizar Globalmente</button>
    </form>

    <form method="POST" action="{{ route('update.especifico') }}">
        @csrf
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
            </label><br>

            <button type="submit">Atualizar Especificamente</button>
    </form>
<br>
<a href="{{  route('admindashboard')  }}">Dashboard</a>
