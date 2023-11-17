<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitacao extends Model
{
  protected $table = 'solicitacoes';
  protected $primaryKey = 'id';
  protected $fillable = [
        'nome',
        'user_id',
        'start',
        'end',
        'numconvidados',
        'idade',
        'pacotecomida',
        'id_pacote',
        'comida_pacote',
        'bebida_pacote',
        'imagem1_pacote',
        'imagem2_pacote',
        'imagem3_pacote',
        'preco_pacote',
        'status',
        'confirmados',
      ];
    public function user():BelongsTo {
      return $this->belongsTo(User::class,'user_id');
    }
    public function pacote():BelongsTo {
      return $this->belongsTo(Pacote::class, 'id_pacote');
    }
    use HasFactory;
}