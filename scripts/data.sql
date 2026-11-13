-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS ej_usuarios_bd
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ej_usuarios_bd;

-- Tabla de roles
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL,
    CONSTRAINT fk_usuarios_roles
        FOREIGN KEY (id_rol)
        REFERENCES roles(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Insertar los roles
INSERT INTO roles (id, nombre) VALUES
    (1, 'admin'),
    (2, 'user');

-- Insertar los usuarios
INSERT INTO usuarios (id, usuario, password, id_rol) VALUES
    (1, 'ana', '$2y$10$EUH/iN3x7y3VZq/20qE/WOUBb3TGRtC1629TKz9q5QZqR87H6xVNe', 1),
    (2, 'pedro', 'HASH_DE_LA_CONTRASEÑA', 2);