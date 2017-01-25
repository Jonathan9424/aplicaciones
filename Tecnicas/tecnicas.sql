-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2016 a las 16:04:23
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id_facultad` smallint(6) NOT NULL,
  `nom_facultad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `nom_facultad`) VALUES
(1, 'Facultad de Ingenieria'),
(2, 'Facultad de Ciencias humanas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_prog` smallint(6) NOT NULL,
  `nom_programa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_prog`, `nom_programa`) VALUES
(1, 'Ing sistemas'),
(2, 'Ing Civil'),
(3, 'Ing Industrial'),
(4, 'Ing Agroecologica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proy` smallint(6) NOT NULL,
  `nom_proyecto` varchar(100) NOT NULL,
  `descri_proyecto` varchar(500) NOT NULL,
  `programa` smallint(6) NOT NULL,
  `facultad` smallint(6) NOT NULL,
  `estado_proy` tinyint(4) NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proy`, `nom_proyecto`, `descri_proyecto`, `programa`, `facultad`, `estado_proy`, `observaciones`, `id_user`, `id_tutor`) VALUES
(1, 'prueba', 'este es un proyecto de prueba', 1, 1, 4, 'en estadia de revision del royecto para su respectiva aprobacion!!', 1, NULL),
(2, 'prueba2', 'esto es una prueba secundaia', 1, 2, 1, 'hola soy el nuevo dueÃ±o del proyecto', 1, NULL),
(3, 'pruebacivil', 'este es una prueba para un proyecto de ing civil', 2, 1, 1, 'hola!! este proyecto tiene mucha vision', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` smallint(6) NOT NULL,
  `nom_rol` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nom_rol`) VALUES
(1, 'estudiante'),
(2, 'docente'),
(3, 'Comite'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` smallint(6) NOT NULL,
  `nombre_sede` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre_sede`) VALUES
(1, 'Sede principal - Bogota'),
(2, 'sede 90'),
(3, 'UNIMINUTO Virtual y Distancia - calle 80'),
(4, 'Atlantico'),
(5, 'nari&ntildeo'),
(6, 'Bogota Sur'),
(7, 'Tolima'),
(8, 'Valle'),
(9, 'Cundinamarca'),
(10, 'Santander'),
(11, 'huila'),
(12, 'Antioquia y Eje Cafetero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stdo_proy`
--

CREATE TABLE `stdo_proy` (
  `id_estado` tinyint(4) NOT NULL,
  `nom_estado` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stdo_proy`
--

INSERT INTO `stdo_proy` (`id_estado`, `nom_estado`) VALUES
(1, 'Aprobado sin modificaciones'),
(2, 'Aprobado con modificaciones menores'),
(3, 'Aprobado con modificaciones mayores'),
(4, 'No aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `id_rol` smallint(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `id_prog` smallint(6) NOT NULL,
  `id_sede` smallint(6) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_alum` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `id_rol`, `nombre`, `apellidos`, `email`, `sexo`, `telefono`, `id_prog`, `id_sede`, `nick`, `password`, `id_alum`) VALUES
(1, 1, 'Jonathan Andres ', 'Maluche Sanchez ', 'jmaluchesan@uniminuto.edu.co', 'M', '3006735409', 1, 1, 'jonathan23', '12qwaszx', 459010),
(2, 2, 'eweewee ', 'wewqeqqwe ', 'ererwe@sdss', 'M', '343432', 1, 1, 'qwe', '123', 4545),
(3, 1, 'Andres mauricio', 'melo pachon', 'maurodres@hotmail.com', 'M', '3202020345', 2, 1, 'JenJen', '123456', 4565),
(4, 2, 'Luis Miguel', 'Lancheros Molano', 'luislanchero@hotmail.com', 'M', '3001234567', 2, 1, 'lanche05', '23wesdxc', 32767),
(5, 2, 'Alonso ', 'Guevara ', 'alosnogevara@uniminuto.edu.co', 'M', '3001234567', 1, 1, 'alonso01', '23wesdxc', 1234);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id_facultad`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_prog`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proy`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tutor` (`id_tutor`),
  ADD KEY `programa` (`programa`),
  ADD KEY `facultad` (`facultad`),
  ADD KEY `estado_proy` (`estado_proy`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `stdo_proy`
--
ALTER TABLE `stdo_proy`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_prog` (`id_prog`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id_facultad` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_prog` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proy` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `stdo_proy`
--
ALTER TABLE `stdo_proy`
  MODIFY `id_estado` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `proyecto_ibfk_3` FOREIGN KEY (`programa`) REFERENCES `programa` (`id_prog`),
  ADD CONSTRAINT `proyecto_ibfk_4` FOREIGN KEY (`facultad`) REFERENCES `facultad` (`id_facultad`),
  ADD CONSTRAINT `proyecto_ibfk_5` FOREIGN KEY (`estado_proy`) REFERENCES `stdo_proy` (`id_estado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_prog`) REFERENCES `programa` (`id_prog`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
