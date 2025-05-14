@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Resumen de Alineaciones</h2>

    @foreach($alineaciones as $alineacion)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $alineacion->nombre ?? 'Sin nombre' }}</h5>
                <p><strong>Equipo:</strong> {{ $alineacion->equipo->nombre }}</p>
                <p><strong>Fecha:</strong> {{ $alineacion->fecha }}</p>
                <a href="{{ route('alineaciones.show', $alineacion->id) }}" class="btn btn-primary btn-sm">Ver</a>
            </div>
        </div>
    @endforeach
</div>
@endsection


