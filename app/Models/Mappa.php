<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\Game;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mappa extends Model
{
    use HasFactory;
    protected $table = 'mappa';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['game_id', 'posizione', 'parent_id_map', 'url_img_map','nome_mappa'];

    public function game():BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function parentMap():BelongsTo
    {
        return $this->belongsTo(Mappa::class, 'parent_map_id');
    }

    public function childMaps():HasMany
    {
        return $this->hasMany(Mapp::class, 'parent_map_id');
    }
}