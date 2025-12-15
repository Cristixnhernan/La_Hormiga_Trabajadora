-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2025 a las 15:30:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_usuario`, `id_producto`, `cantidad`) VALUES
(11, 2, 2, 1),
(12, 2, 3, 1),
(13, 2, 1, 2),
(14, 1, 2, 1),
(16, 3, 31, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `comentario`, `fecha`) VALUES
(1, 1, 'MUY BIEN SERVICIO', '2025-12-13 21:35:29'),
(2, 1, 'Hola', '2025-12-13 22:23:50'),
(3, 2, 'Podrian agregar a la venta papel de baño', '2025-12-14 00:37:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`) VALUES
(1, 'Arroz', 'Arroz blanco 1 kg', 28.00, 50, 'arroz.jpg'),
(2, 'Frijol', 'Frijol negro 1 kg', 32.00, 50, 'frijol.jpg'),
(3, 'Huevo', 'Huevo blanco 12 piezas', 45.00, 40, 'huevo.jpeg'),
(4, 'Pan', 'Pan de caja', 38.00, 30, 'pan.jpg'),
(5, 'Tortillas', 'Tortilla de maíz 1 kg', 22.00, 60, 'tortillas.jpg'),
(6, 'Azúcar', 'Azúcar refinada 1 kg', 26.00, 40, 'azucar.jpg'),
(7, 'Sal', 'Sal de mesa 1 kg', 15.00, 50, 'sal.jpeg'),
(8, 'Aceite', 'Aceite vegetal 1 L', 48.00, 35, 'aceite.jpeg'),
(9, 'Leche', 'Leche entera 1 L', 27.00, 45, 'leche.jpg'),
(10, 'Café', 'Café soluble 200 g', 85.00, 25, 'cafe.jpg'),
(11, 'Refrescos', 'Refresco 2 L', 38.00, 50, 'refresco.jpeg'),
(12, 'Jugos', 'Jugo en caja 1 L', 25.00, 40, 'jugo.png'),
(13, 'Agua embotellada', 'Agua purificada 1.5 L', 15.00, 60, 'agua.jpeg'),
(14, 'Atún', 'Atún en lata', 18.00, 50, 'atun.jpeg'),
(15, 'Sardinas', 'Sardinas en lata', 16.00, 40, 'sardina.jpeg'),
(16, 'Verduras enlatadas', 'Verduras mixtas en lata', 20.00, 35, 'ensalada.jpg'),
(17, 'Frutas enlatadas', 'Fruta en almíbar', 22.00, 30, 'frutaenlatada.jpeg'),
(18, 'Jamón de Pavo', 'Jamón de pavo 250 g', 42.00, 30, 'jamon.jpeg'),
(19, 'Salchicha', 'Salchicha tipo viena', 35.00, 35, 'salchicha.png'),
(20, 'Queso Oaxaca', 'Queso manchego 250 g', 55.00, 25, 'quesooaxaca.png'),
(21, 'Papel higiénico', 'Papel higiénico 4 rollos', 45.00, 40, 'papelhiguienico.png'),
(22, 'Jabón en polvo', 'Jabón de tocador', 18.00, 50, 'jabon.png'),
(23, 'Shampoo', 'Shampoo 400 ml', 48.00, 30, 'shampoo.png'),
(24, 'Pasta de dientes', 'Pasta dental 100 ml', 28.00, 35, 'pasta.jpeg'),
(25, 'Jabón Liquido.', 'Jabón Liquido 2L', 42.00, 30, 'jabonliquido.png'),
(26, 'Limpiador multiusos', 'Limpiador líquido', 25.00, 40, 'limpiadormultiusos.jpeg'),
(27, 'Cloro', 'Cloro 1 L', 18.00, 50, 'cloro.png'),
(28, 'Veladoras', 'Velas de emergencia', 20.00, 30, 'veladoras.png'),
(29, 'Cerillos', 'Caja de cerillos', 8.00, 60, 'cerillos.jpeg'),
(30, 'Pilas', 'Pilas AA (par)', 28.00, 40, 'pilas.png'),
(31, 'Cigarros', 'Cigarros cajetilla', 72.00, 20, 'cigarros.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `contrasena`) VALUES
(1, 'CRISTIAN HERNAN', 'cristianchhh00@gmail.com', '$2y$10$3GwCaTSrEDwbavwdXyv.2OIJBa9ShVkolHl/SPThj/qsAYSmiIV7q'),
(2, 'Paola Matamoros', 'paolamatamorostapia@gmail.com', '$2y$10$dVq5UsQRlXUjtqAglB8.c.Cw4FblY25mU4Fg0sIvWpWsBPokmwnvu'),
(3, 'benito', 'benito123@gmail.com', '$2y$10$dMJP4Za9OlCLEsZtKqrpT.zkcdziReW.3WpcJ49JC7rzB5JFM4Ene');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
