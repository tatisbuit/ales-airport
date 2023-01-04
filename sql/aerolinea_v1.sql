-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-03-2022 a las 12:55:43
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aerolinea_v1`
--
CREATE DATABASE IF NOT EXISTS `aerolinea_v1` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `aerolinea_v1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `001_idiomas`
--

CREATE TABLE `001_idiomas` (
  `ididioma` smallint(5) UNSIGNED NOT NULL,
  `nomidioma` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `001_idiomas`
--

INSERT INTO `001_idiomas` (`ididioma`, `nomidioma`) VALUES
(1, 'Chino'),
(2, 'Español'),
(3, 'Inglés'),
(4, 'Hindi-urdu'),
(5, 'Árabe'),
(6, 'Bengalí'),
(7, 'Portugués'),
(8, 'Ruso'),
(9, 'Japonés'),
(10, 'Panyabí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `002_fabricantes`
--

CREATE TABLE `002_fabricantes` (
  `idfabricante` smallint(5) UNSIGNED NOT NULL,
  `nomfabricante` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `002_fabricantes`
--

INSERT INTO `002_fabricantes` (`idfabricante`, `nomfabricante`) VALUES
(1, 'BOEING'),
(2, 'AIRBUS'),
(3, 'EMBRAER'),
(4, 'BOMBARDIER'),
(5, 'SUPERJET');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `003_modelos`
--

CREATE TABLE `003_modelos` (
  `idmodelo` smallint(5) UNSIGNED NOT NULL,
  `modelo` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `numasientos` smallint(5) UNSIGNED NOT NULL COMMENT 'numero de asientos por defecto',
  `idfabricante` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `003_modelos`
--

INSERT INTO `003_modelos` (`idmodelo`, `modelo`, `numasientos`, `idfabricante`) VALUES
(1, '757', 468, 1),
(2, '310', 288, 2),
(3, '220', 288, 2),
(4, '318', 348, 2),
(5, '319', 288, 2),
(6, '767', 296, 1),
(7, '777', 335, 1),
(8, '787', 298, 1),
(9, '747', 180, 1),
(10, '320', 141, 2),
(11, '340', 150, 2),
(12, '350', 172, 2),
(13, '145', 50, 3),
(14, '170', 65, 3),
(15, '175', 76, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `004_ciudades`
--

CREATE TABLE `004_ciudades` (
  `codIATAciudad` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `nomciudad` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `004_ciudades`
--

INSERT INTO `004_ciudades` (`codIATAciudad`, `nomciudad`) VALUES
('AGP', 'Malaga'),
('BCN', 'Barcelona'),
('BJZ', 'Badajoz'),
('GRX', 'Granada'),
('IBZ', 'Ibiza'),
('MAD', 'Madrid'),
('RGS', 'Burgos'),
('SVQ', 'Sevilla'),
('VIT', 'Vitoria'),
('VLC', 'Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `005_pasajeros`
--

CREATE TABLE `005_pasajeros` (
  `idpasajero` smallint(5) UNSIGNED NOT NULL,
  `apellidopax` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nompax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emailpax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telpax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numbilete` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `005_pasajeros`
--

INSERT INTO `005_pasajeros` (`idpasajero`, `apellidopax`, `nompax`, `emailpax`, `telpax`, `numbilete`) VALUES
(1, 'Patel', 'Jane', 'Jane_Patel1403@bretoux.com', '017-661-8530', '40475750625374'),
(2, 'Benfield', 'Francesca', 'Francesca_Benfield2338@twipet.com', '835-138-8181', '22395914514530'),
(3, 'Tanner', 'Chester', 'Chester_Tanner9121@fuliss.net', '107-300-2715', '9818223487131'),
(4, 'Willson', 'Fiona', 'Fiona_Willson9552@atink.com', '878-040-0015', '79050957139747'),
(5, 'Cartwright', 'Mona', 'Mona_Cartwright4876@elnee.tech', '230-326-8340', '85720732606794'),
(6, 'Brooks', 'Emery', 'Emery_Brooks5440@dionrab.com', '261-782-3177', '79798623309493'),
(7, 'Penn', 'Alma', 'Alma_Penn5062@tonsy.org', '374-673-6612', '33353936071281'),
(8, 'Harris', 'Luke', 'Luke_Harris1673@elnee.tech', '216-401-5524', '84929886916013'),
(9, 'Roberts', 'Aurelia', 'Aurelia_Roberts5727@womeona.net', '034-400-8882', '98318325313854'),
(10, 'Tindall', 'Maxwell', 'Maxwell_Tindall3579@nickia.com', '761-242-1627', '62745446082141');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `006_cargos`
--

CREATE TABLE `006_cargos` (
  `idcargo` tinyint(3) UNSIGNED NOT NULL,
  `nomcargo` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `006_cargos`
--

INSERT INTO `006_cargos` (`idcargo`, `nomcargo`) VALUES
(1, 'Auxiliar de tierra'),
(2, 'despachador de vuelos'),
(3, 'técnico administrativo'),
(4, 'técnico de Operaciones aeroportuarias'),
(5, 'técnicos de mantenimiento'),
(6, 'responsable de equipaje'),
(7, 'tripulante de cabina'),
(8, 'piloto'),
(9, 'copiloto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `007_aerolineas`
--

CREATE TABLE `007_aerolineas` (
  `codIATAaerolinea` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `nomaerolinea` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `007_aerolineas`
--

INSERT INTO `007_aerolineas` (`codIATAaerolinea`, `nomaerolinea`, `pais`, `logo`, `descripcion`) VALUES
('AEA', 'air europa', 'ESPAÑA', 'aireuropa.png', 'air europa fundada en 1984 con el nombre comercial de Air España, S.A., se constituyó dos años después con la denominación Air Europa y realizó su primer vuelo el 21 de noviembre de 1986. En 1991 un grupo de inversores, encabezado por Juan José Hidalgo, adquirió la compañía. Actualmente Air Europa Líneas Aéreas, S.A.U.,​es la principal aerolínea de capital español con sede social en Lluchmayor (Islas Baleares) España.​El 4 de noviembre de 2019 se anunció el acuerdo de compra de la aerolínea por parte de IB OPCO HOLDING SL, matriz de Iberia, propiedad de IAG (International Airlines Group) por 1.000 millones de euros.'),
('AFR', 'airfrance', 'FRANCIA', 'airfrance.png', 'air france es la aerolínea de bandera de Francia. Esta compañía ha transportado a 43,3 millones de pasajeros y obtenido unos beneficios de 12,53 mil millones de euros entre abril de 2001 y marzo de 2002. Tiene rutas entre 345 ciudades en 85 países y cuenta con más de 64000 empleados. Pertenece a la alianza SkyTeam junto a Delta, Aeroméxico, Air Europa, Korean Air, CSA Czech Airlines, ITA Airways, KLM y Aerolíneas Argentinas. En 2004, Air France se situó como la primera aerolínea europea, con un 18% de todos los pasajeros del continente.'),
('AVA', 'avianca', 'COLOMBIA', 'avianca.png', 'avianca es la aerolínea bandera de Colombia,es opera la segunda flota más grande de América del Sur, después de la chileno-brasileña LATAM, y es la tercera mejor aerolínea en el subcontinente según Skytrax World Airline Awards tras LATAM y Azul Linhas Aéreas Brasileiras.Sus centros de conexiones están localizados en los aeropuertos El Dorado (Bogotá)'),
('IBE', 'iberia', 'ESPAÑA', 'iberia.png', 'iberia es la aerolínea bandera de España, fundada originalmente en 1927 con el nombre de Iberia, Compañía Aérea de Transporte. La sociedad actual fue creada el 23 de diciembre de 2009 bajo el nombre de Iberia Líneas Aéreas de España, S. A. Operadora Unipersonal, mientras que la sociedad histórica desapareció el 21 de enero de 2011 al ser absorbida junto con BA Holdco por International Consolidated Airlines Group. Tiene su sede social en Madrid'),
('VLG', 'vueling airlines', 'ESPAÑA', 'vueling.png', 'Vueling Airlines es una aerolínea española, con sede en Barcelona, España. Una empresa propiedad de IAG. Es la mayor aerolínea dentro del territorio español en número de destinos y por tamaño de flota,\n    y la segunda por número de pasajeros transportados dentro del territorio español, solo superada por la irlandesa Ryanair.La base principal de Vueling desde su creación y también su centro de conexión desde mayo de 2010​ está en Barcelona, \n    mientras que cuenta con numerosas bases de operaciones en el resto de España en los aeropuertos de La Coruña, Alicante, Asturias, Bilbao, Gran Canaria, Tenerife Norte, Madrid, Málaga, Palma de Mallorca, Santiago de Compostela, Sevilla, Valencia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `008_empleados`
--

CREATE TABLE `008_empleados` (
  `docidentificativo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nomempleados` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecnacimiento` date NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `codIATAaerolinea` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `idcargo` tinyint(3) UNSIGNED NOT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='TRUE = 1 = masculino, FALSE = 0 = femenino';

--
-- Volcado de datos para la tabla `008_empleados`
--

INSERT INTO `008_empleados` (`docidentificativo`, `nomempleados`, `fecnacimiento`, `sexo`, `codIATAaerolinea`, `idcargo`, `foto`) VALUES
('080-42-1427', 'Kate Eagle', '1982-10-25', 0, 'IBE', 9, 'avatarm.jpg'),
('137-17-7602', 'Emma Graham', '1999-01-30', 0, 'AEA', 1, 'avatarm.jpg'),
('228-27-5755', 'Leroy Rowe', '1975-10-30', 1, 'IBE', 8, 'avatarh.jpg'),
('265-62-7087', 'Madelyn Moore', '1996-08-08', 0, 'AEA', 1, 'avatarm.jpg'),
('300-53-0867', 'Sebastian Farmer', '1982-05-07', 1, 'IBE', 8, 'avatarh.jpg'),
('306-41-2437', 'Camila Appleton', '1989-06-13', 0, 'AFR', 4, 'avatarm.jpg'),
('317-50-6364', 'Tiffany Dubois', '2001-06-17', 0, 'IBE', 1, 'avatarm.jpg'),
('333-34-4275', 'Dani Oliver', '1964-05-09', 1, 'AVA', 1, 'avatarh.jpg'),
('432-54-1535', 'Mandy Blackburn', '1998-03-06', 1, 'IBE', 7, 'avatarh.jpg'),
('461-63-7230', 'Vanessa Torres', '2001-12-23', 0, 'AEA', 8, 'avatarm.jpg'),
('465-25-7460', 'Hayden Thomson', '1977-09-12', 1, 'AEA', 1, 'avatarh.jpg'),
('508-77-1626', 'Adeline Bingham', '1983-05-06', 0, 'AFR', 3, 'avatarm.jpg'),
('517-32-0805', 'Chuck Atkinson', '1967-03-19', 1, 'IBE', 2, 'avatarh.jpg'),
('721-21-7534', 'William Rehman', '1969-07-06', 0, 'IBE', 7, 'avatarm.jpg'),
('721-64-6440', 'Julian Rowlands', '1984-12-11', 1, 'IBE', 6, 'avatarh.jpg'),
('771-81-0378', 'Nate West', '1976-05-20', 1, 'AEA', 7, 'avatarh.jpg'),
('774-17-8005', 'Meredith Mcnally', '1979-12-03', 0, 'VLG', 5, 'avatarm.jpg'),
('832-21-3276', 'Irene Cadman', '1998-09-16', 0, 'IBE', 1, 'avatarm.jpg'),
('840-77-4586', 'Denny Andersson', '1986-09-15', 1, 'IBE', 9, 'avatarh.jpg'),
('864-58-3428', 'Camellia Johnson', '1989-10-30', 0, 'AEA', 9, 'avatarm.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `009_idiomastripulaciones`
--

CREATE TABLE `009_idiomastripulaciones` (
  `ididioma` smallint(5) UNSIGNED NOT NULL,
  `docidentificativo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `009_idiomastripulaciones`
--

INSERT INTO `009_idiomastripulaciones` (`ididioma`, `docidentificativo`) VALUES
(1, '080-42-1427'),
(2, '080-42-1427'),
(2, '228-27-5755'),
(2, '300-53-0867'),
(2, '432-54-1535'),
(2, '461-63-7230'),
(2, '721-21-7534'),
(2, '771-81-0378'),
(2, '840-77-4586'),
(2, '864-58-3428'),
(3, '080-42-1427'),
(3, '228-27-5755'),
(3, '300-53-0867'),
(3, '432-54-1535'),
(3, '721-21-7534'),
(3, '771-81-0378'),
(3, '840-77-4586'),
(3, '864-58-3428'),
(5, '840-77-4586'),
(7, '864-58-3428'),
(8, '080-42-1427'),
(8, '432-54-1535'),
(8, '864-58-3428'),
(9, '080-42-1427');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `010_empaeropuertos`
--

CREATE TABLE `010_empaeropuertos` (
  `idempaeropuerto` tinyint(3) UNSIGNED NOT NULL,
  `docidentificativo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nomaeropuerto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `010_empaeropuertos`
--

INSERT INTO `010_empaeropuertos` (`idempaeropuerto`, `docidentificativo`, `nomaeropuerto`) VALUES
(1, '265-62-7087', 'Adolfo Suares Madrid Barajas Airport'),
(2, '465-25-7460', 'Valencia Airport'),
(3, '137-17-7602', 'Josep Tarradellas Airport'),
(4, '317-50-6364', 'Adolfo Suares Madrid Barajas Airport'),
(5, '832-21-3276', 'Josep Tarradellas Airport'),
(6, '721-64-6440', 'Valencia Airport'),
(7, '774-17-8005', 'Adolfo Suares Madrid Barajas Airport'),
(8, '306-41-2437', 'Valencia Airport'),
(9, '508-77-1626', 'Adolfo Suares Madrid Barajas Airport'),
(10, '517-32-0805', 'Sevilla-San Pablo Airport'),
(11, '333-34-4275', 'Adolfo Suares Madrid Barajas Airport');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `011_tripulaciones`
--

CREATE TABLE `011_tripulaciones` (
  `idtripulacion` tinyint(3) UNSIGNED NOT NULL,
  `docidentificativo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numhoras` smallint(5) UNSIGNED NOT NULL,
  `estatura` float(5,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `011_tripulaciones`
--

INSERT INTO `011_tripulaciones` (`idtripulacion`, `docidentificativo`, `numhoras`, `estatura`) VALUES
(1, '300-53-0867', 2000, 1.65),
(2, '080-42-1427', 2200, 1.78),
(3, '721-21-7534', 3000, 1.80),
(4, '228-27-5755', 1900, 1.84),
(5, '840-77-4586', 2500, 1.80),
(6, '461-63-7230', 1500, 1.85),
(7, '864-58-3428', 1000, 1.80),
(8, '432-54-1535', 1000, 1.80),
(9, '771-81-0378', 1000, 1.80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `012_aeropuertos`
--

CREATE TABLE `012_aeropuertos` (
  `idaeropuerto` smallint(5) UNSIGNED NOT NULL,
  `nomaeropuerto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codIATAciudad` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `012_aeropuertos`
--

INSERT INTO `012_aeropuertos` (`idaeropuerto`, `nomaeropuerto`, `codIATAciudad`) VALUES
(1, 'Adolfo Suares Madrid Barajas Airport', 'MAD'),
(2, 'Valencia Airport', 'VLC'),
(3, 'Josep Tarradellas Airport', 'BCN'),
(4, 'Ibiza Airport', 'IBZ'),
(5, 'Málaga-Costa Sol Airport', 'AGP'),
(6, 'Burgos Airport', 'RGS'),
(7, 'Badajoz Airport', 'BJZ'),
(8, 'Federico García Lorca Granada-Jaén Airport', 'GRX'),
(9, 'Sevilla-San Pablo Airport', 'SVQ'),
(10, 'Vitoria-Foronda Airport', 'VIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `013_aeronaves`
--

CREATE TABLE `013_aeronaves` (
  `idaeronave` smallint(5) UNSIGNED NOT NULL,
  `codIATAaerolinea` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `numasientos` smallint(5) UNSIGNED NOT NULL,
  `idmodelo` smallint(5) UNSIGNED NOT NULL,
  `feccompra` date NOT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='asientos requeridos por la aerolinea';

--
-- Volcado de datos para la tabla `013_aeronaves`
--

INSERT INTO `013_aeronaves` (`idaeronave`, `codIATAaerolinea`, `matricula`, `numasientos`, `idmodelo`, `feccompra`, `foto`) VALUES
(1, 'IBE', 'EC-HUI', 200, 11, '1999-06-04', 'airbus-340.jpg'),
(2, 'IBE', 'EC-MCS', 171, 1, '2002-07-03', 'boeing-757.jpg'),
(3, 'IBE', 'EC-MIL', 288, 3, '2013-11-01', 'airbus-220.jpg'),
(4, 'IBE', 'EC-LZX', 278, 4, '2013-11-01', 'airbus-318.jpg'),
(5, 'AEA', 'EC-MIG', 325, 15, '2014-02-16', 'embraer-175.jpg'),
(6, 'AFR', 'F-GRHI', 142, 5, '2007-07-03', 'airbus-319.jpg'),
(7, 'AFR', 'F-GKXG', 178, 9, '2007-07-03', 'boeing-747.jpg'),
(8, 'AFR', 'F-GZCH', 207, 12, '2007-07-03', 'airbus-350.jpg'),
(9, 'AFR', 'F-GSPK', 278, 6, '2007-07-03', 'boeing-767.jpg'),
(10, 'AFR', 'F-HRBH', 276, 2, '2019-04-24', 'airbus-310.jpg'),
(11, 'AVA', 'N664AV', 120, 13, '2014-07-23', 'embraer-145.jpg'),
(12, 'AVA', 'N726AV', 120, 10, '2014-07-23', 'airbus-320.jpg'),
(13, 'AVA', 'N726AV', 150, 14, '2014-07-23', 'embraer-170.jpg'),
(14, 'AVA', 'N780AV', 150, 7, '2019-07-23', 'boeing-777.jpg'),
(15, 'AVA', 'N726AV', 150, 1, '2020-07-23', 'boeing-757.jpg'),
(16, 'AVA', 'N726AV', 150, 8, '2014-01-20', 'boeing-787.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `014_vuelos`
--

CREATE TABLE `014_vuelos` (
  `idvuelo` smallint(5) UNSIGNED NOT NULL,
  `codvuelo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fechorasalida` datetime NOT NULL,
  `fechahorallegada` datetime NOT NULL,
  `codIATAaerolinea` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `idaeronave` smallint(5) UNSIGNED NOT NULL,
  `idaeropuerto` smallint(5) UNSIGNED NOT NULL,
  `idaeropuertodestino` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `014_vuelos`
--

INSERT INTO `014_vuelos` (`idvuelo`, `codvuelo`, `fechorasalida`, `fechahorallegada`, `codIATAaerolinea`, `idaeronave`, `idaeropuerto`, `idaeropuertodestino`) VALUES
(1, 'AE1497', '2021-01-25 10:20:00', '2021-01-25 13:15:00', 'AEA', 5, 3, 4),
(2, 'AF8390', '2021-09-20 07:30:00', '2021-09-20 09:10:00', 'AFR', 6, 2, 9),
(3, 'AF8878', '2020-03-18 20:20:00', '2020-03-18 21:25:00', 'AFR', 8, 1, 2),
(4, 'AF9414', '2021-10-10 06:20:00', '2021-10-10 11:35:00', 'AFR', 8, 3, 2),
(5, 'AV1499', '2021-02-21 01:30:00', '2021-02-21 02:55:00', 'AVA', 13, 3, 4),
(6, 'AV8392', '2021-12-23 17:35:00', '2021-12-23 21:15:00', 'AVA', 12, 2, 9),
(7, 'IB3004', '2020-12-20 07:30:09', '2020-12-20 08:50:00', 'IBE', 1, 1, 3),
(8, 'IB3018', '2020-05-09 17:30:00', '2020-05-09 18:50:00', 'IBE', 3, 1, 3),
(9, 'IB8872', '2020-07-15 07:55:00', '2020-07-15 09:00:00', 'IBE', 4, 1, 2),
(10, 'AE1498', '2021-11-30 07:10:00', '2021-11-30 08:10:00', 'AEA', 5, 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `015_pasajeros_infantes`
--

CREATE TABLE `015_pasajeros_infantes` (
  `idinfante` smallint(5) UNSIGNED NOT NULL,
  `nominfante` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `fecnacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bebes de 0 a 2 anios';

--
-- Volcado de datos para la tabla `015_pasajeros_infantes`
--

INSERT INTO `015_pasajeros_infantes` (`idinfante`, `nominfante`, `sexo`, `fecnacimiento`) VALUES
(1, 'Cork Irene', 0, '2021-07-15'),
(2, 'Gilmour Florence', 0, '2021-09-27'),
(3, 'Partridge Brad', 1, '2019-12-05'),
(4, 'Partridge Eduardo', 1, '2020-08-01'),
(5, 'Spencer Abdul', 1, '2020-10-06'),
(6, 'Khan Denny', 0, '2021-09-17'),
(7, 'Penn Ramon', 1, '2021-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `016_reservas`
--

CREATE TABLE `016_reservas` (
  `idreserva` smallint(5) UNSIGNED NOT NULL,
  `codreserva` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombrepersonaquereserva` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoreserva` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fechahorareserva` datetime NOT NULL,
  `idvuelo` smallint(5) UNSIGNED NOT NULL,
  `idpasajero` smallint(5) UNSIGNED NOT NULL,
  `precio` float(6,2) UNSIGNED NOT NULL,
  `tasasimpuestos` float(6,2) UNSIGNED NOT NULL,
  `serviespeciales` tinyint(1) NOT NULL COMMENT 'servicios especiales'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `016_reservas`
--

INSERT INTO `016_reservas` (`idreserva`, `codreserva`, `nombrepersonaquereserva`, `telefonoreserva`, `fechahorareserva`, `idvuelo`, `idpasajero`, `precio`, `tasasimpuestos`, `serviespeciales`) VALUES
(1, 'E38B11AF', 'Estrella Broomfield', '6-387-101-7046', '2021-10-01 09:19:45', 4, 1, 268.00, 88.41, 1),
(2, 'B35F11AF', 'Benfield Francesca', '835-138-8181', '2020-10-22 09:19:45', 7, 2, 270.00, 88.41, 1),
(3, 'C25H11AF', 'Castillo Hernnan', '825-338-8182', '2020-04-22 09:19:45', 8, 4, 273.00, 88.41, 1),
(4, 'N70D11AF', 'Nick Driscoll', '1-702-487-7464', '2021-08-20 17:23:11', 2, 3, 253.00, 88.41, 1),
(5, 'J65D11AF', 'Javier Driscoll', '2-653-544-4867', '2021-06-06 14:32:16', 6, 5, 260.00, 88.41, 1),
(6, 'E48B11AF', 'Emery Brooks', '7-478-024-4326', '2020-07-13 15:02:09', 9, 6, 200.00, 88.41, 1),
(7, 'F50R11AF', 'Fred Ross', '2-460-233-6477', '2020-02-15 18:00:35', 3, 8, 250.00, 88.41, 0),
(8, 'D71T11AF', 'Doris Thornton', '1-271-452-3122', '2021-01-19 02:03:58', 1, 7, 255.00, 88.41, 1),
(9, 'F46R711AF', 'Fred Ross', '2-460-233-6477', '2021-10-15 18:00:35', 10, 9, 251.00, 88.41, 0),
(10, 'H86F811AF', 'Harmony Freeburn', '5-786-216-4473', '2021-01-23 21:08:02', 5, 10, 240.00, 88.41, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `017_reservas_con_infantes`
--

CREATE TABLE `017_reservas_con_infantes` (
  `idreserva` smallint(5) UNSIGNED NOT NULL,
  `idinfante` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `017_reservas_con_infantes`
--

INSERT INTO `017_reservas_con_infantes` (`idreserva`, `idinfante`) VALUES
(3, 1),
(2, 2),
(4, 3),
(6, 4),
(8, 5),
(5, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `018_equipajes`
--

CREATE TABLE `018_equipajes` (
  `idequipaje` smallint(5) UNSIGNED NOT NULL,
  `idreserva` smallint(5) UNSIGNED NOT NULL,
  `peso` float(4,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='peso maximo 99,99';

--
-- Volcado de datos para la tabla `018_equipajes`
--

INSERT INTO `018_equipajes` (`idequipaje`, `idreserva`, `peso`) VALUES
(1, 1, 23.00),
(2, 2, 33.00),
(3, 3, 32.00),
(4, 4, 30.00),
(5, 5, 29.00),
(6, 6, 35.00),
(7, 7, 28.00),
(8, 8, 36.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `019_usuarios`
--

CREATE TABLE `019_usuarios` (
  `idusuario` int(5) UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `019_usuarios`
--

INSERT INTO `019_usuarios` (`idusuario`, `nombre`, `email`, `contraseña`) VALUES
(1, 'fer', 'fer@fer.com', '123'),
(2, 'taty', 'taty@taty.com', '123'),
(3, 'nico', 'nico@nico.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `001_idiomas`
--
ALTER TABLE `001_idiomas`
  ADD PRIMARY KEY (`ididioma`);

--
-- Indices de la tabla `002_fabricantes`
--
ALTER TABLE `002_fabricantes`
  ADD PRIMARY KEY (`idfabricante`);

--
-- Indices de la tabla `003_modelos`
--
ALTER TABLE `003_modelos`
  ADD PRIMARY KEY (`idmodelo`),
  ADD KEY `fk_MODELOS_idfabricante` (`idfabricante`);

--
-- Indices de la tabla `004_ciudades`
--
ALTER TABLE `004_ciudades`
  ADD PRIMARY KEY (`codIATAciudad`);

--
-- Indices de la tabla `005_pasajeros`
--
ALTER TABLE `005_pasajeros`
  ADD PRIMARY KEY (`idpasajero`),
  ADD UNIQUE KEY `numbilete` (`numbilete`);

--
-- Indices de la tabla `006_cargos`
--
ALTER TABLE `006_cargos`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `007_aerolineas`
--
ALTER TABLE `007_aerolineas`
  ADD PRIMARY KEY (`codIATAaerolinea`);

--
-- Indices de la tabla `008_empleados`
--
ALTER TABLE `008_empleados`
  ADD PRIMARY KEY (`docidentificativo`),
  ADD KEY `fk_EMPLEADOS_codIATAaerolinea` (`codIATAaerolinea`),
  ADD KEY `fk_EMPLEADOS_idcargo` (`idcargo`);

--
-- Indices de la tabla `009_idiomastripulaciones`
--
ALTER TABLE `009_idiomastripulaciones`
  ADD PRIMARY KEY (`ididioma`,`docidentificativo`),
  ADD KEY `fk_IDIOMASTRIPULACIONES_docidentificativo` (`docidentificativo`);

--
-- Indices de la tabla `010_empaeropuertos`
--
ALTER TABLE `010_empaeropuertos`
  ADD PRIMARY KEY (`idempaeropuerto`),
  ADD KEY `fk_EMPAEROPUERTOS_docidentificativo` (`docidentificativo`);

--
-- Indices de la tabla `011_tripulaciones`
--
ALTER TABLE `011_tripulaciones`
  ADD PRIMARY KEY (`idtripulacion`),
  ADD KEY `fk_TRIPULACIONES_docidentificativo` (`docidentificativo`);

--
-- Indices de la tabla `012_aeropuertos`
--
ALTER TABLE `012_aeropuertos`
  ADD PRIMARY KEY (`idaeropuerto`),
  ADD KEY `fk_AEROPUERTOS_codIATAciudad` (`codIATAciudad`);

--
-- Indices de la tabla `013_aeronaves`
--
ALTER TABLE `013_aeronaves`
  ADD PRIMARY KEY (`idaeronave`),
  ADD KEY `fk_AERONAVES_codIATAaerolinea` (`codIATAaerolinea`),
  ADD KEY `fk_AERONAVES_idmodelo` (`idmodelo`);

--
-- Indices de la tabla `014_vuelos`
--
ALTER TABLE `014_vuelos`
  ADD PRIMARY KEY (`idvuelo`),
  ADD KEY `fk_VUELOS_codIATAaerolinea` (`codIATAaerolinea`),
  ADD KEY `fk_VUELOS_idaeronave` (`idaeronave`),
  ADD KEY `fk_VUELOS_idaeropuerto` (`idaeropuerto`),
  ADD KEY `fk_VUELOS_idaeropuertodestino` (`idaeropuertodestino`);

--
-- Indices de la tabla `015_pasajeros_infantes`
--
ALTER TABLE `015_pasajeros_infantes`
  ADD PRIMARY KEY (`idinfante`);

--
-- Indices de la tabla `016_reservas`
--
ALTER TABLE `016_reservas`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_RESERVAS_idvuelo` (`idvuelo`),
  ADD KEY `fk_RESERVAS_idpasajero` (`idpasajero`);

--
-- Indices de la tabla `017_reservas_con_infantes`
--
ALTER TABLE `017_reservas_con_infantes`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_RESERVAS_CON_INFANTES` (`idinfante`);

--
-- Indices de la tabla `018_equipajes`
--
ALTER TABLE `018_equipajes`
  ADD PRIMARY KEY (`idequipaje`),
  ADD KEY `fk_EQUIPAJES_idreserva` (`idreserva`);

--
-- Indices de la tabla `019_usuarios`
--
ALTER TABLE `019_usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `usuario` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `001_idiomas`
--
ALTER TABLE `001_idiomas`
  MODIFY `ididioma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `002_fabricantes`
--
ALTER TABLE `002_fabricantes`
  MODIFY `idfabricante` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `003_modelos`
--
ALTER TABLE `003_modelos`
  MODIFY `idmodelo` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `005_pasajeros`
--
ALTER TABLE `005_pasajeros`
  MODIFY `idpasajero` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `006_cargos`
--
ALTER TABLE `006_cargos`
  MODIFY `idcargo` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `009_idiomastripulaciones`
--
ALTER TABLE `009_idiomastripulaciones`
  MODIFY `ididioma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `010_empaeropuertos`
--
ALTER TABLE `010_empaeropuertos`
  MODIFY `idempaeropuerto` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `011_tripulaciones`
--
ALTER TABLE `011_tripulaciones`
  MODIFY `idtripulacion` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `012_aeropuertos`
--
ALTER TABLE `012_aeropuertos`
  MODIFY `idaeropuerto` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `013_aeronaves`
--
ALTER TABLE `013_aeronaves`
  MODIFY `idaeronave` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `014_vuelos`
--
ALTER TABLE `014_vuelos`
  MODIFY `idvuelo` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `015_pasajeros_infantes`
--
ALTER TABLE `015_pasajeros_infantes`
  MODIFY `idinfante` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `016_reservas`
--
ALTER TABLE `016_reservas`
  MODIFY `idreserva` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `017_reservas_con_infantes`
--
ALTER TABLE `017_reservas_con_infantes`
  MODIFY `idreserva` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `018_equipajes`
--
ALTER TABLE `018_equipajes`
  MODIFY `idequipaje` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `019_usuarios`
--
ALTER TABLE `019_usuarios`
  MODIFY `idusuario` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `003_modelos`
--
ALTER TABLE `003_modelos`
  ADD CONSTRAINT `fk_MODELOS_idfabricante` FOREIGN KEY (`idfabricante`) REFERENCES `002_fabricantes` (`idfabricante`);

--
-- Filtros para la tabla `008_empleados`
--
ALTER TABLE `008_empleados`
  ADD CONSTRAINT `fk_EMPLEADOS_codIATAaerolinea` FOREIGN KEY (`codIATAaerolinea`) REFERENCES `007_aerolineas` (`codIATAaerolinea`),
  ADD CONSTRAINT `fk_EMPLEADOS_idcargo` FOREIGN KEY (`idcargo`) REFERENCES `006_cargos` (`idcargo`);

--
-- Filtros para la tabla `009_idiomastripulaciones`
--
ALTER TABLE `009_idiomastripulaciones`
  ADD CONSTRAINT `fk_IDIOMASTRIPULACIONES_docidentificativo` FOREIGN KEY (`docidentificativo`) REFERENCES `008_empleados` (`docidentificativo`),
  ADD CONSTRAINT `fk_IDIOMASTRIPULACIONES_ididioma` FOREIGN KEY (`ididioma`) REFERENCES `001_idiomas` (`ididioma`);

--
-- Filtros para la tabla `010_empaeropuertos`
--
ALTER TABLE `010_empaeropuertos`
  ADD CONSTRAINT `fk_EMPAEROPUERTOS_docidentificativo` FOREIGN KEY (`docidentificativo`) REFERENCES `008_empleados` (`docidentificativo`);

--
-- Filtros para la tabla `011_tripulaciones`
--
ALTER TABLE `011_tripulaciones`
  ADD CONSTRAINT `fk_TRIPULACIONES_docidentificativo` FOREIGN KEY (`docidentificativo`) REFERENCES `008_empleados` (`docidentificativo`);

--
-- Filtros para la tabla `012_aeropuertos`
--
ALTER TABLE `012_aeropuertos`
  ADD CONSTRAINT `fk_AEROPUERTOS_codIATAciudad` FOREIGN KEY (`codIATAciudad`) REFERENCES `004_ciudades` (`codIATAciudad`);

--
-- Filtros para la tabla `013_aeronaves`
--
ALTER TABLE `013_aeronaves`
  ADD CONSTRAINT `fk_AERONAVES_codIATAaerolinea` FOREIGN KEY (`codIATAaerolinea`) REFERENCES `007_aerolineas` (`codIATAaerolinea`),
  ADD CONSTRAINT `fk_AERONAVES_idmodelo` FOREIGN KEY (`idmodelo`) REFERENCES `003_modelos` (`idmodelo`);

--
-- Filtros para la tabla `014_vuelos`
--
ALTER TABLE `014_vuelos`
  ADD CONSTRAINT `fk_VUELOS_codIATAaerolinea` FOREIGN KEY (`codIATAaerolinea`) REFERENCES `007_aerolineas` (`codIATAaerolinea`),
  ADD CONSTRAINT `fk_VUELOS_idaeronave` FOREIGN KEY (`idaeronave`) REFERENCES `013_aeronaves` (`idaeronave`),
  ADD CONSTRAINT `fk_VUELOS_idaeropuerto` FOREIGN KEY (`idaeropuerto`) REFERENCES `012_aeropuertos` (`idaeropuerto`),
  ADD CONSTRAINT `fk_VUELOS_idaeropuertodestino` FOREIGN KEY (`idaeropuertodestino`) REFERENCES `012_aeropuertos` (`idaeropuerto`);

--
-- Filtros para la tabla `016_reservas`
--
ALTER TABLE `016_reservas`
  ADD CONSTRAINT `fk_RESERVAS_idpasajero` FOREIGN KEY (`idpasajero`) REFERENCES `005_pasajeros` (`idpasajero`),
  ADD CONSTRAINT `fk_RESERVAS_idvuelo` FOREIGN KEY (`idvuelo`) REFERENCES `014_vuelos` (`idvuelo`);

--
-- Filtros para la tabla `017_reservas_con_infantes`
--
ALTER TABLE `017_reservas_con_infantes`
  ADD CONSTRAINT `fk_RESERVAS_CON_INFANTES` FOREIGN KEY (`idinfante`) REFERENCES `015_pasajeros_infantes` (`idinfante`),
  ADD CONSTRAINT `fk_RESERVAS_idreserva` FOREIGN KEY (`idreserva`) REFERENCES `016_reservas` (`idreserva`);

--
-- Filtros para la tabla `018_equipajes`
--
ALTER TABLE `018_equipajes`
  ADD CONSTRAINT `fk_EQUIPAJES_idreserva` FOREIGN KEY (`idreserva`) REFERENCES `016_reservas` (`idreserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
