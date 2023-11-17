<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convidado extends Model
{
  protected $table = 'convidados';
  protected $primaryKey = 'id';
   protected $fillable = [
        'nome',
        'CPF',
        'idade',
        'festa_id',
        'user_id',
        'status',
    ];
    use HasFactory;
}
