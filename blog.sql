-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 01:05:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idcat` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`idcom` int(11) NOT NULL,
  `idpub` int(11) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcom`, `idpub`, `texto`, `email`, `fecha`) VALUES
(1, 1, 'ertwertwert', 'lupita@hotmail.com', '2015-11-30 23:25:45'),
(2, 2, 'wertwert', 'lupita@hotmail.com', '2015-11-30 23:25:56'),
(3, 2, 'ertwer', 'brayans@gmail.com', '2015-11-30 23:25:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `email` varchar(30) NOT NULL,
  `idpub` int(11) NOT NULL,
  `like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
`idpub` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `video` varchar(30) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emailamigo` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpub`, `email`, `texto`, `imagen`, `video`, `fecha`, `emailamigo`) VALUES
(1, 'brayans@gmail.com', 'fghdf', NULL, NULL, '2015-11-30 23:30:39', 'brayans@gmail.com'),
(2, 'brayans@gmail.com', 'fdghdfghdfgh', NULL, NULL, '2015-11-30 23:30:39', 'brayans@gmail.com'),
(11, 'lupita@hotmail.com', 'gsdfgsdfgsdf', 'Koala.jpg', NULL, '2015-11-30 23:37:57', 'lupita@hotmail.com'),
(12, 'lupita@hotmail.com', 'gsdfgsdfgsdffg', 'Koala.jpg', NULL, '2015-11-30 23:39:09', 'lupita@hotmail.com'),
(13, 'lupita@hotmail.com', 'fghdf', 'Koala.jpg', NULL, '2015-11-30 23:39:16', 'lupita@hotmail.com'),
(14, 'lupita@hotmail.com', 'dfghdfgh', 'Penguins.jpg', NULL, '2015-11-30 23:40:51', 'lupita@hotmail.com'),
(15, 'lupita@hotmail.com', 'fghfghdfgh', '', NULL, '2015-11-30 23:41:05', 'lupita@hotmail.com'),
(16, 'lupita@hotmail.com', 'dsfghsdfhsdgth', 'Jellyfish.jpg', NULL, '2015-11-30 23:41:09', 'lupita@hotmail.com'),
(17, 'lupita@hotmail.com', 'HOLAAAAAAAAAAAAAAAAAAAAAAAAA', '', NULL, '2015-12-01 00:01:04', 'lupita@hotmail.com'),
(18, 'brayans@gmail.com', 'sdkuhvnazutwgd', '', NULL, '2015-12-01 00:05:20', 'brayans@gmail.com'),
(19, 'brayans@gmail.com', 'mvcd utc8', '', NULL, '2015-12-01 00:05:24', 'brayans@gmail.com'),
(20, 'brayans@gmail.com', 'khgbfvuygf\r\n', '', NULL, '2015-12-01 00:05:29', 'brayans@gmail.com'),
(21, 'brayans@gmail.com', 'jbsub yvdgf\r\n', '', NULL, '2015-12-01 00:05:38', 'brayans@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE IF NOT EXISTS `seguidores` (
  `idamigo` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailamigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fechanac` date NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `pass`, `fechanac`, `nombre`, `sexo`, `status`, `foto`) VALUES
('brayan@gmail.com', '1234', '2012-12-12', 'Brayan', 'Masculino', 'registro nuevo', 'Jellyfish.jpg'),
('brayans@gmail.com', '123', '2015-11-04', 'Ezze Moxxo Brayan', 'Masculino', 'registro nuevo', 'Penguins.jpg'),
('lupita@hotmail.com', 'abcd', '2010-03-26', 'lupita', 'Femenino', 'registro nuevo', 'Chrysanthemum.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`idcat`), ADD KEY `email` (`email`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`idcom`), ADD KEY `idpub` (`idpub`), ADD KEY `email` (`email`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`email`), ADD KEY `idpub` (`idpub`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
 ADD PRIMARY KEY (`idpub`), ADD KEY `email` (`email`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
 ADD PRIMARY KEY (`idamigo`), ADD KEY `email` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
MODIFY `idpub` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`idpub`) REFERENCES `publicaciones` (`idpub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
