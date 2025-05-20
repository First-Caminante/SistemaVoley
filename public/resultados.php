<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .header {
      background-color: #222;
      color: white;
      padding: 15px 20px;
    }

    .nav-menu {
      background-color: #f5f5f5;
      border-bottom: 1px solid #ddd;
      padding: 5px;
    }

    .nav-button {
      background-color: #333;
      color: white;
      border: none;
      padding: 8px 15px;
      margin: 2px;
      border-radius: 4px;
    }

    .nav-button:hover {
      background-color: #444;
    }

    .results-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 20px;
    }

    .results-card {
      background-color: #ff9800;
      border-radius: 0;
      margin-bottom: 20px;
      padding: 15px;
    }

    .results-title {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
    }

    .match-date {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      font-size: 14px;
      color: #333;
    }

    .team-logo {
      width: 100px;
      height: 100px;
      background-color: white;
      padding: 5px;
      margin: 0 auto;
    }

    .team-logo img {
      max-width: 100%;
      max-height: 100%;
    }

    .team-name {
      font-weight: bold;
      color: #222;
      text-align: center;
      margin-top: 10px;
    }

    .vs {
      font-size: 28px;
      font-weight: bold;
      color: #333;
      text-align: center;
    }

    .score {
      font-size: 24px;
      font-weight: bold;
      background-color: white;
      width: 40px;
      height: 40px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px auto;
    }

    .login-btn {
      color: white;
      text-decoration: none;
    }

    .autumn-leaves {
      position: fixed;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
      opacity: 0.4;
    }

    .leaf {
      position: absolute;
      width: 15px;
      height: 15px;
      background-color: #d35400;
      border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
      animation: falling 10s infinite linear;
    }

    .leaf:nth-child(2n) {
      background-color: #e67e22;
      animation-duration: 12s;
      width: 18px;
      height: 18px;
    }

    .leaf:nth-child(3n) {
      background-color: #f39c12;
      animation-duration: 13s;
      animation-delay: 2s;
      width: 12px;
      height: 12px;
    }

    .leaf:nth-child(4n) {
      background-color: #c0392b;
      animation-duration: 15s;
      animation-delay: 1s;
    }

    @keyframes falling {
      0% {
        top: -10px;
        left: 50%;
        transform: rotate(0deg) scale(1);
      }

      100% {
        top: 100%;
        left: calc(50% - 50px);
        transform: rotate(360deg) scale(0.7);
      }
    }

    @media (max-width: 768px) {
      .team-logo {
        width: 80px;
        height: 80px;
      }

      .vs {
        font-size: 22px;
      }

      .score {
        font-size: 20px;
        width: 35px;
        height: 35px;
      }
    }
  </style>
</head>

<body>
  <div class="autumn-leaves">
    <div class="leaf" style="left: 10%; animation-delay: 1s;"></div>
    <div class="leaf" style="left: 20%; animation-delay: 3s;"></div>
    <div class="leaf" style="left: 35%; animation-delay: 5s;"></div>
    <div class="leaf" style="left: 50%; animation-delay: 2s;"></div>
    <div class="leaf" style="left: 65%; animation-delay: 4s;"></div>
    <div class="leaf" style="left: 80%; animation-delay: 6s;"></div>
    <div class="leaf" style="left: 90%; animation-delay: 3s;"></div>
    <div class="leaf" style="left: 15%; animation-delay: 7s;"></div>
    <div class="leaf" style="left: 45%; animation-delay: 5s;"></div>
    <div class="leaf" style="left: 75%; animation-delay: 2s;"></div>
  </div>

  <div class="header d-flex justify-content-between align-items-center">
    <h1 class="mb-0">TORNEO DE VOLEIBOL</h1>
    <a href="#" class="login-btn">Login</a>
  </div>

  <div class="nav-menu d-flex flex-wrap">
    <button class="nav-button">Equipos</button>
    <button class="nav-button">Fixture</button>
    <button class="nav-button">Resultados</button>
    <button class="nav-button">Tabla Posiciones</button>
    <button class="nav-button">Inicio</button>
  </div>

  <div class="results-container">
    <div class="results-card">
      <h2 class="results-title">RESULTADOS !!!</h2>
      <div class="match-date">Fecha: 15/05/2025</div>

      <div class="row mb-5">
        <div class="col-4 col-md-4">
          <div class="team-logo">
            <img src="/api/placeholder/100/100" alt="KARASUNO" />
          </div>
          <div class="team-name">KARASUNO</div>
          <div class="score">2</div>
        </div>

        <div class="col-4 col-md-4 d-flex align-items-center justify-content-center">
          <div class="vs">VS</div>
        </div>

        <div class="col-4 col-md-4">
          <div class="team-logo">
            <img src="/api/placeholder/100/100" alt="AOBA JOHSAI" />
          </div>
          <div class="team-name">AOBA JOHSAI</div>
          <div class="score">1</div>
        </div>
      </div>

      <div class="row">
        <div class="col-4 col-md-4">
          <div class="team-logo">
            <img src="/api/placeholder/100/100" alt="SHIRATORIZAWA" />
          </div>
          <div class="team-name">SHIRATORIZAWA</div>
          <div class="score">1</div>
        </div>

        <div class="col-4 col-md-4 d-flex align-items-center justify-content-center">
          <div class="vs">VS</div>
        </div>

        <div class="col-4 col-md-4">
          <div class="team-logo">
            <img src="/api/placeholder/100/100" alt="NEKOMA" />
          </div>
          <div class="team-name">NEKOMA</div>
          <div class="score">2</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS y Popper.js (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
