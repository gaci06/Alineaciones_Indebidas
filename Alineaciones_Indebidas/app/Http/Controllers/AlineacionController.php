<?php

namespace App\Http\Controllers;

use App\Models\Alineacion;
use App\Models\AlineacionJugador;
use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;

class AlineacionController extends Controller
{
    /**
     * Muestra la vista del editor de alineaciones.
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('alineacion.index', compact('equipos'));
    }

    /**
     * Crear una nueva alineación.
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipo,id',
            'fecha' => 'required|date',
            'nombre' => 'nullable|string',
        ]);

        $alineacion = Alineacion::create($request->only('equipo_id', 'fecha', 'nombre'));

        return redirect()->route('alineaciones.show', $alineacion->id);
    }

    /**
     * Ver una alineación con sus jugadores asignados.
     */
    public function show($id)
    {
        $alineacion = Alineacion::with(['jugadoresAsignados.jugador'])->findOrFail($id);
        return view('alineacion.show', compact('alineacion'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'equipo_id' => 'required|exists:equipos,id',
        'fecha' => 'required|date',
        'nombre' => 'nullable|string',
    ]);

    $alineacion = Alineacion::findOrFail($id);
    $alineacion->update($request->only('equipo_id', 'fecha', 'nombre'));

    
    return redirect()->route('alineaciones.index')->with('success', 'Alineación actualizada correctamente');
}



public function edit($id)
{
    $alineacion = Alineacion::with('equipo')->findOrFail($id);
    $equipos = Equipo::all();
    return view('alineacion.edit', compact('alineacion', 'equipos'));
}


public function resumen()
{
    $alineaciones = Alineacion::with('equipo')->orderBy('fecha', 'desc')->get();
    return view('alineacion.resumen', compact('alineaciones'));
}



    /**
     * Asignar un jugador a una posición.
     */
    public function asignarJugador(Request $request, $alineacionId)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'posicion_x' => 'required|integer',
            'posicion_y' => 'required|integer',
        ]);

        AlineacionJugador::updateOrCreate(
            [
                'alineacion_id' => $alineacionId,
                'jugador_id' => $request->jugador_id
            ],
            [
                'posicion_x' => $request->posicion_x,
                'posicion_y' => $request->posicion_y
            ]
        );

        return response()->json(['success' => true]);
    }

    /**
     * Eliminar un jugador de una alineación.
     */
    public function eliminarJugador($alineacionId, $jugadorId)
    {
        AlineacionJugador::where('alineacion_id', $alineacionId)
            ->where('jugador_id', $jugadorId)
            ->delete();

        return response()->json(['success' => true]);
    }
}

