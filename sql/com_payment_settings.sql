-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2019 a las 00:27:23
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `astra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_payment_settings`
--

CREATE TABLE `com_payment_settings` (
  `id_setting` bigint(20) NOT NULL,
  `email_notifications` text,
  `email_paypal_account` text,
  `conekta_private_key` text,
  `conekta_public_key` text,
  `conekta_oxxopay_expires` int(11) NOT NULL DEFAULT '5',
  `currency` text NOT NULL,
  `extra_charge` int(11) DEFAULT NULL,
  `sandbox` set('1','0') NOT NULL DEFAULT '0',
  `debug` set('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `com_payment_settings`
--

INSERT INTO `com_payment_settings` (`id_setting`, `email_notifications`, `email_paypal_account`, `conekta_private_key`, `conekta_public_key`, `conekta_oxxopay_expires`, `currency`, `extra_charge`, `sandbox`, `debug`) VALUES
(1, 'paypal@astracancun.com', 'paypal@astracancun.com', NULL, NULL, 0, 'MXN', NULL, '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `com_payment_settings`
--
ALTER TABLE `com_payment_settings`
  ADD PRIMARY KEY (`id_setting`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `com_payment_settings`
--
ALTER TABLE `com_payment_settings`
  MODIFY `id_setting` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
