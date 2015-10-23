-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2015 a las 03:50:56
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
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

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
('Diana', 'DueÃ±as', 'A02305743@itesm.mx', '117b2168e5077eb980a363723ba638d9', 69, 1);

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
  `nombre` text NOT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
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
