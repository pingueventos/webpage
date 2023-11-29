<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use DB;

class AgendaController extends Controller
{
    public function passaDia()
    {
        $dias = Calendar::pluck('dia');
        return view('admin/agenda-buffet/agenda', [
            'dias' => $dias
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
            DB::table('calendars')->where('diadasemana', $diaSemana)->update([$horario => $acao]);
        }

        return redirect()->route('admindashboard')->with('success', 'Valores atualizados com sucesso.');
    }
}
