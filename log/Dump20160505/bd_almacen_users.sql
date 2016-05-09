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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APA_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AMA_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ARE_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CAR_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CI_USU` int(11) NOT NULL,
  `NIV_USU` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NIC_USU` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Luis','Quisbert','Quispe','TI','Pasante',7074342,0,'$2y$10$8pzeern5CknQGOR9wPHZvO1UVSFFkTcMgle3CRMQYteTPA69ty8Vm','h9aVPkM2Ub8WuzCGX6j0GTElOpzpE41ee31DNO9jA9BNAxpxhTuUMiDW5ndD','2016-03-17 18:13:01','2016-04-28 16:13:16','7074342'),(4,'Felipe','Quisbert','Quispe','TI','Pasante',9959333,2,'$2y$10$lGgcabWCujsYIxp0YekLj.O4Pi4ZayorggOySDfYYNIdPtMWXh1/6','SjxmYX9MjwZfVv9Jeh0Ku7mz4pSPprk5DICf2dY4pZR8zQH7ikqPNIALHGuS','2016-03-17 18:13:01','2016-05-04 15:19:46','9959333'),(7,'Fernando','Alvarez','Fernandez','Recursos Humanos','Otros1',123456,2,'$2y$10$cGeHEIUZN/8OgX2oPsPGSus1SKrZfa8YXHxAyPmIOYbBVkxMIh1IK','bE5qB4yNNsHEowD1D8ZzrTmS0yvsyoNvH6yzREYUbVXqfMFL8STsXzTnMPEr','2016-03-17 20:23:08','2016-04-11 19:45:18','123456'),(8,'Alberto','velasco','rocha','Recursos Humanos','Director',60522919,2,'$2y$10$lEG0ZakAsfE9OPJtzp/QTOrwhDzB37iJkKJkJihcaCz4BFnYZ9/bG','QiBSkdWUtl6WKmvNquX827aQejBzx3pvyFThRDmTf9VI8a65feQpHrxkuWLf','2016-03-22 16:42:04','2016-04-14 20:08:28','60522919'),(9,'luis','quisbert','Quispe','Recursos Humanos','Director',1234567,2,'$2y$10$yNYKazyV8Qpn2QDCpgH99eb7uC9nJN2f0TIJc27oNKYKeBlyqY//e',NULL,'2016-03-22 18:59:37','2016-03-22 18:59:37','1234567'),(10,'Josue','Roca','Velasco','Recursos Humanos','Director',1234567,1,'$2y$10$tHk5zKgBsGQPAUYiGqjZx.azMECxZjCD2LCIPKo7TQRMTBKVMBJlm','whYXW61QpL1485NbcAS0czEylspyTO3eqs1ZdFilSiws5KH42hrfqoG3fWeN','2016-04-11 19:47:59','2016-04-28 16:13:19','12345678'),(11,'Pedro','Callejas','Monter','Tecnologias de Informacion','Director',2441193,1,'$2y$10$N1C/URtyldQ3bnGqcEAZMelL277mSoixDB/Q/.I6fPVdSPEfhaQDm',NULL,'2016-04-18 19:08:31','2016-04-18 19:08:31','2441193'),(12,'Jose','Aguilar','Alvarez','Recursos Humanos','Director',1234565,2,'$2y$10$pyiGLL3HTmI.5TAPg94IA.oiFYPyN63dPVd1aLYbXOGD3.nOMkyhC',NULL,'2016-04-18 19:23:11','2016-04-18 19:23:11','1234565'),(16,'Fernando','Albarracin','Quinteros','Tecnologias de Informacion','Otros1',999999,2,'$2y$10$isiFOoNH2XGyGCmzEIyVLOxFu64v4FoJdsYpTLpV.97lsqGQT/k4O',NULL,'2016-04-18 20:22:56','2016-04-18 20:22:56','9999999'),(17,'Roberto','Aguilar','Campos','Recursos Humanos','Otros1',78789898,1,'$2y$10$lEDYj44tZiNxo.vGfO5wd.TW0fSGzVOAVzQJQapERakTuWCAAtqw2',NULL,'2016-04-25 14:52:26','2016-04-25 14:52:26','78789898');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-05 10:26:03
