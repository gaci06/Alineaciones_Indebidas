<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    protected $fillable = ['nombre'];

    // Un equipo puede tener muchos jugadores
    public function jugadores()
    {
        return $this->hasMany(Jugador::class, 'equipo_id');
    }
}
