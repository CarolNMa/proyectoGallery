-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 17:23:07
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gallery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` tinyint(4) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `descripcion`) VALUES
(1, 'animales'),
(2, 'Sitios'),
(3, 'Platos internacionales'),
(4, 'Arquitectura'),
(5, 'Eventos'),
(6, 'Arte y Creatividad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idimagen` int(11) NOT NULL,
  `idCategoria` tinyint(4) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `idUsuario` bigint(20) NOT NULL,
  `valoracion` smallint(6) NOT NULL DEFAULT 0,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0= Por Aprobar, 1= Aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimagen`, `idCategoria`, `foto`, `descripcion`, `idUsuario`, `valoracion`, `estado`) VALUES
(64, 2, 'favelas.jpg', 'Favela es el nombre dado en Brasil a los asentamientos precarios o informales que crecen en torno o dentro mismo de las ciudades grandes del país. Este término portugués, muy usado en Brasil, es sinónimo de «chabola» o «invasión» en castellano. Según la definición del Programa Favela', 400, 0, '1'),
(89, 1, 'tigre.jpg', 'yghujtfyrughnjhgyuhjhgubhj', 15, 0, '1'),
(98, 5, 'bodas.jpg', 'boda', 78, 0, '1'),
(764, 2, 'perro.jpg', 'cancun es lindo', 14, 0, '1'),
(765, 3, 'bandejapaisa.jpg', 'La bandeja paisa es uno de los platos más representativos de Colombia y la insignia de la gastronomía antioqueña, y es propio de esta región, Antioquia.', 120, 0, '1'),
(766, 1, 'WIN_20220822_14_06_50_Pro.jpg', 'penes', 85, 0, '1'),
(772, 4, 'WhatsApp Image 2023-09-25 at 9.03.56 AM.jpeg', 'ujyhgt', 120, 0, '1'),
(775, 5, 'WIN_20230524_16_03_46_Pro.jpg', 'ola pues', 174, 0, '1'),
(776, 3, 'WIN_20220822_14_07_10_Pro.jpg', 'tghgf', 174, 0, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` bigint(20) NOT NULL,
  `nomUsuario` varchar(50) NOT NULL,
  `conUsuario` varchar(100) NOT NULL,
  `emailUsuario` varchar(30) NOT NULL,
  `tipoUsuario` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=Registrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomUsuario`, `conUsuario`, `emailUsuario`, `tipoUsuario`) VALUES
(14, 'cristo fernando', '1111', 'cristo@gmail.com', 1),
(15, 'carol marentes', '1212', 'carolma@gmail.com', 1),
(17, 'dairo ortiz', '9099871', 'dairo1@gmail.com', 1),
(78, 'Karen Puentes', '1010', 'karen1@gmail.com', 2),
(85, 'Mariana pugliese', '1011', 'mari@gmail.com', 2),
(120, 'Melany Ortiz Bscubiche', '1243', 'MELA@gmail.com', 2),
(174, 'kevin burgos', 'kevin', 'kevin123@gmail.com', 2),
(400, 'Franklin javier  lopez', '1556', 'frankli@perro.com', 2),
(433, 'Sara Manuela Rojas', '1019', 'manue@gail.com', 2),
(622, 'Francys Colmenares', 'samu', 'francy1@gmail.com', 2),
(654, 'sara puentes', '122', 'sara@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idimagen`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idimagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imagenes_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
