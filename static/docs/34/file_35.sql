-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 29-08-2024 a las 19:41:47
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ibsm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_esposas`
--

CREATE TABLE `registro_esposas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `misionero_id` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `alergias` varchar(250) DEFAULT NULL,
  `talla_vestido` varchar(50) DEFAULT NULL,
  `numero_calzado` varchar(50) DEFAULT NULL,
  `calzado_talla_mx` tinyint(1) DEFAULT NULL,
  `calzado_talla_usa` tinyint(1) DEFAULT NULL,
  `fecha_registro` varchar(70) NOT NULL,
  `hora_registro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_esposas`
--

INSERT INTO `registro_esposas` (`id`, `nombre`, `misionero_id`, `edad`, `alergias`, `talla_vestido`, `numero_calzado`, `calzado_talla_mx`, `calzado_talla_usa`, `fecha_registro`, `hora_registro`) VALUES
(1, 'Diana Rebeca Padron', 5, 27, 'Nazafolina y el polvo', '32', '7', 1, 0, '2024-08-29', '10:10:16 am'),
(2, 'Diana Rebeca Padron', 6, 27, 'Nazafolina y el polvo', '32', '7', 1, 0, '2024-08-29', '10:12:56 am'),
(3, 'Diana Rebeca Padron', 8, 27, 'Nazafolina y el polvo', '32', NULL, 1, 1, '2024-08-29', '10:53:58 am'),
(4, 'Diana Rebeca Padron', 9, 27, 'Nazafolina y el polvo', '32', '7', 0, 1, '2024-08-29', '10:56:21 am'),
(5, 'Diana Rebeca Padron', 10, 27, 'Nazafolina y el polvo', '32', '7', 0, 1, '2024-08-29', '10:57:26 am'),
(6, 'Diana Rebeca Padron', 12, 27, 'Nazafolina y el polvo', '32', '7', 0, 1, '2024-08-29', '13:44:24 pm'),
(7, 'Diana Rebeca Padron', 14, 27, 'Nazafolina y el polvo', '32', '7', 0, 1, '2024-08-29', '02:32:12 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_hijos`
--

CREATE TABLE `registro_hijos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `misionero_id` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `numero_calzado` varchar(50) DEFAULT NULL,
  `calzado_talla_mx` tinyint(1) DEFAULT NULL,
  `calzado_talla_usa` tinyint(1) DEFAULT NULL,
  `fecha_registro` varchar(70) NOT NULL,
  `hora_registro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_hijos`
--

INSERT INTO `registro_hijos` (`id`, `nombre`, `misionero_id`, `edad`, `numero_calzado`, `calzado_talla_mx`, `calzado_talla_usa`, `fecha_registro`, `hora_registro`) VALUES
(1, 'Mateo Maldonado Padron', 10, 8, '7', 1, 0, '2024-08-29', '10:57:26 am'),
(2, 'Mateo Maldonado Padron', 10, 8, '7', 1, 0, '2024-08-29', '10:57:26 am'),
(3, 'Mateo Maldonado Padron', 12, 8, '7', 1, 0, '2024-08-29', '13:44:24 pm'),
(4, 'Mateo Maldonado Padron', 12, 8, '7', 0, 1, '2024-08-29', '13:44:24 pm'),
(5, 'Mateo Maldonado Padron', 14, 8, '7', 1, 0, '2024-08-29', '02:32:12 pm'),
(6, 'Mateo Maldonado Padron', 14, 8, '7', 0, 1, '2024-08-29', '02:32:12 pm'),
(7, 'Mateo Maldonado Padron', 14, 8, '7', 0, 0, '2024-08-29', '02:32:12 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_misioneros`
--

CREATE TABLE `registro_misioneros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `edad` int(11) NOT NULL,
  `alergias` varchar(250) DEFAULT NULL,
  `numero_telefono` varchar(80) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `medio_transporte` varchar(100) DEFAULT NULL,
  `talla_camisa` varchar(50) DEFAULT NULL,
  `numero_calzado` varchar(50) DEFAULT NULL,
  `calzado_talla_mx` tinyint(1) DEFAULT NULL,
  `calzado_talla_usa` tinyint(1) DEFAULT NULL,
  `nombre_iglesia` varchar(350) DEFAULT NULL,
  `direccion_iglesia` varchar(500) DEFAULT NULL,
  `acompanantes` varchar(200) DEFAULT NULL,
  `confirmacion` int(11) NOT NULL,
  `fecha_registro` varchar(70) NOT NULL,
  `hora_registro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_misioneros`
--

INSERT INTO `registro_misioneros` (`id`, `nombre`, `edad`, `alergias`, `numero_telefono`, `cargo`, `correo`, `medio_transporte`, `talla_camisa`, `numero_calzado`, `calzado_talla_mx`, `calzado_talla_usa`, `nombre_iglesia`, `direccion_iglesia`, `acompanantes`, `confirmacion`, `fecha_registro`, `hora_registro`) VALUES
(5, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Solo con esposa', 0, '2024-08-29', '10:10:16 am'),
(6, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Solo con esposa', 0, '2024-08-29', '10:12:56 am'),
(7, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Con acompañantes e hijos', 0, '2024-08-29', '10:50:25 am'),
(8, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 0, 1, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Con esposa e hijos', 0, '2024-08-29', '10:53:58 am'),
(9, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Con esposa e hijos', 0, '2024-08-29', '10:56:21 am'),
(10, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Con esposa e hijos', 0, '2024-08-29', '10:57:26 am'),
(11, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 0, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Solo', 0, '2024-08-29', '10:59:53 am'),
(12, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 0, 1, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Con esposa e hijos', 0, '2024-08-29', '13:44:24 pm'),
(13, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Solo', 0, '2024-08-29', '01:45:20 pm'),
(14, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 0, 0, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Con esposa e hijos', 0, '2024-08-29', '02:32:12 pm'),
(15, 'Brayan Maldonado Morgado', 27, 'Nazafolina y el polvo', '868345655', 'Misionero', 'brayan@mabac.net', 'Auto propio', '32', '7', 1, 1, 'Iglesia Bautista del Sur de Matamoros', 'Amapolas 34 Colonia Las Flores', 'Solo', 0, '2024-08-29', '02:33:31 pm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_esposas`
--
ALTER TABLE `registro_esposas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_hijos`
--
ALTER TABLE `registro_hijos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_misioneros`
--
ALTER TABLE `registro_misioneros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_esposas`
--
ALTER TABLE `registro_esposas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `registro_hijos`
--
ALTER TABLE `registro_hijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `registro_misioneros`
--
ALTER TABLE `registro_misioneros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
