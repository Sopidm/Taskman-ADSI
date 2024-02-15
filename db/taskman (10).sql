-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2024 a las 20:48:15
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
-- Base de datos: `taskman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `categorias` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `categorias`) VALUES
(1, 'Personal'),
(2, 'Trabajo'),
(3, 'Estudio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estados` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estados`) VALUES
(1, 'En curso'),
(2, 'Pendiente'),
(3, 'Terminado'),
(4, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `criterios` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `nombre`, `descripcion`, `criterios`) VALUES
(1, 'amarillo', 'amarillo', 'de 7 a 4 dias'),
(2, 'rojo', 'rojo', 'de 1 a 3 dias'),
(3, 'gris', 'gris', 'menos de 0 dias'),
(4, 'auditor', 'auditor', 'auditor'),
(5, 'asignar', 'asignar', 'asignar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones_usuarios`
--

CREATE TABLE `notificaciones_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `notificacion_id` int(11) DEFAULT NULL,
  `tarea_id` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `notificaciones_usuarios`
--

INSERT INTO `notificaciones_usuarios` (`id`, `usuario_id`, `notificacion_id`, `tarea_id`, `fecha`) VALUES
(4, 3, 4, 49, '2024-02-14 19:26:39'),
(5, 3, 5, 49, '2024-02-14 19:26:39'),
(6, 4, 5, 49, '2024-02-14 19:26:39'),
(7, 3, 4, 50, '2024-02-14 19:26:39'),
(8, 3, 5, 50, '2024-02-14 19:26:39'),
(9, 4, 5, 50, '2024-02-14 19:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `idPrioridad` int(11) NOT NULL,
  `prioridades` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`idPrioridad`, `prioridades`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `fecha_entrega` date DEFAULT NULL,
  `fecha_vencimiento` date NOT NULL,
  `tblCategoriaId` int(11) NOT NULL,
  `tblPrioridadId` int(11) NOT NULL,
  `tblEstadoId` int(11) NOT NULL,
  `recursos` varchar(100) DEFAULT NULL,
  `Observacion` varchar(100) DEFAULT NULL,
  `tblAuditoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`codigo`, `titulo`, `descripcion`, `fecha_creacion`, `fecha_entrega`, `fecha_vencimiento`, `tblCategoriaId`, `tblPrioridadId`, `tblEstadoId`, `recursos`, `Observacion`, `tblAuditoriaId`) VALUES
(39, 'presentacion', 'presenta', '2023-12-13 00:00:00', NULL, '2025-12-25', 1, 1, 4, NULL, NULL, 0),
(43, 'puerrrrrrr', 'eeeeee', '2023-12-14 00:00:00', NULL, '2023-12-22', 1, 1, 4, NULL, NULL, 0),
(44, 'pruebas asignados', 'perbea', '2024-02-13 22:04:45', NULL, '2024-02-29', 1, 1, 2, 'telefono', NULL, 3),
(49, 'ddd', 'adad', '2024-02-14 16:51:12', NULL, '2024-02-19', 1, 1, 1, 'ddd', NULL, 3),
(50, 'ddd', 'adad', '2024-02-14 19:21:44', NULL, '2024-02-19', 1, 1, 1, 'ddd', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `usuario`, `contrasena`) VALUES
(3, 'brayan', 123),
(4, 'luis', 123),
(6, 'jara', 123),
(7, 'carlos', 123),
(8, 'cristian', 123),
(9, 'administrador', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariotarea`
--

CREATE TABLE `usuariotarea` (
  `codigo` int(11) NOT NULL,
  `tblUsuarioCodigo` int(11) NOT NULL,
  `tblTareaCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariotarea`
--

INSERT INTO `usuariotarea` (`codigo`, `tblUsuarioCodigo`, `tblTareaCodigo`) VALUES
(1, 7, 44),
(2, 8, 44),
(3, 7, 45),
(4, 8, 45),
(5, 3, 46),
(6, 4, 46),
(7, 3, 47),
(8, 4, 47),
(9, 3, 48),
(10, 4, 48),
(11, 3, 49),
(12, 4, 49),
(13, 3, 50),
(14, 4, 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones_usuarios`
--
ALTER TABLE `notificaciones_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id_foren` (`usuario_id`),
  ADD KEY `noti_foren` (`notificacion_id`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`idPrioridad`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `forenke` (`tblCategoriaId`),
  ADD KEY `forenk` (`tblEstadoId`),
  ADD KEY `foren` (`tblPrioridadId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuariotarea`
--
ALTER TABLE `usuariotarea`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones_usuarios`
--
ALTER TABLE `notificaciones_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `idPrioridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuariotarea`
--
ALTER TABLE `usuariotarea`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notificaciones_usuarios`
--
ALTER TABLE `notificaciones_usuarios`
  ADD CONSTRAINT `noti_foren` FOREIGN KEY (`notificacion_id`) REFERENCES `notificaciones` (`id`),
  ADD CONSTRAINT `tarea_id_foren` FOREIGN KEY (`tarea_id`) REFERENCES `tareas` (`codigo`),
  ADD CONSTRAINT `usuario_id_foren` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`codigo`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `foren` FOREIGN KEY (`tblPrioridadId`) REFERENCES `prioridad` (`idPrioridad`),
  ADD CONSTRAINT `forenk` FOREIGN KEY (`tblEstadoId`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `forenke` FOREIGN KEY (`tblCategoriaId`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
