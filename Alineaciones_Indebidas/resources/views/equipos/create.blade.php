@extends('layouts.app')

@section('title', 'Crear Nuevo Equipo')

@section('content')
    <h1 class="mb-4">Crear Nuevo Equipo</h1>

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

    <form action="{{ route('equipos.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del equipo</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    </form>
@endsection
