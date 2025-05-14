@extends('layouts.app')

@section('title', 'Listado de Equipos')

@section('content')
    <h1>Equipos</h1>

    <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">➕ Crear nuevo equipo</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-sm btn-warning">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
