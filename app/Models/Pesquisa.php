<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    protected $table = 'pesquisas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'festa_id',
        'questao1',
        'questao2',
        'questao3',
        'questao4',
        'pesquisa',
    ];
    use HasFactory;
}
