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
        'user_id',
        'start',
        'end',
        'numconvidados',
        'idade',
        'pacotecomida',
        'status',
    ];
    public function user():BelongsTo {
      return $this->belongsTo(User::class,'user_id');
  }
    use HasFactory;
}