-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2022 a las 22:52:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_datos_cd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actualizaciones`
--

CREATE TABLE `tbl_actualizaciones` (
  `version_id_act` varchar(15) NOT NULL,
  `nombre_act` varchar(15) DEFAULT NULL,
  `novedades_act` varchar(140) DEFAULT NULL,
  `comentarios_act` varchar(140) DEFAULT NULL,
  `di_des` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `id_adm` int(11) NOT NULL,
  `nombre_adm` varchar(100) NOT NULL,
  `correo_adm` varchar(50) DEFAULT NULL,
  `otro_contacto` varchar(150) DEFAULT NULL,
  `contrasena_adm` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comunicado_admin`
--

CREATE TABLE `tbl_comunicado_admin` (
  `id_com` int(11) NOT NULL,
  `asunto_com` varchar(15) NOT NULL,
  `texto_com` text DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  `fecha_com` date DEFAULT NULL,
  `prioridad_com` varchar(15) DEFAULT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comunicado_user`
--

CREATE TABLE `tbl_comunicado_user` (
  `id_rpu` int(11) NOT NULL,
  `asunto_rpu` varchar(50) NOT NULL,
  `descripcion_rpu` text NOT NULL,
  `fecha_rpu` datetime NOT NULL,
  `estado_rpu` varchar(10) NOT NULL,
  `respuesta_rpu` varchar(100) DEFAULT NULL,
  `id_adm` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_config`
--

CREATE TABLE `tbl_config` (
  `id_cfg` int(11) NOT NULL,
  `nombre_cfg` varchar(50) NOT NULL,
  `descripcion_cfg` varchar(255) DEFAULT NULL,
  `color_cfg` varchar(8) DEFAULT NULL,
  `notificaciones_cfg` varchar(2) NOT NULL,
  `prioridad_cfg` varchar(12) DEFAULT NULL,
  `fecha_even_cfg` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_desarrolladores`
--

CREATE TABLE `tbl_desarrolladores` (
  `di_des` varchar(11) NOT NULL,
  `tipodi_des` varchar(30) NOT NULL,
  `nombre_des` varchar(100) NOT NULL,
  `apellidos_des` varchar(100) NOT NULL,
  `horario_des` varchar(15) DEFAULT NULL,
  `sueldo_des` float NOT NULL,
  `id_com` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id_evn` int(11) NOT NULL,
  `fecha_evn` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos_config`
--

CREATE TABLE `tbl_eventos_config` (
  `id_evn` int(11) NOT NULL,
  `id_cfg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_e_desarrolladora`
--

CREATE TABLE `tbl_e_desarrolladora` (
  `id_edes` int(11) NOT NULL,
  `nombre_edes` varchar(15) DEFAULT NULL,
  `di_des` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_metodo_pago`
--

CREATE TABLE `tbl_metodo_pago` (
  `id_mpg` int(11) NOT NULL,
  `tipo_mpg` varchar(30) NOT NULL,
  `numero_mpg` varchar(19) NOT NULL,
  `fecha_caducidad_mpg` date NOT NULL,
  `codigo_cvv_mpg` varchar(3) NOT NULL,
  `nombres_mpg` varchar(50) NOT NULL,
  `apellidos_mpg` varchar(50) NOT NULL,
  `pais_mpg` varchar(100) NOT NULL,
  `codigo_postal_mpg` varchar(10) NOT NULL,
  `direccion_mpg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pagos`
--

CREATE TABLE `tbl_pagos` (
  `id_pg` int(11) NOT NULL,
  `descripcion_pg` varchar(255) DEFAULT NULL,
  `cantidad_pg` float NOT NULL,
  `impuestos_pg` float DEFAULT NULL,
  `id_mpg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usr` int(11) NOT NULL,
  `nombre_usr` varchar(30) NOT NULL,
  `correo_usr` varchar(50) DEFAULT NULL,
  `contrasena_usr` varchar(255) NOT NULL,
  `id_evn` int(11) DEFAULT NULL,
  `id_mpg` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usr`, `nombre_usr`, `correo_usr`, `contrasena_usr`, `id_evn`, `id_mpg`) VALUES
(1, 'aa', 'aa@aa.aa', '$2y$10$ZcDpXyP0neafcrCyDaNm.ulLlwjraI7mNr/zBrXnCuRH28uZR9IJG', NULL, NULL),
(2, 'hola', 'hola@gmail.com', '$2y$10$grt3SS8jggUmMnorXjBKpOCMRpAlr8Hpr.SJpyaOe81Werp4htMd6', NULL, NULL),
(3, 'g', 'g@g.g', '$2y$10$.lVorqR.50FQHnnza1FoTuY6f/yowiTkVV6ahC7iBixedm6jn.6JS', NULL, NULL),
(4, 'juanguarnizo', 'juanguarnizo@gmail.com', '$2y$10$LIGyv0vOTVjkECz/Dwta7eJa0kEEMQK6zjGDGaGJsFXT0gnQROA/.', NULL, NULL),
(5, 'xd', 'xd@gmail.com', '$2y$10$VohPbl1eM1TNJuTQ50R/xO9RYRs68/41qvhcpxhbOAbFKrVsCxbUK', NULL, NULL),
(6, 'holabuenas', 'holabuenas@gmail.com', '$2y$10$YDZuSl1VLvxVEJcpofSTgejAeIsXBQQOXzpFjs0uONKan6ir2ixiK', NULL, NULL),
(7, 'pepe', 'pepe@gmail.com', '$2y$10$iLb8RsSUe0jv8yUJ4UThyeouaXPeIt.cF2fXM0eWRil/wwuVh/gVm', NULL, NULL),
(8, 'holabuenas1', 'holabuenas1@gmail.com', '$2y$10$gAUuc.EIEA0OW9DDKbMOjevaElXVeICIJa.TUeSpgcGYOkGByrwd2', NULL, NULL),
(9, 'perro', 'perro@perro.com', '$2y$10$JHfKAvaTZ7Wn14A1QkXbY.9l9AMRUS.Mtgdh.zQHf6UbLnrxHXfyy', NULL, NULL),
(10, 'queondapibes', 'queondapibes@gmail.com', '$2y$10$ctfBgtME8pbQW3xZ.cW0ueWoChdnf2UVC6wjsENyuXAWOrAkPV/4C', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_actualizaciones`
--
ALTER TABLE `tbl_actualizaciones`
  ADD PRIMARY KEY (`version_id_act`);

--
-- Indices de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indices de la tabla `tbl_comunicado_admin`
--
ALTER TABLE `tbl_comunicado_admin`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `tbl_comunicado_user`
--
ALTER TABLE `tbl_comunicado_user`
  ADD PRIMARY KEY (`id_rpu`),
  ADD KEY `id_adm` (`id_adm`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`id_cfg`);

--
-- Indices de la tabla `tbl_desarrolladores`
--
ALTER TABLE `tbl_desarrolladores`
  ADD PRIMARY KEY (`di_des`);

--
-- Indices de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  ADD PRIMARY KEY (`id_evn`);

--
-- Indices de la tabla `tbl_eventos_config`
--
ALTER TABLE `tbl_eventos_config`
  ADD KEY `id_evn` (`id_evn`),
  ADD KEY `id_cfg` (`id_cfg`);

--
-- Indices de la tabla `tbl_e_desarrolladora`
--
ALTER TABLE `tbl_e_desarrolladora`
  ADD PRIMARY KEY (`id_edes`);

--
-- Indices de la tabla `tbl_metodo_pago`
--
ALTER TABLE `tbl_metodo_pago`
  ADD PRIMARY KEY (`id_mpg`);

--
-- Indices de la tabla `tbl_pagos`
--
ALTER TABLE `tbl_pagos`
  ADD PRIMARY KEY (`id_pg`),
  ADD KEY `id_mpg` (`id_mpg`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usr`),
  ADD UNIQUE KEY `correo_usr` (`correo_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
