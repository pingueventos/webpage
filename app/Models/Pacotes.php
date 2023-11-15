<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Pacotes extends Model
{
  use HasTrixRichText;
  protected $table = 'pacotes';
  protected $primaryKey = 'id';
   protected $fillable = [
        'titulo',
        'comidas',
        'bebidas',
        // 'imagem1',
        // 'imagem2',
        // 'imagem3',
    ];    use HasFactory;
}