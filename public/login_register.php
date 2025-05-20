<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Registro - Torneo de Voleibol</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #ff9800;
      /* Naranja otoñal principal */
      --primary-dark: #f57c00;
      /* Naranja otoñal oscuro */
      --primary-light: #ffe0b2;
      /* Naranja otoñal claro */
      --accent-color: #ff5722;
      /* Color de acento complementario */
      --text-dark: #333333;
      /* Texto oscuro */
      --text-light: #ffffff;
      /* Texto claro */
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--primary-light);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 20px;
    }

    .auth-container {
      background-color: var(--text-light);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 900px;
    }

    .tab-header {
      background-color: var(--primary-color);
      display: flex;
      padding: 0;
      margin-bottom: 30px;
    }

    .tab-button {
      flex: 1;
      border: none;
      padding: 20px 0;
      font-size: 20px;
      font-weight: 600;
      background-color: transparent;
      color: var(--text-light);
      position: relative;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .tab-button:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .tab-button.active {
      background-color: var(--text-light);
      color: var(--primary-dark);
    }

    .tab-button.active::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%) rotate(45deg);
      width: 20px;
      height: 20px;
      background-color: var(--text-light);
    }

    .tab-content {
      padding: 20px 40px 40px 40px;
    }

    .form-content {
      display: none;
    }

    .form-content.active {
      display: block;
    }

    .auth-title {
      font-size: 28px;
      font-weight: 700;
      text-align: center;
      color: var(--primary-color);
      margin-bottom: 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .auth-subtitle {
      text-align: center;
      color: var(--text-dark);
      margin-bottom: 30px;
      font-size: 16px;
    }

    .form-label {
      color: var(--text-dark);
      font-weight: 600;
      margin-bottom: 8px;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px;
      border: 2px solid #e0e0e0;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
    }

    .btn-auth {
      background-color: var(--primary-color);
      color: var(--text-light);
      border: none;
      border-radius: 30px;
      padding: 12px 30px;
      font-weight: 600;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      margin-top: 20px;
      width: 100%;
    }

    .btn-auth:hover {
      background-color: var(--primary-dark);
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
      color: var(--text-light);
    }

    .btn-secondary {
      background-color: #e0e0e0;
      color: var(--text-dark);
    }

    .btn-secondary:hover {
      background-color: #d0d0d0;
      color: var(--text-dark);
    }

    .auth-footer {
      text-align: center;
      margin-top: 30px;
      color: #777;
      font-size: 14px;
    }

    .auth-footer a {
      color: var(--primary-color);
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .auth-footer a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    .user-avatar {
      width: 120px;
      height: 120px;
      margin: 0 auto 20px;
      display: block;
      border: 5px solid var(--primary-light);
      border-radius: 50%;
      padding: 5px;
    }

    .form-divider {
      display: flex;
      align-items: center;
      margin: 30px 0;
    }

    .form-divider::before,
    .form-divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #e0e0e0;
    }

    .form-divider-text {
      padding: 0 15px;
      color: #777;
      font-size: 14px;
    }

    .social-button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #fff;
      border: 2px solid #e0e0e0;
      margin: 0 10px;
      transition: all 0.3s ease;
      color: #555;
      font-size: 20px;
    }

    .social-button:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .social-facebook:hover {
      background-color: #3b5998;
      color: white;
      border-color: #3b5998;
    }

    .social-google:hover {
      background-color: #db4437;
      color: white;
      border-color: #db4437;
    }

    .social-twitter:hover {
      background-color: #1da1f2;
      color: white;
      border-color: #1da1f2;
    }

    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .close-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      background: none;
      border: none;
      font-size: 24px;
      color: var(--text-dark);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .close-btn:hover {
      color: var(--primary-color);
      transform: rotate(90deg);
    }
  </style>
</head>

<body>
  <div class="auth-container">
    <!-- Cabecera con pestañas -->
    <div class="tab-header">
      <button class="tab-button active" data-target="login-form">INICIO DE SESIÓN</button>
      <button class="tab-button" data-target="register-form">REGISTRO</button>
    </div>

    <div class="tab-content">
      <!-- Formulario de Login -->
      <div id="login-form" class="form-content active">
        <h2 class="auth-title">LOGIN</h2>
        <p class="auth-subtitle">Ingresa tus credenciales para acceder al sistema</p>

        <div class="row justify-content-center">
          <div class="col-md-8">
            <img src="/api/placeholder/120/120" alt="Avatar" class="user-avatar">

            <form method="POST" action="process.php">
              <input type="hidden" name="action" value="login">
              <div class="mb-4">
                <label for="login-username" class="form-label">CORREO:</label>
                <input type="text" class="form-control" id="login-username" name="usuario" placeholder="Ingresa tu nombre de usuario" required>
              </div>

              <div class="mb-4">
                <label for="login-password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Ingresa tu contraseña" required>
              </div>

              <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="remember-me">
                <label class="form-check-label" for="remember-me">Recordarme</label>
                <a href="#" class="float-end text-decoration-none" style="color: var(--primary-color);">¿Olvidaste tu contraseña?</a>
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-auth">Ingresar</button>
                <button type="button" class="btn btn-auth btn-secondary" onclick="window.close()">Cerrar programa</button>
              </div>
            </form>

            <div class="form-divider">
              <span class="form-divider-text">O inicia sesión con</span>
            </div>

            <div class="text-center">
              <a href="#" class="social-button social-facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-button social-google"><i class="fab fa-google"></i></a>
              <a href="#" class="social-button social-twitter"><i class="fab fa-twitter"></i></a>
            </div>

            <div class="auth-footer">
              ¿No tienes una cuenta? <a href="#" class="switch-form" data-target="register-form">Regístrate aquí</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Formulario de Registro -->
      <div id="register-form" class="form-content">
        <h2 class="auth-title">REGISTRO DE USUARIO</h2>
        <p class="auth-subtitle">Completa el formulario para crear tu cuenta</p>

        <form method="POST" action="process.php">
          <input type="hidden" name="action" value="register">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="reg-username" class="form-label">Usuario:</label>
              <input type="text" class="form-control" id="reg-username" name="usuario" placeholder="Nombre de usuario" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="reg-nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="reg-nombre" name="nombre" placeholder="Tu nombre" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="reg-password" class="form-label">Contraseña:</label>
              <input type="password" class="form-control" id="reg-password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="reg-apellido" class="form-label">Apellido:</label>
              <input type="text" class="form-control" id="reg-apellido" name="apellido" placeholder="Tu apellido" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="reg-telefono" class="form-label">Teléfono/Celular:</label>
            <input type="tel" class="form-control" id="reg-telefono" name="telefono" placeholder="Número de teléfono" required>
          </div>

          <div class="mb-4">
            <label for="reg-email" class="form-label">Correo Electrónico:</label>
            <input type="email" class="form-control" id="reg-email" name="correo" placeholder="ejemplo@correo.com" required>
          </div>

          <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="terms" required>
            <label class="form-check-label" for="terms">Acepto los <a href="#" style="color: var(--primary-color);">términos y condiciones</a></label>
          </div>

          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-auth">Registrar</button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-auth btn-secondary">Volver</button>
            </div>
          </div>
        </form>


        <div class="auth-footer">
          ¿Ya tienes una cuenta? <a href="#" class="switch-form" data-target="login-form">Inicia sesión aquí</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    // Cambia entre formularios de login y registro
    document.addEventListener('DOMContentLoaded', function() {
      // Manejo de pestañas
      const tabButtons = document.querySelectorAll('.tab-button');
      const formContents = document.querySelectorAll('.form-content');
      const switchLinks = document.querySelectorAll('.switch-form');

      function switchTab(targetId) {
        // Desactiva todas las pestañas y contenidos
        tabButtons.forEach(btn => btn.classList.remove('active'));
        formContents.forEach(content => content.classList.remove('active'));

        // Activa la pestaña seleccionada
        const targetTab = document.querySelector(`.tab-button[data-target="${targetId}"]`);
        const targetContent = document.getElementById(targetId);

        if (targetTab && targetContent) {
          targetTab.classList.add('active');
          targetContent.classList.add('active');
        }
      }

      // Event listeners para los botones de pestaña
      tabButtons.forEach(button => {
        button.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          switchTab(targetId);
        });
      });

      // Event listeners para los enlaces de cambio
      switchLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.getAttribute('data-target');
          switchTab(targetId);
        });
      });
    });
  </script>
</body>

</html>
