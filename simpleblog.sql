-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-09-2021 a las 02:49:32
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simpleblog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre`, `imagen`, `created`, `modified`) VALUES
(5, 'PHP & MySQL for Dummies', '1631757521_book one.jpg', '2021-09-16 00:45:15', '2021-09-16 02:04:54'),
(7, 'C# for Dummies', '1631757913_book four.jpg', '2021-09-16 02:05:13', '2021-09-16 02:05:13'),
(8, 'Java for Dummies', '1631757936_book three.jpg', '2021-09-16 02:05:36', '2021-09-16 02:05:36'),
(9, 'Javascript for Dummies', '1631757960_book two.jpg', '2021-09-16 02:06:00', '2021-09-16 02:06:00'),
(10, 'Python for Dummies', '1631757986_book five.jpg', '2021-09-16 02:06:26', '2021-09-16 02:06:26'),
(11, 'Undefined book for Dummies', '1631758012_book-plahceholder.png', '2021-09-16 02:06:52', '2021-09-16 02:06:52'),
(12, 'Libro de muestras', '1631758963_book-plahceholder.png', '2021-09-16 02:22:43', '2021-09-16 02:22:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20210915231133, 'CreateLibros', '2021-09-16 05:19:36', '2021-09-16 05:19:37', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
