-- Crear usuario de acceso a la aplicación
CREATE USER IF NOT EXISTS 'usuarioappej'@'localhost'
IDENTIFIED BY 'clave123';

-- Conceder permisos sobre ej_usuarios_bd
GRANT SELECT, INSERT, UPDATE, DELETE
ON ej_usuarios_bd.*
TO 'usuarioappej'@'localhost';