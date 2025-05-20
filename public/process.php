<?php

require('../vendor/autoload.php');

use App\Controllers\Functions;

$funciones = new Functions();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';

  switch ($action) {
    case 'login':
      //dd($_POST);
      $usuario = $_POST['usuario'] ?? '';
      $password = $_POST['password'] ?? '';

      $resultado = $funciones->loginUsuario($usuario, $password);
      echo json_encode($resultado);
      break;

    case 'register':
      //dd($_POST);
      $data = [
        'usuario' => $_POST['usuario'] ?? '',
        'password' => $_POST['password'] ?? '',
        'nombre' => $_POST['nombre'] ?? '',
        'apellido' => $_POST['apellido'] ?? '',
        'telefono' => $_POST['telefono'] ?? '',
        'correo' => $_POST['correo'] ?? '',
      ];

      $resultado = $funciones->registrarUsuario($data);
      echo json_encode($resultado);
      break;

    default:
      echo json_encode(['success' => false, 'mensaje' => 'Acción no válida']);
      break;
  }
} else {
  echo json_encode(['success' => false, 'mensaje' => 'Método no permitido']);
}
