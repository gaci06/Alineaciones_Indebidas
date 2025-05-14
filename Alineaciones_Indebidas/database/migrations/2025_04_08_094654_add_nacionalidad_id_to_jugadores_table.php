<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNacionalidadIdToJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->unsignedBigInteger('nacionalidad_id')->after('apellido');
            $table->foreign('nacionalidad_id')
                  ->references('id')->on('nacionalidad')
                  ->onDelete('cascade'); // Opcional: elimina los jugadores si se borra la nacionalidad
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
            $table->dropForeign(['nacionalidad_id']);
            $table->dropColumn('nacionalidad_id');
        });
    }
}
