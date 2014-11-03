-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-11-2014 a las 14:23:36
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.2.17

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
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
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
-- Estructura de tabla para la tabla `om_categoriasventas`
--

CREATE TABLE IF NOT EXISTS `om_categoriasventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `om_categoriasventas`
--

INSERT INTO `om_categoriasventas` (`id`, `nombre`, `descripcion`, `activado`) VALUES
(1, 'bet', 'apuestas deportivas', 1),
(2, 'poquer', 'Apuestas póquer', 1);

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
  `pdf` varchar(255) DEFAULT NULL,
  `cuentabancaria` varchar(30) NOT NULL DEFAULT '',
  `comision` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `rol` (`rol`),
  KEY `id_padre` (`id_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `om_profiles`
--

INSERT INTO `om_profiles` (`user_id`, `lastname`, `firstname`, `direccion`, `poblacion`, `provincia`, `codigo_postal`, `telefono`, `movil`, `rol`, `id_padre`, `referencia`, `pdf`, `cuentabancaria`, `comision`) VALUES
(1, 'Admin', 'Administrator', '', '', '', '', '', '', 1, 1, '', '', '', 0),
(2, 'No sé', 'Jair', '', '', '', '', '', '', 2, 1, '', '', '', 0),
(3, 'Uno', 'Distribuidor', '', '', '', '', '', '', 3, 1, '', '', '', 0),
(5, 'Uno', 'Comercial', '', '', '', '', '', '', 4, 1, '', '', '', 0),
(6, 'Uno', 'Establecimiento', '', '', '', '', '', '', 5, 1, 'es221014zgz001', '', '', 0),
(7, 'Langa Murillo', 'Señor Jingles', 'cadasa', 'zgz', 'zgz', '656578', '666555444', '', 3, 1, '', '', '', 0),
(8, 'Langa Roy', 'Hugo', 'adas', 'asaass', 'aaaa', '50897', '676555555', '', 4, 3, 'es201014zgz001', '', '', 5),
(9, 'Bar', 'Loly', '', '', '', '', '', '', 5, 3, 'es231014zgz003', '', '', 0),
(10, 'Brothers', 'Taberna', '', '', '', '', '', '', 5, 8, 'es231014epi001', '', '', 0),
(11, 'Nápoli', 'Bar', 'zasd', 'zaragoza', 'Zaragoza', '50290', '687458520', '', 5, 8, 'es001cr0414', '', '', 10),
(13, 'Pepito', 'Pepe', 'caseas', 'zaragoza', 'zaragoza', '634233', '654443323', '', 5, 8, 'es001cr0414', NULL, '', 0),
(14, 'Murillo', 'Laura', 'assasfd', '', '', '', '', '', 5, 8, '', NULL, '1232 3333 22 9182738291', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `om_profiles_fields`
--

INSERT INTO `om_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 2, 3),
(2, 'firstname', 'Nombre', 'VARCHAR', '50', '3', 1, '', '', 'Campo Nombre incorrecto', '', '', '', '', 1, 3),
(3, 'direccion', 'Dirección', 'VARCHAR', '255', '0', 1, '', '', '', '', '', '', '', 3, 2),
(4, 'poblacion', 'Población', 'VARCHAR', '255', '0', 1, '', '', '', '', '', '', '', 4, 2),
(5, 'provincia', 'Provincia', 'VARCHAR', '255', '0', 1, '', '', '', '', '', '', '', 5, 2),
(6, 'codigo_postal', 'Código Postal', 'VARCHAR', '10', '0', 1, '', '', '', '', '', '', '', 6, 2),
(8, 'telefono', 'Teléfono', 'VARCHAR', '20', '0', 1, '/^[A-Za-z0-9\\s,]+$/u', '', 'Campo Teléfono no válido', '', '', '', '', 7, 2),
(9, 'movil', 'Teléfono Móvil', 'VARCHAR', '20', '0', 0, '', '', 'Campo Teléfono Móvil no válido', '', '', '', '', 8, 2),
(10, 'id_padre', 'Padre', 'INTEGER', '11', '1', 3, '', '', 'El padre es incorrecto', '', '1', '', '', 0, 0),
(11, 'referencia', 'Referencia', 'VARCHAR', '255', '1', 2, '', '', 'Referencia inválida', '', '', '', '', 9, 2),
(12, 'pdf', 'Pdf', 'VARCHAR', '255', '0', 0, '', '', '', '{"file":{"types":"jpg, gif, png, pdf"}}', '', '', '', 10, 0),
(13, 'cuentabancaria', 'Cuenta Bancaria', 'VARCHAR', '30', '20', 3, '', '', 'Cuenta Bancaria no válida', '', '', '', '', 9, 0),
(14, 'comision', 'Comisión', 'INTEGER', '10', '0', 0, '', '', 'El valor de la comisión es incorrecto', '', '', '', '', 11, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `om_users`
--

INSERT INTO `om_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2014-10-02 21:06:21', '2014-11-02 17:32:13', 1, 1),
(2, 'jair', '90586b2e23ac7909183be12cf9253f5b', 'info@kioskopoint.com', '929485ed244701f9785edaebd1126fa9', '2014-10-02 21:06:21', '2014-11-02 22:24:44', 0, 1),
(3, 'distribuidor1', 'f270943efd2e9d9e772978b56ad3a2c1', 'distribuidor@ociopoint.com', '09f9101f0e6114eec1bddd13350c0d4f', '2014-10-16 14:19:20', '2014-11-02 21:37:05', 0, 1),
(5, 'comercial1', '4072c1c3f468878a7d48dd7a4564cb57', 'comercial@kioskopoint.com', '288f0fc2f73be9866c582e5d8db01be9', '2014-10-16 15:08:40', '2014-11-02 21:45:36', 0, 1),
(6, 'establecimiento1', 'b181c79e2793c5e0496e25b32ee9982e', 'establecimiento@kioskopoint.com', 'b44cbe276bf2c7f546296a2c0d7c3c6b', '2014-10-16 15:11:56', '2014-10-20 22:17:28', 0, 1),
(7, 'jingles', '2e59e9270f40bcaca25ccd2d23f87d0a', 'misterjingles@hotmail.com', '9de30667d37fdcc922395d25fbe35cc8', '2014-10-20 08:29:37', '2014-10-20 08:31:16', 0, 1),
(8, 'hugo', 'ae4d176ebaa6d584a7450f02e8415dd3', 'hlanga@hlanga.es', '6895e3ea807e735a354e442200d92af7', '2014-10-20 10:47:04', '2014-11-02 22:04:50', 0, 1),
(9, 'barloly', 'ecf2487f22b251a892f3749687e19fc7', 'loly@kioskopoint.com', '1e8c355ad580235fd8009f3bf431c876', '2014-10-22 22:05:29', '2014-10-22 22:13:17', 0, 1),
(10, 'taberna', 'b61a5497e9d841306e9ef2a34a3cdc22', 'taberna@hotmail.com', '764fbda1c539f258717ce488d9d80f55', '2014-10-22 22:25:51', '2014-11-03 13:12:03', 0, 1),
(11, 'napoli', '81bd8fe38f89db0696e623c09b6bb820', 'barnapoli@gmail.com', '84825e4c836b731e0a4f18158e0fd0ce', '2014-10-23 19:07:19', '2014-11-03 00:10:30', 0, 1),
(12, 'tirar', '83e7b7bc412f20ece3066547f88ed173', 'tirar@tirar.com', '7550131cfee495b242a6f56c905af9d5', '2014-10-24 10:33:54', '0000-00-00 00:00:00', 0, 0),
(13, 'pepito', '32164702f8ffd2b418d780ff02371e4c', 'pepito@hotmail.com', '1ed37ff212154567d841919d0c031854', '2014-10-24 18:46:07', '2014-11-02 19:34:04', 0, 1),
(14, 'Laura', '680e89809965ec41e64dc7e447f175ab', 'laura@gmail.com', 'd80ee6c06224e07846249d4daedfa09c', '2014-10-26 15:37:14', '0000-00-00 00:00:00', 0, 0);

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
  `valor_depositos` float NOT NULL DEFAULT '0',
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
  `csv` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comision_registro` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1225 ;

--
-- Volcado de datos para la tabla `om_ventas`
--

INSERT INTO `om_ventas` (`id`, `fecha`, `clics`, `nuevos_registros`, `nuevos_depositantes`, `nuevos_depositantes_deportes`, `nuevos_depositantes_casino`, `nuevos_depositantes_poquer`, `nuevos_depositantes_juegos`, `nuevos_depositantes_bingo`, `valor_depositos`, `numero_depositos`, `facturacion_deportes`, `numero_apuestas_deportivas`, `usuarios_activos_deportes`, `sesiones_casino`, `nuevos_jugadores_deportes`, `nuevos_jugadores_casino`, `nuevos_clientes_poquer`, `nuevos_clientes_juego`, `nuevos_jugadores_bingo`, `beneficios_netos_deportes`, `beneficios_netos_casino`, `beneficios_netos_poquer`, `beneficios_netos_juegos`, `ingresos_totales_netos`, `ganancias_afiliado_deportes`, `ganancias_afiliado_casino`, `ganancias_afiliado_poquer`, `ganancias_afiliado_juego`, `comisiones_debidas`, `fecha_creacion`, `observaciones`, `csv`, `comision_registro`, `id_usuario`, `id_categoria`) VALUES
(53, '2014-10-02', 11, 0, 0, 0, 0, 0, 0, 0, 40, 2, 317, 8054, 32, 3, 0, 0, 0, 0, 0, 0, 166, 6643, 0, 0, 0, 166, 6643, 24, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(54, '2014-10-03', 26, 1, 1, 1, 0, 0, 0, 0, 260, 7, 414, 9313, 39, 4, 0, 1, 0, 0, 0, 0, 58, 3308, 0, 0, 0, 58, 3308, 8, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(55, '2014-10-04', 29, 0, 2, 0, 0, 0, 0, 0, 160, 3, 566, 6369, 47, 7, 0, 0, 0, 0, 0, 0, 95, 4819, 0, 0, 0, 95, 4819, 14, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(56, '2014-10-05', 25, 1, 0, 3, 0, 0, 0, 0, 320, 4, 733, 325, 52, 8, 0, 0, 0, 0, 0, 0, 395, 8534, 0, 0, 0, 395, 8534, 59, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(57, '2014-10-06', 10, 2, 2, 0, 0, 0, 0, 0, 370, 4, 302, 5845, 31, 4, 0, 0, 0, 0, 0, 0, 71, 429, 0, 0, 0, 71, 429, 10, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(58, '2014-10-07', 12, 1, 0, 3, 0, 0, 0, 0, 330, 5, 399, 3321, 33, 3, 0, 0, 0, 0, 0, 0, 232, 4963, 0, 0, 0, 232, 4963, 34, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(59, '2014-10-08', 13, 1, 0, 3, 0, 0, 0, 0, 230, 4, 312, 13, 4, 0, 0, 0, 0, 0, 0, 128, 4066, 0, 0, 0, 128, 4066, 19, 261, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(60, '2014-10-09', 33, 2, 0, 0, 0, 0, 0, 0, 260, 6, 561, 8611, 34, 3, 0, 0, 0, 0, 0, 0, 249, 3296, 0, 0, 0, 249, 3296, 37, 0, '2014-10-22 22:27:53', NULL, NULL, NULL, 10, 1),
(1015, '2014-04-01', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1016, '2014-04-02', 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1017, '2014-04-03', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1018, '2014-04-04', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1019, '2014-04-05', 31, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1020, '2014-04-06', 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1021, '2014-04-07', 23, 0, 1, 1, 0, 0, 0, 0, 10, 1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 0, 2.3289, 0, 2.2499, 4.5788, 0, 0.6987, 0, 0.675, 1.3737, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1022, '2014-04-08', 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1023, '2014-04-09', 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.0022, 0, 1, 0, 0, 0, 0, 0, 0, 0.5917, 0, 0, 0, 0.5917, 0.1775, 0, 0, 0, 0.1775, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1024, '2014-04-10', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1025, '2014-04-11', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1026, '2014-04-12', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1027, '2014-04-13', 7, 1, 1, 0, 0, 0, 0, 0, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1028, '2014-04-14', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 5, 1, 0, 1, 0, 0, 0, 0, 0.5903, 0, 0, 0, 0.5903, 0.1771, 0, 0, 0, 0.1771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1029, '2014-04-15', 7, 0, 0, 0, 0, 0, 0, 0, 60, 3, 1, 3, 1, 0, 0, 0, 0, 0, 0, 0.5903, 0, 0, 0.0017, 0.592, 0.1771, 0, 0, 0.0005, 0.1776, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1030, '2014-04-16', 2, 0, 0, 0, 0, 0, 0, 0, 60, 3, 41.9983, 4, 2, 0, 0, 0, 0, 0, 0, 24.1317, 0, 0, 26.9992, 51.1309, 7.2396, 0, 0, 8.0998, 15.3394, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1031, '2014-04-18', 11, 1, 1, 0, 0, 0, 0, 0, 20, 2, 0.202, 0, 1, 0, 0, 0, 0, 0, 0, 0.1192, 0, 0, 0, 0.1192, 0.0358, 0, 0, 0, 0.0358, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1032, '2014-04-19', 22, 1, 0, 1, 0, 0, 0, 0, 0, 0, 18.4041, 11, 2, 0, 1, 0, 0, 1, 0, 1.3304, 0, 0, 1.9124, 3.2428, 0.3991, 0, 0, 0.5737, 0.9728, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1033, '2014-04-20', 14, 0, 0, 0, 0, 0, 0, 0, 20, 2, 40.202, 1, 3, 0, 0, 0, 0, 0, 0, 23.7323, 0, 0, 0, 23.7323, 7.1197, 0, 0, 0, 7.1197, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1034, '2014-04-21', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 14, 12, 1, 0, 0, 0, 0, 0, 0, 4.7225, 0, 0, 0, 4.7225, 1.4168, 0, 0, 0, 1.4168, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1035, '2014-04-22', 29, 2, 2, 2, 0, 0, 0, 0, 40, 4, 10, 7, 2, 3, 2, 1, 0, 0, 0, -0.5905, 5.3855, 0, 0, 4.795, -0.1771, 1.6157, 0, 0, 1.4386, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1036, '2014-04-23', 10, 0, 0, 0, 0, 0, 0, 0, 40, 4, 62.0104, 13, 4, 0, 0, 0, 0, 0, 0, -16.525, 0, 0, 0, -16.525, -4.9575, 0, 0, 0, -4.9575, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1037, '2014-04-24', 0, 0, 0, 0, 0, 0, 0, 0, 30, 1, 43.4663, 11, 2, 2, 0, 0, 0, 0, 0, 22.383, 3.2779, 0, 0, 25.6609, 6.7149, 0.9834, 0, 0, 7.6983, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1038, '2014-04-25', 7, 1, 1, 0, 0, 0, 0, 0, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1039, '2014-04-26', 11, 3, 2, 0, 0, 0, 0, 0, 30, 2, 14, 4, 2, 0, 0, 0, 0, 0, 0, 8.2646, 0, 0, 0, 8.2646, 2.4794, 0, 0, 0, 2.4794, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1040, '2014-04-27', 10, 2, 2, 4, 0, 0, 0, 0, 20, 2, 103.856, 39, 8, 0, 4, 0, 0, 0, 0, 28.5626, 0, 0, 0, 28.5626, 8.5688, 0, 0, 0, 8.5688, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1041, '2014-04-28', 0, 0, 0, 1, 0, 0, 0, 0, 10, 1, 15.8954, 11, 4, 0, 1, 0, 0, 0, 0, 6.0009, 0, 0, 0, 6.0009, 1.8003, 0, 0, 0, 1.8003, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1042, '2014-04-29', 10, 2, 1, 1, 0, 0, 0, 0, 110, 9, 110.227, 20, 6, 0, 1, 0, 0, 0, 0, -5.2876, 0, 0, 0, -5.2876, -1.5863, 0, 0, 0, -1.5863, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1043, '2014-04-30', 10, 1, 1, 1, 0, 0, 0, 0, 65, 5, 80.7725, 31, 7, 0, 1, 0, 0, 0, 0, -20.8336, 0, 0, 6.7781, -14.0555, -6.2501, 0, 0, 2.0334, -4.2167, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1044, '2014-05-01', 39, 2, 1, 1, 0, 0, 0, 0, 140, 5, 126.179, 48, 9, 1, 1, 1, 0, 0, 0, -17.4419, 0.5822, 0, -0.4501, -17.3098, -5.2324, 0.1747, 0, -0.135, -5.1927, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1045, '2014-05-02', 17, 0, 0, 0, 0, 0, 0, 0, 35, 2, 136, 24, 6, 0, 0, 0, 0, 0, 0, 15.3463, 0, 0, 0, 15.3463, 4.6039, 0, 0, 0, 4.6039, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1046, '2014-05-03', 22, 0, 1, 1, 0, 0, 0, 0, 45, 4, 297.156, 33, 9, 0, 1, 0, 0, 0, 0, 76.1821, 0, 0, 0, 76.1821, 22.8548, 0, 0, 0, 22.8548, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1047, '2014-05-04', 13, 1, 1, 0, 0, 0, 0, 0, 20, 2, 173.53, 35, 7, 0, 0, 0, 0, 0, 0, -477.154, 0, 0, 0, -477.154, -143.146, 0, 0, 0, -143.146, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1048, '2014-05-05', 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 12.5, 15, 6, 0, 0, 0, 0, 0, 0, -2.9759, 0, 0, 0, -2.9759, -0.8927, 0, 0, 0, -0.8927, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1049, '2014-05-06', 0, 0, 0, 0, 0, 0, 0, 0, 265, 3, 104.421, 29, 5, 0, 0, 0, 0, 0, 0, 41.6066, 0, 0, 0, 41.6066, 12.482, 0, 0, 0, 12.482, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1050, '2014-05-07', 0, 0, 0, 0, 0, 0, 0, 0, 150, 2, 77.0271, 14, 5, 0, 0, 0, 0, 0, 0, 13.9113, 0, 0, 0, 13.9113, 4.1735, 0, 0, 0, 4.1735, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1051, '2014-05-08', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2.83, 10, 2, 0, 0, 0, 0, 0, 0, -0.2716, 0, 0, 0, -0.2716, -0.0815, 0, 0, 0, -0.0815, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1052, '2014-05-09', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.81, 8, 3, 0, 0, 0, 0, 0, 0, -0.8856, 0, 0, 0, -0.8856, -0.2657, 0, 0, 0, -0.2657, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1053, '2014-05-10', 4, 0, 0, 0, 0, 0, 0, 0, 60, 2, 78.2, 29, 3, 0, 0, 0, 0, 0, 0, -93.6546, 0, 0, 0, -93.6546, -28.0964, 0, 0, 0, -28.0964, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1054, '2014-05-11', 0, 0, 0, 0, 0, 0, 0, 0, 90, 5, 317.92, 27, 5, 0, 0, 0, 0, 0, 0, -70.8247, 0, 0, 0, -70.8247, -21.2474, 0, 0, 0, -21.2474, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1055, '2014-05-12', 10, 2, 2, 1, 0, 0, 0, 0, 70, 3, 32.6, 17, 3, 0, 1, 0, 0, 0, 0, 19.2448, 0, 0, 0, 19.2448, 5.7735, 0, 0, 0, 5.7735, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1056, '2014-05-13', 2, 0, 0, 1, 0, 0, 0, 0, 20, 2, 38.4395, 25, 4, 0, 1, 0, 0, 0, 0, 15.8381, 0, 0, 0, 15.8381, 4.7515, 0, 0, 0, 4.7515, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1057, '2014-05-14', 21, 2, 2, 1, 0, 0, 0, 0, 70, 3, 435.223, 48, 6, 0, 1, 0, 0, 0, 0, 63.8396, 0, 0, 0, 63.8396, 19.152, 0, 0, 0, 19.152, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1058, '2014-05-15', 0, 0, 0, 0, 0, 0, 0, 0, 320, 8, 47.6, 53, 3, 0, 0, 0, 0, 0, 0, 16.9067, 0, 0, 0, 16.9067, 5.072, 0, 0, 0, 5.072, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1059, '2014-05-16', 16, 0, 0, 0, 0, 0, 0, 0, 110, 2, 72.5647, 71, 4, 0, 0, 0, 0, 0, 0, 23.7629, 0, 0, 0, 23.7629, 7.1289, 0, 0, 0, 7.1289, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1060, '2014-05-17', 80, 3, 1, 1, 0, 0, 0, 0, 70, 7, 584.354, 59, 7, 0, 1, 0, 0, 0, 0, 114.017, 0, 0, 0, 114.017, 34.205, 0, 0, 0, 34.205, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1061, '2014-05-18', 23, 1, 0, 1, 0, 0, 0, 0, 30, 3, 96.5837, 21, 6, 0, 1, 0, 0, 0, 0, 57.0162, 0, 0, 0, 57.0162, 17.105, 0, 0, 0, 17.105, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1062, '2014-05-19', 4, 0, 0, 0, 0, 0, 0, 0, 80, 3, 22.8, 30, 3, 0, 0, 0, 0, 0, 0, 0.3842, 0, 0, 0, 0.3842, 0.1153, 0, 0, 0, 0.1153, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1063, '2014-05-20', 16, 1, 0, 0, 0, 0, 0, 0, 20, 2, 13.1, 7, 1, 0, 0, 0, 0, 0, 0, 2.9514, 0, 0, 0, 2.9514, 0.8854, 0, 0, 0, 0.8854, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1064, '2014-05-21', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1065, '2014-05-22', 6, 0, 1, 0, 0, 0, 0, 0, 150, 5, 59.6503, 16, 1, 0, 0, 0, 0, 0, 0, 20.6731, 0, 0, 0, 20.6731, 6.2019, 0, 0, 0, 6.2019, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1066, '2014-05-23', 6, 0, 0, 0, 0, 0, 0, 0, 90, 9, 13.6, 18, 2, 0, 0, 0, 0, 0, 0, 6.8595, 0, 0, 0, 6.8595, 2.0579, 0, 0, 0, 2.0579, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1067, '2014-05-24', 25, 1, 1, 2, 0, 0, 0, 0, 350, 20, 788.984, 42, 10, 0, 2, 0, 0, 0, 0, 134.338, 0, 0, 0, 134.338, 40.3016, 0, 0, 0, 40.3016, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1068, '2014-05-25', 6, 0, 0, 0, 0, 0, 0, 0, 20, 2, 38, 11, 3, 0, 0, 0, 0, 0, 0, 22.4324, 0, 0, 0, 22.4324, 6.7297, 0, 0, 0, 6.7297, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1069, '2014-05-26', 2, 0, 0, 0, 0, 0, 0, 0, 30, 3, 15, 8, 1, 0, 0, 0, 0, 0, 0, 8.8549, 0, 0, 0, 8.8549, 2.6565, 0, 0, 0, 2.6565, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1070, '2014-05-27', 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 24.9927, 6, 1, 0, 0, 0, 0, 0, 0, 14.7539, 0, 0, 0, 14.7539, 4.4262, 0, 0, 0, 4.4262, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1071, '2014-05-28', 6, 0, 0, 0, 0, 0, 0, 0, 30, 3, 37.7906, 33, 3, 0, 0, 0, 0, 0, 0, 6.1984, 0, 0, 1.5752, 7.7736, 1.8595, 0, 0, 0.4726, 2.3321, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1072, '2014-05-29', 4, 0, 0, 0, 0, 0, 0, 0, 310, 4, 69.02, 56, 3, 0, 0, 0, 0, 0, 0, 12.4339, 0, 0, 0, 12.4339, 3.7302, 0, 0, 0, 3.7302, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1073, '2014-05-30', 11, 0, 0, 0, 0, 0, 0, 0, 60, 2, 14.5, 8, 3, 0, 0, 0, 0, 0, 0, 8.5598, 0, 0, 0, 8.5598, 2.568, 0, 0, 0, 2.568, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1074, '2014-05-31', 6, 0, 0, 0, 0, 0, 0, 0, 30, 1, 21, 3, 2, 3, 0, 0, 0, 0, 0, 12.3969, 5.0944, 0, 0, 17.4913, 3.7191, 1.5283, 0, 0, 5.2474, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1075, '2014-06-01', 35, 0, 0, 0, 0, 0, 0, 0, 140, 8, 76, 7, 2, 0, 0, 0, 0, 0, 0, 44.8651, 0, 0, 0, 44.8651, 13.4596, 0, 0, 0, 13.4596, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1076, '2014-06-02', 5, 0, 0, 0, 0, 0, 0, 0, 20, 2, 11.0013, 1, 2, 0, 0, 0, 0, 0, 0, 6.4944, 0, 0, 0, 6.4944, 1.9483, 0, 0, 0, 1.9483, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1077, '2014-06-03', 6, 0, 0, 0, 0, 0, 0, 0, 20, 2, 158.76, 29, 1, 0, 0, 0, 0, 0, 0, 9.4424, 0, 0, 0, 9.4424, 2.8327, 0, 0, 0, 2.8327, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1078, '2014-06-04', 10, 0, 0, 0, 0, 0, 0, 0, 70, 5, 110.34, 27, 2, 0, 0, 0, 0, 0, 0, 44.274, 0, 0, 0, 44.274, 13.2822, 0, 0, 0, 13.2822, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1079, '2014-06-05', 2, 0, 0, 0, 0, 0, 0, 0, 20, 1, 20.5002, 7, 2, 0, 0, 0, 0, 0, 0, 12.1019, 0, 0, 0, 12.1019, 3.6306, 0, 0, 0, 3.6306, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1080, '2014-06-06', 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 3, 1, 1, 0, 0, 0, 0, 0, 0, 1.7709, 0, 0, 0, 1.7709, 0.5313, 0, 0, 0, 0.5313, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1081, '2014-06-07', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10.97, 7, 3, 0, 0, 0, 0, 0, 0, 6.4759, 0, 0, 0, 6.4759, 1.9428, 0, 0, 0, 1.9428, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1082, '2014-06-08', 26, 1, 1, 1, 0, 0, 0, 0, 90, 5, 64.56, 35, 5, 0, 1, 0, 0, 0, 0, 22.1662, 0, 0, 0, 22.1662, 6.65, 0, 0, 0, 6.65, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1083, '2014-06-09', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30.3165, 19, 1, 0, 0, 0, 0, 0, 0, -0.5425, 0, 0, 0, -0.5425, -0.1627, 0, 0, 0, -0.1627, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1084, '2014-06-10', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 17, 2, 0, 0, 0, 0, 0, 0, 18.4889, 0, 0, 0, 18.4889, 5.5467, 0, 0, 0, 5.5467, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1085, '2014-06-11', 4, 0, 0, 0, 0, 0, 0, 0, 40, 4, 29.56, 8, 3, 0, 0, 0, 0, 0, 0, 17.4501, 0, 0, 0, 17.4501, 5.2351, 0, 0, 0, 5.2351, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1086, '2014-06-12', 20, 0, 0, 0, 0, 0, 0, 0, 120, 8, 66.5337, 14, 5, 0, 0, 0, 0, 0, 0, 37.9958, 0, 0, 0, 37.9958, 11.3988, 0, 0, 0, 11.3988, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1087, '2014-06-13', 14, 0, 0, 0, 0, 0, 0, 0, 160, 3, 46.4295, 22, 5, 0, 0, 0, 0, 0, 0, 12.0183, 0, 0, 0, 12.0183, 3.6054, 0, 0, 0, 3.6054, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1088, '2014-06-14', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25.2619, 18, 5, 0, 0, 0, 0, 0, 0, 14.6707, 0, 0, 0.3375, 15.0082, 4.4013, 0, 0, 0.1013, 4.5026, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1089, '2014-06-15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 6, 3, 0, 0, 0, 0, 0, 0, 5.3128, 0, 0, 0, 5.3128, 1.5939, 0, 0, 0, 1.5939, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1090, '2014-06-16', 3, 0, 0, 0, 0, 0, 0, 0, 20, 2, 23.0087, 10, 2, 0, 0, 0, 0, 0, 0, 13.5826, 0, 0, 0, 13.5826, 4.0748, 0, 0, 0, 4.0748, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1091, '2014-06-17', 0, 0, 0, 0, 0, 0, 0, 0, 180, 4, 273.002, 36, 3, 0, 0, 0, 0, 0, 0, 121.608, 0, 0, 0, 121.608, 36.4824, 0, 0, 0, 36.4824, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1092, '2014-06-18', 23, 0, 0, 0, 0, 0, 0, 0, 80, 4, 184.422, 15, 6, 0, 0, 0, 0, 0, 0, 108.869, 0, 0, 0, 108.869, 32.6609, 0, 0, 0, 32.6609, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1093, '2014-06-19', 2, 0, 0, 0, 0, 0, 0, 0, 10, 1, 17.9833, 3, 3, 0, 0, 0, 0, 0, 0, 4.9487, 0, 0, 0, 4.9487, 1.4846, 0, 0, 0, 1.4846, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1094, '2014-06-20', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 9, 2, 0, 0, 0, 0, 0, 0, 14.1679, 0, 0, 0, 14.1679, 4.2504, 0, 0, 0, 4.2504, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1095, '2014-06-21', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 2, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1096, '2014-06-22', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23.1, 8, 3, 0, 0, 0, 0, 0, 0, -37.2516, 0, 0, 0, -37.2516, -11.1755, 0, 0, 0, -11.1755, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1097, '2014-06-23', 22, 0, 0, 0, 0, 0, 0, 0, 95, 5, 69.9449, 13, 3, 0, 0, 0, 0, 0, 0, 29.4835, 0, 0, 0, 29.4835, 8.845, 0, 0, 0, 8.845, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1098, '2014-06-24', 19, 0, 1, 1, 0, 0, 0, 0, 305, 9, 293.968, 32, 5, 0, 1, 0, 0, 0, 0, -11.3834, 0, 0, 0, -11.3834, -3.4151, 0, 0, 0, -3.4151, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1099, '2014-06-25', 15, 0, 0, 0, 0, 0, 0, 0, 175, 6, 211.149, 31, 6, 0, 0, 0, 0, 0, 0, 77.4193, 0, 0, 0, 77.4193, 23.2258, 0, 0, 0, 23.2258, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1100, '2014-06-26', 20, 0, 0, 0, 0, 0, 0, 0, 110, 6, 387.842, 42, 6, 0, 0, 0, 0, 0, 0, 144.594, 0, 0, 0, 144.594, 43.3782, 0, 0, 0, 43.3782, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1101, '2014-06-27', 2, 0, 0, 0, 0, 0, 0, 0, 10, 1, 37.9698, 10, 3, 0, 0, 0, 0, 0, 0, 14.4981, 0, 0, 0, 14.4981, 4.3494, 0, 0, 0, 4.3494, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1102, '2014-06-28', 14, 0, 0, 0, 0, 0, 0, 0, 175, 3, 274.186, 31, 4, 0, 0, 0, 0, 0, 0, 47.4915, 0, 0, 0, 47.4915, 14.2475, 0, 0, 0, 14.2475, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1103, '2014-06-29', 22, 0, 0, 0, 0, 0, 0, 0, 80, 2, 94.4, 15, 5, 0, 0, 0, 0, 0, 0, 55.7271, 0, 0, 0, 55.7271, 16.7182, 0, 0, 0, 16.7182, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1104, '2014-06-30', 4, 0, 0, 0, 0, 0, 0, 0, 25, 1, 51.6533, 8, 3, 0, 0, 0, 0, 0, 0, 26.0649, 0, 0, 0, 26.0649, 7.8195, 0, 0, 0, 7.8195, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1105, '2014-07-01', 25, 0, 0, 0, 0, 0, 0, 0, 110, 3, 162.498, 17, 3, 0, 0, 0, 0, 0, 0, -132.29, 0, 0, 0, -132.29, -39.687, 0, 0, 0, -39.687, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1106, '2014-07-02', 4, 0, 0, 0, 0, 0, 0, 0, 100, 1, 4, 6, 2, 0, 0, 0, 0, 0, 0, 2.3612, 0, 0, 0, 2.3612, 0.7084, 0, 0, 0, 0.7084, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1107, '2014-07-03', 16, 0, 0, 0, 0, 0, 0, 0, 100, 2, 10, 5, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1108, '2014-07-04', 44, 0, 0, 0, 0, 0, 0, 0, 250, 3, 267.871, 36, 3, 0, 0, 0, 0, 0, 0, 81.9181, 0, 0, 0, 81.9181, 24.5755, 0, 0, 0, 24.5755, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1109, '2014-07-05', 24, 0, 0, 0, 0, 0, 0, 0, 320, 6, 329.849, 26, 2, 0, 0, 0, 0, 0, 0, 138.046, 0, 0, 0, 138.046, 41.4139, 0, 0, 0, 41.4139, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1110, '2014-07-06', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 1, 2, 0, 0, 0, 0, 0, 0, 4.1322, 0, 0, 0, 4.1322, 1.2397, 0, 0, 0, 1.2397, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1111, '2014-07-07', 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1112, '2014-07-08', 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 175.41, 11, 2, 0, 0, 0, 0, 0, 0, 54.9405, 0, 0, 0, 54.9405, 16.4822, 0, 0, 0, 16.4822, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1113, '2014-07-09', 17, 0, 0, 0, 0, 0, 0, 0, 10, 1, 143.988, 19, 3, 0, 0, 0, 0, 0, 0, 35.7652, 0, 0, 0, 35.7652, 10.7295, 0, 0, 0, 10.7295, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1114, '2014-07-10', 12, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1115, '2014-07-11', 4, 0, 0, 0, 0, 0, 0, 0, 100, 1, 5.028, 6, 1, 0, 0, 0, 0, 0, 0, -5.6214, 0, 0, 0, -5.6214, -1.6864, 0, 0, 0, -1.6864, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1116, '2014-07-12', 19, 3, 0, 0, 0, 0, 0, 0, 10, 1, 33.2401, 4, 1, 0, 0, 0, 0, 0, 0, 19.6226, 0, 0, 0, 19.6226, 5.8868, 0, 0, 0, 5.8868, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1117, '2014-07-13', 14, 0, 0, 0, 0, 0, 0, 0, 148, 6, 538.667, 10, 2, 0, 0, 0, 0, 0, 0, 47.3158, 0, 0, 0, 47.3158, 14.1948, 0, 0, 0, 14.1948, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1118, '2014-07-14', 8, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1119, '2014-07-15', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1120, '2014-07-16', 9, 0, 0, 0, 0, 0, 0, 0, 20, 2, 10, 2, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1121, '2014-07-17', 4, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1122, '2014-07-18', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 27.66, 7, 1, 0, 0, 0, 0, 0, 0, -244.996, 0, 0, 0, -244.996, -73.4987, 0, 0, 0, -73.4987, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1123, '2014-07-19', 3, 0, 0, 0, 0, 0, 0, 0, 10, 1, 15, 3, 1, 0, 0, 0, 0, 0, 0, 8.8549, 0, 0, 0, 8.8549, 2.6565, 0, 0, 0, 2.6565, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1124, '2014-07-20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1125, '2014-07-21', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20.51, 7, 1, 0, 0, 0, 0, 0, 0, -18.8916, 0, 0, 0, -18.8916, -5.6675, 0, 0, 0, -5.6675, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1126, '2014-07-22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 51.9981, 6, 1, 0, 0, 0, 0, 0, 0, 30.696, 0, 0, 0, 30.696, 9.2088, 0, 0, 0, 9.2088, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1127, '2014-07-23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 175.64, 11, 1, 0, 0, 0, 0, 0, 0, -0.0035, 0, 0, 0, -0.0035, -0.0011, 0, 0, 0, -0.0011, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1128, '2014-07-24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1129, '2014-07-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 92.73, 6, 1, 0, 0, 0, 0, 0, 0, -106.265, 0, 0, 0, -106.265, -31.8795, 0, 0, 0, -31.8795, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1130, '2014-07-26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 437.62, 15, 1, 0, 0, 0, 0, 0, 0, -7.6243, 0, 0, 0, -7.6243, -2.2873, 0, 0, 0, -2.2873, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1131, '2014-07-27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 275.46, 16, 1, 0, 0, 0, 0, 0, 0, -10.1005, 0, 0, 0, -10.1005, -3.0302, 0, 0, 0, -3.0302, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1132, '2014-07-28', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 5, 1, 0, 0, 0, 0, 0, 0, 59.033, 0, 0, 0, 59.033, 17.7099, 0, 0, 0, 17.7099, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1133, '2014-07-29', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 341.25, 20, 2, 0, 0, 0, 0, 0, 0, 89.1445, 0, 0, 0, 89.1445, 26.7433, 0, 0, 0, 26.7433, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1134, '2014-07-30', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 450, 29, 1, 0, 0, 0, 0, 0, 0, 194.807, 0, 0, 0, 194.807, 58.442, 0, 0, 0, 58.442, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1135, '2014-07-31', 4, 0, 0, 0, 0, 0, 0, 0, 60, 2, 60, 8, 1, 0, 0, 0, 0, 0, 0, 35.4198, 0, 0, 0, 35.4198, 10.6259, 0, 0, 0, 10.6259, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1136, '2014-08-01', 6, 0, 0, 0, 0, 0, 0, 0, 40, 2, 11, 3, 2, 0, 0, 0, 0, 0, 0, 6.4936, 0, 0, 0, 6.4936, 1.9481, 0, 0, 0, 1.9481, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1137, '2014-08-02', 10, 0, 0, 0, 0, 0, 0, 0, 100, 1, 53, 5, 2, 0, 0, 0, 0, 0, 0, 31.2874, 0, 0, 0, 31.2874, 9.3862, 0, 0, 0, 9.3862, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1138, '2014-08-03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134.37, 13, 1, 0, 0, 0, 0, 0, 0, 9.4429, 0, 0, 0, 9.4429, 2.8329, 0, 0, 0, 2.8329, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1139, '2014-08-05', 3, 0, 0, 0, 0, 0, 0, 0, 20, 1, 48, 10, 1, 0, 0, 0, 0, 0, 0, -0.0423, 0, 0, 0, -0.0423, -0.0127, 0, 0, 0, -0.0127, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1140, '2014-08-06', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45.1283, 3, 2, 0, 0, 0, 0, 0, 0, 26.6407, 0, 0, 0, 26.6407, 7.9923, 0, 0, 0, 7.9923, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1141, '2014-08-07', 11, 0, 0, 0, 0, 0, 0, 0, 40, 2, 40, 6, 1, 0, 0, 0, 0, 0, 0, 23.6132, 0, 0, 0, 23.6132, 7.084, 0, 0, 0, 7.084, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1142, '2014-08-08', 2, 0, 0, 0, 0, 0, 0, 0, 10, 1, 10, 1, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1143, '2014-08-09', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 3, 1, 0, 0, 0, 0, 0, 0, 2.9516, 0, 0, 0, 2.9516, 0.8855, 0, 0, 0, 0.8855, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1144, '2014-08-10', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 4, 1, 0, 0, 0, 0, 0, 0, -3.5426, 0, 0, 0, -3.5426, -1.0628, 0, 0, 0, -1.0628, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1145, '2014-08-11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 1, 0, 0, 0, 0, 0, 0, 1.1807, 0, 0, 0, 1.1807, 0.3542, 0, 0, 0, 0.3542, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1146, '2014-08-12', 6, 0, 0, 0, 0, 0, 0, 0, 150, 2, 5, 4, 1, 0, 0, 0, 0, 0, 0, 2.9516, 0, 0, 0, 2.9516, 0.8855, 0, 0, 0, 0.8855, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1147, '2014-08-13', 4, 0, 0, 0, 0, 0, 0, 0, 20, 1, 0.9973, 0, 1, 0, 0, 0, 0, 0, 0, 0.5887, 0, 0, 0, 0.5887, 0.1766, 0, 0, 0, 0.1766, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1148, '2014-08-14', 2, 0, 0, 0, 0, 0, 0, 0, 30, 1, 50, 5, 1, 0, 0, 0, 0, 0, 0, -3.0708, 0, 0, 0, -3.0708, -0.9212, 0, 0, 0, -0.9212, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1149, '2014-08-15', 2, 0, 0, 0, 0, 0, 0, 0, 20, 1, 54.26, 5, 1, 0, 0, 0, 0, 0, 0, 32.0313, 0, 0, 0, 32.0313, 9.6094, 0, 0, 0, 9.6094, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1150, '2014-08-16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 12.3969, 0, 0, 0, 12.3969, 3.7191, 0, 0, 0, 3.7191, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1151, '2014-08-17', 2, 0, 0, 0, 0, 0, 0, 0, 30, 1, 127.01, 8, 1, 0, 0, 0, 0, 0, 0, -32.7374, 0, 0, 0, -32.7374, -9.8212, 0, 0, 0, -9.8212, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1152, '2014-08-18', 8, 0, 0, 0, 0, 0, 0, 0, 30, 1, 152.98, 18, 2, 0, 0, 0, 0, 0, 0, 41.593, 0, 0, 0, 41.593, 12.4779, 0, 0, 0, 12.4779, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1153, '2014-08-19', 14, 0, 0, 0, 0, 0, 0, 0, 20, 1, 185.039, 19, 4, 0, 0, 0, 0, 0, 0, -139.876, 0, 0, 0, -139.876, -41.9627, 0, 0, 0, -41.9627, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1154, '2014-08-20', 4, 0, 0, 0, 0, 0, 0, 0, 20, 2, 153.221, 15, 2, 0, 0, 0, 0, 0, 0, 55.0299, 0, 0, 0, 55.0299, 16.509, 0, 0, 0, 16.509, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1155, '2014-08-21', 10, 0, 0, 0, 0, 0, 0, 0, 40, 2, 30, 7, 1, 0, 0, 0, 0, 0, 0, 17.7099, 0, 0, 0, 17.7099, 5.313, 0, 0, 0, 5.313, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1156, '2014-08-22', 9, 0, 0, 0, 0, 0, 0, 0, 190, 3, 154.971, 15, 2, 0, 0, 0, 0, 0, 0, 44.2559, 0, 0, 0, 44.2559, 13.2768, 0, 0, 0, 13.2768, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1157, '2014-08-23', 4, 0, 0, 0, 0, 0, 0, 0, 50, 1, 50, 4, 1, 0, 0, 0, 0, 0, 0, 29.5165, 0, 0, 0, 29.5165, 8.855, 0, 0, 0, 8.855, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1158, '2014-08-24', 10, 0, 0, 0, 0, 0, 0, 0, 120, 4, 149.3, 17, 2, 0, 0, 0, 0, 0, 0, 85.5977, 0, 0, 0, 85.5977, 25.6793, 0, 0, 0, 25.6793, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1159, '2014-08-25', 19, 0, 0, 0, 0, 0, 0, 0, 160, 10, 173.58, 28, 3, 0, 0, 0, 0, 0, 0, 102.469, 0, 0, 0, 102.469, 30.7408, 0, 0, 0, 30.7408, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1160, '2014-08-26', 10, 0, 0, 0, 0, 0, 0, 0, 351, 5, 100.015, 21, 1, 0, 0, 0, 0, 0, 0, -8.3407, 0, 0, 0, -8.3407, -2.5022, 0, 0, 0, -2.5022, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1161, '2014-08-27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 316.427, 31, 2, 0, 0, 0, 0, 0, 0, -138.634, 0, 0, 0, -138.634, -41.5901, 0, 0, 0, -41.5901, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1162, '2014-08-28', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55, 6, 2, 0, 0, 0, 0, 0, 0, 29.298, 0, 0, 0, 29.298, 8.7894, 0, 0, 0, 8.7894, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1163, '2014-08-29', 6, 0, 0, 0, 0, 0, 0, 0, 10, 1, 10, 2, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1164, '2014-08-30', 5, 0, 0, 0, 0, 0, 0, 0, 70, 3, 64.5, 16, 2, 0, 0, 0, 0, 0, 0, 35.7857, 0, 0, 0, 35.7857, 10.7357, 0, 0, 0, 10.7357, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1165, '2014-08-31', 10, 0, 0, 0, 0, 0, 0, 0, 140, 3, 323.54, 45, 5, 0, 0, 0, 0, 0, 0, 21.0867, 0, 0, 0, 21.0867, 6.3261, 0, 0, 0, 6.3261, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1166, '2014-09-01', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 418.41, 37, 2, 0, 0, 0, 0, 0, 0, 68.0885, 0, 0, 0, 68.0885, 20.4266, 0, 0, 0, 20.4266, '2014-10-31 16:56:29', NULL, NULL, NULL, 11, 1),
(1167, '2014-09-02', 6, 0, 0, 0, 0, 0, 0, 0, 100, 3, 104.85, 18, 2, 0, 0, 0, 0, 0, 0, 19.4795, 0, 0, 0, 19.4795, 5.8438, 0, 0, 0, 5.8438, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1168, '2014-09-03', 2, 0, 0, 0, 0, 0, 0, 0, 40, 2, 226.8, 33, 4, 0, 0, 0, 0, 0, 0, 56.3324, 0, 0, 0, 56.3324, 16.8997, 0, 0, 0, 16.8997, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1169, '2014-09-04', 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 36.9466, 8, 3, 0, 0, 0, 0, 0, 0, -4.3123, 0, 0, -58.1626, -62.4749, -1.2937, 0, 0, -17.4488, -18.7425, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1170, '2014-09-05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 64.0107, 12, 2, 0, 0, 0, 0, 0, 0, 31.329, 0, 0, 0, 31.329, 9.3986, 0, 0, 0, 9.3986, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1171, '2014-09-06', 4, 0, 0, 0, 0, 0, 0, 0, 50, 4, 89.44, 17, 2, 0, 0, 0, 0, 0, 0, 38.0404, 0, 0, 0, 38.0404, 11.4122, 0, 0, 0, 11.4122, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1172, '2014-09-07', 2, 0, 0, 0, 0, 0, 0, 0, 20, 1, 55.27, 12, 3, 0, 0, 0, 0, 0, 0, -7.0735, 0, 0, 0, -7.0735, -2.1221, 0, 0, 0, -2.1221, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1173, '2014-09-08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44.9798, 4, 1, 0, 0, 0, 0, 0, 0, 26.5529, 0, 0, 0, 26.5529, 7.9659, 0, 0, 0, 7.9659, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1174, '2014-09-09', 2, 0, 0, 0, 0, 0, 0, 0, 30, 1, 136.25, 18, 3, 0, 0, 0, 0, 0, 0, 3.1143, 0, 0, 0, 3.1143, 0.9343, 0, 0, 0, 0.9343, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1175, '2014-09-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 1, 0, 0, 0, 0, 0, 0, 5.9033, 0, 0, 0, 5.9033, 1.771, 0, 0, 0, 1.771, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1176, '2014-09-11', 2, 0, 0, 0, 0, 0, 0, 0, 20, 1, 77, 6, 1, 0, 0, 0, 0, 0, 0, 45.4554, 0, 0, 0, 45.4554, 13.6366, 0, 0, 0, 13.6366, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1177, '2014-09-12', 4, 0, 0, 0, 0, 0, 0, 0, 20, 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1178, '2014-09-13', 4, 0, 0, 0, 0, 0, 0, 0, 100, 1, 150, 5, 2, 0, 0, 0, 0, 0, 0, -88.5555, 0, 0, 0, -88.5555, -26.5666, 0, 0, 0, -26.5666, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1179, '2014-09-14', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 142, 14, 5, 0, 0, 0, 0, 0, 0, 82.9708, 0, 0, 0, 82.9708, 24.8913, 0, 0, 0, 24.8913, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1180, '2014-09-15', 3, 0, 0, 0, 0, 0, 0, 0, 30, 1, 72, 19, 3, 0, 0, 0, 0, 0, 0, 16.2803, 0, 0, 0, 16.2803, 4.8841, 0, 0, 0, 4.8841, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1181, '2014-09-16', 21, 1, 1, 1, 0, 0, 0, 0, 175, 4, 176, 31, 5, 0, 1, 0, 0, 0, 0, 80.0183, 0, 0, 0, 80.0183, 24.0056, 0, 0, 0, 24.0056, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1182, '2014-09-17', 12, 0, 0, 0, 0, 0, 0, 0, 120, 3, 296.29, 48, 6, 0, 0, 0, 0, 0, 0, 126.057, 0, 0, 0, 126.057, 37.8173, 0, 0, 0, 37.8173, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1183, '2014-09-18', 12, 0, 0, 0, 0, 0, 0, 0, 60, 3, 97.4163, 22, 6, 0, 0, 0, 0, 0, 0, 31.8922, 0, 0, 0, 31.8922, 9.5678, 0, 0, 0, 9.5678, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1184, '2014-09-19', 0, 0, 0, 0, 0, 0, 0, 0, 30, 1, 20.3914, 11, 3, 0, 0, 0, 0, 0, 0, -9.4746, 0, 0, 12.6001, 3.1255, -2.8424, 0, 0, 3.78, 0.9376, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1185, '2014-09-20', 2, 0, 0, 0, 0, 0, 0, 0, 180, 6, 1047.36, 77, 2, 0, 0, 0, 0, 0, 0, -9.7558, 0, 0, 0, -9.7558, -2.9267, 0, 0, 0, -2.9267, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1186, '2014-09-21', 13, 1, 0, 0, 0, 0, 0, 0, 30, 3, 529.356, 30, 4, 0, 0, 0, 0, 0, 0, 130.944, 0, 0, 0, 130.944, 39.2833, 0, 0, 0, 39.2833, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1187, '2014-09-22', 0, 0, 0, 0, 0, 0, 0, 0, 100, 2, 141.405, 33, 4, 0, 0, 0, 0, 0, 0, 25.4678, 0, 0, 0, 25.4678, 7.6404, 0, 0, 0, 7.6404, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1188, '2014-09-23', 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 322.926, 27, 4, 0, 0, 0, 0, 0, 0, -12.2761, 0, 0, 0, -12.2761, -3.6828, 0, 0, 0, -3.6828, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1189, '2014-09-24', 4, 0, 0, 0, 0, 0, 0, 0, 120, 2, 1032.22, 77, 5, 0, 0, 0, 0, 0, 0, 78.58, 0, 0, 0, 78.58, 23.574, 0, 0, 0, 23.574, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1190, '2014-09-25', 4, 0, 0, 0, 0, 0, 0, 0, 225, 4, 1071.52, 76, 3, 0, 0, 0, 0, 0, 0, 70.8431, 0, 0, 0, 70.8431, 21.253, 0, 0, 0, 21.253, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1191, '2014-09-26', 13, 0, 0, 0, 0, 0, 0, 0, 70, 4, 571.637, 51, 2, 0, 0, 0, 0, 0, 0, 139.008, 0, 0, 0, 139.008, 41.7026, 0, 0, 0, 41.7026, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1192, '2014-09-27', 58, 0, 0, 0, 0, 0, 0, 0, 145, 3, 293.282, 31, 4, 0, 0, 0, 0, 0, 0, 115.946, 0, 0, 0, 115.946, 34.7839, 0, 0, 0, 34.7839, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1193, '2014-09-28', 12, 0, 0, 0, 0, 0, 0, 0, 220, 3, 339, 40, 4, 0, 0, 0, 0, 0, 0, -412.455, 0, 0, 0, -412.455, -123.736, 0, 0, 0, -123.736, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1194, '2014-09-29', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 215.69, 26, 4, 0, 0, 0, 0, 0, 0, 89.7052, 0, 0, 0, 89.7052, 26.9115, 0, 0, 0, 26.9115, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1195, '2014-09-30', 39, 0, 0, 0, 0, 0, 0, 0, 100, 1, 152.557, 23, 5, 0, 0, 0, 0, 0, 0, 33.5212, 0, 0, 0, 33.5212, 10.0564, 0, 0, 0, 10.0564, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1196, '2014-10-01', 11, 0, 0, 0, 0, 0, 0, 0, 235, 4, 539.874, 23, 6, 0, 0, 0, 0, 0, 0, 216.597, 0, 0, 0, 216.597, 64.9792, 0, 0, 0, 64.9792, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1197, '2014-10-02', 21, 0, 0, 0, 0, 0, 0, 0, 40, 2, 317.805, 32, 3, 0, 0, 0, 0, 0, 0, 166.664, 0, 0, 0, 166.664, 49.9994, 0, 0, 0, 49.9994, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1198, '2014-10-03', 26, 1, 1, 1, 0, 0, 0, 0, 260, 7, 414.931, 39, 4, 0, 1, 0, 0, 0, 0, 58.3308, 0, 0, 0, 58.3308, 17.4992, 0, 0, 0, 17.4992, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1199, '2014-10-04', 29, 0, 0, 0, 0, 0, 0, 0, 160, 3, 566.637, 47, 7, 0, 0, 0, 0, 0, 0, 95.4819, 0, 0, 0, 95.4819, 28.6445, 0, 0, 0, 28.6445, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1200, '2014-10-05', 25, 0, 0, 0, 0, 0, 0, 0, 320, 4, 733.325, 52, 8, 0, 0, 0, 0, 0, 0, 395.853, 0, 0, 0, 395.853, 118.756, 0, 0, 0, 118.756, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1201, '2014-10-06', 16, 0, 0, 0, 0, 0, 0, 0, 370, 4, 302.585, 31, 4, 0, 0, 0, 0, 0, 0, 71.429, 0, 0, 0, 71.429, 21.4286, 0, 0, 0, 21.4286, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1202, '2014-10-07', 12, 0, 0, 0, 0, 0, 0, 0, 330, 5, 399.332, 33, 3, 0, 0, 0, 0, 0, 0, 232.496, 0, 0, 0, 232.496, 69.7489, 0, 0, 0, 69.7489, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1203, '2014-10-08', 13, 0, 0, 0, 0, 0, 0, 0, 230, 4, 312, 13, 4, 0, 0, 0, 0, 0, 0, 128.407, 0, 0, 0, 128.407, 38.522, 0, 0, 0, 38.522, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1204, '2014-10-09', 22, 0, 0, 0, 0, 0, 0, 0, 260, 6, 561.861, 34, 3, 0, 0, 0, 0, 0, 0, 249.33, 0, 0, 0, 249.33, 74.7989, 0, 0, 0, 74.7989, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1205, '2014-10-10', 0, 0, 0, 0, 0, 0, 0, 0, 370, 7, 416.023, 21, 4, 0, 0, 0, 0, 0, 0, -136.915, 0, 0, 0, -136.915, -41.0743, 0, 0, 0, -41.0743, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1206, '2014-10-11', 27, 0, 0, 0, 0, 0, 0, 0, 260, 4, 1736.19, 43, 5, 0, 0, 0, 0, 0, 0, 452.84, 0, 0, 0, 452.84, 135.852, 0, 0, 0, 135.852, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1207, '2014-10-12', 8, 0, 0, 0, 0, 0, 0, 0, 227, 5, 656, 35, 6, 0, 0, 0, 0, 0, 0, 233.583, 0, 0, 0, 233.583, 70.0748, 0, 0, 0, 70.0748, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1208, '2014-10-13', 17, 0, 0, 0, 0, 0, 0, 0, 280, 6, 475.094, 37, 5, 0, 0, 0, 0, 0, 0, 138.861, 0, 0, 0, 138.861, 41.6582, 0, 0, 0, 41.6582, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1209, '2014-10-14', 8, 1, 1, 0, 0, 0, 0, 0, 60, 3, 453.765, 34, 4, 0, 0, 0, 0, 0, 0, -106.706, 0, 0, 0, -106.706, -32.0119, 0, 0, 0, -32.0119, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1210, '2014-10-15', 8, 0, 0, 0, 0, 0, 0, 0, 570, 8, 2066.59, 44, 3, 0, 0, 0, 0, 0, 0, 183.146, 0, 0, 0, 183.146, 54.9438, 0, 0, 0, 54.9438, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1211, '2014-10-16', 10, 0, 0, 0, 0, 0, 0, 0, 140, 2, 1067.27, 37, 3, 0, 0, 0, 0, 0, 0, 304.443, 0, 0, 0, 304.443, 91.3327, 0, 0, 0, 91.3327, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1212, '2014-10-17', 20, 0, 0, 0, 0, 0, 0, 0, 213, 3, 536.021, 36, 3, 0, 0, 0, 0, 0, 0, -18.9306, 0, 0, 0, -18.9306, -5.6792, 0, 0, 0, -5.6792, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1213, '2014-10-18', 23, 0, 0, 1, 0, 0, 0, 0, 1210, 12, 1707.04, 55, 5, 0, 1, 0, 0, 0, 0, 315.447, 0, 0, 0, 315.447, 94.6341, 0, 0, 0, 94.6341, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1214, '2014-10-19', 21, 0, 0, 0, 0, 0, 0, 0, 60, 3, 3182.08, 52, 5, 0, 0, 0, 0, 0, 0, -414.015, 0, 0, 0, -414.015, -124.204, 0, 0, 0, -124.204, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1215, '2014-10-20', 7, 0, 0, 0, 0, 0, 0, 0, 50, 3, 2710.94, 47, 4, 0, 0, 0, 0, 0, 0, 472.65, 0, 0, 0, 472.65, 141.795, 0, 0, 0, 141.795, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1216, '2014-10-21', 22, 0, 0, 0, 0, 0, 0, 0, 302, 5, 840.498, 49, 5, 0, 0, 0, 0, 0, 0, -108.424, 0, 0, 0, -108.424, -32.5272, 0, 0, 0, -32.5272, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1217, '2014-10-22', 56, 3, 1, 1, 0, 0, 0, 0, 350, 8, 1420.34, 71, 7, 0, 1, 0, 0, 0, 0, 609.803, 0, 0, 0, 609.803, 182.941, 0, 0, 0, 182.941, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1218, '2014-10-23', 50, 0, 0, 0, 0, 0, 0, 0, 600, 12, 1099.91, 66, 5, 0, 0, 0, 0, 0, 0, 343.602, 0, 0, 0, 343.602, 103.081, 0, 0, 0, 103.081, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1219, '2014-10-24', 25, 1, 1, 1, 0, 0, 0, 0, 1237, 18, 1208.17, 62, 7, 0, 1, 0, 0, 0, 0, 366.67, 0, 0, 0, 366.67, 110.001, 0, 0, 0, 110.001, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1220, '2014-10-25', 26, 0, 0, 0, 0, 0, 0, 0, 1120, 14, 1925.95, 59, 11, 0, 0, 0, 0, 0, 0, 430.875, 0, 0, 0, 430.875, 129.262, 0, 0, 0, 129.262, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1221, '2014-10-26', 29, 0, 0, 0, 0, 0, 0, 0, 580, 6, 998.001, 87, 10, 0, 0, 0, 0, 0, 0, 425.688, 0, 0, 0, 425.688, 127.706, 0, 0, 0, 127.706, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1222, '2014-10-27', 18, 0, 0, 0, 0, 0, 0, 0, 290, 6, 408, 39, 4, 0, 0, 0, 0, 0, 0, 69.535, 0, 0, 0, 69.535, 20.8605, 0, 0, 0, 20.8605, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1223, '2014-10-28', 7, 0, 0, 0, 0, 0, 0, 0, 1010, 11, 3361.04, 79, 6, 0, 0, 0, 0, 0, 0, 459.567, 0, 0, 0, 459.567, 137.87, 0, 0, 0, 137.87, '2014-10-31 16:56:30', NULL, NULL, NULL, 11, 1),
(1224, '2014-11-03', 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, '2014-11-03 13:11:23', NULL, NULL, 15, 10, 2);

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
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
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
  ADD CONSTRAINT `om_ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `om_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `om_ventas_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `om_categoriasventas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
