-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bd_almacen
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `salidaproductos`
--

DROP TABLE IF EXISTS `salidaproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidaproductos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DGA_SPR` varchar(100) NOT NULL,
  `DES_SPR` varchar(100) NOT NULL,
  `CAN_SPR` int(10) NOT NULL,
  `ID_PRO` int(10) unsigned NOT NULL,
  `ID_SAL` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pro_idx` (`ID_PRO`),
  KEY `id_sal_idx` (`ID_SAL`),
  CONSTRAINT `id_pro` FOREIGN KEY (`ID_PRO`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_sal` FOREIGN KEY (`ID_SAL`) REFERENCES `salidas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidaproductos`
--

LOCK TABLES `salidaproductos` WRITE;
/*!40000 ALTER TABLE `salidaproductos` DISABLE KEYS */;
INSERT INTO `salidaproductos` VALUES (1,'63643881','PROCURADORIA',1,34,1,'2016-04-27 14:05:01','2016-04-27 14:05:01'),(2,'43244632','LA PAZ',7,35,2,'2016-04-27 14:11:28','2016-04-27 14:11:28'),(3,'54543254','PROCURADORIA',5,35,3,'2016-04-28 12:53:09','2016-04-28 12:53:09'),(4,'12345','PROCURADORIA',10,32,4,'2016-04-28 16:25:04','2016-04-28 16:25:04'),(5,'12345','PROCURADORIA',10,36,4,'2016-04-28 16:25:04','2016-04-28 16:25:04'),(6,'12345','PROCURADORIA',10,36,4,'2016-04-28 16:25:05','2016-04-28 16:25:05'),(8,'342524','rew',10,36,6,'2016-04-29 13:01:49','2016-04-29 13:01:49'),(9,'112343','rew',12,32,6,'2016-04-29 13:01:49','2016-04-29 13:01:49');
/*!40000 ALTER TABLE `salidaproductos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-05 10:26:04
