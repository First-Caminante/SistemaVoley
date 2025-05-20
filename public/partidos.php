<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    .header {
      background-color: #222;
      color: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header h1 {
      margin: 0;
      font-size: 24px;
    }

    .nav-menu {
      display: flex;
      margin-top: 10px;
      background-color: #f5f5f5;
      border-bottom: 1px solid #ddd;
    }

    .nav-button {
      background-color: #333;
      color: white;
      border: none;
      padding: 8px 15px;
      margin-right: 5px;
      border-radius: 4px;
      cursor: pointer;
    }

    .matches-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .matches-title {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .match-card {
      background-color: #e67e22;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 15px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .match-date {
      text-align: center;
      margin-bottom: 10px;
      font-weight: bold;
      color: #333;
    }

    .match {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .team {
      text-align: center;
      width: 150px;
    }

    .team-logo {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 10px;
      overflow: hidden;
    }

    .team-logo img {
      max-width: 70px;
      max-height: 70px;
    }

    .team-name {
      font-weight: bold;
      color: #222;
    }

    .vs {
      font-size: 28px;
      font-weight: bold;
      color: #333;
    }

    .login-btn {
      color: white;
      text-decoration: none;
    }

    .autumn-leaves {
      position: absolute;
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
        left: random(100%);
        transform: rotate(0deg) scale(1);
      }

      100% {
        top: 100%;
        left: calc(random(100%) - 50px);
        transform: rotate(360deg) scale(0.7);
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

  <div class="header">
    <h1>TORNEO DE VOLEIBOL</h1>
    <a href="#" class="login-btn">Login</a>
  </div>

  <div class="nav-menu">
    <button class="nav-button">Equipos</button>
    <button class="nav-button">Fixture</button>
    <button class="nav-button">Resultados</button>
    <button class="nav-button">Tabla Posiciones</button>
    <button class="nav-button">Inicio</button>
  </div>

  <div class="matches-container">
    <h2 class="matches-title">PRÓXIMOS PARTIDOS</h2>

    <div class="match-card">
      <div class="match-date">Fecha: 25/05/2025</div>

      <div class="match">
        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Halcones" />
          </div>
          <div class="team-name">HALCONES</div>
        </div>

        <div class="vs">VS</div>

        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Tigres" />
          </div>
          <div class="team-name">TIGRES</div>
        </div>
      </div>

      <div class="match">
        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Águilas" />
          </div>
          <div class="team-name">ÁGUILAS</div>
        </div>

        <div class="vs">VS</div>

        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Lobos" />
          </div>
          <div class="team-name">LOBOS</div>
        </div>
      </div>
    </div>

    <div class="match-card">
      <div class="match-date">Fecha: 27/05/2025</div>

      <div class="match">
        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Panteras" />
          </div>
          <div class="team-name">PANTERAS</div>
        </div>

        <div class="vs">VS</div>

        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Pumas" />
          </div>
          <div class="team-name">PUMAS</div>
        </div>
      </div>

      <div class="match">
        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Delfines" />
          </div>
          <div class="team-name">DELFINES</div>
        </div>

        <div class="vs">VS</div>

        <div class="team">
          <div class="team-logo">
            <img src="/api/placeholder/80/80" alt="Equipo Osos" />
          </div>
          <div class="team-name">OSOS</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
