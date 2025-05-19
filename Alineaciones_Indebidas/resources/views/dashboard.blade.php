@extends('layouts.app')

@section('title', 'Panel Principal')


<head>
    <style>
        /* Limita el ancho del carrusel y lo centra */
#funcionalidadesCarousel {
  max-width: 1000px;
  margin: 0 auto;
}

/* Fija la altura de las imágenes y usa object-fit para que no se deformen */
#funcionalidadesCarousel .carousel-item img {
  height: 785px;
  object-fit: cover;
}

    </style>
</head>
@section('content')
    <div class="mb-5 text-center">
        <h1 class="display-5 fw-bold">ALINEACIONES INDEBIDAS</h1>
    </div>

        <div id="funcionalidadesCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="7000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>

    <div class="carousel-inner rounded shadow">
        <!-- Slide 1 -->
        <div class="carousel-item active">
        <img src="images/ChatGPT Image 5 may 2025, 16_41_03.png" class="d-block w-100" alt="Crear Alineaciones">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
            <h5>Crea tus alineaciones como quieras</h5>
            <p>Elige la formación, coloca jugadores en el campo y diseña tu equipo ideal con total libertad.</p>
        </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
        <img src="images/ChatGPT Image 19 may 2025, 10_44_31.png" class="d-block w-100" alt="Editar Alineaciones">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
            <h5>Edita y ajusta con facilidad</h5>
            <p>Modifica tus alineaciones en segundos, con múltiples opciones y plantillas para adaptarte a cualquier estilo de juego.</p>
        </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
        <img src="images/ChatGPT Image 5 may 2025, 16_59_34.png" class="d-block w-100" alt="Añadir Jugadores">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
            <h5>Añade tus propios jugadores</h5>
            <p>Personaliza tu experiencia registrando los jugadores reales de tu equipo y úsalos en tus alineaciones.</p>
        </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item">
        <img src="images/ChatGPT Image 19 may 2025, 10_34_29.png" class="d-block w-100" alt="Equipos Personalizados">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
            <h5>Gestiona tus propios equipos</h5>
            <p>Crea equipos personalizados con escudos, nombres y colores, ¡hazlo tan real como tú quieras!</p>
        </div>
        </div>

        <!-- Slide 5 -->
        <div class="carousel-item">
        <img src="images/ChatGPT Image 19 may 2025, 10_40_07.png" class="d-block w-100" alt="Sugerencias y Feedback">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
            <h5>¿Tienes ideas? ¡Queremos escucharlas!</h5>
            <p>Envía sugerencias para mejorar la app y ayúdanos a crecer contigo. ¡Tu opinión cuenta!</p>
        </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#funcionalidadesCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    </div>


    <div class="row g-4">
        <!-- Crear Alineación -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('alineaciones.index') }}" class="text-decoration-none text-dark">
                <div class="card custom-hover shadow-sm h-100" style="border: 1px solid #9b59b6;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-plus-square-dotted"></i> Crear Alineación</h5>
                        <p class="card-text">Crea y organiza tus alineaciones en el editor visual.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Revisar Mis Alineaciones -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('alineaciones.resumen') }}" class="text-decoration-none text-dark">
                <div class="card custom-hover border-success shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-layout-text-window-reverse"></i> Mis Alineaciones</h5>
                        <p class="card-text">Revisa y administra tus alineaciones guardadas.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Mi Perfil -->
        <div class="col-md-6 col-lg-4">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card custom-hover border-info shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-circle"></i> Perfil</h5>
                        <p class="card-text">Consulta y edita tu perfil de usuario.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <style>
        .custom-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-hover:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 0.75rem 1.25rem rgba(0, 0, 0, 0.15);
            cursor: pointer;
        }
    </style>
@endsection
