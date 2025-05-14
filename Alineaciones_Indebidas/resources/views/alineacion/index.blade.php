@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editor de Alineaciones</h1>

    <form action="{{ route('alineaciones.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select name="equipo_id" id="equipo_id" class="form-select" required>
                <option value="">Selecciona un equipo</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la alineación (opcional)</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Crear Alineación</button>
    </form>

    <a href="{{ route('alineaciones.resumen') }}" class="btn btn-secondary mb-4">Ver Alineaciones Guardadas</a>

</div>
@endsection