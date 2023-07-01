-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2023 a las 03:56:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_jeansweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrousuarios`
--

CREATE TABLE `registrousuarios` (
  `Tipo_Documento` varchar(50) NOT NULL,
  `Numero_Documento` varchar(50) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_Paterno` varchar(50) NOT NULL,
  `Apellido_Materno` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Email_1` varchar(100) NOT NULL,
  `Email_2` varchar(100) NOT NULL,
  `Telefono_Celular_1` varchar(20) NOT NULL,
  `Telefono_Celular_2` varchar(20) NOT NULL,
  `Tipo_Rol` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registrousuarios`
--

INSERT INTO `registrousuarios` (`Tipo_Documento`, `Numero_Documento`, `Nombres`, `Apellido_Paterno`, `Apellido_Materno`, `Edad`, `Direccion`, `Email_1`, `Email_2`, `Telefono_Celular_1`, `Telefono_Celular_2`, `Tipo_Rol`, `Usuario`, `Contraseña`, `Estado`) VALUES
('C.C.', '0', 'Mostrador', 'Mostrador', 'Mostrador', 0, 'Mostrador', 'mostrador@hotmail.com', 'mostrador@hotmail.com', 'Mostrador', '00000000', 'Cliente', '00000000', '1', 'Activo'),
('C.C.', '53040241', 'Juliana', 'Duque', 'Aristizabal', 37, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'julianaduque39@hotmail.com', '3133966943', '6017602559', 'Cliente', '80119962', '123', 'Inactivo'),
('C.C. Extranjera', '80119962', 'Fabio', 'Urquiza', 'Murillo', 20, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'julianaduque39@hotmail.com', '3133966943', '6017602559', 'Proveedor', '80119962', '123', 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registrousuarios`
--
ALTER TABLE `registrousuarios`
  ADD PRIMARY KEY (`Numero_Documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
