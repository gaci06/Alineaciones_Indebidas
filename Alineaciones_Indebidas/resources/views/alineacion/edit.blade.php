@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Alineación</h1>

    <form action="{{ route('alineaciones.update', $alineacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select name="equipo_id" id="equipo_id" class="form-select" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $alineacion->equipo_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="{{ $alineacion->fecha }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la alineación</label>
            <input type="text" name="nombre" id="nombre" value="{{ $alineacion->nombre }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
