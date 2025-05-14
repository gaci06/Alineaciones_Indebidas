@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <h1 class="mb-4">Editar Equipo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Se encontraron errores:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.update', $equipo) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del equipo</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $equipo->nombre) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    </form>
@endsection
