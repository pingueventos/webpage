    @extends('anivers.layouts.app')

    @section('content')

    <br><br><br>
    <div class="container-fluid" align="center">

        <form action="{{route('novafesta.update', $solicitacao->id) }}" method="post">
            @csrf
            @method('PATCH')

                <input type="hidden" name="user_id" value="{{ $solicitacao->user_id }}">
                <input type="hidden" name="idade" value="{{ $solicitacao->idade }}">
                <input type="hidden" name="start" value="{{ $solicitacao->start }}">
                <input type="hidden" name="end" value="{{ $solicitacao->end }}">
                <input type="hidden" name="numconvidados" value="{{ $solicitacao->numconvidados }}">

            <!-- Outros campos editáveis -->
                <div class="col-md-2">
                    <h4>Editar Pacote</h4>
                        <select id="pacotecomida" name="pacotecomida" class="form-control">
                            <option align="center" disabled selected>Selecione um pacote</option>
                                @foreach ( $pacotes as $pacote )
                                    <option value="{{ $pacote->titulo }}" align="center">{{ $pacote->titulo }}</option>
                                @endforeach
                        </select>
                </div>
                <div>Diferença de preço:</div>
                <div id="difpreco"></div>
                <br>
                <button class="btn btn-success" type="submit">Salvar Edição</button>
        </form>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    </div>
    <br><br><br>
    <div class="container text-center">
        <h5 align="center" class="mt-5"><b>Pacotes Comida</b></h5>

    </div>

    <div class="d-flex justify-content-center">
        <table class="table mt-3 mx-auto">
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
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                    @foreach ( $pacotes as $key => $pacote )
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $pacote->titulo}}</td>
                        <td scope="col">{!! $pacote->comidas !!}
                        </td>
                        <td scope="col">{!! $pacote->bebidas !!}</td>
                        <td scope="col">
                            <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $pacote->imagem1)}}" alt="{{ $pacote->titulo }}">
                        </td>
                        <td scope="col">
                            <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $pacote->imagem2)}}" alt="{{ $pacote->titulo }}">
                        </td>
                        <td scope="col">
                            <img style="width: 200px; height: 200px; object-fit: cover;" src="{{asset("storage/" . $pacote->imagem3)}}" alt="{{ $pacote->titulo }}">
                        </td>
                        <td scope="col">{{ $pacote->preco . " reais"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>


    <div class="text-center mt-3">
    <a href="{{  route('aniversdashboard')  }}">Dashboard</a> <br><br>
    </div>


    <script>

        let precoAntigo = {!! json_encode($solicitacao->preco_pacote) !!};

        var pacote = document.getElementById('pacotecomida');
        pacote.addEventListener('change',function(){
            var aux = this.value;
            var tabelaPacotes = {!! json_encode($tabelapacotes) !!};
            var precoNovo = encontrarPreco(tabelaPacotes, aux);

            if(precoNovo > precoAntigo)
                stringDiferenca = precoNovo - precoAntigo + ' reais a mais (por pessoa).';
            else
            {
                if(precoAntigo > precoNovo)
                stringDiferenca = precoAntigo - precoNovo + ' reais a menos (por pessoa).';
                else
                stringDiferenca = 'nenhuma.';
            }

                // alert(stringDiferenca);

                var elementoPrint = document.getElementById("difpreco");

                elementoPrint.innerHTML = stringDiferenca;

        });


        function encontrarPreco(tabelaPacotes, titulo) {
            for (var i=0; i<tabelaPacotes.length; i++) {
                if (tabelaPacotes[i].titulo == titulo) {
                    return tabelaPacotes[i].preco;
                }
            }
        }

    </script>

    </body>
</html>
