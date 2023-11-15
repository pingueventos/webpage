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
                'user_id' => $user_id,
                'start' => 6,
                'end' => 10,
                'numconvidados' => 100,
                'idade' => 12,
                'pacotecomida' => 2,
            ],
            [
                'user_id' => $user_id,
                'start' => 6,
                'end' => 10,
                'numconvidados' => 100,
                'idade' => 12,
                'pacotecomida' => 2,
            ],
        ]);
    }
}
