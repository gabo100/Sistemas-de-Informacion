-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-02-2018 a las 13:29:49
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempresas`
--

CREATE TABLE IF NOT EXISTS `tblempresas` (
  `Codigo` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tblempresas`
--

INSERT INTO `tblempresas` (`Codigo`, `Nombre`, `Direccion`, `Telefono`, `Descripcion`) VALUES
(2, 'Cotas', 'Av. Bolivar ', '3360000', 'empresa telefonica de santa cruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpermisos`
--

CREATE TABLE IF NOT EXISTS `tblpermisos` (
  `Codigo` int(5) NOT NULL AUTO_INCREMENT,
  `CodRol` int(5) NOT NULL,
  `CodPro` int(5) NOT NULL,
  `Altas` int(1) NOT NULL,
  `Bajas` int(1) NOT NULL,
  `Modif` int(1) NOT NULL,
  `Selec` int(1) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `CodRol` (`CodRol`),
  KEY `CodPro` (`CodPro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tblpermisos`
--

INSERT INTO `tblpermisos` (`Codigo`, `CodRol`, `CodPro`, `Altas`, `Bajas`, `Modif`, `Selec`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprogramas`
--

CREATE TABLE IF NOT EXISTS `tblprogramas` (
  `Codigo` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Orden` int(2) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tblprogramas`
--

INSERT INTO `tblprogramas` (`Codigo`, `Nombre`, `Url`, `Orden`) VALUES
(1, 'Dashboard', 'index.php', 1),
(2, 'Empresas', 'empresas.php', 2),
(3, 'Usuarios', 'usuarios.php', 3),
(4, 'Anuncios', 'articulos.php', 4),
(5, 'Publicidad', 'publicidad.php', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE IF NOT EXISTS `tblrol` (
  `Codigo` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iEstado` int(1) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `tblrol`
--

INSERT INTO `tblrol` (`Codigo`, `Nombre`, `iEstado`) VALUES
(1, 'Admin', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE IF NOT EXISTS `tblusuarios` (
  `Codigo` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Pregunta` varchar(100) NOT NULL,
  `Respuesta` varchar(100) NOT NULL,
  `CodRol` int(5) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`Codigo`, `Nombre`, `Apellido`, `Login`, `Password`, `Pregunta`, `Respuesta`, `CodRol`) VALUES
(1, 'Carlos Hugo', 'Montero', 'carlos', 'dc599a9972fde3045dab59dbd1ae170b', 'primer auto', 'toyota', 1),
(3, 'Sebastian', 'Saldias', 'ssaldias', 'ba2fea79888ea8332f7b48ca3760cd54', 'uno', 'dos', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
