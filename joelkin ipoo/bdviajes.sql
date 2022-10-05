-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2022 a las 20:07:09
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdviajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` bigint(20) NOT NULL,
  `enombre` varchar(150) DEFAULT NULL,
  `edireccion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `enombre`, `edireccion`) VALUES
(1, 'Busquen', 'Av. Avellaneda 1233'),
(2, 'Colequen', 'Don Bosco 1154');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `rdocumento` varchar(15) NOT NULL,
  `pnombre` varchar(150) DEFAULT NULL,
  `papellido` varchar(150) DEFAULT NULL,
  `ptelefono` int(11) DEFAULT NULL,
  `idviaje` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`rdocumento`, `pnombre`, `papellido`, `ptelefono`, `idviaje`) VALUES
('142', 'Juan Pablo', 'Gómez', 5544, 19),
('154', 'Noel Hernán', 'Jeckeln', 15511407, 1),
('325', 'Carlos', 'Vera', 4457, 16),
('332', 'Basitan Leno', 'Detta LLorre Jenkelc', 4454, 15),
('447', 'Rocio Noel', 'Jeckeln', 1145, 15),
('753', 'Joel David', 'Jeckeln', 155938151, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `rnumeroempleado` bigint(20) NOT NULL,
  `rnumerolicencia` bigint(20) DEFAULT NULL,
  `rnombre` varchar(150) DEFAULT NULL,
  `rapellido` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`rnumeroempleado`, `rnumerolicencia`, `rnombre`, `rapellido`) VALUES
(11554, 654, 'Sancho', 'Panza'),
(65478, 77788, 'Lautaro', 'Castillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idviaje` bigint(20) NOT NULL,
  `vdestino` varchar(150) DEFAULT NULL,
  `vcantmaxpasajeros` int(11) DEFAULT NULL,
  `idempresa` bigint(20) DEFAULT NULL,
  `rnumeroempleado` bigint(20) DEFAULT NULL,
  `vimporte` float DEFAULT NULL,
  `tipoAsiento` varchar(150) DEFAULT NULL,
  `idayvuelta` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idviaje`, `vdestino`, `vcantmaxpasajeros`, `idempresa`, `rnumeroempleado`, `vimporte`, `tipoAsiento`, `idayvuelta`) VALUES
(1, 'Neuquén', 150, 2, 65478, 7500, 'PRIMERA,CAMA', 'NO'),
(15, 'Carlos Paz', 450, 1, 65478, 15000, 'PRIMERA,CAMA', 'NO'),
(16, 'Asunción', 120, 2, 65478, 5000, 'PRIMERA,CAMA', 'NO'),
(19, 'Jujuy', 200, 1, 11554, 5000, 'TURISTA,SEMICAMA', 'NO'),
(24, 'huinganco', 200, 2, 11554, 6000, 'TURISTA,SEMICAMA', 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`rdocumento`),
  ADD KEY `idviaje` (`idviaje`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`rnumeroempleado`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`idviaje`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `rnumeroempleado` (`rnumeroempleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `rnumeroempleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65479;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `idviaje` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD CONSTRAINT `pasajero_ibfk_1` FOREIGN KEY (`idviaje`) REFERENCES `viaje` (`idviaje`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`rnumeroempleado`) REFERENCES `responsable` (`rnumeroempleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;