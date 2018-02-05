-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2018 a las 23:07:59
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
-- Estructura de tabla para la tabla `tblarea`
--

CREATE TABLE IF NOT EXISTS `tblarea` (
  `Codigo` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tblarea`
--

INSERT INTO `tblarea` (`Codigo`, `Descripcion`) VALUES
(1, 'Eduacion'),
(2, 'Tecnologia'),
(3, 'Administracion de empresas'),
(4, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblarticulos`
--

CREATE TABLE IF NOT EXISTS `tblarticulos` (
  `Codigo` int(10) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `CodArea` int(10) NOT NULL,
  `CodEmpresa` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` int(1) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tblarticulos`
--

INSERT INTO `tblarticulos` (`Codigo`, `Titulo`, `Descripcion`, `CodArea`, `CodEmpresa`, `Fecha`, `Estado`) VALUES
(1, 'prueba', 'Esto es una prueba de la ppublicaciÃ³n de un articulo para que los usuarios se puedan postular de acuerdo a la descripcion del mismo', 1, 2, '2018-02-02', 1),
(2, 'Pasantia en Sistemas', 'Se presisa estudiante de ultimo semestre de la carrera de Ing. de Sistemas con los siguientes requisitos:\r\n\r\n1. Conocimientos de SQL Server.\r\n\r\n2.Conocimientos de Visual Studio.NET.\r\n\r\n3. Arquitectura de Software.\r\n\r\nInteresados enviar curriculum vitae por este medio.', 2, 4, '2018-02-02', 1),
(3, 'Pasantia en Sistemas de Informacion', 'Empresa del rubro de informatica precisa estudiante de ultimo semestre de ingenieria de sistemas con las siguientes aptitudes:\r\n1. nada\r\n2.nada\r\n3.nada\r\n4.algo\r\n\r\ninteresados llamar a nuestro numero de celular', 2, 7, '2018-02-02', 1);

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
  `Correo` varchar(50) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `tblempresas`
--

INSERT INTO `tblempresas` (`Codigo`, `Nombre`, `Direccion`, `Telefono`, `Descripcion`, `Correo`) VALUES
(2, 'Cotas', 'Av. Bolivar ', '3360000', 'empresa telefonica de santa cruz', ''),
(4, 'Cre', 'calle Honduras', '5678900', 'Empresa de Electrificacion de santa cruz', ''),
(5, 'Coca Cola', '4to Anillo entre paragua y canal cotoca', '567890', 'Fabrica de bebidas gaseosas', ''),
(6, 'Cotas', 'Av. Bolivar', '3360000', 'empresa telefonica de santa cruz', ''),
(7, 'Cotas', 'Av. Bolivar', '3360000', 'empresa telefonica de santa cruz', 'info@generaknow.com');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `tblpermisos`
--

INSERT INTO `tblpermisos` (`Codigo`, `CodRol`, `CodPro`, `Altas`, `Bajas`, `Modif`, `Selec`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 2, 1, 1, 1, 1, 1),
(7, 2, 2, 1, 1, 1, 1),
(8, 2, 3, 1, 1, 1, 1),
(9, 2, 4, 1, 1, 1, 1),
(10, 2, 5, 1, 1, 1, 1),
(11, 1, 6, 1, 1, 1, 1),
(12, 2, 6, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpostulaciones`
--

CREATE TABLE IF NOT EXISTS `tblpostulaciones` (
  `Codigo` int(100) NOT NULL AUTO_INCREMENT,
  `CodArticulo` int(10) NOT NULL,
  `CodUsuario` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Adjunto` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcar la base de datos para la tabla `tblpostulaciones`
--

INSERT INTO `tblpostulaciones` (`Codigo`, `CodArticulo`, `CodUsuario`, `Fecha`, `Adjunto`) VALUES
(1, 3, 1, '0000-00-00', ''),
(2, 3, 1, '0000-00-00', ''),
(3, 1, 1, '0000-00-00', ''),
(4, 1, 1, '0000-00-00', ''),
(5, 3, 1, '0000-00-00', ''),
(6, 3, 1, '0000-00-00', ''),
(7, 3, 1, '0000-00-00', ''),
(8, 3, 1, '2018-02-03', ''),
(9, 3, 1, '2018-02-03', ''),
(10, 1, 1, '2018-02-03', ''),
(11, 1, 1, '2018-02-03', ''),
(12, 1, 1, '2018-02-03', ''),
(13, 1, 1, '2018-02-03', ''),
(14, 1, 1, '2018-02-03', ''),
(15, 1, 1, '2018-02-03', ''),
(16, 1, 1, '2018-02-03', ''),
(17, 1, 1, '2018-02-03', '../dist/archivos/8.jpg'),
(18, 3, 1, '2018-02-03', '8.jpg'),
(19, 3, 1, '2018-02-03', '8.jpg'),
(20, 3, 1, '2018-02-03', '8.jpg'),
(21, 1, 1, '2018-02-03', '8.jpg'),
(22, 1, 1, '2018-02-04', 'der.png'),
(23, 1, 1, '2018-02-04', ''),
(24, 2, 1, '2018-02-04', 'examen.docx');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `tblprogramas`
--

INSERT INTO `tblprogramas` (`Codigo`, `Nombre`, `Url`, `Orden`) VALUES
(1, 'Dashboard', 'index.php', 1),
(2, 'Empresas', 'empresas.php', 2),
(3, 'Usuarios', 'usuarios.php', 3),
(4, 'Anuncios', 'articulos.php', 4),
(5, 'Publicidad', 'publicidad.php', 5),
(6, 'Perfil de Usuario', 'perfil.php', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE IF NOT EXISTS `tblrol` (
  `Codigo` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iEstado` int(1) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`Codigo`, `Nombre`, `Apellido`, `Login`, `Password`, `Pregunta`, `Respuesta`, `CodRol`) VALUES
(1, 'Carlos Hugo', 'Montero', 'carlos', 'dc599a9972fde3045dab59dbd1ae170b', 'primer auto', 'toyota', 1),
(3, 'Sebastian', 'Saldias', 'ssaldias', 'ba2fea79888ea8332f7b48ca3760cd54', 'prueba', 'prueba', 2),
(4, 'Gabriel', 'Colque', 'colque', '779150dff838f9e187a31380ece69da5', 'nada', 'nada', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
