-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2020 a las 18:10:21
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quickfoodfp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(5,2) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id`, `nombre`, `precio`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Hamburguesa con queso', 7.50, 'Hamburguesa de ternera con queso fundido.', NULL, '2020-12-07 22:46:28'),
(2, 'Hamburguesa de pollo con doble de queso', 6.10, 'Hamburguesa de carne de pollo con doble de queso en su interior.', NULL, '2020-12-07 18:19:54'),
(3, 'Hamburguesa vegana', 7.50, 'Hamburguesa vegana apta para veganos', NULL, '2020-11-10 21:54:08'),
(4, 'Hamburguesa doble', 10.00, 'Hamburguesa de ternera con doble de carne y una capa de queso fundido', NULL, NULL),
(5, 'Perrito caliente', 21.00, 'Perrito caliente con un sabor delicado', NULL, '2020-12-04 12:27:50'),
(6, 'Sandwich de queso', 1.50, 'Estupendo sandwich de queso y jamón que se derretirá en tu boca', NULL, NULL),
(7, 'Nuggets', 5.50, 'Bandeja de 8 nuggets de pollo', NULL, '2020-11-26 20:34:48'),
(8, 'Alitas de pollo', 3.85, 'Bandeja de 10 alitas de pollo', NULL, '2020-11-10 21:04:59'),
(9, 'Patatas fritas', 1.00, 'Ración pequeña de patatas fritas', NULL, NULL),
(10, 'Patatas fritas a lo grande', 3.00, 'Ración grande de patatas fritas', NULL, NULL),
(11, 'Ensalada de maiz', 1.30, 'Ensalada con trozos de maíz', '2020-11-25 20:55:32', '2020-11-25 20:55:32'),
(13, 'Pizza 4 quesos', 6.00, 'Deliciosa pizza con 4 tipos de quesos', '2020-12-08 15:43:39', '2020-12-08 15:43:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido1`, `apellido2`, `DNI`, `telefono`, `email`, `password`, `api_token`, `ciudad`, `perfil`, `avatar`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'lorena', 'moyano', 'montes', '26967986B', '622742442', 'lore_mary@hotmail.es', '$2y$10$kbdcsIqXrECSO8UPWz12iO2evNWpNhKYVtWmXGofKxJV1P8RsI3m.', '4d5775d2aba636e6069942311def3ffe', 'cabra', 'repartidor', '1607445780banner.jpg', '2020-09-21 18:37:33', '2020-12-08 15:43:00', 'NI094BSleX5vN82jGME6JSwfZCJ5T6Yk0DtN0Mng7tsfdmR86CDyjoYToIwJ'),
(2, 'Oscar', 'Granados', 'Ariza', '12345678A', '123456788', 'oscar@gmail.com', '$2y$10$hCo/mo1fRBkRnpoLI6aEp.vwGJwZNrNw1h2DgXRQhjLRdfqN6TZhi', '	 4d5775d2aba636e6069942311def3fl2', 'Iznájar', 'user', '1607354560burguer.jpg', '2020-09-21 19:54:01', '2020-12-07 14:41:46', NULL),
(3, 'Lorena', 'Moyano', 'Montes', '26967986A', '722742440', 'lorenamoyanomontes1991@gmail.com', '$2y$10$aF2aZv2BgzIxoQ5qlVmhl.AVU0mykAHM3fYUXarVsW8xKNU7TnURu', '4d5775d2aba636e6069942311def3fk3', 'Cabra', 'admin', '1607425070background2.jpg', '2020-10-04 08:43:01', '2020-12-08 08:57:50', NULL),
(4, 'lorena', 'lorena', 'lorena', '26967980N', '112233885', 'prueba@gmail.com', '$2y$10$dxiYp7yLfN0Rj/iW0WewVO12iVCbi8FaAhUUeZLLrXW04nMm/9Kp.', '7a5e2b8d8b05dd71a961ce2f0d116cfe0993ks', 'cabra', 'user', '', '2020-11-29 13:57:45', '2020-11-29 13:57:45', NULL),
(6, 'Admin', 'Admin', 'Admin', '45962642B', '699123888', 'admin@admin.com', '$2y$10$kKxW4ZD/GGEoC7zBxh5RpOXzvgM3MgE.dDNq6cPFT9WeOQhsu6uZK', 'EstoEsUnaApidePrueba', 'Málaga', 'admin', NULL, '2020-12-08 15:50:06', '2020-12-08 15:50:06', NULL),
(7, 'Araceli', 'Montes', 'Montes', '34203587A', '678125655', 'araceli@gmail.com', '$2y$10$u2LpFSTuPfaD9rPPTJaJUOBQ/cp.pF/WOSnm8mJojALE33R3vYagy', '7a5e2b8d8b05dd71a961ce2f0d116cfe09ab74e1', 'Córdoba', 'user', NULL, '2020-12-08 15:55:40', '2020-12-08 15:55:40', NULL),
(8, 'Antonio', 'Moral', 'Moral', '75846952B', '688952123', 'antonio@gmail.com', '$2y$10$c4F2C0YITd7cXoyIDuuPYezt3N5oxAzGkEwabPh88bk6ehoQzxXzi', '2617f7ab994279239f78a463918041ff0aecccf1', 'Córdoba', 'user', '1607446811background.jpg', '2020-12-08 15:58:44', '2020-12-08 16:00:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idClien` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repartido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `idClien`, `direccion`, `repartido`, `created_at`, `updated_at`) VALUES
(1, 2, 'Calle Antequera', 1, '2020-12-08 15:22:57', '2020-12-08 15:22:57'),
(2, 2, 'Calle Antequera', 1, '2020-12-07 15:22:57', '2020-12-07 15:22:57'),
(3, 2, 'Coín', 1, '2020-12-08 15:41:57', '2020-12-08 15:41:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_12_08_160009_create_cliente_table', 1),
(2, '2020_12_08_160022_create_comprar_table', 1),
(3, '2020_12_08_160036_create_carta_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idCar` int(10) UNSIGNED NOT NULL,
  `pago` tinyint(1) NOT NULL DEFAULT 0,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `idCliente`, `idCar`, `pago`, `cantidad`, `fecha`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 3, '2020-12-08', '2020-12-08 15:21:51', '2020-12-08 15:22:11'),
(3, 2, 1, 1, 1, '2020-12-08', '2020-12-08 15:22:07', '2020-12-08 15:22:07'),
(4, 2, 5, 1, 2, '2020-12-08', '2020-12-08 15:41:32', '2020-12-08 15:41:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cliente_dni_unique` (`DNI`),
  ADD UNIQUE KEY `cliente_telefono_unique` (`telefono`),
  ADD UNIQUE KEY `cliente_email_unique` (`email`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_idclien_foreign` (`idClien`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_idcliente_foreign` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_idclien_foreign` FOREIGN KEY (`idClien`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_idcliente_foreign` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
