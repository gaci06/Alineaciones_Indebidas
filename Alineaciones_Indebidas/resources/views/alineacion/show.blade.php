@extends('layouts.app')

@section('content')
<div class="container-fluid"> <!-- Cambiado a container-fluid para más ancho -->
    <h2 class="mb-3">Alineación: {{ $alineacion->nombre ?? 'Sin nombre' }}</h2>
    <p class="mb-2"><strong>Equipo:</strong> {{ $alineacion->equipo->nombre }} | <strong>Fecha:</strong> {{ $alineacion->fecha }}</p>

    <div class="row mt-3" id="campo-container">
        <!-- Columna de jugadores disponibles -->
        <div class="col-lg-2 col-md-3"> <!-- Más estrecha para dar prioridad al campo -->
            <div class="jugadores-disponibles-container sticky-top" style="top: 20px;">
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
        </div>

        <!-- Campo de fútbol -->
        <div class="col-lg-10 col-md-9">
            <div id="campo">
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
    </div>

    <!-- Formulario fijo en la parte inferior -->
    <form action="{{ route('alineaciones.update', $alineacion->id) }}" method="POST" class="fixed-bottom bg-white p-3 shadow">
        @csrf
        @method('PUT')

        <input type="hidden" name="equipo_id" value="{{ $alineacion->equipo->id }}">
        <input type="hidden" name="fecha" value="{{ $alineacion->fecha }}">
        <input type="hidden" name="nombre" value="{{ $alineacion->nombre }}">

        <button type="submit" class="btn btn-success">Guardar cambios</button>
    </form>
</div>

<style>
    /* Estilos generales */
    body {
        padding-bottom: 100px; 
    }
    
    /* Estilos para los jugadores */
    .jugador { 
        cursor: grab;
        margin-bottom: 5px;
        transition: all 0.2s;
    }
    
    .jugador:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .jugador-colocado {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 5px 10px;
        border-radius: 6px;
        border: 1px solid #333;
        cursor: move;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.2s;
    }
    
    .jugador-colocado:hover {
        transform: scale(1.05);
        z-index: 100;
    }
    
    /* Estilos para el contenedor del campo */
    #campo-container {
        margin-top: -10px;
        height: calc(100vh - 220px);
    }
    
    /* Estilos para el campo de fútbol */
    #campo {
        position: relative;
        width: 100%;
        height: 100%;
        min-height: 600px;
        background: url('/images/assets_task_01jshx7tfcfqsb84j7s0c5aqq1_img_1.webp') no-repeat center;
        background-size: contain;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    
    /* Contenedor de jugadores disponibles */
    .jugadores-disponibles-container {
        height: calc(100vh - 250px);
        overflow-y: auto;
        padding-right: 10px;
    }
    
    /* Responsividad */
    @media (max-width: 999px) {
        #campo-container {
            height: auto;
        }
        
        #campo {
            height: 70vh;
            min-height: 400px;
        }
        
        .jugadores-disponibles-container {
            height: 200px;
            margin-bottom: 20px;
        }
    }
    
    @media (max-width: 768px) {
        #campo {
            height: 60vh;
        }
    }
</style>

<script>
    // Drag and Drop
    document.querySelectorAll('.jugador, .jugador-colocado').forEach(el => {
        el.addEventListener('dragstart', e => {
            e.dataTransfer.setData('jugadorId', el.dataset.id);
            e.target.classList.add('dragging');
        });
        
        el.addEventListener('dragend', e => {
            e.target.classList.remove('dragging');
        });
    });

    const campo = document.getElementById('campo');
    campo.addEventListener('dragover', e => {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
    });

    campo.addEventListener('drop', e => {
        e.preventDefault();
        const jugadorId = e.dataTransfer.getData('jugadorId');
        const x = e.offsetX;
        const y = e.offsetY;

        // Feedback visual temporal
        const feedback = document.createElement('div');
        feedback.className = 'jugador-colocado';
        feedback.style.left = `${x}px`;
        feedback.style.top = `${y}px`;
        feedback.innerHTML = 'Colocando...';
        campo.appendChild(feedback);

        // Llamada AJAX para guardar la posición
        fetch('{{ route('alineaciones.asignarJugador', $alineacion->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ 
                jugador_id: jugadorId, 
                posicion_x: x, 
                posicion_y: y 
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                feedback.remove();
                alert('Error al colocar jugador');
            }
        })
        .catch(error => {
            feedback.remove();
            console.error('Error:', error);
        });
    });
</script>
@endsection