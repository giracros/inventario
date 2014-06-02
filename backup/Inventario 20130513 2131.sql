-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.27


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema inventario
--

CREATE DATABASE IF NOT EXISTS inventario;
USE inventario;

--
-- Definition of table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
CREATE TABLE `acceso` (
  `PKUsuario` varchar(15) NOT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PKUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceso`
--

/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` (`PKUsuario`,`Password`,`Nombre`) VALUES 
 ('admin','admin','Administrador Del Sistema');
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `Cedula` varchar(15) NOT NULL,
  `Nombres` varchar(25) DEFAULT NULL,
  `Apellidos` varchar(25) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta` (
  `CodDetalleVenta` varchar(8) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `PrecioVenta` double DEFAULT NULL,
  `CodProducto` varchar(8) NOT NULL,
  `CodVentas` varchar(8) NOT NULL,
  PRIMARY KEY (`CodDetalleVenta`),
  KEY `fk_detalle_venta_producto1` (`CodProducto`),
  KEY `fk_detalle_venta_ventas1` (`CodVentas`),
  CONSTRAINT `fk_detalle_venta_producto1` FOREIGN KEY (`CodProducto`) REFERENCES `producto` (`CodProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_venta_ventas1` FOREIGN KEY (`CodVentas`) REFERENCES `ventas` (`CodVentas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_venta`
--

/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;


--
-- Definition of table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `CodEmpleado` varchar(8) NOT NULL,
  `Nombres` varchar(25) DEFAULT NULL,
  `Apellidos` varchar(25) DEFAULT NULL,
  `Documento` varchar(15) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CodEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;


--
-- Definition of table `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `CodMarca` varchar(3) NOT NULL,
  `NombreMarca` varchar(20) DEFAULT NULL,
  `CodProducto` varchar(8) NOT NULL,
  PRIMARY KEY (`CodMarca`),
  KEY `fk_marca_producto` (`CodProducto`),
  CONSTRAINT `fk_marca_producto` FOREIGN KEY (`CodProducto`) REFERENCES `producto` (`CodProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marca`
--

/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


--
-- Definition of table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `CodProducto` varchar(8) NOT NULL,
  `NombreProducto` varchar(30) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  PRIMARY KEY (`CodProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Definition of table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `CodVentas` varchar(8) NOT NULL,
  `FechaVenta` date DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `CodEmpleado` varchar(8) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  PRIMARY KEY (`CodVentas`),
  KEY `fk_ventas_empleado1` (`CodEmpleado`),
  KEY `fk_ventas_cliente1` (`Cedula`),
  CONSTRAINT `fk_ventas_empleado1` FOREIGN KEY (`CodEmpleado`) REFERENCES `empleado` (`CodEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_cliente1` FOREIGN KEY (`Cedula`) REFERENCES `cliente` (`Cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ventas`
--

/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;


--
-- Definition of procedure `consultarcliente`
--

DROP PROCEDURE IF EXISTS `consultarcliente`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarcliente`(in _Cedula varchar(15))
BEGIN
select * from cliente where Estado=0 and Cedula=_Cedula;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `consultarclienteingreso`
--

DROP PROCEDURE IF EXISTS `consultarclienteingreso`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarclienteingreso`(in _Cedula varchar(15))
BEGIN
select * from cliente where Cedula=_Cedula;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `eliminarcliente`
--

DROP PROCEDURE IF EXISTS `eliminarcliente`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarcliente`(in _Cedula varchar(15))
BEGIN
update cliente set Estado=1 where Cedula=_Cedula;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `insertarcliente`
--

DROP PROCEDURE IF EXISTS `insertarcliente`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarcliente`(in _Cedula varchar(15),in _Nombre  varchar(25),in _Apellidos varchar(25),in _Direccion  varchar(45),in _Telefono  varchar(10),in _Celular  varchar(15),in _Email  varchar(45))
BEGIN
insert into cliente values (_Cedula,_Nombre,_Apellidos,_Direccion,_Telefono,_Celular,_Email,0);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `listar_clientes`
--

DROP PROCEDURE IF EXISTS `listar_clientes`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_clientes`()
BEGIN
select * from cliente where Estado=0;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `modificarcliente`
--

DROP PROCEDURE IF EXISTS `modificarcliente`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarcliente`(in _Cedula varchar(15),in _Nombre  varchar(25),in _Apellidos varchar(25),in _Direccion  varchar(45),in _Telefono  varchar(10),in _Celular  varchar(15),in _Email  varchar(45))
BEGIN
update cliente set Nombres=_Nombre,Apellidos=_Apellidos,Direccion=_Direccion,Telefono=_Telefono,Celular=_Celular,Email=_Email where Cedula=_Cedula;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `validarusuario`
--

DROP PROCEDURE IF EXISTS `validarusuario`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validarusuario`(in _PKUsuario varchar(15), in _Password varchar(15))
BEGIN
select * from acceso where PKUsuario=_PKUsuario and Password=_Password;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
