-- MySQL Workbench Forward Engineering Mejorado

-- Desactiva validaciones temporales para la creación del esquema
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- Crea el esquema si no existe
CREATE SCHEMA IF NOT EXISTS cinecuenca DEFAULT CHARACTER SET utf8;
USE cinecuenca;



-- Tabla Persona
CREATE TABLE IF NOT EXISTS persona (
  idPersona INT AUTO_INCREMENT,
  DNI VARCHAR(10) UNIQUE,
  nombre VARCHAR(45),
  apellido VARCHAR(45),
  email VARCHAR(45) UNIQUE,
  PRIMARY KEY (idPersona)
) ENGINE=InnoDB;

-- Tabla Usuario
DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
  idUsuario INT AUTO_INCREMENT,
  contrasenia VARCHAR(255),
  nombreUsuario VARCHAR(45) UNIQUE,
  Persona_idPersona INT,
  rol VARCHAR(45),
  PRIMARY KEY (idUsuario),
  INDEX fk_usuario_persona_idx (Persona_idPersona),
  CONSTRAINT fk_usuario_persona FOREIGN KEY (Persona_idPersona)
    REFERENCES persona (idPersona)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;


-- Tabla Compra
CREATE TABLE IF NOT EXISTS compra (
  idCompra INT AUTO_INCREMENT,
  fechaHora DATETIME,
  subTotal FLOAT,
  usuario_idUsuario INT,
  PRIMARY KEY (idCompra),
  INDEX fk_compra_usuario_idx (usuario_idUsuario),
  CONSTRAINT fk_compra_usuario
    FOREIGN KEY (usuario_idUsuario)
    REFERENCES usuario (idUsuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Comprobante
CREATE TABLE IF NOT EXISTS comprobante (
  idComprobante INT AUTO_INCREMENT,
  fechaHora DATETIME,
  descripcion VARCHAR(45),
  precio_Total FLOAT,
  forma_Pago VARCHAR(45),
  asiento VARCHAR(45),
  PRIMARY KEY (idComprobante)
) ENGINE=InnoDB;

-- Tabla Pago
CREATE TABLE IF NOT EXISTS pago (
  idPago INT AUTO_INCREMENT,
  monto FLOAT,
  fechaHora DATETIME,
  estadoPago VARCHAR(45),
  totalCompra FLOAT,
  metodoPago VARCHAR(45),
  compra_idCompra INT,
  comprobante_idComprobante INT,
  PRIMARY KEY (idPago),
  INDEX fk_pago_compra_idx (compra_idCompra),
  INDEX fk_pago_comprobante_idx (comprobante_idComprobante),
  CONSTRAINT fk_pago_compra
    FOREIGN KEY (compra_idCompra)
    REFERENCES compra (idCompra)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_pago_comprobante
    FOREIGN KEY (comprobante_idComprobante)
    REFERENCES comprobante (idComprobante)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Pelicula
CREATE TABLE IF NOT EXISTS pelicula (
  idPelicula INT AUTO_INCREMENT,
  clasificacion VARCHAR(45),
  duracion VARCHAR(45),
  sinopsis VARCHAR(2000),
  titulo VARCHAR(45),
  genero VARCHAR(45),
  idioma VARCHAR(45),
  precio FLOAT,
  PRIMARY KEY (idPelicula)
) ENGINE=InnoDB;

-- Tabla DetalleCompra (antes carrito)
CREATE TABLE IF NOT EXISTS detalle_compra (
  idDetalleCompra INT AUTO_INCREMENT,
  precio_Unitario FLOAT,
  pelicula_idPelicula INT,
  compra_idCompra INT,
  PRIMARY KEY (idDetalleCompra),
  INDEX fk_detalle_pelicula_idx (pelicula_idPelicula),
  INDEX fk_detalle_compra_idx (compra_idCompra),
  CONSTRAINT fk_detalle_pelicula
    FOREIGN KEY (pelicula_idPelicula)
    REFERENCES pelicula (idPelicula)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_detalle_compra
    FOREIGN KEY (compra_idCompra)
    REFERENCES compra (idCompra)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Sala
CREATE TABLE IF NOT EXISTS sala (
  idSala INT AUTO_INCREMENT,
  formato VARCHAR(45),
  capacidad INT,
  PRIMARY KEY (idSala)
) ENGINE=InnoDB;

-- Tabla Funcion
CREATE TABLE IF NOT EXISTS funcion (
  idFuncion INT AUTO_INCREMENT,
  fechaHora DATETIME,
  sala_idSala INT,
  pelicula_idPelicula INT,
  PRIMARY KEY (idFuncion),
  INDEX fk_funcion_sala_idx (sala_idSala),
  INDEX fk_funcion_pelicula_idx (pelicula_idPelicula),
  CONSTRAINT fk_funcion_sala
    FOREIGN KEY (sala_idSala)
    REFERENCES sala (idSala)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_funcion_pelicula
    FOREIGN KEY (pelicula_idPelicula)
    REFERENCES pelicula (idPelicula)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Asiento
CREATE TABLE IF NOT EXISTS asiento (
  idAsiento INT AUTO_INCREMENT,
  estado VARCHAR(45),
  numero INT,
  tipo VARCHAR(45),
  fila INT,
  sala_idSala INT,
  PRIMARY KEY (idAsiento),
  INDEX fk_asiento_sala_idx (sala_idSala),
  CONSTRAINT fk_asiento_sala
    FOREIGN KEY (sala_idSala)
    REFERENCES sala (idSala)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =========================
-- DATOS DE PRUEBA
-- =========================
INSERT INTO persona (DNI, nombre, apellido, email)
VALUES ('43711282', 'Fabri', 'Baez', 'fabriciobaezz11@gmail.com');

INSERT INTO usuario (contrasenia, nombreUsuario, Persona_idPersona, rol)
VALUES ('1234', 'fabri1234', 1, 'cliente');

INSERT INTO pelicula (clasificacion, duracion, sinopsis, titulo, genero, idioma, precio)
VALUES ('ATP', '120 min', 'Una comedia para toda la familia', 'La Gran Aventura', 'Comedia', 'Español', 1500.00);

INSERT INTO sala (formato, capacidad)
VALUES ('2D', 100);

INSERT INTO funcion (fechaHora, sala_idSala, pelicula_idPelicula)
VALUES ('2025-06-05 20:00:00', 1, 1);

-- =========================
-- CONSULTAS ÚTILES
-- =========================

-- Todas las películas
SELECT * FROM pelicula;

-- Funciones con nombre de película y formato de sala
SELECT f.idFuncion, f.fechaHora, p.titulo AS Pelicula, s.formato AS Sala
FROM funcion f
JOIN pelicula p ON f.pelicula_idPelicula = p.idPelicula
JOIN sala s ON f.sala_idSala = s.idSala;

-- Datos del usuario
SELECT u.idUsuario, u.nombreUsuario, p.nombre, p.apellido, p.email
FROM usuario u
JOIN persona p ON u.Persona_idPersona = p.idPersona;

-- Compras de un usuario específico
SELECT c.idCompra, c.fechaHora, c.subTotal
FROM compra c
JOIN usuario u ON c.usuario_idUsuario = u.idUsuario
WHERE u.nombreUsuario = 'fabri123';

SELECT * FROM persona;
SELECT * FROM usuario;

SELECT idUsuario, nombreUsuario, contrasenia FROM usuario;

SELECT nombreUsuario, contrasenia FROM usuario;

SELECT nombreUsuario, contrasenia FROM usuario WHERE nombreUsuario = 'usuarioTest';

-- Restauración de validaciones
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;