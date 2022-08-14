-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-08-2022 a las 17:11:48
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

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

DROP TABLE IF EXISTS `tbl_actualizaciones`;
CREATE TABLE IF NOT EXISTS `tbl_actualizaciones` (
  `version_id_act` varchar(15) NOT NULL,
  `nombre_act` varchar(15) DEFAULT NULL,
  `novedades_act` varchar(140) DEFAULT NULL,
  `comentarios_act` varchar(140) DEFAULT NULL,
  `di_des` varchar(10) NOT NULL,
  PRIMARY KEY (`version_id_act`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

DROP TABLE IF EXISTS `tbl_administrador`;
CREATE TABLE IF NOT EXISTS `tbl_administrador` (
  `id_adm` int(11) NOT NULL,
  `nombre_adm` varchar(100) NOT NULL,
  `correo_adm` varchar(50) DEFAULT NULL,
  `otro_contacto` varchar(150) DEFAULT NULL,
  `contrasena_adm` varchar(15) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comunicado_admin`
--

DROP TABLE IF EXISTS `tbl_comunicado_admin`;
CREATE TABLE IF NOT EXISTS `tbl_comunicado_admin` (
  `id_com` int(11) NOT NULL,
  `asunto_com` varchar(15) NOT NULL,
  `texto_com` text,
  `visibilidad` tinyint(1) NOT NULL,
  `fecha_com` date DEFAULT NULL,
  `prioridad_com` varchar(15) DEFAULT NULL,
  `id_adm` int(11) NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comunicado_user`
--

DROP TABLE IF EXISTS `tbl_comunicado_user`;
CREATE TABLE IF NOT EXISTS `tbl_comunicado_user` (
  `id_rpu` int(11) NOT NULL,
  `asunto_rpu` varchar(50) NOT NULL,
  `descripcion_rpu` text NOT NULL,
  `fecha_rpu` datetime NOT NULL,
  `estado_rpu` varchar(10) NOT NULL,
  `respuesta_rpu` varchar(100) DEFAULT NULL,
  `id_adm` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  PRIMARY KEY (`id_rpu`),
  KEY `id_adm` (`id_adm`),
  KEY `id_usr` (`id_usr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_config`
--

DROP TABLE IF EXISTS `tbl_config`;
CREATE TABLE IF NOT EXISTS `tbl_config` (
  `id_cfg` int(11) NOT NULL,
  `nombre_cfg` varchar(50) NOT NULL,
  `descripcion_cfg` varchar(255) DEFAULT NULL,
  `color_cfg` varchar(8) DEFAULT NULL,
  `notificaciones_cfg` varchar(2) NOT NULL,
  `prioridad_cfg` varchar(12) DEFAULT NULL,
  `fecha_even_cfg` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cfg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_desarrolladores`
--

DROP TABLE IF EXISTS `tbl_desarrolladores`;
CREATE TABLE IF NOT EXISTS `tbl_desarrolladores` (
  `di_des` varchar(11) NOT NULL,
  `tipodi_des` varchar(30) NOT NULL,
  `nombre_des` varchar(100) NOT NULL,
  `apellidos_des` varchar(100) NOT NULL,
  `horario_des` varchar(15) DEFAULT NULL,
  `sueldo_des` float NOT NULL,
  `id_com` int(11) DEFAULT NULL,
  PRIMARY KEY (`di_des`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos`
--

DROP TABLE IF EXISTS `tbl_eventos`;
CREATE TABLE IF NOT EXISTS `tbl_eventos` (
  `id_evn` int(11) NOT NULL,
  `fecha_evn` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_evn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos_config`
--

DROP TABLE IF EXISTS `tbl_eventos_config`;
CREATE TABLE IF NOT EXISTS `tbl_eventos_config` (
  `id_evn` int(11) NOT NULL,
  `id_cfg` int(11) NOT NULL,
  KEY `id_evn` (`id_evn`),
  KEY `id_cfg` (`id_cfg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_e_desarrolladora`
--

DROP TABLE IF EXISTS `tbl_e_desarrolladora`;
CREATE TABLE IF NOT EXISTS `tbl_e_desarrolladora` (
  `id_edes` int(11) NOT NULL,
  `nombre_edes` varchar(15) DEFAULT NULL,
  `di_des` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_edes`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_metodo_pago`
--

DROP TABLE IF EXISTS `tbl_metodo_pago`;
CREATE TABLE IF NOT EXISTS `tbl_metodo_pago` (
  `id_mpg` int(11) NOT NULL,
  `tipo_mpg` varchar(30) NOT NULL,
  `numero_mpg` varchar(19) NOT NULL,
  `fecha_caducidad_mpg` date NOT NULL,
  `codigo_cvv_mpg` varchar(3) NOT NULL,
  `nombres_mpg` varchar(50) NOT NULL,
  `apellidos_mpg` varchar(50) NOT NULL,
  `pais_mpg` varchar(100) NOT NULL,
  `codigo_postal_mpg` varchar(10) NOT NULL,
  `direccion_mpg` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mpg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pagos`
--

DROP TABLE IF EXISTS `tbl_pagos`;
CREATE TABLE IF NOT EXISTS `tbl_pagos` (
  `id_pg` int(11) NOT NULL,
  `descripcion_pg` varchar(255) DEFAULT NULL,
  `cantidad_pg` float NOT NULL,
  `impuestos_pg` float DEFAULT NULL,
  `id_mpg` int(11) NOT NULL,
  PRIMARY KEY (`id_pg`),
  KEY `id_mpg` (`id_mpg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usr` int(11) NOT NULL,
  `nombre_usr` varchar(30) NOT NULL,
  `correo_usr` varchar(50) DEFAULT NULL,
  `contrasena_usr` varchar(15) NOT NULL,
  `id_evn` int(11) DEFAULT NULL,
  `id_mpg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
