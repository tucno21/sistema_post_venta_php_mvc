-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-10-2021 a las 20:15:34
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_post_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` text,
  `creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `category`, `creation_date`) VALUES
(1, 'Equipos ElectromecÃ¡nicos', '2021-08-23 14:33:37'),
(2, 'Taladros', '2021-08-23 14:40:03'),
(3, 'Andamios', '2021-08-23 14:40:45'),
(4, 'Generadores de energÃ­a', '2021-08-23 20:36:34'),
(5, 'Equipos para construcciÃ³n', '2021-08-23 20:36:38'),
(6, 'Martillos mecÃ¡nicos', '2021-08-23 20:36:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `dni` int(11) NOT NULL,
  `email` text NOT NULL,
  `telephone` text NOT NULL,
  `direction` text NOT NULL,
  `date_birth` date NOT NULL,
  `sales` int(11) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `dni`, `email`, `telephone`, `direction`, `date_birth`, `sales`, `registration_date`) VALUES
(1, 'carlos tucno', 42769197, 'carlitostucno@gmail.com', '519-109-545', 'Asoc Wari Accopampa Mz G Lt', '1984-10-30', 4, '2021-09-13 23:21:02'),
(3, 'yovana', 41525665, 'correo@correo.com', '999-999-999', 'Huanta', '1984-10-30', 0, '0000-00-00 00:00:00'),
(4, 'mario perez', 11111111, 'cc@cc.com', '333-333-333', 'jr santa 123', '1998-10-10', 9, '2021-09-14 19:06:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `code` text,
  `description` text,
  `image` text,
  `stock` int(11) DEFAULT NULL,
  `price_buy` float DEFAULT NULL,
  `price_sale` float DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `categoryId`, `code`, `description`, `image`, `stock`, `price_buy`, `price_sale`, `sales`, `date`) VALUES
(1, 1, '101', 'Aspiradora Industrial ', 'e8f63234f5367dd16f85b5c1cf17216c.jpg', 0, 200, 280, 2, '2021-08-23 20:10:55'),
(2, 1, '102', 'Plato Flotante para Allanadora', 'vistas/102/940.jpg', 7, 4500, 6300, 5, '2021-08-23 20:10:55'),
(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/103/763.jpg', 8, 3000, 4200, 6, '2021-08-23 20:10:55'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', 'vistas/104/957.jpg', 19, 4000, 5600, 1, '2021-08-23 20:10:55'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', 'vistas/105/630.jpg', 17, 1540, 2156, 1, '2021-08-23 20:10:55'),
(6, 1, '106', 'Disco Punta Diamante ', 'vistas/106/635.jpg', 17, 1100, 1540, 1, '2021-08-23 20:10:55'),
(7, 1, '107', 'Extractor de Aire ', 'vistas/107/848.jpg', 16, 1540, 2156, 2, '2021-08-23 20:10:55'),
(8, 1, '108', 'Guadanadora ', 'vistas/108/163.jpg', 20, 1540, 2156, 0, '2021-08-23 20:10:55'),
(9, 1, '109', 'Hidrolavadora Electrica ', 'vistas/109/769.jpg', 20, 2600, 3640, 0, '2021-08-23 20:10:55'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/110/582.jpg', 13, 2210, 3094, 2, '2021-08-23 20:10:55'),
(11, 1, '111', 'Motobomba a Gasolina', 'vistas/anonymous.png', 20, 2860, 4004, 0, '2021-08-23 20:10:55'),
(12, 1, '112', 'Motobomba Elactrica', 'vistas/anonymous.png', 20, 2400, 3360, 0, '2021-08-23 20:10:55'),
(13, 1, '113', 'Sierra Circular ', 'vistas/anonymous.png', 20, 1100, 1540, 0, '2021-08-23 20:10:55'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', 'vistas/anonymous.png', 20, 4500, 6300, 0, '2021-08-23 20:10:55'),
(15, 1, '115', 'Soldador Electrico ', 'vistas/anonymous.png', 20, 1980, 2772, 0, '2021-08-23 20:10:55'),
(16, 1, '116', 'Careta para Soldador', 'vistas/anonymous.png', 20, 4200, 5880, 0, '2021-08-23 20:10:55'),
(17, 1, '117', 'Torre de iluminacion ', 'vistas/anonymous.png', 20, 1800, 2520, 0, '2021-08-23 20:10:55'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', 'vistas/anonymous.png', 16, 5600, 7840, 1, '2021-08-23 20:10:55'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', 'vistas/anonymous.png', 20, 9600, 13440, 0, '2021-08-23 20:10:55'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', 'vistas/anonymous.png', 20, 3850, 5390, 0, '2021-08-23 20:10:55'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', 'vistas/anonymous.png', 20, 9600, 13440, 0, '2021-08-23 20:10:55'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', 'vistas/anonymous.png', 20, 8000, 11200, 0, '2021-08-23 20:10:55'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', 'vistas/anonymous.png', 20, 3900, 5460, 0, '2021-08-23 20:10:55'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', 'vistas/anonymous.png', 20, 4600, 6440, 0, '2021-08-23 20:10:55'),
(25, 3, '301', 'Andamio colgante', 'vistas/anonymous.png', 20, 1440, 2016, 0, '2021-08-23 20:10:55'),
(26, 3, '302', 'Distanciador andamio colgante', 'vistas/anonymous.png', 20, 1600, 2240, 0, '2021-08-23 20:10:55'),
(27, 3, '303', 'Marco andamio modular ', 'vistas/anonymous.png', 20, 900, 1260, 0, '2021-08-23 20:10:55'),
(28, 3, '304', 'Marco andamio tijera', 'vistas/anonymous.png', 20, 100, 140, 0, '2021-08-23 20:10:55'),
(29, 3, '305', 'Tijera para andamio', 'vistas/anonymous.png', 20, 162, 226, 0, '2021-08-23 20:10:55'),
(30, 3, '306', 'Escalera interna para andamio', 'vistas/anonymous.png', 20, 270, 378, 0, '2021-08-23 20:10:55'),
(31, 3, '307', 'Pasamanos de seguridad', 'vistas/anonymous.png', 20, 75, 105, 0, '2021-08-23 20:10:55'),
(32, 3, '308', 'Rueda giratoria para andamio', 'vistas/anonymous.png', 20, 168, 235, 0, '2021-08-23 20:10:55'),
(33, 3, '309', 'Arnes de seguridad', 'vistas/anonymous.png', 20, 1750, 2450, 0, '2021-08-23 20:10:55'),
(34, 3, '310', 'Eslinga para arnes', 'vistas/anonymous.png', 20, 175, 245, 0, '2021-08-23 20:10:55'),
(35, 3, '311', 'Plataforma Metalica', 'vistas/anonymous.png', 20, 420, 588, 0, '2021-08-23 20:10:55'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', 'vistas/anonymous.png', 20, 3500, 4900, 0, '2021-08-23 20:10:55'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', 'vistas/anonymous.png', 20, 3550, 4970, 0, '2021-08-23 20:10:55'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', 'vistas/anonymous.png', 20, 3600, 5040, 0, '2021-08-23 20:10:55'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', 'vistas/anonymous.png', 20, 3650, 5110, 0, '2021-08-23 20:10:55'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', 'vistas/anonymous.png', 20, 3700, 5180, 0, '2021-08-23 20:10:55'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', 'vistas/anonymous.png', 20, 3750, 5250, 0, '2021-08-23 20:10:55'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', 'vistas/anonymous.png', 20, 3800, 5320, 0, '2021-08-23 20:10:55'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', 'vistas/anonymous.png', 12, 3850, 5390, 1, '2021-08-23 20:10:55'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', 'vistas/anonymous.png', 20, 350, 490, 0, '2021-08-23 20:10:55'),
(45, 5, '502', 'Extension Electrica ', 'vistas/anonymous.png', 20, 370, 518, 0, '2021-08-23 20:10:55'),
(46, 5, '503', 'Gato tensor', 'vistas/anonymous.png', 20, 380, 532, 0, '2021-08-23 20:10:55'),
(47, 5, '504', 'Lamina Cubre Brecha ', 'vistas/anonymous.png', 20, 380, 532, 0, '2021-08-23 20:10:55'),
(48, 5, '505', 'Llave de Tubo', 'vistas/anonymous.png', 7, 480, 672, 1, '2021-08-23 20:10:55'),
(49, 5, '506', 'Manila por Metro', 'vistas/anonymous.png', 20, 600, 840, 0, '2021-08-23 20:10:55'),
(50, 5, '507', 'Polea 2 canales', 'vistas/anonymous.png', 20, 900, 1260, 0, '2021-08-23 20:10:55'),
(51, 5, '508', 'Tensor', 'vistas/anonymous.png', 20, 100, 140, 0, '2021-08-23 20:10:55'),
(52, 5, '509', 'Bascula ', 'vistas/anonymous.png', 20, 130, 182, 0, '2021-08-23 20:10:55'),
(53, 5, '510', 'Bomba Hidrostatica', 'vistas/anonymous.png', 20, 770, 1078, 0, '2021-08-23 20:10:55'),
(54, 5, '511', 'Chapeta', 'vistas/anonymous.png', 20, 660, 924, 0, '2021-08-23 20:10:55'),
(55, 5, '512', 'Cilindro muestra de concreto', 'vistas/anonymous.png', 20, 400, 560, 0, '2021-08-23 20:10:55'),
(56, 5, '513', 'Cizalla de Palanca', 'vistas/anonymous.png', 20, 450, 630, 0, '2021-08-23 20:10:55'),
(57, 5, '514', 'Cizalla de Tijera', 'vistas/anonymous.png', 20, 580, 812, 0, '2021-08-23 20:10:55'),
(58, 5, '515', 'Coche llanta neumatica', 'vistas/anonymous.png', 20, 420, 588, 0, '2021-08-23 20:10:55'),
(59, 5, '516', 'Cono slump', 'vistas/anonymous.png', 20, 140, 196, 0, '2021-08-23 20:10:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_code` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `products` text NOT NULL,
  `tax_result` float NOT NULL,
  `net` float NOT NULL,
  `total` float NOT NULL,
  `payment_method` text NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `sale_code`, `clientId`, `sellerId`, `products`, `tax_result`, `net`, `total`, `payment_method`, `registration_date`) VALUES
(4, 10000001, 1, 2, '[{\"id\":\"2\",\"description\":\"Plato Flotante para Allanadora\",\"cantidad\":\"2\",\"stock\":7,\"precio\":\"6300\",\"total\":\"12600\"}]', 2268, 12600, 14868, 'TC-456431', '2021-07-12 22:45:28'),
(5, 10000002, 3, 2, '[{\"id\":\"2\",\"description\":\"Plato Flotante para Allanadora\",\"cantidad\":\"2\",\"stock\":7,\"precio\":\"6300\",\"total\":\"12600\"}]', 2268, 12600, 14868, 'efectivo', '2021-08-10 19:48:21'),
(6, 10000003, 3, 2, '[{\"id\":\"2\",\"description\":\"Plato Flotante para Allanadora\",\"cantidad\":\"1\",\"stock\":7,\"precio\":\"6300\",\"total\":\"6300\"}]', 1134, 6300, 7434, 'TC-165465', '2021-08-22 22:53:22'),
(8, 10000005, 1, 2, '[{\"id\":\"3\",\"description\":\"Compresor de Aire para pintura\",\"cantidad\":\"3\",\"stock\":10,\"precio\":\"4200\",\"total\":\"12600\"}]', 2268, 12600, 14868, 'TC-45648498', '2021-09-03 23:28:06'),
(9, 10000006, 4, 2, '[{\"id\":\"3\",\"description\":\"Compresor de Aire para pintura\",\"cantidad\":\"2\",\"stock\":10,\"precio\":\"4200\",\"total\":\"8400\"},{\"id\":\"4\",\"description\":\"Cortadora de Adobe sin Disco \",\"cantidad\":\"1\",\"stock\":19,\"precio\":\"5600\",\"total\":\"5600\"},{\"id\":\"5\",\"description\":\"Cortadora de Piso sin Disco \",\"cantidad\":\"3\",\"stock\":17,\"precio\":\"2156\",\"total\":\"6468\"}]', 3684.24, 20468, 24152.2, 'efectivo', '2021-08-08 16:22:58'),
(10, 10000007, 1, 2, '[{\"id\":\"6\",\"description\":\"Disco Punta Diamante \",\"cantidad\":\"3\",\"stock\":17,\"precio\":\"1540\",\"total\":\"4620\"},{\"id\":\"10\",\"description\":\"Hidrolavadora Gasolina\",\"cantidad\":\"4\",\"stock\":16,\"precio\":\"3094\",\"total\":\"12376\"}]', 3059.28, 16996, 20055.3, 'efectivo', '2021-09-13 23:21:02'),
(11, 10000008, 4, 2, '[{\"id\":\"10\",\"description\":\"Hidrolavadora Gasolina\",\"cantidad\":\"3\",\"stock\":13,\"precio\":\"3094\",\"total\":\"9282\"},{\"id\":\"48\",\"description\":\"Llave de Tubo\",\"cantidad\":\"13\",\"stock\":7,\"precio\":\"672\",\"total\":\"8736\"},{\"id\":\"43\",\"description\":\"Planta Electrica Diesel 120 Kva\",\"cantidad\":\"8\",\"stock\":12,\"precio\":\"5390\",\"total\":\"43120\"}]', 11004.8, 61138, 72142.8, 'TC-546846546', '2021-09-13 23:22:45'),
(12, 10000009, 4, 8, '[{\"id\":\"3\",\"description\":\"Compresor de Aire para pintura\",\"cantidad\":\"2\",\"stock\":8,\"precio\":\"4200\",\"total\":\"8400\"}]', 1512, 8400, 9912, 'TC-564646', '2021-09-14 19:06:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_u` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `profile` varchar(45) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name_u`, `username`, `password`, `profile`, `photo`, `estado`, `last_login`, `registration_date`) VALUES
(1, 'carlos', 'hola', '$2y$10$9WeXZxOtbUS2Kyi9.bMGzu6u6Pm0Jfp5BVHvz39iuuIThESR9pF96', 'Administrador', '4d72ebc8a38d42e6d4f6321bdfa34eef.jpg', 1, '2021-08-21 22:34:25', NULL),
(2, 'juanADMIN', 'admin', '$2y$10$k8AxH4I2BCIZgyjaz8OLJukJKpYPg.LX1dIGIo3P8ARQ1X5wrqhp2', 'Administrador', '9c68886462d3cc4c37e80f8dfb40c682.jpg', 1, '2021-10-11 20:12:16', '2021-08-21'),
(3, 'maria', 'sol', '$2y$10$yD.HCIcymBjQYW5J3DdLZOw8MpWf1guHtbJneC.euPfsIuwdgGANC', 'Vendedor', '22a0130ab135424563924a62efc25c6f.jpg', 0, '2021-08-21 00:00:00', '2021-08-21'),
(4, 'aaaa', 'aaaa', '$2y$10$U7P1ihGxfj05DOKfrMtg0OdfSZFLTUMYdMKCvDJeH89bKJ8Xg2JEO', 'Especial', '36a253951dcfda7fe19a407ae93a413e.jpg', 1, '2021-09-15 00:19:22', '2021-08-21'),
(5, 'maria', 'luna', '$2y$10$h/KVg4AGD.44z.jjMT9TC.XLJRBGwtIA7jDrhHXg/VE8jUiNl6Yf.', 'Administrador', '71d6644e296f09673126d387d25e8b9d.jpg', 1, '2021-08-21 00:00:00', '2021-08-21'),
(6, 'pedro', 'ana', '$2y$10$5CzzmKudfWBaFbTND/O93.PSeiTw0DVB27fW9S.G4T56N5vlWWO9a', 'Especial', '657c9b994de3ce7143573866a11c8a24.jpg', 1, '2021-08-21 00:00:00', '2021-08-21'),
(7, 'lunasol', 'lunasol', '$2y$10$enI21ywgxdPnfdsMa.x/uuMMzTvGe0D8MaKqG8SOSMb0eu/3UvC0i', 'Especial', 'f0592c10730089166f785a8a3fee0bc9.jpg', 1, '2021-08-22 00:00:00', '2021-08-22'),
(8, 'luis', 'luis', '$2y$10$XY2uOaP0KUEijWJSGbLwLubGQcJgMRr3RYCx5TYmx1YJv8MSvFIzW', 'Vendedor', 'ddffff010a82c0d32a26fe3841d21c3d.jpg', 1, '2021-09-15 18:43:43', '2021-08-23'),
(9, 'yovana martha', 'yovana', '$2y$10$qvU9N0U4Y/GWxdqDNEB1W.8gxw9W8iDbeWz.B05h31xr3cDwBefSe', 'Vendedor', '5bf571c7cceb44a27b33550cd61a87db.jpg', 0, '2021-08-23 00:00:00', '2021-08-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId_idx` (`categoryId`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientId` (`clientId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoryId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`sellerId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
