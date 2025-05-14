<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('alineaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained('equipo')->onDelete('cascade');
            $table->date('fecha');
            $table->string('nombre')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alineaciones');
    }
};
