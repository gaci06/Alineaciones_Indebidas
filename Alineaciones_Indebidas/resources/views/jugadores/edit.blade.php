{{-- resources/views/jugadores/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Jugador')

@section('content')
    <h1 class="mb-4">Editar Jugador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Se encontraron errores:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Jugador</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="{{ old('nombre', $jugador->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido del Jugador</label>
            <input type="text" name="apellido" id="apellido" class="form-control" 
                   value="{{ old('apellido', $jugador->apellido) }}" required>
        </div>

        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select name="equipo_id" id="equipo_id" class="form-select">
                <option value="">-- Selecciona un equipo --</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}"
                        {{ (old('equipo_id', $jugador->equipo_id) == $equipo->id) ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nacionalidad_id" class="form-label">Nacionalidad</label>
            <select name="nacionalidad_id" id="nacionalidad_id" class="form-select">
                <option value="">-- Selecciona una nacionalidad --</option>
                @foreach($nacionalidades as $nacionalidad)
                    <option value="{{ $nacionalidad->id }}"
                        {{ (old('nacionalidad_id', $jugador->nacionalidad_id) == $nacionalidad->id) ? 'selected' : '' }}>
                        {{ $nacionalidad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="posicion" class="form-label">Posición</label>
            <select name="posicion" id="posicion" class="form-select" required>
                <option value="">-- Selecciona una posición --</option>
                <option value="Portero" {{ old('posicion', $jugador->posicion) == 'Portero' ? 'selected' : '' }}>Portero</option>
                <option value="Defensa" {{ old('posicion', $jugador->posicion) == 'Defensa' ? 'selected' : '' }}>Defensa</option>
                <option value="Mediocentro" {{ old('posicion') == 'Mediocentro' ? 'selected' : '' }}>Mediocentro</option>
                <option value="Delantero" {{ old('posicion', $jugador->posicion) == 'Delantero' ? 'selected' : '' }}>Delantero</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('jugadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
