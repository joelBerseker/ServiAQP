-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2020 a las 01:17:39
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CatId` int(11) NOT NULL,
  `CatNom` varchar(60) NOT NULL,
  `CatDes` text NOT NULL,
  `CatEstReg` int(1) NOT NULL DEFAULT 1,
  `CatFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CatId`, `CatNom`, `CatDes`, `CatEstReg`, `CatFecCre`) VALUES
(1, 'Juegos', 'Categoria Relacionada a juegos', 1, '2020-06-06 22:17:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `SubCatId` int(11) NOT NULL,
  `SubCatCatId` int(11) NOT NULL,
  `SubCatNom` varchar(50) NOT NULL,
  `SubCatDes` text NOT NULL,
  `SubCatEstReg` int(11) NOT NULL DEFAULT 1,
  `SubCatFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`SubCatId`, `SubCatCatId`, `SubCatNom`, `SubCatDes`, `SubCatEstReg`, `SubCatFecCre`) VALUES
(1, 1, 'Twitch', 'Subcategoria de enseñanza de juegos y uso de twitch', 1, '2020-06-06 23:17:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CatId`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `SubCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_SUBCAT_CAT` FOREIGN KEY (`SubCatCatId`) REFERENCES `categoria` (`CatId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
