-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2022 a las 03:23:29
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `costura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_cli` int(11) NOT NULL COMMENT 'Codigo del Cliente',
  `ced_cli` varchar(40) NOT NULL COMMENT 'Cedula del Cliente',
  `nom_cli` varchar(20) NOT NULL COMMENT 'Nombre del Cliente',
  `ape_cli` varchar(30) NOT NULL COMMENT 'Apellido del Cliente',
  `te1_cli` varchar(20) NOT NULL COMMENT 'Telefono principal del Cliente',
  `te2_cli` varchar(20) NOT NULL COMMENT 'Telefono Secundaro del cliente',
  `est_cli` char(1) NOT NULL COMMENT 'Valores: A: Activo, I: Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla guardará los datos de los clientes';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_cli`, `ced_cli`, `nom_cli`, `ape_cli`, `te1_cli`, `te2_cli`, `est_cli`) VALUES
(2, '17848455', 'Alfredo Santiago', 'Contreras Beltran', '04123232122', '02762733421', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `cod_det` int(11) NOT NULL COMMENT 'codigo del recibo',
  `fky_cli` int(11) NOT NULL COMMENT 'cedula del cliente',
  `fky_cos` int(11) NOT NULL COMMENT 'tipo de costura',
  `fky_tel` int(11) NOT NULL COMMENT 'tipo de tela',
  `fky_acc` int(11) NOT NULL COMMENT 'tipo de accesorio',
  `can_tel` varchar(20) NOT NULL COMMENT 'cantidad de tela',
  `can_acc` varchar(20) NOT NULL COMMENT 'cantidad de accesorio',
  `to_tal` varchar(40) NOT NULL COMMENT 'costo de la costura',
  `est_det` char(1) NOT NULL COMMENT 'Valores: A: Activo, I: Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla guardará el detalle de factura';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `cod_fac` int(11) NOT NULL COMMENT 'Codigo de factura',
  `fky_cliente` int(11) NOT NULL COMMENT 'Codigo del Cliente ',
  `fky_detalle` int(11) NOT NULL COMMENT 'Pago total de la costura',
  `fecha` date NOT NULL COMMENT 'fecha de recibo',
  `tip_pag` varchar(15) NOT NULL COMMENT 'tipo de pago',
  `est_fac` char(1) NOT NULL COMMENT 'Valores: A: Activo, I: Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla guardará la factura de los clientes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

CREATE TABLE `telas` (
  `cod_tel` int(11) NOT NULL COMMENT 'Codigo de la tela',
  `tip_tel` char(1) NOT NULL COMMENT 'Tipo de la tela',
  `exi_tel` varchar(20) NOT NULL COMMENT 'existencia de la tela',
  `cos_tel` varchar(40) NOT NULL COMMENT 'costo de la tela',
  `est_tel` char(1) NOT NULL COMMENT 'Valores: A: Activo, I: Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla guardará el tipo de tela';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_accesorio`
--

CREATE TABLE `tipo_accesorio` (
  `cod_acc` int(11) NOT NULL COMMENT 'Codigo de accesorio',
  `tip_acc` varchar(20) NOT NULL COMMENT 'Tipo de accesorio',
  `can_acc` varchar(15) NOT NULL COMMENT 'cantidad de accesorio',
  `cos_acc` varchar(30) NOT NULL COMMENT 'costo de accesorio',
  `est_acc` char(1) NOT NULL COMMENT 'Valores: A: Activo, I: Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla guardará el tipo de accesorio';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_costura`
--

CREATE TABLE `tipo_costura` (
  `cod_cos` int(11) NOT NULL COMMENT 'Codigo de costura ',
  `tip_cos` varchar(20) NOT NULL COMMENT 'Tipo de costura',
  `pre_cos` varchar(40) NOT NULL COMMENT 'Precio de costura',
  `est_cos` char(1) NOT NULL COMMENT 'Valores: A: Activo, I: Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla guardará el tipo de costura';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cli`),
  ADD UNIQUE KEY `ced_cli` (`ced_cli`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`cod_det`),
  ADD UNIQUE KEY `fky_cli` (`fky_cli`),
  ADD KEY `fky_cos` (`fky_cos`),
  ADD KEY `fky_tel` (`fky_tel`),
  ADD KEY `fky_acc` (`fky_acc`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`cod_fac`),
  ADD UNIQUE KEY `fky_cliente` (`fky_cliente`),
  ADD KEY `fky_detalle` (`fky_detalle`);

--
-- Indices de la tabla `telas`
--
ALTER TABLE `telas`
  ADD PRIMARY KEY (`cod_tel`),
  ADD UNIQUE KEY `tip_tel` (`tip_tel`);

--
-- Indices de la tabla `tipo_accesorio`
--
ALTER TABLE `tipo_accesorio`
  ADD PRIMARY KEY (`cod_acc`),
  ADD UNIQUE KEY `tip_acc` (`tip_acc`);

--
-- Indices de la tabla `tipo_costura`
--
ALTER TABLE `tipo_costura`
  ADD PRIMARY KEY (`cod_cos`),
  ADD UNIQUE KEY `tip_cos` (`tip_cos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cli` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del Cliente', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `cod_det` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo del recibo';

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `cod_fac` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de factura';

--
-- AUTO_INCREMENT de la tabla `telas`
--
ALTER TABLE `telas`
  MODIFY `cod_tel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la tela';

--
-- AUTO_INCREMENT de la tabla `tipo_accesorio`
--
ALTER TABLE `tipo_accesorio`
  MODIFY `cod_acc` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de accesorio';

--
-- AUTO_INCREMENT de la tabla `tipo_costura`
--
ALTER TABLE `tipo_costura`
  MODIFY `cod_cos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de costura ';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`fky_cli`) REFERENCES `clientes` (`cod_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`fky_cos`) REFERENCES `tipo_costura` (`cod_cos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_factura_ibfk_3` FOREIGN KEY (`fky_tel`) REFERENCES `telas` (`cod_tel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_factura_ibfk_4` FOREIGN KEY (`fky_acc`) REFERENCES `tipo_accesorio` (`cod_acc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`fky_cliente`) REFERENCES `clientes` (`cod_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`fky_detalle`) REFERENCES `detalle_factura` (`cod_det`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
