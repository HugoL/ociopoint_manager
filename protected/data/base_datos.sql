-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2014 a las 18:06:39
-- Versión del servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hlociopoint_manager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('superadmin', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'Rol Administrador', NULL, NULL),
('superadmin', 2, 'Usuario Dios', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('superadmin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_facturas`
--

CREATE TABLE IF NOT EXISTS `om_facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `proforma` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 -> es proforma 0 -> es factura',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_profiles`
--

CREATE TABLE IF NOT EXISTS `om_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(255) NOT NULL DEFAULT '',
  `poblacion` varchar(255) NOT NULL DEFAULT '',
  `provincia` varchar(255) NOT NULL DEFAULT '',
  `codigo_postal` varchar(10) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `movil` varchar(20) NOT NULL DEFAULT '',
  `rol` int(11) NOT NULL DEFAULT '3',
  `id_padre` int(11) NOT NULL DEFAULT '0',
  `referencia` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `rol` (`rol`),
  KEY `id_padre` (`id_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `om_profiles`
--

INSERT INTO `om_profiles` (`user_id`, `lastname`, `firstname`, `direccion`, `poblacion`, `provincia`, `codigo_postal`, `telefono`, `movil`, `rol`, `id_padre`, `referencia`) VALUES
(1, 'Admin', 'Administrator', '', '', '', '', '', '', 1, 1, ''),
(2, 'No sé', 'Jair', '', '', '', '', '', '', 2, 1, ''),
(3, 'Uno', 'Distribuidor', '', '', '', '', '', '', 3, 1, ''),
(5, 'Uno', 'Comercial', '', '', '', '', '', '', 4, 1, ''),
(6, 'Uno', 'Establecimiento', '', '', '', '', '', '', 5, 1, 'es221014zgz001'),
(7, 'Langa Murillo', 'Señor Jingles', '', '', '', '', '', '', 5, 1, ''),
(8, 'Langa Roy', 'Hugo', '', '', '', '', '', '', 4, 2, 'es201014zgz001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `om_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `om_profiles_fields`
--

INSERT INTO `om_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 2, 3),
(2, 'firstname', 'Nombre', 'VARCHAR', '50', '3', 1, '', '', 'Campo Nombre incorrecto', '', '', '', '', 1, 3),
(3, 'direccion', 'Dirección', 'VARCHAR', '255', '0', 0, '', '', '', '', '', '', '', 3, 2),
(4, 'poblacion', 'Población', 'VARCHAR', '255', '0', 0, '', '', '', '', '', '', '', 4, 2),
(5, 'provincia', 'Provincia', 'VARCHAR', '255', '0', 0, '', '', '', '', '', '', '', 5, 2),
(6, 'codigo_postal', 'Código Postal', 'VARCHAR', '10', '0', 0, '[0-9]', '', '', '', '', '', '', 6, 2),
(8, 'telefono', 'Teléfono', 'VARCHAR', '20', '0', 0, '/^[A-Za-z0-9\\s,]+$/u', '', 'Campo Teléfono no válido', '', '', '', '', 7, 2),
(9, 'movil', 'Teléfono Móvil', 'VARCHAR', '20', '0', 0, '', '', 'Campo Teléfono Móvil no válido', '', '', '', '', 8, 2),
(10, 'id_padre', 'Padre', 'INTEGER', '11', '1', 3, '', '', 'El padre es incorrecto', '', '1', '', '', 0, 0),
(11, 'referencia', 'Referencia', 'VARCHAR', '255', '1', 2, '', '', 'Referencia inválida', '', '', '', '', 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_roles`
--

CREATE TABLE IF NOT EXISTS `om_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `activado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `om_roles`
--

INSERT INTO `om_roles` (`id`, `nombre`, `activado`) VALUES
(1, 'superadmin', 1),
(2, 'administrador', 1),
(3, 'distribuidor', 1),
(4, 'comercial', 1),
(5, 'establecimiento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_users`
--

CREATE TABLE IF NOT EXISTS `om_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `om_users`
--

INSERT INTO `om_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2014-10-02 21:06:21', '2014-10-21 15:49:11', 1, 1),
(2, 'jair', '90586b2e23ac7909183be12cf9253f5b', 'info@kioskopoint.com', '929485ed244701f9785edaebd1126fa9', '2014-10-02 21:06:21', '2014-10-21 15:48:52', 0, 1),
(3, 'distribuidor1', 'f270943efd2e9d9e772978b56ad3a2c1', 'distribuidor@ociopoint.com', '09f9101f0e6114eec1bddd13350c0d4f', '2014-10-16 14:19:20', '2014-10-21 15:16:32', 0, 1),
(5, 'comercial1', '4072c1c3f468878a7d48dd7a4564cb57', 'comercial@kioskopoint.com', '288f0fc2f73be9866c582e5d8db01be9', '2014-10-16 15:08:40', '2014-10-20 22:15:10', 0, 1),
(6, 'establecimiento1', 'b181c79e2793c5e0496e25b32ee9982e', 'establecimiento@kioskopoint.com', 'b44cbe276bf2c7f546296a2c0d7c3c6b', '2014-10-16 15:11:56', '2014-10-20 22:17:28', 0, 1),
(7, 'jingles', '2e59e9270f40bcaca25ccd2d23f87d0a', 'misterjingles@hotmail.com', '9de30667d37fdcc922395d25fbe35cc8', '2014-10-20 08:29:37', '2014-10-20 08:31:16', 0, 1),
(8, 'hugo', 'ae4d176ebaa6d584a7450f02e8415dd3', 'hlanga@hlanga.es', '6895e3ea807e735a354e442200d92af7', '2014-10-20 10:47:04', '2014-10-21 15:38:16', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_ventas`
--

CREATE TABLE IF NOT EXISTS `om_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `clics` int(11) NOT NULL DEFAULT '0',
  `nuevos_registros` int(11) NOT NULL DEFAULT '0',
  `nuevos_depositantes` int(11) NOT NULL DEFAULT '0',
  `nuevos_depositantes_deportes` int(11) NOT NULL DEFAULT '0',
  `nuevos_depositantes_casino` int(11) NOT NULL DEFAULT '0',
  `nuevos_depositantes_poquer` int(11) NOT NULL DEFAULT '0',
  `nuevos_depositantes_juegos` int(11) NOT NULL DEFAULT '0',
  `nuevos_depositantes_bingo` int(11) NOT NULL DEFAULT '0',
  `valor_depositos` int(11) NOT NULL DEFAULT '0',
  `numero_depositos` int(11) NOT NULL DEFAULT '0',
  `facturacion_deportes` float NOT NULL DEFAULT '0',
  `numero_apuestas_deportivas` int(11) NOT NULL DEFAULT '0',
  `usuarios_activos_deportes` int(11) NOT NULL DEFAULT '0',
  `sesiones_casino` int(11) NOT NULL DEFAULT '0',
  `nuevos_jugadores_deportes` int(11) NOT NULL DEFAULT '0',
  `nuevos_jugadores_casino` int(11) NOT NULL DEFAULT '0',
  `nuevos_clientes_poquer` int(11) NOT NULL DEFAULT '0',
  `nuevos_clientes_juego` int(11) NOT NULL DEFAULT '0',
  `nuevos_jugadores_bingo` int(11) NOT NULL DEFAULT '0',
  `beneficios_netos_deportes` float NOT NULL DEFAULT '0',
  `beneficios_netos_casino` float NOT NULL DEFAULT '0',
  `beneficios_netos_poquer` float NOT NULL DEFAULT '0',
  `beneficios_netos_juegos` float NOT NULL DEFAULT '0',
  `ingresos_totales_netos` float NOT NULL DEFAULT '0',
  `ganancias_afiliado_deportes` float NOT NULL DEFAULT '0',
  `ganancias_afiliado_casino` float NOT NULL DEFAULT '0',
  `ganancias_afiliado_poquer` float NOT NULL DEFAULT '0',
  `ganancias_afiliado_juego` float NOT NULL DEFAULT '0',
  `comisiones_debidas` float NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` text COLLATE utf8_spanish_ci,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `om_ventas`
--

INSERT INTO `om_ventas` (`id`, `fecha`, `clics`, `nuevos_registros`, `nuevos_depositantes`, `nuevos_depositantes_deportes`, `nuevos_depositantes_casino`, `nuevos_depositantes_poquer`, `nuevos_depositantes_juegos`, `nuevos_depositantes_bingo`, `valor_depositos`, `numero_depositos`, `facturacion_deportes`, `numero_apuestas_deportivas`, `usuarios_activos_deportes`, `sesiones_casino`, `nuevos_jugadores_deportes`, `nuevos_jugadores_casino`, `nuevos_clientes_poquer`, `nuevos_clientes_juego`, `nuevos_jugadores_bingo`, `beneficios_netos_deportes`, `beneficios_netos_casino`, `beneficios_netos_poquer`, `beneficios_netos_juegos`, `ingresos_totales_netos`, `ganancias_afiliado_deportes`, `ganancias_afiliado_casino`, `ganancias_afiliado_poquer`, `ganancias_afiliado_juego`, `comisiones_debidas`, `fecha_creacion`, `observaciones`, `id_usuario`) VALUES
(1, '2014-10-21', 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 54.23, 25.324, 45.123, 55, 210.2, 103.33, '2014-10-21 14:08:16', '', 8),
(2, '2014-10-22', 7, 7, 7, 7, 7, 7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 245.21, 245.21, 245.21, 245.21, 245.21, 245.21, '2014-10-21 14:19:40', 'No sé', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rights`
--

INSERT INTO `rights` (`itemname`, `type`, `weight`) VALUES
('superadmin', 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `om_profiles`
--
ALTER TABLE `om_profiles`
  ADD CONSTRAINT `om_profiles_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `om_roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `om_profiles_ibfk_2` FOREIGN KEY (`id_padre`) REFERENCES `om_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `om_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `om_ventas`
--
ALTER TABLE `om_ventas`
  ADD CONSTRAINT `om_ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `om_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
