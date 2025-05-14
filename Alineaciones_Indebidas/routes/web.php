<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\JugadorController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AlineacionController;


Route::resource('jugadores', JugadorController::class)->parameters(['jugadores' => 'jugador',]);

Route::resource('nacionalidades', NacionalidadController::class);
Route::resource('equipos', EquipoController::class);

Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');


Route::get('/alineacion', [AlineacionController::class, 'index'])->name('alineacion');



Route::prefix('alineaciones')->name('alineaciones.')->group(function () {
    Route::get('/resumen', [AlineacionController::class, 'resumen'])->name('resumen');
    Route::get('/', [AlineacionController::class, 'index'])->name('index');
    Route::post('/', [AlineacionController::class, 'store'])->name('store');
    Route::get('/{id}', [AlineacionController::class, 'show'])->name('show');

    
    Route::get('/{id}/editar', [AlineacionController::class, 'edit'])->name('edit');


    Route::put('/{id}', [AlineacionController::class, 'update'])->name('update'); // <- ESTA LÍNEA ES CLAVE

    Route::post('/{id}/asignar-jugador', [AlineacionController::class, 'asignarJugador'])->name('asignarJugador');
    Route::delete('/{id}/eliminar-jugador/{jugadorId}', [AlineacionController::class, 'eliminarJugador'])->name('eliminarJugador');
});

