{{-- resources/views/jugadores/index.blade.php --}}
@extends('layouts.app') 
{{-- Si usas un layout llamado app.blade.php --}}

@section('title', 'Listado de Jugadores')

@section('content')
    <h1>Jugadores</h1>

    {{-- Botón para ir a la vista de creación de un nuevo jugador --}}
    <a href="{{ route('jugadores.create') }}" class="btn btn-primary">Crear Jugador</a>

    {{-- Tabla de jugadores (ejemplo con columnas básicas) --}}
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Nacionalidad</th>
                <th>Posición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->nombre }} {{ $jugador->apellido }}</td>
                    <td>{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</td>
                    <td>{{ $jugador->nacionalidad->nombre ?? 'Sin nacionalidad' }}</td>
                    <td>{{ $jugador->posicion ?? 'Sin posición' }}</td>
                    <td>
                        <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        
                        <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este jugador?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay jugadores registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
