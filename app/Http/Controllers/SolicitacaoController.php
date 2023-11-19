<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
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

        $userId = auth()->id();

        Solicitacao::create([
            'user_id' => $userId,
            'nome' => $request->nome,
            'data' => $request->data,
            'inicio' => $request->inicio,
            'fim' => $request->fim,
            'numconvidados' => $request->numconvidados,
            'idade' => $request->idade,
            'pacotecomida' => $request->pacotecomida,
        ]);
        return redirect()->back()->with('success', 'Solicitação realizada com sucesso!');
        // return view('welcome');
        // return redirect()->route('inicial.display')->with('success', 'Solicitação realizada com sucesso!');

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
}
