-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2023 a las 20:45:50
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
  `idCategoria` int(15) NOT NULL,
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
  `idEstado` int(15) NOT NULL,
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
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `idPrioridad` int(15) NOT NULL,
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
  `codigo` int(15) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp(),
  `fecha_entrega` date DEFAULT NULL,
  `fecha_vencimiento` date NOT NULL,
  `tblCategoriaId` int(15) NOT NULL,
  `tblPrioridadId` int(15) NOT NULL,
  `tblEstadoId` int(15) NOT NULL,
  `recursos` varchar(100) DEFAULT NULL,
  `Observacion` varchar(100) DEFAULT NULL,
  `tblAuditoriaId` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`codigo`, `titulo`, `descripcion`, `fecha_creacion`, `fecha_entrega`, `fecha_vencimiento`, `tblCategoriaId`, `tblPrioridadId`, `tblEstadoId`, `recursos`, `Observacion`, `tblAuditoriaId`) VALUES
(1, 'Prueba', NULL, '2023-12-06', NULL, '2023-12-05', 1, 1, 1, NULL, NULL, 1),
(2, 'Prueba2', NULL, '2023-12-06', NULL, '2023-12-06', 3, 3, 4, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `contraseña` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `contraseña`) VALUES
(1, 'Brayan', 123),
(2, 'Jara', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariotarea`
--

CREATE TABLE `usuariotarea` (
  `codigo` int(15) NOT NULL,
  `tblUsuarioCodigo` int(15) NOT NULL,
  `tblTareaCodigo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `idCategoria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `idPrioridad` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuariotarea`
--
ALTER TABLE `usuariotarea`
  MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

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
