--
-- Base de datos: `negocio`
--
CREATE DATABASE IF NOT EXISTS `negocio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `negocio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_codigo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_descripcion` text COLLATE utf8mb4_unicode_ci,
  `a_foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_precio_compra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `a_precio_venta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `a_cantidad` int(10) UNSIGNED NOT NULL DEFAULT '500',
  `a_cantidad_minima` int(10) UNSIGNED NOT NULL DEFAULT '20',
  `a_id_categoria` int(11) NOT NULL DEFAULT '0',
  `a_id_proveedor` int(11) NOT NULL DEFAULT '0',
  `a_editando` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `a_habilitado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `a_codigo` (`a_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`a_id`, `a_codigo`, `a_nombre`, `a_descripcion`, `a_foto`, `a_precio_compra`, `a_precio_venta`, `a_cantidad`, `a_cantidad_minima`, `a_id_categoria`, `a_id_proveedor`, `a_editando`, `a_habilitado`) VALUES
(1, 'M001', 'Sillón', NULL, NULL, '1000.00', '2800.00', 10, 5, 1, 0, '1', '1'),
(2, 'B0002', 'Heladera con frizzer', 'Heladera Con Freezer COLUMBIA Frio Directo 317 L. Htp 2334 Plata', '2.jpg', '14000.00', '25000.00', 10, 5, 2, 0, '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_observaciones` text COLLATE utf8mb4_unicode_ci,
  `c_habilitado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_editando` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`c_id`, `c_nombre`, `c_observaciones`, `c_habilitado`, `c_editando`) VALUES
(1, 'Muebles', 'De pino y algarrobo', '1', '0'),
(2, 'Linea Blanca', NULL, '1', '0'),
(3, 'TV, Audio y Video', NULL, '1', '0'),
(4, 'Electro y Aires', NULL, '1', '0'),
(5, 'Jardinería', NULL, '1', '0'),
(6, 'Bebés y Niños', NULL, '0', '0');
