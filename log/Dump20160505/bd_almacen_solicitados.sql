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
-- Table structure for table `solicitados`
--

DROP TABLE IF EXISTS `solicitados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CAN_SOL` int(11) NOT NULL,
  `ID_PRO` int(10) unsigned NOT NULL,
  `ID_SOL` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `solicitados_id_pro_foreign` (`ID_PRO`),
  KEY `solicitados_id_sol_foreign` (`ID_SOL`),
  CONSTRAINT `solicitados_id_pro_foreign` FOREIGN KEY (`ID_PRO`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `solicitados_id_sol_foreign` FOREIGN KEY (`ID_SOL`) REFERENCES `solicitudes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitados`
--

LOCK TABLES `solicitados` WRITE;
/*!40000 ALTER TABLE `solicitados` DISABLE KEYS */;
INSERT INTO `solicitados` VALUES (1,3,26,89,'2016-04-14 18:07:20','2016-04-14 18:07:20'),(2,3,26,90,'2016-04-14 18:39:04','2016-04-14 18:39:04'),(3,3,26,91,'2016-04-14 18:49:02','2016-04-14 18:49:02'),(4,1,26,92,'2016-04-14 18:50:27','2016-04-28 15:27:36'),(5,5,26,93,'2016-04-14 18:51:57','2016-04-28 15:30:27'),(6,3,26,94,'2016-04-14 18:52:14','2016-04-14 18:52:14'),(7,3,26,95,'2016-04-14 18:52:21','2016-04-14 18:52:21'),(8,5,22,96,'2016-04-14 18:52:31','2016-04-14 18:52:31'),(9,3,23,97,'2016-04-14 18:53:33','2016-04-14 18:53:33'),(10,4,24,98,'2016-04-14 18:54:03','2016-04-14 18:54:03'),(11,5,23,99,'2016-04-14 19:02:13','2016-04-14 19:02:13'),(12,2,26,100,'2016-04-14 19:04:45','2016-04-28 15:28:05'),(13,4,29,101,'2016-04-14 19:04:55','2016-04-14 19:04:55'),(14,9,27,102,'2016-04-14 19:05:26','2016-04-14 19:05:26'),(15,4,27,103,'2016-04-14 19:07:12','2016-04-14 19:07:12'),(16,1,24,104,'2016-04-14 20:01:21','2016-04-28 15:43:51'),(17,15,29,105,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(18,9,24,105,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(19,1,25,105,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(20,2,35,106,'2016-04-25 14:57:04','2016-04-25 14:57:04'),(21,3,31,107,'2016-04-25 14:58:37','2016-04-25 14:58:37'),(22,5,29,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(23,4,26,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(24,5,28,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(25,3,25,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(26,5,29,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(27,1,23,109,'2016-04-25 15:47:37','2016-05-03 12:49:15'),(28,1,25,109,'2016-04-25 15:47:37','2016-05-03 12:49:15'),(29,4,22,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(30,2,34,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(31,1,31,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(32,3,35,111,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(33,1,28,111,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(34,4,22,111,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(35,10,23,112,'2016-04-28 13:30:24','2016-04-28 13:30:24'),(36,7,22,112,'2016-04-28 13:30:24','2016-04-28 13:30:24'),(37,1,22,113,'2016-04-28 14:12:25','2016-04-28 15:31:01'),(38,5,34,113,'2016-04-28 14:12:25','2016-04-28 15:31:01'),(39,10,22,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(40,2,34,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(41,1,28,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(42,5,31,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(43,1,25,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(44,1,29,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(45,1,35,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(46,4,34,116,'2016-04-28 15:41:48','2016-04-28 15:41:48'),(47,100,23,117,'2016-04-28 15:42:06','2016-04-28 15:42:06'),(48,1,27,118,'2016-04-28 15:42:22','2016-04-28 15:42:22'),(49,10,34,119,'2016-04-28 16:27:28','2016-04-28 16:28:46'),(50,1,34,120,'2016-04-29 13:00:41','2016-04-29 13:00:54'),(51,1,29,121,'2016-04-29 13:09:48','2016-04-29 15:04:12'),(52,7,22,122,'2016-04-29 15:39:04','2016-04-29 15:39:49'),(53,2,31,122,'2016-04-29 15:39:04','2016-04-29 15:39:49'),(54,1,26,123,'2016-04-29 16:12:27','2016-04-29 16:12:39'),(55,1,26,124,'2016-04-29 16:37:21','2016-05-04 15:05:05'),(56,0,40,125,'2016-05-04 15:06:09','2016-05-04 15:07:02'),(57,1,31,125,'2016-05-04 15:06:09','2016-05-04 15:07:02'),(58,1,38,126,'2016-05-04 15:12:15','2016-05-04 15:12:15'),(59,0,40,127,'2016-05-04 15:13:02','2016-05-04 15:13:14'),(60,5,23,128,'2016-05-04 15:27:40','2016-05-04 15:27:40'),(61,1,23,129,'2016-05-04 15:27:41','2016-05-04 15:57:42'),(62,1,38,130,'2016-05-04 16:16:47','2016-05-04 16:16:47');
/*!40000 ALTER TABLE `solicitados` ENABLE KEYS */;
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
