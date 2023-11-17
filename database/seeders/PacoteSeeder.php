<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacoteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pacotes')->insert([
            [
                'titulo' => 'Econômico',
                'comidas' => '<ul><li>bolinha de queijo</li><li>esfirra de carne</li><li>empada de frango</li><li>coxinha de frango</li><li>bolo de festa <i>(recheio de maracujá)</i></li></ul>',
                'bebidas' => '<ul><li>guaraná</li><li>coca cola</li><li>fanta laranja</li><li>sprite</li></ul>',
                'imagem1' => 'imagens/6wNYpgLNAOp9ngnlKleC2167eiKp0T5nyelXNQhY.jpg',
                'imagem2' => 'imagens/57vKTSO0UbbPQ4aWouPu2PwLucy6HPLiUc1SmV4I.jpg',
                'imagem3' => 'imagens/bFZ9QSEiNWkJZiExbYZcsomyomArAaQj9C1weBTM.jpg',
                'preco' => 30,
            ],
        ]);
    }
}
