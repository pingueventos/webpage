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

    public function statusFesta(string $id)
    {
        $novoStatus = request()->input('novo_status');
        $solicitacao = Solicitacao::find($id);
        $solicitacao->update(['status' => $novoStatus]);

        return redirect()->back()->with('success', 'Status atualizado com sucesso.');
    }
}