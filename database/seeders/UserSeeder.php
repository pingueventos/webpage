<?php

namespace Database\Seeders;

use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userData = [
            'name' => 'Aniversariante',
            'email' => 'pingu@anivers.com',
# Defina a senha do usuário teste aniversariante
            'password' => Hash::make(''),
            'role' => 'anivers'
        ];

        DB::table('users')->insert([
            [
                'name' => 'Operacional',
                'email' => 'pingu@operac.com',
# Defina a senha do usuário operacional
                'password' => Hash::make(''),
                'role' => 'operac',
            ],

            [
                'name' => 'Comercial',
                'email' => 'pingu@comerc.com',
# Defina a senha do usuário comercial
                'password' => Hash::make(''),
                'role' => 'comerc'
            ],

            [
                'name' => 'Administrativo',
                'email' => 'pingu@admin.com',
# Defina a senha do usuário administrativo
                'password' => Hash::make(''),
                'role' => 'admin',
            ],
        ]);

        $user_id = DB::table('users')->insertGetId($userData);

        DB::table('solicitacoes')->insert([
            [
                'nome' => 'Aniversariante 1',
                'user_id' => $user_id,
                'start' => 6,
                'end' => 10,
                'numconvidados' => 100,
                'idade' => 12,
                'pacotecomida' => 'Economico',
                'comida_pacote' => '<ul><li>bolinha de queijo</li><li>esfirra de carne</li><li>empada de frango</li><li>coxinha de frango</li><li>bolo de festa <i>(recheio de maracujá)</i></li></ul>',
                'bebida_pacote' => '<ul><li>guaraná</li><li>coca cola</li><li>fanta laranja</li><li>sprite</li></ul>',
                'imagem1_pacote' => 'imagens/6wNYpgLNAOp9ngnlKleC2167eiKp0T5nyelXNQhY.jpg',
                'imagem2_pacote' => 'imagens/57vKTSO0UbbPQ4aWouPu2PwLucy6HPLiUc1SmV4I.jpg',
                'imagem3_pacote' => 'imagens/bFZ9QSEiNWkJZiExbYZcsomyomArAaQj9C1weBTM.jpg',
                'preco_pacote' => 30,
            ],
            [
                'nome' => 'Aniversariante 2',
                'user_id' => $user_id,
                'start' => 6,
                'end' => 10,
                'numconvidados' => 100,
                'idade' => 12,
                'pacotecomida' => 'Economico',
                'comida_pacote' => '<ul><li>bolinha de queijo</li><li>esfirra de carne</li><li>empada de frango</li><li>coxinha de frango</li><li>bolo de festa <i>(recheio de maracujá)</i></li></ul>',
                'bebida_pacote' => '<ul><li>guaraná</li><li>coca cola</li><li>fanta laranja</li><li>sprite</li></ul>',
                'imagem1_pacote' => 'imagens/6wNYpgLNAOp9ngnlKleC2167eiKp0T5nyelXNQhY.jpg',
                'imagem2_pacote' => 'imagens/57vKTSO0UbbPQ4aWouPu2PwLucy6HPLiUc1SmV4I.jpg',
                'imagem3_pacote' => 'imagens/bFZ9QSEiNWkJZiExbYZcsomyomArAaQj9C1weBTM.jpg',
                'preco_pacote' => 30,
            ],
        ]);
    }
}
