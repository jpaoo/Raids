-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2015 a las 02:50:09
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `avientame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `id` int(11) NOT NULL,
  `placa` text NOT NULL,
  `marca` text NOT NULL,
  `color` text NOT NULL,
  `idusuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `id` int(11) NOT NULL,
  `origen` text NOT NULL,
  `destino` text NOT NULL,
  `camino` text NOT NULL,
  `idusuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `origen`, `destino`, `camino`, `idusuario`, `activo`, `nombre`) VALUES
(2, 'San Pablo. Santiago de QuerÃ©taro, Qro., MÃ©xico', 'San Pablo Tecnologico. Santiago de QuerÃ©taro, Qro., MÃ©xico', '{cy|Btj{cRpEmDlDqCOaD}@_NOoClAIr@I^IZQh@o@`AgEj@mC\\sBNiAL}@LURWROHOFSBYa@g@sEgF]g@Ye@sAyCqAsDY_Aa@sAGaAq@wGE_ADaCXcI@Og@ABh@CdBUjE', 73, 1, ''),
(3, 'San Pablo. Santiago de QuerÃ©taro, Qro., MÃ©xico', 'San Pablo Tecnologico. Santiago de QuerÃ©taro, Qro., MÃ©xico', '{cy|Btj{cRpEmDlDqCOaD}@_NOoClAIr@I^IZQh@o@`AgEj@mC\\sBNiAL}@LURWROHOFSBYa@g@sEgF]g@Ye@sAyCqAsDY_Aa@sAGaAq@wGE_ADaCXcI@Og@ABh@CdBUjE', 73, 1, 'aaa'),
(4, 'Itesmq. Santiago de QuerÃ©taro, Qro., MÃ©xico', 'Los Girasoles. Santiago de QuerÃ©taro, Qro., MÃ©xico', 'c|x|BleycRz@_@|@a@LXfAzAzCdDXv@@h@f@j@TLV?ROdA@\\R|@f@~Aj@hBb@z@HbBB|BC\\H`@XZv@hChHqGjHe@`@sDfBmFbCmAx@{BfBk@d@CGCWAw@{@F', 73, 1, 'Tec casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `mail`, `password`, `id`, `activo`) VALUES
('Juan', 'Pablo', 'A00958934@itesm.mx', '8e31a16c749b3c8a43f5e1f00cb5d4bc', 60, 1),
('Juan', 'an', 'A009589314@itesm.mx', 'c520be7d8132e03a0423913988ff4bf6', 61, 1),
('Raul', 'Picapiedra', 'A012084711@itesm.mx1', '224cea9b1b4d1653c6e4231188b11673', 62, 1),
('Raul', 'Picapiedra', 'A0095893111114@itesm.mx', '2c103f2c4ed1e59c0b4e2e01821770fa', 63, 1),
('Eduardo', 'Juarez', 'eduardo.juarezp@gmail.com', '4818b8d399b0caf5cd76e7e5c825ea7f', 64, 1),
('Test', 'Tester', 'testing@gmail.com', '5547cacfd14472c1813621e5bb65aa4e', 65, 1),
('Julian', 'Niebieskikwiat', 'A01207868@itesm.mx', 'de9e6c454860399529e6c9b91992fea1', 66, 1),
('Marquicio', 'LÃ³pez', 'A01203445@itesm.mx', 'f278d4882b8cd37c20cd792d9941b5d0', 67, 1),
('Diana', 'DueÃ±as', 'A02305743@itesm.mx', '117b2168e5077eb980a363723ba638d9', 69, 1),
('Raul', 'Mar', 'A00512318@itesm.mx', '0a37ec7aa789e6d1b1a3f87db3b4f5e9', 70, 1),
('Diana', 'DueÃ±as', 'A1205743@itesm.mx', 'e8dd2d15e1c63e21fcdbbae023f67471', 71, 1),
('Test', 'Test', 'test@test.com', '9bdaff324043b6bbfdb4e4051c2e8ac4', 72, 1),
('Test', 'Testa', 'testa@testa.com', 'ff7fc2db73c5b414f626f19b44d982e2', 73, 1),
('Raul', 'Mar', 'a', '1', 74, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `id` int(11) NOT NULL,
  `cal_conductor` int(11) NOT NULL,
  `cal_copiloto` int(11) NOT NULL,
  `origen` text NOT NULL,
  `idruta` int(11) NOT NULL,
  `idconductor` int(11) NOT NULL,
  `idauto` int(11) NOT NULL,
  `idcopiloto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idruta` (`idruta`),
  ADD KEY `idusuario` (`idconductor`),
  ADD KEY `idauto` (`idauto`),
  ADD KEY `idcopiloto` (`idcopiloto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`idauto`) REFERENCES `auto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`idconductor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`idcopiloto`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `viaje_ibfk_4` FOREIGN KEY (`idruta`) REFERENCES `ruta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
