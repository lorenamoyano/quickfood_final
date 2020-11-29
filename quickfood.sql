-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 13:07:35
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
-- Base de datos: `quickfood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergenos`
--

CREATE TABLE `alergenos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alergenos`
--

INSERT INTO `alergenos` (`id`, `nombre`) VALUES
(1, 'Cereales con gluten'),
(2, 'Frutos de cáscara'),
(3, 'Crustáceos'),
(4, 'Apio'),
(5, 'Huevos'),
(6, 'Mostaza'),
(7, 'Pescado'),
(8, 'Granos de sésamo'),
(9, 'Cacahuetes'),
(10, 'Sulfitos / Dióxido de azufre'),
(11, 'Soja'),
(12, 'Altramuces'),
(13, 'Leche'),
(14, 'Moluscos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergenos_carta`
--

CREATE TABLE `alergenos_carta` (
  `id` int(11) NOT NULL,
  `idAlergeno` int(11) NOT NULL,
  `idCarta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` float(5,2) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Hamburguesa con quesooo', 7.02, 'Hamburguesa de ternera con queso fundido.', NULL, NULL, '2020-11-25 22:05:47'),
(2, 'Hamburguesa de pollo con doble de queso', 6.00, 'Hamburguesa de carne de pollo con doble de queso en su interior.', NULL, NULL, NULL),
(3, 'Hamburguesa vegana', 7.50, 'Hamburguesa vegana apta para veganos', NULL, NULL, '2020-11-10 22:54:08'),
(4, 'Hamburguesa doble', 10.00, 'Hamburguesa de ternera con doble de carne y una capa de queso fundido', NULL, NULL, NULL),
(5, 'Perrito caliente', 2.00, 'Perrito caliente con un sabor delicado', NULL, NULL, NULL),
(6, 'Sandwich de queso', 1.50, 'Estupendo sandwich de queso y jamón que se derretirá en tu boca', NULL, NULL, NULL),
(7, 'Nuggets', 5.00, 'Bandeja de 8 nuggets de pollo', NULL, NULL, '2020-11-10 22:00:03'),
(8, 'Alitas de pollo', 3.85, 'Bandeja de 10 alitas de pollo', NULL, NULL, '2020-11-10 22:04:59'),
(9, 'Patatas fritas', 1.00, 'Ración pequeña de patatas fritas', NULL, NULL, NULL),
(10, 'Patatas fritas a lo grande', 3.00, 'Ración grande de patatas fritas', NULL, NULL, NULL),
(11, 'Refresco', 1.00, 'Coca-cola, Fanta de naranja, Fanta de limón, Nestea, Acuarius', NULL, NULL, NULL),
(48, 'Ensalada de maiz', 1.30, 'Ensalada con trozos de maíz', NULL, '2020-11-25 21:55:32', '2020-11-25 21:55:32');

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
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` tinytext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido1`, `apellido2`, `DNI`, `telefono`, `email`, `password`, `ciudad`, `perfil`, `avatar`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'lorena', 'moyano', 'montes', '26967986B', '622742449', 'lore_mary@hotmail.es', '$2y$10$kbdcsIqXrECSO8UPWz12iO2evNWpNhKYVtWmXGofKxJV1P8RsI3m.', 'cabra', 'user', '1606378325gluten.png', '2020-09-21 20:37:33', '2020-11-26 07:12:05', 'N1Ay1O0PzVapDPk8yT8MzKfYHqActukN4B7PdYzerZ52xcAsn473y86qTAmU'),
(2, 'admin', 'admin', 'admin', '12345678u', '111222333', 'admin@admin.com', '$2y$10$HzhsKmtVzJQHbC54Fq08fOCrMdzT7JbzBcwktBUMnmwG..9VfzbwK', 'admin', 'admin', NULL, '2020-11-08 13:59:04', '2020-11-08 13:59:04', NULL),
(3, 'Oscar', 'Granados', 'Ariza', '12345678A', '123456789', 'oscar@gmail.com', '$2y$10$hCo/mo1fRBkRnpoLI6aEp.vwGJwZNrNw1h2DgXRQhjLRdfqN6TZhi', 'Iznajar', 'user', NULL, '2020-09-21 21:54:01', '2020-11-25 14:39:49', NULL),
(8, 'Lorena', 'Moyano', 'Montes', '26967986A', '722742449', 'lorenamoyanomontes1991@gmail.com', '$2y$10$aF2aZv2BgzIxoQ5qlVmhl.AVU0mykAHM3fYUXarVsW8xKNU7TnURu', 'Cabra', 'admin', '1606345515crustaceos.png', '2020-10-04 10:43:01', '2020-11-26 06:41:40', NULL),
(14, 'prueba2', 'prueba', 'prueba', '12345678J', '722147852', 'prueba2@gmail.com', '$2y$10$2D3WBZKp7h6uefozZ5L1Rewlqnqm3Llq2Xm4XR5RDM9xK67VefZWu', 'prueba', 'user', NULL, '2020-11-08 22:39:45', '2020-11-08 22:39:45', NULL);

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
(13, '2020_09_21_213148_create_cliente_table', 1),
(14, '2020_09_21_213200_create_pedido_table', 1),
(15, '2020_09_21_213205_create_carta_table', 1),
(16, '2020_09_21_213210_create_pedidocarta_table', 1),
(17, '2020_09_21_213220_create_repartidor_table', 1),
(18, '2020_09_21_213223_create_reparto_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idCarta` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `idCliente`, `idCarta`, `cantidad`, `total`, `created_at`, `updated_at`) VALUES
(11, 14, 1, 2, 11, '2020-11-22 18:20:44', '2020-11-22 18:20:44'),
(12, 14, 11, 2, 2, '2020-11-22 18:20:51', '2020-11-22 18:20:51'),
(13, 14, 3, 1, 7.5, '2020-11-22 18:22:25', '2020-11-22 18:22:25'),
(14, 14, 6, 5, 7.5, '2020-11-22 19:05:40', '2020-11-22 19:05:40'),
(20, 3, 2, 2, 12, '2020-11-22 21:38:43', '2020-11-22 21:38:43'),
(22, 3, 11, 1, 1, '2020-11-23 07:57:52', '2020-11-23 07:57:52'),
(27, 1, 1, 3, 21.06, '2020-11-26 08:13:11', '2020-11-26 08:13:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidocarta`
--
-- Error leyendo la estructura de la tabla quickfood.pedidocarta: #1932 - Table 'quickfood.pedidocarta' doesn't exist in engine
-- Error leyendo datos de la tabla quickfood.pedidocarta: #1064 - Algo está equivocado en su sintax cerca 'FROM `quickfood`.`pedidocarta`' en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idReparto` bigint(20) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparto`
--

CREATE TABLE `reparto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idPedido` bigint(20) UNSIGNED NOT NULL,
  `recogida` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergenos`
--
ALTER TABLE `alergenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alergenos_carta`
--
ALTER TABLE `alergenos_carta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCar` (`idCarta`),
  ADD KEY `idAler` (`idAlergeno`);

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
  ADD UNIQUE KEY `cliente_email_unique` (`email`),
  ADD UNIQUE KEY `telefono` (`telefono`);

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
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCart` (`idCarta`);

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idReparto` (`idReparto`),
  ADD KEY `idClient` (`idCliente`);

--
-- Indices de la tabla `reparto`
--
ALTER TABLE `reparto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCli` (`idCliente`),
  ADD KEY `idPed` (`idPedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alergenos`
--
ALTER TABLE `alergenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reparto`
--
ALTER TABLE `reparto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alergenos_carta`
--
ALTER TABLE `alergenos_carta`
  ADD CONSTRAINT `idAler` FOREIGN KEY (`idAlergeno`) REFERENCES `alergenos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idCar` FOREIGN KEY (`idCarta`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `idCart` FOREIGN KEY (`idCarta`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD CONSTRAINT `idClient` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idReparto` FOREIGN KEY (`idReparto`) REFERENCES `reparto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparto`
--
ALTER TABLE `reparto`
  ADD CONSTRAINT `idCli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idPed` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
