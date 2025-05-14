<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alineacion extends Model
{
    protected $table = 'alineaciones';

    protected $fillable = ['equipo_id', 'fecha', 'nombre'];

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

    public function jugadoresAsignados(): HasMany
    {
        return $this->hasMany(AlineacionJugador::class);
    }
}
