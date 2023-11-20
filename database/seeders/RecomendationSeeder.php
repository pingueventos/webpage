<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RecomendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('recomendations')->insert([
            [
                'recomendacao' => 'Chegue cedo',
            ],
            [
                'recomendacao' => 'Não altere opções em cima da hora',
            ],
            [
                'recomendacao' => 'Nada de bagunça',
            ],
        ]);
    }
}
