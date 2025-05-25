<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';
    protected $fillable = [
        'nombre',
        'apellido',
        'nacionalidad_id',
        'equipo_id',
        'posicion',
    ];

    // Un jugador pertenece a una nacionalidad
    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class);
    }

    // Un jugador pertenece a un equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
