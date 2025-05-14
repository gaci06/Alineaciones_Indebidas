<?php
namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Nacionalidad;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        // Podemos cargar la relación con nacionalidad y equipo:
        $jugadores = Jugador::with('nacionalidad', 'equipo')->get();
        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        // Para un formulario de creación, necesitaremos listar nacionalidades y equipos
        $nacionalidades = Nacionalidad::all();
        $equipos = Equipo::all();
        return view('jugadores.create', compact('nacionalidades', 'equipos'));
    }

    public function store(Request $request)
    {
        // Validamos los campos existentes en la tabla jugadores
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'nacionalidad_id'  => 'required|exists:nacionalidad,id',
            'equipo_id'        => 'required|exists:equipo,id',
            'posicion'         => 'required|in:Portero,Defensa,Mediocentro,Delantero'
        ]);

        // Creamos el jugador
        Jugador::create($request->all());

        return redirect()->route('jugadores.index');
    }

    public function edit(Jugador $jugador)
    {
        $nacionalidades = Nacionalidad::all();
        $equipos = Equipo::all();
        // Pasamos también el $jugador
        return view('jugadores.edit', compact('jugador', 'nacionalidades', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'nacionalidad_id'  => 'required|exists:nacionalidad,id',
            'equipo_id'        => 'required|exists:equipo,id',
            'posicion'         => 'required|in:Portero,Defensa,Mediocentro,Delantero'
        ]);

        $jugador->update($request->all());

        return redirect()->route('jugadores.index');
    }

    public function show(Jugador $jugador)
    {
        return view('jugadores.show', compact('jugador'));
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
