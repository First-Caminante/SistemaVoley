<?php

namespace App\Controllers;

use Database\PDO\Connection;

class Functions
{

  private $connection;

  public function __construct()
  {
    $this->connection = Connection::getInstance()->getConnection();
  }

  public function loginUsuario($correo, $password)
  {
    try {
      $stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE correo = ?");
      $stmt->execute([$correo]);
      $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

      if ($usuario && password_verify($password, $usuario['password'])) {
        unset($usuario['password']); // no retornamos el hash
        return [
          'success' => true,
          'mensaje' => 'Inicio de sesión exitoso',
          'usuario' => $usuario
        ];
      } else {
        return [
          'success' => false,
          'mensaje' => 'Correo o contraseña incorrectos'
        ];
      }
    } catch (\PDOException $e) {
      return [
        'success' => false,
        'mensaje' => 'Error de base de datos: ' . $e->getMessage()
      ];
    }
  }

  // AÑADIR USUARIO
  public function añadirUsuario($usuario, $password, $nombre, $apellido, $telefono, $correo)
  {
    try {
      $hash = password_hash($password, PASSWORD_BCRYPT);

      $stmt = $this->connection->prepare("
        INSERT INTO usuarios (usuario, password, nombre, apellido, telefono, correo)
        VALUES (?, ?, ?, ?, ?, ?)
      ");
      $stmt->execute([$usuario, $hash, $nombre, $apellido, $telefono, $correo]);

      return ['success' => true, 'mensaje' => 'Usuario añadido correctamente'];
    } catch (\PDOException $e) {
      return ['success' => false, 'mensaje' => 'Error al añadir usuario: ' . $e->getMessage()];
    }
  }

  // 🗑️ ELIMINAR USUARIO
  public function eliminarUsuario($idusuario)
  {
    try {
      $stmt = $this->connection->prepare("DELETE FROM usuarios WHERE idusuario = ?");
      $stmt->execute([$idusuario]);

      return ['success' => true, 'mensaje' => 'Usuario eliminado'];
    } catch (\PDOException $e) {
      return ['success' => false, 'mensaje' => 'Error al eliminar: ' . $e->getMessage()];
    }
  }

  //  MODIFICAR USUARIO
  public function modificarUsuario($idusuario, $usuario, $nombre, $apellido, $telefono, $correo)
  {
    try {
      $stmt = $this->connection->prepare("
        UPDATE usuarios
        SET usuario = ?, nombre = ?, apellido = ?, telefono = ?, correo = ?
        WHERE idusuario = ?
      ");
      $stmt->execute([$usuario, $nombre, $apellido, $telefono, $correo, $idusuario]);

      return ['success' => true, 'mensaje' => 'Usuario modificado correctamente'];
    } catch (\PDOException $e) {
      return ['success' => false, 'mensaje' => 'Error al modificar usuario: ' . $e->getMessage()];
    }
  }

  //  CONSULTAR USUARIO POR CORREO
  public function obtenerUsuarioPorCorreo($correo)
  {
    try {
      $stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE correo = ?");
      $stmt->execute([$correo]);
      $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

      if ($usuario) {
        unset($usuario['password']);
        return ['success' => true, 'usuario' => $usuario];
      } else {
        return ['success' => false, 'mensaje' => 'Usuario no encontrado'];
      }
    } catch (\PDOException $e) {
      return ['success' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
    }
  }

  //  ¿EXISTE USUARIO?
  public function usuarioExiste($correo)
  {
    try {
      $stmt = $this->connection->prepare("SELECT idusuario FROM usuarios WHERE correo = ?");
      $stmt->execute([$correo]);
      $existe = $stmt->fetchColumn();

      return $existe ? true : false;
    } catch (\PDOException $e) {
      return false;
    }
  }

  public function registrarUsuario(array $data): array
  {
    // Validaciones básicas
    if (
      empty($data['usuario']) ||
      empty($data['password']) ||
      empty($data['nombre']) ||
      empty($data['apellido']) ||
      empty($data['telefono']) ||
      empty($data['correo'])
    ) {
      return ['success' => false, 'mensaje' => 'Todos los campos son obligatorios.'];
    }

    try {
      // Verificar si ya existe el usuario o correo
      $stmt = $this->connection->prepare("SELECT idusuario FROM usuarios WHERE usuario = :usuario OR correo = :correo");
      $stmt->execute([
        ':usuario' => $data['usuario'],
        ':correo' => $data['correo']
      ]);

      if ($stmt->fetch()) {
        return ['success' => false, 'mensaje' => 'El nombre de usuario o correo ya están registrados.'];
      }

      // Encriptar la contraseña
      $passwordHashed = password_hash($data['password'], PASSWORD_BCRYPT);

      // Insertar el nuevo usuario
      $stmt = $this->connection->prepare("
            INSERT INTO usuarios (usuario, password, nombre, apellido, telefono, correo)
            VALUES (:usuario, :password, :nombre, :apellido, :telefono, :correo)
        ");

      $stmt->execute([
        ':usuario' => $data['usuario'],
        ':password' => $passwordHashed,
        ':nombre' => $data['nombre'],
        ':apellido' => $data['apellido'],
        ':telefono' => $data['telefono'],
        ':correo' => $data['correo']
      ]);

      return ['success' => true, 'mensaje' => 'Usuario registrado exitosamente.'];
    } catch (\PDOException $e) {
      return ['success' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
    }
  }
}
