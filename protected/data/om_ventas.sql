-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2014 a las 00:57:56
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
  `csv` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `om_ventas`
--
ALTER TABLE `om_ventas`
  ADD CONSTRAINT `om_ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `om_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
