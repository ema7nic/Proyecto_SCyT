-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-04-2018 a las 22:49:27
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_scyt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE IF NOT EXISTS `asignacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_proyecto_grupo` int(11) DEFAULT NULL,
  `id_asignacion_global` int(11) DEFAULT NULL,
  `monto` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_25629271FCF8192D` (`id_usuario`),
  KEY `IDX_25629271B383269B` (`id_proyecto_grupo`),
  KEY `IDX_256292718EAE13E1` (`id_asignacion_global`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_global`
--

DROP TABLE IF EXISTS `asignacion_global`;
CREATE TABLE IF NOT EXISTS `asignacion_global` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

DROP TABLE IF EXISTS `comprobante`;
CREATE TABLE IF NOT EXISTS `comprobante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_55DEEE8216E7C0E7` (`id_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_solicitud`
--

DROP TABLE IF EXISTS `concepto_solicitud`;
CREATE TABLE IF NOT EXISTS `concepto_solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

DROP TABLE IF EXISTS `localidad`;
CREATE TABLE IF NOT EXISTS `localidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigoPostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provincia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4F68E0104E7121AF` (`provincia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre`, `codigoPostal`, `provincia_id`) VALUES
(1, 'SANTA FE', '3000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`) VALUES
(1, 'ARGENTINA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_516B70B0F57D32FD` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `id_pais`, `nombre`) VALUES
(1, 1, 'SANTA FE'),
(2, 1, 'CHACO'),
(3, 1, 'ENTRE RIOS'),
(4, 1, 'CATAMARCA'),
(5, 1, 'TIERRA DEL FUEGO'),
(9, 1, 'BUENOS AIRES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_grupo`
--

DROP TABLE IF EXISTS `proyecto_grupo`;
CREATE TABLE IF NOT EXISTS `proyecto_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_utn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8EE59B9DFCF8192D` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto_grupo`
--

INSERT INTO `proyecto_grupo` (`id`, `codigo`, `codigo_utn`, `nombre`, `fecha_inicio`, `fecha_fin`, `saldo`, `id_usuario`) VALUES
(1, 'P1234', 'P1234', 'Proyecto Prueba 1234', '2013-03-25 00:00:00', '2013-03-26 00:00:00', '1000.00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_generacion` datetime NOT NULL,
  `fecha_ultima_modificacion` datetime NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `nombre_evento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `fecha_llegada` datetime NOT NULL,
  `importe_total` decimal(10,2) NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autores` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ejercicio` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nro_nota` int(11) DEFAULT NULL,
  `fecha_revision` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `id_proyecto_grupo` int(11) NOT NULL,
  `contratados` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `id_tipoEvento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96D27CC0FCF8192D` (`id_usuario`),
  KEY `IDX_96D27CC0CF5D5C37` (`id_localidad`),
  KEY `IDX_96D27CC0B383269B` (`id_proyecto_grupo`),
  KEY `IDX_96D27CC06924F8B0` (`id_tipoEvento`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `fecha_generacion`, `fecha_ultima_modificacion`, `direccion`, `fecha_inicio`, `fecha_fin`, `nombre_evento`, `fecha_salida`, `fecha_llegada`, `importe_total`, `estado`, `autores`, `ejercicio`, `observaciones`, `nro_nota`, `fecha_revision`, `id_usuario`, `id_localidad`, `id_proyecto_grupo`, `contratados`, `fecha_baja`, `id_tipoEvento`) VALUES
(1, '2018-03-27 20:50:29', '2018-03-27 20:50:29', 'Mitre 123', '2018-03-28 00:00:00', '2018-03-29 00:00:00', 'Evento Congreso', '2018-03-27 00:00:00', '2018-03-30 00:00:00', '200.00', 'INICIADO', 'Pablo Bonet', 2018, 'observaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(2, '2018-03-27 20:54:53', '2018-03-27 20:54:53', 'Mitre 123', '2018-03-30 00:00:00', '2018-03-31 00:00:00', 'Congreso', '2018-03-29 00:00:00', '2018-03-31 00:00:00', '200.00', 'INICIADO', 'Pablo Bonet', 2018, 'observaciones', 1234, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(3, '2018-03-27 22:17:08', '2018-03-27 22:17:08', 'Calle 2', '2018-03-28 00:00:00', '2018-03-31 00:00:00', 'Evento Congreso', '2018-03-27 00:00:00', '2018-03-31 00:00:00', '100.00', 'INICIADO', 'Pablo Bonet', 2018, '123wasd', 1234, NULL, 4, 1, 1, 'Adrian', NULL, 1),
(4, '2018-04-12 22:29:28', '2018-04-12 22:29:28', 'Storni', '2018-04-13 00:00:00', '2018-04-14 00:00:00', 'Curso', '2018-04-12 00:00:00', '2018-04-15 00:00:00', '200.00', 'INICIADO', 'Pablo', 2018, 'asdsadsd', 12345, NULL, 4, 1, 1, 'Adrian', NULL, 1),
(5, '2018-04-23 22:16:40', '2018-04-23 22:16:40', 'Mitre 123', '2018-04-24 00:00:00', '2018-04-25 00:00:00', 'Evento Congreso', '2018-04-23 00:00:00', '2018-04-26 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'lll', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(6, '2018-04-23 22:29:31', '2018-04-23 22:29:31', 'Calle 2', '2018-04-25 00:00:00', '2018-04-26 00:00:00', 'Evento Congreso', '2018-04-23 00:00:00', '2018-04-30 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'wadas', 123123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(7, '2018-04-23 22:31:42', '2018-04-23 22:31:42', 'Calle 2', '2018-04-24 00:00:00', '2018-04-25 00:00:00', 'Evento Congreso', '2018-04-23 00:00:00', '2018-04-27 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'oó', 78979, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(8, '2018-04-23 22:34:31', '2018-04-23 22:34:31', 'fghj', '2018-04-25 00:00:00', '2018-04-27 00:00:00', 'Evento Congreso', '2018-04-23 00:00:00', '2018-04-28 00:00:00', '20.00', 'INICIADO', 'Pablo', 2018, 'Obervaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(9, '2018-04-23 22:40:36', '2018-04-23 22:40:36', 'calle1', '2018-04-24 00:00:00', '2018-04-26 00:00:00', 'Evento Congreso', '2018-04-23 00:00:00', '2018-04-27 00:00:00', '20.00', 'INICIADO', 'Pablo', 2018, '123wasd', 123, NULL, 4, 1, 1, 'Adrian', NULL, 1),
(10, '2018-04-23 22:43:09', '2018-04-23 22:43:09', 'calle1', '2018-04-23 00:00:00', '2018-04-25 00:00:00', 'Evento Congreso', '2018-04-23 00:00:00', '2018-04-28 00:00:00', '20.00', 'INICIADO', 'Pablo', 2018, 'observaciones', 123, NULL, 4, 1, 1, 'Adrian', NULL, 1),
(11, '2018-04-25 20:45:21', '2018-04-25 20:45:21', 'Calle 2', '2018-04-25 00:00:00', '2018-04-26 00:00:00', 'Congreso', '2018-04-25 00:00:00', '2018-04-28 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'Obervaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(12, '2018-04-25 20:45:36', '2018-04-25 20:45:36', 'Calle 2', '2018-04-25 00:00:00', '2018-04-26 00:00:00', 'Congreso', '2018-04-25 00:00:00', '2018-04-28 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'Obervaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(13, '2018-04-25 20:45:53', '2018-04-25 20:45:53', 'Calle 2', '2018-04-25 00:00:00', '2018-04-26 00:00:00', 'Congreso', '2018-04-25 00:00:00', '2018-04-28 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'Obervaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(14, '2018-04-25 21:23:26', '2018-04-25 21:23:26', 'Mitre 123', '2018-04-25 00:00:00', '2018-04-26 00:00:00', 'Evento Congreso', '2018-04-25 00:00:00', '2018-04-28 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'Obervaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(15, '2018-04-25 21:28:55', '2018-04-25 21:28:55', 'Mitre 123', '2018-04-25 00:00:00', '2018-04-26 00:00:00', 'Evento Congreso', '2018-04-25 00:00:00', '2018-04-26 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'observaciones', 1234, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(16, '2018-04-29 20:27:48', '2018-04-29 20:27:48', 'calle1', '2018-04-29 00:00:00', '2018-04-30 00:00:00', 'Evento Congreso', '2018-04-30 00:00:00', '2018-04-30 00:00:00', '200.00', 'INICIADO', 'Pablo Bonet', 2018, 'observaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1),
(17, '2018-04-29 20:36:46', '2018-04-29 20:36:46', 'Calle 2', '2018-04-30 00:00:00', '2018-05-01 00:00:00', 'Evento Congreso', '2018-04-30 00:00:00', '2018-05-01 00:00:00', '20.00', 'INICIADO', 'Pablo Bonet', 2018, 'observaciones', 123, NULL, 4, 1, 1, 'Adrián Magnago', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_concepto_solicitud`
--

DROP TABLE IF EXISTS `solicitud_concepto_solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud_concepto_solicitud` (
  `solicitud_id` int(11) NOT NULL,
  `concepto_solicitud_id` int(11) NOT NULL,
  PRIMARY KEY (`solicitud_id`,`concepto_solicitud_id`),
  KEY `IDX_943D99D01CB9D6E4` (`solicitud_id`),
  KEY `IDX_943D99D0BFC648A1` (`concepto_solicitud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

DROP TABLE IF EXISTS `tipo_evento`;
CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`id`, `nombre`) VALUES
(1, 'CONGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `fecha_ultima_modificacion` datetime NOT NULL,
  `dni` int(11) NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `apellido` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_dni` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05D7F8F253B` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `mail`, `fecha_alta`, `fecha_baja`, `fecha_ultima_modificacion`, `dni`, `roles`, `apellido`, `tipo_dni`) VALUES
(4, 'Pablo', '1234', 'pablo94_88@hotmail.com', '2018-03-24 21:57:08', NULL, '2018-03-24 21:57:08', 33468473, 'a:1:{i:0;s:17:\"ROLE_INVESTIGADOR\";}', 'Bonet', 'DNI'),
(5, 'Adrian', '0342123456', 'adrian@hotmail.com', '2018-04-12 22:20:00', NULL, '2018-04-12 22:20:00', 33123456, 'a:1:{i:0;s:17:\"ROLE_INVESTIGADOR\";}', 'Magnago', 'DNI');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `FK_256292718EAE13E1` FOREIGN KEY (`id_asignacion_global`) REFERENCES `asignacion_global` (`id`),
  ADD CONSTRAINT `FK_25629271B383269B` FOREIGN KEY (`id_proyecto_grupo`) REFERENCES `proyecto_grupo` (`id`),
  ADD CONSTRAINT `FK_25629271FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD CONSTRAINT `FK_55DEEE8216E7C0E7` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `FK_4F68E0104E7121AF` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `FK_516B70B0F57D32FD` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `proyecto_grupo`
--
ALTER TABLE `proyecto_grupo`
  ADD CONSTRAINT `FK_8EE59B9DFCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `FK_96D27CC06924F8B0` FOREIGN KEY (`id_tipoEvento`) REFERENCES `tipo_evento` (`id`),
  ADD CONSTRAINT `FK_96D27CC0B383269B` FOREIGN KEY (`id_proyecto_grupo`) REFERENCES `proyecto_grupo` (`id`),
  ADD CONSTRAINT `FK_96D27CC0CF5D5C37` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`),
  ADD CONSTRAINT `FK_96D27CC0FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `solicitud_concepto_solicitud`
--
ALTER TABLE `solicitud_concepto_solicitud`
  ADD CONSTRAINT `FK_943D99D01CB9D6E4` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_943D99D0BFC648A1` FOREIGN KEY (`concepto_solicitud_id`) REFERENCES `concepto_solicitud` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
