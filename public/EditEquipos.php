<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol - Otoño</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --naranja-principal: #FF9800;
      --naranja-oscuro: #E65100;
      --naranja-claro: #FFB74D;
      --marron: #5D4037;
      --crema: #FFF3E0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--crema);
    }

    .header-container {
      background-color: #212529;
      color: white;
      padding: 15px 0;
    }

    .navbar-otoño {
      background-color: #343a40;
    }

    .navbar-otoño .nav-link {
      color: white !important;
      margin: 0 5px;
      transition: all 0.3s;
      font-weight: 500;
    }

    .navbar-otoño .nav-link:hover {
      color: var(--naranja-principal) !important;
      transform: translateY(-2px);
    }

    .active-tab {
      background-color: var(--naranja-principal) !important;
      color: white !important;
      border-radius: 5px;
    }

    .main-content {
      background-color: var(--naranja-principal);
      border-radius: 10px;
      padding: 25px;
      margin-top: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-label {
      font-weight: bold;
      color: var(--marron);
    }

    .logo-container {
      border: 3px solid var(--naranja-oscuro);
      padding: 5px;
      background-color: white;
      border-radius: 8px;
    }

    .btn-otoño {
      background-color: var(--marron);
      color: white;
      border: none;
      transition: all 0.3s;
    }

    .btn-otoño:hover {
      background-color: var(--naranja-oscuro);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-action {
      background-color: white;
      color: var(--naranja-oscuro);
      border: 1px solid var(--naranja-oscuro);
      margin: 5px 0;
      transition: all 0.3s;
    }

    .btn-action:hover {
      background-color: var(--naranja-oscuro);
      color: white;
    }

    .leaf-icon {
      color: var(--naranja-oscuro);
      margin-right: 5px;
    }

    .page-title {
      font-weight: 700;
      letter-spacing: 1px;
    }

    .autumn-divider {
      height: 4px;
      background: linear-gradient(to right, var(--naranja-oscuro), var(--naranja-claro), var(--marron));
      margin: 15px 0;
      border-radius: 2px;
    }

    .footer {
      background-color: #212529;
      color: white;
      padding: 20px 0;
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header-container">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1 class="page-title">TORNEO DE VOLEIBOL OTOÑO</h1>
        </div>
        <div class="col-md-4 text-end">
          <button class="btn btn-outline-light"><i class="fas fa-user"></i> Cerrar Sesion</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-otoño">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-tab" href="#"><i class="fas fa-users"></i> Equipos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Partidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-key"></i> Permisos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-table"></i> Tabla de Posiciones</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <div class="main-content">
      <h2 class="text-center mb-4"><i class="fas fa-leaf leaf-icon"></i>EQUIPOS<i class="fas fa-leaf leaf-icon"></i></h2>
      <div class="autumn-divider"></div>

      <div class="row">
        <div class="col-md-6">
          <div class="mb-4">
            <label for="nombre" class="form-label">Nombre :</label>
            <input type="text" class="form-control" id="nombre">
          </div>

          <div class="mb-4">
            <label for="descripcion" class="form-label">Descripción :</label>
            <input type="text" class="form-control" id="descripcion">
          </div>

          <button class="btn btn-otoño mt-3">
            <i class="fas fa-list"></i> Listar Equipos
          </button>
        </div>

        <div class="col-md-6 text-center">
          <div class="mb-2">
            <label class="form-label">LOGO :</label>
          </div>
          <div class="d-flex justify-content-center mb-3">
            <div class="logo-container" style="width: 150px; height: 150px;">
              <img src="/api/placeholder/150/150" alt="Logo equipo" class="img-fluid">
            </div>
          </div>

          <div class="d-grid gap-2 col-8 mx-auto">
            <button class="btn btn-action">
              <i class="fas fa-save"></i> Registrar
            </button>
            <button class="btn btn-action">
              <i class="fas fa-edit"></i> Editar
            </button>
            <button class="btn btn-action">
              <i class="fas fa-trash"></i> Eliminar
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Additional Autumn-themed content -->
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card" style="background-color: var(--naranja-claro); border-color: var(--naranja-oscuro);">
          <div class="card-body text-center">
            <i class="fas fa-tree fa-3x mb-3" style="color: var(--marron);"></i>
            <h5 class="card-title">Próximos Partidos</h5>
            <p class="card-text">Consulta el calendario de la temporada de otoño.</p>
            <button class="btn btn-otoño btn-sm">Ver Calendario</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-color: var(--naranja-claro); border-color: var(--naranja-oscuro);">
          <div class="card-body text-center">
            <i class="fas fa-medal fa-3x mb-3" style="color: var(--marron);"></i>
            <h5 class="card-title">Equipos Destacados</h5>
            <p class="card-text">Conoce a los equipos con mejor desempeño.</p>
            <button class="btn btn-otoño btn-sm">Ver Destacados</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-color: var(--naranja-claro); border-color: var(--naranja-oscuro);">
          <div class="card-body text-center">
            <i class="fas fa-camera fa-3x mb-3" style="color: var(--marron);"></i>
            <h5 class="card-title">Galería de Fotos</h5>
            <p class="card-text">Revive los mejores momentos del torneo.</p>
            <button class="btn btn-otoño btn-sm">Ver Fotos</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5>Torneo de Voleibol - Temporada Otoño 2025</h5>
          <p>La mejor competición amistosa para disfrutar del deporte.</p>
        </div>
        <div class="col-md-3">
          <h5>Enlaces</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light">Reglamento</a></li>
            <li><a href="#" class="text-light">Sedes</a></li>
            <li><a href="#" class="text-light">Contacto</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Síguenos</h5>
          <div class="d-flex gap-3">
            <a href="#" class="text-light"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#" class="text-light"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="#" class="text-light"><i class="fab fa-twitter fa-2x"></i></a>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
          <p class="mb-0">© 2025 Torneo de Voleibol Otoño. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
