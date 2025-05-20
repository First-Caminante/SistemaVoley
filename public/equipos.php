<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol - Equipos</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fff3e0;
    }

    .navbar {
      background-color: #333;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .btn-dark {
      background-color: #333;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-dark:hover {
      background-color: #555;
    }

    .main-container {
      background-color: #ff9800;
      /* Naranja otoñal */
      min-height: calc(100vh - 56px);
      padding: 20px;
    }

    .title {
      text-align: center;
      margin-bottom: 40px;
      color: #333;
      font-weight: bold;
    }

    .team-item {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }

    .team-logo {
      width: 120px;
      height: 120px;
      object-fit: contain;
      margin-right: 40px;
    }

    .team-name {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .login-btn {
      color: #fff;
      text-decoration: none;
      padding: 5px 15px;
      border-radius: 4px;
      background-color: #333;
      transition: all 0.3s ease;
    }

    .login-btn:hover {
      background-color: #555;
      color: #fff;
    }
  </style>
</head>

<body>
  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">TORNEO DE VOLEIBOL</a>
      <div class="ms-auto">
        <a href="#" class="login-btn">Login</a>
      </div>
    </div>
  </nav>

  <!-- Menú de navegación secundario -->
  <div class="container-fluid bg-light py-2">
    <div class="container">
      <div class="d-flex gap-2">
        <a href="#" class="btn btn-dark btn-sm">Equipos</a>
        <a href="#" class="btn btn-dark btn-sm">Fixture</a>
        <a href="#" class="btn btn-dark btn-sm">Resultados</a>
        <a href="#" class="btn btn-dark btn-sm">Tabla Posiciones</a>
        <a href="#" class="btn btn-dark btn-sm">Inicio</a>
      </div>
    </div>
  </div>

  <!-- Contenido principal -->
  <div class="main-container">
    <div class="container">
      <h1 class="title">EQUIPOS!!!</h1>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Karasuno" class="team-logo">
        <div class="team-name">KARASUNO</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Aoba Johsai" class="team-logo">
        <div class="team-name">AOBA JOHSAI</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Shiratorizawa" class="team-logo">
        <div class="team-name">SHIRATORIZAWA</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Nekoma" class="team-logo">
        <div class="team-name">NEKOMA</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Fukurodani" class="team-logo">
        <div class="team-name">FUKURODANI</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Date Tech" class="team-logo">
        <div class="team-name">DATE TECH</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Inarizaki" class="team-logo">
        <div class="team-name">INARIZAKI</div>
      </div>

      <div class="team-item">
        <img src="/api/placeholder/120/120" alt="Itachiyama" class="team-logo">
        <div class="team-name">ITACHIYAMA</div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
