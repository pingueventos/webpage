<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    public function passaDia()
    {
        $dias = Calendar::pluck('dia');
        $semanaPadrao = DB::table('calendars')->take(7)->get();
        return view('admin/agenda-buffet/agenda', [
            'dias' => $dias,
            'semanapadrao' => $semanaPadrao,
        ]);
    }

    public function updateGlobal(Request $request)
    {
        $diaSemana = $request->input('diasemana');
        $acao = $request->input('acaoglobal');
        $inicio = $request->input('inicioglobal');
        $fim = $request->input('fimglobal');

        for ($hora=$inicio; $hora<$fim; $hora++) {
            $horario = 'h' . $horario=str_pad($hora, 2, '0', STR_PAD_LEFT);
                DB::table('calendars')->where('diadasemana', $diaSemana)->where($horario, '!=', 2)->update([$horario => $acao]);
        }

        return redirect()->route('admindashboard')->with('success', 'Valores atualizados com sucesso.');
    }

    public function updateEspecifico(Request $request)
    {
        $data = $request->input('diaespecifico');
        $acao = $request->input('acaoespecifica');
        $inicio = $request->input('inicioespecifico');
        $fim = $request->input('fimespecifico');

        for ($hora=$inicio; $hora<$fim; $hora++) {
            $horario = 'h' . $horario=str_pad($hora, 2, '0', STR_PAD_LEFT);
                DB::table('calendars')->where('dia', $data)->where($horario, '!=', 2)->update([$horario => $acao]);
        }

        return redirect()->route('admindashboard')->with('success', 'Valores atualizados com sucesso.');
    }

    public function horariosSolicitacao(Calendar $calendario)
    {
        $dias = $calendario::all();
        return view('anivers/solicitacao/novafesta', [
            'agenda' => $dias,
        ]);
    }
}
