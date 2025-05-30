-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 18:48:14
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_usuarios`
--

CREATE TABLE `carrito_usuarios` (
  `id` int(11) NOT NULL,
  `id_sesion` varchar(80) NOT NULL,
  `id_producto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creatinas`
--

CREATE TABLE `creatinas` (
  `id` int(11) NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `typeProduct` varchar(100) NOT NULL,
  `Content` varchar(25) NOT NULL,
  `Sabor` varchar(100) NOT NULL,
  `limiteEdad` varchar(100) NOT NULL,
  `id_producto` varchar(11) NOT NULL,
  `image_id` int(8) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `creatinas`
--

INSERT INTO `creatinas` (`id`, `nombreProducto`, `precio`, `existencia`, `typeProduct`, `Content`, `Sabor`, `limiteEdad`, `id_producto`, `image_id`, `categoria`) VALUES
(1, 'Creatina Birdman', 1299, 25, 'Polvo', '800g', 'N/A', 'Adulto', 'CR4598', 8, 'creatinas'),
(3, 'Creatina Valara', 399, 5, 'Polvo', '450g', 'N/A', 'Adulto', 'CR4568', 9, 'creatinas'),
(5, ' Creatina H5', 1299, 2, 'Polvo', '600g', 'N/A', 'Adulto', 'CR4567', 10, 'creatinas'),
(7, 'Proteina Falcon', 1286, 2, 'Polvo', '1.9kg', 'N/A', 'Adulto', 'PR3548', 11, 'proteinas'),
(9, 'Falcon Blue', 1286, 12, 'Polvo', '1.9kg', 'Vainilla', 'Adulto', 'PR3549', 12, 'proteinas'),
(10, 'Proteina Whey\r\n', 1199, 7, 'Polvo', '1kg', 'N/A', 'Adulto', 'PR3550', 1, 'proteinas'),
(11, 'Coconut Oil D3+K2', 424, 21, 'Aceite, Geles suaves, Cápsula', '320 cápsulas', 'N/A', 'Adulto', 'VI2145', 3, 'vitaminas'),
(12, 'Mens Blend', 324, 5, 'Cápsula', '180 cápsulas', 'N/A', 'Adulto', 'VI2146', 5, 'vitaminas'),
(13, 'Ments Platinum', 594, 15, 'Cápsula', '150 cápsulas', 'N/A', 'Adulto', 'VI2147', 6, 'vitaminas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` int(11) NOT NULL,
  `idUsuario` int(50) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_sesion` varchar(80) NOT NULL,
  `ActiveSesion` int(2) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `idUsuario`, `nombre`, `correo`, `username`, `password`, `id_sesion`, `ActiveSesion`, `isAdmin`) VALUES
(25, 1004, 'Ruben Jair ', 'rjls_97_dx@hotmail.com', 'test', '$2y$10$SkuAgODyv/Br.eZ2iQ0HA.txeVrwAulSlgBDaKDemCMfOy6m8tsWK', ' ', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `creatinas`
--
ALTER TABLE `creatinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `creatinas`
--
ALTER TABLE `creatinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
