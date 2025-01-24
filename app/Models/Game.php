<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nome_game'];

    public function maps(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
