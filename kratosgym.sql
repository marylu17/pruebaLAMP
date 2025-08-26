-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2025 a las 17:13:19
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kratosgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menbre`
--

CREATE TABLE `menbre` (
  `numm` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `nump` int(11) NOT NULL,
  `fech` varchar(10) NOT NULL,
  `descu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `nump` int(11) NOT NULL,
  `nomp` varchar(100) NOT NULL,
  `prec` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secc`
--

CREATE TABLE `secc` (
  `nums` int(11) NOT NULL,
  `numm` int(11) NOT NULL,
  `fechs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `num` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ap` varchar(50) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `std` varchar(3) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`num`, `nom`, `ap`, `ci`, `pwd`, `std`, `tipo`) VALUES
(1, 'Alejandro', 'Marques', '111', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'act', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menbre`
--
ALTER TABLE `menbre`
  ADD PRIMARY KEY (`numm`),
  ADD KEY `num` (`num`) USING BTREE,
  ADD KEY `nump` (`nump`) USING BTREE;

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`nump`);

--
-- Indices de la tabla `secc`
--
ALTER TABLE `secc`
  ADD PRIMARY KEY (`nums`),
  ADD KEY `numm` (`numm`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`num`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menbre`
--
ALTER TABLE `menbre`
  MODIFY `numm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `nump` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secc`
--
ALTER TABLE `secc`
  MODIFY `nums` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menbre`
--
ALTER TABLE `menbre`
  ADD CONSTRAINT `menbre_ibfk_1` FOREIGN KEY (`num`) REFERENCES `user` (`num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menbre_ibfk_2` FOREIGN KEY (`nump`) REFERENCES `planes` (`nump`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secc`
--
ALTER TABLE `secc`
  ADD CONSTRAINT `secc_ibfk_1` FOREIGN KEY (`numm`) REFERENCES `menbre` (`numm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
