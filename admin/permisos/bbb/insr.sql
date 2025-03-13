-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2025 a las 15:21:54
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
-- Base de datos: `insr`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualisa` (IN `Pactualisado` FLOAT)   begin 
update productos
set precio = Pactualisado;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualisar` (IN `precio` FLOAT, OUT `Pactualisado` FLOAT)   begin 
set Pactualisado = (precio);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `calfiniquito` (IN `sn` FLOAT, IN `tiempo` INT, IN `hacienda` FLOAT, IN `inseso` FLOAT, IN `pdg` FLOAT, OUT `finiquito` FLOAT)   begin 
set @finiquito=(sn*tiempo)/(hacienda+inseso+pdg);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `calfiniquitos` (IN `sn` FLOAT, IN `tiempo` INT, IN `hacienda` FLOAT, IN `inseso` FLOAT, IN `pdg` FLOAT, OUT `finiquitos` FLOAT)   begin 
set finiquitos = (sn*tiempo)/(hacienda+inseso+pdg);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enteros` (IN `a` INT, IN `b` INT)   BEGIN
if a>b then
select a;
else 
select b;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ienteros` (IN `a` INT, IN `b` INT, IN `c` INT)   BEGIN
if a>b && a>c then
select a;
elseif b>a && b>c then
select b;
else 
select c;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sumar_enteros` (IN `a` INT, IN `b` INT)   BEGIN
   
    DECLARE suma INT;
    
  
    SET suma = a + b;
    

    SELECT suma AS resultado;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contacto_emergencia` varchar(45) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `foto`, `nombre`, `apellidos`, `fecha_nacimiento`, `contacto_emergencia`, `id_especialidad`) VALUES
(1, 'uploads/IMG_20240624_121036_976.jpg', 'andres', 'esono', '2024-12-31', '222233', 1),
(2, 'uploads/WhatsApp Image 2025-01-22 at 23.42.42', 'teresa', 'esono', '1995-10-28', '222233333', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `denominacion` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `denominacion`, `descripcion`, `id_sala`) VALUES
(1, 'DAW', 'la mejor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `estado` enum('aprobado','denegado','pendiente','regresado') DEFAULT NULL,
  `archivo_adjuntado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `motivo`, `fecha_entrada`, `fecha_salida`, `id_alumno`, `estado`, `archivo_adjuntado`) VALUES
(1, 'estoy enfermo', '2025-01-25', '2025-01-27', 1, 'regresado', 'uiouio'),
(2, 'tengo', '2025-01-25', '2025-01-27', 1, 'regresado', 'uiouio'),
(3, 'tengo desgracia', '2025-01-27', '2025-01-28', 1, 'regresado', 'TGSHS'),
(4, 'tydyjjhkj', '2025-01-27', '2025-01-28', 1, 'regresado', 'TGSHS'),
(5, 'ytdcuhkvjk', '2025-01-27', '2025-01-28', 1, '', 'TGSHS'),
(6, 'teyfujvjnbj', '2025-01-27', '2025-01-28', 1, 'denegado', 'TGSHS'),
(7, 'billy esta malito', '2025-01-28', '2025-01-30', 1, 'denegado', 'TGSHS'),
(8, 'jblkbklbk;', '2025-01-16', '2025-01-16', 1, '', 'TGSHS'),
(10, 'llevo varios dias enfermo , puedes salir a por un medicamentos , porfavor llevo varios dias enfermo , puedes salir a por un medicamentos , porfavor', '2025-01-31', '2025-02-07', 1, 'regresado', 'TGSHS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nombre` varchar(20) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nombre`, `categoria`, `precio`) VALUES
('pan', 'guarnicion', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`) VALUES
(1, 'pan', 'guarnicion', 50),
(2, 'pan', 'guarnicion', 50),
(3, 'pan', 'guarnicion', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `planta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `numero`, `capacidad`, `planta`) VALUES
(1, 205, 100000, 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_salida` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `numero_cuarto` int(3) DEFAULT NULL,
  `fechayhora_entrada` datetime DEFAULT NULL,
  `fechayhora_salida` datetime DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `estado` enum('salido','regresado','cancelado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id_salida`, `id_alumno`, `numero_cuarto`, `fechayhora_entrada`, `fechayhora_salida`, `destino`, `estado`) VALUES
(1, 2, 205, '2025-01-28 21:06:27', '2025-01-29 22:00:38', 'oyala-pueblo', 'regresado'),
(2, 2, 319, '2025-01-28 21:07:07', '2025-01-29 22:00:34', 'beber en unicon', 'cancelado'),
(3, 1, 22, '2025-01-28 21:26:40', '2025-02-13 10:48:10', 'beber en unicon', 'regresado'),
(4, 2, 117, '2025-01-28 22:03:04', '2025-01-30 00:56:54', 'oyala-pueblo', 'regresado'),
(5, 1, 223, '2025-01-28 22:13:12', '2025-02-13 10:48:37', 'oyala-pueblo', 'cancelado'),
(6, 2, 144, '2025-01-29 09:29:48', '2025-01-29 09:31:09', 'oyala-pueblo', 'regresado'),
(7, 2, 144, '2025-01-29 09:30:40', '2025-01-29 09:31:10', 'oyala-pueblo', 'regresado'),
(8, 2, 144, '2025-01-29 09:30:57', '2025-01-29 09:31:11', 'oyala-pueblo', 'regresado'),
(9, 1, 111, '2025-01-29 09:35:39', '2025-02-01 18:54:32', 'oyala-pueblo', 'regresado'),
(10, 2, 4, '2025-01-29 11:21:02', '2025-01-30 23:45:23', 'oyala-pueblo', 'cancelado'),
(11, 1, 6, '2025-01-29 11:28:39', '2025-02-01 18:54:23', 'oyala-pueblo', 'regresado'),
(12, 1, 232, '2025-01-29 22:00:58', '2025-01-29 22:01:03', 'oyala-pueblo', 'regresado'),
(13, 1, 312, '2025-01-30 09:48:29', '2025-02-04 15:48:13', 'malabo', 'regresado'),
(14, 1, 55, '2025-01-30 16:28:44', '2025-01-30 16:28:54', 'oyala-pueblo', 'regresado'),
(15, 1, 777, '2025-01-30 23:45:18', '2025-01-30 23:45:46', 'oyala-pueblo', 'regresado'),
(16, 1, 88, '2025-01-30 23:45:40', '2025-01-30 23:45:52', 'oyala-pueblo', 'regresado'),
(17, 1, 318, '2025-01-31 11:42:24', '2025-02-01 18:54:17', 'hotel-djibloho', 'regresado'),
(18, 1, 44, '2025-02-03 08:03:33', '2025-02-13 10:48:45', 'hotel-djibloho', 'regresado'),
(19, 2, 55, '2025-02-04 15:48:00', '2025-02-04 15:48:11', 'hotel-djibloho', 'regresado'),
(20, 1, 406, '2025-02-13 11:13:04', '2025-02-13 11:14:42', 'oyala', 'regresado'),
(21, 1, 232, '2025-02-28 15:19:41', NULL, 'ggggg', 'salido');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `especialidad_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`);

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `salidas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
