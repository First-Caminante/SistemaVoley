CREATE DATABASE voleibol2;
USE voleibol2;

-- Tabla: estados (simplificada)
CREATE TABLE estados (
    idestado INT PRIMARY KEY AUTO_INCREMENT,
    nombreestado VARCHAR(20) NOT NULL UNIQUE
);

-- Tabla: equipos (optimizada)
CREATE TABLE equipos (
    idequipo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion VARCHAR(255),
    logo VARCHAR(255)
);

-- Tabla: usuarios (mejorada)
CREATE TABLE usuarios (
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    nombre_completo VARCHAR(150),
    email VARCHAR(100) UNIQUE
);

-- Tabla: permisos (sin cambios)
CREATE TABLE permisos (
    idpermiso INT PRIMARY KEY AUTO_INCREMENT,
    idequipo INT NOT NULL,
    fecha DATE NOT NULL,
    motivo VARCHAR(100),
    FOREIGN KEY (idequipo) REFERENCES equipos(idequipo) ON DELETE CASCADE,
    UNIQUE KEY (idequipo, fecha)
);

-- Tabla: partidos (mejorada)
CREATE TABLE partidos (
    idpartido INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    hora TIME,
    equipo_local INT NOT NULL,
    equipo_visitante INT NOT NULL,
    idestado INT DEFAULT 1,
    FOREIGN KEY (equipo_local) REFERENCES equipos(idequipo),
    FOREIGN KEY (equipo_visitante) REFERENCES equipos(idequipo),
    FOREIGN KEY (idestado) REFERENCES estados(idestado),
    CHECK (equipo_local <> equipo_visitante),
    INDEX (fecha)
);

-- Tabla: resultados (combina marcador y sets)
CREATE TABLE resultados (
    idresultado INT PRIMARY KEY AUTO_INCREMENT,
    idpartido INT NOT NULL UNIQUE,
    sets_local INT NOT NULL DEFAULT 0,
    sets_visitante INT NOT NULL DEFAULT 0,
    puntos_asistencia_local INT DEFAULT 0,
    puntos_asistencia_visitante INT DEFAULT 0,
    FOREIGN KEY (idpartido) REFERENCES partidos(idpartido) ON DELETE CASCADE
);

-- Tabla: detalle_sets (reemplaza setresultado)
CREATE TABLE detalle_sets (
    idset INT PRIMARY KEY AUTO_INCREMENT,
    idresultado INT NOT NULL,
    numero_set INT NOT NULL,
    puntos_local INT NOT NULL,
    puntos_visitante INT NOT NULL,
    FOREIGN KEY (idresultado) REFERENCES resultados(idresultado) ON DELETE CASCADE,
    CHECK (numero_set BETWEEN 1 AND 5),
    UNIQUE KEY (idresultado, numero_set)
);

-- Eliminé tablaposiciones (se calculará dinámicamente)
-- Eliminé asistencias (integrado en resultados)
