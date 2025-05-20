<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #e67e22;
      --secondary-color: #d35400;
      --light-color: #fff3e0;
      --dark-color: #4a4a4a;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--light-color);
    }

    .navbar {
      background-color: var(--dark-color);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .nav-link {
      font-weight: 500;
      color: var(--light-color) !important;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      color: var(--primary-color) !important;
      transform: translateY(-2px);
    }

    .btn-custom {
      background-color: var(--primary-color);
      border: none;
      border-radius: 25px;
      padding: 8px 20px;
      transition: all 0.3s ease;
      color: white;
      font-weight: 600;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-custom:hover {
      background-color: var(--secondary-color);
      transform: translateY(-3px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 80px 0;
      color: white;
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('/api/placeholder/1200/400') center/cover;
      opacity: 0.1;
      z-index: 0;
    }

    .team-logo {
      transition: all 0.4s ease;
      max-height: 180px;
      filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.2));
    }

    .team-card {
      background-color: white;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
      border: none;
      padding: 1.5rem;
      height: 100%;
    }

    .team-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .team-card:hover .team-logo {
      transform: scale(1.05);
    }

    .team-name {
      color: var(--dark-color);
      font-weight: 700;
      margin-top: 16px;
    }

    .upcoming-matches {
      background-color: white;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      margin-top: 3rem;
    }

    .section-title {
      color: var(--dark-color);
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .match-item {
      border-left: 4px solid var(--primary-color);
      padding-left: 15px;
      margin-bottom: 15px;
    }

    footer {
      background-color: var(--dark-color);
      color: white;
      padding: 2rem 0;
      margin-top: 4rem;
    }

    .footer-text {
      font-size: 0.9rem;
    }

    .social-icons i {
      font-size: 1.5rem;
      margin-right: 15px;
      color: var(--light-color);
      transition: all 0.3s ease;
    }

    .social-icons i:hover {
      color: var(--primary-color);
      transform: translateY(-3px);
    }

    .count-box {
      background-color: rgba(255, 255, 255, 0.2);
      padding: 1.5rem;
      border-radius: 12px;
      text-align: center;
      margin-top: 2rem;
    }

    .count-number {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .count-label {
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
  </style>
</head>

<body>
  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">TORNEO DE VOLEIBOL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Resultados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tabla Posiciones</a>
          </li>
          <li class="nav-item ms-lg-3">
            <a class="btn btn-custom" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Cabecera / Hero -->
  <header>
    <div class="container position-relative">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <h1 class="display-4 fw-bold mb-4">¡BIENVENIDOS AL GRAN TORNEO DE VOLEIBOL!</h1>
          <p class="lead mb-4">Experimenta la pasión, la energía y la competencia de los mejores equipos de voleibol en un torneo lleno de emociones.</p>
          <div class="d-flex gap-3">
            <a href="#" class="btn btn-light btn-lg">Ver Calendario</a>
            <a href="#" class="btn btn-outline-light btn-lg">Conoce los Equipos</a>
          </div>

          <div class="row mt-5">
            <div class="col-4">
              <div class="count-box">
                <div class="count-number">0</div>
                <div class="count-label">Equipos</div>
              </div>
            </div>
            <div class="col-4">
              <div class="count-box">
                <div class="count-number">0</div>
                <div class="count-label">Partidos</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block">
          <img src="images/eispdm.jpg" alt="Voleibol" class="img-fluid rounded-circle" style="filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));">
        </div>
      </div>
    </div>
  </header>

  <!-- Sección de Equipos Destacados -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center section-title mb-5">EQUIPOS DESTACADOS</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="team-card text-center">
            <img src="/api/placeholder/200/200" alt="Equipo Karasuno" class="team-logo">
            <h3 class="team-name">KARASUNO</h3>
            <p class="text-muted">Los cuervos voladores, conocidos por su resistencia y ataques rápidos.</p>
            <a href="#" class="btn btn-custom mt-3">Ver Equipo</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-card text-center">
            <img src="/api/placeholder/200/200" alt="Equipo Aoba Johsai" class="team-logo">
            <h3 class="team-name">AOBA JOHSAI</h3>
            <p class="text-muted">Un equipo de élite con estrategias altamente refinadas y técnica impecable.</p>
            <a href="#" class="btn btn-custom mt-3">Ver Equipo</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-card text-center">
            <img src="/api/placeholder/200/200" alt="Equipo Shiratorizawa" class="team-logo">
            <h3 class="team-name">SHIRATORIZAWA</h3>
            <p class="text-muted">Campeones defensivos, conocidos por su poderoso juego y espíritu indomable.</p>
            <a href="#" class="btn btn-custom mt-3">Ver Equipo</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Próximos Partidos -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="upcoming-matches">
        <h2 class="section-title">PRÓXIMOS PARTIDOS</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="match-item">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4>Karasuno vs Aoba Johsai</h4>
                  <p class="mb-0"><i class="far fa-calendar me-2"></i> 25 de Mayo, 2025</p>
                  <p class="mb-0"><i class="far fa-clock me-2"></i> 18:00 hrs</p>
                </div>
                <a href="#" class="btn btn-sm btn-custom">Detalles</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="match-item">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4>Shiratorizawa vs Nekoma</h4>
                  <p class="mb-0"><i class="far fa-calendar me-2"></i> 27 de Mayo, 2025</p>
                  <p class="mb-0"><i class="far fa-clock me-2"></i> 19:30 hrs</p>
                </div>
                <a href="#" class="btn btn-sm btn-custom">Detalles</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="match-item">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4>Fukurodani vs Date Tech</h4>
                  <p class="mb-0"><i class="far fa-calendar me-2"></i> 28 de Mayo, 2025</p>
                  <p class="mb-0"><i class="far fa-clock me-2"></i> 17:00 hrs</p>
                </div>
                <a href="#" class="btn btn-sm btn-custom">Detalles</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="match-item">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4>Inarizaki vs Itachiyama</h4>
                  <p class="mb-0"><i class="far fa-calendar me-2"></i> 30 de Mayo, 2025</p>
                  <p class="mb-0"><i class="far fa-clock me-2"></i> 20:00 hrs</p>
                </div>
                <a href="#" class="btn btn-sm btn-custom">Detalles</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Galería de Fotos -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center section-title mb-5">MOMENTOS DESTACADOS</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <img src="/api/placeholder/400/300" alt="Partido destacado" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-4">
          <img src="/api/placeholder/400/300" alt="Partido destacado" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-4">
          <img src="/api/placeholder/400/300" alt="Partido destacado" class="img-fluid rounded shadow-sm">
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="mb-3">TORNEO DE VOLEIBOL</h5>
          <p class="footer-text">El mejor campeonato de voleibol con los equipos más competitivos y apasionantes partidos.</p>
        </div>
        <div class="col-md-4">
          <h5 class="mb-3">ENLACES RÁPIDOS</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-decoration-none">Inicio</a></li>
            <li><a href="#" class="text-white text-decoration-none">Equipos</a></li>
            <li><a href="#" class="text-white text-decoration-none">Calendario</a></li>
            <li><a href="#" class="text-white text-decoration-none">Resultados</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 class="mb-3">SÍGUENOS</h5>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <hr class="mt-4 mb-4" style="background-color: rgba(255, 255, 255, 0.2);">
      <p class="text-center mb-0">&copy; 2025 Torneo de Voleibol. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
