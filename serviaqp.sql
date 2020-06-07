-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2020 a las 04:48:12
-- Versión del servidor: 8.0.15
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
-- Base de datos: `serviaqp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `AccId` int(11) NOT NULL,
  `AccNom` varchar(50) NOT NULL,
  `AccRolId` int(11) NOT NULL,
  `AccRecId` int(11) NOT NULL,
  `AccEstReg` int(11) NOT NULL DEFAULT '1',
  `AccFecCre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CatId` int(11) NOT NULL,
  `CatNom` varchar(60) NOT NULL,
  `CatDes` text NOT NULL,
  `CatEstReg` int(1) NOT NULL DEFAULT '1',
  `CatFecCre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CatId`, `CatNom`, `CatDes`, `CatEstReg`) VALUES
(1, 'Juegos', 'Categoria Relacionada a juegos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `RecId` int(11) NOT NULL,
  `RecNom` varchar(50) NOT NULL,
  `RecDes` text NOT NULL,
  `RecEstReg` int(11) NOT NULL DEFAULT '1',
  `RecFecCre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`RecId`, `RecNom`, `RecDes`, `RecEstReg`, `RecFecCre`) VALUES
(1, '/rol/crear', 'crear rol', 1, '2020-06-07 02:13:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `RolId` int(11) NOT NULL,
  `RolNom` varchar(50) NOT NULL,
  `RolDes` text NOT NULL,
  `RolEstReg` int(11) NOT NULL DEFAULT '1',
  `RolFecCre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`RolId`, `RolNom`, `RolDes`, `RolEstReg`, `RolFecCre`) VALUES
(2, 'Sergio', 'DSDSD', 1, '2020-06-07 01:52:21'),
(3, 'ser123', 'dsds', 1, '2020-06-07 01:52:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `SubCatId` int(11) NOT NULL,
  `SubCatCatId` int(11) NOT NULL,
  `SubCatNom` varchar(50) NOT NULL,
  `SubCatDes` text NOT NULL,
  `SubCatEstReg` int(11) NOT NULL DEFAULT '1',
  `SubCatFecCre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`SubCatId`, `SubCatCatId`, `SubCatNom`, `SubCatDes`, `SubCatEstReg`) VALUES
(1, 1, 'Twitch', 'Subcategoria de enseñanza de juegos y uso de twitch', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`AccId`),
  ADD KEY `fk_acc_rol` (`AccRolId`),
  ADD KEY `fk_acc_rec` (`AccRecId`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CatId`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`RecId`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`RolId`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`SubCatId`),
  ADD KEY `FK_SUBCAT_CAT` (`SubCatCatId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `AccId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `RecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `RolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `SubCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_acc_rec` FOREIGN KEY (`AccRecId`) REFERENCES `recurso` (`RecId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_acc_rol` FOREIGN KEY (`AccRolId`) REFERENCES `rol` (`RolId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_SUBCAT_CAT` FOREIGN KEY (`SubCatCatId`) REFERENCES `categoria` (`CatId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
