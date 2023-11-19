<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Pacotes;
use App\Models\Convidado;
use Illuminate\Http\RedirectResponse;
use App\Models\Calendar;


class SolicitacaoController extends Controller
{
    protected $solicitacao;
    public function __construct(){
        $this->solicitacao = new Solicitacao();

    }

    public function index(Calendar $calendario)
    {
        $response['solicitacoes'] = $this->solicitacao->all();
        $dias = $calendario::all();
        $start = count($dias) - (now()->diffInDays(Calendar::latest('dia')->first()->dia)) + 1;
        return view('anivers.solicitacao.novafesta', ['agenda' => $dias, 'start' => $start])->with($response);
    }

    public function store(Request $request)
    {
        $pacotecomida = $request->input('pacotecomida');

        $pacote = Pacotes::where('titulo', $pacotecomida)->first();

        $idDoPacote = $pacote->id;
        $comidas = $pacote->comidas;
        $bebidas = $pacote->bebidas;
        $imagem1 = $pacote->imagem1;
        $imagem2 = $pacote->imagem2;
        $imagem3 = $pacote->imagem3;
        $precopacote = $pacote->preco;

        $userId = auth()->id();

        $request->merge(['id_pacote' => $idDoPacote]);


        Solicitacao::create([
            'nome' => $request->nome,
            'user_id' => $userId,
            'data' => $request->data,
            'inicio' => ($request->inicio - 1),
            'fim' => ($request->fim + 2),
            'numconvidados' => $request->numconvidados,
            'idade' => $request->idade,
            'pacotecomida' => $request->pacotecomida,
            'id_pacote' => $idDoPacote,
            'comida_pacote' => $comidas,
            'bebida_pacote' => $bebidas,
            'imagem1_pacote' => $imagem1,
            'imagem2_pacote' => $imagem2,
            'imagem3_pacote' => $imagem3,
            'preco_pacote' => $precopacote,
        ]);
        return redirect()->back()->with('success', 'Solicitação realizada com sucesso!');
    }

    public function pacoteShow($id) {

        $solicitacao = Solicitacao::find($id);

        return view('anivers.reservas.pacote-escolhido', ['solicitacao' => $solicitacao]);
    }

    public function destroy(string $id)
    {
        // $solicitacao = $this->solicitacao->find($id);
        // $solicitacao->delete();
        // return redirect()->back()->with('success', 'Solicitação realizada com sucesso!');
    }

    public function manage() {
        return view('anivers.reservas.reservas', ['solicitacoes' => auth()->user()->solicitacoes()->get()]);
    }

    public function cancelar(string $id)
    {
        $novoStatus = request()->input('novo_status');
        // Definir a variável
        // $novoStatus = 1; // Substitua 'algum_valor' pelo valor desejado

        // Encontrar a solicitação no banco de dados com base no ID fornecido
        $solicitacao = Solicitacao::find($id);
        // $solicitacao = $this->solicitacao->find($id);

        // Atualizar o campo 'status' com o novo valor
        $solicitacao->update(['status' => $novoStatus]);

        return redirect()->back()->with('success', 'Status atualizado com sucesso.');
        // $solicitacao = $this->solicitacao->find($id);
        // $solicitacao->delete();
        // return redirect()->back()->with('success', 'Solicitação realizada com sucesso!');
    }

    public function pacoteEdit($id)
    {
        $tabelaPacotes = Pacotes::all();
        $solicitacao = Solicitacao::find($id);
        return view('anivers.reservas.editar-pacote')->with('solicitacao', $solicitacao)->with('tabelapacotes', $tabelaPacotes);
    }


    public function update(Request $request, $id)
    {
    $solicitacao = Solicitacao::find($id);

    $solicitacao->pacotecomida = $request->input('pacotecomida');
    $pacote = Pacotes::where('titulo', $solicitacao->pacotecomida)->first();

    $solicitacao->id_pacote = $pacote->id;
    $solicitacao->comida_pacote = $pacote->comidas;
    $solicitacao->bebida_pacote = $pacote->bebidas;
    $solicitacao->imagem1_pacote = $pacote->imagem1;
    $solicitacao->imagem2_pacote = $pacote->imagem2;
    $solicitacao->imagem3_pacote = $pacote->imagem3;
    $solicitacao->preco_pacote = $pacote->preco;
    // Não atualize o campo_nao_editavel, pois ele está no campo hidden

    $solicitacao->save();

    // Redirecione para a página de exibição dos dados atualizados
    return redirect()->back()->with('success', 'Pacote alterado com sucesso.');

    }
}
