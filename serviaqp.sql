-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2020 a las 01:14:26
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
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `AccId` int(11) NOT NULL,
  `AccNom` varchar(50) NOT NULL,
  `AccRolId` int(11) NOT NULL,
  `AccRecId` int(11) NOT NULL,
  `AccEstReg` int(11) NOT NULL DEFAULT 1,
  `AccFecCre` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`AccId`, `AccNom`, `AccRolId`, `AccRecId`, `AccEstReg`, `AccFecCre`) VALUES
(1, 'prueba', 1, 1, 1, '2020-07-17 21:41:14');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `acceso_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `acceso_tabla` (
`AccId` int(11)
,`AccNom` varchar(50)
,`RolNom` varchar(50)
,`RecNom` varchar(50)
,`AccEstReg` int(11)
,`AccFecCre` timestamp
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adquiridos`
--

CREATE TABLE `adquiridos` (
  `AdqID` int(11) NOT NULL,
  `AdqUsuID` int(11) NOT NULL,
  `AdqSerID` int(11) NOT NULL,
  `AdqEstReg` int(1) NOT NULL DEFAULT 1,
  `AdqFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `adquiridos_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `adquiridos_tabla` (
`AdqID` int(11)
,`AdqUsuID` int(11)
,`AdqSerID` int(11)
,`AdqEstReg` int(1)
,`AdqFecCre` timestamp
,`SerID` int(11)
,`SerUsuID` int(11)
,`SerCatID` int(11)
,`SerSubCatID` int(11)
,`SerPreFre` text
,`SerDes` text
,`SerEstReg` int(1)
,`SerFecCre` timestamp
,`SerNom` varchar(90)
,`SerPre` decimal(9,2)
,`SerVal` decimal(2,1)
);

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
(4, 'Ocio', 'Ocio y mas', 1, '2020-07-23 23:44:03'),
(5, 'Grafica y DiseÃ±o', 'Graficos y diseÃ±os, todo lo relacionado', 1, '2020-07-23 23:45:17'),
(6, 'Marketing Digital', 'marketing empresarial y en la web', 1, '2020-07-23 23:46:09'),
(7, 'Programacion y Tecnologia', 'final', 1, '2020-07-23 23:46:37'),
(8, 'Negocios', 'todo lo relacionado a negorias', 1, '2020-07-23 23:47:14'),
(9, 'Musica y Audio', 'enseÃ±anza de audio y musica', 1, '2020-07-23 23:48:32'),
(10, 'Video y Animacion', 'enseÃ±anza de video y animacion', 1, '2020-07-23 23:49:19'),
(11, 'Redaccion y Traduccion', 'enseÃ±anza y servicios personalizados', 1, '2020-07-23 23:49:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id_cha` int(11) NOT NULL,
  `id_cch` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL,
  `leido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`id_cha`, `id_cch`, `de`, `para`, `mensaje`, `fecha`, `leido`) VALUES
(1, 1, 68, 71, 'hola', '2020-07-28 13:26:42', 0),
(2, 1, 68, 71, 'holi', '2020-07-28 13:30:05', 0),
(3, 1, 68, 71, 'hola', '2020-07-28 13:35:00', 0),
(4, 1, 71, 68, 'hola', '2020-07-28 13:35:09', 0),
(5, 1, 68, 71, 'hola', '2020-07-28 13:35:48', 0),
(6, 1, 68, 71, '', '2020-07-28 13:58:22', 0),
(7, 1, 68, 71, 'a', '2020-07-28 13:58:29', 0),
(8, 1, 68, 71, 'as', '2020-07-28 13:59:48', 0),
(9, 1, 68, 71, 'puto Jhon', '2020-07-28 14:01:45', 0),
(10, 1, 68, 71, 'colita', '2020-07-28 14:17:04', 0),
(11, 1, 68, 71, 'colin', '2020-07-28 14:17:12', 0),
(12, 1, 68, 71, 'bla', '2020-07-28 14:17:38', 0),
(13, 1, 68, 71, 'prro', '2020-07-28 14:18:50', 0),
(14, 1, 68, 71, '', '2020-07-28 14:18:56', 0),
(15, 1, 68, 71, 'tmr', '2020-07-28 14:19:47', 0),
(16, 1, 68, 71, 'puto jhon', '2020-07-28 14:20:12', 0),
(17, 1, 68, 71, 'tmr', '2020-07-28 14:23:08', 0),
(18, 1, 68, 71, 'jasdasda', '2020-07-28 14:24:06', 0),
(19, 1, 68, 71, 'asdasdasdasf x', '2020-07-28 14:24:21', 0),
(20, 1, 68, 71, 'asdas1', '2020-07-28 14:24:33', 0),
(21, 1, 68, 71, '123', '2020-07-28 14:25:01', 0),
(22, 1, 68, 71, 'asdasdasd', '2020-07-28 14:27:37', 0),
(23, 1, 68, 71, '123', '2020-07-28 14:27:44', 0),
(24, 1, 68, 71, 'asd', '2020-07-28 14:29:06', 0),
(25, 1, 68, 71, '456', '2020-07-28 14:29:12', 0),
(26, 1, 71, 68, 'Â´proo', '2020-07-28 21:43:50', 0),
(27, 1, 71, 68, 'donde estas', '2020-07-28 21:43:54', 0),
(28, 1, 71, 68, 'prri', '2020-07-28 21:44:09', 0),
(29, 1, 71, 68, 'prri', '2020-07-28 21:44:16', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_chats`
--

CREATE TABLE `c_chats` (
  `id_cch` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_chats`
--

INSERT INTO `c_chats` (`id_cch`, `de`, `para`) VALUES
(1, 68, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `FavID` int(11) NOT NULL,
  `FavUsuID` int(11) NOT NULL,
  `FavSerID` int(11) NOT NULL,
  `FavEstReg` int(1) NOT NULL DEFAULT 1,
  `FacFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `favoritos_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `favoritos_tabla` (
`FavID` int(11)
,`FavUsuID` int(11)
,`FavSerID` int(11)
,`FavEstReg` int(1)
,`FacFecCre` timestamp
,`SerID` int(11)
,`SerUsuID` int(11)
,`SerCatID` int(11)
,`SerSubCatID` int(11)
,`SerPreFre` text
,`SerDes` text
,`SerEstReg` int(1)
,`SerFecCre` timestamp
,`SerNom` varchar(90)
,`SerPre` decimal(9,2)
,`SerVal` decimal(2,1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `NotID` int(11) NOT NULL,
  `NotDes` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `NotEnvUsuID` int(11) NOT NULL,
  `NotSerID` int(11) NOT NULL,
  `NotMot` text COLLATE utf8_unicode_ci NOT NULL,
  `NotUsuId` int(11) DEFAULT NULL,
  `NotEst` int(11) NOT NULL DEFAULT 0,
  `NotFecCre` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `RecId` int(11) NOT NULL,
  `RecNom` varchar(50) NOT NULL,
  `RecDes` text NOT NULL,
  `RecEstReg` int(11) NOT NULL DEFAULT 1,
  `RecFecCre` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`RecId`, `RecNom`, `RecDes`, `RecEstReg`, `RecFecCre`) VALUES
(1, '/rol/crear', 'crear rol', 1, '2020-06-07 02:13:37'),
(3, '/rol/editar', 'editar rol', 1, '2020-07-22 02:11:54'),
(4, '/subcategoria', 'Vista de subcategorias', 1, '2020-07-25 00:40:28');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `reporte_tabla` (
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `RolId` int(11) NOT NULL,
  `RolNom` varchar(50) NOT NULL,
  `RolDes` text NOT NULL,
  `RolEstReg` int(11) NOT NULL DEFAULT 1,
  `RolFecCre` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`RolId`, `RolNom`, `RolDes`, `RolEstReg`, `RolFecCre`) VALUES
(1, 'Administrador', 'Es un Buen Administrador', 1, '2020-07-13 23:02:49'),
(2, 'Comprador', 'Es un Comprador', 1, '2020-07-13 23:09:35'),
(3, 'Vendedor', 'Es un Vendedor', 1, '2020-07-13 23:10:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `SerID` int(11) NOT NULL,
  `SerUsuID` int(11) NOT NULL,
  `SerCatID` int(11) NOT NULL,
  `SerSubCatID` int(11) NOT NULL,
  `SerPreFre` text NOT NULL,
  `SerDes` text NOT NULL,
  `SerEstReg` int(1) NOT NULL DEFAULT 1,
  `SerFecCre` timestamp NOT NULL DEFAULT current_timestamp(),
  `SerNom` varchar(90) NOT NULL,
  `SerPre` decimal(9,2) NOT NULL,
  `SerVal` decimal(2,1) NOT NULL DEFAULT -1.0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciocomentario`
--

CREATE TABLE `serviciocomentario` (
  `SerComID` int(11) NOT NULL,
  `SerComSerID` int(11) NOT NULL,
  `SerComUsuID` int(11) NOT NULL,
  `SerMenMen` text NOT NULL,
  `SerMenEstReg` int(11) NOT NULL DEFAULT 1,
  `SerMenFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `servicio_comentario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `servicio_comentario` (
`SerComID` int(11)
,`SerComSerID` int(11)
,`SerComUsuID` int(11)
,`SerMenMen` text
,`SerMenEstReg` int(11)
,`SerMenFecCre` timestamp
,`UsuNom` varchar(100)
,`UsuImgNom` varchar(200)
,`UsuImgTip` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_img`
--

CREATE TABLE `servicio_img` (
  `SerImgId` int(11) NOT NULL,
  `SerImgSerId` int(11) NOT NULL,
  `SerImgNom` varchar(90) NOT NULL,
  `SerImgTip` varchar(20) NOT NULL,
  `SerImgEstReg` int(11) NOT NULL DEFAULT 1,
  `SerImgFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_report`
--

CREATE TABLE `servicio_report` (
  `SerRepID` int(11) NOT NULL,
  `SerRepDenUsuID` int(11) NOT NULL,
  `SerRepSerID` int(11) NOT NULL,
  `SerRepMot` text NOT NULL,
  `SerRepEstReg` int(1) NOT NULL DEFAULT 1,
  `SerRepFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `servicio_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `servicio_tabla` (
`SerID` int(11)
,`SerUsuID` int(11)
,`SerCatID` int(11)
,`SerSubCatID` int(11)
,`SerPreFre` text
,`SerDes` text
,`SerEstReg` int(1)
,`SerFecCre` timestamp
,`SerNom` varchar(90)
,`SerPre` decimal(9,2)
,`SerVal` decimal(2,1)
,`UsuNom` varchar(100)
,`CatNom` varchar(60)
,`SubCatNom` varchar(50)
);

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
(7, 4, 'Retos y Challenges', 'Gente estupida', 1, '2020-07-23 23:51:59'),
(8, 4, 'Zing', 'Gente estupida x2', 1, '2020-07-23 23:52:46'),
(9, 5, 'DiseÃ±o de Logos', 'enseÃ±anza y servicios personalizados', 1, '2020-07-23 23:53:35'),
(10, 5, 'Guias de estilo para marcar', 'enseÃ±anza y servicios personalizados', 1, '2020-07-23 23:54:02'),
(11, 5, 'Tarjetas de presentaciÃ³n y papelerÃ­a', 'enseÃ±anza y servicios personalizados', 1, '2020-07-23 23:54:26'),
(12, 6, 'Marketin para Redes Social', 'servicio personalizado', 1, '2020-07-23 23:55:06'),
(13, 6, 'Estrategias de Marketing', 'enseÃ±anza y servicios personalizados', 1, '2020-07-23 23:55:28'),
(14, 6, 'Relaciones Publicas', 'enseÃ±anza personalizada', 1, '2020-07-23 23:56:51'),
(15, 10, 'Edicion de Videos', 'enseÃ±anza y servicios personalizados', 1, '2020-07-23 23:58:02'),
(16, 10, 'Explicacion de animacion en Whitebord', 'enseÃ±anza personalizada', 1, '2020-07-23 23:58:58'),
(17, 7, 'WordPress', 'enseÃ±anza personalizada', 1, '2020-07-23 23:59:49'),
(18, 8, 'Gestion de Comercio Electronico', 'enseÃ±anza y servicios personalizados', 1, '2020-07-24 00:00:34'),
(19, 9, 'Voice Over', 'servicio personalizado', 1, '2020-07-24 00:01:26'),
(20, 11, 'Articulos y Blogs', 'servicio personalizado', 1, '2020-07-24 00:02:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `UsuID` int(11) NOT NULL,
  `UsuNom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UsuCor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `UsuCon` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `UsuImgNom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `UsuImgTip` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `UsuRolID` int(11) DEFAULT NULL,
  `UsuEst` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuID`, `UsuNom`, `UsuCor`, `UsuCon`, `UsuImgNom`, `UsuImgTip`, `UsuRolID`, `UsuEst`, `created_at`) VALUES
(68, 'asdads', 'joel1@joel.com', '$2y$10$8e6jv/xerB4OljVmXq40r.F5wCjKCMl/RoCV.mJVVY3zl9j4.tJvy', 'identifi_app.jpg', '', 1, 1, '2020-07-22 02:47:37'),
(71, 'Pedrin', 'prueba01@joel.com', '$2y$10$0VUmpeA7f5rQoN3D0pSatOPM3jnEGrgYNfUI.g3SP6AdhH2.1Gu7m', 'marrano.jpg', '', 1, 1, '2020-07-31 23:12:27'),
(74, 'Jhon', 'jhonmamani46@gmail.com', '$2y$10$zEIlgKGhaaO5QX9VLgxlqOBR5pV/zXZbJgzZKWUbokuvDSDw0doLG', 'usuario-sin-imagen.jpg', 'image/jpg', 1, 1, '2020-07-31 23:11:58'),
(75, 'joel', 'jose@gmail.com', '$2y$10$1jw.YtaF/xLtfkO4RpDTnukzF6ebk.AkzHHrnkxzV.u8RfSTGRNYi', 'leelo.png', 'image/png', 2, 1, '2020-07-31 23:12:12');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuario_tabla` (
);

-- --------------------------------------------------------

--
-- Estructura para la vista `acceso_tabla`
--
DROP TABLE IF EXISTS `acceso_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `acceso_tabla`  AS  select `a`.`AccId` AS `AccId`,`a`.`AccNom` AS `AccNom`,`r`.`RolNom` AS `RolNom`,`e`.`RecNom` AS `RecNom`,`a`.`AccEstReg` AS `AccEstReg`,`a`.`AccFecCre` AS `AccFecCre` from ((`acceso` `a` join `rol` `r` on(`a`.`AccRolId` = `r`.`RolId`)) join `recurso` `e` on(`a`.`AccRecId` = `e`.`RecId`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `adquiridos_tabla`
--
DROP TABLE IF EXISTS `adquiridos_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adquiridos_tabla`  AS  select `a`.`AdqID` AS `AdqID`,`a`.`AdqUsuID` AS `AdqUsuID`,`a`.`AdqSerID` AS `AdqSerID`,`a`.`AdqEstReg` AS `AdqEstReg`,`a`.`AdqFecCre` AS `AdqFecCre`,`s`.`SerID` AS `SerID`,`s`.`SerUsuID` AS `SerUsuID`,`s`.`SerCatID` AS `SerCatID`,`s`.`SerSubCatID` AS `SerSubCatID`,`s`.`SerPreFre` AS `SerPreFre`,`s`.`SerDes` AS `SerDes`,`s`.`SerEstReg` AS `SerEstReg`,`s`.`SerFecCre` AS `SerFecCre`,`s`.`SerNom` AS `SerNom`,`s`.`SerPre` AS `SerPre`,`s`.`SerVal` AS `SerVal` from (`adquiridos` `a` join `servicio` `s` on(`a`.`AdqSerID` = `s`.`SerID`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `favoritos_tabla`
--
DROP TABLE IF EXISTS `favoritos_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `favoritos_tabla`  AS  select `f`.`FavID` AS `FavID`,`f`.`FavUsuID` AS `FavUsuID`,`f`.`FavSerID` AS `FavSerID`,`f`.`FavEstReg` AS `FavEstReg`,`f`.`FacFecCre` AS `FacFecCre`,`s`.`SerID` AS `SerID`,`s`.`SerUsuID` AS `SerUsuID`,`s`.`SerCatID` AS `SerCatID`,`s`.`SerSubCatID` AS `SerSubCatID`,`s`.`SerPreFre` AS `SerPreFre`,`s`.`SerDes` AS `SerDes`,`s`.`SerEstReg` AS `SerEstReg`,`s`.`SerFecCre` AS `SerFecCre`,`s`.`SerNom` AS `SerNom`,`s`.`SerPre` AS `SerPre`,`s`.`SerVal` AS `SerVal` from (`favoritos` `f` join `servicio` `s` on(`f`.`FavSerID` = `s`.`SerID`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_tabla`
--
DROP TABLE IF EXISTS `reporte_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_tabla`  AS  select `sr`.`SerRepID` AS `SerRepID`,`sr`.`SerRepDenUsuID` AS `SerRepDenUsuID`,`sr`.`SerRepSerID` AS `SerRepSerID`,`sr`.`SerRepMot` AS `SerRepMot`,`sr`.`SerRepEstReg` AS `SerRepEstReg`,`sr`.`SerRepFecCre` AS `SerRepFecCre`,`u`.`UsuID` AS `UsuID`,`u`.`UsuNom` AS `UsuNom`,`u`.`UsuCor` AS `UsuCor`,`u`.`UsuCon` AS `UsuCon`,`u`.`UsuImgNom` AS `UsuImgNom`,`u`.`UsuImgTip` AS `UsuImgTip`,`u`.`UsuImgArc` AS `UsuImgArc`,`u`.`UsuRolID` AS `UsuRolID`,`u`.`UsuEst` AS `UsuEst`,`u`.`created_at` AS `created_at`,`s`.`SerID` AS `SerID`,`s`.`SerUsuID` AS `SerUsuID`,`s`.`SerCatID` AS `SerCatID`,`s`.`SerSubCatID` AS `SerSubCatID`,`s`.`SerPreFre` AS `SerPreFre`,`s`.`SerDes` AS `SerDes`,`s`.`SerEstReg` AS `SerEstReg`,`s`.`SerFecCre` AS `SerFecCre`,`s`.`SerNom` AS `SerNom`,`s`.`SerPre` AS `SerPre`,`s`.`SerVal` AS `SerVal` from ((`servicio_report` `sr` join `usuario` `u` on(`sr`.`SerRepDenUsuID` = `u`.`UsuID`)) join `servicio` `s` on(`sr`.`SerRepSerID` = `s`.`SerID`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `servicio_comentario`
--
DROP TABLE IF EXISTS `servicio_comentario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `servicio_comentario`  AS  select `sc`.`SerComID` AS `SerComID`,`sc`.`SerComSerID` AS `SerComSerID`,`sc`.`SerComUsuID` AS `SerComUsuID`,`sc`.`SerMenMen` AS `SerMenMen`,`sc`.`SerMenEstReg` AS `SerMenEstReg`,`sc`.`SerMenFecCre` AS `SerMenFecCre`,`u`.`UsuNom` AS `UsuNom`,`u`.`UsuImgNom` AS `UsuImgNom`,`u`.`UsuImgTip` AS `UsuImgTip` from (`serviciocomentario` `sc` join `usuario` `u` on(`sc`.`SerComUsuID` = `u`.`UsuID`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `servicio_tabla`
--
DROP TABLE IF EXISTS `servicio_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `servicio_tabla`  AS  select `s`.`SerID` AS `SerID`,`s`.`SerUsuID` AS `SerUsuID`,`s`.`SerCatID` AS `SerCatID`,`s`.`SerSubCatID` AS `SerSubCatID`,`s`.`SerPreFre` AS `SerPreFre`,`s`.`SerDes` AS `SerDes`,`s`.`SerEstReg` AS `SerEstReg`,`s`.`SerFecCre` AS `SerFecCre`,`s`.`SerNom` AS `SerNom`,`s`.`SerPre` AS `SerPre`,`s`.`SerVal` AS `SerVal`,`u`.`UsuNom` AS `UsuNom`,`c`.`CatNom` AS `CatNom`,`sc`.`SubCatNom` AS `SubCatNom` from (((`servicio` `s` join `usuario` `u` on(`s`.`SerUsuID` = `u`.`UsuID`)) join `categoria` `c` on(`s`.`SerCatID` = `c`.`CatId`)) join `subcategoria` `sc` on(`s`.`SerSubCatID` = `sc`.`SubCatId`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_tabla`
--
DROP TABLE IF EXISTS `usuario_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_tabla`  AS  select `u`.`UsuID` AS `UsuID`,`u`.`UsuNom` AS `UsuNom`,`u`.`UsuCor` AS `UsuCor`,`u`.`UsuCon` AS `UsuCon`,`u`.`UsuImgNom` AS `UsuImgNom`,`u`.`UsuImgTip` AS `UsuImgTip`,`u`.`UsuImgArc` AS `UsuImgArc`,`u`.`UsuRolID` AS `UsuRolID`,`u`.`UsuEst` AS `UsuEst`,`u`.`created_at` AS `created_at`,`r`.`RolNom` AS `RolNom` from (`usuario` `u` join `rol` `r` on(`u`.`UsuRolID` = `r`.`RolId`)) ;

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
-- Indices de la tabla `adquiridos`
--
ALTER TABLE `adquiridos`
  ADD PRIMARY KEY (`AdqID`),
  ADD KEY `FK_Adq_Ser` (`AdqSerID`),
  ADD KEY `FK_Adq_Usu` (`AdqUsuID`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CatId`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_cha`),
  ADD KEY `id_cch` (`id_cch`);

--
-- Indices de la tabla `c_chats`
--
ALTER TABLE `c_chats`
  ADD PRIMARY KEY (`id_cch`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`FavID`),
  ADD KEY `FK_Fav_Ser` (`FavSerID`),
  ADD KEY `FK_Fav_Usu` (`FavUsuID`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`NotID`),
  ADD KEY `NotUsuId` (`NotUsuId`),
  ADD KEY `fk_not_usu` (`NotEnvUsuID`),
  ADD KEY `FK_Not_Ser` (`NotSerID`);

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
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`SerID`),
  ADD KEY `FK_Ser_Usu` (`SerUsuID`),
  ADD KEY `FK_Ser_Cat` (`SerCatID`),
  ADD KEY `FK_Ser_SubCat` (`SerSubCatID`);

--
-- Indices de la tabla `serviciocomentario`
--
ALTER TABLE `serviciocomentario`
  ADD PRIMARY KEY (`SerComID`),
  ADD KEY `FK_SerCom_Ser` (`SerComSerID`),
  ADD KEY `FK_SerCom_Usu` (`SerComUsuID`);

--
-- Indices de la tabla `servicio_img`
--
ALTER TABLE `servicio_img`
  ADD PRIMARY KEY (`SerImgId`),
  ADD KEY `FK_IMG_SER` (`SerImgSerId`);

--
-- Indices de la tabla `servicio_report`
--
ALTER TABLE `servicio_report`
  ADD PRIMARY KEY (`SerRepID`),
  ADD KEY `FK_SerRep_Den` (`SerRepDenUsuID`),
  ADD KEY `FK_SerRep_Ser` (`SerRepSerID`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`SubCatId`),
  ADD KEY `FK_SUBCAT_CAT` (`SubCatCatId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UsuID`),
  ADD KEY `UsuRolID` (`UsuRolID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `AccId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `adquiridos`
--
ALTER TABLE `adquiridos`
  MODIFY `AdqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id_cha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `c_chats`
--
ALTER TABLE `c_chats`
  MODIFY `id_cch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `FavID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `NotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `RecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `RolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `SerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `serviciocomentario`
--
ALTER TABLE `serviciocomentario`
  MODIFY `SerComID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `servicio_img`
--
ALTER TABLE `servicio_img`
  MODIFY `SerImgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `servicio_report`
--
ALTER TABLE `servicio_report`
  MODIFY `SerRepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `SubCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UsuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
-- Filtros para la tabla `adquiridos`
--
ALTER TABLE `adquiridos`
  ADD CONSTRAINT `FK_Adq_Ser` FOREIGN KEY (`AdqSerID`) REFERENCES `servicio` (`SerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Adq_Usu` FOREIGN KEY (`AdqUsuID`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `fk_chats_c_chats` FOREIGN KEY (`id_cch`) REFERENCES `c_chats` (`id_cch`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `FK_Fav_Ser` FOREIGN KEY (`FavSerID`) REFERENCES `servicio` (`SerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Fav_Usu` FOREIGN KEY (`FavUsuID`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `FK_Not_Ser` FOREIGN KEY (`NotSerID`) REFERENCES `servicio` (`SerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_not_usu` FOREIGN KEY (`NotEnvUsuID`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`NotUsuId`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FK_Ser_Cat` FOREIGN KEY (`SerCatID`) REFERENCES `categoria` (`CatId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Ser_SubCat` FOREIGN KEY (`SerSubCatID`) REFERENCES `subcategoria` (`SubCatId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Ser_Usu` FOREIGN KEY (`SerUsuID`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serviciocomentario`
--
ALTER TABLE `serviciocomentario`
  ADD CONSTRAINT `FK_SerCom_Ser` FOREIGN KEY (`SerComSerID`) REFERENCES `servicio` (`SerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SerCom_Usu` FOREIGN KEY (`SerComUsuID`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_img`
--
ALTER TABLE `servicio_img`
  ADD CONSTRAINT `FK_IMG_SER` FOREIGN KEY (`SerImgSerId`) REFERENCES `servicio` (`SerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_report`
--
ALTER TABLE `servicio_report`
  ADD CONSTRAINT `FK_SerRep_Den` FOREIGN KEY (`SerRepDenUsuID`) REFERENCES `usuario` (`UsuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SerRep_Ser` FOREIGN KEY (`SerRepSerID`) REFERENCES `servicio` (`SerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_SUBCAT_CAT` FOREIGN KEY (`SubCatCatId`) REFERENCES `categoria` (`CatId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`UsuRolID`) REFERENCES `rol` (`RolId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
