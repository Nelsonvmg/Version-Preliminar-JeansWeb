-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2023 a las 06:10:16
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
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `talla_producto` varchar(50) NOT NULL,
  `color_producto` varchar(50) NOT NULL,
  `linea_producto` varchar(50) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_producto`, `nombre_producto`, `descripcion_producto`, `talla_producto`, `color_producto`, `linea_producto`, `cantidad_producto`, `fecha_compra`, `precio_compra`, `precio_venta`, `proveedor`, `telefono`, `direccion`, `Estado`) VALUES
(2023, 'Chaquetas', '', 'custom', 'Azul', 'linea_infantil', 5, '2023-06-26', 20000.00, 50000.00, 'Fabio', '3133966943', 'Dg 45 sur #20-36', 'Inactivo'),
(2024, 'Jeans', 'Ochenteros', 'M', 'Negro', 'linea_juvenil', 5, '2023-06-27', 20000.00, 50000.00, 'Juliana', '3133966943', 'Dg 45 sur #20-36', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
