-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 19:43:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `resolvo`
--
CREATE DATABASE resolvo;
use resolvo;
DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `sha256` (`input_string` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
  DECLARE hash_result VARCHAR(255);

  SET hash_result = SHA2(input_string, 256);

  RETURN hash_result;
END$$

DELIMITER ;
--
-- Activar eventos
--
SET GLOBAL event_scheduler = ON;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `calle` varchar(150) NOT NULL,
  `codPostal` varchar(10) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrato` enum('noTiene','limitado','ilimitado') NOT NULL DEFAULT 'noTiene',
  `numIncidencias` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellidos`, `calle`, `codPostal`, `ciudad`, `provincia`, `telefono`, `dni`, `email`, `contrato`, `numIncidencias`) VALUES
(9, 'Kiko', 'Martinez Florin', 'Herrero', '458745', 'Madrid', 'Madrid', '458745215', '58745215P', 'Kiko@gmail.com', 'noTiene', 0),
(10, 'Pedro', 'Martinez Florin', 'Herrero', '458745', 'Madrid', 'Madrid', '563200236', '58745214P', 'Pedro@gmail.com', 'limitado', 10);

--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `cliente_before_delete` BEFORE DELETE ON `cliente` FOR EACH ROW BEGIN
INSERT INTO `clienteeliminado` (`idCliente`, `nombre`, `apellidos`, `calle`, `codPostal`, `ciudad`, `provincia`, `telefono`, `dni`, `email`, `contrato`, `numIncidencias`, `idClienteEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES (OLD.idCliente, OLD.nombre, OLD.apellidos, OLD.calle, OLD.codPostal, OLD.ciudad, OLD.provincia, OLD.telefono, OLD.dni, OLD.email, OLD.contrato, OLD.numIncidencias, NULL, current_timestamp(), USER());
DELETE FROM incidencia WHERE idCliente=old.idCliente;
DELETE FROM presupuesto WHERE idCliente=old.idCliente;
DELETE FROM usuarioExterno WHERE idCliente=old.idCliente;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cliente_before_insert` BEFORE INSERT ON `cliente` FOR EACH ROW BEGIN
	CASE 
		WHEN NEW.contrato LIKE "noTiene" THEN
		 SET NEW.numIncidencias=0;
		WHEN NEW.contrato LIKE "limitado" THEN 
			SET NEW.numIncidencias=10;
		WHEN NEW.contrato LIKE "ilimitado" THEN 
			SET NEW.numIncidencias=1000000;
	END CASE;	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteeliminado`
--

CREATE TABLE `clienteeliminado` (
  `idCliente` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `calle` varchar(150) NOT NULL,
  `codPostal` varchar(10) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrato` enum('noTiene','limitado','ilimitado') NOT NULL DEFAULT 'noTiene',
  `numIncidencias` int(10) UNSIGNED DEFAULT NULL,
  `idClienteEliminacion` int(11) NOT NULL,
  `fechaEliminacion` date NOT NULL DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) NOT NULL DEFAULT 'USER_NAME()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clienteeliminado`
--

INSERT INTO `clienteeliminado` (`idCliente`, `nombre`, `apellidos`, `calle`, `codPostal`, `ciudad`, `provincia`, `telefono`, `dni`, `email`, `contrato`, `numIncidencias`, `idClienteEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(11, 'Turen', 'MasterMind', 'Álcantara', '85126', 'Sevilla', 'Andalucia', '875412026', '85478514A', 'Turen@gmail.com', 'ilimitado', 1000000, 7, '2024-05-20', 'root@localhost'),
(8, 'Laura', 'Jimenez Margó', 'Luna de Cristal', '25841', 'Madrid', 'Madrid', '547852145', '45125875D', 'lauritajiji@gmail.com', 'noTiene', NULL, 8, '2024-05-20', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `idIncidencia` int(11) NOT NULL,
  `idCliente` int(11) UNSIGNED NOT NULL,
  `idTrabajador` int(11) UNSIGNED DEFAULT NULL,
  `dispositivo` varchar(50) NOT NULL DEFAULT '',
  `marca` varchar(50) NOT NULL DEFAULT '',
  `modelo` varchar(50) NOT NULL DEFAULT '',
  `ubicacion` varchar(250) NOT NULL,
  `motivo` varchar(200) NOT NULL DEFAULT '',
  `fechaAltaIncidencia` date DEFAULT current_timestamp(),
  `estado` enum('pendiente','enCurso','cerrada','retenida') NOT NULL DEFAULT 'pendiente',
  `informeTecnico` varchar(200) DEFAULT NULL,
  `fechaCierreIncidencia` date DEFAULT NULL,
  `firmaDigital` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`idIncidencia`, `idCliente`, `idTrabajador`, `dispositivo`, `marca`, `modelo`, `ubicacion`, `motivo`, `fechaAltaIncidencia`, `estado`, `informeTecnico`, `fechaCierreIncidencia`, `firmaDigital`) VALUES
(1, 9, 10, 'Teléfono', 'Samsung', '07098', 'Herrero, 458745 Madrid, Madrid', 'Pantalla rota', '2024-05-21', 'enCurso', 'meee', NULL, NULL),
(3, 9, 17, 'Mobil', 'Samsung', 'Galaxy A2', 'Herrero, 458745 Madrid, Madrid', 'Pantalla rota', '2024-05-20', 'pendiente', NULL, NULL, NULL),
(4, 10, NULL, 'Microondas deluxe', 'Deluxe', '12', 'Herrero, 458745 Madrid, Madrid', 'El plato no gira', '2024-05-20', 'pendiente', NULL, NULL, NULL),
(5, 9, NULL, 'Nevera', 'Xiamon', 'E45G', 'Herrero, 458745 Madrid, Madrid', 'Rotura de la puerta del congelador', '2024-05-20', 'pendiente', NULL, NULL, NULL),
(6, 10, NULL, 'Altavoces', 'Bethesta', 'Gigabit 500', 'Herrero, 458745 Madrid, Madrid', 'Cable pelado', '0000-00-00', 'pendiente', NULL, NULL, NULL);

--
-- Disparadores `incidencia`
--
DELIMITER $$
CREATE TRIGGER `incidencia_before_delete` BEFORE DELETE ON `incidencia` FOR EACH ROW BEGIN
INSERT INTO `incidenciaeliminada` (`idIncidencia`, `idCliente`, `idTrabajador`, `dispositivo`, `marca`, `modelo`, `ubicación`, `motivo`, `fechaAltaIncidencia`, `estado`, `informeTecnico`, `fechaCierreIncidencia`, `firmaDigital`, `fechaEliminacion`, `usuarioEliminacion`) 
VALUES (OLD.idIncidencia, OLD.idCliente, OLD.idTrabajador, OLD.dispositivo, OLD.marca, OLD.modelo, OLD.ubicacion, OLD.motivo, OLD.fechaAltaIncidencia, OLD.estado, OLD.informeTecnico, OLD.fechaCierreIncidencia, OLD.firmaDigital,current_timestamp(), USER());
DELETE FROM media WHERE idIncidencia=OLD.idIncidencia;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `incidencia_before_insert` BEFORE INSERT ON `incidencia` FOR EACH ROW BEGIN
	DECLARE calleVar VARCHAR(255); 
	DECLARE codPostalVar VARCHAR(255);
	DECLARE ciudadVar VARCHAR(255);
	DECLARE provinciaVar VARCHAR(255);
	SELECT calle , codPostal, ciudad, provincia INTO calleVar, codPostalVar, provinciaVar, ciudadVar  FROM cliente WHERE idCliente=NEW.idCliente;
	
	
	
	SET NEW.ubicacion = CONCAT(calleVar,', ', codPostalVar,' ',ciudadVar,', ', provinciaVar);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidenciaeliminada`
--

CREATE TABLE `incidenciaeliminada` (
  `idIncidencia` int(11) NOT NULL,
  `idCliente` int(11) UNSIGNED NOT NULL,
  `idTrabajador` int(11) UNSIGNED NOT NULL,
  `dispositivo` varchar(50) NOT NULL DEFAULT '',
  `marca` varchar(50) NOT NULL DEFAULT '',
  `modelo` varchar(50) NOT NULL DEFAULT '',
  `ubicación` varchar(250) NOT NULL,
  `motivo` varchar(200) NOT NULL DEFAULT '',
  `fechaAltaIncidencia` date DEFAULT current_timestamp(),
  `estado` enum('pendiente','enCurso','cerrada','retenida') NOT NULL DEFAULT 'pendiente',
  `informeTecnico` varchar(200) DEFAULT NULL,
  `fechaCierreIncidencia` date DEFAULT NULL,
  `firmaDigital` longblob DEFAULT NULL,
  `idIncidenciaEliminada` int(11) NOT NULL,
  `fechaEliminacion` date DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) DEFAULT user()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidenciaeliminada`
--

INSERT INTO `incidenciaeliminada` (`idIncidencia`, `idCliente`, `idTrabajador`, `dispositivo`, `marca`, `modelo`, `ubicación`, `motivo`, `fechaAltaIncidencia`, `estado`, `informeTecnico`, `fechaCierreIncidencia`, `firmaDigital`, `idIncidenciaEliminada`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(1, 9, 9, 'Microondas deluxe', 'Deluxe', '12.5 Ultra', '', 'No gira el plato', '2024-05-20', 'pendiente', NULL, NULL, NULL, 13, '2024-05-20', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `idMedia` int(11) NOT NULL,
  `idIncidencia` int(11) DEFAULT NULL,
  `data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `media`
--
DELIMITER $$
CREATE TRIGGER `media_before_delete` BEFORE DELETE ON `media` FOR EACH ROW BEGIN
INSERT INTO `mediaEliminada` (`idMedia`, `idIncidencia`, `data`, `usuarioEliminacion`) VALUES (OLD.idMedia, OLD.idIncidencia, OLD.data, USER());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediaeliminada`
--

CREATE TABLE `mediaeliminada` (
  `idMedia` int(11) NOT NULL,
  `idIncidencia` int(11) DEFAULT NULL,
  `data` longblob DEFAULT NULL,
  `idMediaEliminacion` int(11) NOT NULL,
  `fechaEliminacion` date NOT NULL DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) NOT NULL DEFAULT user()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mediaeliminada`
--

INSERT INTO `mediaeliminada` (`idMedia`, `idIncidencia`, `data`, `idMediaEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(1, NULL, NULL, 1, '2024-05-20', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `idPresupuesto` int(11) NOT NULL,
  `idIncidencia` int(11) DEFAULT NULL,
  `idCliente` int(11) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `coste` decimal(20,6) DEFAULT NULL,
  `aceptado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `presupuesto`
--
DELIMITER $$
CREATE TRIGGER `presupuesto_before_delete` BEFORE DELETE ON `presupuesto` FOR EACH ROW BEGIN
INSERT INTO `presupuestoeliminado` (`idPresupuesto`, `idIncidencia`, `idCliente`, `descripcion`, `coste`, `aceptado`, `idPresupuestoEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES (OLD.idPresupuesto, OLD.idIncidencia, OLD.idCliente, OLD.descripcion, OLD.coste, OLD.coste, NULL, current_timestamp(), USER());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestoeliminado`
--

CREATE TABLE `presupuestoeliminado` (
  `idPresupuesto` int(11) NOT NULL,
  `idIncidencia` int(11) DEFAULT NULL,
  `idCliente` int(11) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `coste` decimal(20,6) DEFAULT NULL,
  `aceptado` tinyint(1) DEFAULT NULL,
  `idPresupuestoEliminacion` int(11) NOT NULL,
  `fechaEliminacion` date NOT NULL DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) NOT NULL DEFAULT user()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `presupuestoeliminado`
--

INSERT INTO `presupuestoeliminado` (`idPresupuesto`, `idIncidencia`, `idCliente`, `descripcion`, `coste`, `aceptado`, `idPresupuestoEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(0, 12, 1, 'dcsfsdf', NULL, NULL, 1, '2024-05-20', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idTrabajador` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `codPostal` varchar(10) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `cargo` enum('administrador','tecnico') DEFAULT NULL,
  `especializacion` enum('mobil','pc','portailes','electrodomesticos','otro') DEFAULT 'otro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idTrabajador`, `nombre`, `apellidos`, `calle`, `codPostal`, `ciudad`, `provincia`, `telefono`, `dni`, `email`, `fechaNacimiento`, `cargo`, `especializacion`) VALUES
(9, 'Tobias', 'Martinez Hernandez', 'La Amargura', '25841', 'Madrid', 'Madrid', '589654521', '45125875D', 'tobias.martinez.hernandez1@resolvo.com', '1984-05-06', 'administrador', ''),
(10, 'Belen', 'Marin Sanchez', 'Calle Bonita', '28942', 'Fuenlabrada', 'Madrid', '666778855', '8989898G', 'belen.marin.sanchez@resolvo.com', '1996-05-16', 'tecnico', ''),
(14, 'soxcram', '96', 'tuto', '45215', 'Getafe', 'Madrid', '458512365', '45214785A', 'soxcram96@gmail.com', '1996-06-12', 'administrador', 'pc'),
(15, 'Laura', 'Fernandez del Bosque', 'tuto', '458745', 'Madrid', 'Madrid', '58952103', '58745214P', 'laura.fernandez.del.bosque@resolvo.com', '1982-01-20', 'tecnico', 'portailes'),
(16, 'Turen', 'Fernandez del Bosque', NULL, '5487521369', 'Loranca', 'Badajoz', '458962014', '658963214', 'turen.fernandez.del.bosque@resolvo.com', '2024-05-30', 'administrador', 'portailes'),
(17, 'Javier', 'Peleto', 'Burdel', '458745', 'Sevilla', 'Andalucia', '458745216', '45874587S', 'javier.peleto@resolvo.com', '2004-05-19', NULL, 'otro');

--
-- Disparadores `trabajador`
--
DELIMITER $$
CREATE TRIGGER `trabajador_after_insert` AFTER INSERT ON `trabajador` FOR EACH ROW BEGIN
	DECLARE random_password VARCHAR(255);
  	SET random_password = SHA256('Resolvo');
  	INSERT INTO usuariointerno(`idTrabajador`, `email`, `material`) 
  	VALUES(NEW.idTrabajador, NEW.email, random_password);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trabajador_after_update` AFTER UPDATE ON `trabajador` FOR EACH ROW BEGIN
	IF OLD.email != NEW.email THEN
		UPDATE usuariointerno SET email= NEW.email WHERE idTrabajador= OLD.idTrabajador;
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trabajador_before_delete` BEFORE DELETE ON `trabajador` FOR EACH ROW BEGIN
INSERT INTO `trabajadoreliminado` (`idTrabajador`, `nombre`, `apellidos`, `calle`, `codPostal`, `ciudad`, `provincia`, `telefono`, `dni`, `email`, `fechaNacimiento`, `cargo`, `especializacion`, `idTrabajadorEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES (OLD.idTrabajador, OLD.nombre, OLD.apellidos, OLD.calle, OLD.codPostal, OLD.ciudad, OLD.provincia, OLD.telefono, OLD.dni, OLD.email, OLD.fechaNacimiento, OLD.cargo, OLD.especializacion, NULL, current_timestamp(), user());
DELETE FROM usuariointerno WHERE idTrabajador=OLD.idTrabajador;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trabajador_before_insert_email` BEFORE INSERT ON `trabajador` FOR EACH ROW BEGIN
  DECLARE dominio_correo VARCHAR(50);
  DECLARE contador_emails INT;


  SET dominio_correo = '@resolvo.com';

  SET contador_emails = 0;

	SET NEW.email = CONCAT(
      LOWER(NEW.nombre), '.', LOWER(REPLACE(NEW.apellidos, ' ', '.')), dominio_correo);


  WHILE EXISTS(
    SELECT 1
    FROM `trabajador`
    WHERE `email`= NEW.email
  )DO
	    	SET contador_emails = contador_emails + 1;
	    	SET NEW.email = CONCAT(
	    	  LOWER(NEW.nombre), '.', LOWER(REPLACE(NEW.apellidos, ' ', '.')), contador_emails, dominio_correo
	   	 );
  END WHILE;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadoreliminado`
--

CREATE TABLE `trabajadoreliminado` (
  `idTrabajador` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `codPostal` varchar(10) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `cargo` enum('administrador','tecnico') DEFAULT NULL,
  `especializacion` enum('mobil','pc','portailes','electrodomesticos','otro') DEFAULT 'otro',
  `idTrabajadorEliminacion` int(11) NOT NULL,
  `fechaEliminacion` date NOT NULL DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) NOT NULL DEFAULT user()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadoreliminado`
--

INSERT INTO `trabajadoreliminado` (`idTrabajador`, `nombre`, `apellidos`, `calle`, `codPostal`, `ciudad`, `provincia`, `telefono`, `dni`, `email`, `fechaNacimiento`, `cargo`, `especializacion`, `idTrabajadorEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(10, 'Tobias', 'Martinez Hernandez', 'La Amargura', '25841', 'Madrid', 'Madrid', '589654521', '45125875D', 'tobias.martinez.hernandez2@resolvo.com', '1984-05-06', 'administrador', '', 3, '2024-05-20', 'root@localhost'),
(11, 'Tobias', 'Martinez Hernandez', 'La Amargura', '25841', 'Madrid', 'Madrid', '589654521', '45125875D', 'tobias.martinez.hernandez3@resolvo.com', '1984-05-06', 'administrador', '', 4, '2024-05-20', 'root@localhost'),
(13, 'Tobias', 'Martinez Hernandez', 'La Amargura', '25841', 'Madrid', 'Madrid', '589654521', '45125875D', 'tobias.martinez.hernandez4@resolvo.com', '1984-05-06', 'administrador', '', 5, '2024-05-20', 'root@localhost'),
(6, 'Tobias', 'Martinez Hernandez', 'La Amargura', '25841', 'Madrid', 'Madrid', '589654521', '45125875D', 'tobias.martinez.hernandez@resolvo.com', '1984-05-06', 'administrador', '', 8, '2024-05-20', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioexterno`
--

CREATE TABLE `usuarioexterno` (
  `idUsuarioExterno` int(11) NOT NULL,
  `idCliente` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `usuarioexterno`
--
DELIMITER $$
CREATE TRIGGER `usuarioexterno_before_delete` BEFORE DELETE ON `usuarioexterno` FOR EACH ROW BEGIN
INSERT INTO `usuarioexternoeliminado` (`idUsuarioExterno`, `idCliente`, `email`, `material`, `idusuarioExternoEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES (OLD.idUsuarioExterno, OLD.idCliente, OLD.email, OLD.material, NULL, current_timestamp(), user());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioexternoeliminado`
--

CREATE TABLE `usuarioexternoeliminado` (
  `idUsuarioExterno` int(11) NOT NULL,
  `idCliente` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `idusuarioExternoEliminacion` int(11) NOT NULL,
  `fechaEliminacion` date NOT NULL DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) NOT NULL DEFAULT user()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarioexternoeliminado`
--

INSERT INTO `usuarioexternoeliminado` (`idUsuarioExterno`, `idCliente`, `email`, `material`, `idusuarioExternoEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(0, NULL, NULL, NULL, 1, '2024-05-20', 'user()'),
(8, 8, 'lauritajiji@gmail.com', 'Cliente123', 2, '2024-05-20', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariointerno`
--

CREATE TABLE `usuariointerno` (
  `idUsuarioInterno` int(11) NOT NULL,
  `idTrabajador` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `primeraVez` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariointerno`
--

INSERT INTO `usuariointerno` (`idUsuarioInterno`, `idTrabajador`, `email`, `material`, `primeraVez`) VALUES
(9, 9, 'tobias.martinez.hernandez1@resolvo.com', '336ccbafd2ec31d0adb0c8284db3f6c1', 1),
(13, 14, 'soxcram96@gmail.com', '5393d0e053f31d3d39ff8d47166054d105ac6d74a4603b7ec8453290082a7602', 0),
(14, 15, 'laura.fernandez.del.bosque@resolvo.com', '96eaefafc3db56ca49863a066b13a6a3c8139d28b49f083673c219bbd81f294e', 0),
(15, 16, 'turen.fernandez.del.bosque@resolvo.com', '60af431ad8883228c4b5181140db3c4cb3e7d956aa81a5fbdf3601895784089f', 1),
(16, 17, 'javier.peleto@resolvo.com', '60af431ad8883228c4b5181140db3c4cb3e7d956aa81a5fbdf3601895784089f', 1),
(17, 10, 'belen.marin.sanchez@resolvo.com', '60af431ad8883228c4b5181140db3c4cb3e7d956aa81a5fbdf3601895784089f', 1);

--
-- Disparadores `usuariointerno`
--
DELIMITER $$
CREATE TRIGGER `usuariointerno_before_delete` AFTER DELETE ON `usuariointerno` FOR EACH ROW BEGIN
INSERT INTO `usuariointernoeliminado` (`idUsuarioInterno`, `idCliente`, `email`, `material`, `idusuarioInternoEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES (OLD.idUsuarioInterno, OLD.idTrabajador, OLD.email, OLD.material, OLD.primeraVez, current_timestamp(), user());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariointernoeliminado`
--

CREATE TABLE `usuariointernoeliminado` (
  `idUsuarioInterno` int(11) NOT NULL,
  `idCliente` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `idusuarioInternoEliminacion` int(11) NOT NULL,
  `fechaEliminacion` date NOT NULL DEFAULT current_timestamp(),
  `usuarioEliminacion` varchar(50) NOT NULL DEFAULT user()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariointernoeliminado`
--

INSERT INTO `usuariointernoeliminado` (`idUsuarioInterno`, `idCliente`, `email`, `material`, `idusuarioInternoEliminacion`, `fechaEliminacion`, `usuarioEliminacion`) VALUES
(6, 6, 'tobias.martinez.hernandez@resolvo.com', '1234', 1, '2024-05-20', 'root@localhost');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `clienteeliminado`
--
ALTER TABLE `clienteeliminado`
  ADD PRIMARY KEY (`idClienteEliminacion`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`idIncidencia`),
  ADD KEY `FK_incidencia_cliente` (`idCliente`),
  ADD KEY `FK_incidencia_trabajador` (`idTrabajador`);

--
-- Indices de la tabla `incidenciaeliminada`
--
ALTER TABLE `incidenciaeliminada`
  ADD PRIMARY KEY (`idIncidenciaEliminada`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `FK_media_incidencia` (`idIncidencia`);

--
-- Indices de la tabla `mediaeliminada`
--
ALTER TABLE `mediaeliminada`
  ADD PRIMARY KEY (`idMediaEliminacion`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`idPresupuesto`),
  ADD KEY `FK_presupuesto_cliente` (`idCliente`),
  ADD KEY `FK_presupuesto_incidencia` (`idIncidencia`);

--
-- Indices de la tabla `presupuestoeliminado`
--
ALTER TABLE `presupuestoeliminado`
  ADD PRIMARY KEY (`idPresupuestoEliminacion`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idTrabajador`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `trabajadoreliminado`
--
ALTER TABLE `trabajadoreliminado`
  ADD PRIMARY KEY (`idTrabajadorEliminacion`);

--
-- Indices de la tabla `usuarioexterno`
--
ALTER TABLE `usuarioexterno`
  ADD PRIMARY KEY (`idUsuarioExterno`),
  ADD KEY `FK_usuarioexterno_cliente_ID` (`idCliente`),
  ADD KEY `FK_usuarioexterno_cliente_email` (`email`);

--
-- Indices de la tabla `usuarioexternoeliminado`
--
ALTER TABLE `usuarioexternoeliminado`
  ADD PRIMARY KEY (`idusuarioExternoEliminacion`);

--
-- Indices de la tabla `usuariointerno`
--
ALTER TABLE `usuariointerno`
  ADD PRIMARY KEY (`idUsuarioInterno`),
  ADD KEY `FK_usuariointerno_trabajador_Id` (`idTrabajador`),
  ADD KEY `FK_usuariointerno_trabajador_email` (`email`);

--
-- Indices de la tabla `usuariointernoeliminado`
--
ALTER TABLE `usuariointernoeliminado`
  ADD PRIMARY KEY (`idusuarioInternoEliminacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clienteeliminado`
--
ALTER TABLE `clienteeliminado`
  MODIFY `idClienteEliminacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `idIncidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `incidenciaeliminada`
--
ALTER TABLE `incidenciaeliminada`
  MODIFY `idIncidenciaEliminada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mediaeliminada`
--
ALTER TABLE `mediaeliminada`
  MODIFY `idMediaEliminacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `idPresupuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuestoeliminado`
--
ALTER TABLE `presupuestoeliminado`
  MODIFY `idPresupuestoEliminacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idTrabajador` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `trabajadoreliminado`
--
ALTER TABLE `trabajadoreliminado`
  MODIFY `idTrabajadorEliminacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarioexterno`
--
ALTER TABLE `usuarioexterno`
  MODIFY `idUsuarioExterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarioexternoeliminado`
--
ALTER TABLE `usuarioexternoeliminado`
  MODIFY `idusuarioExternoEliminacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuariointerno`
--
ALTER TABLE `usuariointerno`
  MODIFY `idUsuarioInterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuariointernoeliminado`
--
ALTER TABLE `usuariointernoeliminado`
  MODIFY `idusuarioInternoEliminacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `FK_incidencia_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_incidencia_trabajador` FOREIGN KEY (`idTrabajador`) REFERENCES `trabajador` (`idTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_media_incidencia` FOREIGN KEY (`idIncidencia`) REFERENCES `incidencia` (`idIncidencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `FK_presupuesto_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_presupuesto_incidencia` FOREIGN KEY (`idIncidencia`) REFERENCES `incidencia` (`idIncidencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarioexterno`
--
ALTER TABLE `usuarioexterno`
  ADD CONSTRAINT `FK_usuarioexterno_cliente_ID` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuariointerno`
--
ALTER TABLE `usuariointerno`
  ADD CONSTRAINT `FK_usuariointerno_trabajador` FOREIGN KEY (`email`) REFERENCES `trabajador` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `resetNumIncidencias` ON SCHEDULE EVERY '0-1' YEAR_MONTH STARTS '2024-05-21 19:04:11' ON COMPLETION PRESERVE ENABLE DO BEGIN
	UPDATE cliente SET numIncidencias = 0 WHERE contrato="noTiene";
	UPDATE cliente SET numIncidencias = 10 WHERE contrato="limitado";
	UPDATE cliente SET numIncidencias = 1000000 WHERE contrato="ilimitado";
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
