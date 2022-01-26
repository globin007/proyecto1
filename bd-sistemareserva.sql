-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2021 a las 16:49:17
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundobike`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicicleta`
--

CREATE TABLE `bicicleta` (
  `id_bicicleta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `ganancia` int(11) NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `bicicleta`
--

INSERT INTO `bicicleta` (`id_bicicleta`, `id_usuario`, `marca`, `modelo`, `color`, `ganancia`, `imagen`, `id_estado`) VALUES
(1, 1, 'BMX', 'advance', 'negro', 15, '../../files/php4349-152.jpg', 4),
(2, 2, 'JEEB', 'freestyle', 'blanco', 10, '../../files/php84A8-Nsdsd.jpg', 2),
(3, 3, 'GOLIAT', 'montañera', 'azul', 3, '../../files/php878F-O.jpg', 3),
(4, 5, 'MONARK', 'freestyle', 'verde', 35, '../../files/phpF63F-m.jpg', 4),
(5, 4, 'MONARK', 'advance', 'naranja', 5, '../../files/php7772-fsf.jpg', 2),
(6, 6, 'JEEB', 'montañera', 'azul', 3, '../../files/php77DB-152.jpg', 5),
(7, 1, 'MONARK', 'montañera', 'blanco', 6, '../../files/php2526-Nsdsd.jpg', 2),
(8, 1, 'GOLIAT', 'advance', 'naranja', 15, '../../files/php6677-fsf.jpg', 2),
(9, 5, 'PAJERO', 'montañera', 'blanco', 1, '../../files/php51AA-Nsdsd.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` int(1) NOT NULL,
  `observacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reserva`
--

CREATE TABLE `detalle_reserva` (
  `id_detalle_reserva` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_bicicleta` int(11) NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalle_reserva`
--

INSERT INTO `detalle_reserva` (`id_detalle_reserva`, `id_reserva`, `id_bicicleta`, `precio`, `subtotal`) VALUES
(1, 1, 2, 10, 80),
(2, 1, 3, 10, 80),
(3, 2, 3, 10, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_bicicleta`
--

CREATE TABLE `estado_bicicleta` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_bicicleta`
--

INSERT INTO `estado_bicicleta` (`id_estado`, `descripcion`) VALUES
(1, 'en evaluacion'),
(2, 'disponible'),
(3, 'reservado'),
(4, 'alquilado'),
(5, 'no disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_reserva`
--

CREATE TABLE `estado_reserva` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_reserva`
--

INSERT INTO `estado_reserva` (`id_estado`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Terminado'),
(3, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id_precio` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_precio`, `dia`, `costo`) VALUES
(1, 'Lunes', 10),
(2, 'Martes', 10),
(3, 'Miercoles', 10),
(4, 'Jueves', 10),
(5, 'Viernes', 15),
(6, 'Sabado', 15),
(7, 'Domingo', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `monto` double NOT NULL,
  `descuento` double NOT NULL,
  `total` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `cantidad_horas` varchar(10) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`, `monto`, `descuento`, `total`, `fecha`, `hora_inicio`, `hora_fin`, `cantidad_horas`, `id_estado`) VALUES
(1, 5, 200, 20, 180, '2021-12-15 00:00:00', '2021-12-14 10:00:00', '2021-12-14 20:00:00', '10:00', 1),
(2, 6, 100, 20, 80, '2021-12-06 00:00:00', '2021-12-09 08:00:00', '2021-12-09 18:00:00', '10:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apepaterno` varchar(20) NOT NULL,
  `apematerno` varchar(20) NOT NULL,
  `dni` int(8) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `password`, `nombres`, `apepaterno`, `apematerno`, `dni`, `tipo`, `estado`) VALUES
(1, '', '', 'Aldair', 'Cruz', 'Quiñones', 74934369, 'administrador', 0),
(2, '', '', 'Frank', 'Garcia', 'Rojas', 74236514, 'administrador', 1),
(3, '', '', 'Estrella', 'Sancho', 'Ramos', 74223658, 'cliente', 1),
(4, '', '', 'Alonso ', 'Rojas', 'Ramos', 77774444, 'proveedor', 0),
(5, '', '', 'Kevin', 'Taipe', 'Guillen', 74125398, 'cliente', 1),
(6, '', '', 'Lady', 'Lorenzo', 'Huayapa', 74552369, 'cliente', 0),
(7, '', '', 'Brandon', 'Chero', 'Quiñones', 74236584, 'proveedor', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD PRIMARY KEY (`id_bicicleta`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`);

--
-- Indices de la tabla `detalle_reserva`
--
ALTER TABLE `detalle_reserva`
  ADD PRIMARY KEY (`id_detalle_reserva`);

--
-- Indices de la tabla `estado_bicicleta`
--
ALTER TABLE `estado_bicicleta`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_reserva`
--
ALTER TABLE `estado_reserva`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bicicleta`
--
ALTER TABLE `bicicleta`
  MODIFY `id_bicicleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_reserva`
--
ALTER TABLE `detalle_reserva`
  MODIFY `id_detalle_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_bicicleta`
--
ALTER TABLE `estado_bicicleta`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_reserva`
--
ALTER TABLE `estado_reserva`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
