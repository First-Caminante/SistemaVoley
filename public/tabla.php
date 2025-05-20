<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Torneo de Voleibol</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

    body {
      font-family: 'Montserrat', Arial, sans-serif;
      background-color: #f8f9fa;
      background-image: url('/api/placeholder/1600/900');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.85);
      z-index: -1;
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

    .main-container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 30px 20px;
    }

    .standings-card {
      background-color: #ff9800;
      border-radius: 15px;
      margin-bottom: 20px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      position: relative;
      overflow: hidden;
    }

    .standings-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 50%, rgba(0, 0, 0, 0.05) 100%);
      z-index: 0;
    }

    .standings-title {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      color: #333;
      font-size: 28px;
      position: relative;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .standings-title::after {
      content: "";
      display: block;
      width: 80px;
      height: 4px;
      background-color: #333;
      margin: 10px auto;
      border-radius: 2px;
    }

    .table-responsive {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .standings-table {
      width: 100%;
      background-color: white;
      margin-bottom: 0;
    }

    .standings-table th {
      background-color: #e67e22;
      color: white;
      font-weight: 700;
      text-align: center;
      padding: 15px 10px;
      border: none;
      position: relative;
    }

    .standings-table th i {
      margin-left: 5px;
    }

    .standings-table td {
      text-align: center;
      padding: 15px 10px;
      border-color: #f2f2f2;
      font-weight: 600;
      vertical-align: middle;
    }

    .standings-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .standings-table tr:hover {
      background-color: #fff8e1;
      transition: background-color 0.3s;
    }

    .team-cell {
      display: flex;
      align-items: center;
      text-align: left;
      padding-left: 15px;
    }

    .team-logo-sm {
      width: 30px;
      height: 30px;
      margin-right: 10px;
      border-radius: 50%;
      background-color: white;
      padding: 2px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .team-logo-sm img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .win {
      color: #4CAF50;
      font-weight: bold;
    }

    .loss {
      color: #F44336;
      font-weight: bold;
    }

    .login-btn {
      color: white;
      text-decoration: none;
    }

    .position-indicator {
      display: inline-block;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background-color: #e67e22;
      color: white;
      text-align: center;
      line-height: 24px;
      margin-right: 10px;
      font-weight: bold;
      font-size: 14px;
    }

    .autumn-leaves {
      position: fixed;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
      opacity: 0.6;
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

    .medal {
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      margin-right: 5px;
      line-height: 20px;
      font-size: 12px;
      color: white;
    }

    .gold {
      background-color: #FFD700;
      box-shadow: 0 0 5px rgba(255, 215, 0, 0.7);
    }

    .silver {
      background-color: #C0C0C0;
      box-shadow: 0 0 5px rgba(192, 192, 192, 0.7);
    }

    .bronze {
      background-color: #CD7F32;
      box-shadow: 0 0 5px rgba(205, 127, 50, 0.7);
    }

    .history-column {
      letter-spacing: 3px;
    }

    @media (max-width: 768px) {
      .standings-card {
        padding: 20px 15px;
      }

      .standings-title {
        font-size: 22px;
      }

      .standings-table th,
      .standings-table td {
        padding: 10px 5px;
        font-size: 14px;
      }

      .team-logo-sm {
        width: 25px;
        height: 25px;
        margin-right: 5px;
      }

      .history-column {
        letter-spacing: 1px;
        font-size: 12px;
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

  <div class="main-container">
    <div class="standings-card">
      <h2 class="standings-title">TABLA DE POSICIONES !!!</h2>

      <div class="table-responsive">
        <table class="table standings-table">
          <thead>
            <tr>
              <th>Equipo <i class="fas fa-sort"></i></th>
              <th>PJ <i class="fas fa-info-circle"></i></th>
              <th>PG <i class="fas fa-trophy"></i></th>
              <th>PP <i class="fas fa-times"></i></th>
              <th>Sets G <i class="fas fa-plus"></i></th>
              <th>Sets P <i class="fas fa-minus"></i></th>
              <th>Pts <i class="fas fa-star"></i></th>
              <th>Historial <i class="fas fa-history"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="team-cell">
                  <span class="medal gold">1</span>
                  <div class="team-logo-sm">
                    <img src="/api/placeholder/30/30" alt="Karasuno" />
                  </div>
                  Karasuno
                </div>
              </td>
              <td>5</td>
              <td>4</td>
              <td>1</td>
              <td>12</td>
              <td>5</td>
              <td><strong>13</strong></td>
              <td class="history-column"><span class="win">W</span> <span class="win">W</span> <span class="win">W</span> <span class="loss">L</span> <span class="win">W</span></td>
            </tr>
            <tr>
              <td>
                <div class="team-cell">
                  <span class="medal silver">2</span>
                  <div class="team-logo-sm">
                    <img src="/api/placeholder/30/30" alt="Nekoma" />
                  </div>
                  Nekoma
                </div>
              </td>
              <td>5</td>
              <td>4</td>
              <td>1</td>
              <td>13</td>
              <td>6</td>
              <td><strong>13</strong></td>
              <td class="history-column"><span class="loss">L</span> <span class="win">W</span> <span class="win">W</span> <span class="win">W</span> <span class="win">W</span></td>
            </tr>
            <tr>
              <td>
                <div class="team-cell">
                  <span class="medal bronze">3</span>
                  <div class="team-logo-sm">
                    <img src="/api/placeholder/30/30" alt="Shiratorizawa" />
                  </div>
                  Shiratorizawa
                </div>
              </td>
              <td>5</td>
              <td>3</td>
              <td>2</td>
              <td>10</td>
              <td>7</td>
              <td><strong>11</strong></td>
              <td class="history-column"><span class="win">W</span> <span class="loss">L</span> <span class="win">W</span> <span class="loss">L</span> <span class="win">W</span></td>
            </tr>
            <tr>
              <td>
                <div class="team-cell">
                  <span class="position-indicator">4</span>
                  <div class="team-logo-sm">
                    <img src="/api/placeholder/30/30" alt="Aoba Johsai" />
                  </div>
                  Aoba Johsai
                </div>
              </td>
              <td>5</td>
              <td>2</td>
              <td>3</td>
              <td>8</td>
              <td>11</td>
              <td><strong>7</strong></td>
              <td class="history-column"><span class="loss">L</span> <span class="loss">L</span> <span class="win">W</span> <span class="loss">L</span> <span class="win">W</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mt-4 text-center">
        <div class="d-inline-block text-start small">
          <div><strong>PJ</strong>: Partidos jugados</div>
          <div><strong>PG</strong>: Partidos ganados</div>
          <div><strong>PP</strong>: Partidos perdidos</div>
          <div><strong>Sets G/P</strong>: Sets ganados/perdidos</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS y Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
