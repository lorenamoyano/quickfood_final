-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-12-2020 a las 18:32:48
-- Versión del servidor: 10.3.24-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

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
CREATE DATABASE IF NOT EXISTS `quickfoodfp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quickfoodfp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergenos`
--

CREATE TABLE `alergenos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alergenos`
--

INSERT INTO `alergenos` (`id`, `nombre`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Altramuces', '1606329860altramuces.png', NULL, NULL),
(2, 'Apio', '1607525529apio.png', NULL, NULL),
(3, 'Cacahuetes', '1606329869cacahuetes.png', NULL, NULL),
(4, 'Crustaceos', '1606345515crustaceos.png', NULL, NULL),
(5, 'Dioxido de azufre y sulfritos', '1606515679dioxido de azufre y sulfitos.png', NULL, NULL),
(6, 'Frutos con cascara', '1607525564frutos de cascara.png', NULL, NULL),
(7, 'Gluten', '1606378325gluten.png', NULL, NULL),
(8, 'Granos de sesamo', '1606430591granos de sesamo.png', NULL, NULL),
(9, 'Huevos', '1607525591huevos.png', NULL, NULL),
(10, 'Lacteos', '1607525614lacteos.png', NULL, NULL),
(11, 'Moluscos', '1607525637moluscos.png', NULL, NULL),
(12, 'Mostaza', '1606331447mostaza.png', NULL, NULL),
(13, 'Pescado', '1607525661pescado.png', NULL, NULL),
(14, 'Soja', '1607525680soja.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergenos_carta`
--

CREATE TABLE `alergenos_carta` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCarta` int(10) UNSIGNED NOT NULL,
  `idAlergeno` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alergenos_carta`
--

INSERT INTO `alergenos_carta` (`id`, `idCarta`, `idAlergeno`, `created_at`, `updated_at`) VALUES
(12, 15, 8, '2020-12-11 00:24:23', '2020-12-11 00:24:23'),
(14, 8, 9, NULL, NULL),
(15, 1, 10, NULL, NULL),
(16, 2, 7, NULL, NULL),
(17, 4, 7, NULL, NULL),
(18, 3, 8, NULL, NULL),
(19, 7, 5, NULL, NULL),
(20, 9, 5, NULL, NULL),
(21, 10, 5, NULL, NULL),
(22, 5, 7, NULL, NULL),
(23, 11, 10, NULL, NULL),
(24, 12, 10, NULL, NULL),
(25, 13, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'Hamburguesa con queso', 7.50, 'Hamburguesa con queso fundido', NULL, NULL),
(2, 'Hamburguesa de pollo con doble de queso', 6.10, 'Hamburguesa con carne de pollo', NULL, NULL),
(3, 'Hamburguesa vegana', 7.50, 'Deliciosa hamburguesa apta para veganos', NULL, NULL),
(4, 'Hamburguesa doble', 10.00, 'Una deliciosa hamburguesa con doble de carne', NULL, NULL),
(5, 'Perrito caliente', 5.00, 'Perrito caliente con un sabor delicado', NULL, NULL),
(6, 'Sandwich de queso', 1.50, 'Estupendo sandwich de queso y jamón', NULL, NULL),
(7, 'Nuggets', 5.50, 'Bandeja de 8 nuggets', NULL, NULL),
(8, 'Alitas de pollo', 3.50, 'Bandeja de 10 alitas de pollo', NULL, NULL),
(9, 'Patatas fritas', 1.00, 'Ración pequeña de patatas', NULL, NULL),
(10, 'Patatas fritas a lo grande', 3.00, 'Ración grande de patatas', NULL, NULL),
(11, 'Pizza 4 quesos', 6.00, 'Deliciosa pizza 4 quesos', NULL, NULL),
(12, 'Pizza carbonara', 6.00, 'Pizza carbonara para disfrutar con la familia', NULL, NULL),
(13, 'Pizza de salchichas', 3.50, 'Pizza de salchichas apta para todos', NULL, NULL),
(15, 'Prueba', 5.20, 'Prueba', '2020-12-11 00:24:23', '2020-12-11 00:24:23');

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
  `perfil` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido1`, `apellido2`, `DNI`, `telefono`, `email`, `password`, `ciudad`, `perfil`, `avatar`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Lorena', 'Moyano', 'Montes', '34587521B', '666111224', 'lorenamoyanomontes1991@gmail.com', '$2y$10$Y0kUyX05C4VwXcco4l/ARu0mu4pTZdxfnLJeJ1h9Q0LvHM9XCH2QK', 'Málaga', 1, '1607621580apio.png', NULL, '2020-12-11 12:20:08', NULL),
(2, 'D. Rubén Sáenz', 'Lorente', 'Luján', '68638041h', '799574781', 'ivelazquez@yahoo.es', '$2y$10$dUmsX9SlmHhaOSpIMAKgTOa.jPVRDmF98gw8.9ugP/b2ZhSJJH4DO', 'L\' Ayalaa', 3, NULL, NULL, '2020-12-10 16:34:32', NULL),
(5, 'Rosa Soliz', 'García', 'Montañez', '72100783k', '780908385', 'amparo.casanova@gmail.com', '$2y$10$kSZJzdFq53CsmYKnkkhDYeTrLtq2S8pu9wTiDs9SZNcJ9ZPVjEXX.', 'O Delrío', 2, '1607642543cacahuetes.png', NULL, '2020-12-10 22:22:23', NULL),
(6, 'Samuel Montez', 'Sevilla', 'Rentería', '29397821v', '637282357', 'baez.ainara@terra.com', '$2y$10$F9B.GD55BewfqVUpxMNVyOoaow4gbWixXgJxJKPMkU7a/DL5YQ5qG', 'Los Roca', 2, NULL, NULL, NULL, NULL),
(7, 'Olivia Pons', 'De Anda', 'Acuña', '81097861a', '790378984', 'jaime.gallardo@terra.com', '$2y$10$.ziM3exQ1auAEIWvIzhy0.XEWz7ysM8tL4ZDpNocZkgHiTwlH6Sp.', 'Barraza de las Torres', 2, NULL, NULL, NULL, NULL),
(8, 'Martina Romo', 'Miguel', 'Gracia', '51074984m', '673446387', 'olivia.santana@yahoo.com', '$2y$10$KXQuELbeemqeW/Pzq4isje0G57vnBUo4kGpw.Us.bNxGNGW7doF5a', 'El Barrientos', 2, NULL, NULL, NULL, NULL),
(9, 'Ing. Bruno Urías', 'Lebrón', 'Saucedo', '81995508f', '778546675', 'gluque@gmail.com', '$2y$10$d9Tx4xlxTRsbvTLzJ1TrEuipcrnBNXiDfBY6Y2OnhmYIG/Eu/6pxK', 'Cisneros de la Sierra', 2, NULL, NULL, NULL, NULL),
(11, 'Miguel Ángel Holguín', 'Godoy', 'Peláez', '43964066o', '758068073', 'cplaza@yahoo.com', '$2y$10$qBFtqyDZ9lyIqKw5WcmeN.6NZiS2a9Bn2bwzxHUI5CWVxHhLGLI6e', 'Amaya de la Sierra', 2, NULL, NULL, NULL, NULL),
(13, 'Admin', 'admin', 'admin', '26967852A', '722742448', 'admin@admin.com', '$2y$10$M88M6rxpjq9zhC4bqRguOedepUjUwDJoHE4Jr3aFWQ3p9mrGnkefS', 'Cabra', 2, '1607692428altramuces.png', '2020-12-11 12:13:34', '2020-12-11 12:13:48', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprar`
--

CREATE TABLE `comprar` (
  `id` int(10) UNSIGNED NOT NULL,
  `idClien` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repartido` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comprar`
--

INSERT INTO `comprar` (`id`, `idClien`, `direccion`, `repartido`, `created_at`, `updated_at`) VALUES
(1, 5, 'Calle Antequera', 1, '2020-12-10 16:38:40', '2020-12-10 16:38:40'),
(2, 5, 'Coín', 0, '2020-12-10 16:39:54', '2020-12-10 16:39:54'),
(3, 13, 'Coín', 1, '2020-12-11 12:18:26', '2020-12-11 12:18:26');

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
(1, '2020_12_10_125918_create_tipo_table', 1),
(2, '2020_12_10_125925_create_cliente_table', 1),
(3, '2020_12_10_125954_create_comprar_table', 1),
(4, '2020_12_10_130003_create_carta_table', 1),
(5, '2020_12_10_130011_create_pedido_table', 1),
(6, '2020_12_10_130021_create_alergenos_table', 1),
(7, '2020_12_10_130026_create_alergenoscarta_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idCar` int(10) UNSIGNED NOT NULL,
  `pago` tinyint(1) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `idCliente`, `idCar`, `pago`, `cantidad`, `fecha`, `created_at`, `updated_at`) VALUES
(2, 5, 2, 1, 3, '2020-12-10', '2020-12-10 16:36:47', '2020-12-10 16:36:53'),
(3, 5, 1, 1, 1, '2020-12-10', '2020-12-10 16:36:50', '2020-12-10 16:36:50'),
(4, 5, 3, 1, 1, '2020-12-10', '2020-12-10 16:39:21', '2020-12-10 16:39:21'),
(5, 5, 3, 0, 1, '2020-12-10', '2020-12-10 22:42:58', '2020-12-10 22:42:58'),
(6, 5, 1, 0, 2, '2020-12-10', '2020-12-10 22:43:01', '2020-12-10 22:43:01'),
(9, 13, 5, 1, 1, '2020-12-11', '2020-12-11 12:16:45', '2020-12-11 12:16:45'),
(10, 13, 1, 1, 3, '2020-12-11', '2020-12-11 12:16:57', '2020-12-11 12:16:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `perfil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `perfil`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL),
(3, 'Repartidor', NULL, NULL);

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
  ADD KEY `alergenos_carta_idcarta_foreign` (`idCarta`),
  ADD KEY `alergenos_carta_idalergeno_foreign` (`idAlergeno`);

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
  ADD UNIQUE KEY `cliente_email_unique` (`email`),
  ADD KEY `cliente_perfil_foreign` (`perfil`);

--
-- Indices de la tabla `comprar`
--
ALTER TABLE `comprar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comprar_idclien_foreign` (`idClien`);

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
  ADD KEY `pedido_idcliente_foreign` (`idCliente`),
  ADD KEY `pedido_idcar_foreign` (`idCar`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alergenos`
--
ALTER TABLE `alergenos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `alergenos_carta`
--
ALTER TABLE `alergenos_carta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comprar`
--
ALTER TABLE `comprar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alergenos_carta`
--
ALTER TABLE `alergenos_carta`
  ADD CONSTRAINT `alergenos_carta_idalergeno_foreign` FOREIGN KEY (`idAlergeno`) REFERENCES `alergenos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alergenos_carta_idcarta_foreign` FOREIGN KEY (`idCarta`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_perfil_foreign` FOREIGN KEY (`perfil`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprar`
--
ALTER TABLE `comprar`
  ADD CONSTRAINT `comprar_idclien_foreign` FOREIGN KEY (`idClien`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_idcar_foreign` FOREIGN KEY (`idCar`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_idcliente_foreign` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
