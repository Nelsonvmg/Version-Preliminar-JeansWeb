-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2023 a las 05:34:27
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Persona` (`_ID_Persona` INT, `_Nombre_Persona` VARCHAR(45), `_Apellido_Paterno` VARCHAR(45), `_Apellido_Materno` VARCHAR(45), `_Tipo_Documento` VARCHAR(45), `_Edad` VARCHAR(45), `_Direccion` VARCHAR(100), `_Usuario` VARCHAR(45), `_Password` VARCHAR(45))   BEGIN  

  

INSERT INTO persona  

(  

    ID_Persona, 

    Nombre_Persona,  

    Apellido_Paterno,  

    Apellido_Materno,  

    Tipo_Documento,  

    Edad,  

    Direccion,  

    Usuario,  

    Password) 

     

    VALUES  

( 

   _ID_Persona,  

   _Nombre_Persona, 

    _Apellido_Paterno, 

    _Apellido_Materno, 

    _Tipo_Documento, 

    _Edad, 

    _Direccion, 

    _Usuario, 

    _Password 

); 

     

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Personas_Mayores_X` (IN `Edad` VARCHAR(45))   BEGIN 

    SET @edad = Edad; 

    SET @query = CONCAT('SELECT * FROM persona WHERE Edad > ', @edad); 

    PREPARE stmt FROM @query; 

    EXECUTE stmt; 

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenista`
--

CREATE TABLE `almacenista` (
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `ID_Catalogo` int(11) NOT NULL,
  `Nombre_Catalogo` varchar(45) NOT NULL,
  `Fecha_Catalogo` datetime NOT NULL,
  `Publicista_Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Persona_ID_Persona`) VALUES
(80119962),
(80764419),
(1000613744),
(1013257025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_producto`
--

CREATE TABLE `color_producto` (
  `ID_Color` int(11) NOT NULL,
  `Descripcion_Color` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(45) NOT NULL,
  `Descripcion_Producto` varchar(200) NOT NULL,
  `Talla_Producto_ID_Talla` int(11) NOT NULL,
  `Color_Producto_ID_Color` int(11) NOT NULL,
  `Linea_Producto_ID_Linea_Producto` int(11) NOT NULL,
  `Cantidad_Producto_Compra` int(11) NOT NULL,
  `Fecha_Producto_Compra` datetime NOT NULL,
  `Forma_Pago_Compra` varchar(45) NOT NULL,
  `Precio_Producto_Compra` decimal(6,3) NOT NULL,
  `Observacion_Compra` varchar(200) DEFAULT NULL,
  `Total_Compra` decimal(6,3) NOT NULL,
  `Almacenista_Persona_ID_Persona` int(11) NOT NULL,
  `Proveedor_Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_devolucion`
--

CREATE TABLE `compra_devolucion` (
  `ID_Devolucion` int(11) NOT NULL,
  `Estado_Devolucion` varchar(45) NOT NULL,
  `Fecha_Ingreso_Devolucion` datetime NOT NULL,
  `Fecha_Salida_Devolucion` varchar(45) NOT NULL,
  `Compra_ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactenos`
--

CREATE TABLE `contactenos` (
  `id` int(11) NOT NULL,
  `tipo_comunicacion` varchar(50) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(50) DEFAULT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_radicacion` datetime DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `respuesta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactenos`
--

INSERT INTO `contactenos` (`id`, `tipo_comunicacion`, `tipo_documento`, `numero_documento`, `razon_social`, `nombres`, `apellidos`, `telefono`, `email`, `mensaje`, `fecha_radicacion`, `estado`, `respuesta`) VALUES
(6, 'Peticion', 'Cedula', '53061225', '', 'Nelly', 'Mendoza', '3107906763', 'nellym@gmail.com', 'Hola solicito la factura de mi compra.', '2023-06-22 03:13:41', 'archivado', 'N/A'),
(8, 'Queja', 'Cedula', '41546338', '', 'Andrea ', 'Garcia', '3217886495', 'andreag@gmail.com', 'Hola aun no he recibido mi pedido.', '2023-06-22 05:30:43', 'radicado', 'Revisa tu correo te enviamos el número de la guia'),
(9, 'Reclamo', 'Cedula', '52070024', '', 'Maria', 'Morales', '3251525525', 'mariam@gmail.com', 'En el pedido de hoy habian tres prendas sin bolsillos ', '2023-06-22 14:20:52', 'respondida', 'Vamos a recoger las prendas'),
(10, 'Felicitación', 'Cedula', '52624013', '', 'Luisa', 'Villamil', '3127654321', 'luisav@gmail.com', 'Me encantaron sus productos', '2023-06-22 14:21:44', 'radicado', 'Gracias'),
(11, 'Sugerencia', 'Cedula', '52214168', '', 'Claudia', 'Saenz', '3212010203', 'claudias@gmail.com', 'Hola me gustaría ver más colores en la siguiente colección.', '2023-06-23 09:23:55', 'radicado', NULL),
(12, 'Reclamo', 'Cedula', '51103987', '', 'María', 'Pérez', '3109876543', 'mariap@gmail.com', 'Recibí un producto equivocado en mi pedido.', '2023-06-23 10:41:13', 'respondida', NULL),
(13, 'Peticion', 'Cedula', '52015876', '', 'Viviana', 'Ortiz', '3154321098', 'vivianao@gmail.com', 'Necesito solicitar un cambio de pantalon', '2023-06-23 10:42:29', 'aceptada', NULL),
(14, 'Peticion', 'Cedula', '42015876', '', 'Laura', 'Ramírez', '3154321098', 'laurar@gmail.com', 'Necesito solicitar un cambio de talla para mi compra.', '2023-06-23 10:42:37', 'radicado', NULL),
(15, 'Queja', 'Cedula', '52781659', '', 'Carolina', 'López', '3208765432', 'carolinal@gmail.com', 'El producto que llegó dañado.', '2023-06-23 10:44:17', 'archivado', NULL),
(16, 'felicitacion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Gracias', '2023-06-30 21:15:12', 'radicado', NULL),
(17, 'felicitacion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Gracias', '2023-06-30 21:19:13', 'radicado', NULL),
(18, 'felicitacion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Gracias', '2023-06-30 21:20:03', 'radicado', NULL),
(19, 'felicitacion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Gracias', '2023-06-30 21:23:06', 'radicado', NULL),
(20, 'felicitacion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Gracias', '2023-06-30 21:26:24', 'radicado', NULL),
(21, 'peticion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Mal', '2023-06-30 21:27:36', 'radicado', NULL),
(22, 'peticion', 'Cedula', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'G', '2023-06-30 21:28:51', 'radicado', NULL),
(23, 'sugerencia', 'NIT', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'Cambio', '2023-06-30 21:29:19', 'radicado', NULL),
(24, 'queja', 'TarjetaIdentidad', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'dfd', '2023-06-30 21:30:04', 'radicado', NULL),
(25, 'queja', 'Pasaporte', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'yt', '2023-06-30 21:31:51', 'radicado', NULL),
(26, 'reclamo', 'TarjetaIdentidad', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'ghdfh', '2023-06-30 21:34:12', 'radicado', NULL),
(27, 'queja', 'Pasaporte', '80119962', '', 'Fabio', 'Urquiza', '3133966943', 'dimetrix1883@hotmail.com', 'sdfgsdfsdf', '2023-06-30 21:34:44', 'radicado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `Email` varchar(45) NOT NULL,
  `Email_2` varchar(45) DEFAULT NULL,
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`Email`, `Email_2`, `Persona_ID_Persona`) VALUES
('dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', 80119962),
('dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', 80764419),
('dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', 1000613744),
('dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', 1013257025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pqrs`
--

CREATE TABLE `estado_pqrs` (
  `Estado_PQRs` varchar(45) NOT NULL,
  `PQRs_ID_PQRs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia`
--

CREATE TABLE `garantia` (
  `ID_Garantia` int(11) NOT NULL,
  `Novedad` varchar(200) DEFAULT NULL,
  `Fecha_Ingreso_Garantia` datetime NOT NULL,
  `Fecha_Salida_Garantia` datetime NOT NULL,
  `Nota_Credito` decimal(6,3) NOT NULL,
  `Orden_venta_ID_Orden_Venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_persona_has_cliente`
--

CREATE TABLE `id_persona_has_cliente` (
  `ID_Persona_ID_Persona` int(11) NOT NULL,
  `Cliente_ID_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `id_persona_has_cliente`
--

INSERT INTO `id_persona_has_cliente` (`ID_Persona_ID_Persona`, `Cliente_ID_Cliente`) VALUES
(80119962, 0),
(80764419, 0),
(1000613744, 0),
(1013257025, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_producto`
--

CREATE TABLE `linea_producto` (
  `ID_Linea_Producto` int(11) NOT NULL,
  `Descripcion_Linea` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_venta`
--

CREATE TABLE `orden_venta` (
  `ID_Orden_Venta` int(11) NOT NULL,
  `Cantidad_Producto_Venta` int(11) NOT NULL,
  `Fecha_Venta` datetime NOT NULL,
  `Forma_Pago_Venta` varchar(45) NOT NULL,
  `Descuento_Venta` int(11) DEFAULT NULL,
  `Observacion_Venta` varchar(100) DEFAULT NULL,
  `Total_Venta` decimal(6,3) NOT NULL,
  `Vendedor_Persona_ID_Persona` int(11) NOT NULL,
  `Cliente_Persona_ID_Persona` int(11) NOT NULL,
  `Producto_Compra_ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID_Persona` int(11) NOT NULL,
  `Nombre_Persona` varchar(45) DEFAULT NULL,
  `Apellido_Paterno` varchar(45) DEFAULT NULL,
  `Apellido_Materno` varchar(45) NOT NULL,
  `Tipo_Documento` varchar(45) NOT NULL,
  `Edad` varchar(45) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_Persona`, `Nombre_Persona`, `Apellido_Paterno`, `Apellido_Materno`, `Tipo_Documento`, `Edad`, `Direccion`, `Usuario`, `Password`) VALUES
(20619385, 'Lilia', 'Murillo', 'Oviedo', 'CC', '68', 'CCll Siempre viva 742', 'Lilia192', '1234'),
(80119962, 'Fabio', 'Urquiza', 'Murillo', 'CC', '40', 'Dg 45 sur #20-36', '80119962', '123'),
(80764419, 'Nelson', 'Medina', 'Gordillo', 'CC', '39', 'Dg 45 sur #20-36', '80764419', '123'),
(1000613744, 'Andres', 'Murillo', 'Oviedo', 'CC', '23', 'Dg 45 sur #20-36', '1000613744', '123'),
(1013257025, 'Eduar', 'Nossa', 'Marciales', 'CC', '19', 'Dg 45 sur #20-36', '1013257025', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_tipo_rol`
--

CREATE TABLE `persona_has_tipo_rol` (
  `Persona_ID_Persona` int(11) NOT NULL,
  `Tipo_Rol_ID_Tipo_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_has_tipo_rol`
--

INSERT INTO `persona_has_tipo_rol` (`Persona_ID_Persona`, `Tipo_Rol_ID_Tipo_Rol`) VALUES
(80119962, 5),
(80764419, 1),
(1000613744, 2),
(1013257025, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrs`
--

CREATE TABLE `pqrs` (
  `ID_PQRs` int(11) NOT NULL,
  `Descripcion PQRs` varchar(45) NOT NULL,
  `Fecha_PQRs` datetime NOT NULL,
  `Tipo_PQRs` varchar(45) NOT NULL,
  `Cliente_Persona_ID_Persona` int(11) NOT NULL,
  `Administrador_Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Compra_ID_Producto` int(11) NOT NULL,
  `Cantidad_Existencia` int(11) NOT NULL,
  `Precio_Producto_Minorista` decimal(6,3) NOT NULL,
  `Precio_Producto_Venta_Mayorista` decimal(6,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `ID_Promocion` int(11) NOT NULL,
  `Nombre_Promocion` varchar(45) NOT NULL,
  `Fecha_Promocion` date NOT NULL,
  `Catalogos_ID_Catalogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_has_cliente`
--

CREATE TABLE `promocion_has_cliente` (
  `Promocion_ID_Promocion` int(11) NOT NULL,
  `Cliente_Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_has_compras`
--

CREATE TABLE `proveedor_has_compras` (
  `Proveedor_ID_Proveedor` int(11) NOT NULL,
  `Compras_ID_Producto_Compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicista`
--

CREATE TABLE `publicista` (
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('C.C.', '1000613744', 'Andres', 'Murillo', 'Oviedo', 23, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', '3133966943', '6017602559', 'Cliente', '1000613744', '123', 'Activo'),
('C.C.', '1013257025', 'Eduar', 'Nossa', 'Marciales', 19, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', '3133966943', '6017602559', 'Almacenista', '1013257025', '123', 'Activo'),
('C.C.', '53040241', 'Juliana', 'Duque', 'Aristizabal', 25, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', '3133966943', '6017602559', 'Proveedor', '53040241', '123', 'Activo'),
('C.C.', '80119962', 'Fabio', 'Urquiza', 'Murillo', 40, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', '3133966943', '6017602559', 'Gerente', '80119962', '123', 'Inactivo'),
('C.C.', '80764419', 'Nelson', 'Medina', 'Gordillo', 39, 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 'dimetrix1883@hotmail.com', '3133966943', '6017602559', 'Administrador', '80764419', '123', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_compra`
--

CREATE TABLE `reporte_compra` (
  `ID_Reporte_Compra` int(11) NOT NULL,
  `Compra_ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_venta`
--

CREATE TABLE `reporte_venta` (
  `ID_Reporte_Venta` int(11) NOT NULL,
  `Orden_venta_ID_Orden_Venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Chaquetas', 'Temporada', 'XS', 'Azul', 'linea_juvenil', 10, '2023-06-30', 1.00, 2.00, 'Textil S.A', '3133966943', 'Dg 45 sur #20-36', 'Inactivo'),
(2, 'Jeans', 'Temporada', 'M', 'Negro', 'linea_femenina', 5, '2023-06-30', 1.00, 2.00, 'Textil S.A', '3133966943', 'Dg 45 sur #20-36', 'Activo'),
(3, 'Blusa', 'Temporada', 'XL', 'Varios', 'linea_femenina', 15, '2023-06-30', 1.00, 2.00, 'Textil S.A', '3133966943', 'Dg 45 sur #20-36', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_producto`
--

CREATE TABLE `talla_producto` (
  `ID_Talla` int(11) NOT NULL,
  `Descripcion_Talla` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `Telefono_celular` varchar(15) NOT NULL,
  `Telefono_celular_2` varchar(15) DEFAULT NULL,
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`Telefono_celular`, `Telefono_celular_2`, `Persona_ID_Persona`) VALUES
('3133966943', '6017602559', 80119962),
('3133966943', '6017602559', 80764419),
('3133966943', '6017602559', 1000613744),
('3133966943', '6017602559', 1013257025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_rol`
--

CREATE TABLE `tipo_rol` (
  `ID_Tipo_Rol` int(11) NOT NULL,
  `Tipo_Rol` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_rol`
--

INSERT INTO `tipo_rol` (`ID_Tipo_Rol`, `Tipo_Rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Vendedor'),
(4, 'Almacenista'),
(5, 'Gerente'),
(6, 'Publicista'),
(7, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `Persona_ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `telefono_celular` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `talla_producto` varchar(50) NOT NULL,
  `color_producto` varchar(50) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Activo',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `numero_documento`, `nombres`, `apellido_paterno`, `telefono_celular`, `direccion`, `email`, `id_producto`, `nombre_producto`, `talla_producto`, `color_producto`, `cantidad_producto`, `precio_venta`, `valor_total`, `estado`, `fecha_registro`) VALUES
(2, '53040241', 'Juliana', 'Duque', '3133966943', 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 1, 'Chaquetas', 'XS', 'Azul', 10, 1.00, 20.00, 'Activo', '2023-07-01 03:28:02'),
(3, '80119962', 'Fabio', 'Urquiza', '3133966943', 'Dg 45 sur #20-36', 'dimetrix1883@hotmail.com', 2, 'Jeans', 'M', 'Negro', 5, 1.00, 4.00, 'Activo', '2023-07-01 03:28:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Administrador_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Almacenista_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`ID_Catalogo`),
  ADD UNIQUE KEY `ID_Catalogo_UNIQUE` (`ID_Catalogo`),
  ADD KEY `fk_Catalogos_Publicista1_idx` (`Publicista_Persona_ID_Persona`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Cliente_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD PRIMARY KEY (`ID_Color`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `fk_Compras_Almacenista1_idx` (`Almacenista_Persona_ID_Persona`),
  ADD KEY `fk_Compras_Proveedor1_idx` (`Proveedor_Persona_ID_Persona`),
  ADD KEY `fk_Compra_Color_Producto1_idx` (`Color_Producto_ID_Color`),
  ADD KEY `fk_Compra_Talla_Producto1_idx` (`Talla_Producto_ID_Talla`),
  ADD KEY `fk_Compra_Linea_Producto1_idx` (`Linea_Producto_ID_Linea_Producto`);

--
-- Indices de la tabla `compra_devolucion`
--
ALTER TABLE `compra_devolucion`
  ADD PRIMARY KEY (`ID_Devolucion`),
  ADD KEY `fk_Compras_devoluciones_Compra1_idx` (`Compra_ID_Producto`);

--
-- Indices de la tabla `contactenos`
--
ALTER TABLE `contactenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`Persona_ID_Persona`) USING BTREE,
  ADD KEY `fk_Correo_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `estado_pqrs`
--
ALTER TABLE `estado_pqrs`
  ADD PRIMARY KEY (`PQRs_ID_PQRs`),
  ADD UNIQUE KEY `Estado_PQRs_UNIQUE` (`Estado_PQRs`);

--
-- Indices de la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`ID_Garantia`),
  ADD UNIQUE KEY `ID_garantia_UNIQUE` (`ID_Garantia`),
  ADD KEY `fk_Garantia_Orden_venta1_idx` (`Orden_venta_ID_Orden_Venta`);

--
-- Indices de la tabla `id_persona_has_cliente`
--
ALTER TABLE `id_persona_has_cliente`
  ADD PRIMARY KEY (`ID_Persona_ID_Persona`) USING BTREE,
  ADD KEY `ID_Persona_ID_Persona` (`ID_Persona_ID_Persona`,`Cliente_ID_Cliente`) USING BTREE;

--
-- Indices de la tabla `linea_producto`
--
ALTER TABLE `linea_producto`
  ADD PRIMARY KEY (`ID_Linea_Producto`);

--
-- Indices de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  ADD PRIMARY KEY (`ID_Orden_Venta`),
  ADD UNIQUE KEY `ID_orden_de_venta_UNIQUE` (`ID_Orden_Venta`),
  ADD KEY `fk_Orden_ventas_Vendedor1_idx` (`Vendedor_Persona_ID_Persona`),
  ADD KEY `fk_Orden_ventas_Cliente1_idx` (`Cliente_Persona_ID_Persona`),
  ADD KEY `fk_Orden_venta_Producto1_idx` (`Producto_Compra_ID_Producto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID_Persona`),
  ADD UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  ADD UNIQUE KEY `ID_Persona_UNIQUE` (`ID_Persona`);

--
-- Indices de la tabla `persona_has_tipo_rol`
--
ALTER TABLE `persona_has_tipo_rol`
  ADD PRIMARY KEY (`Persona_ID_Persona`,`Tipo_Rol_ID_Tipo_Rol`),
  ADD KEY `fk_Persona_has_Tipo_Rol_Tipo_Rol1_idx` (`Tipo_Rol_ID_Tipo_Rol`),
  ADD KEY `fk_Persona_has_Tipo_Rol_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD PRIMARY KEY (`ID_PQRs`),
  ADD UNIQUE KEY `ID_PQRs_UNIQUE` (`ID_PQRs`),
  ADD KEY `fk_PQRs_Cliente1_idx` (`Cliente_Persona_ID_Persona`),
  ADD KEY `fk_PQRs_Administrador1_idx` (`Administrador_Persona_ID_Persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD KEY `fk_Producto_Compra1_idx` (`Compra_ID_Producto`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`ID_Promocion`),
  ADD UNIQUE KEY `ID_Promociones_UNIQUE` (`ID_Promocion`),
  ADD KEY `fk_Promocion_Catalogos1_idx` (`Catalogos_ID_Catalogo`);

--
-- Indices de la tabla `promocion_has_cliente`
--
ALTER TABLE `promocion_has_cliente`
  ADD PRIMARY KEY (`Promocion_ID_Promocion`,`Cliente_Persona_ID_Persona`),
  ADD KEY `fk_Promocion_has_Cliente_Cliente1_idx` (`Cliente_Persona_ID_Persona`),
  ADD KEY `fk_Promocion_has_Cliente_Promocion1_idx` (`Promocion_ID_Promocion`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Proveedor_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `proveedor_has_compras`
--
ALTER TABLE `proveedor_has_compras`
  ADD PRIMARY KEY (`Proveedor_ID_Proveedor`,`Compras_ID_Producto_Compra`),
  ADD KEY `fk_Proveedor_has_Compras_Compras1_idx` (`Compras_ID_Producto_Compra`);

--
-- Indices de la tabla `publicista`
--
ALTER TABLE `publicista`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Publicista_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `registrousuarios`
--
ALTER TABLE `registrousuarios`
  ADD PRIMARY KEY (`Numero_Documento`);

--
-- Indices de la tabla `reporte_compra`
--
ALTER TABLE `reporte_compra`
  ADD PRIMARY KEY (`ID_Reporte_Compra`),
  ADD KEY `fk_Reporte_Compras_Compra1_idx` (`Compra_ID_Producto`);

--
-- Indices de la tabla `reporte_venta`
--
ALTER TABLE `reporte_venta`
  ADD PRIMARY KEY (`ID_Reporte_Venta`),
  ADD UNIQUE KEY `ID_Reporte_Ventas_UNIQUE` (`ID_Reporte_Venta`),
  ADD KEY `fk_Reporte_Ventas_Orden_venta1_idx` (`Orden_venta_ID_Orden_Venta`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD PRIMARY KEY (`ID_Talla`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Telefono_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `tipo_rol`
--
ALTER TABLE `tipo_rol`
  ADD PRIMARY KEY (`ID_Tipo_Rol`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`Persona_ID_Persona`),
  ADD KEY `fk_Vendedor_Persona1_idx` (`Persona_ID_Persona`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `ID_Catalogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  MODIFY `ID_Color` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_devolucion`
--
ALTER TABLE `compra_devolucion`
  MODIFY `ID_Devolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactenos`
--
ALTER TABLE `contactenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `garantia`
--
ALTER TABLE `garantia`
  MODIFY `ID_Garantia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linea_producto`
--
ALTER TABLE `linea_producto`
  MODIFY `ID_Linea_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  MODIFY `ID_Orden_Venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  MODIFY `ID_PQRs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `ID_Promocion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_compra`
--
ALTER TABLE `reporte_compra`
  MODIFY `ID_Reporte_Compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_venta`
--
ALTER TABLE `reporte_venta`
  MODIFY `ID_Reporte_Venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  MODIFY `ID_Talla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `almacenista`
--
ALTER TABLE `almacenista`
  ADD CONSTRAINT `fk_Almacenista_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD CONSTRAINT `fk_Catalogos_Publicista1` FOREIGN KEY (`Publicista_Persona_ID_Persona`) REFERENCES `publicista` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Cliente_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_Compra_Color_Producto1` FOREIGN KEY (`Color_Producto_ID_Color`) REFERENCES `color_producto` (`ID_Color`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compra_Linea_Producto1` FOREIGN KEY (`Linea_Producto_ID_Linea_Producto`) REFERENCES `linea_producto` (`ID_Linea_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compra_Talla_Producto1` FOREIGN KEY (`Talla_Producto_ID_Talla`) REFERENCES `talla_producto` (`ID_Talla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compras_Almacenista1` FOREIGN KEY (`Almacenista_Persona_ID_Persona`) REFERENCES `almacenista` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compras_Proveedor1` FOREIGN KEY (`Proveedor_Persona_ID_Persona`) REFERENCES `proveedor` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_devolucion`
--
ALTER TABLE `compra_devolucion`
  ADD CONSTRAINT `fk_Compras_devoluciones_Compra1` FOREIGN KEY (`Compra_ID_Producto`) REFERENCES `compra` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `correo`
--
ALTER TABLE `correo`
  ADD CONSTRAINT `fk_Correo_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estado_pqrs`
--
ALTER TABLE `estado_pqrs`
  ADD CONSTRAINT `fk_Estado PQRs_PQRs1` FOREIGN KEY (`PQRs_ID_PQRs`) REFERENCES `pqrs` (`ID_PQRs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD CONSTRAINT `fk_Garantia_Orden_venta1` FOREIGN KEY (`Orden_venta_ID_Orden_Venta`) REFERENCES `orden_venta` (`ID_Orden_Venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `id_persona_has_cliente`
--
ALTER TABLE `id_persona_has_cliente`
  ADD CONSTRAINT `fk_ID_Persona_has_Cliente_ID_Persona` FOREIGN KEY (`ID_Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  ADD CONSTRAINT `fk_Orden_venta_Producto1` FOREIGN KEY (`Producto_Compra_ID_Producto`) REFERENCES `producto` (`Compra_ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Orden_ventas_Cliente1` FOREIGN KEY (`Cliente_Persona_ID_Persona`) REFERENCES `cliente` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Orden_ventas_Vendedor1` FOREIGN KEY (`Vendedor_Persona_ID_Persona`) REFERENCES `vendedor` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_has_tipo_rol`
--
ALTER TABLE `persona_has_tipo_rol`
  ADD CONSTRAINT `fk_Persona_has_Tipo_Rol_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_has_Tipo_Rol_Tipo_Rol1` FOREIGN KEY (`Tipo_Rol_ID_Tipo_Rol`) REFERENCES `tipo_rol` (`ID_Tipo_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD CONSTRAINT `fk_PQRs_Administrador1` FOREIGN KEY (`Administrador_Persona_ID_Persona`) REFERENCES `administrador` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PQRs_Cliente1` FOREIGN KEY (`Cliente_Persona_ID_Persona`) REFERENCES `cliente` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Compra1` FOREIGN KEY (`Compra_ID_Producto`) REFERENCES `compra` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `fk_Promocion_Catalogos1` FOREIGN KEY (`Catalogos_ID_Catalogo`) REFERENCES `catalogo` (`ID_Catalogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promocion_has_cliente`
--
ALTER TABLE `promocion_has_cliente`
  ADD CONSTRAINT `fk_Promocion_has_Cliente_Cliente1` FOREIGN KEY (`Cliente_Persona_ID_Persona`) REFERENCES `cliente` (`Persona_ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Promocion_has_Cliente_Promocion1` FOREIGN KEY (`Promocion_ID_Promocion`) REFERENCES `promocion` (`ID_Promocion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_Proveedor_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor_has_compras`
--
ALTER TABLE `proveedor_has_compras`
  ADD CONSTRAINT `fk_Proveedor_has_Compras_Compras1` FOREIGN KEY (`Compras_ID_Producto_Compra`) REFERENCES `compra` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicista`
--
ALTER TABLE `publicista`
  ADD CONSTRAINT `fk_Publicista_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reporte_compra`
--
ALTER TABLE `reporte_compra`
  ADD CONSTRAINT `fk_Reporte_Compras_Compra1` FOREIGN KEY (`Compra_ID_Producto`) REFERENCES `compra` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reporte_venta`
--
ALTER TABLE `reporte_venta`
  ADD CONSTRAINT `fk_Reporte_Ventas_Orden_venta1` FOREIGN KEY (`Orden_venta_ID_Orden_Venta`) REFERENCES `orden_venta` (`ID_Orden_Venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `fk_Telefono_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `fk_Vendedor_Persona1` FOREIGN KEY (`Persona_ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
