-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2018 a las 15:09:59
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadecitas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin_sistema` int(11) NOT NULL,
  `nombre_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `area_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `inicio_d` date NOT NULL,
  `inicio_h` time NOT NULL,
  `fin_d` date NOT NULL,
  `fin_h` time NOT NULL,
  `className` varchar(200) DEFAULT NULL,
  `editable` tinyint(1) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `id_usuario_sistema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `nombre`, `inicio_d`, `inicio_h`, `fin_d`, `fin_h`, `className`, `editable`, `url`, `color`, `id_usuario_sistema`) VALUES
(1, '3F', '2018-04-01', '09:00:00', '2018-04-01', '13:00:00', 'Disponible', 1, NULL, 'yellow', 0),
(2, '2D', '2018-04-03', '11:00:00', '2018-04-03', '15:00:00', 'Disponible', 1, NULL, 'green', 0),
(3, 'Hector', '2018-04-02', '10:00:00', '2018-04-02', '11:00:00', NULL, NULL, NULL, 'blue', 0),
(4, 'FIFO', '2018-03-12', '09:00:00', '2018-03-12', '11:00:00', NULL, NULL, NULL, 'red', 0),
(5, 'GGGG', '2018-04-04', '11:11:00', '2018-04-04', '12:12:00', NULL, NULL, NULL, 'yellow', 0),
(6, 'GGGG', '2018-04-04', '11:11:00', '2018-04-04', '12:12:00', NULL, NULL, NULL, 'gray', 0),
(7, 'd', '2018-04-12', '11:11:00', '2018-04-12', '12:12:00', NULL, NULL, NULL, 'blue', 0),
(8, 'd', '2018-04-12', '11:11:00', '2018-04-12', '12:12:00', NULL, NULL, NULL, 'orange', 0),
(27, '12', '2018-05-02', '11:11:00', '2018-05-02', '12:12:00', NULL, NULL, NULL, 'green', 0),
(28, 'jonthan', '2018-04-06', '09:10:00', '2018-04-06', '11:11:00', NULL, NULL, NULL, '#000000', 0),
(29, '666', '2018-05-04', '11:11:00', '2018-05-04', '12:00:00', NULL, NULL, NULL, '#bfd95b', 0),
(30, 'jona', '2018-05-21', '09:00:00', '2018-05-21', '11:00:00', NULL, NULL, NULL, '#ffff00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id_formulario_sistema` int(11) NOT NULL,
  `temperatura` varchar(10) NOT NULL,
  `distancia` float NOT NULL,
  `concentracion` varchar(10) NOT NULL,
  `presion_flujo` varchar(10) NOT NULL,
  `tiempo_deposito` varchar(10) NOT NULL,
  `tipo_sustrato` varchar(20) NOT NULL,
  `resistividad` varchar(20) NOT NULL,
  `id_usuario_sistema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario_sistema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `paterno_usuario` varchar(40) NOT NULL,
  `materno_usuario` varchar(40) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `area_usuario` varchar(50) NOT NULL,
  `pass_usuario` varchar(40) NOT NULL,
  `Tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario_sistema`, `id_usuario`, `nombre_usuario`, `paterno_usuario`, `materno_usuario`, `email_usuario`, `area_usuario`, `pass_usuario`, `Tipo_usuario`) VALUES
(1, 666, 'Diana', 'G', 'e', 'diana@gmail.com', 'FCC', '666', 2),
(2, 267676, 'uiy', 'uyuiy', 'hkhkh', '12@GMAIL.COM', 'eee', '123', 2),
(3, 2121, 'usuario maestro', 'yuiyu', 'yuiyuiy', 'yuyui', 'uuiy', 'yiuyuiy', 2),
(4, 67678, 'usuaruo tipo 3', 'uyuyuy', 'yuyuy', 'yuyy', 'ioioi', 'ioio', 3),
(5, 76767, 'alumno2', 'iuiu', 'uiuiu', 'uiui', 'uiuiu', 'uiui', 1),
(6, 9898, 'maestro2', 'iuioui', 'uuoui', 'iuiou', 'uiouio', 'uiouio', 2),
(7, 76876786, 'alumno1', 'iouiou', 'iuoiu', 'ouoiui', 'uouoiu', 'uiouiu', 1),
(8, 767687, 'Luis', 'peres', 'aleluay', '78678@hotmail,com', 'yuyuyuy', 'yiyy', 1),
(9, 786786786, 'felipe', 'kkhkh', 'hkhkh', 'ssdd@hotmail,com', 'hghg', 'gg', 1),
(10, 6876786, 'memo', 'reyes', 'yuy', 'sss@hotnail.com', 'lenguas', '123', 2),
(11, 89898, 'felipe', 'guzmasn', 'pile', 'ee@gmail.com', 'dsdsd', '123', 1),
(12, 89898, 'cecilio', 'cruz', 'gome', '313@gmail.com', '12121', '000', 2),
(13, 8787, 'uiuiu', 'iuiu', 'iuiu', 'iuiu@homtial.ocm', 'qwqw', '123', 2),
(14, 2013, 'estoydepaso', 'utyu', 'tyutyu', 'yuyut', 'ytyut', '123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin_sistema`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_sistema` (`id_usuario_sistema`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id_formulario_sistema`),
  ADD UNIQUE KEY `id_alumno` (`id_usuario_sistema`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario_sistema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin_sistema` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_formulario_sistema` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario_sistema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`id_usuario_sistema`) REFERENCES `usuarios` (`id_usuario_sistema`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
