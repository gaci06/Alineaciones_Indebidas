<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table = 'nacionalidad';
    protected $fillable = ['nombre'];

    // Una nacionalidad puede tener muchos jugadores
    public function jugadores()
    {
        return $this->hasMany(Jugador::class, 'nacionalidad_id');
    }
}
