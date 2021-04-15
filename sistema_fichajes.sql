-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2021 a las 01:54:41
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_fichajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_introducida` varchar(50) NOT NULL,
  `horas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `fecha_introducida`, `horas`) VALUES
(1, 'Jose', '', 0),
(2, 'Jose', '', 8),
(3, 'Jose', '1618178400', 8),
(4, 'Jose', '1618178400', 8),
(5, 'Jose', '1617919200', 6),
(6, 'Jose', '', 6),
(7, 'Jose', '', 8),
(8, 'Jose', '2021-04-12', 8),
(9, 'Jose', '2021-04-12', 8),
(10, 'Jose', '2021-04-05', 8),
(11, 'Jose', '2021-04-05', 8),
(12, 'Jose', '2021-04-05', 8),
(13, 'Jose', '2021-04-12', 8),
(14, 'Jose', '2021-04-12', 8),
(15, 'Jose', '2021-04-01', 8),
(16, 'Vero', '2021-04-04', 8),
(17, 'Molly', '2021-04-13', 8),
(18, 'Molly', '2021-04-13', 0),
(19, 'Molly', '2021-04-13', 0),
(20, 'Molly', '2021-04-12', 0),
(21, 'Molly', '2021-04-12', 0),
(22, 'Vero', '2021-04-01', 8),
(23, 'Vero', '2021-04-12', 0),
(24, 'Vero', '2021-04-08', 8),
(25, 'Jose', '2021-04-13', 8),
(26, 'Jose', '2021-04-13', 8),
(27, 'Jose', '2021-04-05', 8),
(28, 'Jose', '2021-04-06', 8),
(29, 'Jose', '2021-04-07', 8),
(30, 'Jose', '2021-04-08', 8),
(31, 'Jose', '2021-04-09', 8),
(32, 'Marco', '2021-04-06', 8),
(33, 'Marco', '2021-04-07', 8),
(34, 'Marco', '2021-04-08', 8),
(35, 'Marco', '2021-04-09', 8),
(36, 'Marco', '2021-04-12', 8),
(37, 'Marco', '2021-04-13', 8),
(38, 'Jose', '2021-04-03', 8),
(39, 'Jose', '2021-04-02', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(80) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `ultima_conexion` datetime DEFAULT NULL,
  `fecha_inicial` varchar(20) NOT NULL,
  `fecha_introducida` varchar(20) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `horas_trabajadas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `contrasena`, `fecha_registro`, `ultima_conexion`, `fecha_inicial`, `fecha_introducida`, `tipo_usuario`, `horas_trabajadas`) VALUES
(1, 'Jose', '$2y$10$2HU9SMdCQcM.vLw5FcYqwO61k0Lcee21csePBgheyw/1jSgGhmG2q', '2021-04-11 00:36:30', '2021-04-13 01:53:54', '', '', '', 0),
(3, 'Marco', '$2y$10$8I7iChzCxgt42Zy9NCiVBOy22Mx/mT52b1DBC5.u379qdZmG.2i3G', '2021-04-11 00:49:19', '2021-04-13 01:02:13', '', '', '', 0),
(4, 'Laura', '$2y$10$AXFXK4xcpfMdTwVgIVOxCu0nurkuEi69C25s4eGJkCglAi0tDk/U2', '2021-04-11 00:49:54', NULL, '', '', '', 0),
(5, 'Juan', '$2y$10$XmZtNo1OsbMMZQ.MQtqqqe9MFTJMWHnM3yIJt.4PU3hgu5L/SNf6m', '2021-04-11 01:02:57', NULL, '', '', '', 0),
(7, 'Vero', '$2y$10$0a1cS9nWIcvvdAXB7yeCzOh91gLVpm1Q/ZhuuHzKf0hFK1IRa6jES', '2021-04-11 02:00:33', '2021-04-13 01:14:58', '', '', '', 0),
(8, 'admin', 'admin', '2021-04-11 02:12:04', NULL, '', '', 'admin', 0),
(22, 'Molly', '$2y$10$GaP/UtakZXa9mCHZhgc7uOEmL1hbLS1UEZtzCCz/PDkHAIwT6DE86', '2021-04-13 00:24:00', '2021-04-13 00:24:19', '', '', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
