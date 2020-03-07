-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-02-2020 a las 15:01:58
-- Versión del servidor: 5.6.46-cll-lve
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ssoma_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id` int(2) NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `medio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `antecedentes` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `empleado`, `empresa`, `fecha`, `medio`, `antecedentes`, `tipo`) VALUES
(1, '002', '20601083427', '2016-06-01', 'DECLARACION', 'NO', 'POLICIALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_capacitaciones`
--

CREATE TABLE `archivos_capacitaciones` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` char(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_simulacros`
--

CREATE TABLE `archivos_simulacros` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `nombre` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` char(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_monitoreo`
--

CREATE TABLE `area_monitoreo` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `colaboradores` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `informe` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `conclusiones` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `recomendaciones` tinytext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `jornal` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`, `jornal`) VALUES
(1, 'ADMINISTRADOR', 55.00),
(2, 'CONTADOR', 55.00),
(3, 'JEFE SISTEMAS', 50.00),
(4, 'GERENTE', 60.00),
(5, 'ALBAÃ‘IL', 40.00),
(6, 'MAESTRO OBRA', 60.00),
(7, 'JEFE DE OPERACIONES', 55.00),
(8, 'ALMACENERO', 45.00),
(9, 'JEFE DE CALIDAD', 55.00),
(10, 'JORNALERO(A)', 28.00),
(11, 'DESTAJERO(A)', 28.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(2) NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombres`) VALUES
(1, 'EMPLEADO'),
(2, 'OBRERO'),
(3, 'PRACTICANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_documentos`
--

CREATE TABLE `clase_documentos` (
  `id` int(2) NOT NULL,
  `nombre` char(25) NOT NULL,
  `abreviado` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase_documentos`
--

INSERT INTO `clase_documentos` (`id`, `nombre`, `abreviado`) VALUES
(1, 'POLITICA', 'POL'),
(2, 'DECLARACION', 'DEC'),
(3, 'REGLAMENTO', 'RGL'),
(4, 'REGISTRO', 'REG'),
(5, 'PROCEDIMIENTO', 'PRO'),
(6, 'MEMORANDUM', 'MEM'),
(7, 'SUPERVISION', 'SUP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_emergencia`
--

CREATE TABLE `contacto_emergencia` (
  `id` int(2) NOT NULL DEFAULT '1',
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `parentesco` char(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto_emergencia`
--

INSERT INTO `contacto_emergencia` (`id`, `empleado`, `empresa`, `nombre_completo`, `direccion`, `sexo`, `telefono`, `parentesco`) VALUES
(1, '011', '20601083427', 'AVENDAÃ‘O MAMANI ELISVAN SLEYTER', 'CIUDAD NUEVA CMTE 3  MZ-21  LT-22', 'M', '935496894', 'XXXXXX'),
(1, '012', '20601083427', 'HUAYTA ARUQUIPA HERNAN', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 ', 'M', '954405449', 'CONYUGE'),
(1, '016', '20601083427', 'QUENTA CABALLERO ADRIAN FERNANDO', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4', 'M', '935976732', 'HIJO'),
(1, '017', '20601083427', 'HUALLPA CALISAYA 73817774', 'ASOC VIV. VIRGEN DE LAS MERCEDES MZ-EÂ´ LT-5', 'F', '935418656', 'HIJA'),
(1, '018', '20601083427', 'FLORES CALIZAYA STEFANY', 'URB NUESTRA SRA DEL CARMEN NÂ°331-A', 'F', '945431330', 'HIJA'),
(1, '020', '20601083427', 'CALIZAYA HERRERA LORENZO', 'ASOC VIV LOS LIBERTADORES MZ-462  LT-12', 'M', '996184064', 'PADRE'),
(1, '021', '20601083427', 'COAQUIRA BLANCO ROSA', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 ', 'F', '949491268', 'MADRE'),
(1, '027', '20601083427', 'ALANOCA CCAMA SANDRA', 'ASOC VIV VILLA EL TRIUNFO MZ-339  LT-2', 'F', '998500012', 'HIJA'),
(1, '029', '20601083427', 'CANAZA CENTENO ANA MARIELA', 'ASOC 24 DE FEBRERO MZ-D  LT-6', 'F', '957061891', 'HIJA'),
(1, '031', '20601083427', 'FLORES  CHALLCO GEOVANA', 'ASOC VIV LAS COLMENAS MZ-93  LT-1', 'F', '937268106', 'HIJA'),
(1, '033', '20601083427', 'CHAMBILLA CHAMBILLA ANIBAL', 'VISTA ALEGRE MZ-31  LT-12', 'M', '956647210', 'PRIMO'),
(1, '036', '20601083427', 'CHAMBILLA CHAMBILLA JOSE CARLOS', 'ASOC VISTA ALEGRE MZ-31  LT-12', 'M', '950000000', 'HIJO'),
(1, '037', '20601083427', 'QUILLE CHOQUE CECILIA ESTEFANY', 'AV MARIANO NECOCHEA MZ-171  LT-21  CMTE 28', 'F', '938760082', 'HIJA'),
(2, '011', '20601083427', 'MAMANI AVENDAÃ‘O KATHERINE ESTEPHANY', 'CIUDAD NUEVA CMTE 3  MZ-21  LT-22', 'F', '936885114', 'HIJA'),
(2, '016', '20601083427', 'QUENTA CABALLERO CRISTIAN', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4', 'M', '956836750', 'HIJO'),
(2, '017', '20601083427', 'HUALLPA MAMANI RICARDO', 'ASOC VIV. VIRGEN DE LAS MERCEDES MZ-EÂ´ LT-5', 'M', '952517550', 'ESPOSO'),
(2, '018', '20601083427', 'FLORES MAMANI ROLANDO', 'URB NUESTRA SRA DEL CARMEN NÂ°331-A', 'M', '942163210', 'ESPOSO'),
(2, '021', '20601083427', 'COLQUE  MAYTA GREGORIO', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 ', 'M', '950091259', 'FAMILIAR'),
(2, '027', '20601083427', 'ALANOCA RAMIREZ LUIS', 'ASOC VIV VILLA EL TRIUNFO MZ-339  LT-2', 'M', '951898720', 'ESPOSO'),
(2, '029', '20601083427', 'CANAZA CENTENO DANIA MARIBEL', 'ASOC 24 DE FEBRERO MZ-D  LT-6', 'F', '952212832', 'HIJA'),
(2, '031', '20601083427', 'ROMMEL MAMANI JORGE', 'ASOC VIV LAS COLMENAS MZ-93  LT-1', 'M', '954626773', 'CONVIVIENTE'),
(2, '033', '20601083427', 'CHAMBILLA QUIÃ‘ONES FRANCISCA', 'VISTA ALEGRE MZ-31  LT-12', 'F', '950880351', 'TIA'),
(2, '036', '20601083427', 'CHAMBILLA SUCSO JAVIER', 'ASOC VISTA ALEGRE MZ-31  LT-12', 'M', '957222622', 'ESPOSO'),
(2, '037', '20601083427', 'QUILLE CHOQUE KENNY CHARLY', 'AV MARIANO NECOCHEA MZ-171  LT-21  CMTE 28', 'M', '952245448', 'HIJO'),
(3, '029', '20601083427', 'CANAZA CONDORI ALFREDO', 'ASOC 24 DE FEBRERO MZ-D  LT-6', 'M', '97320337', 'ESPOSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(3) NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL DEFAULT '20601083427',
  `institucion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `duracion` int(5) DEFAULT NULL,
  `tipo_duracion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_familiares`
--

CREATE TABLE `datos_familiares` (
  `dni` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL DEFAULT '20601083427',
  `nombre_completo` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` char(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `parentesco` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_familiares`
--

INSERT INTO `datos_familiares` (`dni`, `empleado`, `empresa`, `nombre_completo`, `fecha_nacimiento`, `telefono`, `sexo`, `parentesco`, `direccion`) VALUES
('00000000', '018', '20601083427', 'CALIZAYA GIORDANO FLORES', '1993-09-27', '950000000', 'M', 'HIJO', 'URB NUESTRA SRA DEL CARMEN NÂ°331-A'),
('00426658', '018', '20601083427', 'FLORES MAMANI ROLANDO', '1961-06-22', '942163210', 'M', 'ESPOSO', 'URB NUESTRA SRA DEL CARMEN NÂ°331-A'),
('00437200', '029', '20601083427', 'CARAZA CONDORI ALFREDO', '1968-11-24', '97320337', 'M', 'ESPOSO', 'ASOC 24 DE FEBRERO MZ-D  LT-C'),
('00446538', '016', '20601083427', 'QUENTA JALLITA ALFREDO B.', '1972-01-05', '952931837', 'M', 'ESPOSO', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4'),
('00450798', '017', '20601083427', 'HUALLPA MAMANI RICARDO', '1972-05-13', '952517550', 'M', 'ESPOSO', 'ASOC VIV. VIRGEN DE LAS MERCEDES MZ-EÂ´ LT-5'),
('00488082', '036', '20601083427', 'CHAMBILLA SUCSO JAVIER', '1968-12-11', '957222622', 'M', 'ESPOSO', 'ASOC VISTA ALEGRE MZ-31  LT-12'),
('01781585', '012', '20601083427', 'QUISPE AYALA LUZ CLARITA', '2008-06-25', '921856045', 'F', 'HIJA', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 '),
('12121212', '018', '20601083427', 'FLORES CALIZAYA STEFANY', '1111-12-01', '945431330', 'F', 'HIJA', 'URB NUESTRA SRA DEL CARMEN NÂ°331-A'),
('32976403', '001', '20601083427', 'PANIAGUA PAREDES SANTA', '1972-12-10', '996473907', 'F', 'CONYUGE', 'CHIMBOTE'),
('43900074', '029', '20601083427', 'CANAZA CENTENO DANIA MARIBEL', '1985-11-23', '952212832', 'F', 'HIJA', 'ASOC 24 DE FEBRERO MZ-D  LT-6'),
('47469868', '037', '20601083427', 'QUILLE CHOQUE KENNY CHARLY', '1992-11-26', '952245448', 'M', 'HIJO', 'AV MARIANO NECOCHEA MZ-171  LT-21  CMTE 28'),
('48280707', '029', '20601083427', 'CANAZA CENTENO JESICA M.', '1991-12-16', '962523654', 'F', 'HIJA', 'ASOC 24 DE FEBRERO MZ-D  LT-6'),
('60817442', '001', '20601083427', 'VILCA PANIAGUA SAORI', '2006-08-18', '957169004', 'F', 'HIJA', 'CHIMBOTE'),
('63400252', '020', '20601083427', 'QUIÃ‘ONEZ CALIZAYA NICOL A.', '2014-07-24', '988527217', 'F', 'HIJA', 'ASOC VIV LOS LIBERTADORES MZ-462  LT-12'),
('70000368', '001', '20601083427', 'VILCA ESPINOZA CRISTHIAN', '1995-07-18', '974631748', 'M', 'HIJO', 'CHIMBOTE'),
('70360484', '011', '20601083427', 'MAMANI AVENDAÃ‘O KATHERINE ESTEPHANY', '2001-08-01', '988210561', 'F', 'HIJO', 'CIUDAD NUEVA CMTE 3  MZ-21  LT-22'),
('70452440', '016', '20601083427', 'QUENTA CABALLERO LEONARDO AUGUSTO', '1995-04-04', '952931837', 'M', 'HIJO', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4'),
('70452441', '016', '20601083427', 'QUENTA CABALLERO ADRIAN FERNANDO', '1998-04-29', '952931837', 'M', 'HIJO', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4'),
('70452444', '016', '20601083427', 'QUENTA CABALLERO CRISTIAN BANNER', '1992-10-21', '952931837', 'M', 'HIJO', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4'),
('71061851', '016', '20601083427', 'QUENTA CABALLERO MARIANA A.', '2004-09-11', '952931837', 'F', 'HIJA', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4'),
('71726059', '037', '20601083427', 'QUILLE CHOQUE CECILIA ESTEFANY', '1994-02-26', '938760082', 'F', 'HIJA', 'AV MARIANO NECOCHEANMZ-171  LT-21  CMTE 28'),
('72944191', '001', '20601083427', 'VILCA ESPINOZA HAROL', '1993-01-07', '950283633', 'M', 'HIJO', 'SANTIAGO'),
('73817774', '017', '20601083427', 'HUALLPA CALISAYA DAYSI GABRIELA', '1998-05-19', '935418656', 'F', 'HIJA', 'ASOC VIV. VIRGEN DE LAS MERCEDES MZ-EÂ´ LT-5'),
('73998062', '027', '20601083427', 'ALANOCA CCAMA SANDRA', '1997-01-01', '998500012', 'F', 'HIJA', 'ASOC VIV VILLA EL TRIUNFO MZ-339  LT-2'),
('74878233', '021', '20601083427', 'CONDORI CALLAHUARI YUBERICA ALMUDERA', '2004-06-20', '946989422', 'F', 'HIJA', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 '),
('76081495', '031', '20601083427', 'FLORES CHALLCO IVAN', '2002-06-26', '942996470', 'M', 'HIJO', 'ASOC VIV LAS COLMENAS MZ-93  LT-1'),
('77034984', '036', '20601083427', 'CHAMBILLA  CHAMBILLA ROSARIO PATRICIA', '1994-08-04', '950880381', 'F', 'HIJA', 'ASOC VISTA ALEGRE MZ-31  LT-12'),
('77481399', '036', '20601083427', 'CHAMBILLA CHAMBILLA ANIBAL', '1996-05-16', '950880381', 'M', 'HIJO', 'ASOC VISTA ALEGRE MZ-31  LT-12'),
('78186562', '011', '20601083427', 'CANAHUA AVENDAÃ‘O ALEXIS ABDIEL', '2013-07-06', '988210561', 'M', 'HIJO', 'CIUDAD NUEVA CMTE 3  MZ-21  LT-22'),
('81067475', '012', '20601083427', 'HUAYTA AYALA RUTH ANGELA', '2012-07-15', '921856045', 'F', 'HIJA', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 '),
('81139816', '020', '20601083427', 'QUIÃ‘ONEZ CALIZAYA MARIA A.', '2013-02-19', '988527217', 'F', 'HIJA', 'ASOC VIV LOS LIBERTADORES MZ-462  LT-12'),
('81416638', '031', '20601083427', 'FLORES CHALLCO GEOVANA', '1996-04-16', '937268106', 'F', 'HIJA', 'ASOC VIV LAS COLMENAS MZ-93  LT-1'),
('81595849', '012', '20601083427', 'HUAYTA AYALA ERIK NEYMAR', '2014-08-17', '921856045', 'M', 'HIJO', 'ASOC. VILLA SOL NACIENTE MZ-D  LT-9 '),
('81604556', '031', '20601083427', 'FLORES CHALLCO DILAN', '1998-09-26', '942996470', 'M', 'HIJO', 'ASOC VIV LAS COLMENAS MZ-93  LT-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'AMAZONAS'),
(2, 'ANCASH'),
(3, 'APURIMAC'),
(4, 'AREQUIPA'),
(5, 'AYACUCHO'),
(6, 'CAJAMARCA'),
(7, 'CALLAO'),
(8, 'CUSCO'),
(9, 'HUANCAVELICA'),
(10, 'HUANUCO'),
(11, 'ICA'),
(12, 'JUNIN'),
(13, 'LA LIBERTAD'),
(14, 'LAMBAYEQUE'),
(15, 'LIMA'),
(16, 'LORETO'),
(17, 'MADRE DE DIOS'),
(18, 'MOQUEGUA'),
(19, 'PASCO'),
(20, 'PIURA'),
(21, 'PUNO'),
(22, 'SAN MARTIN'),
(23, 'TACNA'),
(24, 'TUMBES'),
(25, 'UCAYALI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_historial_epp`
--

CREATE TABLE `detalle_historial_epp` (
  `id` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `epp` int(2) NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_historial_epp`
--

INSERT INTO `detalle_historial_epp` (`id`, `empresa`, `empleado`, `epp`, `fecha_devolucion`, `estado`) VALUES
(1, '10469932091', '6', 8, '2017-02-10', '1'),
(1, '20601083427', '001', 13, '7000-01-01', '0'),
(1, '20601083427', '002', 5, '7000-01-01', '0'),
(1, '20601083427', '142', 13, '7000-01-01', '0'),
(1, '20603442769', '1', 4, '7000-01-01', '0'),
(1, '20603442769', '1', 7, '7000-01-01', '0'),
(1, '20603442769', '1', 12, '2019-03-27', '1'),
(2, '10469932091', '7', 1, '7000-01-01', '0'),
(2, '10469932091', '7', 4, '7000-01-01', '0'),
(2, '10469932091', '7', 5, '7000-01-01', '0'),
(2, '10469932091', '7', 7, '7000-01-01', '0'),
(2, '10469932091', '7', 9, '2018-08-05', '1'),
(2, '20603442769', '1', 7, '7000-01-01', '0'),
(2, '20603442769', '1', 9, '7000-01-01', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `provincia` int(2) NOT NULL,
  `departamento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `nombre`, `provincia`, `departamento`) VALUES
(1, 'CHACHAPOYAS', 1, 1),
(1, 'HUARAZ', 1, 2),
(1, 'ABANCAY', 1, 3),
(1, 'AREQUIPA', 1, 4),
(1, 'AYACUCHO', 1, 5),
(1, 'CAJAMARCA', 1, 6),
(1, 'CALLAO', 1, 7),
(1, 'CUSCO', 1, 8),
(1, 'HUANCAVELICA', 1, 9),
(1, 'HUANUCO', 1, 10),
(1, 'ICA', 1, 11),
(1, 'HUANCAYO', 1, 12),
(1, 'TRUJILLO', 1, 13),
(1, 'CHICLAYO', 1, 14),
(1, 'LIMA', 1, 15),
(1, 'IQUITOS', 1, 16),
(1, 'TAMBOPATA', 1, 17),
(1, 'MOQUEGUA', 1, 18),
(1, 'CHAUPIMARCA', 1, 19),
(1, 'PIURA', 1, 20),
(1, 'PUNO', 1, 21),
(1, 'MOYOBAMBA', 1, 22),
(1, 'TACNA', 1, 23),
(1, 'TUMBES', 1, 24),
(1, 'CALLERIA', 1, 25),
(1, 'BAGUA', 2, 1),
(1, 'AIJA', 2, 2),
(1, 'ANDAHUAYLAS', 2, 3),
(1, 'CAMANA', 2, 4),
(1, 'CANGALLO', 2, 5),
(1, 'CAJABAMBA', 2, 6),
(1, 'ACOMAYO', 2, 8),
(1, 'ACOBAMBA', 2, 9),
(1, 'AMBO', 2, 10),
(1, 'CHINCHA ALTA', 2, 11),
(1, 'CONCEPCION', 2, 12),
(1, 'ASCOPE', 2, 13),
(1, 'FERRE?AFE', 2, 14),
(1, 'BARRANCA', 2, 15),
(1, 'YURIMAGUAS', 2, 16),
(1, 'MANU', 2, 17),
(1, 'OMATE', 2, 18),
(1, 'YANAHUANCA', 2, 19),
(1, 'AYABACA', 2, 20),
(1, 'AZANGARO', 2, 21),
(1, 'BELLAVISTA', 2, 22),
(1, 'CANDARAVE', 2, 23),
(1, 'ZORRITOS', 2, 24),
(1, 'RAYMONDI', 2, 25),
(1, 'JUMBILLA', 3, 1),
(1, 'LLAMELLIN', 3, 2),
(1, 'ANTABAMBA', 3, 3),
(1, 'CARAVELI', 3, 4),
(1, 'SANCOS', 3, 5),
(1, 'CELENDIN', 3, 6),
(1, 'ANTA', 3, 8),
(1, 'LIRCAY', 3, 9),
(1, 'LA UNION', 3, 10),
(1, 'NASCA', 3, 11),
(1, 'CHANCHAMAYO', 3, 12),
(1, 'BOLIVAR', 3, 13),
(1, 'LAMBAYEQUE', 3, 14),
(1, 'CAJATAMBO', 3, 15),
(1, 'NAUTA', 3, 16),
(1, 'I?APARI', 3, 17),
(1, 'ILO', 3, 18),
(1, 'OXAPAMPA', 3, 19),
(1, 'HUANCABAMBA', 3, 20),
(1, 'MACUSANI', 3, 21),
(1, 'SAN JOS? DE SISA', 3, 22),
(1, 'LOCUMBA', 3, 23),
(1, 'ZARUMILLA', 3, 24),
(1, 'PADRE ABAD', 3, 25),
(1, 'NIEVA', 4, 1),
(1, 'CHACAS', 4, 2),
(1, 'CHALHUANCA', 4, 3),
(1, 'APLAO', 4, 4),
(1, 'HUANTA', 4, 5),
(1, 'CHOTA', 4, 6),
(1, 'CALCA', 4, 8),
(1, 'CASTROVIRREYNA', 4, 9),
(1, 'HUACAYBAMBA', 4, 10),
(1, 'PALPA', 4, 11),
(1, 'JAUJA', 4, 12),
(1, 'CHEPEN', 4, 13),
(1, 'CANTA', 4, 15),
(1, 'RAMON CASTILLA', 4, 16),
(1, 'CHULUCANAS', 4, 20),
(1, 'JULI', 4, 21),
(1, 'SAPOSOA', 4, 22),
(1, 'TARATA', 4, 23),
(1, 'PURUS', 4, 25),
(1, 'LAMUD', 5, 1),
(1, 'CHIQUIAN', 5, 2),
(1, 'TAMBOBAMBA', 5, 3),
(1, 'CHIVAY', 5, 4),
(1, 'SAN MIGUEL', 5, 5),
(1, 'CONTUMAZA', 5, 6),
(1, 'YANAOCA', 5, 8),
(1, 'CHURCAMPA', 5, 9),
(1, 'LLATA', 5, 10),
(1, 'PISCO', 5, 11),
(1, 'JUNIN', 5, 12),
(1, 'JULCAN', 5, 13),
(1, 'SAN VICENTE DE CA?ETE', 5, 15),
(1, 'REQUENA', 5, 16),
(1, 'PAITA', 5, 20),
(1, 'ILAVE', 5, 21),
(1, 'LAMAS', 5, 22),
(1, 'SAN NICOLAS', 6, 1),
(1, 'CARHUAZ', 6, 2),
(1, 'CHINCHEROS', 6, 3),
(1, 'CHUQUIBAMBA', 6, 4),
(1, 'PUQUIO', 6, 5),
(1, 'CUTERVO', 6, 6),
(1, 'SICUANI', 6, 8),
(1, 'HUAYTARA', 6, 9),
(1, 'RUPA-RUPA', 6, 10),
(1, 'SATIPO', 6, 12),
(1, 'OTUZCO', 6, 13),
(1, 'HUARAL', 6, 15),
(1, 'CONTAMANA', 6, 16),
(1, 'SULLANA', 6, 20),
(1, 'HUANCANE', 6, 21),
(1, 'JUANJUI', 6, 22),
(1, 'BAGUA GRANDE', 7, 1),
(1, 'SAN LUIS', 7, 2),
(1, 'CHUQUIBAMBILLA', 7, 3),
(1, 'MOLLENDO', 7, 4),
(1, 'CORACORA', 7, 5),
(1, 'BAMBAMARCA', 7, 6),
(1, 'SANTO TOMAS', 7, 8),
(1, 'PAMPAS', 7, 9),
(1, 'HUACRACHUCO', 7, 10),
(1, 'TARMA', 7, 12),
(1, 'SAN PEDRO DE LLOC', 7, 13),
(1, 'MATUCANA', 7, 15),
(1, 'BARRANCA', 7, 16),
(1, 'PARI?AS', 7, 20),
(1, 'LAMPA', 7, 21),
(1, 'PICOTA', 7, 22),
(1, 'CASMA', 8, 2),
(1, 'COTAHUASI', 8, 4),
(1, 'PAUSA', 8, 5),
(1, 'JA?N', 8, 6),
(1, 'ESPINAR', 8, 8),
(1, 'PANAO', 8, 10),
(1, 'LA OROYA', 8, 12),
(1, 'TAYABAMBA', 8, 13),
(1, 'HUACHO', 8, 15),
(1, 'PUTUMAYO', 8, 16),
(1, 'SECHURA', 8, 20),
(1, 'AYAVIRI', 8, 21),
(1, 'RIOJA', 8, 22),
(1, 'CORONGO', 9, 2),
(1, 'QUEROBAMBA', 9, 5),
(1, 'SAN IGNACIO', 9, 6),
(1, 'SANTA ANA', 9, 8),
(1, 'PUERTO INCA', 9, 10),
(1, 'CHUPACA', 9, 12),
(1, 'HUAMACHUCO', 9, 13),
(1, 'OYON', 9, 15),
(1, 'MOHO', 9, 21),
(1, 'TARAPOTO', 9, 22),
(1, 'HUARI', 10, 2),
(1, 'HUANCAPI', 10, 5),
(1, 'PEDRO GALVEZ', 10, 6),
(1, 'PARURO', 10, 8),
(1, 'JES?S', 10, 10),
(1, 'SANTIAGO DE CHUCO', 10, 13),
(1, 'YAUYOS', 10, 15),
(1, 'PUTINA', 10, 21),
(1, 'TOCACHE', 10, 22),
(1, 'HUARMEY', 11, 2),
(1, 'VILCAS HUAMAN', 11, 5),
(1, 'SAN MIGUEL', 11, 6),
(1, 'PAUCARTAMBO', 11, 8),
(1, 'CHAVINILLO', 11, 10),
(1, 'CASCAS', 11, 13),
(1, 'JULIACA', 11, 21),
(1, 'CARAZ', 12, 2),
(1, 'SAN PABLO', 12, 6),
(1, 'URCOS', 12, 8),
(1, 'VIRU', 12, 13),
(1, 'SANDIA', 12, 21),
(1, 'PISCOBAMBA', 13, 2),
(1, 'SANTA CRUZ', 13, 6),
(1, 'URUBAMBA', 13, 8),
(1, 'YUNGUYO', 13, 21),
(1, 'OCROS', 14, 2),
(1, 'CABANA', 15, 2),
(1, 'POMABAMBA', 16, 2),
(1, 'RECUAY', 17, 2),
(1, 'CHIMBOTE', 18, 2),
(1, 'SIHUAS', 19, 2),
(1, 'YUNGAY', 20, 2),
(2, 'ASUNCION', 1, 1),
(2, 'COCHABAMBA', 1, 2),
(2, 'CHACOCHE', 1, 3),
(2, 'ALTO SELVA ALEGRE', 1, 4),
(2, 'ACOCRO', 1, 5),
(2, 'ASUNCION', 1, 6),
(2, 'BELLAVISTA', 1, 7),
(2, 'CCORCA', 1, 8),
(2, 'ACOBAMBILLA', 1, 9),
(2, 'AMARILIS', 1, 10),
(2, 'LA TINGUI?A', 1, 11),
(2, 'EL PORVENIR', 1, 13),
(2, 'CHONGOYAPE', 1, 14),
(2, 'ANCON', 1, 15),
(2, 'ALTO NANAY', 1, 16),
(2, 'INAMBARI', 1, 17),
(2, 'CARUMAS', 1, 18),
(2, 'HUACHON', 1, 19),
(2, 'ACORA', 1, 21),
(2, 'CALZADA', 1, 22),
(2, 'ALTO DE LA ALIANZA', 1, 23),
(2, 'CORRALES', 1, 24),
(2, 'CAMPOVERDE', 1, 25),
(2, 'ARAMANGO', 2, 1),
(2, 'CORIS', 2, 2),
(2, 'ANDARAPA', 2, 3),
(2, 'JOS? MARIA QUIMPER', 2, 4),
(2, 'CHUSCHI', 2, 5),
(2, 'CACHACHI', 2, 6),
(2, 'ACOPIA', 2, 8),
(2, 'ANDABAMBA', 2, 9),
(2, 'CAYNA', 2, 10),
(2, 'ALTO LARAN', 2, 11),
(2, 'ACO', 2, 12),
(2, 'CHICAMA', 2, 13),
(2, 'CA?ARIS', 2, 14),
(2, 'PARAMONGA', 2, 15),
(2, 'BALSAPUERTO', 2, 16),
(2, 'FITZCARRALD', 2, 17),
(2, 'CHOJATA', 2, 18),
(2, 'CHACAYAN', 2, 19),
(2, 'FRIAS', 2, 20),
(2, 'ACHAYA', 2, 21),
(2, 'ALTO BIAVO', 2, 22),
(2, 'CAIRANI', 2, 23),
(2, 'CASITAS', 2, 24),
(2, 'SEPAHUA', 2, 25),
(2, 'CHISQUILLA', 3, 1),
(2, 'ACZO', 3, 2),
(2, 'EL ORO', 3, 3),
(2, 'ACARI', 3, 4),
(2, 'CARAPO', 3, 5),
(2, 'CHUMUCH', 3, 6),
(2, 'ANCAHUASI', 3, 8),
(2, 'ANCHONGA', 3, 9),
(2, 'CHANGUILLO', 3, 11),
(2, 'PERENE', 3, 12),
(2, 'BAMBAMARCA', 3, 13),
(2, 'CHOCHOPE', 3, 14),
(2, 'COPA', 3, 15),
(2, 'PARINARI', 3, 16),
(2, 'IBERIA', 3, 17),
(2, 'EL ALGARROBAL', 3, 18),
(2, 'CHONTABAMBA', 3, 19),
(2, 'CANCHAQUE', 3, 20),
(2, 'AJOYANI', 3, 21),
(2, 'AGUA BLANCA', 3, 22),
(2, 'ILABAYA', 3, 23),
(2, 'AGUAS VERDES', 3, 24),
(2, 'IRAZOLA', 3, 25),
(2, 'EL CENEPA', 4, 1),
(2, 'ACOCHACA', 4, 2),
(2, 'CAPAYA', 4, 3),
(2, 'ANDAGUA', 4, 4),
(2, 'AYAHUANCO', 4, 5),
(2, 'ANGUIA', 4, 6),
(2, 'COYA', 4, 8),
(2, 'ARMA', 4, 9),
(2, 'CANCHABAMBA', 4, 10),
(2, 'LLIPATA', 4, 11),
(2, 'ACOLLA', 4, 12),
(2, 'PACANGA', 4, 13),
(2, 'ARAHUAY', 4, 15),
(2, 'PEBAS', 4, 16),
(2, 'BUENOS AIRES', 4, 20),
(2, 'DESAGUADERO', 4, 21),
(2, 'ALTO SAPOSOA', 4, 22),
(2, 'H?ROES ALBARRACIN', 4, 23),
(2, 'CAMPORREDONDO', 5, 1),
(2, 'ABELARDO PARDO LEZAMETA', 5, 2),
(2, 'COTABAMBAS', 5, 3),
(2, 'ACHOMA', 5, 4),
(2, 'ANCO', 5, 5),
(2, 'CHILETE', 5, 6),
(2, 'CHECCA', 5, 8),
(2, 'ANCO', 5, 9),
(2, 'ARANCAY', 5, 10),
(2, 'HUANCANO', 5, 11),
(2, 'CARHUAMAYO', 5, 12),
(2, 'CALAMARCA', 5, 13),
(2, 'ASIA', 5, 15),
(2, 'ALTO TAPICHE', 5, 16),
(2, 'AMOTAPE', 5, 20),
(2, 'CAPAZO', 5, 21),
(2, 'ALONSO DE ALVARADO', 5, 22),
(2, 'CHIRIMOTO', 6, 1),
(2, 'ACOPAMPA', 6, 2),
(2, 'ANCO_HUALLO', 6, 3),
(2, 'ANDARAY', 6, 4),
(2, 'AUCARA', 6, 5),
(2, 'CALLAYUC', 6, 6),
(2, 'CHECACUPE', 6, 8),
(2, 'AYAVI', 6, 9),
(2, 'DANIEL ALOMIA ROBLES', 6, 10),
(2, 'COVIRIALI', 6, 12),
(2, 'AGALLPAMPA', 6, 13),
(2, 'ATAVILLOS ALTO', 6, 15),
(2, 'INAHUAYA', 6, 16),
(2, 'BELLAVISTA', 6, 20),
(2, 'COJATA', 6, 21),
(2, 'CAMPANILLA', 6, 22),
(2, 'CAJARURO', 7, 1),
(2, 'SAN NICOLAS', 7, 2),
(2, 'CURPAHUASI', 7, 3),
(2, 'COCACHACRA', 7, 4),
(2, 'CHUMPI', 7, 5),
(2, 'CHUGUR', 7, 6),
(2, 'CAPACMARCA', 7, 8),
(2, 'ACOSTAMBO', 7, 9),
(2, 'CHOLON', 7, 10),
(2, 'ACOBAMBA', 7, 12),
(2, 'GUADALUPE', 7, 13),
(2, 'ANTIOQUIA', 7, 15),
(2, 'CAHUAPANAS', 7, 16),
(2, 'EL ALTO', 7, 20),
(2, 'CABANILLA', 7, 21),
(2, 'BUENOS AIRES', 7, 22),
(2, 'BUENA VISTA ALTA', 8, 2),
(2, 'ALCA', 8, 4),
(2, 'COLTA', 8, 5),
(2, 'BELLAVISTA', 8, 6),
(2, 'CONDOROMA', 8, 8),
(2, 'CHAGLLA', 8, 10),
(2, 'CHACAPALPA', 8, 12),
(2, 'BULDIBUYO', 8, 13),
(2, 'AMBAR', 8, 15),
(2, 'ROSA PANDURO', 8, 16),
(2, 'BELLAVISTA DE LA UNION', 8, 20),
(2, 'ANTAUTA', 8, 21),
(2, 'AWAJUN', 8, 22),
(2, 'ACO', 9, 2),
(2, 'BEL?N', 9, 5),
(2, 'CHIRINOS', 9, 6),
(2, 'ECHARATE', 9, 8),
(2, 'CODO DEL POZUZO', 9, 10),
(2, 'AHUAC', 9, 12),
(2, 'CHUGAY', 9, 13),
(2, 'ANDAJES', 9, 15),
(2, 'CONIMA', 9, 21),
(2, 'ALBERTO LEVEAU', 9, 22),
(2, 'ANRA', 10, 2),
(2, 'ALCAMENCA', 10, 5),
(2, 'CHANCAY', 10, 6),
(2, 'ACCHA', 10, 8),
(2, 'BA?OS', 10, 10),
(2, 'ANGASMARCA', 10, 13),
(2, 'ALIS', 10, 15),
(2, 'ANANEA', 10, 21),
(2, 'NUEVO PROGRESO', 10, 22),
(2, 'COCHAPETI', 11, 2),
(2, 'ACCOMARCA', 11, 5),
(2, 'BOLIVAR', 11, 6),
(2, 'CAICAY', 11, 8),
(2, 'CAHUAC', 11, 10),
(2, 'LUCMA', 11, 13),
(2, 'CABANA', 11, 21),
(2, 'HUALLANCA', 12, 2),
(2, 'SAN BERNARDINO', 12, 6),
(2, 'ANDAHUAYLILLAS', 12, 8),
(2, 'CHAO', 12, 13),
(2, 'CUYOCUYO', 12, 21),
(2, 'CASCA', 13, 2),
(2, 'ANDABAMBA', 13, 6),
(2, 'CHINCHERO', 13, 8),
(2, 'ANAPIA', 13, 21),
(2, 'ACAS', 14, 2),
(2, 'BOLOGNESI', 15, 2),
(2, 'HUAYLLAN', 16, 2),
(2, 'CATAC', 17, 2),
(2, 'CACERES DEL PER', 18, 2),
(2, 'ACOBAMBA', 19, 2),
(2, 'CASCAPARA', 20, 2),
(3, 'BALSAS', 1, 1),
(3, 'COLCABAMBA', 1, 2),
(3, 'CIRCA', 1, 3),
(3, 'CAYMA', 1, 4),
(3, 'ACOS VINCHOS', 1, 5),
(3, 'CHETILLA', 1, 6),
(3, 'CARMEN DE LA LEGUA REYNOSO', 1, 7),
(3, 'POROY', 1, 8),
(3, 'ACORIA', 1, 9),
(3, 'CHINCHAO', 1, 10),
(3, 'LOS AQUIJES', 1, 11),
(3, 'FLORENCIA DE MORA', 1, 13),
(3, 'ETEN', 1, 14),
(3, 'ATE', 1, 15),
(3, 'FERNANDO LORES', 1, 16),
(3, 'LAS PIEDRAS', 1, 17),
(3, 'CUCHUMBAYA', 1, 18),
(3, 'HUARIACA', 1, 19),
(3, 'AMANTANI', 1, 21),
(3, 'HABANA', 1, 22),
(3, 'CALANA', 1, 23),
(3, 'LA CRUZ', 1, 24),
(3, 'IPARIA', 1, 25),
(3, 'COPALLIN', 2, 1),
(3, 'HUACLLAN', 2, 2),
(3, 'CHIARA', 2, 3),
(3, 'MARIANO NICOLAS VALCARCEL', 2, 4),
(3, 'LOS MOROCHUCOS', 2, 5),
(3, 'CONDEBAMBA', 2, 6),
(3, 'ACOS', 2, 8),
(3, 'ANTA', 2, 9),
(3, 'COLPAS', 2, 10),
(3, 'CHAVIN', 2, 11),
(3, 'ANDAMARCA', 2, 12),
(3, 'CHOCOPE', 2, 13),
(3, 'INCAHUASI', 2, 14),
(3, 'PATIVILCA', 2, 15),
(3, 'MADRE DE DIOS', 2, 17),
(3, 'COALAQUE', 2, 18),
(3, 'GOYLLARISQUIZGA', 2, 19),
(3, 'JILILI', 2, 20),
(3, 'ARAPA', 2, 21),
(3, 'BAJO BIAVO', 2, 22),
(3, 'CAMILACA', 2, 23),
(3, 'CANOAS DE PUNTA SAL', 2, 24),
(3, 'TAHUANIA', 2, 25),
(3, 'CHURUJA', 3, 1),
(3, 'CHACCHO', 3, 2),
(3, 'HUAQUIRCA', 3, 3),
(3, 'ATICO', 3, 4),
(3, 'SACSAMARCA', 3, 5),
(3, 'CORTEGANA', 3, 6),
(3, 'CACHIMAYO', 3, 8),
(3, 'CALLANMARCA', 3, 9),
(3, 'EL INGENIO', 3, 11),
(3, 'PICHANAQUI', 3, 12),
(3, 'CONDORMARCA', 3, 13),
(3, 'ILLIMO', 3, 14),
(3, 'GORGOR', 3, 15),
(3, 'TIGRE', 3, 16),
(3, 'TAHUAMANU', 3, 17),
(3, 'PACOCHA', 3, 18),
(3, 'HUANCABAMBA', 3, 19),
(3, 'EL CARMEN DE LA FRONTERA', 3, 20),
(3, 'AYAPATA', 3, 21),
(3, 'SAN MARTIN', 3, 22),
(3, 'ITE', 3, 23),
(3, 'MATAPALO', 3, 24),
(3, 'CURIMANA', 3, 25),
(3, 'RIO SANTIAGO', 4, 1),
(3, 'CARAYBAMBA', 4, 3),
(3, 'AYO', 4, 4),
(3, 'HUAMANGUILLA', 4, 5),
(3, 'CHADIN', 4, 6),
(3, 'LAMAY', 4, 8),
(3, 'AURAHUA', 4, 9),
(3, 'COCHABAMBA', 4, 10),
(3, 'RIO GRANDE', 4, 11),
(3, 'APATA', 4, 12),
(3, 'PUEBLO NUEVO', 4, 13),
(3, 'HUAMANTANGA', 4, 15),
(3, 'YAVARI', 4, 16),
(3, 'CHALACO', 4, 20),
(3, 'HUACULLANI', 4, 21),
(3, 'EL ESLABON', 4, 22),
(3, 'ESTIQUE', 4, 23),
(3, 'COCABAMBA', 5, 1),
(3, 'ANTONIO RAYMONDI', 5, 2),
(3, 'COYLLURQUI', 5, 3),
(3, 'CABANACONDE', 5, 4),
(3, 'AYNA', 5, 5),
(3, 'CUPISNIQUE', 5, 6),
(3, 'KUNTURKANKI', 5, 8),
(3, 'CHINCHIHUASI', 5, 9),
(3, 'CHAVIN DE PARIARCA', 5, 10),
(3, 'HUMAY', 5, 11),
(3, 'ONDORES', 5, 12),
(3, 'CARABAMBA', 5, 13),
(3, 'CALANGO', 5, 15),
(3, 'CAPELO', 5, 16),
(3, 'ARENAL', 5, 20),
(3, 'PILCUYO', 5, 21),
(3, 'BARRANQUITA', 5, 22),
(3, 'COCHAMAL', 6, 1),
(3, 'AMASHCA', 6, 2),
(3, 'COCHARCAS', 6, 3),
(3, 'CAYARANI', 6, 4),
(3, 'CABANA', 6, 5),
(3, 'CHOROS', 6, 6),
(3, 'COMBAPATA', 6, 8),
(3, 'CORDOVA', 6, 9),
(3, 'HERMILIO VALDIZAN', 6, 10),
(3, 'LLAYLLA', 6, 12),
(3, 'ATAVILLOS BAJO', 6, 15),
(3, 'PADRE MARQUEZ', 6, 16),
(3, 'IGNACIO ESCUDERO', 6, 20),
(3, 'HUATASANI', 6, 21),
(3, 'HUICUNGO', 6, 22),
(3, 'CUMBA', 7, 1),
(3, 'YAUYA', 7, 2),
(3, 'GAMARRA', 7, 3),
(3, 'DEAN VALDIVIA', 7, 4),
(3, 'CORONEL CASTA?EDA', 7, 5),
(3, 'HUALGAYOC', 7, 6),
(3, 'CHAMACA', 7, 8),
(3, 'ACRAQUIA', 7, 9),
(3, 'SAN BUENAVENTURA', 7, 10),
(3, 'HUARICOLCA', 7, 12),
(3, 'JEQUETEPEQUE', 7, 13),
(3, 'CALLAHUANCA', 7, 15),
(3, 'MANSERICHE', 7, 16),
(3, 'LA BREA', 7, 20),
(3, 'CALAPUJA', 7, 21),
(3, 'CASPISAPA', 7, 22),
(3, 'COMANDANTE NOEL', 8, 2),
(3, 'CHARCANA', 8, 4),
(3, 'CORCULLA', 8, 5),
(3, 'CHONTALI', 8, 6),
(3, 'COPORAQUE', 8, 8),
(3, 'MOLINO', 8, 10),
(3, 'HUAY-HUAY', 8, 12),
(3, 'CHILLIA', 8, 13),
(3, 'CALETA DE CARQUIN', 8, 15),
(3, 'TENIENTE MANUEL CLAVERO', 8, 16),
(3, 'BERNAL', 8, 20),
(3, 'CUPI', 8, 21),
(3, 'ELIAS SOPLIN VARGAS', 8, 22),
(3, 'BAMBAS', 9, 2),
(3, 'CHALCOS', 9, 5),
(3, 'HUARANGO', 9, 6),
(3, 'HUAYOPATA', 9, 8),
(3, 'HONORIA', 9, 10),
(3, 'CHONGOS BAJO', 9, 12),
(3, 'COCHORCO', 9, 13),
(3, 'CAUJUL', 9, 15),
(3, 'HUAYRAPATA', 9, 21),
(3, 'CACATACHI', 9, 22),
(3, 'CAJAY', 10, 2),
(3, 'APONGO', 10, 5),
(3, 'EDUARDO VILLANUEVA', 10, 6),
(3, 'CCAPI', 10, 8),
(3, 'JIVIA', 10, 10),
(3, 'CACHICADAN', 10, 13),
(3, 'ALLAUCA', 10, 15),
(3, 'PEDRO VILCA APAZA', 10, 21),
(3, 'POLVORA', 10, 22),
(3, 'CULEBRAS', 11, 2),
(3, 'CARHUANCA', 11, 5),
(3, 'CALQUIS', 11, 6),
(3, 'CHALLABAMBA', 11, 8),
(3, 'CHACABAMBA', 11, 10),
(3, 'MARMOT', 11, 13),
(3, 'CABANILLAS', 11, 21),
(3, 'HUATA', 12, 2),
(3, 'SAN LUIS', 12, 6),
(3, 'CAMANTI', 12, 8),
(3, 'GUADALUPITO', 12, 13),
(3, 'LIMBANI', 12, 21),
(3, 'ELEAZAR GUZMAN BARRON', 13, 2),
(3, 'CATACHE', 13, 6),
(3, 'HUAYLLABAMBA', 13, 8),
(3, 'COPANI', 13, 21),
(3, 'CAJAMARQUILLA', 14, 2),
(3, 'CONCHUCOS', 15, 2),
(3, 'PAROBAMBA', 16, 2),
(3, 'COTAPARACO', 17, 2),
(3, 'COISHCO', 18, 2),
(3, 'ALFONSO UGARTE', 19, 2),
(3, 'MANCOS', 20, 2),
(4, 'CHETO', 1, 1),
(4, 'HUANCHAY', 1, 2),
(4, 'CURAHUASI', 1, 3),
(4, 'CERRO COLORADO', 1, 4),
(4, 'CARMEN ALTO', 1, 5),
(4, 'COSPAN', 1, 6),
(4, 'LA PERLA', 1, 7),
(4, 'SAN JERONIMO', 1, 8),
(4, 'CONAYCA', 1, 9),
(4, 'CHURUBAMBA', 1, 10),
(4, 'OCUCAJE', 1, 11),
(4, 'CARHUACALLANGA', 1, 12),
(4, 'HUANCHACO', 1, 13),
(4, 'ETEN PUERTO', 1, 14),
(4, 'BARRANCO', 1, 15),
(4, 'INDIANA', 1, 16),
(4, 'LABERINTO', 1, 17),
(4, 'SAMEGUA', 1, 18),
(4, 'HUAYLLAY', 1, 19),
(4, 'CASTILLA', 1, 20),
(4, 'ATUNCOLLA', 1, 21),
(4, 'JEPELACIO', 1, 22),
(4, 'CIUDAD NUEVA', 1, 23),
(4, 'PAMPAS DE HOSPITAL', 1, 24),
(4, 'MASISEA', 1, 25),
(4, 'EL PARCO', 2, 1),
(4, 'LA MERCED', 2, 2),
(4, 'HUANCARAMA', 2, 3),
(4, 'MARISCAL CACERES', 2, 4),
(4, 'MARIA PARADO DE BELLIDO', 2, 5),
(4, 'SITACOCHA', 2, 6),
(4, 'MOSOC LLACTA', 2, 8),
(4, 'CAJA', 2, 9),
(4, 'CONCHAMARCA', 2, 10),
(4, 'CHINCHA BAJA', 2, 11),
(4, 'CHAMBARA', 2, 12),
(4, 'MAGDALENA DE CAO', 2, 13),
(4, 'MANUEL ANTONIO MESONES MURO', 2, 14),
(4, 'SUPE', 2, 15),
(4, 'HUEPETUHE', 2, 17),
(4, 'ICHU?A', 2, 18),
(4, 'PAUCAR', 2, 19),
(4, 'LAGUNAS', 2, 20),
(4, 'ASILLO', 2, 21),
(4, 'HUALLAGA', 2, 22),
(4, 'CURIBAYA', 2, 23),
(4, 'YURUA', 2, 25),
(4, 'COROSHA', 3, 1),
(4, 'CHINGAS', 3, 2),
(4, 'JUAN ESPINOZA MEDRANO', 3, 3),
(4, 'ATIQUIPA', 3, 4),
(4, 'SANTIAGO DE LUCANAMARCA', 3, 5),
(4, 'HUASMIN', 3, 6),
(4, 'CHINCHAYPUJIO', 3, 8),
(4, 'CCOCHACCASA', 3, 9),
(4, 'MARCONA', 3, 11),
(4, 'SAN LUIS DE SHUARO', 3, 12),
(4, 'LONGOTEA', 3, 13),
(4, 'JAYANCA', 3, 14),
(4, 'HUANCAPON', 3, 15),
(4, 'TROMPETEROS', 3, 16),
(4, 'PALCAZU', 3, 19),
(4, 'HUARMACA', 3, 20),
(4, 'COASA', 3, 21),
(4, 'SANTA ROSA', 3, 22),
(4, 'PAPAYAL', 3, 24),
(4, 'NESHUYA', 3, 25),
(4, 'CHAPIMARCA', 4, 3),
(4, 'CHACHAS', 4, 4),
(4, 'IGUAIN', 4, 5),
(4, 'CHIGUIRIP', 4, 6),
(4, 'LARES', 4, 8),
(4, 'CAPILLAS', 4, 9),
(4, 'PINRA', 4, 10),
(4, 'SANTA CRUZ', 4, 11),
(4, 'ATAURA', 4, 12),
(4, 'HUAROS', 4, 15),
(4, 'SAN PABLO', 4, 16),
(4, 'LA MATANZA', 4, 20),
(4, 'KELLUYO', 4, 21),
(4, 'PISCOYACU', 4, 22),
(4, 'ESTIQUE-PAMPA', 4, 23),
(4, 'COLCAMAR', 5, 1),
(4, 'AQUIA', 5, 2),
(4, 'HAQUIRA', 5, 3),
(4, 'CALLALLI', 5, 4),
(4, 'CHILCAS', 5, 5),
(4, 'GUZMANGO', 5, 6),
(4, 'LANGUI', 5, 8),
(4, 'EL CARMEN', 5, 9),
(4, 'JACAS GRANDE', 5, 10),
(4, 'INDEPENDENCIA', 5, 11),
(4, 'ULCUMAYO', 5, 12),
(4, 'HUASO', 5, 13),
(4, 'CERRO AZUL', 5, 15),
(4, 'EMILIO SAN MARTIN', 5, 16),
(4, 'COLAN', 5, 20),
(4, 'SANTA ROSA', 5, 21),
(4, 'CAYNARACHI', 5, 22),
(4, 'HUAMBO', 6, 1),
(4, 'ANTA', 6, 2),
(4, 'HUACCANA', 6, 3),
(4, 'CHICHAS', 6, 4),
(4, 'CARMEN SALCEDO', 6, 5),
(4, 'CUJILLO', 6, 6),
(4, 'MARANGANI', 6, 8),
(4, 'HUAYACUNDO ARMA', 6, 9),
(4, 'JOS? CRESPO Y CASTILLO', 6, 10),
(4, 'MAZAMARI', 6, 12),
(4, 'CHARAT', 6, 13),
(4, 'AUCALLAMA', 6, 15),
(4, 'PAMPA HERMOSA', 6, 16),
(4, 'LANCONES', 6, 20),
(4, 'INCHUPALLA', 6, 21),
(4, 'PACHIZA', 6, 22),
(4, 'EL MILAGRO', 7, 1),
(4, 'HUAYLLATI', 7, 3),
(4, 'ISLAY', 7, 4),
(4, 'PACAPAUSA', 7, 5),
(4, 'COLQUEMARCA', 7, 8),
(4, 'AHUAYCHA', 7, 9),
(4, 'HUASAHUASI', 7, 12),
(4, 'PACASMAYO', 7, 13),
(4, 'CARAMPOMA', 7, 15),
(4, 'MORONA', 7, 16),
(4, 'LOBITOS', 7, 20),
(4, 'NICASIO', 7, 21),
(4, 'PILLUANA', 7, 22),
(4, 'YAUTAN', 8, 2),
(4, 'HUAYNACOTAS', 8, 4),
(4, 'LAMPA', 8, 5),
(4, 'COLASAY', 8, 6),
(4, 'OCORURO', 8, 8),
(4, 'UMARI', 8, 10),
(4, 'MARCAPOMACOCHA', 8, 12),
(4, 'HUANCASPATA', 8, 13),
(4, 'CHECRAS', 8, 15),
(4, 'YAGUAS', 8, 16),
(4, 'CRISTO NOS VALGA', 8, 20),
(4, 'LLALLI', 8, 21),
(4, 'NUEVA CAJAMARCA', 8, 22),
(4, 'CUSCA', 9, 2),
(4, 'CHILCAYOC', 9, 5),
(4, 'LA COIPA', 9, 6),
(4, 'MARANURA', 9, 8),
(4, 'TOURNAVISTA', 9, 10),
(4, 'HUACHAC', 9, 12),
(4, 'CURGOS', 9, 13),
(4, 'COCHAMARCA', 9, 15),
(4, 'TILALI', 9, 21),
(4, 'CHAZUTA', 9, 22),
(4, 'CHAVIN DE HUANTAR', 10, 2),
(4, 'ASQUIPATA', 10, 5),
(4, 'GREGORIO PITA', 10, 6),
(4, 'COLCHA', 10, 8),
(4, 'QUEROPALCA', 10, 10),
(4, 'MOLLEBAMBA', 10, 13),
(4, 'AYAVIRI', 10, 15),
(4, 'QUILCAPUNCU', 10, 21),
(4, 'SHUNTE', 10, 22),
(4, 'HUAYAN', 11, 2),
(4, 'CONCEPCION', 11, 5),
(4, 'CATILLUC', 11, 6),
(4, 'COLQUEPATA', 11, 8),
(4, 'APARICIO POMARES', 11, 10),
(4, 'SAYAPULLO', 11, 13),
(4, 'CARACOTO', 11, 21),
(4, 'HUAYLAS', 12, 2),
(4, 'TUMBADEN', 12, 6),
(4, 'CCARHUAYO', 12, 8),
(4, 'PATAMBUCO', 12, 21),
(4, 'FIDEL OLIVAS ESCUDERO', 13, 2),
(4, 'CHANCAYBA?OS', 13, 6),
(4, 'MACHUPICCHU', 13, 8),
(4, 'CUTURAPI', 13, 21),
(4, 'CARHUAPAMPA', 14, 2),
(4, 'HUACASCHUQUE', 15, 2),
(4, 'QUINUABAMBA', 16, 2),
(4, 'HUAYLLAPAMPA', 17, 2),
(4, 'MACATE', 18, 2),
(4, 'CASHAPAMPA', 19, 2),
(4, 'MATACOTO', 20, 2),
(5, 'CHILIQUIN', 1, 1),
(5, 'INDEPENDENCIA', 1, 2),
(5, 'HUANIPACA', 1, 3),
(5, 'CHARACATO', 1, 4),
(5, 'CHIARA', 1, 5),
(5, 'ENCA?ADA', 1, 6),
(5, 'LA PUNTA', 1, 7),
(5, 'SAN SEBASTIAN', 1, 8),
(5, 'CUENCA', 1, 9),
(5, 'MARGOS', 1, 10),
(5, 'PACHACUTEC', 1, 11),
(5, 'CHACAPAMPA', 1, 12),
(5, 'LA ESPERANZA', 1, 13),
(5, 'JOS? LEONARDO ORTIZ', 1, 14),
(5, 'BRE?A', 1, 15),
(5, 'LAS AMAZONAS', 1, 16),
(5, 'SAN CRISTOBAL', 1, 18),
(5, 'NINACACA', 1, 19),
(5, 'ATACAOS', 1, 20),
(5, 'CAPACHICA', 1, 21),
(5, 'SORITOR', 1, 22),
(5, 'INCLAN', 1, 23),
(5, 'SAN JACINTO', 1, 24),
(5, 'YARINACOCHA', 1, 25),
(5, 'IMAZA', 2, 1),
(5, 'SUCCHA', 2, 2),
(5, 'HUANCARAY', 2, 3),
(5, 'NICOLAS DE PIEROLA', 2, 4),
(5, 'PARAS', 2, 5),
(5, 'POMACANCHI', 2, 8),
(5, 'MARCAS', 2, 9),
(5, 'HUACAR', 2, 10),
(5, 'EL CARMEN', 2, 11),
(5, 'COCHAS', 2, 12),
(5, 'PAIJAN', 2, 13),
(5, 'PITIPO', 2, 14),
(5, 'SUPE PUERTO', 2, 15),
(5, 'JEBEROS', 2, 16),
(5, 'LA CAPILLA', 2, 18),
(5, 'SAN PEDRO DE PILLAO', 2, 19),
(5, 'MONTERO', 2, 20),
(5, 'CAMINACA', 2, 21),
(5, 'SAN PABLO', 2, 22),
(5, 'HUANUARA', 2, 23),
(5, 'CUISPES', 3, 1),
(5, 'MIRGAS', 3, 2),
(5, 'OROPESA', 3, 3),
(5, 'BELLA UNION', 3, 4),
(5, 'JORGE CHAVEZ', 3, 6),
(5, 'HUAROCONDO', 3, 8),
(5, 'CHINCHO', 3, 9),
(5, 'VISTA ALEGRE', 3, 11),
(5, 'SAN RAMON', 3, 12),
(5, 'UCHUMARCA', 3, 13),
(5, 'MOCHUMI', 3, 14),
(5, 'MANAS', 3, 15),
(5, 'URARINAS', 3, 16),
(5, 'POZUZO', 3, 19),
(5, 'LALAQUIZ', 3, 20),
(5, 'CORANI', 3, 21),
(5, 'SHATOJA', 3, 22),
(5, 'ALEXANDER VON HUMBOLDT', 3, 25),
(5, 'COLCABAMBA', 4, 3),
(5, 'CHILCAYMARCA', 4, 4),
(5, 'LURICOCHA', 4, 5),
(5, 'CHIMBAN', 4, 6),
(5, 'PISAC', 4, 8),
(5, 'CHUPAMARCA', 4, 9),
(5, 'TIBILLO', 4, 11),
(5, 'CANCHAYLLO', 4, 12),
(5, 'LACHAQUI', 4, 15),
(5, 'MORROPON', 4, 20),
(5, 'PISACOMA', 4, 21),
(5, 'SACANCHE', 4, 22),
(5, 'SITAJARA', 4, 23),
(5, 'CONILA', 5, 1),
(5, 'CAJACAY', 5, 2),
(5, 'MARA', 5, 3),
(5, 'CAYLLOMA', 5, 4),
(5, 'CHUNGUI', 5, 5),
(5, 'SAN BENITO', 5, 6),
(5, 'LAYO', 5, 8),
(5, 'LA MERCED', 5, 9),
(5, 'JIRCAN', 5, 10),
(5, 'PARACAS', 5, 11),
(5, 'CHILCA', 5, 15),
(5, 'MAQUIA', 5, 16),
(5, 'LA HUACA', 5, 20),
(5, 'CONDURIRI', 5, 21),
(5, 'CU?UMBUQUI', 5, 22),
(5, 'LIMABAMBA', 6, 1),
(5, 'ATAQUERO', 6, 2),
(5, 'OCOBAMBA', 6, 3),
(5, 'IRAY', 6, 4),
(5, 'CHAVI?A', 6, 5),
(5, 'LA RAMADA', 6, 6),
(5, 'PITUMARCA', 6, 8),
(5, 'LARAMARCA', 6, 9),
(5, 'LUYANDO', 6, 10),
(5, 'PAMPA HERMOSA', 6, 12),
(5, 'HUARANCHAL', 6, 13),
(5, 'CHANCAY', 6, 15),
(5, 'SARAYACU', 6, 16),
(5, 'MARCAVELICA', 6, 20),
(5, 'PUSI', 6, 21),
(5, 'PAJARILLO', 6, 22),
(5, 'JAMALCA', 7, 1),
(5, 'MAMARA', 7, 3),
(5, 'MEJIA', 7, 4),
(5, 'PULLO', 7, 5),
(5, 'LIVITACA', 7, 8),
(5, 'COLCABAMBA', 7, 9),
(5, 'LA UNION', 7, 12),
(5, 'SAN JOS', 7, 13),
(5, 'CHICLA', 7, 15),
(5, 'PASTAZA', 7, 16),
(5, 'LOS ORGANOS', 7, 20),
(5, 'OCUVIRI', 7, 21),
(5, 'PUCACACA', 7, 22),
(5, 'PAMPAMARCA', 8, 4),
(5, 'MARCABAMBA', 8, 5),
(5, 'HUABAL', 8, 6),
(5, 'PALLPATA', 8, 8),
(5, 'MOROCOCHA', 8, 12),
(5, 'HUAYLILLAS', 8, 13),
(5, 'HUALMAY', 8, 15),
(5, 'VICE', 8, 20),
(5, 'MACARI', 8, 21),
(5, 'PARDO MIGUEL', 8, 22),
(5, 'LA PAMPA', 9, 2),
(5, 'HUACA?A', 9, 5),
(5, 'NAMBALLE', 9, 6),
(5, 'OCOBAMBA', 9, 8),
(5, 'YUYAPICHIS', 9, 10),
(5, 'HUAMANCACA CHICO', 9, 12),
(5, 'MARCABAL', 9, 13),
(5, 'NAVAN', 9, 15),
(5, 'CHIPURANA', 9, 22),
(5, 'HUACACHI', 10, 2),
(5, 'CANARIA', 10, 5),
(5, 'ICHOCAN', 10, 6),
(5, 'HUANOQUITE', 10, 8),
(5, 'RONDOS', 10, 10),
(5, 'MOLLEPATA', 10, 13),
(5, 'AZANGARO', 10, 15),
(5, 'SINA', 10, 21),
(5, 'UCHIZA', 10, 22),
(5, 'MALVAS', 11, 2),
(5, 'HUAMBALPA', 11, 5),
(5, 'EL PRADO', 11, 6),
(5, 'HUANCARANI', 11, 8),
(5, 'JACAS CHICO', 11, 10),
(5, 'MATO', 12, 2),
(5, 'CCATCA', 12, 8),
(5, 'PHARA', 12, 21),
(5, 'LLAMA', 13, 2),
(5, 'LA ESPERANZA', 13, 6),
(5, 'MARAS', 13, 8),
(5, 'OLLARAYA', 13, 21),
(5, 'COCHAS', 14, 2),
(5, 'HUANDOVAL', 15, 2),
(5, 'LLACLLIN', 17, 2),
(5, 'MORO', 18, 2),
(5, 'CHINGALPO', 19, 2),
(5, 'QUILLO', 20, 2),
(6, 'CHUQUIBAMBA', 1, 1),
(6, 'JANGAS', 1, 2),
(6, 'LAMBRAMA', 1, 3),
(6, 'CHIGUATA', 1, 4),
(6, 'OCROS', 1, 5),
(6, 'JES?S', 1, 6),
(6, 'VENTANILLA', 1, 7),
(6, 'SANTIAGO', 1, 8),
(6, 'HUACHOCOLPA', 1, 9),
(6, 'QUISQUI (KICHKI)', 1, 10),
(6, 'PARCONA', 1, 11),
(6, 'CHICCHE', 1, 12),
(6, 'LAREDO', 1, 13),
(6, 'LA VICTORIA', 1, 14),
(6, 'CARABAYLLO', 1, 15),
(6, 'MAZAN', 1, 16),
(6, 'TORATA', 1, 18),
(6, 'PALLANCHACRA', 1, 19),
(6, 'CHUCUITO', 1, 21),
(6, 'YANTALO', 1, 22),
(6, 'PACHIA', 1, 23),
(6, 'SAN JUAN DE LA VIRGEN', 1, 24),
(6, 'NUEVA REQUENA', 1, 25),
(6, 'LA PECA', 2, 1),
(6, 'HUAYANA', 2, 3),
(6, 'OCO?A', 2, 4),
(6, 'TOTOS', 2, 5),
(6, 'RONDOCAN', 2, 8),
(6, 'PAUCARA', 2, 9),
(6, 'SAN FRANCISCO', 2, 10),
(6, 'GROCIO PRADO', 2, 11),
(6, 'COMAS', 2, 12),
(6, 'RAZURI', 2, 13),
(6, 'PUEBLO NUEVO', 2, 14),
(6, 'LAGUNAS', 2, 16),
(6, 'LLOQUE', 2, 18),
(6, 'SANTA ANA DE TUSI', 2, 19),
(6, 'PACAIPAMPA', 2, 20),
(6, 'CHUPA', 2, 21),
(6, 'SAN RAFAEL', 2, 22),
(6, 'QUILAHUANI', 2, 23),
(6, 'FLORIDA', 3, 1),
(6, 'SAN JUAN DE RONTOY', 3, 2),
(6, 'PACHACONAS', 3, 3),
(6, 'CAHUACHO', 3, 4),
(6, 'JOS? GALVEZ', 3, 6),
(6, 'LIMATAMBO', 3, 8),
(6, 'CONGALLA', 3, 9),
(6, 'VITOC', 3, 12),
(6, 'UCUNCHA', 3, 13),
(6, 'MORROPE', 3, 14),
(6, 'PUERTO BERM?DEZ', 3, 19),
(6, 'SAN MIGUEL DE EL FAIQUE', 3, 20),
(6, 'CRUCERO', 3, 21),
(6, 'COTARUSE', 4, 3),
(6, 'CHOCO', 4, 4),
(6, 'SANTILLANA', 4, 5),
(6, 'CHOROPAMPA', 4, 6),
(6, 'SAN SALVADOR', 4, 8),
(6, 'COCAS', 4, 9),
(6, 'CURICACA', 4, 12),
(6, 'SAN BUENAVENTURA', 4, 15),
(6, 'SALITRAL', 4, 20),
(6, 'POMATA', 4, 21),
(6, 'TINGO DE SAPOSOA', 4, 22),
(6, 'SUSAPAYA', 4, 23),
(6, 'INGUILPATA', 5, 1),
(6, 'CANIS', 5, 2),
(6, 'CHALLHUAHUACHO', 5, 3),
(6, 'COPORAQUE', 5, 4),
(6, 'LUIS CARRANZA', 5, 5),
(6, 'SANTA CRUZ DE TOLEDO', 5, 6),
(6, 'PAMPAMARCA', 5, 8),
(6, 'LOCROJA', 5, 9),
(6, 'MIRAFLORES', 5, 10),
(6, 'SAN ANDR?S', 5, 11),
(6, 'COAYLLO', 5, 15),
(6, 'PUINAHUA', 5, 16),
(6, 'TAMARINDO', 5, 20),
(6, 'PINTO RECODO', 5, 22),
(6, 'LONGAR', 6, 1),
(6, 'MARCARA', 6, 2),
(6, 'ONGOY', 6, 3),
(6, 'RIO GRANDE', 6, 4),
(6, 'CHIPAO', 6, 5),
(6, 'PIMPINGOS', 6, 6),
(6, 'SAN PABLO', 6, 8),
(6, 'OCOYO', 6, 9),
(6, 'MARIANO DAMASO BERAUN', 6, 10),
(6, 'PANGOA', 6, 12),
(6, 'LA CUESTA', 6, 13),
(6, 'IHUARI', 6, 15),
(6, 'VARGAS GUERRA', 6, 16),
(6, 'MIGUEL CHECA', 6, 20),
(6, 'ROSASPATA', 6, 21),
(6, 'LONYA GRANDE', 7, 1),
(6, 'MICAELA BASTIDAS', 7, 3),
(6, 'PUNTA DE BOMBON', 7, 4),
(6, 'PUYUSCA', 7, 5),
(6, 'LLUSCO', 7, 8),
(6, 'DANIEL HERNANDEZ', 7, 9),
(6, 'PALCA', 7, 12),
(6, 'CUENCA', 7, 15),
(6, 'ANDOAS', 7, 16),
(6, 'MANCORA', 7, 20),
(6, 'PALCA', 7, 21),
(6, 'SAN CRISTOBAL', 7, 22),
(6, 'PUYCA', 8, 4),
(6, 'OYOLO', 8, 5),
(6, 'LAS PIRIAS', 8, 6),
(6, 'PICHIGUA', 8, 8),
(6, 'PACCHA', 8, 12),
(6, 'HUAYO', 8, 13),
(6, 'HUAURA', 8, 15),
(6, 'RINCONADA LLICUAR', 8, 20),
(6, 'NU?OA', 8, 21),
(6, 'POSIC', 8, 22),
(6, 'YANAC', 9, 2),
(6, 'MORCOLLA', 9, 5),
(6, 'SAN JOS? DE LOURDES', 9, 6),
(6, 'QUELLOUNO', 9, 8),
(6, 'SAN JUAN DE ISCOS', 9, 12),
(6, 'SANAGORAN', 9, 13),
(6, 'PACHANGARA', 9, 15),
(6, 'EL PORVENIR', 9, 22),
(6, 'HUACCHIS', 10, 2),
(6, 'CAYARA', 10, 5),
(6, 'JOS? MANUEL QUIROZ', 10, 6),
(6, 'OMACHA', 10, 8),
(6, 'SAN FRANCISCO DE ASIS', 10, 10),
(6, 'QUIRUVILCA', 10, 13),
(6, 'CACRA', 10, 15),
(6, 'INDEPENDENCIA', 11, 5),
(6, 'LA FLORIDA', 11, 6),
(6, 'KOS?IPATA', 11, 8),
(6, 'OBAS', 11, 10),
(6, 'PAMPAROMAS', 12, 2),
(6, 'CUSIPATA', 12, 8),
(6, 'QUIACA', 12, 21),
(6, 'LLUMPA', 13, 2),
(6, 'NINABAMBA', 13, 6),
(6, 'OLLANTAYTAMBO', 13, 8),
(6, 'TINICACHI', 13, 21),
(6, 'CONGAS', 14, 2),
(6, 'LACABAMBA', 15, 2),
(6, 'MARCA', 17, 2),
(6, 'NEPE?A', 18, 2),
(6, 'HUAYLLABAMBA', 19, 2),
(6, 'RANRAHIRCA', 20, 2),
(7, 'GRANADA', 1, 1),
(7, 'LA LIBERTAD', 1, 2),
(7, 'PICHIRHUA', 1, 3),
(7, 'JACOBO HUNTER', 1, 4),
(7, 'PACAYCASA', 1, 5),
(7, 'LLACANORA', 1, 6),
(7, 'MI PER', 1, 7),
(7, 'SAYLLA', 1, 8),
(7, 'HUAYLLAHUARA', 1, 9),
(7, 'SAN FRANCISCO DE CAYRAN', 1, 10),
(7, 'PUEBLO NUEVO', 1, 11),
(7, 'CHILCA', 1, 12),
(7, 'MOCHE', 1, 13),
(7, 'LAGUNAS', 1, 14),
(7, 'CHACLACAYO', 1, 15),
(7, 'NAPO', 1, 16),
(7, 'PAUCARTAMBO', 1, 19),
(7, 'CURA MORI', 1, 20),
(7, 'COATA', 1, 21),
(7, 'PALCA', 1, 23),
(7, 'MANANTAY', 1, 25),
(7, 'KISHUARA', 2, 3),
(7, 'QUILCA', 2, 4),
(7, 'SANGARARA', 2, 8),
(7, 'POMACOCHA', 2, 9),
(7, 'SAN RAFAEL', 2, 10),
(7, 'PUEBLO NUEVO', 2, 11),
(7, 'HEROINAS TOLEDO', 2, 12),
(7, 'SANTIAGO DE CAO', 2, 13),
(7, 'MATALAQUE', 2, 18),
(7, 'TAPUC', 2, 19),
(7, 'PAIMAS', 2, 20),
(7, 'JOS? DOMINGO CHOQUEHUANCA', 2, 21),
(7, 'JAZAN', 3, 1),
(7, 'SABAINO', 3, 3),
(7, 'CHALA', 3, 4),
(7, 'MIGUEL IGLESIAS', 3, 6),
(7, 'MOLLEPATA', 3, 8),
(7, 'HUANCA-HUANCA', 3, 9),
(7, 'CHUQUIS', 3, 10),
(7, 'MOTUPE', 3, 14),
(7, 'VILLA RICA', 3, 19),
(7, 'SONDOR', 3, 20),
(7, 'ITUATA', 3, 21),
(7, 'HUAYLLO', 4, 3),
(7, 'HUANCARQUI', 4, 4),
(7, 'SIVIA', 4, 5),
(7, 'COCHABAMBA', 4, 6),
(7, 'TARAY', 4, 8),
(7, 'HUACHOS', 4, 9),
(7, 'EL MANTARO', 4, 12),
(7, 'SANTA ROSA DE QUIVES', 4, 15),
(7, 'SAN JUAN DE BIGOTE', 4, 20),
(7, 'ZEPITA', 4, 21),
(7, 'TARUCACHI', 4, 23),
(7, 'LONGUITA', 5, 1),
(7, 'COLQUIOC', 5, 2),
(7, 'HUAMBO', 5, 4),
(7, 'SANTA ROSA', 5, 5),
(7, 'TANTARICA', 5, 6),
(7, 'QUEHUE', 5, 8),
(7, 'PAUCARBAMBA', 5, 9),
(7, 'MONZON', 5, 10),
(7, 'SAN CLEMENTE', 5, 11),
(7, 'IMPERIAL', 5, 15),
(7, 'SAQUENA', 5, 16),
(7, 'VICHAYAL', 5, 20),
(7, 'RUMISAPA', 5, 22),
(7, 'MARISCAL BENAVIDES', 6, 1),
(7, 'PARIAHUANCA', 6, 2),
(7, 'URANMARCA', 6, 3),
(7, 'SALAMANCA', 6, 4),
(7, 'HUAC-HUAS', 6, 5),
(7, 'QUEROCOTILLO', 6, 6),
(7, 'SAN PEDRO', 6, 8),
(7, 'PILPICHACA', 6, 9),
(7, 'RIO NEGRO', 6, 12),
(7, 'LAMPIAN', 6, 15),
(7, 'QUERECOTILLO', 6, 20),
(7, 'TARACO', 6, 21),
(7, 'YAMON', 7, 1),
(7, 'PATAYPAMPA', 7, 3),
(7, 'SAN FRANCISCO DE RAVACAYCO', 7, 5),
(7, 'QUI?OTA', 7, 8),
(7, 'HUACHOCOLPA', 7, 9),
(7, 'PALCAMAYO', 7, 12),
(7, 'HUACHUPAMPA', 7, 15),
(7, 'PARATIA', 7, 21),
(7, 'SAN HILARION', 7, 22),
(7, 'QUECHUALLA', 8, 4),
(7, 'PARARCA', 8, 5),
(7, 'POMAHUACA', 8, 6),
(7, 'SUYCKUTAMBO', 8, 8),
(7, 'SANTA BARBARA DE CARHUACAYAN', 8, 12),
(7, 'ONGON', 8, 13),
(7, 'LEONCIO PRADO', 8, 15),
(7, 'ORURILLO', 8, 21),
(7, 'SAN FERNANDO', 8, 22),
(7, 'YUPAN', 9, 2),
(7, 'PAICO', 9, 5),
(7, 'TABACONAS', 9, 6),
(7, 'KIMBIRI', 9, 8),
(7, 'SAN JUAN DE JARPA', 9, 12),
(7, 'SARIN', 9, 13),
(7, 'HUIMBAYOC', 9, 22),
(7, 'HUACHIS', 10, 2),
(7, 'COLCA', 10, 5),
(7, 'JOS? SABOGAL', 10, 6),
(7, 'PACCARITAMBO', 10, 8),
(7, 'SAN MIGUEL DE CAURI', 10, 10),
(7, 'SANTA CRUZ DE CHUCA', 10, 13),
(7, 'CARANIA', 10, 15),
(7, 'SAURAMA', 11, 5),
(7, 'LLAPA', 11, 6),
(7, 'PAMPAMARCA', 11, 10),
(7, 'PUEBLO LIBRE', 12, 2),
(7, 'HUARO', 12, 8),
(7, 'SAN JUAN DEL ORO', 12, 21),
(7, 'LUCMA', 13, 2),
(7, 'PULAN', 13, 6),
(7, 'YUCAY', 13, 8),
(7, 'UNICACHI', 13, 21),
(7, 'LLIPA', 14, 2),
(7, 'LLAPO', 15, 2),
(7, 'PAMPAS CHICO', 17, 2),
(7, 'SAMANCO', 18, 2),
(7, 'QUICHES', 19, 2),
(7, 'SHUPLUY', 20, 2),
(8, 'HUANCAS', 1, 1),
(8, 'OLLEROS', 1, 2),
(8, 'SAN PEDRO DE CACHORA', 1, 3),
(8, 'LA JOYA', 1, 4),
(8, 'QUINUA', 1, 5),
(8, 'LOS BA?OS DEL INCA', 1, 6),
(8, 'WANCHAQ', 1, 8),
(8, 'IZCUCHACA', 1, 9),
(8, 'SAN PEDRO DE CHAULAN', 1, 10),
(8, 'SALAS', 1, 11),
(8, 'CHONGOS ALTO', 1, 12),
(8, 'POROTO', 1, 13),
(8, 'MONSEFU', 1, 14),
(8, 'CHORRILLOS', 1, 15),
(8, 'PUNCHANA', 1, 16),
(8, 'SAN FRANCISCO DE ASIS DE YARUSYACAN', 1, 19),
(8, 'EL TALLAN', 1, 20),
(8, 'HUATA', 1, 21),
(8, 'POCOLLAY', 1, 23),
(8, 'PACOBAMBA', 2, 3),
(8, 'SAMUEL PASTOR', 2, 4),
(8, 'ROSARIO', 2, 9),
(8, 'TOMAY KICHWA', 2, 10),
(8, 'SAN JUAN DE YANAC', 2, 11),
(8, 'MANZANARES', 2, 12),
(8, 'CASA GRANDE', 2, 13),
(8, 'PUQUINA', 2, 18),
(8, 'VILCABAMBA', 2, 19),
(8, 'SAPILLICA', 2, 20),
(8, 'MU?ANI', 2, 21),
(8, 'RECTA', 3, 1),
(8, 'CHAPARRA', 3, 4),
(8, 'OXAMARCA', 3, 6),
(8, 'PUCYURA', 3, 8),
(8, 'HUAYLLAY GRANDE', 3, 9),
(8, 'OLMOS', 3, 14),
(8, 'CONSTITUCION', 3, 19),
(8, 'SONDORILLO', 3, 20),
(8, 'OLLACHEA', 3, 21),
(8, 'JUSTO APU SAHUARAURA', 4, 3),
(8, 'MACHAGUAY', 4, 4),
(8, 'LLOCHEGUA', 4, 5),
(8, 'CONCHAN', 4, 6),
(8, 'YANATILE', 4, 8),
(8, 'HUAMATAMBO', 4, 9),
(8, 'HUAMALI', 4, 12),
(8, 'SANTA CATALINA DE MOSSA', 4, 20),
(8, 'TICACO', 4, 23),
(8, 'LONYA CHICO', 5, 1),
(8, 'HUALLANCA', 5, 2),
(8, 'HUANCA', 5, 4),
(8, 'TAMBO', 5, 5),
(8, 'YONAN', 5, 6),
(8, 'TUPAC AMARU', 5, 8),
(8, 'SAN MIGUEL DE MAYOCC', 5, 9),
(8, 'PUNCHAO', 5, 10),
(8, 'TUPAC AMARU INCA', 5, 11),
(8, 'LUNAHUANA', 5, 15),
(8, 'SOPLIN', 5, 16),
(8, 'SAN ROQUE DE CUMBAZA', 5, 22),
(8, 'MILPUC', 6, 1),
(8, 'SAN MIGUEL DE ACO', 6, 2),
(8, 'RANRACANCHA', 6, 3),
(8, 'YANAQUIHUA', 6, 4),
(8, 'LARAMATE', 6, 5),
(8, 'SAN ANDR?S DE CUTERVO', 6, 6),
(8, 'TINTA', 6, 8),
(8, 'QUERCO', 6, 9),
(8, 'RIO TAMBO', 6, 12),
(8, 'MACHE', 6, 13),
(8, 'PACARAOS', 6, 15),
(8, 'SALITRAL', 6, 20),
(8, 'VILQUE CHICO', 6, 21),
(8, 'PROGRESO', 7, 3),
(8, 'UPAHUACHO', 7, 5),
(8, 'VELILLE', 7, 8),
(8, 'SAN PEDRO DE CAJAS', 7, 12),
(8, 'HUANZA', 7, 15),
(8, 'PUCARA', 7, 21),
(8, 'SHAMBOYACU', 7, 22),
(8, 'SAYLA', 8, 4),
(8, 'SAN JAVIER DE ALPABAMBA', 8, 5),
(8, 'PUCARA', 8, 6),
(8, 'ALTO PICHIGUA', 8, 8),
(8, 'SANTA ROSA DE SACCO', 8, 12),
(8, 'PARCOY', 8, 13),
(8, 'PACCHO', 8, 15),
(8, 'SANTA ROSA', 8, 21),
(8, 'YORONGOS', 8, 22),
(8, 'SAN PEDRO DE LARCAY', 9, 5),
(8, 'SANTA TERESA', 9, 8),
(8, 'TRES DE DICIEMBRE', 9, 12),
(8, 'SARTIMBAMBA', 9, 13),
(8, 'JUAN GUERRA', 9, 22),
(8, 'HUANTAR', 10, 2),
(8, 'HUAMANQUIQUIA', 10, 5),
(8, 'PILLPINTO', 10, 8),
(8, 'SITABAMBA', 10, 13),
(8, 'CATAHUASI', 10, 15),
(8, 'VISCHONGO', 11, 5),
(8, 'NANCHOC', 11, 6),
(8, 'CHORAS', 11, 10),
(8, 'SANTA CRUZ', 12, 2),
(8, 'LUCRE', 12, 8),
(8, 'YANAHUAYA', 12, 21),
(8, 'MUSGA', 13, 2),
(8, 'SAUCEPAMPA', 13, 6),
(8, 'SAN CRISTOBAL DE RAJAN', 14, 2),
(8, 'PALLASCA', 15, 2),
(8, 'PARARIN', 17, 2),
(8, 'SANTA', 18, 2),
(8, 'RAGASH', 19, 2),
(8, 'YANAMA', 20, 2),
(9, 'LA JALCA', 1, 1),
(9, 'PAMPAS GRANDE', 1, 2),
(9, 'TAMBURCO', 1, 3),
(9, 'MARIANO MELGAR', 1, 4),
(9, 'SAN JOS? DE TICLLAS', 1, 5),
(9, 'MAGDALENA', 1, 6),
(9, 'LARIA', 1, 9),
(9, 'SANTA MARIA DEL VALLE', 1, 10),
(9, 'SAN JOS? DE LOS MOLINOS', 1, 11),
(9, 'SALAVERRY', 1, 13),
(9, 'NUEVA ARICA', 1, 14),
(9, 'CIENEGUILLA', 1, 15),
(9, 'SIMON BOLIVAR', 1, 19),
(9, 'LA ARENA', 1, 20),
(9, 'MA?AZO', 1, 21),
(9, 'SAMA', 1, 23),
(9, 'PACUCHA', 2, 3),
(9, 'SAN PEDRO DE HUACARPANA', 2, 11),
(9, 'MARISCAL CASTILLA', 2, 12),
(9, 'QUINISTAQUILLAS', 2, 18),
(9, 'SICCHEZ', 2, 20),
(9, 'POTONI', 2, 21),
(9, 'SAN CARLOS', 3, 1),
(9, 'HUANUHUANU', 3, 4),
(9, 'SOROCHUCO', 3, 6),
(9, 'ZURITE', 3, 8),
(9, 'JULCAMARCA', 3, 9),
(9, 'PACORA', 3, 14),
(9, 'SAN GABAN', 3, 21),
(9, 'LUCRE', 4, 3),
(9, 'ORCOPAMPA', 4, 4),
(9, 'CANAYRE', 4, 5),
(9, 'HUAMBOS', 4, 6),
(9, 'MOLLEPAMPA', 4, 9),
(9, 'HUARIPAMPA', 4, 12),
(9, 'SANTO DOMINGO', 4, 20),
(9, 'LUYA', 5, 1),
(9, 'HUASTA', 5, 2),
(9, 'ICHUPAMPA', 5, 4),
(9, 'SAMUGARI', 5, 5),
(9, 'SAN PEDRO DE CORIS', 5, 9),
(9, 'PU?OS', 5, 10),
(9, 'MALA', 5, 15),
(9, 'TAPICHE', 5, 16),
(9, 'SHANAO', 5, 22),
(9, 'OMIA', 6, 1),
(9, 'SHILLA', 6, 2),
(9, 'LEONCIO PRADO', 6, 5),
(9, 'SAN JUAN DE CUTERVO', 6, 6),
(9, 'QUITO-ARMA', 6, 9),
(9, 'VIZCATAN DEL ENE', 6, 12),
(9, 'SAN MIGUEL DE ACOS', 6, 15),
(9, 'SAN ANTONIO', 7, 3),
(9, 'HUARIBAMBA', 7, 9),
(9, 'TAPO', 7, 12),
(9, 'HUAROCHIRI', 7, 15),
(9, 'SANTA LUCIA', 7, 21),
(9, 'TINGO DE PONASA', 7, 22),
(9, 'TAURIA', 8, 4),
(9, 'SAN JOS? DE USHUA', 8, 5),
(9, 'SALLIQUE', 8, 6),
(9, 'SUITUCANCHA', 8, 12),
(9, 'PATAZ', 8, 13),
(9, 'SANTA LEONOR', 8, 15),
(9, 'UMACHIRI', 8, 21),
(9, 'YURACYACU', 8, 22),
(9, 'SAN SALVADOR DE QUIJE', 9, 5),
(9, 'VILCABAMBA', 9, 8),
(9, 'YANACANCHA', 9, 12),
(9, 'LA BANDA DE SHILCAYO', 9, 22),
(9, 'MASIN', 10, 2),
(9, 'HUANCARAYLLA', 10, 5),
(9, 'YAURISQUE', 10, 8),
(9, 'CHOCOS', 10, 15),
(9, 'NIEPOS', 11, 6),
(9, 'SANTO TORIBIO', 12, 2),
(9, 'MARCAPATA', 12, 8),
(9, 'ALTO INAMBARI', 12, 21),
(9, 'SEXI', 13, 6),
(9, 'SAN PEDRO', 14, 2),
(9, 'PAMPAS', 15, 2),
(9, 'TAPACOCHA', 17, 2),
(9, 'NUEVO CHIMBOTE', 18, 2),
(9, 'SAN JUAN', 19, 2),
(10, 'LEIMEBAMBA', 1, 1),
(10, 'PARIACOTO', 1, 2),
(10, 'MIRAFLORES', 1, 4),
(10, 'SAN JUAN BAUTISTA', 1, 5),
(10, 'MATARA', 1, 6),
(10, 'MANTA', 1, 9),
(10, 'YARUMAYO', 1, 10),
(10, 'SAN JUAN BAUTISTA', 1, 11),
(10, 'SIMBAL', 1, 13),
(10, 'OYOTUN', 1, 14),
(10, 'COMAS', 1, 15),
(10, 'TORRES CAUSANA', 1, 16),
(10, 'TICLACAYAN', 1, 19),
(10, 'LA UNION', 1, 20),
(10, 'PAUCARCOLLA', 1, 21),
(10, 'CORONEL GREGORIO ALBARRACIN LANCHIPA', 1, 23),
(10, 'PAMPACHIRI', 2, 3),
(10, 'SUNAMPE', 2, 11),
(10, 'MATAHUASI', 2, 12),
(10, 'SANTA CRUZ', 2, 16),
(10, 'UBINAS', 2, 18),
(10, 'SUYO', 2, 20),
(10, 'SAMAN', 2, 21),
(10, 'SHIPASBAMBA', 3, 1),
(10, 'JAQUI', 3, 4),
(10, 'SUCRE', 3, 6),
(10, 'SAN ANTONIO DE ANTAPARCO', 3, 9),
(10, 'SALAS', 3, 14),
(10, 'USICAYOS', 3, 21),
(10, 'POCOHUANCA', 4, 3),
(10, 'PAMPACOLCA', 4, 4),
(10, 'UCHURACCAY', 4, 5),
(10, 'LAJAS', 4, 6),
(10, 'SAN JUAN', 4, 9),
(10, 'HUERTAS', 4, 12),
(10, 'YAMANGO', 4, 20),
(10, 'LUYA VIEJO', 5, 1),
(10, 'HUAYLLACAYAN', 5, 2),
(10, 'LARI', 5, 4),
(10, 'ANCHIHUAY', 5, 5),
(10, 'PACHAMARCA', 5, 9),
(10, 'SINGA', 5, 10),
(10, 'NUEVO IMPERIAL', 5, 15),
(10, 'JENARO HERRERA', 5, 16),
(10, 'TABALOSOS', 5, 22),
(10, 'SANTA ROSA', 6, 1),
(10, 'TINCO', 6, 2),
(10, 'LLAUTA', 6, 5),
(10, 'SAN LUIS DE LUCMA', 6, 6),
(10, 'SAN ANTONIO DE CUSICANCHA', 6, 9),
(10, 'PARANDAY', 6, 13),
(10, 'SANTA CRUZ DE ANDAMARCA', 6, 15),
(10, 'SANTA ROSA', 7, 3),
(10, '?AHUIMPUQUIO', 7, 9),
(10, 'LAHUAYTAMBO', 7, 15),
(10, 'VILAVILA', 7, 21),
(10, 'TRES UNIDOS', 7, 22),
(10, 'TOMEPAMPA', 8, 4),
(10, 'SARA SARA', 8, 5),
(10, 'SAN FELIPE', 8, 6),
(10, 'YAULI', 8, 12),
(10, 'PIAS', 8, 13),
(10, 'SANTA MARIA', 8, 15),
(10, 'SANTIAGO DE PAUCARAY', 9, 5),
(10, 'PICHARI', 9, 8),
(10, 'MORALES', 9, 22),
(10, 'PAUCAS', 10, 2),
(10, 'HUAYA', 10, 5),
(10, 'COCHAS', 10, 15),
(10, 'SAN GREGORIO', 11, 6),
(10, 'YURACMARCA', 12, 2),
(10, 'OCONGATE', 12, 8),
(10, 'SAN PEDRO DE PUTINA PUNCO', 12, 21),
(10, 'UTICYACU', 13, 6),
(10, 'SANTIAGO DE CHILCAS', 14, 2),
(10, 'SANTA ROSA', 15, 2),
(10, 'TICAPAMPA', 17, 2),
(10, 'SICSIBAMBA', 19, 2),
(11, 'LEVANTO', 1, 1),
(11, 'PIRA', 1, 2),
(11, 'MOLLEBAYA', 1, 4),
(11, 'SANTIAGO DE PISCHA', 1, 5),
(11, 'NAMORA', 1, 6),
(11, 'MARISCAL CACERES', 1, 9),
(11, 'PILLCO MARCA', 1, 10),
(11, 'SANTIAGO', 1, 11),
(11, 'CHUPURO', 1, 12),
(11, 'VICTOR LARCO HERRERA', 1, 13),
(11, 'PICSI', 1, 14),
(11, 'EL AGUSTINO', 1, 15),
(11, 'TINYAHUARCO', 1, 19),
(11, 'LAS LOMAS', 1, 20),
(11, 'PICHACANI', 1, 21),
(11, 'POMACOCHA', 2, 3),
(11, 'TAMBO DE MORA', 2, 11),
(11, 'MITO', 2, 12),
(11, 'TENIENTE CESAR LOPEZ ROJAS', 2, 16),
(11, 'YUNGA', 2, 18),
(11, 'SAN ANTON', 2, 21),
(11, 'VALERA', 3, 1),
(11, 'LOMAS', 3, 4),
(11, 'UTCO', 3, 6),
(11, 'SANTO TOMAS DE PATA', 3, 9),
(11, 'MARIAS', 3, 10),
(11, 'SAN JOS', 3, 14),
(11, 'SAN JUAN DE CHAC?A', 4, 3),
(11, 'TIPAN', 4, 4),
(11, 'PUCACOLPA', 4, 5),
(11, 'LLAMA', 4, 6),
(11, 'SANTA ANA', 4, 9),
(11, 'JANJAILLO', 4, 12),
(11, 'MARIA', 5, 1),
(11, 'LA PRIMAVERA', 5, 2),
(11, 'LLUTA', 5, 4),
(11, 'COSME', 5, 9),
(11, 'TANTAMAYO', 5, 10),
(11, 'PACARAN', 5, 15),
(11, 'YAQUERANA', 5, 16),
(11, 'ZAPATERO', 5, 22),
(11, 'TOTORA', 6, 1),
(11, 'YUNGAR', 6, 2),
(11, 'LUCANAS', 6, 5),
(11, 'SANTA CRUZ', 6, 6),
(11, 'SAN FRANCISCO DE SANGAYAICO', 6, 9),
(11, 'SALPO', 6, 13),
(11, 'SUMBILCA', 6, 15),
(11, 'TURPAY', 7, 3),
(11, 'PAZOS', 7, 9),
(11, 'LANGA', 7, 15),
(11, 'TORO', 8, 4),
(11, 'SAN JOS? DEL ALTO', 8, 6),
(11, 'SANTIAGO DE CHALLAS', 8, 13),
(11, 'SAYAN', 8, 15),
(11, 'SORAS', 9, 5),
(11, 'INKAWASI', 9, 8),
(11, 'PAPAPLAYA', 9, 22),
(11, 'PONTO', 10, 2),
(11, 'SARHUA', 10, 5),
(11, 'COLONIA', 10, 15),
(11, 'SAN SILVESTRE DE COCHAN', 11, 6),
(11, 'OROPESA', 12, 8),
(11, 'YAUYUCAN', 13, 6),
(11, 'TAUCA', 15, 2),
(12, 'MAGDALENA', 1, 1),
(12, 'TARICA', 1, 2),
(12, 'PAUCARPATA', 1, 4),
(12, 'SOCOS', 1, 5),
(12, 'SAN JUAN', 1, 6),
(12, 'MOYA', 1, 9),
(12, 'YACUS', 1, 10),
(12, 'SUBTANJALLA', 1, 11),
(12, 'COLCA', 1, 12),
(12, 'PIMENTEL', 1, 14),
(12, 'INDEPENDENCIA', 1, 15),
(12, 'BEL?N', 1, 16),
(12, 'VICCO', 1, 19),
(12, 'PLATERIA', 1, 21),
(12, 'SAN ANTONIO DE CACHI', 2, 3),
(12, 'NUEVE DE JULIO', 2, 12),
(12, 'SAN JOS', 2, 21),
(12, 'YAMBRASBAMBA', 3, 1),
(12, 'QUICACHA', 3, 4),
(12, 'LA LIBERTAD DE PALLAN', 3, 6),
(12, 'SECCLLA', 3, 9),
(12, 'TUCUME', 3, 14),
(12, 'SA?AYCA', 4, 3),
(12, 'U?ON', 4, 4),
(12, 'MIRACOSTA', 4, 6),
(12, 'TANTARA', 4, 9),
(12, 'JULCAN', 4, 12),
(12, 'OCALLI', 5, 1),
(12, 'MANGAS', 5, 2),
(12, 'MACA', 5, 4),
(12, 'QUILMANA', 5, 15),
(12, 'VISTA ALEGRE', 6, 1),
(12, 'OCA?A', 6, 5),
(12, 'SANTO DOMINGO DE LA CAPILLA', 6, 6),
(12, 'SAN ISIDRO', 6, 9),
(12, 'VEINTISIETE DE NOVIEMBRE', 6, 15),
(12, 'VILCABAMBA', 7, 3),
(12, 'LARAOS', 7, 15),
(12, 'SANTA ROSA', 8, 6),
(12, 'TAURIJA', 8, 13),
(12, 'VEGUETA', 8, 15),
(12, 'VILLA VIRGEN', 9, 8),
(12, 'SAN ANTONIO', 9, 22),
(12, 'RAHUAPAMPA', 10, 2),
(12, 'VILCANCHOS', 10, 5),
(12, 'HONGOS', 10, 15),
(12, 'TONGOD', 11, 6),
(12, 'QUIQUIJANA', 12, 8),
(13, 'MARISCAL CASTILLA', 1, 1),
(13, 'POCSI', 1, 4),
(13, 'TAMBILLO', 1, 5),
(13, 'NUEVO OCCORO', 1, 9),
(13, 'TATE', 1, 11),
(13, 'CULLHUAS', 1, 12),
(13, 'REQUE', 1, 14),
(13, 'JES?S MARIA', 1, 15),
(13, 'SAN JUAN BAUTISTA', 1, 16),
(13, 'YANACANCHA', 1, 19),
(13, 'SAN ANTONIO', 1, 21),
(13, 'SAN JERONIMO', 2, 3),
(13, 'ORCOTUNA', 2, 12),
(13, 'SAN JUAN DE SALINAS', 2, 21),
(13, 'YAUCA', 3, 4),
(13, 'PACHAS', 3, 10),
(13, 'SORAYA', 4, 3),
(13, 'URACA', 4, 4),
(13, 'PACCHA', 4, 6),
(13, 'TICRAPO', 4, 9),
(13, 'LEONOR ORDO?EZ', 4, 12),
(13, 'OCUMAL', 5, 1),
(13, 'PACLLON', 5, 2),
(13, 'MADRIGAL', 5, 4),
(13, 'SAN ANTONIO', 5, 15),
(13, 'OTOCA', 6, 5),
(13, 'SANTO TOMAS', 6, 6),
(13, 'SANTIAGO DE CHOCORVOS', 6, 9),
(13, 'SINSICAP', 6, 13),
(13, 'VIRUNDO', 7, 3),
(13, 'QUISHUAR', 7, 9),
(13, 'MARIATANA', 7, 15),
(13, 'URPAY', 8, 13),
(13, 'VILLA KINTIARINA', 9, 8),
(13, 'SAUCE', 9, 22),
(13, 'RAPAYAN', 10, 2),
(13, 'HUAMPARA', 10, 15),
(13, 'UNION AGUA BLANCA', 11, 6),
(14, 'MOLINOPAMPA', 1, 1),
(14, 'POLOBAYA', 1, 4),
(14, 'VINCHOS', 1, 5),
(14, 'PALCA', 1, 9),
(14, 'YAUCA DEL ROSARIO', 1, 11),
(14, 'EL TAMBO', 1, 12),
(14, 'SANTA ROSA', 1, 14),
(14, 'LA MOLINA', 1, 15),
(14, 'TAMBO GRANDE', 1, 20),
(14, 'TIQUILLACA', 1, 21),
(14, 'SAN MIGUEL DE CHACCRAMPA', 2, 3),
(14, 'SAN JOS? DE QUERO', 2, 12),
(14, 'SANTIAGO DE PUPUJA', 2, 21),
(14, 'TAPAIRIHUA', 4, 3),
(14, 'VIRACO', 4, 4),
(14, 'PION', 4, 6),
(14, 'LLOCLLAPAMPA', 4, 12),
(14, 'PISUQUIA', 5, 1),
(14, 'SAN MIGUEL DE CORPANQUI', 5, 2),
(14, 'SAN ANTONIO DE CHUCA', 5, 4),
(14, 'SAN LUIS', 5, 15),
(14, 'SAISA', 6, 5),
(14, 'SOCOTA', 6, 6),
(14, 'SANTIAGO DE QUIRAHUARA', 6, 9),
(14, 'USQUIL', 6, 13),
(14, 'CURASCO', 7, 3),
(14, 'SALCABAMBA', 7, 9),
(14, 'RICARDO PALMA', 7, 15),
(14, 'SHAPAJA', 9, 22),
(14, 'SAN MARCOS', 10, 2),
(14, 'HUANCAYA', 10, 15),
(15, 'MONTEVIDEO', 1, 1),
(15, 'QUEQUE?A', 1, 4),
(15, 'JES?S NAZARENO', 1, 5),
(15, 'PILCHACA', 1, 9),
(15, 'SA?A', 1, 14),
(15, 'LA VICTORIA', 1, 15),
(15, 'VEINTISEIS DE OCTUBRE', 1, 20),
(15, 'VILQUE', 1, 21),
(15, 'SANTA MARIA DE CHICMO', 2, 3),
(15, 'SANTA ROSA DE OCOPA', 2, 12),
(15, 'TIRAPATA', 2, 21),
(15, 'TINTAY', 4, 3),
(15, 'QUEROCOTO', 4, 6),
(15, 'MARCO', 4, 12),
(15, 'PROVIDENCIA', 5, 1),
(15, 'TICLLOS', 5, 2),
(15, 'SIBAYO', 5, 4),
(15, 'SANTA CRUZ DE FLORES', 5, 15),
(15, 'SAN CRISTOBAL', 6, 5),
(15, 'TORIBIO CASANOVA', 6, 6),
(15, 'SANTO DOMINGO DE CAPILLAS', 6, 9),
(15, 'SALCAHUASI', 7, 9),
(15, 'SAN ANDR?S DE TUPICOCHA', 7, 15),
(15, 'SAN PEDRO DE CHANA', 10, 2),
(15, 'HUANGASCAR', 10, 15),
(16, 'OLLEROS', 1, 1),
(16, 'SABANDIA', 1, 4),
(16, 'ANDR?S AVELINO CACERES DORREGARAY', 1, 5),
(16, 'VILCA', 1, 9),
(16, 'HUACRAPUQUIO', 1, 12),
(16, 'CAYALTI', 1, 14),
(16, 'LINCE', 1, 15),
(16, 'TALAVERA', 2, 3),
(16, 'QUIVILLA', 3, 10),
(16, 'TORAYA', 4, 3),
(16, 'SAN JUAN DE LICUPIS', 4, 6),
(16, 'MASMA', 4, 12),
(16, 'SAN CRISTOBAL', 5, 1),
(16, 'TAPAY', 5, 4),
(16, 'Z??IGA', 5, 15),
(16, 'SAN JUAN', 6, 5),
(16, 'TAMBO', 6, 9),
(16, 'SAN MARCOS DE ROCCHAC', 7, 9),
(16, 'SAN ANTONIO', 7, 15),
(16, 'UCO', 10, 2),
(16, 'HUANTAN', 10, 15),
(17, 'QUINJALCA', 1, 1),
(17, 'SACHACA', 1, 4),
(17, 'YAULI', 1, 9),
(17, 'HUALHUAS', 1, 12),
(17, 'PATAPO', 1, 14),
(17, 'LOS OLIVOS', 1, 15),
(17, 'TUMAY HUARACA', 2, 3),
(17, 'RIPAN', 3, 10),
(17, 'YANACA', 4, 3),
(17, 'TACABAMBA', 4, 6),
(17, 'MASMA CHICCHE', 4, 12),
(17, 'SAN FRANCISCO DE YESO', 5, 1),
(17, 'TISCO', 5, 4),
(17, 'SAN PEDRO', 6, 5),
(17, 'SURCUBAMBA', 7, 9),
(17, 'SAN BARTOLOM', 7, 15),
(17, 'HUA?EC', 10, 15),
(18, 'SAN FRANCISCO DE DAGUAS', 1, 1),
(18, 'SAN JUAN DE SIGUAS', 1, 4),
(18, 'ASCENSION', 1, 9),
(18, 'POMALCA', 1, 14),
(18, 'LURIGANCHO', 1, 15),
(18, 'TURPO', 2, 3),
(18, 'TOCMOCHE', 4, 6),
(18, 'MOLINOS', 4, 12),
(18, 'SAN JERONIMO', 5, 1),
(18, 'TUTI', 5, 4),
(18, 'SAN PEDRO DE PALCO', 6, 5),
(18, 'TINTAY PUNCU', 7, 9),
(18, 'SAN DAMIAN', 7, 15),
(18, 'LARAOS', 10, 15),
(19, 'SAN ISIDRO DE MAINO', 1, 1),
(19, 'SAN JUAN DE TARUCANI', 1, 4),
(19, 'HUANDO', 1, 9),
(19, 'HUANCAN', 1, 12),
(19, 'PUCALA', 1, 14),
(19, 'LURIN', 1, 15),
(19, 'KAQUIABAMBA', 2, 3),
(19, 'CHALAMARCA', 4, 6),
(19, 'MONOBAMBA', 4, 12),
(19, 'SAN JUAN DE LOPECANCHA', 5, 1),
(19, 'YANQUE', 5, 4),
(19, 'SANCOS', 6, 5),
(19, 'QUICHUAS', 7, 9),
(19, 'SAN JUAN DE IRIS', 7, 15),
(19, 'LINCHA', 10, 15),
(20, 'SOLOCO', 1, 1),
(20, 'SANTA ISABEL DE SIGUAS', 1, 4),
(20, 'HUASICANCHA', 1, 12),
(20, 'TUMAN', 1, 14),
(20, 'MAGDALENA DEL MAR', 1, 15),
(20, 'JOS? MARIA ARGUEDAS', 2, 3),
(20, 'MUQUI', 4, 12),
(20, 'SANTA CATALINA', 5, 1),
(20, 'MAJES', 5, 4),
(20, 'SANTA ANA DE HUAYCAHUACHO', 6, 5),
(20, 'ANDAYMARCA', 7, 9),
(20, 'SAN JUAN DE TANTARANCHE', 7, 15),
(20, 'MADEAN', 10, 15),
(21, 'SONCHE', 1, 1),
(21, 'SANTA RITA DE SIGUAS', 1, 4),
(21, 'HUAYUCACHI', 1, 12),
(21, 'PUEBLO LIBRE', 1, 15),
(21, 'SHUNQUI', 3, 10),
(21, 'MUQUIYAUYO', 4, 12),
(21, 'SANTO TOMAS', 5, 1),
(21, 'SANTA LUCIA', 6, 5),
(21, 'SAN LORENZO DE QUINTI', 7, 15),
(21, 'MIRAFLORES', 10, 15),
(22, 'SOCABAYA', 1, 4),
(22, 'INGENIO', 1, 12),
(22, 'MIRAFLORES', 1, 15),
(22, 'SILLAPATA', 3, 10),
(22, 'PACA', 4, 12),
(22, 'TINGO', 5, 1),
(22, 'SAN MATEO', 7, 15),
(22, 'OMAS', 10, 15),
(23, 'TIABAYA', 1, 4),
(23, 'PACHACAMAC', 1, 15),
(23, 'YANAS', 3, 10),
(23, 'PACCHA', 4, 12),
(23, 'TRITA', 5, 1),
(23, 'SAN MATEO DE OTAO', 7, 15),
(23, 'PUTINZA', 10, 15),
(24, 'UCHUMAYO', 1, 4),
(24, 'PARIAHUANCA', 1, 12),
(24, 'PUCUSANA', 1, 15),
(24, 'PANCAN', 4, 12),
(24, 'SAN PEDRO DE CASTA', 7, 15),
(24, 'QUINCHES', 10, 15),
(25, 'VITOR', 1, 4),
(25, 'PILCOMAYO', 1, 12),
(25, 'PUENTE PIEDRA', 1, 15),
(25, 'PARCO', 4, 12),
(25, 'SAN PEDRO DE HUANCAYRE', 7, 15),
(25, 'QUINOCAY', 10, 15),
(26, 'YANAHUARA', 1, 4),
(26, 'PUCARA', 1, 12),
(26, 'PUNTA HERMOSA', 1, 15),
(26, 'POMACANCHA', 4, 12),
(26, 'SANGALLAYA', 7, 15),
(26, 'SAN JOAQUIN', 10, 15),
(27, 'YARABAMBA', 1, 4),
(27, 'QUICHUAY', 1, 12),
(27, 'PUNTA NEGRA', 1, 15),
(27, 'RICRAN', 4, 12),
(27, 'SANTA CRUZ DE COCACHACRA', 7, 15),
(27, 'SAN PEDRO DE PILAS', 10, 15),
(28, 'YURA', 1, 4),
(28, 'QUILCAS', 1, 12),
(28, 'RIMAC', 1, 15),
(28, 'SAN LORENZO', 4, 12),
(28, 'SANTA EULALIA', 7, 15),
(28, 'TANTA', 10, 15),
(29, 'JOS? LUIS BUSTAMANTE Y RIVERO', 1, 4),
(29, 'SAN AGUSTIN', 1, 12),
(29, 'SAN BARTOLO', 1, 15),
(29, 'SAN PEDRO DE CHUNAN', 4, 12),
(29, 'SANTIAGO DE ANCHUCAYA', 7, 15),
(29, 'TAURIPAMPA', 10, 15),
(30, 'SAN JERONIMO DE TUNAN', 1, 12),
(30, 'SAN BORJA', 1, 15),
(30, 'SAUSA', 4, 12),
(30, 'SANTIAGO DE TUNA', 7, 15),
(30, 'TOMAS', 10, 15),
(31, 'SAN ISIDRO', 1, 15),
(31, 'SINCOS', 4, 12),
(31, 'SANTO DOMINGO DE LOS OLLEROS', 7, 15),
(31, 'TUPE', 10, 15),
(32, 'SA?O', 1, 12),
(32, 'SAN JUAN DE LURIGANCHO', 1, 15),
(32, 'TUNAN MARCA', 4, 12),
(32, 'SURCO', 7, 15),
(32, 'VI?AC', 10, 15),
(33, 'SAPALLANGA', 1, 12),
(33, 'SAN JUAN DE MIRAFLORES', 1, 15),
(33, 'YAULI', 4, 12),
(33, 'VITIS', 10, 15),
(34, 'SICAYA', 1, 12),
(34, 'SAN LUIS', 1, 15),
(34, 'YAUYOS', 4, 12),
(35, 'SANTO DOMINGO DE ACOBAMBA', 1, 12),
(35, 'SAN MARTIN DE PORRES', 1, 15),
(36, 'VIQUES', 1, 12),
(36, 'SAN MIGUEL', 1, 15),
(37, 'SANTA ANITA', 1, 15),
(38, 'SANTA MARIA DEL MAR', 1, 15),
(39, 'SANTA ROSA', 1, 15),
(40, 'SANTIAGO DE SURCO', 1, 15),
(41, 'SURQUILLO', 1, 15),
(42, 'VILLA EL SALVADOR', 1, 15),
(43, 'VILLA MARIA DEL TRIUNFO', 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `clase` int(2) NOT NULL,
  `tipo` char(15) NOT NULL,
  `nombre` tinytext NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario` char(15) NOT NULL,
  `formato` char(5) NOT NULL,
  `version` int(3) NOT NULL,
  `archivo` tinytext NOT NULL,
  `empresa` char(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `clase`, `tipo`, `nombre`, `fecha_creacion`, `fecha_modificacion`, `usuario`, `formato`, `version`, `archivo`, `empresa`, `estado`) VALUES
(001, 1, 'SST', 'POLITICA DE SST', '2016-07-26 19:33:52', '2016-07-26 19:33:52', 'loyanguren', 'doc', 1, 'SST-POL-001_POLITICA_DE_SST.doc', '20601083427', '1'),
(001, 3, 'SST', 'REGLAS BASICAS DE SEGURIDAD', '2016-07-26 19:36:09', '2016-07-26 19:36:09', 'loyanguren', 'doc', 1, 'SST-RGL-001_REGLAS_BASICAS_DE_SEGURIDAD.doc', '20601083427', '1'),
(001, 5, 'SST', 'FORMACION DE SUPERVISOR SST', '2016-07-26 19:37:20', '2016-07-26 19:37:20', 'loyanguren', 'doc', 1, 'SST-PRO-001_FORMACION_DE_SUPERVISOR_SST.doc', '20601083427', '1'),
(001, 6, 'SST', 'MEMORANDUM NO CONFORMIDAD PROCESO ELECTORAL SST', '2016-07-26 19:36:56', '2016-07-26 19:36:56', 'loyanguren', 'doc', 1, 'SST-MEM-001_MEMORANDUM_NO_CONFORMIDAD_PROCESO_ELECTORAL_SST.doc', '20601083427', '1'),
(002, 3, 'SST', 'REGLAMENTO DE SEGURIDAD Y SALUD', '2016-07-26 19:38:44', '2016-07-26 19:38:44', 'loyanguren', 'doc', 1, 'SST-RGL-002_REGLAMENTO_DE_SEGURIDAD_Y_SALUD.doc', '20601083427', '1'),
(004, 4, 'SST', 'EVALUACION DE POLITICA DE SST', '2016-07-26 19:34:16', '2016-07-26 19:34:16', 'loyanguren', 'doc', 1, 'SST-REG-004_EVALUACION_DE_POLITICA_DE_SST.doc', '20601083427', '1'),
(005, 4, 'SST', 'ENTREGA DE POLITICA DE SST', '2016-07-26 19:35:21', '2016-07-26 19:35:21', 'loyanguren', 'doc', 1, 'SST-REG-005_ENTREGA_DE_POLITICA_DE_SST.doc', '20601083427', '1'),
(006, 4, 'SST', 'CONSULTA SOBRE POLITICA DE SST', '2016-07-26 19:35:51', '2016-07-26 19:35:51', 'loyanguren', 'doc', 1, 'SST-REG-006_CONSULTA_SOBRE_POLITICA_DE_SST.doc', '20601083427', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `codigo` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(8) DEFAULT NULL,
  `nombres` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_pat` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_mat` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distrito` int(2) NOT NULL,
  `provincia` int(2) NOT NULL,
  `departamento` int(2) NOT NULL,
  `email` varchar(245) COLLATE utf8_spanish_ci DEFAULT '-',
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` char(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_civil` int(2) NOT NULL,
  `categoria` int(2) NOT NULL,
  `jornal` double(5,2) DEFAULT NULL,
  `cargo` int(2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `especializacion` int(2) NOT NULL,
  `seguro_pension` int(2) NOT NULL,
  `fecha_afiliacion` date DEFAULT NULL,
  `cuspp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_seguro_pension` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grupo_sanguineo` int(2) NOT NULL,
  `factor_sanguineo` int(2) NOT NULL,
  `renta_5ta` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`codigo`, `empresa`, `dni`, `nombres`, `ape_pat`, `ape_mat`, `direccion`, `distrito`, `provincia`, `departamento`, `email`, `fecha_nacimiento`, `telefono`, `estado_civil`, `categoria`, `jornal`, `cargo`, `fecha_ingreso`, `especializacion`, `seguro_pension`, `fecha_afiliacion`, `cuspp`, `tipo_seguro_pension`, `grupo_sanguineo`, `factor_sanguineo`, `renta_5ta`, `imagen`, `estado`) VALUES
('001', '20601083427', 71706941, 'ADERLI ILMER', 'ALANGUIA', 'CASTILLO', 'ASOC. A. HORIZONTE MZ -I   LT-26', 4, 1, 23, '-', '1997-03-31', '952682654', 1, 2, 28.00, 10, '2016-06-01', 1, 1, '2016-06-01', '-', '1', 1, 1, '0', 'noimage.png', '1'),
('002', '20601083427', 73998062, 'SANDRA', 'ALANOCA', 'CCAMA', 'ASOC VIV. VILLA EL TRIUNFO CMTE 02 MZ-339  LT-28', 4, 1, 23, '-', '1997-01-01', '950283633', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', '2', 1, 1, '0', 'noimage.png', '1'),
('003', '20601083427', 487308, 'AURELIA', 'ALANOCA', 'HONORI', 'VILLA EL TRIUNFOBMZ-339   LT-26  CMTE 2', 4, 1, 23, '-', '1968-09-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '1', 'noimage.png', '1'),
('004', '20601083427', 71524812, 'RODRIGO ANDRES', 'ALANOCA', 'NINARAQUE', 'LA YARADA 5 Y 6 POZO 7 PARCELA 97A', 1, 1, 23, '-', '1994-06-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('005', '20601083427', 41056702, 'MARIA ELENA', 'ALANOCA', 'RAMOS', 'ASENT. H. CIUDAD NUEVA MZ-44  LT-23', 4, 1, 23, '-', '1981-01-16', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('006', '20601083427', 41374168, 'ANGELINA', 'ANQUISE', 'CONDORI', 'ASENT. H. CIUDAD NUEVA MZ-24  LT-2', 4, 1, 23, '-', '1982-08-02', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('007', '20601083427', 42016281, 'DIONICIA', 'APAZA', 'QUISPE', 'XXXXXXXXXXXXX', 4, 1, 23, '-', '1983-10-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('008', '20601083427', 504574, 'ANGELICA', 'ARHUATA', 'TARAPA', 'ASOC. VILLA EL COMERCIANTE  MZ-108  LT-29', 10, 1, 23, '-', '1976-01-18', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('009', '20601083427', 46220485, 'LURCECIA MELBA', 'ARO', 'LUPACA', 'ASOC. VIV. JERUSALEN NUEVA ESPERANZA MZ-92 LT-04', 8, 1, 23, '-', '1990-03-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('010', '20601083427', 48575221, 'JUNIOR EDIZON', 'AROHUATA', 'SOSA', 'ASOC. EL MORRO MZ-O  LT-28', 10, 1, 23, '-', '1994-10-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('011', '20601083427', 42282310, 'SONIA VERONICA', 'AVENDAÃ‘O', 'ARRATIA', 'CIUDAD NUEVA CMTE 3  MZ-21  LT-22', 4, 1, 23, '-', '1984-01-11', '988210561', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('012', '20601083427', 46822307, 'ROSMERY', 'AYALA', 'QUISPE', 'A.H. PROYECTO NORTE  MZ-315  LT-02  I ETAPA', 4, 1, 23, '-', '1992-02-21', '921856045', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('013', '20601083427', 76952635, 'LUIS FERNANDO', 'AYCA', 'COHAILA', 'ASOC VIV A FRONTERA MZ-H  LT-07', 4, 1, 23, '-', '1998-02-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('014', '20601083427', 500368, 'JULIA', 'AYCAYA', 'CHURA', 'ASOC VIVN15 DE JUIO MZ- 359  LT-24', 10, 1, 23, '-', '1969-06-20', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('015', '20601083427', 40240848, 'PETRONA', 'BRIO', 'CHAMBILLA', 'AMPLC. CIUDAD NUEVA  MZ-126  LT-8  CMTE 25', 4, 1, 23, '-', '1979-07-30', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('016', '20601083427', 683921, 'CELIA', 'CABALLERO', 'FLORES', 'VILLA EL TRIUNFO MZ-337  LT-22  CMTE 4', 4, 1, 23, '-', '1971-09-17', '952931837', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('017', '20601083427', 1860377, 'GENARA', 'CALISAYA', 'HERRERA', 'ASOC VIV. VIRGEN DE LAS MERCEDES MZ-EÂ´ LT-5', 8, 1, 23, '-', '1973-01-19', '952867252', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('018', '20601083427', 508190, 'SONIA', 'CALIZAYA', 'CACERES', 'URB NUESTRA SRA DEL CARMEN NÂ°331-A', 1, 1, 23, '-', '1970-10-19', '942147544', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('020', '20601083427', 73971299, 'NANCY MARIBEL', 'CALIZAYA', 'ROQUE', 'ASOC VIV LOS LIBERTADORES MZ-462  LT-12', 10, 1, 23, '-', '1994-03-26', '988527217', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('021', '20601083427', 41251448, 'ESPERANZA', 'CALLOHUARI', 'COAQUIRA', 'ASOC SOL NACIENTE MZ-D  LT-1', 4, 1, 23, '-', '1982-02-25', '946989422', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('022', '20601083427', 43021451, 'ROSA ANTONIA', 'CAMA', 'QUENTA', 'AGRP CIUDAD NUEVA MZ-126  LT-26', 4, 1, 23, '-', '1985-04-17', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '1', 'noimage.png', '1'),
('023', '20601083427', 44449542, 'VERONICA', 'CAMPOS', 'CHOQUE', 'P. JOVEN SAN MARTIN CARLOS WISSE N-25', 2, 1, 23, '-', '1987-08-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('024', '20601083427', 72160292, 'MARIBEL', 'CAPAQUIRA', 'AQUINO', 'ASOC. VIV.28 DE AGOSTO MZ-357  LT-01', 4, 1, 23, '', '1994-06-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '-', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('025', '20601083427', 47104226, 'YANETH', 'CAPAQUIRA', 'AQUINO', 'ASOC. VIV. 28 DE AGOSTO 367-01', 4, 1, 23, '', '1991-12-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('026', '20601083427', 40813875, 'SABINA PATRICIA', 'CCAMA', 'TACCA', 'CIUDAD NUEVA MZ-02  LT-25', 4, 1, 23, '', '1981-02-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('027', '20601083427', 46015021, 'ELENA', 'CCAMA', 'VILCA', 'ASOC VIV EL TRIUNFO MZ-330 LT-2', 4, 1, 23, '', '1974-09-18', '969188056', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', '1', 2, 2, '0', 'noimage.png', '1'),
('029', '20601083427', 40618083, 'MARTINA JUANA', 'CENTENO', 'JIHUAÃ‘A', 'ASOC 24 DE FEBRERO MZ-D  LT-C', 4, 1, 23, '', '1971-10-26', '962523654', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('030', '20601083427', 1313021, 'JULIA', 'CENTON', 'FLORES', 'ASOC 28 DE AGOSTO MZ-358  LT-27', 4, 1, 23, '', '1970-01-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('031', '20601083427', 791233, 'LIDIA', 'CHALLCO', 'SUCAPUCA', 'ASOC VIV LAS COLMENAS MZ-93  LT-1', 8, 1, 23, '', '1974-02-11', '942996470', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('032', '20601083427', 1875711, 'ROSALIA LILA', 'CHALLO', 'QUIÃ‘ONEZ', 'AMPLC. CIUDAD NUEVA  MZ-152  LT-6  CMTE 34', 4, 1, 23, '', '1977-08-16', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('033', '20601083427', 70996503, 'JULIA', 'CHAMBILLA', 'ALAVE', 'VISTA ALEGRE MZ-31  LT-12', 4, 1, 23, '', '1994-10-19', '988681861', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('034', '20601083427', 41691733, 'OLGA MARIA', 'CHAMBILLA', 'CACHITARI', 'AMPL CIUDAD NUEVA MZ-176  LT-22  CMTE 48', 4, 1, 23, '', '1983-01-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 1, '0', 'noimage.png', '1'),
('035', '20601083427', 1867018, 'ALICIA', 'CHAMBILLA ', 'CHAPARRO DE TOTORA', 'ASOC FRONTERA SUR MZ-9  LT-21', 10, 1, 23, '', '1976-05-17', '950000000', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('036', '20601083427', 511680, 'FRANCISCA', 'CHAMBILLA', 'QUIÃ‘ONEZ', 'ASOC VISTA ALEGRE MZ-31  LT-12', 10, 1, 23, '', '1973-10-11', '950880381', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('037', '20601083427', 449916, 'LUCILA', 'CHOQUE', 'APAZA', 'AV MARIANO NECOCHEANMZ-171  LT-21  CMTE 28', 4, 1, 23, '', '1968-06-03', '980077430', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('038', '20601083427', 77035003, 'JESUS ROBERTO', 'CHOQUE', 'RODRIGO', 'ASOC 28 DE AGOSTO CMTE 14 MZ-367  LT-08', 4, 1, 23, '', '1994-11-10', '987880556', 1, 2, 28.00, 10, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 1, '0', 'noimage.png', '1'),
('039', '20601083427', 503440, 'ELENA', 'CHUQUITAIPE', 'GONZALES', 'CIUDAD NUEVA MZ- 75  LT- 26  CMTE19', 4, 1, 23, '', '1967-10-16', '950000000', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('040', '20601083427', 45462581, 'ALEJANDRINA', 'CHURA', 'CACHICATARI', 'ASOC 28 DE AGOSTO MZ-302  LT-19', 4, 1, 23, '', '1988-11-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('041', '20601083427', 40364351, 'ROSA', 'CHURA', 'CACHICATARI', 'ASOC 28 DE AGOSTO CMTE 4 MZ-310  LT-05', 4, 1, 23, '', '1979-10-01', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('042', '20601083427', 45988981, 'ERIKA PATRICIA', 'CHURA', 'MAMANI', 'CONJ HAB ALFONSO UGARTE III LAS ORTENCIAS MZ-03  LT-15', 10, 1, 23, '', '1989-10-18', '950000000', 1, 2, 28.00, 10, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('043', '20601083427', 41841633, 'SONIA', 'CHURACUTIPA', 'DURAN', 'CIUDAD NUEVA MZ. 351 LT. 8 CMTE 2', 4, 1, 23, '', '1983-03-16', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('044', '20601083427', 47792006, 'RICHARD', 'COAQUIRA', 'NINA', 'AH CIUDAD NUEVA MZ.43 LT. 18', 4, 1, 23, '', '1992-09-18', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('045', '20601083427', 43872210, 'CARMEN REYNALDA', 'COHAILA', 'AYCA', 'ASOC. VIV VISTA ALEGRE MZ.XX LT. 3', 8, 1, 23, '', '1983-11-26', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('046', '20601083427', 792727, 'NELLY BERTHA', 'COHAILA', 'CUTIPA', 'ASOC. VIV VISTA ALEGRE MZ.H LT.3 ', 8, 1, 23, '', '1975-01-14', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('047', '20601083427', 60321185, 'OFELIA', 'COLORADO', 'PILCO', 'ASOC. VIV. CESAR VALLEJO H-07', 4, 1, 23, '', '1994-12-07', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('048', '20601083427', 47300762, 'VICTORIA', 'CONDORENA', 'VARGAS', 'ASOC. DE VIV. 27 DE JULIO MZ. 8 LT. 02', 4, 1, 23, '', '1983-06-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('049', '20601083427', 48748653, 'JAVIER MARCELINO', 'CONDORI', 'LAYME', 'ASOC DE VIV. VILLA 28 DE OCTUBRE MZ. 109 LT. 27', 10, 1, 23, '', '1996-03-02', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('050', '20601083427', 43982342, 'DAVID', 'CONDORI', 'NINA', 'ASOC. LAS BUGANVILLAS MZ. A LT. 15 ', 10, 1, 23, '', '1986-08-03', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('051', '20601083427', 43123972, 'ROSA SARA', 'CONDORI', 'VELASQUEZ', 'ASOC. VIV. JERUSALEN NUEVA ESPERANZA MZ. 62 LT. 11', 8, 1, 23, '', '1985-08-12', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('052', '20601083427', 449514, 'PAULINA', 'COPAJA', 'QUISPE', 'AMPLC. CIUDAD NUEVA MZ. 118 LT. 10 CTE. 41', 4, 1, 23, '', '1961-07-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('053', '20601083427', 501322, 'VERONICA SONIA', 'DELGADO', 'CHOQUEPATA', 'ASOC. VIV. JERUSALEN NUEVA ESPERANZA MZ. 68 LT. 00', 8, 1, 23, '', '1975-02-14', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('054', '20601083427', 42043954, 'DELIA ', 'ESCOBAR', 'TICONA', 'ASOC. 28 DE AGOSTO MZ. 388 LT.2', 4, 1, 23, '', '1983-10-26', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('055', '20601083427', 667568, 'DORIS DOLORES', 'ESPINOZA', 'ROSPIGLIOSI', 'P. JOVEN SAN MARTIN MZ. N LT.10 ', 1, 1, 23, '', '1973-06-01', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('056', '20601083427', 81416638, 'GEOVANA JHAZMIN ', 'FLORES ', 'CHALLCO', 'ASOC. VC LAS COLMENAS POCOLLAY MZ.93 LT. 01', 8, 1, 23, '', '1996-04-16', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('057', '20601083427', 509663, 'ROGELIA', 'FLORES', 'MENDOZA', 'ASOC. 28 DE AGOSTO MZ. 310 LT.10', 4, 1, 23, '', '1971-12-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('058', '20601083427', 46516636, 'HUGO', 'FLORES', 'PARI', 'ASOC. LA FRONTERA MZ. D LT. 11', 4, 1, 23, '', '1982-01-03', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('059', '20601083427', 43588777, 'RICHARD', 'FLORES', 'PARI', 'ASOC. LA FRONTERA MZ. D LT. 11', 4, 1, 23, '', '1986-04-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('060', '20601083427', 48155754, 'LUZ NELIDA', 'FLORES', 'RAMOS', 'XX', 2, 2, 23, '', '1993-11-11', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('061', '20601083427', 43261339, 'VICTORIA LETICIA', 'FLORES', 'SILVA', 'P.J. SAN MARTIN MZ. 06 LT. 04', 2, 1, 23, '', '1979-12-04', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('062', '20601083427', 47130203, 'CARMEN', 'FORA', 'MAQUERA', 'AV. EJERCITO 992', 1, 5, 21, '', '1992-07-16', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('063', '20601083427', 76690451, 'MARIBEL', 'FORA', 'MAQUERA', 'AV. EJERCITO 992', 1, 5, 21, '', '1994-07-01', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('065', '20601083427', 70795441, 'NOE ABRAHAM ', 'FORA ', 'MAQUERA', 'PJ. PARACHICO/S.ALCAZAR 1133', 1, 1, 23, '', '1992-11-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('067', '20601083427', 1864564, 'MARIA', 'GOMEZ', 'PARI', 'JSC. WV. JERUSALEN NUEVA ESPERANZA 15-12', 8, 1, 23, '', '1975-05-11', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('068', '20601083427', 1328865, 'LIDIA DIONILDA ', 'GONZALES ', 'MAMANI', 'ASOC. MARISCAL NETO MZ. F LT. 3', 4, 1, 23, '', '1975-11-17', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('069', '20601083427', 47035029, 'MARIA ELENA ', 'GUTIERREZ', 'CUTIPA', 'CIUDAD NUEVA MZ. 98 LT. 09', 4, 1, 23, '', '1992-05-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('070', '20601083427', 71726010, 'MARIA ELENA', 'GUTIERREZ', 'HUARECALLO', 'ASOC. LA UNION MZ. 349 LT. 11', 4, 1, 23, '', '1994-03-18', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('072', '20601083427', 47757330, 'ANALI MICAELA ', 'HERRERA', 'SALAMANCA', 'ASOC. DE VIV. SANTA CRUZ DE BELEN MZ. 06 LT. 09', 4, 1, 23, '', '1991-06-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('073', '20601083427', 73770907, 'MIRIAM', 'HERRERA', 'SALAMANCA', 'ASOC. DE VIV. SANTA CRUZ DE BELEN MZ. 06 LT. 09', 4, 1, 23, '', '1995-04-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('074', '20601083427', 41882573, 'MAURO', 'HUALLPA', 'PILCO', 'ASOC. XX', 2, 1, 23, '', '1983-08-01', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('075', '20601083427', 48099229, 'ALEX YOMAR', 'HUANACUNI', 'APAZA', 'AMP. CIUDAD NUEVA CMTE. 39 MZ. 169 LT. 2', 4, 1, 23, '', '1994-01-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('076', '20601083427', 40200972, 'ALICIA', 'HUANACUNI', 'LAYME', 'ASOC. XX', 10, 1, 23, '', '1979-04-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('077', '20601083427', 48731290, 'YULISA MARILUZ', 'HUIZA', 'CALDERON', 'ASOC. VIV VILLA EL TRIUNFO MZ. 323 LT. 23', 4, 1, 23, '', '1995-08-07', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('078', '20601083427', 46853916, 'MIGUEL ANGEL', 'JIMENEZ', 'ACARAPI', 'AMPLC. CIUDAD NUEVA MZ. 139 LT.06 CMTE. 30', 4, 1, 23, '', '1991-03-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('079', '20601083427', 47753336, 'MARIA MERCEDES', 'JIMENEZ', 'ACCARAPI', 'AHM. CIUDAD NUEVA CTE. 30 MZ. 191 LT. 06 ', 4, 1, 23, '', '1993-05-26', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('080', '20601083427', 43035934, 'FREDY WILBER', 'LAYME', 'ACERO', 'AGRP. CIUDAD NUEVA MZ. 37 LT. 5', 4, 1, 23, '', '1984-11-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('081', '20601083427', 43507964, 'IRMA MARINA', 'LAYME ', 'MAQUERA', 'ASOC. VIV. JERUSALEN NUEVA ESPERANZA MZ. 61 LT. 09', 8, 1, 23, '', '1985-08-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('082', '20601083427', 41982401, 'FRANK REYNALDO', 'LINARES', 'ARRATIA', 'AMPLC. CIUDAD NUEVA MZ. 206 LT. 06 CMTE. 31', 4, 1, 23, '', '1982-08-01', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('084', '20601083427', 44547645, 'ROGER EDDY ', 'LINARES', 'ARRATIA', 'AMPLC. CIUDAD NUEVA MZ. 206 LT. 6 CMTE. 313', 4, 1, 23, '', '1985-10-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('085', '20601083427', 1328709, 'DIONICIA', 'LLANCHIPA', 'CAMA', 'ASOC. EL TRIUNFO MZ. 333 LT. 30  CMTE. 04', 4, 1, 23, '', '1974-10-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('086', '20601083427', 41061113, 'SABINA', 'MAMANI', 'HUAYCANI ', 'ASOC. ALTO BELLAVISTA  MZ. D LT. 06', 2, 1, 23, '', '1981-10-22', '950000000', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('087', '20601083427', 46339685, 'JESUS JOEL ', 'MAMANI', 'HUISA', 'AMP. CUIDAD NUEVA MZ. 128 LT.03 COMITE 26', 4, 1, 23, '', '1990-03-12', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('088', '20601083427', 41762300, 'ADA', 'LAYME', 'MAMANI', 'ASOC. VIV VILLA 28 DE OCTUBRE MZ. 169 LT.27', 10, 1, 23, '', '1983-01-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('090', '20601083427', 72271502, 'YUBITSA YANINA', 'MAMANI', 'MAMANI', 'CIUDAD NUEVA MZ. 56 LT. 15', 4, 1, 23, '', '1996-10-05', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('093', '20601083427', 43710654, 'MARITZA', 'MAMANI', 'TESILLO', 'AGRUP. CIUDAD NUEVA  MZ. 87 LT. 1 COMITE 22', 4, 1, 23, '', '1985-05-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('094', '20601083427', 42810492, 'GLADYS', 'MAMANI', 'VELASQUEZ', 'APV LOS JARDINES C-16 CHEN CHEN', 1, 1, 18, '', '1984-12-07', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('097', '20601083427', 41447033, 'HILDA SONIA', 'MENESES', 'RAMOS', 'ASOC. VISTA ALEGRE MZ. D LT.16', 8, 1, 23, '', '1982-09-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('098', '20601083427', 47572221, 'FRESIA MADELIN', 'MUÃ‘OZ', 'LAQUE', 'P.J. SAN MARTIN MZ. 13 LT. 01', 2, 1, 23, '', '1993-01-29', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('099', '20601083427', 1262701, 'BEATRIZ', 'PACHO', 'PONCE', 'ASOC. LOS SAUCES MZ. J LT. 5', 10, 1, 23, '', '1967-08-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('1', '20603442769', 46993209, 'LUIS', 'OYANGUREN', 'GIRON', '-', 9, 18, 2, 'MAJU_MF04@HOTMAIL.COM', '2000-01-01', '936507153', 2, 1, 0.00, 1, '2005-01-01', 1, 2, '2005-05-01', '-', '2', 2, 2, '1', '1.jpg', '1'),
('100', '20601083427', 71567619, 'EDWIN ISAAC', 'PACXI', 'CHAMBILLA', 'ASO. INDEPENDENCIA MZ. D LT. 09 ', 2, 1, 23, '', '1993-02-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('1005', '20601083427', 41831872, 'NANCY', 'PAXI', 'CHARCA', 'ASOC VIV ALTO BELLAVISTA C-06', 2, 1, 23, '', '1983-05-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('101', '20601083427', 793803, 'MARIA TERESA', 'PANCCA ', 'MAMANI', 'AV GREGORIO ALBARRACIN 715', 1, 1, 23, '', '1968-06-05', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('102', '20601083427', 40509327, 'MARIA LILA', 'PARI ', 'VELASQUEZ', 'AV AVIACION  MZ-22 LT-10', 1, 1, 23, '', '1985-07-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('103', '20601083427', 47061231, 'JUANA', 'PARILLO', 'BUSTINCIO', 'CALLE OMATE NÂ°11', 6, 1, 18, '', '1977-08-29', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('104', '20601083427', 1296852, 'AUGUSTA', 'PARRILLO', 'MAMANI', 'ASOC VIV LOS HEROES MZ-551  LT-23', 10, 1, 23, '', '1974-09-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('106', '20601083427', 511477, 'PATRICIA ESPERANZA', 'PAZ', 'ARRATIA', 'ZONA CARBAJAL1825 LA NATIVIDAD', 1, 1, 23, '', '1976-12-12', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('107', '20601083427', 41395019, 'MARGARITA', 'PEÃ‘ALOZA', 'MAMANI', 'ASOC VIV JERUSALEN NVA ESPERANZA MZ-54  LT-11', 8, 1, 23, '', '1977-06-17', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('108', '20601083427', 40281009, 'LORGENIA', 'PILCO', 'MAMANI', 'ASOC VIV ALTO BELLAVISTA MZ-C  LT-4', 2, 1, 23, '', '1979-03-17', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('109', '20601083427', 47728086, 'SANTIAGO', 'PONGO', 'OXACOPA', 'PARCIALIDAD SALES CHICO', 5, 5, 21, '', '1993-05-03', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('110', '20601083427', 9946299, 'HILDA MODESTA', 'PONGO', 'PACO', 'ASOC VIV BUENA VISTA MZ-B  LT-3', 2, 1, 23, '', '1974-04-27', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('111', '20601083427', 1302675, 'HILDA BEATRIZ', 'QUENAYA', 'MENDOZA', 'ASOC NUEVO SAN JUAN MZ-D LT-5', 8, 1, 23, '', '1974-09-12', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('112', '20601083427', 45923985, 'NELGIO', 'QUIÃ‘ONEZ', 'HUAYNA', 'ASOC MARISCAL NIETO MZ-D  LT-3', 4, 1, 23, '', '1989-06-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('113', '20601083427', 75507131, 'ANTONIA MELANIA', 'QUISO', 'CARRASCO', 'ASOC LA FLORIDA MZ-I  LT-34', 2, 1, 23, '', '1995-07-05', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('114', '20601083427', 40600488, 'ROXANA', 'QUISPE', 'ANQUISE', 'AGRP CIUDAD NUEVA MZ-05  LT-02 CMTE2', 4, 1, 23, '', '1980-10-10', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('115', '20601083427', 42440258, 'JAVIER DENSON', 'QUISPE', 'CALIZAYA', 'ASOC 28 DE AGOSTO MZ-382  LT-12', 4, 1, 23, '', '1983-11-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('116', '20601083427', 40049748, 'ROSA', 'QUISPE', 'CAPIA', 'LAS YARAS MZ 29 LT', 9, 1, 23, '', '1978-11-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('117', '20601083427', 40692440, 'ANTONIO', 'QUISPE', 'CHARA', 'AGRUP CIUDAD NUEVA', 4, 1, 23, '', '1979-06-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('118', '20601083427', 46205535, 'CELIA', 'QUISPE', 'CHARA', 'ASOC A. HORIZONTE MZ I  LT-17', 4, 1, 23, '', '1989-02-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('119', '20601083427', 443606, 'BARTOLA', 'QUISPE', 'MARINO', 'DI PALCA EL INGENIO S/N', 7, 1, 23, '', '1970-08-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('120', '20601083427', 509487, 'AURELIA', 'RAMOS', 'CHILE', 'AV SAN MARTIN 1001', 8, 1, 23, '', '1970-07-17', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('121', '20601083427', 445348, 'MILDE', 'RAMOS', 'QUISPE', 'PJ SAN MARTIN LT-4 CMTE 21', 4, 1, 23, '', '1970-09-14', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('122', '20601083427', 1837696, 'ELSA', 'RIVERA', 'RIVERA', 'ASOC AAHH EL AGUSTINO MZ-F  LT-6', 4, 1, 23, '', '1966-09-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('123', '20601083427', 75583875, 'LUIS ENRIQUE', 'RIVERA', 'SIHUAYRO', 'CIUDAD NUEVA MZ 43 LT 22', 4, 1, 23, '', '1995-10-27', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('124', '20601083427', 1860755, 'NANCY SARA', 'ROQUE', 'MAMANI DE CALISAYA', 'ASOC VIV LOS LIBERTADORES  VIÃ‘AN ETAPA III MZ-462  LT-12', 10, 1, 23, '', '1971-02-14', '950000000', 2, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('125', '20601083427', 74600454, 'BRIGIDA', 'SUPO', 'JINEZ', 'AH PROYECTO NORTE MZ-329  LT-4 ', 4, 1, 23, '', '1995-03-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('126', '20601083427', 42796640, 'IRMA', 'TICAHUANCA', 'FLORES', 'AMP CIUDAD NUEVA MZ-106  LT-51', 4, 1, 23, '', '1984-11-05', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('127', '20601083427', 1264630, 'NANCY', 'TICONA', 'HUAYLLARA', 'AHM AMPL CIUDAD NUEVA MZ-151  LT-22', 4, 1, 23, '', '1975-06-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('128', '20601083427', 70371337, 'ANTONY BRYAN', 'TITO', 'CLAVETIA', 'PAMPA BAJA LOTE 1-3-A', 3, 3, 23, '', '1994-11-10', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('129', '20601083427', 1284081, 'FRANCISCA BOLONIA', 'TURPO', 'BARRIOS', 'COMUNIDAD FUNDO MAMANI', 15, 1, 21, '', '1970-03-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('130', '20601083427', 43648209, 'EVA NINFA', 'UCHARICO', 'CALISAYA', 'CIUDAD NUEVA SAN JOSE MZ-G  LT-8', 4, 1, 23, '', '1986-07-27', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('131', '20601083427', 16498632, 'LUIS ARMANDO', 'UGAS', 'FIGUEROA', 'LOS MOLLES MZ-238 LT-8', 2, 1, 23, '', '1974-10-03', '950000000', 1, 2, 28.00, 10, '2016-06-01', 1, 2, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('132', '20601083427', 47105889, 'YULIANA STEFANNY', 'USURIAGA', 'ARMIJO', 'TACNA', 4, 1, 23, '', '1990-02-04', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('133', '20601083427', 42084714, 'MARIA LUCY', 'VARGAS', 'CUSICANI', 'PJ SAN MARTIN MZ-A  LT-1', 2, 1, 23, '', '1983-10-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('134', '20601083427', 437281, 'FRANCISCA', 'VERA', 'DE RAMOS', 'PJ SAN MARTIN MZ-R  LT-14', 2, 1, 23, '', '1949-12-08', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('135', '20601083427', 45651505, 'ENRIQUE EDWIN', 'VILCA', 'CRUZ', 'ASOC VIV 7 DE JUNIO', 4, 1, 23, '', '1988-07-12', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('136', '20601083427', 683793, 'NELLY SUSANA', 'VILCA', 'MAMANI', 'CIUDAD NUEVA', 4, 1, 23, '', '1977-10-29', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('137', '20601083427', 1329355, 'SEBASTIANA', 'VILCANQUI', 'VILCA', 'ASOC CIUDAD BLANCA MZ-O LT-2', 4, 1, 23, '', '1976-01-16', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('138', '20601083427', 794288, 'FLORA', 'VILCARANA', 'CHAMBILLA', 'ASOC MARISCAL NIETO MZ-A  LT-6', 4, 1, 23, '', '1975-06-14', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('139', '20601083427', 518187, 'YOVANA', 'VIZCACHO', 'TUYO', 'ASOC VIV VILLA EL SALVADOR MZ-F  LT-22', 10, 1, 23, '', '1978-09-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('140', '20601083427', 40033588, 'IRENE LUCRECIA', 'YANA', 'ROQUE', 'ASOC VIV ALTO BELLAVISTA MZ-17  LT-10', 2, 1, 23, '', '1978-10-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('141', '20601083427', 44192160, 'JACQUELINE ELIZABETH', 'ZUÃ‘IGA', 'CLAVETIA', 'ASOC VIV LAS MAGNOLIAS MZ-C  LT-21', 10, 1, 23, '', '1987-03-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('142', '20601083427', 76952635, 'LUIS FERNANDO', 'AYCA', 'COHAILA', 'ASOC VIV LA FRONTERA MZ-H  LT-17', 4, 1, 23, '', '1998-02-22', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('143', '20601083427', 41771374, 'ROSANA GREGORIA', 'MAMANI', 'QUISPE', 'ASOC VIRGEN DE LAS MERCEDES MZ-D  LT-9', 4, 1, 23, '', '1983-05-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('144', '20601083427', 40942954, 'YENY MARISOL', 'ORTEGA', 'MAMANI', 'ASIC VIV ALTO HORIZONTE MZ-I  LT-12 ', 4, 1, 23, '', '1981-07-26', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('145', '20601083427', 80423178, 'ELIZABETH', 'MURRIETA', 'MOZOMBITE', 'URB JUNTA COMP.VILLATACANA E-7', 8, 1, 23, '', '1977-10-06', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('146', '20601083427', 76858441, 'OMAR OLIVER', 'LINARES', 'ARRATIA', 'CIUDAD NUEVA', 4, 1, 23, '', '1998-01-04', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('147', '20601083427', 75475971, 'BETTY', 'CHURA', 'CONDORI', 'ALTO HORIZONTE MZ-I  LT-28', 4, 1, 23, '', '1982-06-21', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('148', '20601083427', 40945604, 'NELIA', 'MAMANI', 'JACINTO', 'ASOC VIV INTIURKO P-2', 2, 1, 23, '', '1981-07-10', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('149', '20601083427', 44983520, 'PAMELA MARITZA', 'LUPACA', 'POMA', 'PJ LA ESPERANZA J.C.TELLO 163', 2, 1, 23, '', '1988-03-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('150', '20601083427', 515789, 'CELIA', 'MAMANI', 'LAZARO', 'ASOC.28 DE AGOSTO CMTE 12 MZ-395  LT-7', 4, 1, 23, '', '1976-01-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('151', '20601083427', 41790863, 'LIDIA', 'SANTOS', 'VELA', 'ASOC VIV LA FRONTERA C-20-B', 4, 1, 23, '', '1983-04-06', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('152', '20601083427', 44254304, 'MONICA SABINA', 'HUARACHI', 'TUYO', 'AGRUP CIUDAD NUEVA MZ-14  LT-18', 4, 1, 23, '', '1987-05-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('153', '20601083427', 47294885, 'VIRGINIA', 'HERRERA', 'POMA', 'AMPL CIUDAD NUEVA MZ-163 LT-18', 4, 1, 23, '', '9172-01-19', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('154', '20601083427', 44584906, 'MARIA ELENA', 'FLORES', 'PEREZ', 'ASOC CIUDAD BLANCA MZ-A  LT-3', 4, 1, 23, '', '1987-06-23', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('155', '20601083427', 796683, 'LOURDES', 'MAMANI', 'NINA', 'ASOC 24 DE JUNIO MZ-L  LT-32', 10, 1, 23, '', '1976-02-11', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('156', '20601083427', 43301379, 'IVONE MONICA', 'JALANOCA', 'VISCACHO', 'LAS COLINAS MZ-F  LT-9', 8, 1, 23, '', '1982-06-21', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('157', '20601083427', 502851, 'MARIA ROSA', 'HUANCAPAZA', 'CONDORI', 'AMPL CIUDAD NUEVA MZ-149 LT-26 CMTE 26', 4, 1, 23, '', '1966-04-07', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('158', '20601083427', 41762300, 'ADA', 'MAMANI', 'LAYME', 'AV 28 DE JLIO MZ-169  LT-27', 1, 1, 23, '', '1983-01-13', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('159', '20601083427', 44225228, 'YANET', 'LUPACA', 'LUPACA', 'COM CHOJÃ‘ACHOJÃ‘ANI', 3, 5, 21, '', '1987-04-29', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('160', '20601083427', 76404316, 'ESTEFHANY', 'CRUZ', 'NOLAZCO', 'CIUDAD NUEVA CMTE 18 MZ-70  LT-7', 4, 1, 23, '', '1995-08-06', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('161', '20601083427', 75153342, 'ALEX HUGO', 'ARCATA', 'GINEZ', 'CP LOS PALOS ASOC CONCORDIA MZ-A  LT-8', 1, 1, 23, '', '1996-07-24', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('162', '20601083427', 41011467, 'LUCIA', 'CHOQUE', 'ALAVE', 'ASOC VIV VISTA ALEGRE MZ-28  LT-2', 10, 1, 23, '', '1981-09-02', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('163', '20601083427', 40861794, 'GLORIA', 'CHARCA', 'MARCA', 'AMPL CIUDAD NUEVA MZ-225  LT-13 CMTE 37', 4, 1, 23, '', '1981-05-04', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('164', '20601083427', 45548194, 'MARITZA LUZ', 'CHICALLA', 'PALOMO', 'AV PINTO 1189', 1, 1, 23, '', '1983-06-23', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('165', '20601083427', 40149989, 'CRISTINA', 'CALIZAYA', 'ORTEGA', 'PROM VIÃ‘ANI MZ-557  LT-19', 10, 1, 23, '', '1979-04-28', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('166', '20601083427', 1772538, 'LIDIA CANDELARIA', 'ARRATIA', 'ALIAGA', 'AGRUP ROSA', 1, 1, 23, '', '1973-08-01', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('167', '20601083427', 1264630, 'NANCY', 'TICONA', 'HUAYLLARA', 'AH AMPL CIUDAD NUEVA MZ-151  LT-22', 4, 1, 23, '', '1975-06-09', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('168', '20601083427', 47207339, 'REYNA CLAUDIA', 'TICONA', 'TICONA', 'ASOC EL TRIUNFO MZ-339  LT-16', 4, 1, 23, '', '1991-07-15', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('169', '20601083427', 448281, 'LUZMILA VERONICA', 'CARDENAS', 'PALACIOS', 'ASOC VIV LOS CLAVELES MZ-43 LT-9', 10, 1, 23, '', '1969-05-02', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('170', '20601083427', 41085315, 'GLADYS MARISOL', 'ESCOBAR', 'HUAYCANI', 'CALLE CAMACHO MZ-R  LT-22', 2, 1, 23, '', '1981-02-04', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('171', '20601083427', 77035004, 'CESAR IVAN', 'JUCULACA', 'CARRILLO', 'ASOC LA COLINA MZ-A  LT-6', 8, 1, 23, '', '1994-09-26', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('172', '20601083427', 510732, 'MARIA LUISA', 'FLORES', 'FLORES', 'ASOC 28 DE AGOSTO MZ-312  LT-4 CMTE 2', 4, 1, 23, '', '1968-08-25', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('173', '20601083427', 41165233, 'PAULINA IGNACIA', 'PACOTICONA', 'GONZALES', 'ASOC VIV CIUDAD DE LA PAZ MZ-510  LT-25', 10, 1, 23, '', '1980-04-02', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('174', '20601083427', 47254287, 'MARITZA', 'QUISPE', 'QUISPE', 'AV.R.ALBARRACIN MZ-26  LT-13', 10, 1, 23, '', '1991-09-03', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('175', '20601083427', 1872797, 'ALEJANDRO', 'VILCA', 'FLORES', 'ASOC VIV LAS COLMENAS MZ-96  LT-', 8, 1, 23, '', '1968-06-03', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('176', '20601083427', 442765, 'VICTORIA', 'MAMANI', 'VILCA', 'ASOC VISTA ALEGRE MZ-5  LT-5', 4, 1, 23, '', '1956-11-11', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('177', '20601083427', 43982342, 'DAVID', 'CONDORI', 'NINA', 'CIUDAD NUEVA', 4, 1, 23, '', '1986-08-03', '950000000', 1, 2, 28.00, 11, '2016-06-01', 1, 1, '2016-06-01', '', 'NINGUNO', 2, 2, '0', 'noimage.png', '1'),
('6', '10469932091', 12345675, 'DFSDF', 'DSFRWERWER', 'WERWERWER', 'URB. EL TRAPECIO MZ S LT 3 1RA ETAPA CHIMBOE', 3, 4, 5, 'RICARDO_23_91@HOTMAIL.COM', '2014-01-01', '970373840', 2, 1, 40.00, 1, '2015-01-01', 1, 2, '2014-01-01', 'DSFEW3', 'NINGUNO', 2, 2, '1', '6.png', '1'),
('7', '10469932091', 46993214, 'LUIS', 'GONZALES', 'PRADA', 'AAA', 5, 7, 5, 'RICARDO_23_91@HOTMAIL.COM', '1993-01-01', '943901427', 2, 1, 10.00, 1, '2016-08-01', 1, 2, '2015-01-01', '-', 'NINGUNO', 2, 2, '1', 'noimage.png', '1'),
('EMP1', '10469932091', 46993209, 'LUIS ENRIQUE ', 'OYANGUREN', 'GIRON', 'URB EL TRAPECIO MZ S LT 3 1RA ETAPA CHIMBOTE', 1, 1, 1, 'leog.1992@gmail.com', '1992-05-10', '970373840', 2, 1, 50.00, 1, '2016-09-01', 1, 1, '7000-01-01', '-', 'NINGUNO', 3, 1, '0', 'noimage.png', '1'),
('EMP2', '10469932091', 15457898, 'MIGUEL ANGEL', 'OYANGUREN', 'GIRON', 'URB. EL TRAPECIO MZ S LT 3 1RA ETAPA CHIMBOTE', 1, 18, 2, 'ASDASD', '1995-05-10', '55', 1, 1, 50.00, 1, '2016-09-01', 1, 1, '7000-01-01', '54654', '1', 1, 1, '0', 'EMP2.png', '1'),
('EMP3', '10469932091', 32595980, 'IVAN ENRIQUE', 'OYANGUREN', 'GONZALEZ', 'URB. EL TRAPECIO MZ S LT 3 1RA ETAPA CHIMBOE', 1, 1, 1, 'IVAN_OG@HOTMAIL.COM', '1958-12-06', '943901427', 6, 2, 45.00, 6, '2016-09-01', 1, 1, '1992-05-10', '-', 'POR FLUJO', 1, 1, '0', 'EMP3.jpg', '1'),
('EMP4', '10469932091', 74589647, 'DERECK STEVEN', 'OYANGUREN', 'DE LA CRUZ', 'URB GARATEA 16 - 4 NUEVO CHIMBOTE', 1, 1, 3, '-----', '2015-04-26', '970373840', 1, 1, 65.00, 4, '2016-09-01', 1, 2, '2070-01-01', '-', '2', 3, 1, '0', 'noimage.png', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `ruc` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `logo` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ruc`, `razon_social`, `direccion`, `logo`, `estado`, `fecha_registro`) VALUES
('10326598451', 'COLMENARES SAC', 'ANCASH', 'noimage.jpg', '1', '2016-09-03'),
('10469932091', 'LUIS ENRIQUE OYANGUREN GIRON', 'URB. EL TRAPECIO MZ S LT 3 1ERA ETAPA', '', '1', '0000-00-00'),
('10718449559', 'FHJKFHDJKHJKHV', 'DFJKHDFKJFDHJK', 'noimage.jpg', '1', '2018-09-27'),
('20601083427', 'FISHONE SAC', 'TACNA', 'noimage.jpg', '1', '2016-09-03'),
('20603442769', 'FISHONE PRODUCTION SAC', 'TACNA', '-', '1', '2018-09-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epp`
--

CREATE TABLE `epp` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `duracion` int(3) DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `epp`
--

INSERT INTO `epp` (`id`, `nombre`, `duracion`, `estado`) VALUES
(1, 'CASCO', 180, '1'),
(2, 'GUANTES MANIOBRA', 20, '1'),
(3, 'LENTES TRANSPARENTES', 30, '1'),
(4, 'LENTES OSCUROS', 30, '1'),
(5, 'TAPONES AUDITIVOS', 30, '1'),
(6, 'OREJERAS', 180, '1'),
(7, 'BARBIQUEJO', 180, '1'),
(8, 'ZAPATOS DE SEGURIDAD', 360, '1'),
(9, 'RESPIRADOR', 180, '1'),
(10, 'CHAVO SOLDADOR', 180, '1'),
(11, 'CHALECO SALVAVIDAS', 180, '1'),
(12, 'MANDIL', 180, '1'),
(13, 'BOTAS DE PVC -C/BLANCO', 360, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion`
--

CREATE TABLE `especializacion` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porcentaje` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especializacion`
--

INSERT INTO `especializacion` (`id`, `descripcion`, `porcentaje`) VALUES
(1, 'NINGUNA', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id`, `nombre`) VALUES
(1, 'SOLTERO'),
(2, 'CASADO'),
(3, 'VIUDO'),
(4, 'DIVORCIADO'),
(5, 'SEPARADO'),
(6, 'CONVIVIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(3) NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(4) NOT NULL,
  `anio` int(4) NOT NULL DEFAULT '0',
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_evento` int(2) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_medico`
--

CREATE TABLE `examen_medico` (
  `id` int(2) NOT NULL,
  `empleado` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `empresa` char(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_evaluacion` date NOT NULL,
  `resultado` varchar(245) NOT NULL,
  `observaciones` text NOT NULL,
  `evaluador` varchar(245) NOT NULL,
  `archivo` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `id` int(3) NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `ruc_empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `motivo_cese` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extintor`
--

CREATE TABLE `extintor` (
  `id` int(3) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL DEFAULT '10469932091',
  `serie` char(15) CHARACTER SET latin1 NOT NULL,
  `marca` char(45) CHARACTER SET latin1 NOT NULL,
  `capacidad` int(2) NOT NULL,
  `tipo` char(15) CHARACTER SET latin1 NOT NULL,
  `fecha_recarga` date NOT NULL,
  `ubicacion` varchar(245) CHARACTER SET latin1 NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factor_sanguineo`
--

CREATE TABLE `factor_sanguineo` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factor_sanguineo`
--

INSERT INTO `factor_sanguineo` (`id`, `nombre`) VALUES
(1, 'RH POSITIVO'),
(2, 'RH NEGATIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_sanguineo`
--

CREATE TABLE `grupo_sanguineo` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo_sanguineo`
--

INSERT INTO `grupo_sanguineo` (`id`, `nombre`) VALUES
(1, 'O'),
(2, 'A'),
(3, 'B'),
(4, 'AB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_epp`
--

CREATE TABLE `historial_epp` (
  `id` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `empleado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entrega` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial_epp`
--

INSERT INTO `historial_epp` (`id`, `empresa`, `empleado`, `fecha_entrega`) VALUES
(1, '10469932091', '6', '2017-02-06'),
(1, '10469932091', '7', '2016-09-30'),
(2, '10469932091', '7', '2018-02-05'),
(1, '20601083427', '001', '2016-09-30'),
(1, '20601083427', '002', '2016-09-06'),
(1, '20601083427', '142', '2016-10-03'),
(1, '20603442769', '1', '2018-09-27'),
(2, '20603442769', '1', '2018-09-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_capacitacion`
--

CREATE TABLE `imagenes_capacitacion` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_subida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_capacitacion`
--

INSERT INTO `imagenes_capacitacion` (`id`, `anio`, `empresa`, `usuario`, `imagen`, `fecha_subida`) VALUES
(1, 2017, '20601083427', 'RVILCA', '6533399f.jpg', '2017-08-16 16:15:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_preliminar`
--

CREATE TABLE `imagenes_preliminar` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_subida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_simulacro`
--

CREATE TABLE `imagenes_simulacro` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `correlativo` int(3) NOT NULL,
  `imagen` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_subida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidente`
--

CREATE TABLE `incidente` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_accidente` datetime NOT NULL,
  `descripcion` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_incidente` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_perdida` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `supervisor` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` datetime NOT NULL,
  `fecha_investigacion` datetime NOT NULL,
  `tipo_riesgo` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `perdida_estimada` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_almacen`
--

CREATE TABLE `inspeccion_almacen` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_botiquin`
--

CREATE TABLE `inspeccion_botiquin` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_epp`
--

CREATE TABLE `inspeccion_epp` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_extintores`
--

CREATE TABLE `inspeccion_extintores` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_limpieza`
--

CREATE TABLE `inspeccion_limpieza` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_oficina`
--

CREATE TABLE `inspeccion_oficina` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_sshh`
--

CREATE TABLE `inspeccion_sshh` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion_trabajo`
--

CREATE TABLE `inspeccion_trabajo` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `item` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `inspector` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `local` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preliminar_incidente`
--

CREATE TABLE `preliminar_incidente` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_accidente` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `consecuencia_probable` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `involucrado` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_evento` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_perdida` text COLLATE utf8_spanish_ci NOT NULL,
  `causas_inmediatas` text COLLATE utf8_spanish_ci NOT NULL,
  `causas_basicas` text COLLATE utf8_spanish_ci NOT NULL,
  `acciones_inmediatas` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_capacitaciones`
--

CREATE TABLE `programa_capacitaciones` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `tema` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `expositor` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_programado` datetime NOT NULL,
  `fecha_ejecutado` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `duracion` int(11) NOT NULL,
  `asistentes` int(3) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `programa_capacitaciones`
--

INSERT INTO `programa_capacitaciones` (`id`, `anio`, `empresa`, `tema`, `expositor`, `fecha_programado`, `fecha_ejecutado`, `fecha_fin`, `duracion`, `asistentes`, `estado`) VALUES
(1, 2017, '10469932091', 'FVGNBVCFDBTGT', 'GGBGHYH', '2017-03-23 23:03:20', '7000-01-01 00:00:00', '7000-01-01 00:00:00', 3, 0, '0'),
(1, 2017, '20601083427', 'CHARLA DE INDUCCION', 'ING GARCIA', '2017-08-19 10:00:00', '7000-01-01 00:00:00', '7000-01-01 00:00:00', 2, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_inspecciones`
--

CREATE TABLE `programa_inspecciones` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `frecuencia` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `pagina_web` char(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inspeccion` date NOT NULL,
  `fecha_programa` date NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `programa_inspecciones`
--

INSERT INTO `programa_inspecciones` (`id`, `anio`, `empresa`, `tipo`, `frecuencia`, `pagina_web`, `fecha_inspeccion`, `fecha_programa`, `estado`) VALUES
(1, 2016, '20601083427', 'ALMACEN', 'MENSUAL', 'inspeccion_almacen', '7000-01-01', '2016-10-25', '0'),
(1, 2016, '20601083427', 'BOTIQUIN', 'MENSUAL', 'inspeccion_botiquin', '7000-01-01', '2016-10-25', '0'),
(1, 2016, '20601083427', 'EPP', 'MENSUAL', 'inspeccion_epp', '7000-01-01', '2016-10-18', '0'),
(1, 2016, '20601083427', 'EXTINTORES', 'MENSUAL', 'inspeccion_extintor', '7000-01-01', '2016-10-29', '0'),
(1, 2016, '20601083427', 'OFICINAS', 'MENSUAL', 'inspeccion_oficina', '7000-01-01', '2016-10-27', '0'),
(1, 2016, '20601083427', 'ORDEN Y LIMPIEZA', 'SEMANAL', 'inspeccion_limpieza', '7000-01-01', '2016-10-19', '0'),
(1, 2016, '20601083427', 'SSHH', 'MENSUAL', 'inspeccion_sshh', '7000-01-01', '2016-10-29', '0'),
(1, 2016, '20601083427', 'TRABAJO', 'MENSUAL', 'inspeccion_trabajo', '7000-01-01', '2016-10-27', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_monitoreo`
--

CREATE TABLE `programa_monitoreo` (
  `id` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_programado` date NOT NULL,
  `fecha_ejecutado` date NOT NULL,
  `proveedor` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_simulacros`
--

CREATE TABLE `programa_simulacros` (
  `id` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `observador` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_programado` datetime NOT NULL,
  `fecha_ejecutado` datetime NOT NULL,
  `fecha_fin_ejecutado` datetime NOT NULL,
  `tipo` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `simulacion_creada` text COLLATE utf8_spanish_ci NOT NULL,
  `magnitud` text COLLATE utf8_spanish_ci NOT NULL,
  `antes` text COLLATE utf8_spanish_ci NOT NULL,
  `durante` text COLLATE utf8_spanish_ci NOT NULL,
  `despues` text COLLATE utf8_spanish_ci NOT NULL,
  `externo` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `recomendaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `conclusiones` text COLLATE utf8_spanish_ci NOT NULL,
  `informe` varchar(245) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `departamento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`, `departamento`) VALUES
(1, 'CHACHAPOYAS', 1),
(1, 'HUARAZ', 2),
(1, 'ABANCAY', 3),
(1, 'AREQUIPA', 4),
(1, 'HUAMANGA', 5),
(1, 'CAJAMARCA', 6),
(1, 'PROV. CONST. DEL CALLAO', 7),
(1, 'CUSCO', 8),
(1, 'HUANCAVELICA', 9),
(1, 'HUANUCO', 10),
(1, 'ICA ', 11),
(1, 'HUANCAYO ', 12),
(1, 'TRUJILLO ', 13),
(1, 'CHICLAYO ', 14),
(1, 'LIMA ', 15),
(1, 'MAYNAS ', 16),
(1, 'TAMBOPATA ', 17),
(1, 'MARISCAL NIETO ', 18),
(1, 'PASCO ', 19),
(1, 'PIURA ', 20),
(1, 'PUNO ', 21),
(1, 'MOYOBAMBA ', 22),
(1, 'TACNA ', 23),
(1, 'TUMBES ', 24),
(1, 'CORONEL PORTILLO ', 25),
(2, 'BAGUA', 1),
(2, 'AIJA', 2),
(2, 'ANDAHUAYLAS', 3),
(2, 'CAMANA', 4),
(2, 'CANGALLO', 5),
(2, 'CAJABAMBA', 6),
(2, 'ACOMAYO', 8),
(2, 'ACOBAMBA', 9),
(2, 'AMBO', 10),
(2, 'CHINCHA ', 11),
(2, 'CONCEPCION ', 12),
(2, 'ASCOPE ', 13),
(2, 'FERRE?AFE ', 14),
(2, 'BARRANCA ', 15),
(2, 'ALTO AMAZONAS ', 16),
(2, 'MANU ', 17),
(2, 'GENERAL SANCHEZ CERRO ', 18),
(2, 'DANIEL ALCIDES CARRION ', 19),
(2, 'AYABACA ', 20),
(2, 'AZANGARO ', 21),
(2, 'BELLAVISTA ', 22),
(2, 'CANDARAVE ', 23),
(2, 'CONTRALMIRANTE VILLAR ', 24),
(2, 'ATALAYA ', 25),
(3, 'BONGARA', 1),
(3, 'ANTONIO RAYMONDI', 2),
(3, 'ANTABAMBA', 3),
(3, 'CARAVELI', 4),
(3, 'HUANCA SANCOS', 5),
(3, 'CELENDIN', 6),
(3, 'ANTA', 8),
(3, 'ANGARAES', 9),
(3, 'DOS DE MAYO', 10),
(3, 'NAZCA ', 11),
(3, 'CHANCHAMAYO ', 12),
(3, 'BOLIVAR ', 13),
(3, 'LAMBAYEQUE ', 14),
(3, 'CAJATAMBO ', 15),
(3, 'LORETO ', 16),
(3, 'TAHUAMANU ', 17),
(3, 'ILO ', 18),
(3, 'OXAPAMPA ', 19),
(3, 'HUANCABAMBA ', 20),
(3, 'CARABAYA ', 21),
(3, 'EL DORADO ', 22),
(3, 'JORGE BASADRE ', 23),
(3, 'ZARUMILLA ', 24),
(3, 'PADRE ABAD ', 25),
(4, 'CONDORCANQUI', 1),
(4, 'ASUNCION', 2),
(4, 'AYMARAES', 3),
(4, 'CASTILLA', 4),
(4, 'HUANTA', 5),
(4, 'CHOTA', 6),
(4, 'CALCA', 8),
(4, 'CASTROVIRREYNA', 9),
(4, 'HUACAYBAMBA', 10),
(4, 'PALPA ', 11),
(4, 'JAUJA ', 12),
(4, 'CHEPEN ', 13),
(4, 'CANTA ', 15),
(4, 'MARISCAL RAMON CASTILLA ', 16),
(4, 'MORROPON ', 20),
(4, 'CHUCUITO ', 21),
(4, 'HUALLAGA ', 22),
(4, 'TARATA ', 23),
(4, 'PURUS', 25),
(5, 'LUYA', 1),
(5, 'BOLOGNESI', 2),
(5, 'COTABAMBAS', 3),
(5, 'CAYLLOMA', 4),
(5, 'LA MAR', 5),
(5, 'CONTUMAZA', 6),
(5, 'CANAS', 8),
(5, 'CHURCAMPA', 9),
(5, 'HUAMALIES', 10),
(5, 'PISCO ', 11),
(5, 'JUNIN ', 12),
(5, 'JULCAN ', 13),
(5, 'CA?ETE ', 15),
(5, 'REQUENA ', 16),
(5, 'PAITA ', 20),
(5, 'EL COLLAO ', 21),
(5, 'LAMAS ', 22),
(6, 'RODRIGUEZ DE MENDOZA', 1),
(6, 'CARHUAZ', 2),
(6, 'CHINCHEROS', 3),
(6, 'CONDESUYOS', 4),
(6, 'LUCANAS', 5),
(6, 'CUTERVO', 6),
(6, 'CANCHIS', 8),
(6, 'HUAYTARA', 9),
(6, 'LEONCIO PRADO', 10),
(6, 'SATIPO ', 12),
(6, 'OTUZCO ', 13),
(6, 'HUARAL ', 15),
(6, 'UCAYALI ', 16),
(6, 'SULLANA ', 20),
(6, 'HUANCANE ', 21),
(6, 'MARISCAL CACERES ', 22),
(7, 'UTCUBAMBA', 1),
(7, 'CARLOS FERMIN FITZCARRALD', 2),
(7, 'GRAU', 3),
(7, 'ISLAY', 4),
(7, 'PARINACOCHAS', 5),
(7, 'HUALGAYOC', 6),
(7, 'CHUMBIVILCAS', 8),
(7, 'TAYACAJA', 9),
(7, 'MARA?ON', 10),
(7, 'TARMA ', 12),
(7, 'PACASMAYO ', 13),
(7, 'HUAROCHIRI ', 15),
(7, 'DATEM DEL MARA?ON ', 16),
(7, 'TALARA ', 20),
(7, 'LAMPA ', 21),
(7, 'PICOTA ', 22),
(8, 'CASMA', 2),
(8, 'LA UNI?N', 4),
(8, 'PAUCAR DEL SARA SARA', 5),
(8, 'JAEN', 6),
(8, 'ESPINAR', 8),
(8, 'PACHITEA', 10),
(8, 'YAULI ', 12),
(8, 'PATAZ ', 13),
(8, 'HUAURA ', 15),
(8, 'PUTUMAYO', 16),
(8, 'SECHURA ', 20),
(8, 'MELGAR ', 21),
(8, 'RIOJA ', 22),
(9, 'CORONGO', 2),
(9, 'SUCRE', 5),
(9, 'SAN IGNACIO', 6),
(9, 'LA CONVENCION', 8),
(9, 'PUERTO INCA', 10),
(9, 'CHUPACA ', 12),
(9, 'SANCHEZ CARRION ', 13),
(9, 'OYON ', 15),
(9, 'MOHO ', 21),
(9, 'SAN MARTIN ', 22),
(10, 'HUARI', 2),
(10, 'VICTOR FAJARDO', 5),
(10, 'SAN MARCOS', 6),
(10, 'PARURO', 8),
(10, 'LAURICOCHA ', 10),
(10, 'SANTIAGO DE CHUCO ', 13),
(10, 'YAUYOS ', 15),
(10, 'SAN ANTONIO DE PUTINA ', 21),
(10, 'TOCACHE ', 22),
(11, 'HUARMEY', 2),
(11, 'VILCAS HUAMAN', 5),
(11, 'SAN MIGUEL', 6),
(11, 'PAUCARTAMBO', 8),
(11, 'YAROWILCA ', 10),
(11, 'GRAN CHIMU', 13),
(11, 'SAN ROMAN ', 21),
(12, 'HUAYLAS', 2),
(12, 'SAN PABLO', 6),
(12, 'QUISPICANCHI', 8),
(12, 'VIRU', 13),
(12, 'SANDIA ', 21),
(13, 'MARISCAL LUZURIAGA', 2),
(13, 'SANTA CRUZ', 6),
(13, 'URUBAMBA', 8),
(13, 'YUNGUYO ', 21),
(14, 'OCROS', 2),
(15, 'PALLASCA', 2),
(16, 'POMABAMBA', 2),
(17, 'RECUAY', 2),
(18, 'SANTA', 2),
(19, 'SIHUAS', 2),
(20, 'YUNGAY', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro_pension`
--

CREATE TABLE `seguro_pension` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seguro_pension`
--

INSERT INTO `seguro_pension` (`id`, `nombre`) VALUES
(1, 'ONP'),
(2, 'AFP INTEGRA'),
(3, 'PROFUTURO'),
(4, 'RIMAC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`id`, `nombre`) VALUES
(1, 'CAPACITACION'),
(2, 'REVISION POR LA DIRECCION'),
(3, 'AUDITORIA'),
(4, 'CHARLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_seguro`
--

CREATE TABLE `tipo_seguro` (
  `id` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_seguro`
--

INSERT INTO `tipo_seguro` (`id`, `nombre`) VALUES
(1, 'NINGUNO'),
(2, 'POR FLUJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `empresa` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `ape_pat` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ape_mat` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_cese` date DEFAULT NULL,
  `email` varchar(245) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`empresa`, `usuario`, `ape_pat`, `ape_mat`, `nombres`, `telefono`, `contrasena`, `fecha_registro`, `fecha_cese`, `email`, `estado`) VALUES
('10469932091', 'loyanguren', 'OYANGUREN', 'GIRON', 'LUIS ENRIQUE', '970373840', '123', '2016-10-04', '2020-01-01', 'leog.1992@gmail.com', '1'),
('10718449559', 'loyangureng', 'OYANGUREN', 'GIRON', 'LUIS', '123533424', '1234', '2018-09-27', '2020-01-01', 'maju_mf04@hotmail.com', '1'),
('20601083427', 'loyanguren', 'OYANGUREN', 'GIRON', 'LUIS ENRIQUE', '970373840', '123', '2016-10-04', '2020-01-01', 'leog.1992@gmail.com', '1'),
('20601083427', 'RVILCA', 'VILCA', 'CHUNGA', 'RUBEN', '950283633', '329392', '2016-09-03', '2020-01-01', 'rubbenvilca@gmail.com', '1'),
('20603442769', 'jvilca', 'VILCA', 'CHUNGA', 'JORGE LUIS', '0', '23456789', '2018-09-27', '2018-09-27', 'jvilca@gmail.com', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`,`empleado`,`empresa`),
  ADD KEY `fk_antecedentes_empleado` (`empleado`),
  ADD KEY `fk_antecedentes_empresa` (`empresa`);

--
-- Indices de la tabla `archivos_capacitaciones`
--
ALTER TABLE `archivos_capacitaciones`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`tipo`);

--
-- Indices de la tabla `area_monitoreo`
--
ALTER TABLE `area_monitoreo`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`area`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase_documentos`
--
ALTER TABLE `clase_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD PRIMARY KEY (`id`,`empleado`,`empresa`),
  ADD KEY `empleado` (`empleado`),
  ADD KEY `empresa` (`empresa`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`,`empleado`,`empresa`),
  ADD KEY `fk_cursos_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `datos_familiares`
--
ALTER TABLE `datos_familiares`
  ADD PRIMARY KEY (`dni`,`empleado`,`empresa`),
  ADD KEY `fk_datos_familiares_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_historial_epp`
--
ALTER TABLE `detalle_historial_epp`
  ADD PRIMARY KEY (`id`,`empresa`,`empleado`,`epp`),
  ADD KEY `fk_detalle_epp` (`epp`),
  ADD KEY `fk_detalle_empresa` (`empresa`),
  ADD KEY `fk_detalle_empleado` (`empleado`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`,`provincia`,`departamento`),
  ADD KEY `fk_distrito_provincia1_idx` (`provincia`),
  ADD KEY `departamento` (`departamento`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`,`clase`,`tipo`,`empresa`),
  ADD KEY `empresa` (`empresa`),
  ADD KEY `clase` (`clase`),
  ADD KEY `clase_2` (`clase`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_empleado_estado_civil_idx` (`estado_civil`),
  ADD KEY `fk_empleado_categoria1_idx` (`categoria`),
  ADD KEY `fk_empleado_cargo1_idx` (`cargo`),
  ADD KEY `fk_empleado_especializacion1_idx` (`especializacion`),
  ADD KEY `fk_empleado_seguro_persion1_idx` (`seguro_pension`),
  ADD KEY `fk_empleado_empresa1_idx` (`empresa`),
  ADD KEY `fk_empleado_grupo_sanguineo1_idx` (`grupo_sanguineo`),
  ADD KEY `fk_empleado_factor_sanguineo1_idx` (`factor_sanguineo`),
  ADD KEY `distrito` (`distrito`),
  ADD KEY `provincia` (`provincia`),
  ADD KEY `departamento` (`departamento`),
  ADD KEY `distrito_2` (`distrito`,`provincia`,`departamento`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ruc`);

--
-- Indices de la tabla `epp`
--
ALTER TABLE `epp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especializacion`
--
ALTER TABLE `especializacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`,`empleado`,`empresa`),
  ADD KEY `fk_estudios_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`),
  ADD KEY `fk_evento_tipo_evento1_idx` (`tipo_evento`),
  ADD KEY `fk_evento_empresa1_idx` (`empresa`);

--
-- Indices de la tabla `examen_medico`
--
ALTER TABLE `examen_medico`
  ADD PRIMARY KEY (`id`,`empleado`,`empresa`),
  ADD KEY `empresa` (`empresa`),
  ADD KEY `empleado` (`empleado`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`id`,`empleado`,`ruc_empresa`),
  ADD KEY `fk_experiencia_laboral_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `extintor`
--
ALTER TABLE `extintor`
  ADD PRIMARY KEY (`id`,`empresa`),
  ADD KEY `empresa` (`empresa`);

--
-- Indices de la tabla `factor_sanguineo`
--
ALTER TABLE `factor_sanguineo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_epp`
--
ALTER TABLE `historial_epp`
  ADD PRIMARY KEY (`empresa`,`empleado`,`id`),
  ADD KEY `fk_historial_epp_empleado1_idx` (`empleado`),
  ADD KEY `fk_historial_epp_empresa1_idx` (`empresa`);

--
-- Indices de la tabla `imagenes_capacitacion`
--
ALTER TABLE `imagenes_capacitacion`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`imagen`);

--
-- Indices de la tabla `imagenes_preliminar`
--
ALTER TABLE `imagenes_preliminar`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`imagen`);

--
-- Indices de la tabla `imagenes_simulacro`
--
ALTER TABLE `imagenes_simulacro`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`imagen`);

--
-- Indices de la tabla `inspeccion_almacen`
--
ALTER TABLE `inspeccion_almacen`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_botiquin`
--
ALTER TABLE `inspeccion_botiquin`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_epp`
--
ALTER TABLE `inspeccion_epp`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_extintores`
--
ALTER TABLE `inspeccion_extintores`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_limpieza`
--
ALTER TABLE `inspeccion_limpieza`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_oficina`
--
ALTER TABLE `inspeccion_oficina`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_sshh`
--
ALTER TABLE `inspeccion_sshh`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `inspeccion_trabajo`
--
ALTER TABLE `inspeccion_trabajo`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`item`);

--
-- Indices de la tabla `preliminar_incidente`
--
ALTER TABLE `preliminar_incidente`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `involucrado` (`involucrado`);

--
-- Indices de la tabla `programa_capacitaciones`
--
ALTER TABLE `programa_capacitaciones`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`),
  ADD KEY `anio` (`anio`),
  ADD KEY `empresa` (`empresa`);

--
-- Indices de la tabla `programa_inspecciones`
--
ALTER TABLE `programa_inspecciones`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`,`tipo`);

--
-- Indices de la tabla `programa_monitoreo`
--
ALTER TABLE `programa_monitoreo`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`),
  ADD KEY `anio` (`anio`),
  ADD KEY `empresa` (`empresa`);

--
-- Indices de la tabla `programa_simulacros`
--
ALTER TABLE `programa_simulacros`
  ADD PRIMARY KEY (`id`,`anio`,`empresa`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`,`departamento`),
  ADD KEY `fk_provincia_departamento_idx` (`departamento`);

--
-- Indices de la tabla `seguro_pension`
--
ALTER TABLE `seguro_pension`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_seguro`
--
ALTER TABLE `tipo_seguro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`empresa`,`usuario`),
  ADD KEY `fk_empresa_has_empleado_empresa1_idx` (`empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `epp`
--
ALTER TABLE `epp`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `especializacion`
--
ALTER TABLE `especializacion`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `extintor`
--
ALTER TABLE `extintor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factor_sanguineo`
--
ALTER TABLE `factor_sanguineo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seguro_pension`
--
ALTER TABLE `seguro_pension`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD CONSTRAINT `fk_antecedentes_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_antecedentes_empresa` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD CONSTRAINT `fk_emergencia_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_emergencia_empresa` FOREIGN KEY (`empresa`) REFERENCES `antecedentes` (`empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_familiares`
--
ALTER TABLE `datos_familiares`
  ADD CONSTRAINT `fk_datos_familiares_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_historial_epp`
--
ALTER TABLE `detalle_historial_epp`
  ADD CONSTRAINT `fk_detalle_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_empresa` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_epp` FOREIGN KEY (`epp`) REFERENCES `epp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `fk_distitro_departamento1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_distrito_provincia1` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_cargo1` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_empresa1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_especializacion1` FOREIGN KEY (`especializacion`) REFERENCES `especializacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_estado_civil` FOREIGN KEY (`estado_civil`) REFERENCES `estado_civil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_factor_sanguineo1` FOREIGN KEY (`factor_sanguineo`) REFERENCES `factor_sanguineo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_grupo_sanguineo1` FOREIGN KEY (`grupo_sanguineo`) REFERENCES `grupo_sanguineo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_seguro_persion1` FOREIGN KEY (`seguro_pension`) REFERENCES `seguro_pension` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `fk_estudios_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_empresa1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_tipo_evento1` FOREIGN KEY (`tipo_evento`) REFERENCES `tipo_evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examen_medico`
--
ALTER TABLE `examen_medico`
  ADD CONSTRAINT `FK_EXAMEN_EMPRESA` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `fk_experiencia_laboral_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `extintor`
--
ALTER TABLE `extintor`
  ADD CONSTRAINT `fk_extintor_empresa` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial_epp`
--
ALTER TABLE `historial_epp`
  ADD CONSTRAINT `fk_historial_epp_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_epp_empresa1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programa_capacitaciones`
--
ALTER TABLE `programa_capacitaciones`
  ADD CONSTRAINT `fk_capacitacion_empresa` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_empresa_has_empleado_empresa1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`ruc`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
