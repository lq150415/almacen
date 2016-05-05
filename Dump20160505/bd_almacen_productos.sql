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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ITM_PRO` int(11) NOT NULL,
  `DES_PRO` text COLLATE utf8_unicode_ci NOT NULL,
  `PUN_PRO` double(8,2) NOT NULL,
  `CAN_PRO` int(11) NOT NULL,
  `ID_RUB` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `productos_id_rub_foreign` (`ID_RUB`),
  CONSTRAINT `productos_id_rub_foreign` FOREIGN KEY (`ID_RUB`) REFERENCES `rubros` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (22,2265,'Papel para fax; Ancho 216 MM x 30 M; Longitud rollo 30 m',16.00,559,1,'2016-04-14 17:50:54','2016-05-03 14:52:12'),(23,3741,'Clips para papeles; Material metal; Numero 8; Presentacion caja de 100',1.30,48,1,'2016-04-14 17:52:03','2016-05-03 14:52:12'),(24,3779,'Tubo de minas; Diametro 0.5mm; Numero HB',0.90,70,1,'2016-04-14 17:58:04','2016-04-22 18:20:12'),(25,1162,'Candado; Material arco acero-niquel; Material caja Bronce; Medida caja',50.00,15,41,'2016-04-14 18:00:14','2016-04-28 15:50:22'),(26,3660,'Interruptor Termomagnetico; 2 Amp; Tipo bipolar',40.00,14,41,'2016-04-14 18:01:44','2016-05-03 14:54:37'),(27,3659,'Interruptor Termomagnetico; 2 Amp; Tipo Tripolar ',45.00,39,41,'2016-04-14 18:04:13','2016-04-27 15:09:52'),(28,2527,'Limpiavidrios; Capacidad 500cm3, Envase Atomizador a gatillo',22.00,8,42,'2016-04-14 18:06:09','2016-04-14 18:06:09'),(29,2544,'Lustramuebles; Contenido 500cm3; Envase Dispensador de crema',30.00,23,42,'2016-04-14 18:06:48','2016-04-14 18:06:48'),(31,4846,'FASTENERS; CAPACIDAD MAX, HOJAS 500 DE 80 GRS. NUMERO 2L, PRESENTACION 50 POR CAJA',7.14,21,1,'2016-04-18 17:18:05','2016-04-22 18:07:32'),(32,4818,'ESCOBA; MATERIAL PVC; NRO DE HILERAS 6; TIPO REFORZADA',24.40,-17,51,'2016-04-18 17:42:56','2016-04-29 13:01:49'),(33,4662,'FRANELA PARA LIMPIEZA; PRESENTACION POR PIEZA; MEDIDAS 0.5 X 0.5 MTS.',4.47,14,51,'2016-04-18 17:45:26','2016-04-18 17:45:26'),(34,12196,'Cuaderno con espiral; Tapa de carton',9.00,102,1,'2016-04-22 17:29:44','2016-05-03 14:54:37'),(35,12290,'Sobre manila; Tamaño Oficio; Formato color cafe 90 grs',0.37,213,1,'2016-04-22 17:33:04','2016-05-03 14:54:37'),(36,9988,'agendas 2016',50.00,79,52,'2016-04-28 16:15:28','2016-05-03 14:51:32'),(37,9997,'Boligrafos azules',1.00,90,52,'2016-04-28 16:20:23','2016-05-03 14:51:32'),(38,23531,'Engrapadora, capacidad 200 a 400 Hojas tipo semi industrial, tamaño grapas 23/10 -23/13 - 23/17 -23/20 - 23/24',290.00,0,1,'2016-05-04 14:12:31','2016-05-04 14:12:31'),(39,123,'franela verde',20.00,0,51,'2016-05-04 14:13:54','2016-05-04 14:13:54'),(40,12393,'franela roja',12.00,0,42,'2016-05-04 14:15:55','2016-05-04 14:15:55'),(41,12394,'franela amarilla',11.00,0,42,'2016-05-04 14:16:12','2016-05-04 14:16:12'),(42,2242,'Sobre de papel blanco, 100 grs, tamaño oficio, tipo de papel bond ',12.00,0,1,'2016-05-04 14:18:41','2016-05-04 14:18:41');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
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
