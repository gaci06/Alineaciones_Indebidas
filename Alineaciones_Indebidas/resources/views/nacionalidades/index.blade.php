{{-- resources/views/nacionalidad/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Nacionalidades')

@section('content')
    <h1>Nacionalidades</h1>

    <a href="{{ route('nacionalidades.create') }}" class="btn btn-primary">Crear Nacionalidad</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nacionalidades as $nacionalidad)
                <tr>
                    <td>{{ $nacionalidad->id }}</td>
                    <td>{{ $nacionalidad->nombre }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay nacionalidades registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
