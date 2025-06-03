<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';

use App\Controllers\Functions;

$functions = new Functions();
$message = '';
$messageType = '';

// Procesar formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if (isset($_POST['action'])) {
      switch ($_POST['action']) {
        case 'create':
          $id = $functions->createPartido(
            $_POST['fecha'],
            $_POST['hora'],
            $_POST['equipo_local'],
            $_POST['equipo_visitante'],
            $_POST['idestado']
          );
          if ($id) {
            $message = "Partido creado exitosamente";
            $messageType = "success";
          }
          break;

        case 'update':
          $result = $functions->updatePartido(
            $_POST['idpartido'],
            $_POST['fecha'],
            $_POST['hora'],
            $_POST['equipo_local'],
            $_POST['equipo_visitante'],
            $_POST['idestado']
          );
          if ($result) {
            $message = "Partido actualizado exitosamente";
            $messageType = "success";
          }
          break;

        case 'update_resultado':
          $result = $functions->updateResultado(
            $_POST['idpartido'],
            $_POST['sets_local'],
            $_POST['sets_visitante'],
            $_POST['puntos_asistencia_local'] ?? 0,
            $_POST['puntos_asistencia_visitante'] ?? 0
          );
          if ($result) {
            $message = "Resultado actualizado exitosamente";
            $messageType = "success";
          }
          break;

        case 'delete':
          $result = $functions->deletePartido($_POST['idpartido']);
          if ($result) {
            $message = "Partido eliminado exitosamente";
            $messageType = "success";
          }
          break;
      }
    }
  } catch (Exception $e) {
    $message = "Error: " . $e->getMessage();
    $messageType = "error";
  }
}

// Obtener datos para los formularios
$partidos = $functions->getAllPartidos();
$equipos = $functions->getAllEquipos();
$estados = $functions->getAllEstados();

// Obtener partido para editar si se especifica
$partidoEdit = null;
if (isset($_GET['edit'])) {
  $partidoEdit = $functions->getPartidoById($_GET['edit']);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editor de Partidos - Voleibol</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 50%, #90caf9 100%);
      min-height: 100vh;
      color: #0d47a1;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      padding: 20px;
      background: linear-gradient(45deg, #1976d2, #2196f3);
      border-radius: 15px;
      color: white;
      box-shadow: 0 8px 32px rgba(25, 118, 210, 0.3);
    }

    .header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .header p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    .message {
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-weight: bold;
      text-align: center;
    }

    .message.success {
      background: linear-gradient(45deg, #4caf50, #66bb6a);
      color: white;
    }

    .message.error {
      background: linear-gradient(45deg, #f44336, #ef5350);
      color: white;
    }

    .card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      padding: 25px;
      margin-bottom: 25px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card h2 {
      color: #1976d2;
      margin-bottom: 20px;
      font-size: 1.8rem;
      border-bottom: 3px solid #2196f3;
      padding-bottom: 10px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin-bottom: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      font-weight: bold;
      color: #1565c0;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
      padding: 12px;
      border: 2px solid #e3f2fd;
      border-radius: 8px;
      font-size: 16px;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.9);
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: #2196f3;
      box-shadow: 0 0 10px rgba(33, 150, 243, 0.3);
      background: white;
    }

    .btn {
      padding: 12px 25px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
      background: linear-gradient(45deg, #1976d2, #2196f3);
      color: white;
    }

    .btn-success {
      background: linear-gradient(45deg, #4caf50, #66bb6a);
      color: white;
    }

    .btn-warning {
      background: linear-gradient(45deg, #ff9800, #ffb74d);
      color: white;
    }

    .btn-danger {
      background: linear-gradient(45deg, #f44336, #ef5350);
      color: white;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .btn-group {
      display: flex;
      gap: 10px;
      margin-top: 15px;
    }

    .table-container {
      overflow-x: auto;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }

    th {
      background: linear-gradient(45deg, #1976d2, #2196f3);
      color: white;
      padding: 15px;
      font-weight: bold;
      text-align: left;
    }

    td {
      padding: 12px 15px;
      border-bottom: 1px solid #e3f2fd;
    }

    tr:hover {
      background: rgba(33, 150, 243, 0.1);
    }

    .status-badge {
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
      text-transform: uppercase;
    }

    .status-programado {
      background: #bbdefb;
      color: #0d47a1;
    }

    .status-jugando {
      background: #ffcc02;
      color: #e65100;
    }

    .status-finalizado {
      background: #c8e6c9;
      color: #1b5e20;
    }

    .volleyball-icon {
      display: inline-block;
      width: 20px;
      height: 20px;
      background: radial-gradient(circle, #fff 30%, #2196f3 30%, #2196f3 35%, #fff 35%);
      border-radius: 50%;
      margin-right: 10px;
      border: 2px solid #1976d2;
    }

    @media (max-width: 768px) {
      .form-grid {
        grid-template-columns: 1fr;
      }

      .btn-group {
        flex-direction: column;
      }

      .header h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1><span class="volleyball-icon"></span>Editor de Partidos de Voleibol</h1>
      <p>Gestiona y actualiza los partidos de tu torneo</p>
    </div>

    <?php if ($message): ?>
      <div class="message <?= $messageType ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <!-- Formulario para crear/editar partido -->
    <div class="card">
      <h2><?= $partidoEdit ? 'Editar Partido' : 'Nuevo Partido' ?></h2>

      <form method="POST">
        <input type="hidden" name="action" value="<?= $partidoEdit ? 'update' : 'create' ?>">
        <?php if ($partidoEdit): ?>
          <input type="hidden" name="idpartido" value="<?= $partidoEdit['idpartido'] ?>">
        <?php endif; ?>

        <div class="form-grid">
          <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required
              value="<?= $partidoEdit ? $partidoEdit['fecha'] : '' ?>">
          </div>

          <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora"
              value="<?= $partidoEdit ? $partidoEdit['hora'] : '' ?>">
          </div>

          <div class="form-group">
            <label for="equipo_local">Equipo Local:</label>
            <select id="equipo_local" name="equipo_local" required>
              <option value="">Seleccionar equipo</option>
              <?php foreach ($equipos as $equipo): ?>
                <option value="<?= $equipo['idequipo'] ?>"
                  <?= ($partidoEdit && $partidoEdit['equipo_local'] == $equipo['idequipo']) ? 'selected' : '' ?>>
                  <?= htmlspecialchars($equipo['nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="equipo_visitante">Equipo Visitante:</label>
            <select id="equipo_visitante" name="equipo_visitante" required>
              <option value="">Seleccionar equipo</option>
              <?php foreach ($equipos as $equipo): ?>
                <option value="<?= $equipo['idequipo'] ?>"
                  <?= ($partidoEdit && $partidoEdit['equipo_visitante'] == $equipo['idequipo']) ? 'selected' : '' ?>>
                  <?= htmlspecialchars($equipo['nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="idestado">Estado:</label>
            <select id="idestado" name="idestado" required>
              <?php foreach ($estados as $estado): ?>
                <option value="<?= $estado['idestado'] ?>"
                  <?= ($partidoEdit && $partidoEdit['idestado'] == $estado['idestado']) ? 'selected' : '' ?>>
                  <?= htmlspecialchars($estado['nombreestado']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="btn-group">
          <button type="submit" class="btn btn-primary">
            <?= $partidoEdit ? 'Actualizar Partido' : 'Crear Partido' ?>
          </button>
          <?php if ($partidoEdit): ?>
            <a href="editpartidos.php" class="btn btn-warning">Cancelar</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <!-- Formulario para actualizar resultado (solo si hay un partido en edición) -->
    <?php if ($partidoEdit): ?>
      <div class="card">
        <h2>Actualizar Resultado</h2>

        <form method="POST">
          <input type="hidden" name="action" value="update_resultado">
          <input type="hidden" name="idpartido" value="<?= $partidoEdit['idpartido'] ?>">

          <div class="form-grid">
            <div class="form-group">
              <label for="sets_local">Sets Local:</label>
              <input type="number" id="sets_local" name="sets_local" min="0" max="3"
                value="<?= $partidoEdit['sets_local'] ?? 0 ?>">
            </div>

            <div class="form-group">
              <label for="sets_visitante">Sets Visitante:</label>
              <input type="number" id="sets_visitante" name="sets_visitante" min="0" max="3"
                value="<?= $partidoEdit['sets_visitante'] ?? 0 ?>">
            </div>

            <div class="form-group">
              <label for="puntos_asistencia_local">Puntos Asistencia Local:</label>
              <input type="number" id="puntos_asistencia_local" name="puntos_asistencia_local" min="0"
                value="<?= $partidoEdit['puntos_asistencia_local'] ?? 0 ?>">
            </div>

            <div class="form-group">
              <label for="puntos_asistencia_visitante">Puntos Asistencia Visitante:</label>
              <input type="number" id="puntos_asistencia_visitante" name="puntos_asistencia_visitante" min="0"
                value="<?= $partidoEdit['puntos_asistencia_visitante'] ?? 0 ?>">
            </div>
          </div>

          <button type="submit" class="btn btn-success">Actualizar Resultado</button>
        </form>
      </div>
    <?php endif; ?>

    <!-- Listado de partidos -->
    <div class="card">
      <h2>Lista de Partidos</h2>

      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Partido</th>
              <th>Resultado</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($partidos as $partido): ?>
              <tr>
                <td><?= date('d/m/Y', strtotime($partido['fecha'])) ?></td>
                <td><?= $partido['hora'] ? date('H:i', strtotime($partido['hora'])) : '-' ?></td>
                <td>
                  <strong><?= htmlspecialchars($partido['equipo_local_nombre']) ?></strong>
                  vs
                  <strong><?= htmlspecialchars($partido['equipo_visitante_nombre']) ?></strong>
                </td>
                <td>
                  <?php if ($partido['sets_local'] !== null || $partido['sets_visitante'] !== null): ?>
                    <?= $partido['sets_local'] ?? 0 ?> - <?= $partido['sets_visitante'] ?? 0 ?>
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
                <td>
                  <span class="status-badge status-<?= strtolower(str_replace(' ', '-', $partido['nombreestado'])) ?>">
                    <?= htmlspecialchars($partido['nombreestado']) ?>
                  </span>
                </td>
                <td>
                  <div class="btn-group">
                    <a href="?edit=<?= $partido['idpartido'] ?>" class="btn btn-warning">Editar</a>
                    <form method="POST" style="display: inline;"
                      onsubmit="return confirm('¿Estás seguro de eliminar este partido?');">
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="idpartido" value="<?= $partido['idpartido'] ?>">
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>

            <?php if (empty($partidos)): ?>
              <tr>
                <td colspan="6" style="text-align: center; padding: 30px; color: #666;">
                  No hay partidos registrados
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    // Validación para evitar que un equipo juegue contra sí mismo
    document.addEventListener('DOMContentLoaded', function() {
      const equipoLocal = document.getElementById('equipo_local');
      const equipoVisitante = document.getElementById('equipo_visitante');

      function validateTeams() {
        if (equipoLocal.value && equipoVisitante.value && equipoLocal.value === equipoVisitante.value) {
          alert('Un equipo no puede jugar contra sí mismo');
          equipoVisitante.value = '';
        }
      }

      equipoLocal.addEventListener('change', validateTeams);
      equipoVisitante.addEventListener('change', validateTeams);
    });
  </script>
</body>

</html>
