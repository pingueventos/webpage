<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use DB;
use Carbon\Carbon;

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
        $dia = DB::table('calendars')->where('dia',$solicitacao->data)->first();


        if ($novoStatus== 1)
        {
            if($this->limpo($dia, $solicitacao))
            {
                $solicitacao->update(['status' => $novoStatus]);
                for ($i=$solicitacao->inicio; $i<$solicitacao->fim-1; $i++) {
                    // if($i < 0)
                    //     $i==0;
                    $i = max($i, 0);
                    $horario = sprintf('h%02d', $i);
                    DB::table('calendars')->where('dia', $solicitacao->data)->update([$horario => 2]);

                }
            }
            else
                return redirect()->back()->with('falha', 'Já existe uma festa nesse horário!');
        }

        if ($novoStatus == 3)
        {
            $solicitacao->update(['status' => $novoStatus]);

            $diaPadrao = DB::table('calendars')->skip(Carbon::parse($dia->dia)->dayOfWeek)->first();
            for ($i=$solicitacao->inicio; $i<$solicitacao->fim-1; $i++) {
                    // if($i < 0)
                    //     $i == 0;
                $i = max($i, 0);
                $horario = sprintf('h%02d', $i);
                DB::table('calendars')->where('dia', $solicitacao->data)->update([$horario => $diaPadrao->$horario]);
            }
        }

        else
            $solicitacao->update(['status' => $novoStatus]);


        return redirect()->back()->with('success', 'Status atualizado com sucesso.');

    }

    private function limpo($dia, $solicitacao)
    {
        for ($i=$solicitacao->inicio; $i<$solicitacao->fim-1; $i++) {
            $i = max($i, 0);
            $horario = sprintf('h%02d', $i);
            if ($dia->$horario == 2)
                return 0;
        }
        return 1;
    }
}
