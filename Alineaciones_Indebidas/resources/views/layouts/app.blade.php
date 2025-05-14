<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Fútbol - @yield('title', 'Inicio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="bg-light">

<header class="bg-dark text-white py-3 mb-4 shadow-sm">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
            <h1 class="h3 mb-2 mb-md-0">Gestión de Plantillas de Fútbol</h1>
            <nav class="d-flex flex-wrap align-items-center">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm me-2">🏠 Inicio</a>
                <a href="{{ route('equipos.index') }}" class="btn btn-outline-light btn-sm me-2">🏟️ Equipos</a>
                <a href="{{ route('jugadores.index') }}" class="btn btn-outline-light btn-sm me-2">🏃 Jugadores</a>
                <a href="{{ route('nacionalidades.index') }}" class="btn btn-outline-light btn-sm me-2">🌍 Nacionalidades</a>
                <a href="{{ route('alineacion') }}" class="btn btn-outline-light btn-sm me-2"> ⚽ Alineaciones </a>

                <!-- Dropdown -->
                <div class="dropdown d-inline">
                    <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="menuOpciones" data-bs-toggle="dropdown" aria-expanded="false">
                        ⚙️ Opciones
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="menuOpciones">
                        <li><a class="dropdown-item" href="#">📊 Ver estadísticas</a></li>
                        <li><a class="dropdown-item" href="#">⬇️ Exportar datos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">❓ Ayuda</a></li>
                        <li><a class="dropdown-item" href="#">👤 Mi perfil</a></li>
                        <li><a class="dropdown-item" href="#">🔒 Cerrar sesión</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<main class="container">
    <div class="bg-white p-4 rounded shadow-sm">
        @yield('content')
    </div>
</main>

<footer class="bg-dark text-white text-center py-3 mt-4">
    <small>TFG GonzaloGacimartin &copy; 2025</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
