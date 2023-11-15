<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Illuminate\Http\RedirectResponse;

class SolicitacaoAdminController extends Controller
{
    public function solicitacoesadmin() {
        return view('admin.lista-solicitacoes.solicitacoes', ['solicitacoes' => solicitacoes()->get()]);
    }

    public function todasSolicitacoes(){
        return view('admin.lista-solicitacoes.solicitacoes');
    }

    public function statusAprovado(string $id)
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
    }
}