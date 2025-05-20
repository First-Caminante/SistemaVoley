<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol - Partidos</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap Datepicker -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <style>
    :root {
      --naranja-principal: #FF9800;
      --naranja-oscuro: #E65100;
      --naranja-claro: #FFB74D;
      --marron: #5D4037;
      --crema: #FFF3E0;
      --turquesa: #00BCD4;
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

    .team-logo {
      border: 4px solid white;
      border-radius: 10px;
      width: 120px;
      height: 120px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .team-logo-1 {
      background-color: var(--naranja-claro);
    }

    .team-logo-2 {
      background-color: var(--turquesa);
    }

    .versus-text {
      font-size: 3rem;
      font-weight: bold;
      color: #E65100;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .btn-otoño {
      background-color: white;
      color: var(--naranja-oscuro);
      border: 1px solid var(--naranja-oscuro);
      transition: all 0.3s;
      font-weight: 500;
      margin: 5px;
    }

    .btn-otoño:hover {
      background-color: var(--naranja-oscuro);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .date-picker-wrapper {
      position: relative;
    }

    .date-picker-wrapper .input-group-text {
      background-color: var(--naranja-oscuro);
      color: white;
      border: none;
    }

    .date-picker-wrapper .form-control {
      border-color: var(--naranja-claro);
    }

    .score-input {
      font-size: 1.3rem;
      font-weight: bold;
      text-align: center;
      border: 2px solid var(--naranja-oscuro);
    }

    .nav-item {
      margin-right: 3px;
    }

    .autumn-divider {
      height: 4px;
      background: linear-gradient(to right, var(--naranja-oscuro), var(--naranja-claro), var(--marron));
      margin: 15px 0;
      border-radius: 2px;
    }

    .leaf-icon {
      color: var(--naranja-oscuro);
      margin-right: 5px;
    }

    .footer {
      background-color: #212529;
      color: white;
      padding: 20px 0;
      margin-top: 30px;
    }

    .team-select {
      border: 2px solid var(--naranja-oscuro);
      font-weight: 500;
    }

    .action-buttons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
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
          <button class="btn btn-outline-light"><i class="fas fa-user"></i> Cerrar sesión</button>
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
            <a class="nav-link" href="#"><i class="fas fa-users"></i> Equipos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-tab" href="#"><i class="fas fa-calendar-alt"></i> Partidos</a>
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
      <h2 class="text-center mb-4"><i class="fas fa-leaf leaf-icon"></i>PARTIDOS<i class="fas fa-leaf leaf-icon"></i></h2>
      <div class="autumn-divider"></div>

      <div class="row mt-4">
        <!-- Equipo 1 -->
        <div class="col-md-4">
          <div class="mb-3">
            <label for="equipo1" class="form-label">Equipo 1:</label>
            <select class="form-select team-select" id="equipo1">
              <option>Team Caballos</option>
              <option>Team Águilas</option>
              <option>Team Leones</option>
              <option>Team Tigres</option>
            </select>
          </div>

          <div class="team-logo team-logo-1">
            <img src="/api/placeholder/120/120" alt="Logo equipo 1" class="img-fluid">
          </div>

          <div class="mt-4">
            <label for="resultado1" class="form-label">Resultado Equipo 1:</label>
            <input type="number" class="form-control score-input" id="resultado1" value="0" min="0">
          </div>
        </div>

        <!-- Fecha y VS -->
        <div class="col-md-4 text-center">
          <div class="mb-4">
            <label for="fecha" class="form-label">Fecha:</label>
            <div class="date-picker-wrapper">
              <div class="input-group">
                <input type="text" class="form-control datepicker" id="fecha" placeholder="DD/MM/AAAA">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="height: 120px;">
            <div class="versus-text">VS</div>
          </div>

          <div class="action-buttons">
            <button class="btn btn-otoño">
              <i class="fas fa-save"></i> Registrar Partido
            </button>
            <button class="btn btn-otoño">
              <i class="fas fa-edit"></i> Editar
            </button>
          </div>
        </div>

        <!-- Equipo 2 -->
        <div class="col-md-4">
          <div class="mb-3">
            <label for="equipo2" class="form-label">Equipo 2:</label>
            <select class="form-select team-select" id="equipo2">
              <option>Team Píldoras</option>
              <option>Team Delfines</option>
              <option>Team Halcones</option>
              <option>Team Lobos</option>
            </select>
          </div>

          <div class="team-logo team-logo-2">
            <img src="/api/placeholder/120/120" alt="Logo equipo 2" class="img-fluid">
          </div>

          <div class="mt-4">
            <label for="resultado2" class="form-label">Resultado Equipo 2:</label>
            <input type="number" class="form-control score-input" id="resultado2" value="0" min="0">
          </div>
        </div>
      </div>
    </div>

    <!-- Additional Autumn-themed content -->
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card" style="background-color: var(--naranja-claro); border-color: var(--naranja-oscuro);">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-calendar-check"></i> Próximos Encuentros</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="background-color: transparent;">Team Caballos vs Team Águilas - 25/05/2025</li>
              <li class="list-group-item" style="background-color: transparent;">Team Lobos vs Team Píldoras - 28/05/2025</li>
              <li class="list-group-item" style="background-color: transparent;">Team Tigres vs Team Delfines - 30/05/2025</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card" style="background-color: var(--naranja-claro); border-color: var(--naranja-oscuro);">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-trophy"></i> Resultados Recientes</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="background-color: transparent;">Team Halcones 3 - 1 Team Leones</li>
              <li class="list-group-item" style="background-color: transparent;">Team Tigres 2 - 3 Team Caballos</li>
              <li class="list-group-item" style="background-color: transparent;">Team Píldoras 3 - 0 Team Águilas</li>
            </ul>
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
  <!-- jQuery (required for datepicker) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        startDate: 'today'
      });
    });
  </script>
</body>

</html>
