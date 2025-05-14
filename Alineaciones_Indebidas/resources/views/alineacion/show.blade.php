@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Alineación: {{ $alineacion->nombre ?? 'Sin nombre' }}</h2>
    <p><strong>Equipo:</strong> {{ $alineacion->equipo->nombre }} | <strong>Fecha:</strong> {{ $alineacion->fecha }}</p>

    <div class="row">
        <div class="col-md-4">
            <h5>Jugadores disponibles</h5>
            <ul id="jugadores-disponibles" class="list-group">
                @foreach($alineacion->equipo->jugadores as $jugador)
                    @unless($alineacion->jugadoresAsignados->pluck('jugador_id')->contains($jugador->id))
                        <li class="list-group-item jugador" draggable="true"
                            data-id="{{ $jugador->id }}">{{ $jugador->nombre }}</li>
                    @endunless
                @endforeach
            </ul>
        </div>

        <div class="col-md-8">
            <h5>Campo de fútbol</h5>
            <div id="campo" style="position: relative; width: 100%; height: 500px; background: url('/images/assets_task_01jshx7tfcfqsb84j7s0c5aqq1_img_1.webp') no-repeat center; background-size: cover; border: 1px solid #ccc;">
                @foreach($alineacion->jugadoresAsignados as $jugador)
                    <div class="jugador-colocado"
                         style="position: absolute; top: {{ $jugador->posicion_y }}px; left: {{ $jugador->posicion_x }}px;"
                         data-id="{{ $jugador->jugador->id }}"
                         draggable="true">
                        {{ $jugador->jugador->nombre }}
                    </div>
                @endforeach
            </div>
        </div>
        <form action="{{ route('alineaciones.update', $alineacion->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <input type="hidden" name="equipo_id" value="{{ $alineacion->equipo->id }}">
            <input type="hidden" name="fecha" value="{{ $alineacion->fecha }}">
            <input type="hidden" name="nombre" value="{{ $alineacion->nombre }}">

            <button type="submit" class="btn btn-success">Guardar cambios</button>
        </form>


    </div>
</div>

<style>
    .jugador { cursor: grab; }
    .jugador-colocado {
        background-color: #ffffffaa;
        padding: 5px 10px;
        border-radius: 6px;
        border: 1px solid #333;
        cursor: move;
    }
</style>

<script>
    document.querySelectorAll('.jugador, .jugador-colocado').forEach(el => {
        el.addEventListener('dragstart', e => {
            e.dataTransfer.setData('jugadorId', el.dataset.id);
        });
    });

    const campo = document.getElementById('campo');
    campo.addEventListener('dragover', e => e.preventDefault());

    campo.addEventListener('drop', e => {
        e.preventDefault();
        const jugadorId = e.dataTransfer.getData('jugadorId');
        const x = e.offsetX;
        const y = e.offsetY;

        // Llamada AJAX para guardar la posición
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route('alineaciones.asignarJugador', $alineacion->id) }}', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.send(JSON.stringify({ jugador_id: jugadorId, posicion_x: x, posicion_y: y }));

        xhr.onload = () => {
            if (xhr.status === 200) location.reload(); // Refresca para ver cambios
        };
    });
</script>
@endsection
