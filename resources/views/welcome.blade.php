<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PinGu! Eventos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="/css/pag_inicial.css?v=3">

        <link rel="shortcut icon" href="/css/images_css/logo_icon.png" type="image/x-icon">
    </head>
    
    <body class="antialiased">

        <div class="header"><img src="/css/images_css/logo.png" id="logo"></div>    
    
    
        <div class="posicao" style="text-align:right;">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                            <a class="botoes" href="{{ url(Auth::user()->role . '/dashboard') }}">Dashboard</a>
                        @else
                            <a class="botoes" href="{{ route('login') }}">Log in</a>
                            @if (Route::has('register'))
                                <a class="botoes" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            
        <div class="corpo">
            <div>
                <div>
                    <h1>Agenda</h1>
                    <table cellspacing="8" cellpadding="8">
                        <caption>Disponibilidade de Serviços</caption>
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
                            @foreach($agenda->take(7) as $dia)
                                <tr>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p> <?php $indicesemana ?> </p>
                        <button onclick="mostrarAnteriores()">Semana Anterior</button>
                        <button onclick="mostrarProximos()">Próxima Semana</button>
                </div>
            </div>
            <div>
            </div>
    </div>

    </body>
</html>

<script>





    let elementosExibidos = 0;
    const agendaCompleta = {!! json_encode($agenda) !!};
    const totalElementos = {!! json_encode(count($agenda)) !!};

    // Encontrar o índice do elemento cujo "dia" corresponde ao dia atual
    const diaAtual = '{{ now()->toDateString() }}';
    const indiceDiaAtual = agendaCompleta.findIndex(dia => dia.dia === diaAtual);

    // Definir elementosExibidos com base no índice do dia atual
    elementosExibidos = ((indiceDiaAtual >= 0) ? indiceDiaAtual : 0) - (new Date(diaAtual).getDay() == 6 ? 0 : new Date(diaAtual).getDay() + 1);
    limiteInferior = elementosExibidos;

    function mostrarProximos() {
        if (elementosExibidos + 6 <= totalElementos)
        {
            const proximosElementos = agendaCompleta.slice(elementosExibidos, elementosExibidos + 7);

            const tbody = document.getElementById('agendaBody');
            tbody.innerHTML = '';

            proximosElementos.forEach(dia => {
                const row = document.createElement('tr');
            row.innerHTML += `<td>${dia.dia}</td>`;
            row.innerHTML += `<td>${dia.diadasemana}</td>`;

            for (let hora = 0; hora < 24; hora++) {
                const horario = `h${hora.toString().padStart(2, '0')}`;
                // row.innerHTML += `<td>${dia[horario]}</td>`;
                if(dia[horario] == 0)
                    row.innerHTML += `<td>&#x2714</td>`;
                else
                    row.innerHTML += `<td>&#x274C</td>`;

            }
            tbody.appendChild(row);
        });
        elementosExibidos += 7;
        if (elementosExibidos >= totalElementos) {
            elementosExibidos = totalElementos - (totalElementos % 7 || 7);
        }
    }
}

function mostrarAnteriores() {
    elementosExibidos -= 14;

    if (elementosExibidos < limiteInferior) {
        elementosExibidos = limiteInferior;
    }

    mostrarProximos();
}

mostrarProximos();
</script>
