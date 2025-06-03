<?php
require_once '../vendor/autoload.php';

use App\Controllers\Functions;

$functions = new Functions();
$mensaje = '';
$tipoMensaje = '';

// Procesar formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if (isset($_POST['accion'])) {
      switch ($_POST['accion']) {
        case 'añadir':
          $nombre = trim($_POST['nombre']);
          $descripcion = trim($_POST['descripcion']) ?: null;
          $logo = trim($_POST['logo']) ?: null;

          if (empty($nombre)) {
            throw new Exception('El nombre del equipo es obligatorio');
          }

          $id = $functions->añadirequipo($nombre, $descripcion, $logo);
          if ($id) {
            $mensaje = 'Equipo añadido correctamente';
            $tipoMensaje = 'success';
          }
          break;

        case 'modificar':
          $id = (int)$_POST['id'];
          $nombre = trim($_POST['nombre']);
          $descripcion = trim($_POST['descripcion']) ?: null;
          $logo = trim($_POST['logo']) ?: null;

          if (empty($nombre)) {
            throw new Exception('El nombre del equipo es obligatorio');
          }

          if ($functions->modificarequipo($id, $nombre, $descripcion, $logo)) {
            $mensaje = 'Equipo modificado correctamente';
            $tipoMensaje = 'success';
          }
          break;

        case 'eliminar':
          $id = (int)$_POST['id'];
          if ($functions->eliminarequipo($id)) {
            $mensaje = 'Equipo eliminado correctamente';
            $tipoMensaje = 'success';
          }
          break;
      }
    }
  } catch (Exception $e) {
    $mensaje = $e->getMessage();
    $tipoMensaje = 'error';
  }
}

// Obtener todos los equipos
try {
  $equipos = $functions->obtenerequipos();
} catch (Exception $e) {
  $equipos = [];
  $mensaje = 'Error al cargar equipos: ' . $e->getMessage();
  $tipoMensaje = 'error';
}

// Obtener equipo para editar si se solicita
$equipoEditar = null;
if (isset($_GET['editar'])) {
  try {
    $equipoEditar = $functions->obtenerequipoid((int)$_GET['editar']);
  } catch (Exception $e) {
    $mensaje = 'Error al cargar equipo: ' . $e->getMessage();
    $tipoMensaje = 'error';
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editor de Equipos - Voleibol</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #4DD0E1 0%, #26C6DA 50%, #00BCD4 100%);
      min-height: 100vh;
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    .header p {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    .card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      margin-bottom: 20px;
    }

    .card-header {
      background: linear-gradient(135deg, #0097A7, #00BCD4);
      color: white;
      padding: 15px 20px;
      border-radius: 15px 15px 0 0;
      font-weight: bold;
      font-size: 1.1rem;
    }

    .card-body {
      padding: 20px;
    }

    .alert {
      padding: 12px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      border-left: 4px solid;
    }

    .alert-success {
      background-color: #d4edda;
      border-color: #28a745;
      color: #155724;
    }

    .alert-error {
      background-color: #f8d7da;
      border-color: #dc3545;
      color: #721c24;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    @media (max-width: 768px) {
      .form-grid {
        grid-template-columns: 1fr;
      }
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      width: 100%;
      padding: 12px;
      border: 2px solid #E0E0E0;
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #00BCD4;
      box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
      outline: none;
    }

    .btn {
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .btn-primary {
      background: linear-gradient(135deg, #00BCD4, #26C6DA);
      color: white;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #0097A7, #00BCD4);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 188, 212, 0.3);
    }

    .btn-success {
      background: linear-gradient(135deg, #4CAF50, #66BB6A);
      color: white;
    }

    .btn-success:hover {
      background: linear-gradient(135deg, #388E3C, #4CAF50);
      transform: translateY(-2px);
    }

    .btn-warning {
      background: linear-gradient(135deg, #FF9800, #FFB74D);
      color: white;
    }

    .btn-warning:hover {
      background: linear-gradient(135deg, #F57C00, #FF9800);
      transform: translateY(-2px);
    }

    .btn-danger {
      background: linear-gradient(135deg, #F44336, #EF5350);
      color: white;
    }

    .btn-danger:hover {
      background: linear-gradient(135deg, #D32F2F, #F44336);
      transform: translateY(-2px);
    }

    .btn-sm {
      padding: 8px 16px;
      font-size: 0.9rem;
      margin: 0 2px;
    }

    .table-responsive {
      overflow-x: auto;
      margin-top: 20px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #E0E0E0;
    }

    .table th {
      background: linear-gradient(135deg, #0097A7, #00BCD4);
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 0.5px;
    }

    .table tbody tr:hover {
      background-color: #F5F5F5;
      transform: scale(1.01);
      transition: all 0.2s ease;
    }

    .team-logo {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #00BCD4;
    }

    .no-logo {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, #E0E0E0, #BDBDBD);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #666;
      font-size: 1.2rem;
    }

    .actions {
      white-space: nowrap;
    }

    .volleyball-icon {
      font-size: 1.5rem;
      margin-right: 10px;
      color: #00BCD4;
    }

    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: #666;
    }

    .empty-state i {
      font-size: 4rem;
      color: #00BCD4;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-volleyball-ball volleyball-icon"></i>Editor de Equipos</h1>
      <p>Gestiona los equipos de voleibol</p>
    </div>

    <?php if ($mensaje): ?>
      <div class="alert alert-<?php echo $tipoMensaje; ?>">
        <i class="fas <?php echo $tipoMensaje === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?>"></i>
        <?php echo htmlspecialchars($mensaje); ?>
      </div>
    <?php endif; ?>

    <div class="form-grid">
      <!-- Formulario para añadir/modificar equipos -->
      <div class="card">
        <div class="card-header">
          <i class="fas <?php echo $equipoEditar ? 'fa-edit' : 'fa-plus-circle'; ?>"></i>
          <?php echo $equipoEditar ? 'Modificar Equipo' : 'Añadir Nuevo Equipo'; ?>
        </div>
        <div class="card-body">
          <form method="POST" action="">
            <input type="hidden" name="accion" value="<?php echo $equipoEditar ? 'modificar' : 'añadir'; ?>">
            <?php if ($equipoEditar): ?>
              <input type="hidden" name="id" value="<?php echo $equipoEditar['idequipo']; ?>">
            <?php endif; ?>

            <div class="form-group">
              <label for="nombre">
                <i class="fas fa-team"></i> Nombre del Equipo *
              </label>
              <input type="text"
                class="form-control"
                id="nombre"
                name="nombre"
                value="<?php echo $equipoEditar ? htmlspecialchars($equipoEditar['nombre']) : ''; ?>"
                required>
            </div>

            <div class="form-group">
              <label for="descripcion">
                <i class="fas fa-info-circle"></i> Descripción
              </label>
              <textarea class="form-control"
                id="descripcion"
                name="descripcion"
                rows="3"
                placeholder="Descripción opcional del equipo"><?php echo $equipoEditar ? htmlspecialchars($equipoEditar['descripcion']) : ''; ?></textarea>
            </div>

            <div class="form-group">
              <label for="logo">
                <i class="fas fa-image"></i> URL del Logo
              </label>
              <input type="url"
                class="form-control"
                id="logo"
                name="logo"
                value="<?php echo $equipoEditar ? htmlspecialchars($equipoEditar['logo']) : ''; ?>"
                placeholder="https://ejemplo.com/logo.png">
            </div>

            <div style="text-align: center; margin-top: 20px;">
              <button type="submit" class="btn <?php echo $equipoEditar ? 'btn-warning' : 'btn-success'; ?>">
                <i class="fas <?php echo $equipoEditar ? 'fa-save' : 'fa-plus'; ?>"></i>
                <?php echo $equipoEditar ? 'Guardar Cambios' : 'Añadir Equipo'; ?>
              </button>
              <?php if ($equipoEditar): ?>
                <a href="editpartidos.php" class="btn btn-primary">
                  <i class="fas fa-times"></i> Cancelar
                </a>
              <?php endif; ?>
            </div>
          </form>
        </div>
      </div>

      <!-- Lista de equipos -->
      <div class="card">
        <div class="card-header">
          <i class="fas fa-list"></i> Equipos Registrados (<?php echo count($equipos); ?>)
        </div>
        <div class="card-body">
          <?php if (empty($equipos)): ?>
            <div class="empty-state">
              <i class="fas fa-volleyball-ball"></i>
              <h3>No hay equipos registrados</h3>
              <p>Añade el primer equipo usando el formulario de la izquierda</p>
            </div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($equipos as $equipo): ?>
                    <tr>
                      <td>
                        <?php if ($equipo['logo']): ?>
                          <img src="<?php echo htmlspecialchars($equipo['logo']); ?>"
                            alt="Logo"
                            class="team-logo"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                          <div class="no-logo" style="display: none;">
                            <i class="fas fa-volleyball-ball"></i>
                          </div>
                        <?php else: ?>
                          <div class="no-logo">
                            <i class="fas fa-volleyball-ball"></i>
                          </div>
                        <?php endif; ?>
                      </td>
                      <td><strong><?php echo htmlspecialchars($equipo['nombre']); ?></strong></td>
                      <td><?php echo $equipo['descripcion'] ? htmlspecialchars($equipo['descripcion']) : '<em>Sin descripción</em>'; ?></td>
                      <td class="actions">
                        <a href="?editar=<?php echo $equipo['idequipo']; ?>"
                          class="btn btn-warning btn-sm"
                          title="Modificar equipo">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" style="display: inline;"
                          onsubmit="return confirm('¿Está seguro de eliminar este equipo?');">
                          <input type="hidden" name="accion" value="eliminar">
                          <input type="hidden" name="id" value="<?php echo $equipo['idequipo']; ?>">
                          <button type="submit"
                            class="btn btn-danger btn-sm"
                            title="Eliminar equipo">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Confirmar eliminación
    document.addEventListener('DOMContentLoaded', function() {
      const deleteButtons = document.querySelectorAll('form[onsubmit*="confirm"]');
      deleteButtons.forEach(form => {
        form.addEventListener('submit', function(e) {
          if (!confirm('¿Está seguro de eliminar este equipo? Esta acción no se puede deshacer.')) {
            e.preventDefault();
          }
        });
      });

      // Auto-hide alerts after 5 seconds
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(alert => {
        setTimeout(() => {
          alert.style.opacity = '0';
          alert.style.transform = 'translateY(-20px)';
          setTimeout(() => {
            alert.remove();
          }, 300);
        }, 5000);
      });
    });
  </script>
</body>

</html>
