-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS voleibol;

-- Crear la base de datos
CREATE DATABASE voleibol;
USE voleibol;

-- Tabla: usuarios
CREATE TABLE usuarios (
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    telefono VARCHAR(20),
    correo VARCHAR(100)
);
