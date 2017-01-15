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
`ID_CORREO` varchar(40) NOT NULL,
  `EMISOR` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `RECEPTOR` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `ASUNTO` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `CONTENIDO` varchar(400) COLLATE latin1_spanish_ci NOT NULL,
  `FECHAENVIO` date NOT NULL

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
  `EMP_EMAIL` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMP_TIPO` int(10) DEFAULT NULL,
  `EMP_ESTADO` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `EMPLEADOS`
--

INSERT INTO `EMPLEADOS` (`EMP_USER`, `EMP_PASSWORD`, `EMP_NOMBRE`, `EMP_APELLIDO`, `EMP_EMAIL`,  `EMP_TIPO`, `EMP_ESTADO`) VALUES
('ADMIN', '73acd9a5972130b75066c82595a1fae3', 'Juan Manuel', 'Fernandez Novoa', null, 1, 'Activo'),
('monit', 'd9cfd4af77e33817de2160e0c1c7607c', 'Pepe', 'Perez',   'pepe.perez@gmail.com', 3, 'Activo'),
('secret', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Luis', 'Gomez',  'luis.gomez@gmail.com',  2, 'Activo');

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
('ADMIN', 100),
('ADMIN', 101),
('ADMIN', 102),
('ADMIN', 103),
('ADMIN', 104),
('secret', 400),
('ADMIN', 401),
('secret', 401),
('ADMIN', 402),
('secret', 402),
('ADMIN', 403),
('secret', 403),
('ADMIN', 404),
('secret', 404),
('ADMIN', 405),
('secret', 405),
('ADMIN', 406),
('secret', 406),
('ADMIN', 407),
('secret', 407),
('ADMIN', 408),
('secret', 408),
('ADMIN', 500),
('ADMIN', 501),
('ADMIN', 503),
('ADMIN', 504),
('ADMIN', 600),
('ADMIN', 601),
('ADMIN', 602),
('ADMIN', 700),
('ADMIN', 701),
('ADMIN', 702),
('ADMIN', 703),
('ADMIN', 704),
('ADMIN', 710),
('ADMIN', 711),
('ADMIN', 712),
('ADMIN', 713),
('ADMIN', 714),
('ADMIN', 800),
('ADMIN', 801),
('ADMIN', 802),
('ADMIN', 803),
('ADMIN', 804),
('ADMIN', 850),
('ADMIN', 851),
('ADMIN', 852),
('ADMIN', 853),
('secret', 700),
('secret', 701),
('secret', 702),
('secret', 703),
('secret', 704),
('secret', 710),
('secret', 711),
('secret', 712),
('secret', 713),
('secret', 714),
('secret', 800),
('secret', 801),
('secret', 802),
('secret', 803),
('secret', 804),
('secret', 850),
('secret', 851),
('secret', 852),
('secret', 853),
('monit', 700),
('monit', 701),
('monit', 702),
('monit', 703),
('monit', 704),
('monit', 710),
('monit', 711),
('monit', 712),
('monit', 713),
('monit', 714),
('monit', 800),
('monit', 801),
('monit', 802),
('monit', 803),
('monit', 804),
('monit', 850),
('monit', 851),
('monit', 852),
('monit', 853);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENTREGABLE`
--

CREATE TABLE IF NOT EXISTS `ENTREGABLE` (
`ID_ENTREGABLE` int(11) NOT NULL,
  `NOMBRE` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `ESTADO` varchar(25) NOT NULL,
  `URL` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ID_MIEMBRO` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `FECHASUBIDA` date NOT NULL,
  `ID_TAREA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
--
-- Volcado de datos para la tabla `ENTREGABLE`
--
INSERT INTO `ENTREGABLE` (`ID_ENTREGABLE`, `NOMBRE`,`ESTADO`,`URL`,`ID_MIEMBRO`,`FECHASUBIDA`,`ID_TAREA`) VALUES
  (1,'Informe requisitos','entregado','../Archivos/inf.docx','ADMIN','2017-01-03',1),
(2,'Informe auxiliar','entregado','../Archivos/aux.docx','ADMIN','2017-01-03',1),
(3,'Informe subtarea','entregado','../Archivos/subtarea.docx','ADMIN','2017-01-03',2),
(4,'Informe auxiliar','entregado','../Archivos/auxs.docx','ADMIN','2017-01-03',2);
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
(500, 'GESTION NOTIFICACIONES'),
(600, 'GESTION CORREOS'),
(700, 'GESTION PERFIL'),
(701, 'GESTION TAREAS'),
(702, 'GESTION ENTREGABLES');


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
(400, 408),
(500, 500),
(500, 501),
(500, 503),
(500, 504),
(600, 600),
(600, 601),
(600, 602),
(701, 700),
(701, 701),
(701, 702),
(701, 703),
(701, 704),
(701, 710),
(701, 711),
(701, 712),
(701, 713),
(701, 714),
(700, 800),
(700, 801),
(700, 802),
(700, 803),
(700, 804),
(702, 850),
(702, 851),
(702, 852),
(702, 853);

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
(405, '../Views/PROYECTO_MIEMBRO_SHOW_ALL_Vista.php', 'PROYECTO MIEMBRO SHOW ALL'),
(406, '../Views/PROYECTO_MIEMBRO_ADD_Vista.php', 'PROYECTO MIEMBRO ADD'),
(407, '../Views/PROYECTO_MIEMBRO_DELETE_Vista.php', 'PROYECTO MIEMBRO DELETE'),
(408, '../Views/PROYECTO_MIEMBRO_SHOW_Vista.php', 'PROYECTO MIEMBRO SHOW'),
(500, '../Views/NOTIFICACION_ADD_Vista.php', 'NOTIFICACION ADD'),
(501, '../Views/NOTIFICACION_DELETE_Vista.php', 'NOTIFICACION DELETE'),
(503, '../Views/NOTIFICACION_SHOW_ALL_Vista.php', 'NOTIFICACION SHOW ALL'),
(504, '../Views/NOTIFICACION_SHOW_Vista.php', 'NOTIFICACION SHOW'),
(600, '../Views/CORREO_ADD_Vista.php', 'CORREO ADD'),
(601, '../Views/CORREO_SHOW_ALL_Vista.php', 'CORREO SHOW ALL'),
(602, '../Views/CORREO_SHOW_Vista.php', 'CORREO SHOW '),
(700, '../Views/TAREA_ADD_View.php', 'TAREA ADD '),
(701, '../Views/TAREA_EDIT_View.php', 'TAREA EDIT'),
(702, '../Views/TAREA_DELETE_View.php', 'TAREA DELETE'),
(703, '../Views/TAREA_SHOW_CURRENT_Vista.php', 'TAREA SHOW'),
(704, '../Views/TAREA_SHOW_ALL_Vista.php', 'TAREA SHOW ALL'),
(710, '../Views/SUBTAREA_ADD_View.php', 'SUBTAREA ADD'),
(711, '../Views/SUBTAREA_EDIT_View.php', 'SUBTAREA EDIT'),
(712, '../Views/SUBTAREA_DELETE_Vista.php', 'SUBTAREA DELETE'),
(713, '../Views/SUBTAREA_SHOW_CURRENT_Vista.php', 'SUBTAREA SHOW'),
(714, '../Views/SUBTAREA_SHOW_ALL_Vista.php', 'SUBTAREA SHOW ALL'),
(800, '../Views/MIEMBRO_ADD_View.php', 'MIEMBRO ADD'),
(801, '../Views/MIEMBRO_EDIT_View.php', 'MIEMBRO EDIT'),
(802, '../Views/MIEMBRO_DELETE_Vista.php', 'MIEMBRO DELETE'),
(803, '../Views/MIEMBRO_SHOW_Vista.php', 'MIEMBRO SHOW'),
(804, '../Views/MIEMBRO_TAREAS_SHOW_Vista.php', 'MIEMBRO TAREAS SHOW'),
(850, '../Views/ENTREGABLE_ADD_Vista.php', 'ENTREGABLE ADD'),
(851, '../Views/ENTREGABLE_EDIT_Vista.php', 'ENTREGABLE EDIT'),
(852, '../Views/ENTREGABLE_DELETE_Vista.php', 'ENTREGABLE DELETE'),
(853, '../Views/ENTREGABLE_SHOW_Vista.php', 'ENTREGABLE SHOW'),
(100, '../Views/TICKET_ADD_View.php', 'TICKETS ADD'),
(101, '../Views/TICKET_DELETE_View.php', 'TICKETS DELETe'),
(102, '../Views/TICKET_EDIT_View.php', 'TICKETS EDIT'),
(103, '../Views/TICKET_SHOW_View.php', 'TICKETS SHOW'),
(104, '../Views/TICKET_SHOW_ALL_View.php', 'TICKETS SHOW ALL');

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
   `DIRECTOR` varchar(25) NOT NULL,
  `BORRADO` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PROYECTO`
--

INSERT INTO `PROYECTO` (`ID_PROYECTO`, `NOMBRE`, `DESCRIPCION`, `FECHAI`, `FECHAIP`, `FECHAE`, `FECHAFP`, `NUMEROMIEMBROS`, `NUMEROHORAS`, `DIRECTOR`, `BORRADO`) VALUES
(1, 'Prueba', 'proyecto de prueba', '2016-11-20', '2016-11-26', '2016-12-20', '2016-11-29', 5, 7, 'monit', 0),
(2, 'Prueba2', 'proyecto de prueba222', '2016-10-20', '2016-09-13', '2017-12-20', '2017-12-29', 6, 6, 'monit', 0);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `PROYECTO_MIEMBRO`
--

CREATE TABLE IF NOT EXISTS `PROYECTO_MIEMBRO` (
  `ID_PROYECTO` int(3) NOT NULL,
  `EMP_USER` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PROYECTO_MIEMBRO`
--

INSERT INTO `PROYECTO_MIEMBRO` (`ID_PROYECTO`, `EMP_USER`) VALUES
 (1,'monit'),
 (1,'ADMIN'),
 (2,'secret');
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
(2, 500),
(1, 600),
(2, 600),
(1, 700),
(1, 701),
(1, 702);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TAREA`
--

CREATE TABLE IF NOT EXISTS `TAREA` (
  `PADRE` int(11) DEFAULT NULL,
  `ID_TAREA` int(11) NOT NULL,
  `NOMBRE` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `FECHAIP` date NOT NULL,
  `FECHAIR` date NOT NULL,
  `FECHAEP` date NOT NULL,
  `FECHAER` date NOT NULL,
  `HORASP` int(11) NOT NULL,
  `HORASR` int(11) NOT NULL,
  `ID_MIEMBRO` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `ID_PROYECTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `ESTADO` VARCHAR(25) NOT NULL,
  `COMENTARIO` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `TAREA`
--

INSERT INTO `TAREA` (`PADRE`, `ID_TAREA`, `NOMBRE`, `FECHAIP`, `FECHAIR`, `FECHAEP`, `FECHAER`, `HORASP`, `HORASR`, `ID_MIEMBRO`, `ID_PROYECTO`, `DESCRIPCION`, `ESTADO`, `COMENTARIO`) VALUES
  (NULL, 1, 'TAREA1', '2017-01-02', '2017-01-03', '2017-01-18', '2017-01-18', 20, 15, 'ADMIN', 1, 'EJEMPLO', 'PENDIENTE', 'EJEMPLO'),
  (1, 2, 'SUBTAREA1', '2017-01-10', '2017-01-10', '2017-01-16', '2017-01-15', 2, 2, 'ADMIN', 1, 'EJEMPLO', 'FINALIZADO', 'EJEMPLO'),
  (NULL ,3,'Tickets','0000-00-00','0000-00-00','0000-00-00','0000-00-00',0,0,'ADMIN',1,'Tickets','Pendiente',''),
  (NULL ,4,'Tickets','0000-00-00','0000-00-00','0000-00-00','0000-00-00',0,0,'ADMIN',2,'Tickets','Pendiente','');


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
 ADD PRIMARY KEY (`ID_ENTREGABLE`);

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
ADD CONSTRAINT `TAREA_FOREING_KEY` FOREIGN KEY (`ID_TAREA`) REFERENCES `TAREA` (`ID_TAREA`) ON DELETE CASCADE ON UPDATE CASCADE ,
ADD CONSTRAINT `EMPLEADO_FOREING_KEY` FOREIGN KEY (`ID_MIEMBRO`) REFERENCES `EMPLEADOS` (`EMP_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION ;

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
ADD CONSTRAINT `PROYECTO_FOREING_KEY2` FOREIGN KEY (`ID_PROYECTO`) REFERENCES `PROYECTO` (`ID_PROYECTO`)ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `EMPLEADO_FOREING_KEY2` FOREIGN KEY (`ID_MIEMBRO`) REFERENCES `EMPLEADOS` (`EMP_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
