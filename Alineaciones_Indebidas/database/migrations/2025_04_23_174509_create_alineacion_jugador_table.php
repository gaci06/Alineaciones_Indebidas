<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('alineacion_jugador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alineacion_id')->constrained('alineaciones')->onDelete('cascade');
            $table->foreignId('jugador_id')->constrained('jugadores')->onDelete('cascade');
            $table->integer('posicion_x');
            $table->integer('posicion_y');
            $table->timestamps();

            $table->unique(['alineacion_id', 'jugador_id']); // Evita jugadores duplicados por alineación
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alineacion_jugador');
    }
};
