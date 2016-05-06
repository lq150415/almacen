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
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FEC_ING` date NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ingresos_id_usu_foreign` (`ID_USU`),
  CONSTRAINT `ingresos_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (9,'2016-04-14',3,'2016-04-14 18:10:45','2016-04-14 18:10:45'),(10,'2016-04-14',3,'2016-04-14 19:57:43','2016-04-14 19:57:43'),(11,'2016-04-14',3,'2016-04-14 19:58:41','2016-04-14 19:58:41'),(12,'2016-04-14',3,'2016-04-14 20:00:23','2016-04-14 20:00:23'),(13,'2016-04-14',3,'2016-04-14 20:02:20','2016-04-14 20:02:20'),(14,'2016-04-14',3,'2016-04-14 20:03:43','2016-04-14 20:03:43'),(15,'2016-04-14',3,'2016-04-14 20:05:39','2016-04-14 20:05:39'),(16,'2016-04-14',3,'2016-04-14 20:06:44','2016-04-14 20:06:44'),(17,'2016-04-18',3,'2016-04-18 17:58:30','2016-04-18 17:58:30'),(18,'2016-04-19',3,'2016-04-19 19:14:47','2016-04-19 19:14:47'),(19,'2016-04-19',3,'2016-04-19 19:16:28','2016-04-19 19:16:28'),(20,'2016-04-19',3,'2016-04-19 19:31:27','2016-04-19 19:31:27'),(21,'2016-04-21',3,'2016-04-21 18:37:41','2016-04-21 18:37:41'),(22,'2016-04-22',3,'2016-04-22 17:50:21','2016-04-22 17:50:21'),(23,'2016-04-22',3,'2016-04-22 18:00:21','2016-04-22 18:00:21'),(24,'2016-04-22',3,'2016-04-22 18:01:09','2016-04-22 18:01:09'),(25,'2016-04-22',3,'2016-04-22 18:02:39','2016-04-22 18:02:39'),(26,'2016-04-22',3,'2016-04-22 18:03:29','2016-04-22 18:03:29'),(27,'2016-04-22',3,'2016-04-22 18:04:02','2016-04-22 18:04:02'),(28,'2016-04-22',3,'2016-04-22 18:05:13','2016-04-22 18:05:13'),(29,'2016-04-22',3,'2016-04-22 18:07:32','2016-04-22 18:07:32'),(30,'2016-04-22',3,'2016-04-22 18:19:31','2016-04-22 18:19:31'),(31,'2016-04-22',3,'2016-04-22 18:20:12','2016-04-22 18:20:12'),(32,'2016-04-27',3,'2016-04-27 15:09:51','2016-04-27 15:09:51'),(33,'2016-04-28',3,'2016-04-28 12:51:43','2016-04-28 12:51:43'),(34,'2016-04-28',3,'2016-04-28 15:50:22','2016-04-28 15:50:22'),(35,'2016-04-29',3,'2016-04-29 12:59:10','2016-04-29 12:59:10'),(36,'2016-05-03',3,'2016-05-03 14:27:01','2016-05-03 14:27:01'),(37,'2016-05-03',3,'2016-05-03 14:27:54','2016-05-03 14:27:54'),(38,'2016-05-03',3,'2016-05-03 14:32:16','2016-05-03 14:32:16'),(39,'2016-05-03',3,'2016-05-03 14:33:10','2016-05-03 14:33:10'),(40,'2016-05-03',3,'2016-05-03 14:33:50','2016-05-03 14:33:50'),(41,'2016-05-03',3,'2016-05-03 14:35:39','2016-05-03 14:35:39'),(42,'2016-05-03',3,'2016-05-03 14:36:24','2016-05-03 14:36:24'),(43,'2016-05-03',3,'2016-05-03 14:41:56','2016-05-03 14:41:56'),(44,'2016-05-03',3,'2016-05-03 14:42:30','2016-05-03 14:42:30'),(45,'2016-05-03',3,'2016-05-03 14:44:07','2016-05-03 14:44:07'),(46,'2016-05-03',3,'2016-05-03 14:47:05','2016-05-03 14:47:05'),(47,'2016-05-03',3,'2016-05-03 14:47:21','2016-05-03 14:47:21'),(48,'2016-05-03',3,'2016-05-03 14:50:49','2016-05-03 14:50:49'),(49,'2016-05-03',3,'2016-05-03 14:50:57','2016-05-03 14:50:57'),(50,'2016-05-03',3,'2016-05-03 14:51:01','2016-05-03 14:51:01'),(51,'2016-05-03',3,'2016-05-03 14:51:10','2016-05-03 14:51:10'),(52,'2016-05-03',3,'2016-05-03 14:51:32','2016-05-03 14:51:32'),(53,'2016-05-03',3,'2016-05-03 14:52:12','2016-05-03 14:52:12'),(54,'2016-05-03',3,'2016-05-03 14:54:37','2016-05-03 14:54:37');
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
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