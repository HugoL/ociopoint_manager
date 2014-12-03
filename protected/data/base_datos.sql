-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2014 a las 14:16:01
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
-- Estructura de tabla para la tabla `om_categoriaswebs`
--

CREATE TABLE IF NOT EXISTS `om_categoriaswebs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `activado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `om_categoriaswebs`
--

INSERT INTO `om_categoriaswebs` (`id`, `nombre`, `descripcion`, `activado`) VALUES
(1, 'general', 'Para las cajitas de la web personalizada, que no es necesario organizar por categorías', 1),
(2, 'Actualidad-Deportes', NULL, 1),
(3, 'Juegos y Apuestas', NULL, 1),
(4, 'Grandes Tiendas', NULL, 1),
(5, 'Varios - Comparadores - Prestamos', NULL, 1),
(6, 'Viajes - Vuelos - Mapas', NULL, 1),
(7, 'Coches - Motos - Revistas', NULL, 1);

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
  `cuentabancaria` varchar(30) DEFAULT '',
  `comision` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `rol` (`rol`),
  KEY `id_padre` (`id_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

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
(13, 'Pepito', 'Pepe', 'caseas', 'zaragoza', 'zaragoza', '634233', '654443323', '', 5, 8, 'es001cr0414.01', NULL, '', 5),
(14, 'Murillo', 'Laura', 'assasfd', 'asafd', 'asdfadf', '78544', '665451222', '', 5, 8, 'es003cb1014', NULL, '1232 3333 22 9182738291', 0),
(15, 'Planet', 'Marcy', 'c/Luna, 7', 'La Luna', 'Lunera', '801245', '745845215', '', 5, 3, 'luna112014', NULL, '', NULL),
(16, 'asfasfd', 'asasf', 'ass', 'axss', 'adsafd', '501245', '69874521', '', 5, 3, '', NULL, '', NULL),
(17, 'adolfo', 'gustavo', 'adkjas', 'asasdasdf', 'adfas', '201245', '699854147', '', 5, 3, '', NULL, '', NULL),
(18, 'añdk', 'adkja', 'añklds', 'asdf', 'assf', '102145', '654785410', '', 5, 3, '', NULL, '', NULL),
(19, 'kllalal', 'alkjak', 'kakljdkñ', 'kjañk', 'ñkjas', '12345', '654121412', '', 5, 3, '', NULL, '', NULL),
(20, 'lulu', 'lulu', 'lulu', 'lulu', 'lulu', '502147', '698474455', '', 5, 3, '', NULL, '', NULL),
(21, 'lalala', 'lala', 'lalalala', 'lalala', 'lalala', '62376', '646552221', '', 5, 2, '', NULL, '', NULL),
(22, 'lalala', 'lala', 'lalalala', 'lalala', 'lalala', '62376', '646552221', '', 5, 2, '', NULL, '', NULL),
(23, 'lalala', 'lala', 'lalalala', 'lalala', 'lalala', '62376', '646552221', '', 5, 2, '', NULL, '', NULL),
(24, 'adf', 'adss', 'adf', 'adf', 'asdf', '501214', '685214520', '', 5, 2, '', NULL, '', NULL),
(27, 'jalalaj', 'jajaja', 'alñjsjk', 'ljasljksjk', 'ñkajsdfs', '874587', '698745841', '', 5, 2, '', NULL, '', NULL),
(28, 'mmm', 'mmm', 'mmm', 'mmm', 'mmm', '147852', '214587410', '', 4, 2, '', NULL, '', NULL),
(29, 'pffff', 'pfff', 'akjdñsljk', 'adfsadf', 'adfad', '854785', '654123214', '', 5, 2, '', NULL, '', NULL),
(30, 'lkajs', 'asjsklja', 'alñksj', 'añkljas', 'ñaklsff', '874587', '698554415', '', 4, 3, '', '29.pdf', '', NULL);

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
(14, 'comision', 'Comisión', 'INTEGER', '10', '0', 0, '', '', 'El valor de la comisión es incorrecto', '', '', '', '', 11, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `om_users`
--

INSERT INTO `om_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2014-10-02 21:06:21', '2014-12-03 11:51:23', 1, 1),
(2, 'jair', '90586b2e23ac7909183be12cf9253f5b', 'info@kioskopoint.com', '929485ed244701f9785edaebd1126fa9', '2014-10-02 21:06:21', '2014-11-27 09:20:12', 0, 1),
(3, 'distribuidor1', 'f270943efd2e9d9e772978b56ad3a2c1', 'distribuidor@ociopoint.com', '09f9101f0e6114eec1bddd13350c0d4f', '2014-10-16 14:19:20', '2014-11-12 09:32:40', 0, 1),
(5, 'comercial1', '4072c1c3f468878a7d48dd7a4564cb57', 'comercial@kioskopoint.com', '288f0fc2f73be9866c582e5d8db01be9', '2014-10-16 15:08:40', '2014-11-27 09:19:49', 0, 1),
(6, 'establecimiento1', 'b181c79e2793c5e0496e25b32ee9982e', 'establecimiento@kioskopoint.com', 'b44cbe276bf2c7f546296a2c0d7c3c6b', '2014-10-16 15:11:56', '2014-10-20 22:17:28', 0, 1),
(7, 'jingles', '2e59e9270f40bcaca25ccd2d23f87d0a', 'misterjingles@hotmail.com', '9de30667d37fdcc922395d25fbe35cc8', '2014-10-20 08:29:37', '2014-10-20 08:31:16', 0, 1),
(8, 'hugo', 'ae4d176ebaa6d584a7450f02e8415dd3', 'hlanga@hlanga.es', '6895e3ea807e735a354e442200d92af7', '2014-10-20 10:47:04', '2014-11-02 22:04:50', 0, 1),
(9, 'barloly', 'ecf2487f22b251a892f3749687e19fc7', 'loly@kioskopoint.com', '1e8c355ad580235fd8009f3bf431c876', '2014-10-22 22:05:29', '2014-10-22 22:13:17', 0, 1),
(10, 'taberna', 'b61a5497e9d841306e9ef2a34a3cdc22', 'taberna@hotmail.com', '764fbda1c539f258717ce488d9d80f55', '2014-10-22 22:25:51', '2014-11-10 12:32:40', 0, 1),
(11, 'napoli', '81bd8fe38f89db0696e623c09b6bb820', 'barnapoli@gmail.com', '84825e4c836b731e0a4f18158e0fd0ce', '2014-10-23 19:07:19', '2014-11-10 12:32:52', 0, 1),
(12, 'tirar', '83e7b7bc412f20ece3066547f88ed173', 'tirar@tirar.com', '7550131cfee495b242a6f56c905af9d5', '2014-10-24 10:33:54', '0000-00-00 00:00:00', 0, 0),
(13, 'pepito', '32164702f8ffd2b418d780ff02371e4c', 'pepito@hotmail.com', '296facf50c2de56f979dadda367ce64e', '2014-10-24 18:46:07', '2014-11-12 12:46:52', 0, 1),
(14, 'Laura', '680e89809965ec41e64dc7e447f175ab', 'laura@gmail.com', 'e03a1c6334d07a25319090651070a9f9', '2014-10-26 15:37:14', '2014-11-12 12:41:28', 0, 1),
(15, 'marciano@planet.com', 'd41d8cd98f00b204e9800998ecf8427e', 'marciano@planet.com', '7d5ff62fd5e9729d7c648ded3022c14f', '2014-11-10 10:21:08', '0000-00-00 00:00:00', 0, 0),
(16, 'adsfsa@galo.com', 'd41d8cd98f00b204e9800998ecf8427e', 'adsfsa@galo.com', '163fed82dbbae324bd3c0a80882d55c3', '2014-11-10 10:26:36', '0000-00-00 00:00:00', 0, 0),
(17, 'asdasfs', 'd41d8cd98f00b204e9800998ecf8427e', 'asdasfs@hotmail.com', '2c561512e215c77f5a6cfb0c81b3f190', '2014-11-10 10:37:20', '0000-00-00 00:00:00', 0, 0),
(18, 'llolol', '73f1cb44438fe0020a4c9552094633a5', 'llolol@asds.com', '940e1d9249a7ada627ae3c33495ac063', '2014-11-10 10:47:50', '0000-00-00 00:00:00', 0, 0),
(19, 'kokoko', 'd5cbfe9ff07fef1ecc93861ce5dd4f3b', 'kokoko@ko.com', 'b896d62ce8f00faa3f7951ef2cf4bc31', '2014-11-10 10:49:31', '0000-00-00 00:00:00', 0, 0),
(20, 'lululu', '6b08a2da5087131c38863745bfad1bef', 'lululu@gmail.com', 'c1c5b159e1833f3ff0ed26a3f3613b7f', '2014-11-10 11:19:03', '0000-00-00 00:00:00', 0, 0),
(21, 'alalala', 'e51d6441579554eba15fe3e89cb8e098', 'lalala@lala.com', 'd905f5638c88fee8f72f87b68a76f91c', '2014-11-10 11:21:19', '0000-00-00 00:00:00', 0, 0),
(22, 'alalals', '7550f8df9a16934f19862846fea7c2a9', 'lalals@lala.com', 'cf5479db1e8da7d0fa18a3e39ab133e0', '2014-11-10 11:22:41', '0000-00-00 00:00:00', 0, 0),
(23, 'alalalj', '2cf66b131ed69a29706c77b41adce906', 'lalalj@lala.com', '79384779a3a860b169a9fa2d2919c2a9', '2014-11-10 11:25:52', '0000-00-00 00:00:00', 0, 0),
(24, '', 'd41d8cd98f00b204e9800998ecf8427e', 'asdsfk@asdf.com', '0e8fc726b4707b2268bdaca2d3c97068', '2014-11-10 11:28:49', '0000-00-00 00:00:00', 0, 0),
(27, 'uiuiuiuiu', 'd0def0bd6a866c9d13d7a63d5f729836', 'uiuiuiuiu@unizar.es', 'f8851afeaa9a9f20b1a08f0737bdb601', '2014-11-10 11:32:36', '0000-00-00 00:00:00', 0, 0),
(28, 'mierda', '14f87ec1e760d16c0380c74ec7678b04', 'mierda@mierda.es', 'bdbd5e62e94ad741915b14362aa69024', '2014-11-10 11:34:45', '0000-00-00 00:00:00', 0, 0),
(29, 'pfffpfpf', '9917680b8ecfd863c2f2c5c5f6587add', 'pfff@pfflflf.es', 'ba7a95557288559460405918454fd366', '2014-11-10 11:37:03', '0000-00-00 00:00:00', 0, 0),
(30, 'aattsss', 'cc2c7156f2e5b52c5fa7e98ec458c61d', 'aattsss@gmail.com', 'af5bf9434cf2859d5d499bb38f7ddd4f', '2014-11-12 09:33:54', '0000-00-00 00:00:00', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1279 ;

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
(1224, '2014-11-03', 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, '2014-11-03 13:11:23', NULL, NULL, 15, 10, 2),
(1247, '2014-11-01', 23, 0, 0, 0, 0, 0, 0, 0, 380, 3, 5269.52, 101, 9, 0, 0, 0, 0, 0, 0, -246.33, 0, 0, 0, -246.33, -73.899, 0, 0, 0, -73.899, '2014-11-12 12:39:51', NULL, NULL, NULL, 11, 1),
(1248, '2014-11-02', 25, 1, 1, 0, 0, 0, 0, 0, 120, 6, 3965.8, 79, 6, 0, 0, 0, 0, 0, 0, 530.753, 0, 0, 0, 530.753, 159.226, 0, 0, 0, 159.226, '2014-11-12 12:39:51', NULL, NULL, NULL, 11, 1),
(1249, '2014-11-03', 6, 0, 0, 0, 0, 0, 0, 0, 70, 3, 3073.82, 67, 5, 0, 0, 0, 0, 0, 0, 239.429, 0, 0, 0, 239.429, 71.8288, 0, 0, 0, 71.8288, '2014-11-12 12:39:51', NULL, NULL, NULL, 11, 1),
(1250, '2014-11-04', 8, 0, 0, 1, 0, 0, 0, 0, 430, 6, 1509.28, 97, 10, 0, 1, 0, 0, 0, 0, 356.344, 0, 0, 0, 356.344, 106.903, 0, 0, 0, 106.903, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1251, '2014-11-05', 16, 0, 0, 0, 0, 0, 0, 0, 250, 5, 867.734, 54, 11, 0, 0, 0, 0, 0, 0, 330.474, 0, 0, 0, 330.474, 99.1423, 0, 0, 0, 99.1423, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1252, '2014-11-06', 6, 0, 0, 0, 0, 0, 0, 0, 990, 14, 928.713, 38, 5, 0, 0, 0, 0, 0, 0, 272.878, 0, 0, 0, 272.878, 81.8635, 0, 0, 0, 81.8635, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1253, '2014-11-07', 17, 0, 0, 0, 0, 0, 0, 0, 550, 6, 2988.62, 94, 6, 0, 0, 0, 0, 0, 0, 258.502, 0, 0, 0, 258.502, 77.5507, 0, 0, 0, 77.5507, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1254, '2014-11-08', 22, 0, 0, 0, 0, 0, 0, 0, 200, 2, 986.293, 77, 11, 0, 0, 0, 0, 0, 0, 264.459, 0, 0, 0, 264.459, 79.3378, 0, 0, 0, 79.3378, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1255, '2014-11-09', 24, 0, 0, 0, 0, 0, 0, 0, 210, 3, 2222.89, 99, 11, 0, 0, 0, 0, 0, 0, -757.942, 0, 0, 0, -757.942, -227.383, 0, 0, 0, -227.383, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1256, '2014-11-10', 6, 0, 0, 0, 0, 0, 0, 0, 20, 1, 1061.43, 49, 5, 0, 0, 0, 0, 0, 0, 99.3048, 0, 0, 0, 99.3048, 29.7915, 0, 0, 0, 29.7915, '2014-11-12 12:39:52', NULL, NULL, NULL, 11, 1),
(1267, '2014-11-03', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-11-12 12:39:52', NULL, NULL, NULL, 14, 1),
(1268, '2014-11-07', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-11-12 12:39:52', NULL, NULL, NULL, 14, 1),
(1269, '2014-11-01', 0, 0, 0, 0, 0, 0, 0, 0, 20, 2, 432.206, 57, 3, 1, 0, 0, 0, 0, 0, 224.741, 11.6444, 0, 0, 236.386, 67.4224, 3.4933, 0, 0, 70.9157, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1270, '2014-11-02', 0, 0, 0, 0, 0, 0, 0, 0, 50, 3, 91.58, 33, 5, 0, 0, 0, 0, 0, 0, 40.561, 0, 0, 0.1125, 40.6735, 12.1683, 0, 0, 0.0338, 12.2021, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1271, '2014-11-03', 0, 0, 0, 0, 0, 0, 0, 0, 30, 2, 44.5823, 52, 4, 0, 0, 0, 0, 0, 0, 10.8865, 0, 0, 0, 10.8865, 3.2659, 0, 0, 0, 3.2659, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1272, '2014-11-04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20.6545, 27, 2, 0, 0, 0, 0, 0, 0, 8.0605, 0, 0, 0, 8.0605, 2.4182, 0, 0, 0, 2.4182, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1273, '2014-11-05', 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 50.5431, 35, 4, 0, 0, 0, 0, 0, 0, 24.7542, 0, 0, 0, 24.7542, 7.4262, 0, 0, 0, 7.4262, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1274, '2014-11-06', 0, 0, 0, 0, 0, 0, 0, 0, 30, 2, 41.6019, 48, 1, 0, 0, 0, 0, 0, 0, 11.217, 0, 0, 0, 11.217, 3.3651, 0, 0, 0, 3.3651, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1275, '2014-11-07', 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 133.65, 80, 2, 0, 0, 0, 0, 0, 0, -28.9121, 0, 0, 0, -28.9121, -8.6736, 0, 0, 0, -8.6736, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1276, '2014-11-08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 122.867, 53, 3, 0, 0, 0, 0, 0, 0, 34.248, 0, 0, 0, 34.248, 10.2744, 0, 0, 0, 10.2744, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1277, '2014-11-09', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21.9866, 9, 3, 0, 0, 0, 0, 0, 0, 12.9794, 0, 0, 0, 12.9794, 3.8938, 0, 0, 0, 3.8938, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1),
(1278, '2014-11-10', 0, 0, 0, 0, 0, 0, 0, 0, 20, 1, 293.12, 71, 1, 0, 0, 0, 0, 0, 0, -117.438, 0, 0, 0, -117.438, -35.2315, 0, 0, 0, -35.2315, '2014-11-12 12:41:08', NULL, NULL, NULL, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_webcajitas`
--

CREATE TABLE IF NOT EXISTS `om_webcajitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `titulo` int(11) NOT NULL,
  `imagen` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `tamano` int(11) NOT NULL DEFAULT '0' COMMENT '0->normal; 1->grande',
  `id_categoria` int(11) NOT NULL,
  `id_web` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`id_categoria`,`id_web`),
  KEY `id_web` (`id_web`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `om_webs`
--

CREATE TABLE IF NOT EXISTS `om_webs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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
-- Filtros para la tabla `om_webcajitas`
--
ALTER TABLE `om_webcajitas`
  ADD CONSTRAINT `om_webcajitas_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `om_categoriaswebs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `om_webcajitas_ibfk_1` FOREIGN KEY (`id_web`) REFERENCES `om_webs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `om_webs`
--
ALTER TABLE `om_webs`
  ADD CONSTRAINT `om_webs_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `om_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
