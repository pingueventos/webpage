<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Illuminate\Http\RedirectResponse;
use App\Models\Calendar;
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

    public function statusAprovado(string $id)
    {
        $novoStatus = request()->input('novo_status');
        $solicitacao = Solicitacao::find($id);
        $dia = DB::table('calendars')->where('dia',$solicitacao->data);

        $solicitacao->update(['status' => $novoStatus]);

        if ($novoStatus== 1)
        {
            for ($i=$solicitacao->inicio; $i<$solicitacao->fim-1; $i++) {
                $horario = sprintf('h%02d', $i);
                $dia->update([$horario => 2]);
            }
        }

        if ($novoStatus == 3)
        {
            $diaPadrao = DB::table('calendars')->skip(Carbon::parse($dia->first()->dia)->dayOfWeek)->first();
            for ($i=$solicitacao->inicio; $i<$solicitacao->fim-1; $i++) {
                $horario = sprintf('h%02d', $i);
                $dia->update([$horario => $diaPadrao->$horario]);
            }
        }

        // if ($novoStatus == 3)
        // {
        //     $dia = DB::table('calendars')->where('dia', $solicitacao->data)->first();
        //     $diaPadrao = DB::table('calendars')->skip(Carbon::parse($dia->dia)->dayOfWeek)->first();

        //     for ($i = $solicitacao->inicio; $i < $solicitacao->fim - 1; $i++) {
        //         $horario = sprintf('h%02d', $i);
        //         DB::table('calendars')->where('dia', $solicitacao->data)->update([$horario => $diaPadrao->$horario]);
        //     }
        // }

        return redirect()->back()->with('success', 'Status atualizado com sucesso.');
    }
}
