-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2023 a las 15:50:23
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arepas_caro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados`
--

CREATE TABLE `tbl_estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_estados`
--

INSERT INTO `tbl_estados` (`id`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'En cocina'),
(3, 'En camino'),
(4, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id` int(11) NOT NULL,
  `nombre_entregar` varchar(128) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `valor_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_pedidos`
--

INSERT INTO `tbl_pedidos` (`id`, `nombre_entregar`, `direccion`, `id_user`, `id_estado`, `valor_pedido`) VALUES
(12, 'Carla gomez', 'cra 12 a-22', 12, 2, 59000),
(13, '', '', 14, 3, 18000),
(14, 'pablo', '123cra2', 15, 4, 39000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id`, `nombre`, `precio`, `id_tipo`) VALUES
(1, 'Arepa con chorizo', 10000, 1),
(2, 'Arepa con chicharrón', 10000, 1),
(3, 'Arepa con carne asada', 10000, 1),
(4, 'Arepa con carne desmechada', 13000, 1),
(5, 'Arepa con carne desmechada de cerdo', 9000, 1),
(6, 'Arepa con carne desmechada de cerdo especial', 13000, 1),
(7, 'Arepa con carne desmechada res', 10000, 1),
(8, 'Arepa con carne desmechada res especial', 13000, 1),
(9, 'Arepa con carne desmechada de pollo', 9000, 1),
(10, 'Arepa con carne desmechada de pollo', 13000, 1),
(11, 'Arepa de chocolo con quesito', 7000, 1),
(12, 'Arepa con hogao y queso rayado', 5000, 1),
(13, 'Arepa con buche', 9000, 1),
(14, 'Arepa con morcilla', 8000, 1),
(15, 'Arepa con queso y lecherita', 8000, 1),
(16, 'Arepa con hogao', 3000, 1),
(17, 'Queso rayado', 2500, 2),
(18, 'Tocineta', 2000, 2),
(19, 'Pepinillos', 1500, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_pedido`
--

CREATE TABLE `tbl_productos_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_productos_pedido`
--

INSERT INTO `tbl_productos_pedido` (`id_pedido`, `id_producto`) VALUES
(12, 10),
(12, 3),
(13, 12),
(13, 14),
(14, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_producto`
--

CREATE TABLE `tbl_tipos_producto` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipos_producto`
--

INSERT INTO `tbl_tipos_producto` (`id`, `nombre`) VALUES
(1, 'Arepa'),
(2, 'Adición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_usuario`
--

CREATE TABLE `tbl_tipos_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipos_usuario`
--

INSERT INTO `tbl_tipos_usuario` (`id`, `nombre`) VALUES
(1, 'Cliente'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `num_pedidos` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `pass`, `num_pedidos`, `id_tipo_usuario`) VALUES
(1, 'pablo.villa', 'a665a45920422f9d417e4867efdc4f', 0, 1),
(2, 'paco', 'a665a45920422f9d417e4867efdc4f', 0, 1),
(8, 'polo', 'a665a45920422f9d417e4867efdc4f', 0, 1),
(9, 'pan', '1ce3faad18f65ba9ed3408dbb855d6', 0, 1),
(11, 'pera', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1),
(12, 'ivern', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1),
(13, 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, 2),
(14, 'pablo.vel', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1),
(15, 'carlos', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_estados`
--
ALTER TABLE `tbl_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_estado` (`id_estado`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_producto` (`id_tipo`);

--
-- Indices de la tabla `tbl_productos_pedido`
--
ALTER TABLE `tbl_productos_pedido`
  ADD KEY `fk_pedidos_productos` (`id_pedido`),
  ADD KEY `fk_productos_pedido` (`id_producto`);

--
-- Indices de la tabla `tbl_tipos_producto`
--
ALTER TABLE `tbl_tipos_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipos_usuario`
--
ALTER TABLE `tbl_tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_username` (`username`),
  ADD KEY `fk_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_estados`
--
ALTER TABLE `tbl_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_producto`
--
ALTER TABLE `tbl_tipos_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_usuario`
--
ALTER TABLE `tbl_tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`id_estado`) REFERENCES `tbl_estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `fk_tipo_producto` FOREIGN KEY (`id_tipo`) REFERENCES `tbl_tipos_producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_productos_pedido`
--
ALTER TABLE `tbl_productos_pedido`
  ADD CONSTRAINT `fk_pedidos_productos` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productos_pedido` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tbl_tipos_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
