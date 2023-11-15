<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $ultimaDataAdicionada = DB::table('calendars')->orderBy('dia', 'desc')->value('dia');

        if ($ultimaDataAdicionada == null || now()->diffInDays($ultimaDataAdicionada) < 170) {
            $this->adicionarDias();
        }
    }


    private function adicionarDias()
    {
        $dataInicial = now()->subDays(6);
        $dataFinal = now()->addMonths(6);

        while ($dataInicial->lessThanOrEqualTo($dataFinal)) {

            if (!$this->existeDataNaTabela('calendars', $dataInicial)) {

                DB::table('calendars')->insert([
                    'dia' => $dataInicial->toDateString(),
                    'diadasemana' => $this->diasempt($dataInicial->dayOfWeek),
                ]);
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

