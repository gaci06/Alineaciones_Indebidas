<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNacionalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacionalidad', function (Blueprint $table) {
            $table->id(); // Campo "id" autoincrementable
            $table->string('nombre'); // Nombre de la nacionalidad (ej. "España", "Argentina")
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nacionalidad');
    }
}
