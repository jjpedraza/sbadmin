-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2024 a las 06:48:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `initial2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_mod`
--

CREATE TABLE `cat_mod` (
  `idmodcat` int(1) NOT NULL,
  `modcat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cat_mod`
--

INSERT INTO `cat_mod` (`idmodcat`, `modcat`) VALUES
(0, 'Usuarios'),
(1, 'PDF'),
(2, 'Administradores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE `historia` (
  `idlog` int(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time(6) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `iduser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `historia`
--

INSERT INTO `historia` (`idlog`, `fecha`, `hora`, `descripcion`, `tipo`, `iduser`) VALUES
(1, '2024-03-24', '13:26:57.000000', 'Se ha eliminado con exito al usuario q', 'success', ''),
(2, '2024-03-24', '13:29:58.000000', 'Error al crear al usuario admin', 'danger', ''),
(3, '2024-03-24', '13:33:02.000000', 'Error al crear al usuario admin', 'danger', ''),
(4, '2024-03-24', '13:33:19.000000', 'Se ha creado con exito el usuario asdad', 'success', ''),
(5, '2024-03-24', '13:33:26.000000', 'Error al crear al usuario admin', 'danger', ''),
(6, '2024-03-24', '13:33:52.000000', 'Error al crear al usuario admin', 'danger', ''),
(7, '2024-03-24', '13:33:56.000000', 'Se ha eliminado con exito al usuario asdad', 'success', ''),
(8, '2024-03-24', '13:34:14.000000', 'Error al eliminar al usuario admin', 'danger', ''),
(9, '2024-03-24', '14:38:22.000000', 'Error de parametros para actualizar usuario', 'danger', ''),
(10, '2024-03-24', '14:38:26.000000', 'Error de parametros para actualizar usuario', 'danger', ''),
(11, '2024-03-24', '14:39:06.000000', 'Error de parametros para actualizar usuario', 'danger', ''),
(12, '2024-03-24', '14:41:06.000000', 'Se ha actualizado con exito el usuario test', 'success', ''),
(13, '2024-03-24', '14:41:24.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(14, '2024-03-24', '15:48:49.000000', 'Error de parametros para eliminar permiso  usuario', 'danger', ''),
(15, '2024-03-24', '15:50:19.000000', 'Error de parametros para eliminar permiso  usuario', 'danger', ''),
(16, '2024-03-24', '15:50:39.000000', 'Error de parametros para eliminar permiso  usuario', 'danger', ''),
(17, '2024-03-24', '15:51:24.000000', 'Se ha retirado el permiso con exito el usuario 1', 'success', ''),
(18, '2024-03-24', '15:51:38.000000', 'Se ha retirado el permiso con exito el usuario 1', 'success', ''),
(19, '2024-03-24', '15:52:52.000000', 'Error al eliminar el permiso 1  al usuario admin', 'danger', ''),
(20, '2024-03-24', '15:53:00.000000', 'Error al eliminar el permiso 2  al usuario admin', 'danger', ''),
(21, '2024-03-24', '15:55:32.000000', 'Se ha retirado el permiso con exito el usuario test', 'success', ''),
(22, '2024-03-24', '15:55:37.000000', 'Se ha retirado el permiso con exito el usuario test', 'success', ''),
(23, '2024-03-24', '15:56:37.000000', 'Se ha retirado el permiso con exito el usuario test', 'success', ''),
(24, '2024-03-24', '15:59:40.000000', 'Se ha retirado el permiso con exito el usuario test', 'success', ''),
(25, '2024-03-24', '16:04:17.000000', 'Se ha agregado el permiso con exito el usuario test', 'success', ''),
(26, '2024-03-24', '16:04:19.000000', 'Se ha agregado el permiso con exito el usuario test', 'success', ''),
(27, '2024-03-24', '16:04:21.000000', 'Se ha retirado el permiso con exito el usuario test', 'success', ''),
(28, '2024-03-24', '16:04:24.000000', 'Se ha agregado el permiso con exito el usuario test', 'success', ''),
(29, '2024-03-24', '16:29:02.000000', 'Error al crear actualizar el password de usuario ', 'danger', ''),
(30, '2024-03-24', '16:29:13.000000', 'Error al crear actualizar el password de usuario ', 'danger', ''),
(31, '2024-03-24', '16:33:36.000000', 'Error al crear actualizar el password de usuario ', 'danger', ''),
(32, '2024-03-24', '16:33:43.000000', 'Se ha actualizado con exito ', 'success', ''),
(33, '2024-03-24', '16:40:23.000000', 'Error al agregar  el permiso 3  al usuario admin', 'danger', ''),
(34, '2024-03-24', '16:40:27.000000', 'Error al agregar  el permiso 4  al usuario admin', 'danger', ''),
(35, '2024-03-24', '16:41:08.000000', 'Se ha agregado el permiso con exito el usuario admin', 'success', ''),
(36, '2024-03-24', '16:41:10.000000', 'Se ha agregado el permiso con exito el usuario admin', 'success', ''),
(37, '2024-06-15', '09:27:26.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(38, '2024-06-15', '09:30:25.000000', 'Error de parametros para actualizar usuario', 'danger', ''),
(39, '2024-06-15', '09:31:10.000000', 'Error de parametros para actualizar usuario', 'danger', ''),
(40, '2024-06-15', '09:32:01.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(41, '2024-06-15', '09:32:04.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(42, '2024-06-15', '09:32:07.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(43, '2024-06-15', '09:32:10.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(44, '2024-06-15', '09:33:21.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(45, '2024-06-15', '14:47:17.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(46, '2024-06-15', '14:47:41.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(47, '2024-06-15', '14:49:01.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(48, '2024-06-15', '14:50:32.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(49, '2024-06-15', '14:52:46.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(50, '2024-06-15', '14:55:08.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(51, '2024-06-15', '15:18:05.000000', 'Se ha actualizado con exito el usuario admin', 'success', ''),
(52, '2024-06-15', '15:49:43.000000', 'Se ha retirado el permiso con exito el usuario admin', 'success', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` int(2) NOT NULL,
  `modulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `disable` int(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  `idmodcat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `modulo`, `descripcion`, `disable`, `action`, `idmodcat`) VALUES
(1, 'Usuarios', 'Gestion de usuarios del sistema', 0, '', 0),
(2, 'Subir PDF', 'Subir archivos PDF', 0, 'SubirPDF()', 1),
(3, 'Consulta de Archivos', '', 0, 'Consulta()', 1),
(4, 'Empresas', '', 0, 'Empresas()', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_permisos`
--

CREATE TABLE `modulos_permisos` (
  `idmodulo` int(10) NOT NULL,
  `iduser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `modulos_permisos`
--

INSERT INTO `modulos_permisos` (`idmodulo`, `iduser`) VALUES
(1, 'admin'),
(1, 'test'),
(2, 'admin'),
(3, 'admin'),
(4, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `disable` int(1) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `url_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `password`, `disable`, `nombre`, `telefono`, `correo`, `url_foto`) VALUES
('admin', 'admin', 0, 'Inge Pedraza', 'x', 'x3', 'perfil_admin.jfif'),
('test', '123', 0, 'test test test', '989898', 'test@empresa.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_mod`
--
ALTER TABLE `cat_mod`
  ADD PRIMARY KEY (`idmodcat`);

--
-- Indices de la tabla `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `modulos_permisos`
--
ALTER TABLE `modulos_permisos`
  ADD PRIMARY KEY (`idmodulo`,`iduser`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `idlog` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
