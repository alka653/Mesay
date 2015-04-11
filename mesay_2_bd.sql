-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-04-2015 a las 05:51:14
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mesay_2_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE IF NOT EXISTS `casos` (
  `idcaso` varchar(10) NOT NULL DEFAULT '',
  `titulo` varchar(200) DEFAULT NULL,
  `detalle` varchar(3000) DEFAULT NULL,
  `nivel` int(1) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `fhrecibo` date DEFAULT NULL,
  `finalizado` char(1) DEFAULT NULL,
  `citerce` varchar(15) DEFAULT NULL,
  `cticaso` int(11) DEFAULT NULL,
  `ctecni` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`idcaso`, `titulo`, `detalle`, `nivel`, `estado`, `fhrecibo`, `finalizado`, `citerce`, `cticaso`, `ctecni`) VALUES
('TCK1504001', 'DaÃ±o en el Infa++', '<p>kjsdd,ncklsdf sdjkfbsd fdsjfkd</p>\r\n<p>dsfg</p>\r\n<p>fdg</p>', 1, '1', '2015-04-11', '0', 'alka653', 1, 'tecni_adriann');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_detas`
--

CREATE TABLE IF NOT EXISTS `casos_detas` (
  `idcaso` varchar(10) NOT NULL DEFAULT '',
  `itcaso` int(11) DEFAULT NULL,
  `detalle` varchar(3000) DEFAULT NULL,
  `fhdeta` date DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `ctecni` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casos_detas`
--

INSERT INTO `casos_detas` (`idcaso`, `itcaso`, `detalle`, `fhdeta`, `users_id`, `ctecni`) VALUES
('TCK1504001', 1, 'Creacion del Ticket para el Ususario alka653', '2015-04-11', 45, 'tecni_adriann');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
`id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `cdepar` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `name`, `cdepar`) VALUES
(1, 'Girardot', 1),
(2, 'Agua de Dios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
`id` int(11) NOT NULL,
  `depar` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `depar`) VALUES
(1, 'Cundinamarca'),
(2, 'Tolima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
`id` int(1) NOT NULL,
  `name_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `name_level`) VALUES
(1, 'Alto'),
(2, 'Medio'),
(3, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(11) NOT NULL,
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `controller`, `action`) VALUES
(1, 'users', 'show');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name_role` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name_role`, `status`) VALUES
(1, 'Administrador', 1),
(2, 'Tecnico', 1),
(3, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_menus`
--

CREATE TABLE IF NOT EXISTS `roles_menus` (
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles_menus`
--

INSERT INTO `roles_menus` (`role_id`, `menu_id`, `status`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` char(1) NOT NULL,
  `name_state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name_state`) VALUES
('0', 'Inactivo'),
('1', 'Activo'),
('2', 'Anulado'),
('3', 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE IF NOT EXISTS `tecnicos` (
  `id` varchar(15) NOT NULL DEFAULT '',
  `ntecni` varchar(45) DEFAULT NULL,
  `atecni` varchar(20) NOT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `ntecni`, `atecni`, `estado`) VALUES
('marck123', 'Marcus', 'Sanck', '1'),
('paco123', 'Paco', 'Sanchez', '1'),
('tecni_adriann', 'Adriann', 'Sanchez', '1'),
('tecni_vivas', 'Ã‘aÃ±ez', 'Vivas', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE IF NOT EXISTS `terceros` (
  `id` varchar(15) NOT NULL,
  `name` varchar(30) DEFAULT '',
  `apellidos` varchar(30) DEFAULT '',
  `dirterce` varchar(20) DEFAULT '',
  `ctaskype` varchar(20) DEFAULT '',
  `email1` varchar(40) DEFAULT '',
  `email2` varchar(40) DEFAULT '',
  `email3` varchar(40) DEFAULT '',
  `tel1` char(10) DEFAULT '',
  `tel2` char(10) DEFAULT '',
  `tel3` char(10) DEFAULT '',
  `ciudad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`id`, `name`, `apellidos`, `dirterce`, `ctaskype`, `email1`, `email2`, `email3`, `tel1`, `tel2`, `tel3`, `ciudad`) VALUES
('alka653', 'Adriann', 'Sanchez', 'Mz B Casa # 34', 'alka653', 'adriann.sanchez1@gmail.com', '', '', '3118491381', '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticasos`
--

CREATE TABLE IF NOT EXISTS `ticasos` (
`id` int(11) NOT NULL,
  `nticaso` varchar(20) DEFAULT NULL,
  `tiempo` timestamp NULL DEFAULT NULL,
  `prefijo` varchar(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticasos`
--

INSERT INTO `ticasos` (`id`, `nticaso`, `tiempo`, `prefijo`) VALUES
(1, 'DaÃ±o de Software', '2015-03-23 08:03:07', 'DS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT '3',
  `created` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `created`, `status`) VALUES
(1, 'admon', 'Adriann Sanchez', '0c43cf393cd1b460bdbb5cffd6865757c041a93e', 1, NULL, 1),
(45, 'alka653', 'Adriann', '0c43cf393cd1b460bdbb5cffd6865757c041a93e', 3, '2015-04-09 04:24:44', 1),
(46, 'tecni_adriann', 'Adriann', '0c43cf393cd1b460bdbb5cffd6865757c041a93e', 2, '2015-04-11 03:40:01', 1),
(47, 'tecni_vivas', 'Ã‘aÃ±ez', 'd4f4672399d5a37013dde446f50a19e0f15ff9e7', 2, '2015-04-11 03:40:44', 1),
(48, 'marck123', 'Marcus', 'bff2679794d845ddb46efaff3885bd5fdd740325', 2, '2015-04-11 04:20:41', 1),
(49, 'paco123', 'Paco', 'f11f858b688bc626a2003f680af7404463b319ea', 2, '2015-04-11 04:21:02', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
 ADD PRIMARY KEY (`idcaso`), ADD KEY `citerce` (`citerce`), ADD KEY `cticaso` (`cticaso`), ADD KEY `ctecni` (`ctecni`), ADD KEY `nivel` (`nivel`), ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `casos_detas`
--
ALTER TABLE `casos_detas`
 ADD PRIMARY KEY (`idcaso`), ADD KEY `users_id` (`users_id`), ADD KEY `ctecni` (`ctecni`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
 ADD PRIMARY KEY (`id`), ADD KEY `cdepar` (`cdepar`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_menus`
--
ALTER TABLE `roles_menus`
 ADD KEY `role_id` (`role_id`), ADD KEY `menu_id` (`menu_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
 ADD PRIMARY KEY (`id`), ADD KEY `ciudad` (`ciudad`);

--
-- Indices de la tabla `ticasos`
--
ALTER TABLE `ticasos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ticasos`
--
ALTER TABLE `ticasos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casos`
--
ALTER TABLE `casos`
ADD CONSTRAINT `casos_ibfk_2` FOREIGN KEY (`cticaso`) REFERENCES `ticasos` (`id`),
ADD CONSTRAINT `casos_ibfk_3` FOREIGN KEY (`citerce`) REFERENCES `terceros` (`id`),
ADD CONSTRAINT `casos_ibfk_4` FOREIGN KEY (`ctecni`) REFERENCES `tecnicos` (`id`),
ADD CONSTRAINT `casos_ibfk_5` FOREIGN KEY (`nivel`) REFERENCES `levels` (`id`),
ADD CONSTRAINT `casos_ibfk_6` FOREIGN KEY (`estado`) REFERENCES `states` (`id`);

--
-- Filtros para la tabla `casos_detas`
--
ALTER TABLE `casos_detas`
ADD CONSTRAINT `casos_detas_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `casos_detas_ibfk_3` FOREIGN KEY (`idcaso`) REFERENCES `casos` (`idcaso`),
ADD CONSTRAINT `casos_detas_ibfk_4` FOREIGN KEY (`ctecni`) REFERENCES `tecnicos` (`id`);

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`cdepar`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `roles_menus`
--
ALTER TABLE `roles_menus`
ADD CONSTRAINT `roles_menus_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
ADD CONSTRAINT `roles_menus_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Filtros para la tabla `terceros`
--
ALTER TABLE `terceros`
ADD CONSTRAINT `terceros_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudades` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
