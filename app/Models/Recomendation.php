<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    protected $table = 'recomendations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'recomendacao',
    ];
    use HasFactory;
}
