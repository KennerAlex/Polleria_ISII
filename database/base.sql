drop database if exists Polleria;
create database Polleria;
use Polleria;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 01:30:55
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `polleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `idtipo`, `descripcion`, `precio`, `img`) VALUES
(1, '1/8 de Pollo', 1, '1/8 de Pollo + Papas + Ensalada+ Cremas', '7.50', '/storage/imagenes/platos/IiG75Llle9RCXMVCEExpl4aZcew4X6fdnzgwdP9e.png'),
(2, '1/4 de Pollo', 1, '1/4 de Pollo + Papas + Ensalada+ Cremas', '13.00', '/storage/imagenes/platos/ZO1b2oT6Y7D7nazWIGGHnkAa3lwL8jCAYflWxvBV.png'),
(3, '1/2 de Pollo', 1, '1/2 de Pollo + Papas + Ensalada+ Cremas', '25.00', '/storage/imagenes/platos/ERCdLGKqGKfz0Wd7lw96jBIXvFoM3NnvzIBwPxX7.png'),
(4, '1 Pollo', 1, '1 Pollo + Papas + Ensalada+ Cremas', '50.00', '/storage/imagenes/platos/wJp353JBxrATTGEit1080vSlBVLPGgcziYvETnA9.png'),
(5, 'Arroz Chaufa', 2, 'Plato personal de Arroz Chaufa', '10.50', '/storage/imagenes/platos/XRuCr4xLmZgpDXauzto9PjtfugL73IugRaSQgmyn.jpg'),
(6, 'Lomo Saltado', 2, 'Plato personal de Lomo Saltado', '10.00', '/storage/imagenes/platos/AvFsACSEwGnrKFFuamLSSpWfCsQBfPbzkKLwPKux.jpg'),
(7, 'Pollo Broaster', 2, '1/8 de Pollo Broaster + Papas', '15.00', '/storage/imagenes/platos/CNPAFbaafBTxP2jFXSkoebjifwanHcPBVpXQV4oP.jpg'),
(8, 'Churrasco', 2, 'Plato personal de Chusrrasco', '10.00', '/storage/imagenes/platos/Fxv1DBsKniJcsHMY9s8YQtDyzZjlxiOW0K1jJmXT.jpg'),
(9, '1L de Chicha Morada', 4, '1L de Chicha Morada', '5.50', '/storage/imagenes/platos/S15tXDpQHNwNp5o9LIPDQiNhgmUzyWWRNilS1FpM.jpg'),
(10, '1L de Jugo de Maracuya', 4, '1L de Jugo de Maracuya', '5.00', '/storage/imagenes/platos/1z6NBJtfZFKgtA5fLvbo2gNE6JwOiLip8kL6O1SE.jpg'),
(11, 'Gaseoasa Inka Cola 1L', 4, 'Inca Kola 1L', '6.00', '/storage/imagenes/platos/ynJ0Hy7coCd9JSDcEbgosw0B95Z6VfOLVgwMUCUo.jpg'),
(12, 'Gaseoasa Coca Cola 1L', 4, 'Coca Cola 1L', '6.50', '/storage/imagenes/platos/Hpvee5n28Fckc0IxN4asmkZ0Ec0A3YFFdkk8yQ0h.jpg'),
(13, 'Cualquier cosa', 1, 'dvrrfrfrfv', '21.00', '/storage/imagenes/platos/Vj3l4ey2T6DqP5EUHxkNRpy6sTZ6QJXtKWyf83V0.jpg'),
(14, 'dihfjrgru', 1, 'dhhfjrhrjhr', '23.00', '/storage/imagenes/platos/tLRBoeNyq7ldbseRNxEgCHcJBSwaUU2mfeKHdC1m.png'),
(16, 'Ceviche', 2, 'Plato personal de ceviche', '21.00', '/storage/imagenes/platos/CEgTrVkjzT9TCoM5VjKMxLZPY0eTGNhQ7IQqm3YN.webp');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idmenu` int(11) DEFAULT NULL,
  `nombreCliente` varchar(60) DEFAULT NULL,
  `apellidosCliente` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `cantidad` int(60) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `idcliente`, `idmenu`, `nombreCliente`, `apellidosCliente`, `correo`, `telefono`, `direccion`, `cantidad`, `descripcion`, `costo`) VALUES
(1, NULL, 1, 'Kenner', 'Rojas', 'Kenner@gmail.com', '948773793', 'Jjjd', 21, 'Nada', '21.00'),
(2, NULL, 1, 'ffr', 'frrf', 'k@gmail.com', '33213', 'edee', 23, '2deed', '212.98'),
(3, NULL, 6, 'Kenner', 'Ahumada', 'k@gmail.com', '9842457', 'El alambre', 2, 'dede', '24.00'),
(4, NULL, 2, 'Kenner', 'Ahumada', 'k@gmail.com', '9842457', 'El alambre', 21, '3dee', '30.00'),
(5, NULL, 1, 'ffr', 'Ahumada', 'k@gmail.com', '9842457', 'El alambre', 21, '2ddee', '44.94'),
(6, NULL, 3, 'se', 'der', 'k@gmail.com', '948773793', 'edee', 21, 'dfggg', '3.00'),
(7, NULL, 4, 'ed', 'eessss', 'k@gmail.com', '211', 'ddeecccedcssc', 18, 'e333333derr', '23.00'),
(8, NULL, 4, 'Kenner', 'Ahumada', 'k@gmail.com', '948773793', 'El alambre', 4, 'nnkkj', '1.00'),
(9, NULL, 5, 'ffr', 'Ahumada', 'Kenner@gmail.com', '9842457', 'edee', 21, 'vghbvjgbvjhb', '21.00'),
(11, NULL, 7, 'Kenner', 'eessss', 'Kenner@gmail.com', '948773793', 'Jjjd', 1, '233', '42.98'),
(12, NULL, 2, 'ed', 'der', 'Kenner@gmail.com', '948773793', 'ddeecccedcssc', 2, 'ddc', '21.00'),
(13, NULL, 1, 'trtete', 'Rojas', 'Kenner@gmail.com', '9842457', 'ddeecccedcssc', 3, 'dde', '21.00'),
(14, NULL, 11, 'dde', 'eessss', 'k@gmail.com', '211', 'Jjjd', 1, 'ccfdf', '21.00'),
(15, NULL, 2, 'eded', 'ed', 'wde@gmail.com', '344212', 'sdd', 3, 'Sin papa', '39.00'),
(16, NULL, 3, 'oeoeo', 'hshe', '33r@gmail.com', '1234', 'sdd', 3, 'dhhd', '75.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoplato`
--

CREATE TABLE `tipoplato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoplato`
--

INSERT INTO `tipoplato` (`id`, `nombre`) VALUES
(1, 'Pollo a la Brasa'),
(2, 'Platos Especiales'),
(3, 'Ensaladas'),
(4, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipo`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'MESERO'),
(3, 'CLIENTE'),
(4, 'CHEF'),
(5, 'AYUDANTES'),
(6, 'COCINEROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'kframi@example.org', '2021-08-15 00:15:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi', '2021-08-15 00:15:38', '2021-08-15 00:15:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `contraseña` varchar(60) DEFAULT NULL,
  `telefono` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `usuario`, `contraseña`, `telefono`, `direccion`, `idtipousuario`) VALUES
(1, 'Kenner Alexander', 'Rojas Ahumada', 'kr@gmail.com', 'kenner120', '12345', '948773793', 'Los Olivos 318', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmenu` (`idmenu`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `tipoplato`
--
ALTER TABLE `tipoplato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipousuario` (`idtipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipoplato`
--
ALTER TABLE `tipoplato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipoplato` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;






















