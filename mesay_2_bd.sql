-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-04-2015 a las 04:34:58
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
  `fhrecibo` datetime DEFAULT NULL,
  `finalizado` char(1) DEFAULT NULL,
  `citerce` varchar(15) DEFAULT NULL,
  `cticaso` int(11) DEFAULT NULL,
  `ctecni` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`idcaso`, `titulo`, `detalle`, `nivel`, `estado`, `fhrecibo`, `finalizado`, `citerce`, `cticaso`, `ctecni`) VALUES
('TCK1504001', 'DaÃ±o en el infa++', '<p>Hay da&ntilde;o en el infa++</p>', 3, '1', '2015-04-15 04:40:36', '1', 'paco123', 1, 'tecni_vivas');

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
('TCK1504001', 1, 'Creacion del Ticket para el Ususario paco123', '2015-04-15', 1, 'tecni_vivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
`id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `cdepar` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `name`, `cdepar`) VALUES
(2, 'Tocaima', 1),
(3, 'Girardot', 1),
(4, 'El Encanto', 3),
(5, 'La chorrera', 3),
(6, 'La Pedrera', 3),
(7, 'La Victoria', 3),
(8, 'Leticia', 3),
(9, 'MiritÃ­-ParanÃ¡', 3),
(10, 'Puerto AlegrÃ­a', 3),
(11, 'Puerto Arica', 3),
(12, 'Puerto NariÃ±o', 3),
(13, 'Puerto Santander', 3),
(14, 'TarapacÃ¡', 3),
(15, 'CÃ¡ceres', 4),
(16, 'Caucasia', 4),
(17, 'El Bagre', 4),
(18, 'NechÃ­', 4),
(19, 'ItagÃ¼Ã­', 4),
(20, 'La Estrella', 4),
(21, 'MedellÃ­n', 4),
(22, 'Sabaneta', 4),
(23, 'Arauca', 5),
(24, 'Arauquita', 5),
(25, 'Cravo Norte', 5),
(26, 'Fortul', 5),
(27, 'Puerto RondÃ³n', 5),
(28, 'Saravena', 5),
(29, 'Tame', 5),
(30, 'Barranquilla', 6),
(31, 'Baranoa', 6),
(32, 'Campo de la Cruz', 6),
(33, 'Candelaria', 6),
(34, 'Galapa', 6),
(35, 'Juan de Acosta', 6),
(36, 'Luruaco', 6),
(42, 'Malambo', 6),
(43, 'ManatÃ­', 6),
(44, 'Palmar de Varela', 6),
(45, 'PiojÃ³', 6),
(46, 'Polonuevo', 6),
(47, 'Ponedera', 6),
(48, 'Puerto Colombia', 6),
(49, 'RepelÃ³n', 6),
(50, 'Sabanagrande', 6),
(51, 'Sabanalarga', 6),
(52, 'Santa LucÃ­a', 6),
(53, 'Santo TomÃ¡s', 6),
(54, 'Soledad', 6),
(55, 'SuÃ¡n', 6),
(56, 'TubarÃ¡', 6),
(57, 'UsiacurÃ­', 6),
(58, 'AchÃ­', 7),
(59, 'Altos del Rosario', 7),
(60, 'Arenal', 7),
(61, 'Arjona', 7),
(62, 'Arroyohondo', 7),
(63, 'Barranco de Loba', 7),
(64, 'Brazuelo de Papayal', 7),
(65, 'Calamar', 7),
(66, 'Cantagallo', 7),
(67, 'El Carmen de BolÃ­var', 7),
(68, 'Cartagena de Indias', 7),
(69, 'Cicuco', 7),
(70, 'Clemencia', 7),
(71, 'CÃ³rdoba', 7),
(72, 'El Guamo', 7),
(73, 'El PeÃ±Ã³n', 7),
(74, 'Hatillo de Loba', 7),
(75, 'MaganguÃ©', 7),
(76, 'Margarita', 7),
(77, 'MarÃ­a La Baja', 7),
(78, 'Montecristo', 7),
(79, 'Morales', 7),
(80, 'NorosÃ­', 7),
(81, 'Pinillos', 7),
(82, 'Regidor', 7),
(83, 'RÃ­o Viejo', 7),
(84, 'San CristÃ³bal', 7),
(85, 'San Estanislao', 7),
(86, 'San Fernando', 7),
(87, 'San Jacinto', 7),
(88, 'San Jacinto del Cauca', 7),
(89, 'San Juan Nepomuceo', 7),
(90, 'San MartÃ­n de Loba', 7),
(91, 'San Pablo', 7),
(92, 'Santa Catalina', 7),
(93, 'Santa Cruz de Mompox', 7),
(94, 'Santa Rosa', 7),
(95, 'Santa Rosa del Sur', 7),
(96, 'SimitÃ­', 7),
(97, 'Soplaviento', 7),
(98, 'Talaigua Nuevo', 7),
(99, 'Tiquisio', 7),
(100, 'Turbaco', 7),
(101, 'TurbanÃ¡', 7),
(102, 'Villanueva', 7),
(103, 'Zambrano', 7),
(104, 'CÃ³mbita', 8),
(105, 'Cucaita', 8),
(106, 'ChivatÃ¡', 8),
(107, 'ChÃ­quiza', 8),
(108, 'Motavita', 8),
(109, 'OicatÃ¡', 8),
(110, 'SamacÃ¡', 8),
(111, 'Siachoque', 8),
(112, 'Sora', 8),
(113, 'SoracÃ¡', 8),
(114, 'SotaquirÃ¡', 8),
(115, 'Toca', 8),
(116, 'Tunja', 8),
(117, 'Tuta', 8),
(118, 'Ventaquemada', 8),
(119, 'Chiscas', 8),
(120, 'MonguÃ­', 8),
(121, 'Nobsa', 8),
(122, 'Pesca', 8),
(123, 'Sogamoso', 8),
(124, 'Tibasosa', 8),
(125, 'TÃ³paga', 8),
(126, 'Tota', 8),
(127, 'BelÃ©n', 8),
(128, 'BusbanzÃ¡', 8),
(129, 'Cerinza', 8),
(130, 'Corrales', 8),
(131, 'Duitama', 8),
(132, 'Floresta', 8),
(133, 'Paipa', 8),
(134, 'Santa Rosa de Viterbo', 8),
(135, 'TutazÃ¡', 8),
(136, 'BetÃ©itiva', 8),
(137, 'Chita', 8),
(138, 'JericÃ³', 8),
(139, 'Paz de RÃ­o', 8),
(140, 'SocotÃ¡', 8),
(141, 'Socha', 8),
(142, 'Tasco', 8),
(143, 'CubarÃ¡', 8),
(144, 'Puerto BoyacÃ¡', 8),
(145, 'SamanÃ¡', 9),
(146, 'Victoria', 9),
(147, 'Norcasia', 9),
(148, 'La Dorada', 9),
(149, 'Marquetalia', 9),
(150, 'Manzanares', 9),
(151, 'Pensilvania', 9),
(152, 'Marulanda', 9),
(153, 'Aguadas', 9),
(154, 'PÃ¡cora', 9),
(155, 'Salamina', 9),
(156, 'Aranzazu', 9),
(157, 'Riosucio', 9),
(158, 'SupÃ­a', 9),
(159, 'La Merced', 9),
(160, 'Marmato', 9),
(161, 'Filadelfia', 9),
(162, 'Manizales', 9),
(163, 'Neira', 9),
(164, 'VillamarÃ­a', 9),
(165, 'ChinchinÃ¡', 9),
(166, 'Palestina', 9),
(167, 'Viterbo', 9),
(168, 'BelalcÃ¡zar', 9),
(169, 'San JosÃ©', 9),
(170, 'Risaralda', 9),
(171, 'Anserma', 9),
(172, 'Albania', 10),
(173, 'BelÃ©n de los Andaquies', 10),
(174, 'Cartagena del ChairÃ¡', 10),
(175, 'Curillo', 10),
(176, 'El Doncello', 10),
(177, 'El Paujil', 10),
(178, 'Florencia', 10),
(179, 'La MontaÃ±ita', 10),
(180, 'Morelia', 10),
(181, 'Puerto MilÃ¡n', 10),
(182, 'Puerto Rico', 10),
(183, 'San JosÃ© del Fragua', 10),
(184, 'San Vicente del CaguÃ¡n', 10),
(185, 'Solano', 10),
(186, 'Solita', 10),
(187, 'ValparaÃ­so', 10),
(188, 'Aguazul', 11),
(189, 'ChÃ¡meza', 11),
(190, 'Hato Corozal', 11),
(191, 'La Salina', 11),
(192, 'ManÃ­', 11),
(193, 'Monterrey', 11),
(194, 'NunchÃ­a', 11),
(195, 'OrocuÃ©', 11),
(196, 'Paz de Ariporo', 11),
(197, 'Pore', 11),
(198, 'Recetor', 11),
(199, 'Sabanalarga', 11),
(200, 'SÃ¡maca', 11),
(201, 'San Luis de Palenque', 11),
(202, 'TÃ¡mara', 11),
(203, 'Tauramena', 11),
(204, 'Trinidad', 11),
(205, 'Villanueva', 11),
(206, 'Yopal', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
`id` int(11) NOT NULL,
  `depar` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `depar`) VALUES
(1, 'Cundinamarca'),
(3, 'Amazonas'),
(4, 'Antioquia'),
(5, 'Arauca'),
(6, 'AtlÃ¡ntico'),
(7, 'BolÃ­var'),
(8, 'BoyacÃ¡'),
(9, 'Caldas'),
(10, 'CaquetÃ¡'),
(11, 'Casanare'),
(12, 'Cauca'),
(13, 'Cesar'),
(15, 'ChocÃ³'),
(16, 'CÃ³rdoba'),
(17, 'GuainÃ­a'),
(18, 'Guaviare'),
(19, 'Huila'),
(20, 'La Guajira'),
(21, 'Magdalena'),
(22, 'Meta'),
(23, 'NariÃ±o'),
(25, 'Norte de Santander'),
(26, 'Putumayo'),
(28, 'QuindÃ­o'),
(29, 'Risaralda'),
(30, 'San AndrÃ©s y Providencia'),
(31, 'Santander'),
(32, 'Sucre'),
(33, 'Tolima'),
(34, 'Valle del Cauca'),
(35, 'VaupÃ©s'),
(36, 'Vichada');

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
('paco123', 'paco', 'sanchez', 'Av Siempre Viva 123', '', 'pepe@gmail.com', '', 'alka65@hotmail.com', '1234567890', '', '', 2),
('pepe123', 'pepe', 'pepe', 'Av Siempre Viva No', '', 'alka65@hotmail.es', '', '', '3118491381', '', '', 3),
('perro123', 'paco andres sanchez', 'pepe', 'Av Siempre Viva No', '', 'alka65@hotmail.arg', '', '', '3118491381', '', '', 3),
('pescado123', 'pecesito', 'pez', 'Av Siempre Viva No', '', 'alka65@hotmail.ar', '', '', '3118491381', '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticasos`
--

CREATE TABLE IF NOT EXISTS `ticasos` (
`id` int(11) NOT NULL,
  `nticaso` varchar(40) DEFAULT NULL,
  `prefijo` varchar(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticasos`
--

INSERT INTO `ticasos` (`id`, `nticaso`, `prefijo`) VALUES
(1, 'DaÃ±o de Software', 'DS'),
(2, 'Mantenimiento de Equipo', 'MTT');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `created`, `status`) VALUES
(1, 'admon', 'Adriann Sanchez', '0c43cf393cd1b460bdbb5cffd6865757c041a93e', 1, NULL, 1),
(51, 'paco123', 'paco', '8432243e2a8f748a369737e8692284e9be90e849', 3, '2015-04-12 22:53:04', 1),
(52, 'pepe123', 'pepe', 'd8af3021eba231d36265249bc7af6054ea88cc51', 3, '2015-04-14 05:38:05', 1),
(53, 'pescado123', 'pecesito', '4688e693647aa110defe3805ec07c0508d4ed728', 3, '2015-04-14 05:58:53', 1),
(54, 'perro123', 'paco andres sanchez', '32e0e15af656b6a3321996ae6733268178bb4a69', 3, '2015-04-14 06:05:01', 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
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
