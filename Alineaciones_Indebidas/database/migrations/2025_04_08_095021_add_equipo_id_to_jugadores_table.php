<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEquipoIdToJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->unsignedBigInteger('equipo_id')->after('nacionalidad_id')->nullable();
            $table->foreign('equipo_id')
                  ->references('id')->on('equipo')
                  ->onDelete('cascade'); // Al eliminar un equipo, se podrán eliminar los jugadores asociados (modifica según tus necesidades)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropForeign(['equipo_id']);
            $table->dropColumn('equipo_id');
        });
    }
}
