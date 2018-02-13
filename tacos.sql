-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2018 a las 04:54:07
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarOrden` (IN `_idOrden` INT, IN `_cantidad` INT, IN `_IDplato` INT, IN `_IDFactura` INT)  BEGIN
    DECLARE _subtotal INT;
    DECLARE _precio INT;
 
    SELECT precio  INTO _precio FROM menu WHERE id = _IDplato;
    SET _subtotal = _precio * _cantidad;

    UPDATE orden SET cantidad = _cantidad, idPlato = _IDplato, idFactura = _IDFactura , subtotal = _subtotal WHERE id = _idOrden;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `descripcionFactura` (IN `_IDFactura` INT)  BEGIN

    SELECT orden.cantidad, menu.plato, menu.precio, orden.subtotal
    FROM orden, menu
    WHERE orden.idFactura = _IDFactura AND  orden.idPlato = menu.id;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `encabezado` (IN `_IDFactura` INT)  BEGIN

    SELECT factura.id, cliente.nombre, cliente.apellido, cliente.nit, factura.created_at
    FROM factura, cliente
    WHERE factura.idCliente = cliente.id AND  factura.id = _IDFactura;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevaOrden` (IN `_cantidad` INT, IN `_IDplato` INT, IN `_IDFactura` INT)  BEGIN
    DECLARE _subtotal INT;
    DECLARE _precio INT;
 
    SELECT precio  INTO _precio FROM menu WHERE id = _IDplato;
    SET _subtotal = _precio * _cantidad;

    INSERT INTO orden(cantidad, idPlato, idFactura , subtotal) VALUES (_cantidad,_IDplato,_IDFactura,_subtotal);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pagarFactura` (IN `_IDFactura` INT)  BEGIN
    UPDATE factura
    SET cancelado = 'false'
    WHERE id = _IDFactura; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `total` (IN `_IDFactura` INT)  BEGIN

 
    SELECT SUM(subtotal)  as total FROM orden WHERE idFactura = _IDFactura;

    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verFacturas` ()  BEGIN
    SELECT factura.id as NoFactura, cliente.id as CodCliente, cliente.nombre, cliente.apellido, cliente.nit, factura.created_at
    FROM factura, cliente
    WHERE factura.idCliente = cliente.id AND factura.cancelado = 'true' 
    ORDER BY factura.id DESC;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verFacturasPagadas` ()  BEGIN
    SELECT factura.id as NoFactura, cliente.id as CodCliente, cliente.nombre, cliente.apellido, cliente.nit, factura.created_at
    FROM factura, cliente
    WHERE factura.idCliente = cliente.id AND factura.cancelado = 'false';  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrden` (IN `_IDORden` INT)  BEGIN

    SELECT orden.cantidad, menu.plato, menu.precio, orden.subtotal
    FROM orden, menu
    WHERE orden.id = _IDOrden;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenes` ()  BEGIN
    SELECT orden.id, orden.cantidad, menu.plato, menu.precio, orden.subtotal, orden.idFactura
    FROM orden, menu, factura
    WHERE orden.idPlato = menu.id AND orden.idFactura = factura.id AND factura.cancelado = 'true' 
    ORDER BY orden.id DESC;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nit`, `nombre`, `apellido`, `direccion`, `telefono`, `created_at`, `updated_at`) VALUES
(1, '154789-8', 'Diego', 'Méndez', 'su casa', 54785895, '2018-02-09 06:16:04', '2018-02-09 06:16:04'),
(2, '12345678', 'Johana', 'Mendez', 'Donde Vive', 45789858, '2018-02-09 06:17:34', '2018-02-09 06:35:12'),
(3, '145874', 'Mario', 'Bross', 'Cuidad Champiñon', 45789854, '2018-02-09 08:04:42', '2018-02-09 08:04:42'),
(4, 'C/F', 'Luigi', 'Bross', 'Cuidad Champiñon', 45879585, '2018-02-13 07:13:25', '2018-02-13 07:13:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCliente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cancelado` enum('false','true') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `idCliente`, `created_at`, `updated_at`, `cancelado`) VALUES
(1, 1, '2018-02-09 08:01:18', '2018-02-09 08:01:18', 'false'),
(4, 2, '2018-02-11 23:12:24', '2018-02-11 23:12:24', 'false'),
(9, 1, '2018-02-12 01:04:08', '2018-02-12 01:04:08', 'false'),
(10, 4, '2018-02-13 07:14:51', '2018-02-13 07:14:51', 'false'),
(11, 3, '2018-02-13 07:20:18', '2018-02-13 07:20:18', 'false'),
(12, 1, '2018-02-13 08:53:38', '2018-02-13 08:53:38', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `plato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `plato`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES
(1, 'Tacontento', 'Un taco con mucha actitud y alegria', 15.00, '2018-02-08 09:22:48', '2018-02-08 09:40:18'),
(2, 'Tacos mixtos', 'Tortilla suave con carne de res, pollo y cerdo', 20.00, '2018-02-12 01:59:19', '2018-02-12 01:59:19'),
(3, 'Gringa shuca', 'Tortilla suave con carne de cerdo y queso blanco', 20.00, '2018-02-13 05:53:32', '2018-02-13 05:53:32'),
(4, 'El duro', 'Tortilla dura con carne de cerdo, lechuga y una capa de queso por encima', 18.00, '2018-02-13 06:54:48', '2018-02-13 07:37:40'),
(7, 'Tacos de Pollo', 'Tortillas suaves con carne de pollo', 18.00, '2018-02-13 07:11:41', '2018-02-13 08:23:32');

--
-- Disparadores `menu`
--
DELIMITER $$
CREATE TRIGGER `validarPrecio` BEFORE INSERT ON `menu` FOR EACH ROW BEGIN
           IF NEW.precio <= 0 THEN
               SET NEW.precio = 15;
           END IF;
       END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validarPrecio2` BEFORE UPDATE ON `menu` FOR EACH ROW BEGIN
           IF NEW.precio <= 0 THEN
               SET NEW.precio = 15;
           END IF;
       END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_07_233303_create_post_table', 1),
(2, '2018_02_08_025243_create_menu_table', 2),
(3, '2018_02_08_234436_create_cliente_table', 3),
(5, '2018_02_09_013235_create_factura_table', 4),
(7, '2018_02_09_022134_create_orden_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idPlato` int(11) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `cantidad`, `idFactura`, `idPlato`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 90.00, NULL, NULL),
(4, 5, 1, 1, 75.00, NULL, NULL),
(5, 1, 2, 1, 15.00, NULL, NULL),
(9, 5, 9, 1, 75.00, NULL, NULL),
(10, 10, 10, 7, 150.00, NULL, NULL),
(11, 2, 10, 4, 36.00, NULL, NULL),
(12, 5, 11, 2, 100.00, NULL, NULL),
(13, 4, 11, 6, 64.00, NULL, NULL),
(14, 2, 11, 3, 40.00, NULL, NULL);

--
-- Disparadores `orden`
--
DELIMITER $$
CREATE TRIGGER `validarCantidad` BEFORE INSERT ON `orden` FOR EACH ROW BEGIN
           IF NEW.cantidad <= 0 THEN
               SET NEW.cantidad = 1;
           END IF;
       END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validarCantidad2` BEFORE UPDATE ON `orden` FOR EACH ROW BEGIN
           IF NEW.cantidad <= 0 THEN
               SET NEW.cantidad = 1;
           END IF;
       END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'My First Post', 'My body of the first post', '2018-02-07 06:00:00', '2018-02-07 06:00:00'),
(2, 'Next title', 'Nesxt Body', '2018-02-08 07:38:34', '2018-02-08 07:38:34'),
(3, 'Next title 3', 'Next Body 3', '2018-02-08 07:39:57', '2018-02-08 07:39:57'),
(6, 'hola bato', 'que ace k', '2018-02-08 07:41:30', '2018-02-08 09:47:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diego Méndez', 'diego.mz.rv@gmail.com', '$2y$10$GSjh8B9Jzv9qlL0Yg0qgcOZeVN9XShZ3ct4lIrZImfMo6E1HUw6fS', '51suhprlpINFWRwnGvfqgUmi2nRSQCYgVHznuFTobvHYO3ithsfJkpMDeDnz', '2018-02-13 08:33:46', '2018-02-13 08:33:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
