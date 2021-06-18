-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-06-2021 a las 14:23:48
-- Versión del servidor: 8.0.21
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Casual'),
(2, 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` text,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias_idx` (`categoria_id`),
  KEY `fk_usuario_idx` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(32, 77, 2, 'Resident evil 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2021-06-18 10:32:20'),
(33, 77, 2, 'Bioshock', '                Lorem ipsum dolor sit amet, consectetur', '2021-06-18 10:32:34'),
(34, 77, 1, 'Undertale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis elit vel vulputate efficitur. Quisque gravida accumsan euismod. Vestibulum condimentum maximus magna a aliquet. In nec augue dolor. Vivamus lobortis urna vel turpis luctus feugiat. Suspendisse vitae dictum est, at suscipit lorem. Pellentesque blandit tincidunt dictum. Nulla varius quam vitae rhoncus finibus. Nullam eleifend tortor vitae velit laoreet egestas. Sed consequat venenatis mauris sit amet volutpat. Cras turpis nibh, auctor ut lacinia eu, tempus ut orci. Phasellus egestas, ante ut hendrerit vulputate, lacus neque aliquet odio, ac feugiat libero massa sed erat. In quam justo, pretium vitae eros eget, aliquet placerat dolor. Vestibulum vulputate risus at magna pulvinar, ut porta nulla lacinia.', '2021-06-18 10:40:31'),
(35, 77, 1, 'Dead Cells', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis elit vel vulputate efficitur. Quisque gravida accumsan euismod. Vestibulum condimentum maximus magna a aliquet. In nec augue dolor. Vivamus lobortis urna vel turpis luctus feugiat. Suspendisse vitae dictum est, at suscipit lorem. Pellentesque blandit tincidunt dictum. Nulla varius quam vitae rhoncus finibus. Nullam eleifend tortor vitae velit laoreet egestas. Sed consequat venenatis mauris sit amet volutpat. Cras turpis nibh, auctor ut lacinia eu, tempus ut orci. Phasellus egestas, ante ut hendrerit vulputate, lacus neque aliquet odio, ac feugiat libero massa sed erat. In quam justo, pretium vitae eros eget, aliquet placerat dolor. Vestibulum vulputate risus at magna pulvinar, ut porta nulla lacinia.', '2021-06-18 10:41:09'),
(36, 77, 2, 'Resident evil 3', '                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis elit vel vulputate efficitur. Quisque gravida accumsan euismod. Vestibulum condimentum maximus magna a aliquet. In nec augue dolor. Vivamus lobortis urna vel turpis luctus feugiat. Suspendisse vitae dictum est, at suscipit lorem. Pellentesque blandit tincidunt dictum. Nulla varius quam vitae rhoncus finibus. Nullam eleifend tortor vitae velit laoreet egestas. Sed consequat venenatis mauris sit amet volutpat. Cras turpis nibh, auctor ut lacinia eu, tempus ut orci. Phasellus egestas, ante ut hendrerit vulputate, lacus neque aliquet odio, ac feugiat libero massa sed erat. In quam justo, pretium vitae eros eget, aliquet placerat dolor. Vestibulum vulputate risus at magna pulvinar, ut porta nulla lacinia.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis elit vel vulputate efficitur. Quisque gravida accumsan euismod. Vestibulum condimentum maximus magna a aliquet. In nec augue dolor. Vivamus lobortis urna vel turpis luctus feugiat. Suspendisse vitae dictum est, at suscipit lorem. Pellentesque blandit tincidunt dictum. Nulla varius quam vitae rhoncus finibus. Nullam eleifend tortor vitae velit laoreet egestas. Sed consequat venenatis mauris sit amet volutpat. Cras turpis nibh, auctor ut lacinia eu, tempus ut orci. Phasellus egestas, ante ut hendrerit vulputate, lacus neque aliquet odio, ac feugiat libero massa sed erat. In quam justo, pretium vitae eros eget, aliquet placerat dolor. Vestibulum vulputate risus at magna pulvinar, ut porta nulla lacinia.', '2021-06-18 10:41:48'),
(37, 77, 1, 'GTA 3', '                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis elit vel vulputate efficitur. Quisque gravida accumsan euismod. Vestibulum condimentum maximus magna a aliquet. In nec augue dolor. Vivamus lobortis urna vel turpis luctus feugiat. Suspendisse vitae dictum est, at suscipit lorem. Pellentesque blandit tincidunt dictum. Nulla varius quam vitae rhoncus finibus. Nullam eleifend tortor vitae velit laoreet egestas. Sed consequat ', '2021-06-18 10:42:22');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `entradas_1`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `entradas_1`;
CREATE TABLE IF NOT EXISTS `entradas_1` (
`apellido` varchar(45)
,`categoria` varchar(45)
,`categoria_id` int
,`descripcion` text
,`fecha` datetime
,`foto` int
,`id` int
,`nombre` varchar(45)
,`titulo` varchar(45)
,`usuario_id` int
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `foto` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`, `fecha`, `foto`) VALUES
(77, 'Kevin', 'Benitez', 'kevinescudoderoble@gmail.com', '$2y$04$IOGVHl7edfUsSE5LdCacoeJWdtuXRdg2h4Zo9B2v3Fotp8pJJiNXW', '2021-06-18 10:29:39', 77);

-- --------------------------------------------------------

--
-- Estructura para la vista `entradas_1`
--
DROP TABLE IF EXISTS `entradas_1`;

DROP VIEW IF EXISTS `entradas_1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entradas_1`  AS SELECT `entradas`.`id` AS `id`, `entradas`.`usuario_id` AS `usuario_id`, `entradas`.`categoria_id` AS `categoria_id`, `entradas`.`titulo` AS `titulo`, `entradas`.`descripcion` AS `descripcion`, `categorias`.`nombre` AS `categoria`, `entradas`.`fecha` AS `fecha`, `usuarios`.`nombre` AS `nombre`, `usuarios`.`apellido` AS `apellido`, `usuarios`.`foto` AS `foto` FROM ((`entradas` join `usuarios` on((`entradas`.`usuario_id` = `usuarios`.`id`))) join `categorias` on((`entradas`.`categoria_id` = `categorias`.`id`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
