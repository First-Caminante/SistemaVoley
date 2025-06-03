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

  ///editar equipos etc 

  // Función para obtener todos los equipos
  public function obtenerequipos()
  {
    try {
      $query = "SELECT idequipo, nombre, descripcion, logo FROM equipos ORDER BY nombre";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      throw new \Exception("Error al obtener equipos: " . $e->getMessage());
    }
  }

  // Función para obtener un equipo por ID
  public function obtenerequipoid($id)
  {
    try {
      $query = "SELECT idequipo, nombre, descripcion, logo FROM equipos WHERE idequipo = :id";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      throw new \Exception("Error al obtener equipo: " . $e->getMessage());
    }
  }

  // Función para añadir un nuevo equipo
  public function añadirequipo($nombre, $descripcion = null, $logo = null)
  {
    try {
      $query = "INSERT INTO equipos (nombre, descripcion, logo) VALUES (:nombre, :descripcion, :logo)";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':descripcion', $descripcion);
      $stmt->bindParam(':logo', $logo);

      if ($stmt->execute()) {
        return $this->connection->lastInsertId();
      }
      return false;
    } catch (\PDOException $e) {
      if ($e->getCode() == 23000) { // Duplicate entry
        throw new \Exception("Ya existe un equipo con ese nombre");
      }
      throw new \Exception("Error al añadir equipo: " . $e->getMessage());
    }
  }

  // Función para modificar un equipo
  public function modificarequipo($id, $nombre, $descripcion = null, $logo = null)
  {
    try {
      $query = "UPDATE equipos SET nombre = :nombre, descripcion = :descripcion, logo = :logo WHERE idequipo = :id";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':descripcion', $descripcion);
      $stmt->bindParam(':logo', $logo);

      return $stmt->execute();
    } catch (\PDOException $e) {
      if ($e->getCode() == 23000) { // Duplicate entry
        throw new \Exception("Ya existe un equipo con ese nombre");
      }
      throw new \Exception("Error al modificar equipo: " . $e->getMessage());
    }
  }
  public function eliminarequipo($id)
  {
    try {
      // Verificar si el equipo está siendo usado en partidos
      $queryCheck = "SELECT COUNT(*) as total FROM partidos WHERE equipo_local = :id_local OR equipo_visitante = :id_visitante";
      $stmtCheck = $this->connection->prepare($queryCheck);
      $stmtCheck->bindParam(':id_local', $id, \PDO::PARAM_INT);
      $stmtCheck->bindParam(':id_visitante', $id, \PDO::PARAM_INT);
      $stmtCheck->execute();
      $result = $stmtCheck->fetch(\PDO::FETCH_ASSOC);

      if ($result['total'] > 0) {
        throw new \Exception("No se puede eliminar el equipo porque tiene partidos asociados");
      }

      $query = "DELETE FROM equipos WHERE idequipo = :id";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

      return $stmt->execute();
    } catch (\PDOException $e) {
      throw new \Exception("Error al eliminar equipo: " . $e->getMessage());
    }
  }
  // Función para eliminar un equipo
  public function ffeliminarequipo($id)
  {
    try {
      // Verificar si el equipo está siendo usado en partidos
      $queryCheck = "SELECT COUNT(*) as total FROM partidos WHERE equipo_local = :id OR equipo_visitante = :id";
      $stmtCheck = $this->connection->prepare($queryCheck);
      $stmtCheck->bindParam(':id', $id, \PDO::PARAM_INT);
      $stmtCheck->execute();
      $result = $stmtCheck->fetch(\PDO::FETCH_ASSOC);

      if ($result['total'] > 0) {
        throw new \Exception("No se puede eliminar el equipo porque tiene partidos asociados");
      }

      $query = "DELETE FROM equipos WHERE idequipo = :id";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

      return $stmt->execute();
    } catch (\PDOException $e) {
      throw new \Exception("Error al eliminar equipo: " . $e->getMessage());
    }
  }

  // Función para verificar si existe un equipo
  public function existeequipo($nombre, $excluirId = null)
  {
    try {
      $query = "SELECT COUNT(*) as total FROM equipos WHERE nombre = :nombre";
      if ($excluirId) {
        $query .= " AND idequipo != :excluir_id";
      }

      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(':nombre', $nombre);
      if ($excluirId) {
        $stmt->bindParam(':excluir_id', $excluirId, \PDO::PARAM_INT);
      }
      $stmt->execute();
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);

      return $result['total'] > 0;
    } catch (\PDOException $e) {
      throw new \Exception("Error al verificar equipo: " . $e->getMessage());
    }
  }

  //aqui acaba editar equipos 

  ///editar partidos 

  // Obtener todos los partidos con información de equipos y estados
  public function getAllPartidos()
  {
    $sql = "SELECT p.*, 
                       el.nombre as equipo_local_nombre,
                       ev.nombre as equipo_visitante_nombre,
                       e.nombreestado,
                       r.sets_local,
                       r.sets_visitante
                FROM partidos p
                LEFT JOIN equipos el ON p.equipo_local = el.idequipo
                LEFT JOIN equipos ev ON p.equipo_visitante = ev.idequipo
                LEFT JOIN estados e ON p.idestado = e.idestado
                LEFT JOIN resultados r ON p.idpartido = r.idpartido
                ORDER BY p.fecha DESC, p.hora DESC";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  // Obtener un partido específico por ID
  public function getPartidoById($idpartido)
  {
    $sql = "SELECT p.*, 
                       el.nombre as equipo_local_nombre,
                       ev.nombre as equipo_visitante_nombre,
                       e.nombreestado,
                       r.sets_local,
                       r.sets_visitante,
                       r.puntos_asistencia_local,
                       r.puntos_asistencia_visitante
                FROM partidos p
                LEFT JOIN equipos el ON p.equipo_local = el.idequipo
                LEFT JOIN equipos ev ON p.equipo_visitante = ev.idequipo
                LEFT JOIN estados e ON p.idestado = e.idestado
                LEFT JOIN resultados r ON p.idpartido = r.idpartido
                WHERE p.idpartido = ?";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$idpartido]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  // Obtener todos los equipos
  public function getAllEquipos()
  {
    $sql = "SELECT * FROM equipos ORDER BY nombre";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  // Obtener todos los estados
  public function getAllEstados()
  {
    $sql = "SELECT * FROM estados ORDER BY idestado";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  // Crear un nuevo partido
  public function createPartido($fecha, $hora, $equipo_local, $equipo_visitante, $idestado = 1)
  {
    if ($equipo_local == $equipo_visitante) {
      throw new \Exception("Un equipo no puede jugar contra sí mismo");
    }

    $sql = "INSERT INTO partidos (fecha, hora, equipo_local, equipo_visitante, idestado) 
                VALUES (?, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($sql);
    $result = $stmt->execute([$fecha, $hora, $equipo_local, $equipo_visitante, $idestado]);

    return $result ? $this->connection->lastInsertId() : false;
  }

  // Actualizar un partido existente
  public function updatePartido($idpartido, $fecha, $hora, $equipo_local, $equipo_visitante, $idestado)
  {
    if ($equipo_local == $equipo_visitante) {
      throw new \Exception("Un equipo no puede jugar contra sí mismo");
    }

    $sql = "UPDATE partidos 
                SET fecha = ?, hora = ?, equipo_local = ?, equipo_visitante = ?, idestado = ?
                WHERE idpartido = ?";

    $stmt = $this->connection->prepare($sql);
    return $stmt->execute([$fecha, $hora, $equipo_local, $equipo_visitante, $idestado, $idpartido]);
  }

  // Eliminar un partido
  public function deletePartido($idpartido)
  {
    $sql = "DELETE FROM partidos WHERE idpartido = ?";
    $stmt = $this->connection->prepare($sql);
    return $stmt->execute([$idpartido]);
  }

  // Crear o actualizar resultado de un partido
  public function updateResultado($idpartido, $sets_local, $sets_visitante, $puntos_asistencia_local = 0, $puntos_asistencia_visitante = 0)
  {
    // Verificar si ya existe un resultado para este partido
    $checkSql = "SELECT idresultado FROM resultados WHERE idpartido = ?";
    $checkStmt = $this->connection->prepare($checkSql);
    $checkStmt->execute([$idpartido]);
    $existing = $checkStmt->fetch();

    if ($existing) {
      // Actualizar resultado existente
      $sql = "UPDATE resultados 
                    SET sets_local = ?, sets_visitante = ?, puntos_asistencia_local = ?, puntos_asistencia_visitante = ?
                    WHERE idpartido = ?";
      $stmt = $this->connection->prepare($sql);
      return $stmt->execute([$sets_local, $sets_visitante, $puntos_asistencia_local, $puntos_asistencia_visitante, $idpartido]);
    } else {
      // Crear nuevo resultado
      $sql = "INSERT INTO resultados (idpartido, sets_local, sets_visitante, puntos_asistencia_local, puntos_asistencia_visitante) 
                    VALUES (?, ?, ?, ?, ?)";
      $stmt = $this->connection->prepare($sql);
      return $stmt->execute([$idpartido, $sets_local, $sets_visitante, $puntos_asistencia_local, $puntos_asistencia_visitante]);
    }
  }

  // Obtener detalles de sets de un partido
  public function getDetallesSets($idpartido)
  {
    $sql = "SELECT ds.* 
                FROM detalle_sets ds
                INNER JOIN resultados r ON ds.idresultado = r.idresultado
                WHERE r.idpartido = ?
                ORDER BY ds.numero_set";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$idpartido]);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  // Actualizar detalle de un set específico
  public function updateDetalleSet($idpartido, $numero_set, $puntos_local, $puntos_visitante)
  {
    // Primero obtener el idresultado
    $sqlResult = "SELECT idresultado FROM resultados WHERE idpartido = ?";
    $stmtResult = $this->connection->prepare($sqlResult);
    $stmtResult->execute([$idpartido]);
    $resultado = $stmtResult->fetch();

    if (!$resultado) {
      throw new \Exception("No existe un resultado para este partido");
    }

    $idresultado = $resultado['idresultado'];

    // Verificar si ya existe el detalle del set
    $checkSql = "SELECT idset FROM detalle_sets WHERE idresultado = ? AND numero_set = ?";
    $checkStmt = $this->connection->prepare($checkSql);
    $checkStmt->execute([$idresultado, $numero_set]);
    $existing = $checkStmt->fetch();

    if ($existing) {
      // Actualizar set existente
      $sql = "UPDATE detalle_sets 
                    SET puntos_local = ?, puntos_visitante = ?
                    WHERE idresultado = ? AND numero_set = ?";
      $stmt = $this->connection->prepare($sql);
      return $stmt->execute([$puntos_local, $puntos_visitante, $idresultado, $numero_set]);
    } else {
      // Crear nuevo detalle de set
      $sql = "INSERT INTO detalle_sets (idresultado, numero_set, puntos_local, puntos_visitante) 
                    VALUES (?, ?, ?, ?)";
      $stmt = $this->connection->prepare($sql);
      return $stmt->execute([$idresultado, $numero_set, $puntos_local, $puntos_visitante]);
    }
  }

  ///edtar partidos 
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
