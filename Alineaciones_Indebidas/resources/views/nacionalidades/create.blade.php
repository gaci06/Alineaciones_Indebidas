{{-- resources/views/nacionalidad/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Nacionalidad')

@section('content')
    <h1>Crear Nacionalidad</h1>

    {{-- Validación de errores --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para crear una nacionalidad --}}
    <form action="{{ route('nacionalidades.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="{{ old('nombre') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('nacionalidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
