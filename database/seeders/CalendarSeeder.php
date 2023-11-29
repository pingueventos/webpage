<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalendarSeeder extends Seeder
{

    public function run()
    {
        $ultimaDataAdicionada = DB::table('calendars')->orderBy('dia', 'desc')->value('dia');

        $diadefault = Carbon::parse('2006-01-01');

        if(!$this->existeDataNaTabela('calendars',$diadefault)) {
            for ($i=0;$i<7;$i++) {
                $linhadefault = [
                    'dia'=> $diadefault->toDateString(),
                    'diadasemana' => $this->diasempt($diadefault->dayOfWeek),
                ];
                for ($hora = 0; $hora < 24; $hora++) {
                    $horario = str_pad($hora, 2, '0', STR_PAD_LEFT);
                    $linhadefault['h' . $horario] = 'Indisp.';
                }

                DB::table('calendars')->insert([$linhadefault]);
                $diadefault->addDay();
            }
        }

        if ($ultimaDataAdicionada == null || now()->diffInDays($ultimaDataAdicionada) < 170) {
            $this->adicionarDias();
        }
    }


    private function adicionarDias()
    {
        $dataInicial = now()->subDays(6);
        $dataFinal = now()->addMonths(6);
        $diaBase = Carbon::parse('2006-01-01');

        while ($dataInicial->lessThanOrEqualTo($dataFinal)) {

            if (!$this->existeDataNaTabela('calendars', $dataInicial)) {

                $linhaAtual = [
                    'dia'=> $dataInicial->toDateString(),
                    'diadasemana' => $this->diasempt($dataInicial->dayOfWeek),
                ];

                for ($hora = 0; $hora < 24; $hora++) {
                    $horario = str_pad($hora, 2, '0', STR_PAD_LEFT);
                    $linhaAtual['h' . $horario] = DB::table('calendars')->where('dia', Carbon::parse('2006-01-01')->addDays($dataInicial->dayOfWeek)->toDateString())->value('h' . $horario);
                }

                DB::table('calendars')->insert([$linhaAtual]);
            }

            $dataInicial->addDay();

        }
    }


    private function existeDataNaTabela($tabela, Carbon $data)
    {
        return DB::table($tabela)->where('dia', $data->toDateString())->exists();
    }

    private function diasempt($weekday)
    {
        switch ($weekday) {
            case 1:
                return 'Segunda';
            case 2:
                return 'Terça';
            case 3:
                return 'Quarta';
            case 4:
                return 'Quinta';
            case 5:
                return 'Sexta';
            case 6:
                return 'Sábado';
            case 0:
                return 'Domingo';
        }
    }
}

