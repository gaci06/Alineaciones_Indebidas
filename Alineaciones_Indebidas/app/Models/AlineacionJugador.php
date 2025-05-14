<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlineacionJugador extends Model
{
    protected $table = 'alineacion_jugador';

    protected $fillable = ['alineacion_id', 'jugador_id', 'posicion_x', 'posicion_y'];

    public function alineacion(): BelongsTo
    {
        return $this->belongsTo(Alineacion::class);
    }

    public function jugador(): BelongsTo
    {
        return $this->belongsTo(Jugador::class);
    }
}
