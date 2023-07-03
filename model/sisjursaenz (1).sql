-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 04:33:07
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisjursaenz`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarTablaA` (IN `p_id` INT, IN `p_dato` CHAR(30))   BEGIN
    UPDATE usuario
    SET apellido = p_dato
    WHERE id_usuario= p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarTablaN` (IN `p_id` INT, IN `p_dato` CHAR(20))   BEGIN
    UPDATE usuario
    SET nombre = p_dato
    WHERE id_usuario = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuario` (IN `p_id_usuario` INT)   BEGIN
    DELETE FROM `usuario`
    WHERE `id_usuario` = p_id_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `p_nombre` CHAR(20), IN `p_apellido` CHAR(30), IN `p_contrasena` CHAR(200), IN `p_tipo_usuario` VARCHAR(15))   BEGIN
    INSERT INTO `usuario` (`nombre`, `apellido`, `contrasena`, `tipo_usuario`)
    VALUES (p_nombre, p_apellido, p_contrasena, p_tipo_usuario);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiencia`
--

CREATE TABLE `audiencia` (
  `id_audiencia` int(11) NOT NULL,
  `fecha_audiencia` datetime DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `documento` longblob DEFAULT NULL,
  `id_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `decripcion` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_completo` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni_cliente` int(11) NOT NULL,
  `genero` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `email` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `dni_consulta` int(11) NOT NULL,
  `nombre_completo` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_consulta` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL,
  `tipo_expediente` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_expediente` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `contrasena`, `tipo_usuario`) VALUES
(1, 'Nicolay', 'Bendezu Flores', '123456', 'administrador'),
(2, 'Hugo', 'Ancalle Espeza', '123456', 'gerente'),
(3, 'Deni', 'Ramos Ruis', '123456', 'administrador'),
(4, 'Katy', 'Machuca Mesa', '123456', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audiencia`
--
ALTER TABLE `audiencia`
  ADD PRIMARY KEY (`id_audiencia`),
  ADD KEY `R_17` (`id_expediente`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `R_15` (`id_usuario`),
  ADD KEY `R_18` (`id_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `R_12` (`id_usuario`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`dni_consulta`),
  ADD KEY `R_16` (`id_usuario`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `R_13` (`id_cliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audiencia`
--
ALTER TABLE `audiencia`
  MODIFY `id_audiencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `dni_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audiencia`
--
ALTER TABLE `audiencia`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`id_expediente`) REFERENCES `expediente` (`id_expediente`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `R_15` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `R_18` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `R_12` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `R_16` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `R_13` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
