-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2016 a las 17:38:44
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `IU2016`
--
DROP DATABASE IF EXISTS `IU2016`;
CREATE DATABASE IF NOT EXISTS `IU2016` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `IU2016`;


GRANT ALL PRIVILEGES ON `IU2016`.* TO 'iu2016'@'localhost' IDENTIFIED BY 'iu2016';

--
-- Estructura de tabla para la tabla `CORREO`
--

CREATE TABLE IF NOT EXISTS `CORREO` (
`ID_CORREO` int(11) NOT NULL,
  `EMISOR` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `RECEPTOR` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `ASUNTO` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `CONTENIDO` varchar(400) COLLATE latin1_spanish_ci NOT NULL,
  `FECHAENVIO` date NOT NULL,
  `FECHAENTREGA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPLEADOS`
--

CREATE TABLE IF NOT EXISTS `EMPLEADOS` (
  `EMP_USER` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `EMP_PASSWORD` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `EMP_NOMBRE` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_APELLIDO` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_DNI` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_FECH_NAC` date DEFAULT NULL,
  `EMP_EMAIL` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_TELEFONO` int(15) DEFAULT NULL,
  `EMP_CUENTA` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_DIRECCION` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_COMENTARIOS` varchar(1000) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_TIPO` int(10) DEFAULT NULL,
  `EMP_ESTADO` enum('Activo','Inactivo') COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_FOTO` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_NOMINA` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `EMPLEADOS`
--

INSERT INTO `EMPLEADOS` (`EMP_USER`, `EMP_PASSWORD`, `EMP_NOMBRE`, `EMP_APELLIDO`, `EMP_DNI`, `EMP_FECH_NAC`, `EMP_EMAIL`, `EMP_TELEFONO`, `EMP_CUENTA`, `EMP_DIRECCION`, `EMP_COMENTARIOS`, `EMP_TIPO`, `EMP_ESTADO`, `EMP_FOTO`, `EMP_NOMINA`) VALUES
('ADMIN', '73acd9a5972130b75066c82595a1fae3', 'Juan Manuel', 'Fernandez Novoa', '65938568Y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Activo', NULL, NULL),
('monit', 'd9cfd4af77e33817de2160e0c1c7607c', 'Pepe', 'Perez', '70561875Z', '1957-10-31', 'pepe.perez@gmail.com', 666666666, NULL, NULL, NULL, 3, 'Activo', NULL, NULL),
('secret', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Luis', 'Gomez', '44841787K', '1957-10-31', 'luis.gomez@gmail.com', 666656666, NULL, NULL, NULL, 2, 'Activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPLEADOS_PAGINA`
--

CREATE TABLE IF NOT EXISTS `EMPLEADOS_PAGINA` (
  `EMP_USER` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `PAGINA_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `EMPLEADOS_PAGINA`
--

INSERT INTO `EMPLEADOS_PAGINA` (`EMP_USER`, `PAGINA_ID`) VALUES
('ADMIN', 1),
('ADMIN', 2),
('ADMIN', 3),
('ADMIN', 4),
('secret', 4),
('ADMIN', 5),
('secret', 5),
('ADMIN', 6),
('secret', 6),
('ADMIN', 7),
('ADMIN', 8),
('ADMIN', 9),
('ADMIN', 10),
('ADMIN', 11),
('ADMIN', 12),
('ADMIN', 13),
('ADMIN', 14),
('ADMIN', 15),
('ADMIN', 16),
('ADMIN', 17),
('ADMIN', 18),
('ADMIN', 19),
('ADMIN', 20),
('ADMIN', 21),
('ADMIN', 22),
('ADMIN', 23),
('ADMIN', 400),
('secret', 400),
('ADMIN', 401),
('secret', 401),
('ADMIN', 402),
('secret', 402),
('ADMIN', 403),
('secret', 403),
('ADMIN', 404),
('secret', 404),
('ADMIN', 500),
('ADMIN', 501),
('ADMIN', 503),
('ADMIN', 504);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENTREGABLE`
--

CREATE TABLE IF NOT EXISTS `ENTREGABLE` (
`ID_ENTREGABLE` int(3) NOT NULL,
  `NOMBRE` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `URL` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `ID_MIEMBRO` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `FECHASUBIDA` date NOT NULL,
  `ID_TAREA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FUNCIONALIDAD`
--

CREATE TABLE IF NOT EXISTS `FUNCIONALIDAD` (
`FUNCIONALIDAD_ID` int(10) NOT NULL,
  `FUNCIONALIDAD_NOM` varchar(80) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `FUNCIONALIDAD`
--

INSERT INTO `FUNCIONALIDAD` (`FUNCIONALIDAD_ID`, `FUNCIONALIDAD_NOM`) VALUES
(1, 'GESTION EMPLEADOS'),
(2, 'GESTION ROLES'),
(3, 'GESTION FUNCIONALIDADES'),
(4, 'GESTION PAGINAS'),
(400, 'GESTION PROYECTOS'),
(500, 'GESTION NOTIFICACIONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FUNCIONALIDAD_PAGINA`
--

CREATE TABLE IF NOT EXISTS `FUNCIONALIDAD_PAGINA` (
  `FUNCIONALIDAD_ID` int(10) NOT NULL,
  `PAGINA_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `FUNCIONALIDAD_PAGINA`
--

INSERT INTO `FUNCIONALIDAD_PAGINA` (`FUNCIONALIDAD_ID`, `PAGINA_ID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(400, 400),
(400, 401),
(400, 402),
(400, 403),
(400, 404),
(500, 500),
(500, 501),
(500, 503),
(500, 504);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NOTIFICACION`
--

CREATE TABLE IF NOT EXISTS `NOTIFICACION` (
  `ID_NOTIFICACION` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `EMISOR` text COLLATE utf8_spanish_ci NOT NULL,
  `RECEPTOR` text COLLATE utf8_spanish_ci NOT NULL,
  `CONTENIDO` text COLLATE utf8_spanish_ci NOT NULL,
  `FECHAENVIO` datetime NOT NULL,
  `FECHALECTURA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PAGINA`
--

CREATE TABLE IF NOT EXISTS `PAGINA` (
`PAGINA_ID` int(10) NOT NULL,
  `PAGINA_LINK` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PAGINA_NOM` varchar(80) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=505 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PAGINA`
--

INSERT INTO `PAGINA` (`PAGINA_ID`, `PAGINA_LINK`, `PAGINA_NOM`) VALUES
(1, '../Views/EMPLEADO_ADD_Vista.php', 'EMPLEADO ADD'),
(2, '../Views/EMPLEADO_DELETE_Vista.php', 'EMPLEADO DELETE'),
(3, '../Views/EMPLEADO_EDIT_Vista.php', 'EMPLEADO EDIT'),
(4, '../Views/EMPLEADO_SHOW_ALL_Vista.php', 'EMPLEADO SHOW ALL'),
(5, '../Views/EMPLEADO_SHOW_CONSULT_Vista.php', 'EMPLEADO SHOW CONSULT'),
(6, '../Views/EMPLEADO_SHOW_Vista.php', 'EMPLEADO SHOW'),
(7, '../Views/FUNCIONALIDAD_ADD_Vista.php', 'FUNCIONALIDAD ADD'),
(8, '../Views/FUNCIONALIDAD_DELETE_Vista.php', 'FUNCIONALIDAD DELETE'),
(9, '../Views/FUNCIONALIDAD_EDIT_Vista.php', 'FUNCIONALIDAD EDIT'),
(10, '../Views/FUNCIONALIDAD_SHOW_ALL_Vista.php', 'FUNCIONALIDAD SHOW ALL'),
(11, '../Views/FUNCIONALIDAD_SHOW_PAGINAS_Vista.php', 'FUNCIONALIDAD SHOW PAGINAS'),
(12, '../Views/FUNCIONALIDAD_SHOW_Vista.php', 'FUNCIONALIDAD SHOW'),
(13, '../Views/PAGINA_ADD_Vista.php', 'PAGINA ADD'),
(14, '../Views/PAGINA_DELETE_Vista.php', 'PAGINA DELETE'),
(15, '../Views/PAGINA_EDIT_Vista.php', 'PAGINA EDIT'),
(16, '../Views/PAGINA_SHOW_ALL_Vista.php', 'PAGINA SHOW ALL'),
(17, '../Views/PAGINA_SHOW_Vista.php', 'PAGINA SHOW'),
(18, '../Views/ROL_ADD_Vista.php', 'ROL ADD'),
(19, '../Views/ROL_DELETE_Vista.php', 'ROL DELETE'),
(20, '../Views/ROL_EDIT_Vista.php', 'ROL EDIT'),
(21, '../Views/ROL_SHOW_ALL_Vista.php', 'ROL SHOW ALL'),
(22, '../Views/ROL_SHOW_FUNCIONES_Vista.php', 'ROL SHOW FUNCIONES'),
(23, '../Views/ROL_SHOW_Vista.php', 'ROL SHOW'),
(400, '../Views/PROYECTO_ADD_Vista.php', 'PROYECTO ADD'),
(401, '../Views/PROYECTO_DELETE_Vista.php', 'PROYECTO DELETE'),
(402, '../Views/PROYECTO_EDIT_Vista.php', 'PROYECTO EDIT'),
(403, '../Views/PROYECTO_SHOW_ALL_Vista.php', 'PROYECTO SHOW ALL'),
(404, '../Views/PROYECTO_SHOW_Vista.php', 'PROYECTO SHOW'),
(500, '../Views/NOTIFICACION_ADD_Vista.php', 'NOTIFICACION ADD'),
(501, '../Views/NOTIFICACION_DELETE_Vista.php', 'NOTIFICACION DELETE'),
(503, '../Views/NOTIFICACION_SHOW_ALL_Vista.php', 'NOTIFICACION SHOW ALL'),
(504, '../Views/NOTIFICACION_SHOW_Vista.php', 'NOTIFICACION SHOW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROYECTO`
--

CREATE TABLE IF NOT EXISTS `PROYECTO` (
`ID_PROYECTO` int(3) NOT NULL,
  `NOMBRE` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `FECHAI` date NOT NULL,
  `FECHAIP` date NOT NULL,
  `FECHAE` date NOT NULL,
  `FECHAFP` date NOT NULL,
  `NUMEROMIEMBROS` int(3) NOT NULL,
  `NUMEROHORAS` int(5) NOT NULL,
  `DIRECTOR` int(11) NOT NULL,
  `BORRADO` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PROYECTO`
--

INSERT INTO `PROYECTO` (`ID_PROYECTO`, `NOMBRE`, `DESCRIPCION`, `FECHAI`, `FECHAIP`, `FECHAE`, `FECHAFP`, `NUMEROMIEMBROS`, `NUMEROHORAS`, `DIRECTOR`, `BORRADO`) VALUES
(1, 'Prueba', 'proyecto de prueba', '2016-11-20', '2016-11-26', '2016-12-20', '2016-11-29', 5, 7, 0, 0),
(2, 'Prueba2', 'proyecto de prueba222', '2016-10-20', '2016-09-13', '2017-12-20', '2017-12-29', 6, 6, 0, 0);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `PROYECTO_MIEMBRO`
--

-- CREATE TABLE IF NOT EXISTS `PROYECTO_MIEMBRO` (
--  `ID_PROYECTO` int(3) NOT NULL,
--  `ID_MIEMBRO` varchar(9) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PROYECTO_MIEMBRO`
--

-- INSERT INTO `PROYECTO` (`ID_PROYECTO`, `ID_MIEMBRO`) VALUES
--  (1, ),
--  (2, );


--
-- Estructura de tabla para la tabla `ROL`
--

CREATE TABLE IF NOT EXISTS `ROL` (
`ROL_ID` int(10) NOT NULL,
  `ROL_NOM` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`ROL_ID`, `ROL_NOM`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'SECRETARIO'),
(3, 'MONITOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL_FUNCIONALIDAD`
--

CREATE TABLE IF NOT EXISTS `ROL_FUNCIONALIDAD` (
  `ROL_ID` int(10) NOT NULL,
  `FUNCIONALIDAD_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ROL_FUNCIONALIDAD`
--

INSERT INTO `ROL_FUNCIONALIDAD` (`ROL_ID`, `FUNCIONALIDAD_ID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 400),
(2, 400),
(1, 500),
(2, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TAREA`
--

CREATE TABLE IF NOT EXISTS `TAREA` (
  `PADRE` int(11) NOT NULL,
`ID_TAREA` int(11) NOT NULL,
  `NOMBRE` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `FECHAIP` date NOT NULL,
  `FECHAIR` date NOT NULL,
  `FECHAEP` date NOT NULL,
  `FECHAER` date NOT NULL,
  `HORASP` int(11) NOT NULL,
  `HORASR` int(11) NOT NULL,
  `ID_MIEMBRO` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `COMENTARIO` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CORREO`
--
ALTER TABLE `CORREO`
 ADD PRIMARY KEY (`ID_CORREO`), ADD KEY `RECEPTOR` (`RECEPTOR`), ADD KEY `EMISOR` (`EMISOR`);

--
-- Indices de la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
 ADD PRIMARY KEY (`EMP_USER`), ADD KEY `EMPLEADOS_ibfk_1` (`EMP_TIPO`);

--
-- Indices de la tabla `EMPLEADOS_PAGINA`
--
ALTER TABLE `EMPLEADOS_PAGINA`
 ADD PRIMARY KEY (`EMP_USER`,`PAGINA_ID`), ADD KEY `EMPLEADOS__PAGINA_ID_fk` (`PAGINA_ID`);

--
-- Indices de la tabla `ENTREGABLE`
--
ALTER TABLE `ENTREGABLE`
 ADD PRIMARY KEY (`ID_ENTREGABLE`), ADD UNIQUE KEY `ID_TAREA` (`ID_TAREA`), ADD KEY `ID_MIEMBRO` (`ID_MIEMBRO`), ADD KEY `ID_TAREA_2` (`ID_TAREA`);

--
-- Indices de la tabla `FUNCIONALIDAD`
--
ALTER TABLE `FUNCIONALIDAD`
 ADD PRIMARY KEY (`FUNCIONALIDAD_ID`);

--
-- Indices de la tabla `FUNCIONALIDAD_PAGINA`
--
ALTER TABLE `FUNCIONALIDAD_PAGINA`
 ADD PRIMARY KEY (`FUNCIONALIDAD_ID`,`PAGINA_ID`), ADD KEY `PAGINA_ID` (`PAGINA_ID`);

--
-- Indices de la tabla `NOTIFICACION`
--
ALTER TABLE `NOTIFICACION`
 ADD PRIMARY KEY (`ID_NOTIFICACION`);

--
-- Indices de la tabla `PAGINA`
--
ALTER TABLE `PAGINA`
 ADD PRIMARY KEY (`PAGINA_ID`);

--
-- Indices de la tabla `PROYECTO`
--
ALTER TABLE `PROYECTO`
 ADD PRIMARY KEY (`ID_PROYECTO`);

--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
 ADD PRIMARY KEY (`ROL_ID`);

--
-- Indices de la tabla `ROL_FUNCIONALIDAD`
--
ALTER TABLE `ROL_FUNCIONALIDAD`
 ADD PRIMARY KEY (`ROL_ID`,`FUNCIONALIDAD_ID`), ADD KEY `FUNCIONALIDAD_ID` (`FUNCIONALIDAD_ID`);

--
-- Indices de la tabla `TAREA`
--
ALTER TABLE `TAREA`
 ADD PRIMARY KEY (`ID_TAREA`), ADD KEY `ID_MIEMBRO` (`ID_MIEMBRO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CORREO`
--
ALTER TABLE `CORREO`
MODIFY `ID_CORREO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ENTREGABLE`
--
ALTER TABLE `ENTREGABLE`
MODIFY `ID_ENTREGABLE` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `FUNCIONALIDAD`
--
ALTER TABLE `FUNCIONALIDAD`
MODIFY `FUNCIONALIDAD_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=501;
--
-- AUTO_INCREMENT de la tabla `PAGINA`
--
ALTER TABLE `PAGINA`
MODIFY `PAGINA_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=505;
--
-- AUTO_INCREMENT de la tabla `PROYECTO`
--
ALTER TABLE `PROYECTO`
MODIFY `ID_PROYECTO` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ROL`
--
ALTER TABLE `ROL`
MODIFY `ROL_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `TAREA`
--
ALTER TABLE `TAREA`
MODIFY `ID_TAREA` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CORREO`
--
ALTER TABLE `CORREO`
ADD CONSTRAINT `RECEPTOR` FOREIGN KEY (`RECEPTOR`) REFERENCES `EMPLEADOS` (`EMP_USER`),
ADD CONSTRAINT `EMISOR` FOREIGN KEY (`EMISOR`) REFERENCES `EMPLEADOS` (`EMP_USER`);

--
-- Filtros para la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
ADD CONSTRAINT `EMPLEADOS_ibfk_1` FOREIGN KEY (`EMP_TIPO`) REFERENCES `ROL` (`ROL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `EMPLEADOS_PAGINA`
--
ALTER TABLE `EMPLEADOS_PAGINA`
ADD CONSTRAINT `EMPLEADOS_PAGINA_EMPLEADOS_EMP_USER_fk` FOREIGN KEY (`EMP_USER`) REFERENCES `EMPLEADOS` (`EMP_USER`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `EMPLEADOS_PAGINA_PAGINA_PAGINA_ID_fk` FOREIGN KEY (`PAGINA_ID`) REFERENCES `PAGINA` (`PAGINA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ENTREGABLE`
--
ALTER TABLE `ENTREGABLE`
ADD CONSTRAINT `TAREAID` FOREIGN KEY (`ID_TAREA`) REFERENCES `TAREA` (`ID_TAREA`),
ADD CONSTRAINT `DNI` FOREIGN KEY (`ID_MIEMBRO`) REFERENCES `EMPLEADOS` (`EMP_USER`);

--
-- Filtros para la tabla `FUNCIONALIDAD_PAGINA`
--
ALTER TABLE `FUNCIONALIDAD_PAGINA`
ADD CONSTRAINT `FUNCIONALIDAD_PAGINA_ibfk_1` FOREIGN KEY (`FUNCIONALIDAD_ID`) REFERENCES `FUNCIONALIDAD` (`FUNCIONALIDAD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FUNCIONALIDAD_PAGINA_ibfk_2` FOREIGN KEY (`PAGINA_ID`) REFERENCES `PAGINA` (`PAGINA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ROL_FUNCIONALIDAD`
--
ALTER TABLE `ROL_FUNCIONALIDAD`
ADD CONSTRAINT `ROL_FUNCIONALIDAD_ibfk_1` FOREIGN KEY (`ROL_ID`) REFERENCES `ROL` (`ROL_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ROL_FUNCIONALIDAD_ibfk_2` FOREIGN KEY (`FUNCIONALIDAD_ID`) REFERENCES `FUNCIONALIDAD` (`FUNCIONALIDAD_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `TAREA`
--
ALTER TABLE `TAREA`
ADD CONSTRAINT `foreing key` FOREIGN KEY (`ID_MIEMBRO`) REFERENCES `EMPLEADOS` (`EMP_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
