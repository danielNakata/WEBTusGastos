/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.1.32-MariaDB : Database - controlgastos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`controlgastos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `controlgastos`;

/*Table structure for table `tcatestatusingreso` */

DROP TABLE IF EXISTS `tcatestatusingreso`;

CREATE TABLE `tcatestatusingreso` (
  `idestatusingreso` int(11) NOT NULL,
  `estatusingreso` varchar(50) NOT NULL DEFAULT '-',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idestatusingreso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatestatusingreso` */

insert  into `tcatestatusingreso`(`idestatusingreso`,`estatusingreso`,`fechareg`,`fechamod`) values (1,'ACTIVO','2018-07-23 21:48:23','2018-07-23 21:48:23'),(9,'CANCELADO','2018-07-23 21:48:37','2018-07-23 21:48:37');

/*Table structure for table `tcatestatuspago` */

DROP TABLE IF EXISTS `tcatestatuspago`;

CREATE TABLE `tcatestatuspago` (
  `idestatuspago` int(11) NOT NULL,
  `estatuspago` varchar(50) DEFAULT '-',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idestatuspago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatestatuspago` */

insert  into `tcatestatuspago`(`idestatuspago`,`estatuspago`,`fechareg`,`fechamod`) values (1,'ACTIVO','2018-07-23 21:49:00','0000-00-00 00:00:00'),(9,'CANCELADO','2018-07-23 21:49:09','0000-00-00 00:00:00');

/*Table structure for table `tcatestatususuarios` */

DROP TABLE IF EXISTS `tcatestatususuarios`;

CREATE TABLE `tcatestatususuarios` (
  `idestatususuario` int(11) NOT NULL,
  `estatususuario` varchar(50) NOT NULL DEFAULT '-',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idestatususuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcatestatususuarios` */

insert  into `tcatestatususuarios`(`idestatususuario`,`estatususuario`,`fechareg`,`fechamod`) values (1,'ACTIVO','2018-07-23 21:49:22','0000-00-00 00:00:00'),(9,'INACTIVO','2018-07-23 21:49:26','0000-00-00 00:00:00');

/*Table structure for table `tcattipoingreso` */

DROP TABLE IF EXISTS `tcattipoingreso`;

CREATE TABLE `tcattipoingreso` (
  `idtipoingreso` int(11) NOT NULL,
  `tipoingreso` varchar(50) NOT NULL DEFAULT '-',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idtipoingreso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcattipoingreso` */

insert  into `tcattipoingreso`(`idtipoingreso`,`tipoingreso`,`fechareg`,`fechamod`) values (1,'SUELDO','2018-07-23 21:49:37','0000-00-00 00:00:00'),(2,'VENTA','2018-07-23 21:49:41','0000-00-00 00:00:00'),(99,'OTRO','2018-07-26 22:34:45','0000-00-00 00:00:00');

/*Table structure for table `tcattipopagos` */

DROP TABLE IF EXISTS `tcattipopagos`;

CREATE TABLE `tcattipopagos` (
  `idtipopago` int(11) NOT NULL,
  `tipopago` varchar(50) NOT NULL DEFAULT '-',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tcattipopagos` */

insert  into `tcattipopagos`(`idtipopago`,`tipopago`,`fechareg`,`fechamod`) values (1,'INVERSION','2018-07-23 21:50:02','0000-00-00 00:00:00'),(2,'DESPENSA','2018-07-23 21:50:08','0000-00-00 00:00:00'),(3,'VIAJE','2018-07-23 21:50:12','0000-00-00 00:00:00'),(4,'ROPA','2018-07-23 21:50:18','0000-00-00 00:00:00'),(5,'CALZADO','2018-07-23 21:50:21','0000-00-00 00:00:00'),(6,'CUIDADO CABELLO','2018-07-23 21:50:30','0000-00-00 00:00:00'),(99,'OTRO','2018-07-23 21:50:37','0000-00-00 00:00:00');

/*Table structure for table `tgastos` */

DROP TABLE IF EXISTS `tgastos`;

CREATE TABLE `tgastos` (
  `idgasto` int(11) NOT NULL,
  `idusuario` int(1) NOT NULL,
  `concepto` varchar(255) NOT NULL DEFAULT '-',
  `idtipogasto` int(11) NOT NULL DEFAULT '1',
  `monto` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `iva` decimal(16,4) DEFAULT '0.0000',
  `otroimp` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `idestatus` int(11) NOT NULL DEFAULT '1',
  `comentarios` text,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idgasto`,`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tgastos` */

insert  into `tgastos`(`idgasto`,`idusuario`,`concepto`,`idtipogasto`,`monto`,`iva`,`otroimp`,`total`,`idestatus`,`comentarios`,`fechareg`,`fechamod`) values (1,1,'nuevo%20gasto',4,'50.0000','0.0000','0.0000','50.0000',1,'-','2018-07-26 23:55:08','0000-00-00 00:00:00'),(2,1,'sdfsdffsd',99,'500.0000','50.0000','0.0000','550.0000',1,'-','2018-07-26 23:56:44','0000-00-00 00:00:00');

/*Table structure for table `tingresos` */

DROP TABLE IF EXISTS `tingresos`;

CREATE TABLE `tingresos` (
  `idingreso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL DEFAULT '-',
  `monto` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `iva` decimal(16,4) DEFAULT '0.0000',
  `otroimp` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `idtipo` int(11) NOT NULL DEFAULT '1',
  `idestatus` int(11) NOT NULL DEFAULT '1',
  `comentarios` text,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idingreso`,`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tingresos` */

insert  into `tingresos`(`idingreso`,`idusuario`,`concepto`,`monto`,`iva`,`otroimp`,`total`,`idtipo`,`idestatus`,`comentarios`,`fechareg`,`fechamod`) values (1,1,'sueldo%20julio','5000.0000','0.0000','0.0000','5000.0000',2,1,'-','2018-07-26 23:41:36','0000-00-00 00:00:00');

/*Table structure for table `tusuarios` */

DROP TABLE IF EXISTS `tusuarios`;

CREATE TABLE `tusuarios` (
  `idusuario` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '-',
  `apellidos` varchar(11) DEFAULT '-',
  `idestatus` int(11) NOT NULL DEFAULT '1',
  `telefono` varchar(25) DEFAULT '5555555555',
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `ix_tusuarios_01` (`email`),
  KEY `ix_tusuarios_02` (`email`,`contrasena`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tusuarios` */

insert  into `tusuarios`(`idusuario`,`email`,`contrasena`,`nombre`,`apellidos`,`idestatus`,`telefono`,`fechareg`,`fechamod`) values (1,'danielnakata@gmail.com','*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9','daniel','ortega',1,'5545667972','2018-07-22 23:43:45','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
