<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Pacotes;
use Illuminate\Http\RedirectResponse;

class SolicitacaoController extends Controller
{
    protected $solicitacao;
    public function __construct(){
        $this->solicitacao = new Solicitacao();
        
    }

    public function index()
    {
        $response['solicitacoes'] = $this->solicitacao->all();
        return view('anivers.solicitacao.novafesta')->with($response);
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

        $userId = auth()->id();
    
        $request->merge(['id_pacote' => $idDoPacote]);

        $request->validate([
            'start' => ['required', 'integer'],
            'end' => ['required', 'integer'],
            'idade' => ['required', 'integer'],
        ],[
            'idade.required' => 'Campo obrigatório'

        ]);

        Solicitacao::create([
            'user_id' => $userId,
            'start' => $request->start,
            'end' => $request->end,
            'numconvidados' => $request->numconvidados,
            'idade' => $request->idade,
            'pacotecomida' => $request->pacotecomida,
            'id_pacote' => $idDoPacote,
            'comida_pacote' => $comidas,
            'bebida_pacote' => $bebidas,
            'imagem1_pacote' => $imagem1,
            'imagem2_pacote' => $imagem2,
            'imagem3_pacote' => $imagem3,
        ]);
        return redirect()->back()->with('success', 'Solicitação realizada com sucesso!');
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
