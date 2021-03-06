-- MySQL dump 10.16  Distrib 10.1.9-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: bd_almacen
-- ------------------------------------------------------
-- Server version	10.1.9-MariaDB

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
-- Table structure for table `almacenes`
--

DROP TABLE IF EXISTS `almacenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_ALM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UBI_ALM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacenes`
--

LOCK TABLES `almacenes` WRITE;
/*!40000 ALTER TABLE `almacenes` DISABLE KEYS */;
INSERT INTO `almacenes` VALUES (1,'Almacen principal','Procuradoria - El Alto','2016-04-14 13:42:00','2016-04-14 13:42:00'),(5,'almacen de prueba','Procuradoria General del Estado','2016-04-15 19:11:00','2016-04-15 19:11:00'),(6,'almacen nuevo','Procuradoria General del Estado','2016-04-28 16:14:10','2016-04-28 16:14:10');
/*!40000 ALTER TABLE `almacenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresados`
--

DROP TABLE IF EXISTS `ingresados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NFC_PIN` int(11) NOT NULL,
  `NOC_PIN` int(11) NOT NULL,
  `CAN_PIN` int(11) NOT NULL,
  `PRO_PIN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_PRO` int(10) unsigned NOT NULL,
  `ID_ING` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ingresados_id_ing_foreign` (`ID_ING`),
  KEY `ingresados_id_pro_foreign` (`ID_PRO`),
  CONSTRAINT `ingresados_id_ing_foreign` FOREIGN KEY (`ID_ING`) REFERENCES `ingresos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ingresados_id_pro_foreign` FOREIGN KEY (`ID_PRO`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresados`
--

LOCK TABLES `ingresados` WRITE;
/*!40000 ALTER TABLE `ingresados` DISABLE KEYS */;
INSERT INTO `ingresados` VALUES (1,674637117,2,1,'La paz',24,9,'2016-04-14 18:10:45','2016-04-14 18:10:45'),(2,674637118,1,12,'La paz',23,9,'2016-04-14 18:10:45','2016-04-14 18:10:45'),(3,1234545325,4335432,12,'BENI',24,10,'2016-04-14 19:57:43','2016-04-14 19:57:43'),(4,2313,432432,43243,'43432',28,11,'2016-04-14 19:58:41','2016-04-14 19:58:41'),(5,0,0,0,'rewrwe',26,12,'2016-04-14 20:00:23','2016-04-14 20:00:23'),(6,543,54353,54,'la paz',23,13,'2016-04-14 20:02:21','2016-04-14 20:02:21'),(8,1234,1234,12,'LA PAZ',24,14,'2016-04-14 20:03:43','2016-04-14 20:03:43'),(9,321,321,321,'321',22,15,'2016-04-14 20:05:40','2016-04-14 20:05:40'),(10,123456,123,12,'aaa',24,16,'2016-04-14 20:06:44','2016-04-14 20:06:44'),(11,0,0,0,'fdsfds',32,17,'2016-04-18 17:58:30','2016-04-18 17:58:30'),(12,0,0,0,'fdsfds',23,17,'2016-04-18 17:58:30','2016-04-18 17:58:30'),(14,123456,1,12,'LA PAZ',34,23,'2016-04-22 18:00:21','2016-04-22 18:00:21'),(15,123456,1,12,'LA PAZ',34,24,'2016-04-22 18:01:09','2016-04-22 18:01:09'),(16,123456,1,12,'LA PAZ',34,25,'2016-04-22 18:02:39','2016-04-22 18:02:39'),(17,123456,1,12,'LA PAZ',34,26,'2016-04-22 18:03:29','2016-04-22 18:03:29'),(18,123456,1,12,'LA PAZ',34,27,'2016-04-22 18:04:02','2016-04-22 18:04:02'),(19,1233543,3,12,'LA PAZ',34,28,'2016-04-22 18:05:13','2016-04-22 18:05:13'),(20,989377389,23,15,'LA PAZ',34,29,'2016-04-22 18:07:32','2016-04-22 18:07:32'),(21,123454325,23432532,10,'LA PAZ',35,29,'2016-04-22 18:07:32','2016-04-22 18:07:32'),(22,989377389,23,10,'LA PAZ',31,29,'2016-04-22 18:07:32','2016-04-22 18:07:32'),(23,12334543,54325,13,'BENi',27,30,'2016-04-22 18:19:32','2016-04-22 18:19:32'),(24,4321432,432143,15,'LA PAZ',24,31,'2016-04-22 18:20:12','2016-04-22 18:20:12'),(25,54325424,5432543,16,'LA PAZ',27,32,'2016-04-27 15:09:51','2016-04-27 15:09:51'),(26,54325423,5432543,10,'LA PAZ',25,32,'2016-04-27 15:09:52','2016-04-27 15:09:52'),(27,1237282,438439,15,'LA PAZ',35,33,'2016-04-28 12:51:43','2016-04-28 12:51:43'),(28,4321432,4324321,4,'LA PAZ',25,34,'2016-04-28 15:50:22','2016-04-28 15:50:22'),(29,1,3637,90,'Array',37,44,'2016-05-03 14:42:30','2016-05-03 14:42:30'),(30,1,3637,90,'LA PAZ',37,52,'2016-05-03 14:51:32','2016-05-03 14:51:32'),(31,1,3637,9,'LA PAZ',36,52,'2016-05-03 14:51:32','2016-05-03 14:51:32'),(32,1,12,5,'321',23,53,'2016-05-03 14:52:12','2016-05-03 14:52:12'),(33,1,12,3,'321',22,53,'2016-05-03 14:52:12','2016-05-03 14:52:12'),(34,2,34,200,'PROCEDENCIA',35,54,'2016-05-03 14:54:37','2016-05-03 14:54:37'),(35,2,34,64,'PROCEDENCIA',34,54,'2016-05-03 14:54:37','2016-05-03 14:54:37'),(36,2,34,4,'PROCEDENCIA',26,54,'2016-05-03 14:54:37','2016-05-03 14:54:37'),(37,636648729,45949859,92,'',36,55,'2016-05-09 13:44:23','2016-05-09 13:44:23'),(38,636648729,45949859,15,'',37,55,'2016-05-09 13:44:23','2016-05-09 13:44:23'),(39,4243214,143214321,1,'trewtrew',26,56,'2016-05-09 13:45:49','2016-05-09 13:45:49'),(40,544235432,54325432,14,'',45,57,'2016-05-09 13:47:49','2016-05-09 13:47:49'),(41,544235432,54325432,12,'',36,57,'2016-05-09 13:47:49','2016-05-09 13:47:49'),(42,321321,4325432,234,'Array',37,58,'2016-05-09 13:49:15','2016-05-09 13:49:15'),(43,4535432,54325432,12,NULL,45,59,'2016-05-09 13:50:50','2016-05-09 13:50:50'),(44,543543,54354325,12,NULL,28,60,'2016-05-09 13:51:35','2016-05-09 13:51:35'),(45,54325432,54325432,23,NULL,36,61,'2016-05-09 13:54:53','2016-05-09 13:54:53'),(46,435435,6546543,12,'LA PAZ',40,62,'2016-05-09 13:55:34','2016-05-09 13:55:34'),(47,54325432,54325432,13,'LA PAZ',39,63,'2016-05-09 13:55:59','2016-05-09 13:55:59'),(48,54325432,54325432,12,'LA PAZ',33,63,'2016-05-09 13:55:59','2016-05-09 13:55:59');
/*!40000 ALTER TABLE `ingresados` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (9,'2016-04-14',3,'2016-04-14 18:10:45','2016-04-14 18:10:45'),(10,'2016-04-14',3,'2016-04-14 19:57:43','2016-04-14 19:57:43'),(11,'2016-04-14',3,'2016-04-14 19:58:41','2016-04-14 19:58:41'),(12,'2016-04-14',3,'2016-04-14 20:00:23','2016-04-14 20:00:23'),(13,'2016-04-14',3,'2016-04-14 20:02:20','2016-04-14 20:02:20'),(14,'2016-04-14',3,'2016-04-14 20:03:43','2016-04-14 20:03:43'),(15,'2016-04-14',3,'2016-04-14 20:05:39','2016-04-14 20:05:39'),(16,'2016-04-14',3,'2016-04-14 20:06:44','2016-04-14 20:06:44'),(17,'2016-04-18',3,'2016-04-18 17:58:30','2016-04-18 17:58:30'),(18,'2016-04-19',3,'2016-04-19 19:14:47','2016-04-19 19:14:47'),(19,'2016-04-19',3,'2016-04-19 19:16:28','2016-04-19 19:16:28'),(20,'2016-04-19',3,'2016-04-19 19:31:27','2016-04-19 19:31:27'),(21,'2016-04-21',3,'2016-04-21 18:37:41','2016-04-21 18:37:41'),(22,'2016-04-22',3,'2016-04-22 17:50:21','2016-04-22 17:50:21'),(23,'2016-04-22',3,'2016-04-22 18:00:21','2016-04-22 18:00:21'),(24,'2016-04-22',3,'2016-04-22 18:01:09','2016-04-22 18:01:09'),(25,'2016-04-22',3,'2016-04-22 18:02:39','2016-04-22 18:02:39'),(26,'2016-04-22',3,'2016-04-22 18:03:29','2016-04-22 18:03:29'),(27,'2016-04-22',3,'2016-04-22 18:04:02','2016-04-22 18:04:02'),(28,'2016-04-22',3,'2016-04-22 18:05:13','2016-04-22 18:05:13'),(29,'2016-04-22',3,'2016-04-22 18:07:32','2016-04-22 18:07:32'),(30,'2016-04-22',3,'2016-04-22 18:19:31','2016-04-22 18:19:31'),(31,'2016-04-22',3,'2016-04-22 18:20:12','2016-04-22 18:20:12'),(32,'2016-04-27',3,'2016-04-27 15:09:51','2016-04-27 15:09:51'),(33,'2016-04-28',3,'2016-04-28 12:51:43','2016-04-28 12:51:43'),(34,'2016-04-28',3,'2016-04-28 15:50:22','2016-04-28 15:50:22'),(35,'2016-04-29',3,'2016-04-29 12:59:10','2016-04-29 12:59:10'),(36,'2016-05-03',3,'2016-05-03 14:27:01','2016-05-03 14:27:01'),(37,'2016-05-03',3,'2016-05-03 14:27:54','2016-05-03 14:27:54'),(38,'2016-05-03',3,'2016-05-03 14:32:16','2016-05-03 14:32:16'),(39,'2016-05-03',3,'2016-05-03 14:33:10','2016-05-03 14:33:10'),(40,'2016-05-03',3,'2016-05-03 14:33:50','2016-05-03 14:33:50'),(41,'2016-05-03',3,'2016-05-03 14:35:39','2016-05-03 14:35:39'),(42,'2016-05-03',3,'2016-05-03 14:36:24','2016-05-03 14:36:24'),(43,'2016-05-03',3,'2016-05-03 14:41:56','2016-05-03 14:41:56'),(44,'2016-05-03',3,'2016-05-03 14:42:30','2016-05-03 14:42:30'),(45,'2016-05-03',3,'2016-05-03 14:44:07','2016-05-03 14:44:07'),(46,'2016-05-03',3,'2016-05-03 14:47:05','2016-05-03 14:47:05'),(47,'2016-05-03',3,'2016-05-03 14:47:21','2016-05-03 14:47:21'),(48,'2016-05-03',3,'2016-05-03 14:50:49','2016-05-03 14:50:49'),(49,'2016-05-03',3,'2016-05-03 14:50:57','2016-05-03 14:50:57'),(50,'2016-05-03',3,'2016-05-03 14:51:01','2016-05-03 14:51:01'),(51,'2016-05-03',3,'2016-05-03 14:51:10','2016-05-03 14:51:10'),(52,'2016-05-03',3,'2016-05-03 14:51:32','2016-05-03 14:51:32'),(53,'2016-05-03',3,'2016-05-03 14:52:12','2016-05-03 14:52:12'),(54,'2016-05-03',3,'2016-05-03 14:54:37','2016-05-03 14:54:37'),(55,'2016-05-09',3,'2016-05-09 13:44:23','2016-05-09 13:44:23'),(56,'2016-05-09',3,'2016-05-09 13:45:49','2016-05-09 13:45:49'),(57,'2016-05-09',3,'2016-05-09 13:47:49','2016-05-09 13:47:49'),(58,'2016-05-09',3,'2016-05-09 13:49:15','2016-05-09 13:49:15'),(59,'2016-05-09',3,'2016-05-09 13:50:50','2016-05-09 13:50:50'),(60,'2016-05-09',3,'2016-05-09 13:51:35','2016-05-09 13:51:35'),(61,'2016-05-09',3,'2016-05-09 13:54:53','2016-05-09 13:54:53'),(62,'2016-05-09',3,'2016-05-09 13:55:34','2016-05-09 13:55:34'),(63,'2016-05-09',3,'2016-05-09 13:55:59','2016-05-09 13:55:59');
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_16_141415_tablas',1),('2016_03_17_140824_alter_tabla',2),('2016_03_22_132739_create_productos_ingresados',3),('2016_03_31_133350_crea_productosing',3),('2016_04_07_154320_tabla_notificacion',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DES_NOT` int(11) NOT NULL,
  `AUT_NOT` int(11) NOT NULL,
  `TIP_NOT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `REA_NOT` int(11) NOT NULL,
  `ALE_NOT` int(11) DEFAULT NULL,
  `ID_PSO` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notificaciones_id_pso_foreign` (`ID_PSO`),
  CONSTRAINT `notificaciones_id_pso_foreign` FOREIGN KEY (`ID_PSO`) REFERENCES `solicitudes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` VALUES (1,0,4,'Solicitud',1,1,89,'2016-04-14 18:07:20','2016-04-14 18:07:29'),(2,0,4,'Solicitud',1,1,90,'2016-04-14 18:39:04','2016-04-14 18:39:09'),(3,0,4,'Solicitud',1,0,91,'2016-04-14 18:49:02','2016-04-14 18:49:02'),(4,1,4,'Solicitud',2,1,92,'2016-04-14 18:50:26','2016-04-28 15:27:38'),(5,1,4,'Solicitud',2,1,93,'2016-04-14 18:51:57','2016-04-28 15:30:27'),(6,1,4,'Solicitud',2,1,94,'2016-04-14 18:52:13','2016-04-28 14:43:38'),(7,1,4,'Solicitud',2,1,95,'2016-04-14 18:52:21','2016-04-28 14:44:29'),(8,1,4,'Solicitud',2,1,96,'2016-04-14 18:52:31','2016-04-28 15:17:43'),(9,1,4,'Solicitud',2,1,97,'2016-04-14 18:53:33','2016-04-28 14:44:03'),(10,1,4,'Solicitud',2,1,98,'2016-04-14 18:54:03','2016-04-28 15:18:55'),(11,1,4,'Solicitud',2,1,99,'2016-04-14 19:02:13','2016-04-28 15:19:53'),(12,1,4,'Solicitud',2,1,100,'2016-04-14 19:04:45','2016-04-28 15:28:05'),(13,1,4,'Solicitud',2,1,101,'2016-04-14 19:04:55','2016-04-28 15:22:27'),(14,1,4,'Solicitud',2,1,102,'2016-04-14 19:05:26','2016-04-28 15:26:51'),(15,1,4,'Solicitud',2,1,103,'2016-04-14 19:07:12','2016-04-28 15:20:34'),(16,1,4,'Solicitud',2,1,104,'2016-04-14 20:01:21','2016-04-28 15:43:51'),(17,0,10,'Solicitud',1,1,105,'2016-04-22 18:49:11','2016-04-28 13:11:11'),(18,1,17,'Solicitud',2,1,106,'2016-04-25 14:57:04','2016-04-28 15:26:05'),(19,0,17,'Solicitud',1,1,107,'2016-04-25 14:58:37','2016-04-25 14:58:43'),(20,0,17,'Solicitud',1,1,108,'2016-04-25 15:36:52','2016-04-25 15:36:55'),(21,1,17,'Solicitud',2,1,109,'2016-04-25 15:47:37','2016-05-03 12:49:15'),(22,1,17,'Solicitud',2,1,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(23,0,17,'Solicitud',2,1,111,'2016-04-25 16:45:37','2016-04-28 13:27:00'),(24,0,10,'Solicitud',2,1,112,'2016-04-28 13:30:24','2016-04-28 14:24:01'),(25,1,10,'Solicitud',2,1,113,'2016-04-28 14:12:25','2016-04-28 15:31:01'),(26,1,10,'Solicitud',2,1,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(27,1,10,'Solicitud',2,1,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(28,1,10,'Solicitud',2,1,116,'2016-04-28 15:41:48','2016-04-28 15:43:25'),(29,1,10,'Solicitud',2,1,117,'2016-04-28 15:42:06','2016-04-28 15:43:13'),(30,1,10,'Solicitud',2,1,118,'2016-04-28 15:42:22','2016-04-28 15:43:03'),(31,1,4,'Solicitud',2,1,119,'2016-04-28 16:27:28','2016-04-28 16:28:46'),(32,1,4,'Solicitud',2,1,120,'2016-04-29 13:00:41','2016-04-29 13:00:54'),(33,1,4,'Solicitud',2,1,121,'2016-04-29 13:09:48','2016-04-29 15:04:12'),(34,1,4,'Solicitud',2,1,122,'2016-04-29 15:39:04','2016-04-29 15:39:49'),(35,1,4,'Solicitud',2,1,123,'2016-04-29 16:12:27','2016-04-29 16:12:39'),(36,1,4,'Solicitud',2,1,124,'2016-04-29 16:37:21','2016-05-04 15:05:05'),(37,1,4,'Solicitud',2,1,125,'2016-05-04 15:06:09','2016-05-04 15:07:02'),(38,0,4,'Solicitud',1,1,126,'2016-05-04 15:12:15','2016-05-09 14:02:14'),(39,1,4,'Solicitud',2,1,127,'2016-05-04 15:13:02','2016-05-04 15:13:14'),(40,0,10,'Solicitud',0,0,128,'2016-05-04 15:27:40','2016-05-04 15:27:40'),(41,1,4,'Solicitud',2,1,129,'2016-05-04 15:27:41','2016-05-04 15:57:42'),(42,0,10,'Solicitud',0,1,130,'2016-05-04 16:16:47','2016-05-04 16:16:49'),(43,1,4,'Solicitud',2,1,131,'2016-05-09 14:00:08','2016-05-09 14:00:37');
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (22,2265,'Papel para fax; Ancho 216 MM x 30 M; Longitud rollo 30 m',16.00,559,1,'2016-04-14 17:50:54','2016-05-03 14:52:12'),(23,3741,'Clips para papeles; Material metal; Numero 8; Presentacion caja de 100',1.30,48,1,'2016-04-14 17:52:03','2016-05-03 14:52:12'),(24,3779,'Tubo de minas; Diametro 0.5mm; Numero HB',0.90,70,1,'2016-04-14 17:58:04','2016-04-22 18:20:12'),(25,1162,'Candado; Material arco acero-niquel; Material caja Bronce; Medida caja',50.00,15,41,'2016-04-14 18:00:14','2016-04-28 15:50:22'),(26,3660,'Interruptor Termomagnetico; 2 Amp; Tipo bipolar',40.00,15,41,'2016-04-14 18:01:44','2016-05-09 13:45:49'),(27,3659,'Interruptor Termomagnetico; 2 Amp; Tipo Tripolar ',45.00,39,41,'2016-04-14 18:04:13','2016-04-27 15:09:52'),(28,2527,'Limpiavidrios; Capacidad 500cm3, Envase Atomizador a gatillo',22.00,20,42,'2016-04-14 18:06:09','2016-05-09 13:51:35'),(29,2544,'Lustramuebles; Contenido 500cm3; Envase Dispensador de crema',30.00,23,42,'2016-04-14 18:06:48','2016-04-14 18:06:48'),(31,4846,'FASTENERS; CAPACIDAD MAX, HOJAS 500 DE 80 GRS. NUMERO 2L, PRESENTACION 50 POR CAJA',7.14,21,1,'2016-04-18 17:18:05','2016-04-22 18:07:32'),(32,4818,'ESCOBA; MATERIAL PVC; NRO DE HILERAS 6; TIPO REFORZADA',24.40,-17,51,'2016-04-18 17:42:56','2016-04-29 13:01:49'),(33,4662,'FRANELA PARA LIMPIEZA; PRESENTACION POR PIEZA; MEDIDAS 0.5 X 0.5 MTS.',4.47,26,51,'2016-04-18 17:45:26','2016-05-09 13:55:59'),(34,12196,'Cuaderno con espiral; Tapa de carton',9.00,102,1,'2016-04-22 17:29:44','2016-05-03 14:54:37'),(35,12290,'Sobre manila; Tamaño Oficio; Formato color cafe 90 grs',0.37,213,1,'2016-04-22 17:33:04','2016-05-03 14:54:37'),(36,9988,'agendas 2016',50.00,206,52,'2016-04-28 16:15:28','2016-05-09 13:54:53'),(37,9997,'Boligrafos azules',1.00,105,52,'2016-04-28 16:20:23','2016-05-09 13:44:23'),(38,23531,'Engrapadora, capacidad 200 a 400 Hojas tipo semi industrial, tamaño grapas 23/10 -23/13 - 23/17 -23/20 - 23/24',290.00,0,1,'2016-05-04 14:12:31','2016-05-04 14:12:31'),(39,123,'franela verde',20.00,13,51,'2016-05-04 14:13:54','2016-05-09 13:55:59'),(40,12393,'franela roja',12.00,12,42,'2016-05-04 14:15:55','2016-05-09 13:55:34'),(41,12394,'franela amarilla',11.00,0,42,'2016-05-04 14:16:12','2016-05-04 14:16:12'),(42,2242,'Sobre de papel blanco, 100 grs, tamaño oficio, tipo de papel bond ',12.00,0,1,'2016-05-04 14:18:41','2016-05-04 14:18:41'),(43,3741,'Clips para papeles; Material metal; Numero 8; Presentacion caja de 100',1.50,0,1,'2016-05-09 13:37:43','2016-05-09 13:37:43'),(44,23531,'Engrapadora, capacidad 200 a 400 Hojas tipo semi industrial, tamaño grapas 23/10 -23/13 - 23/17 -23/20 - 23/24',295.00,0,1,'2016-05-09 13:40:22','2016-05-09 13:40:22'),(45,9988,'agendas 2016',48.00,26,52,'2016-05-09 13:41:57','2016-05-09 13:50:50');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FEC_REG` datetime NOT NULL,
  `ACC_REG` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DES_REG` text COLLATE utf8_unicode_ci NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registros_id_usu_foreign` (`ID_USU`),
  CONSTRAINT `registros_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RES_RES` tinyint(4) NOT NULL,
  `FEC_RES` datetime NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `ID_SOL` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `respuestas_id_sol_foreign` (`ID_SOL`),
  KEY `respuestas_id_usu_foreign` (`ID_USU`),
  CONSTRAINT `respuestas_id_sol_foreign` FOREIGN KEY (`ID_SOL`) REFERENCES `solicitudes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respuestas_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubros`
--

DROP TABLE IF EXISTS `rubros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_RUB` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CPR_RUB` int(11) NOT NULL,
  `ID_ALM` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DES_RUB` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rubros_id_alm_foreign` (`ID_ALM`),
  CONSTRAINT `rubros_id_alm_foreign` FOREIGN KEY (`ID_ALM`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubros`
--

LOCK TABLES `rubros` WRITE;
/*!40000 ALTER TABLE `rubros` DISABLE KEYS */;
INSERT INTO `rubros` VALUES (1,'Material de escritorio',0,1,'2016-04-14 17:43:44','2016-04-14 17:43:44','Rubro referente a todo el material de escritorio en el almacen'),(41,'Material de ferreteria',0,1,'2016-04-14 17:59:25','2016-04-14 17:59:25','Rubro referente al material de ferreteria en el almacen\r\n'),(42,'Material de limpieza',0,1,'2016-04-14 18:05:16','2016-04-14 18:05:16','Rubro relacionado con todo lo que tiene que ver con materiales de limpieza del almacen'),(51,'Material de limpieza',0,5,'2016-04-15 19:52:10','2016-04-15 19:52:10','Material de limpieza'),(52,'Material impreso',0,6,'2016-04-28 16:14:53','2016-04-28 16:14:53','Impresiones agendas');
/*!40000 ALTER TABLE `rubros` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `salidas`
--

DROP TABLE IF EXISTS `salidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FEC_SAL` datetime NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `salidas_id_usu_foreign` (`ID_USU`),
  CONSTRAINT `salidas_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidas`
--

LOCK TABLES `salidas` WRITE;
/*!40000 ALTER TABLE `salidas` DISABLE KEYS */;
INSERT INTO `salidas` VALUES (1,'2016-04-27 10:05:01',3,'2016-04-27 14:05:01','2016-04-27 14:05:01'),(2,'2016-04-27 10:11:28',3,'2016-04-27 14:11:28','2016-04-27 14:11:28'),(3,'2016-04-28 08:53:09',3,'2016-04-28 12:53:09','2016-04-28 12:53:09'),(4,'2016-04-28 12:25:04',3,'2016-04-28 16:25:04','2016-04-28 16:25:04'),(5,'2016-04-29 08:59:19',3,'2016-04-29 12:59:19','2016-04-29 12:59:19'),(6,'2016-04-29 09:01:49',3,'2016-04-29 13:01:49','2016-04-29 13:01:49');
/*!40000 ALTER TABLE `salidas` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitados`
--

LOCK TABLES `solicitados` WRITE;
/*!40000 ALTER TABLE `solicitados` DISABLE KEYS */;
INSERT INTO `solicitados` VALUES (1,3,26,89,'2016-04-14 18:07:20','2016-04-14 18:07:20'),(2,3,26,90,'2016-04-14 18:39:04','2016-04-14 18:39:04'),(3,3,26,91,'2016-04-14 18:49:02','2016-04-14 18:49:02'),(4,1,26,92,'2016-04-14 18:50:27','2016-04-28 15:27:36'),(5,5,26,93,'2016-04-14 18:51:57','2016-04-28 15:30:27'),(6,3,26,94,'2016-04-14 18:52:14','2016-04-14 18:52:14'),(7,3,26,95,'2016-04-14 18:52:21','2016-04-14 18:52:21'),(8,5,22,96,'2016-04-14 18:52:31','2016-04-14 18:52:31'),(9,3,23,97,'2016-04-14 18:53:33','2016-04-14 18:53:33'),(10,4,24,98,'2016-04-14 18:54:03','2016-04-14 18:54:03'),(11,5,23,99,'2016-04-14 19:02:13','2016-04-14 19:02:13'),(12,2,26,100,'2016-04-14 19:04:45','2016-04-28 15:28:05'),(13,4,29,101,'2016-04-14 19:04:55','2016-04-14 19:04:55'),(14,9,27,102,'2016-04-14 19:05:26','2016-04-14 19:05:26'),(15,4,27,103,'2016-04-14 19:07:12','2016-04-14 19:07:12'),(16,1,24,104,'2016-04-14 20:01:21','2016-04-28 15:43:51'),(17,15,29,105,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(18,9,24,105,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(19,1,25,105,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(20,2,35,106,'2016-04-25 14:57:04','2016-04-25 14:57:04'),(21,3,31,107,'2016-04-25 14:58:37','2016-04-25 14:58:37'),(22,5,29,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(23,4,26,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(24,5,28,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(25,3,25,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(26,5,29,108,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(27,1,23,109,'2016-04-25 15:47:37','2016-05-03 12:49:15'),(28,1,25,109,'2016-04-25 15:47:37','2016-05-03 12:49:15'),(29,4,22,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(30,2,34,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(31,1,31,110,'2016-04-25 15:50:29','2016-04-28 15:28:33'),(32,3,35,111,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(33,1,28,111,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(34,4,22,111,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(35,10,23,112,'2016-04-28 13:30:24','2016-04-28 13:30:24'),(36,7,22,112,'2016-04-28 13:30:24','2016-04-28 13:30:24'),(37,1,22,113,'2016-04-28 14:12:25','2016-04-28 15:31:01'),(38,5,34,113,'2016-04-28 14:12:25','2016-04-28 15:31:01'),(39,10,22,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(40,2,34,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(41,1,28,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(42,5,31,114,'2016-04-28 15:33:56','2016-04-28 15:34:25'),(43,1,25,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(44,1,29,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(45,1,35,115,'2016-04-28 15:41:08','2016-04-28 15:41:33'),(46,4,34,116,'2016-04-28 15:41:48','2016-04-28 15:41:48'),(47,100,23,117,'2016-04-28 15:42:06','2016-04-28 15:42:06'),(48,1,27,118,'2016-04-28 15:42:22','2016-04-28 15:42:22'),(49,10,34,119,'2016-04-28 16:27:28','2016-04-28 16:28:46'),(50,1,34,120,'2016-04-29 13:00:41','2016-04-29 13:00:54'),(51,1,29,121,'2016-04-29 13:09:48','2016-04-29 15:04:12'),(52,7,22,122,'2016-04-29 15:39:04','2016-04-29 15:39:49'),(53,2,31,122,'2016-04-29 15:39:04','2016-04-29 15:39:49'),(54,1,26,123,'2016-04-29 16:12:27','2016-04-29 16:12:39'),(55,1,26,124,'2016-04-29 16:37:21','2016-05-04 15:05:05'),(56,0,40,125,'2016-05-04 15:06:09','2016-05-04 15:07:02'),(57,1,31,125,'2016-05-04 15:06:09','2016-05-04 15:07:02'),(58,1,38,126,'2016-05-04 15:12:15','2016-05-04 15:12:15'),(59,0,40,127,'2016-05-04 15:13:02','2016-05-04 15:13:14'),(60,5,23,128,'2016-05-04 15:27:40','2016-05-04 15:27:40'),(61,1,23,129,'2016-05-04 15:27:41','2016-05-04 15:57:42'),(62,1,38,130,'2016-05-04 16:16:47','2016-05-04 16:16:47'),(63,15,42,131,'2016-05-09 14:00:08','2016-05-09 14:00:08'),(64,15,22,131,'2016-05-09 14:00:08','2016-05-09 14:00:08');
/*!40000 ALTER TABLE `solicitados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FEC_SOL` datetime NOT NULL,
  `EST_SOL` int(11) NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitudes_id_usu_foreign` (`ID_USU`),
  CONSTRAINT `solicitudes_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (89,'2016-04-14 14:07:20',2,4,'2016-04-14 18:07:20','2016-04-14 18:07:20'),(90,'2016-04-14 14:39:04',1,4,'2016-04-14 18:39:04','2016-04-14 18:39:04'),(91,'2016-04-14 14:49:02',1,4,'2016-04-14 18:49:02','2016-04-14 18:49:02'),(92,'2016-04-14 14:50:26',1,4,'2016-04-14 18:50:26','2016-04-14 18:50:26'),(93,'2016-04-14 14:51:57',0,4,'2016-04-14 18:51:57','2016-04-14 18:51:57'),(94,'2016-04-14 14:52:13',0,4,'2016-04-14 18:52:13','2016-04-14 18:52:13'),(95,'2016-04-14 14:52:21',0,4,'2016-04-14 18:52:21','2016-04-14 18:52:21'),(96,'2016-04-14 14:52:31',0,4,'2016-04-14 18:52:31','2016-04-14 18:52:31'),(97,'2016-04-14 14:53:33',0,4,'2016-04-14 18:53:33','2016-04-14 18:53:33'),(98,'2016-04-14 14:54:03',0,4,'2016-04-14 18:54:03','2016-04-14 18:54:03'),(99,'2016-04-14 15:02:13',0,4,'2016-04-14 19:02:13','2016-04-14 19:02:13'),(100,'2016-04-14 15:04:45',0,4,'2016-04-14 19:04:45','2016-04-14 19:04:45'),(101,'2016-04-14 15:04:55',0,4,'2016-04-14 19:04:55','2016-04-14 19:04:55'),(102,'2016-04-14 15:05:26',0,4,'2016-04-14 19:05:26','2016-04-14 19:05:26'),(103,'2016-04-14 15:07:12',0,4,'2016-04-14 19:07:12','2016-04-14 19:07:12'),(104,'2016-04-14 16:01:21',0,4,'2016-04-14 20:01:21','2016-04-14 20:01:21'),(105,'2016-04-22 14:49:11',0,10,'2016-04-22 18:49:11','2016-04-22 18:49:11'),(106,'2016-04-25 10:57:04',0,17,'2016-04-25 14:57:04','2016-04-25 14:57:04'),(107,'2016-04-25 10:58:37',0,17,'2016-04-25 14:58:37','2016-04-25 14:58:37'),(108,'2016-04-25 11:36:52',0,17,'2016-04-25 15:36:52','2016-04-25 15:36:52'),(109,'2016-04-25 11:47:37',0,17,'2016-04-25 15:47:37','2016-04-25 15:47:37'),(110,'2016-04-25 11:50:29',0,17,'2016-04-25 15:50:29','2016-04-25 15:50:29'),(111,'2016-04-25 12:45:37',2,17,'2016-04-25 16:45:37','2016-04-25 16:45:37'),(112,'2016-04-28 09:30:24',0,10,'2016-04-28 13:30:24','2016-04-28 13:30:24'),(113,'2016-04-28 10:12:25',0,10,'2016-04-28 14:12:25','2016-04-28 14:12:25'),(114,'2016-04-28 11:33:56',0,10,'2016-04-28 15:33:56','2016-04-28 15:33:56'),(115,'2016-04-28 11:41:08',0,10,'2016-04-28 15:41:08','2016-04-28 15:41:08'),(116,'2016-04-28 11:41:48',0,10,'2016-04-28 15:41:48','2016-04-28 15:41:48'),(117,'2016-04-28 11:42:06',0,10,'2016-04-28 15:42:06','2016-04-28 15:42:06'),(118,'2016-04-28 11:42:22',0,10,'2016-04-28 15:42:22','2016-04-28 15:42:22'),(119,'2016-04-28 12:27:27',0,4,'2016-04-28 16:27:27','2016-04-28 16:27:27'),(120,'2016-04-29 09:00:41',0,4,'2016-04-29 13:00:41','2016-04-29 13:00:41'),(121,'2016-04-29 09:09:48',0,4,'2016-04-29 13:09:48','2016-04-29 13:09:48'),(122,'2016-04-29 11:39:03',0,4,'2016-04-29 15:39:03','2016-04-29 15:39:03'),(123,'2016-04-29 12:12:27',0,4,'2016-04-29 16:12:27','2016-04-29 16:12:27'),(124,'2016-04-29 12:37:21',0,4,'2016-04-29 16:37:21','2016-04-29 16:37:21'),(125,'2016-05-04 11:06:09',0,4,'2016-05-04 15:06:09','2016-05-04 15:06:09'),(126,'2016-05-04 11:12:15',0,4,'2016-05-04 15:12:15','2016-05-04 15:12:15'),(127,'2016-05-04 11:13:01',0,4,'2016-05-04 15:13:01','2016-05-04 15:13:01'),(128,'2016-05-04 11:27:40',0,10,'2016-05-04 15:27:40','2016-05-04 15:27:40'),(129,'2016-05-04 11:27:41',0,4,'2016-05-04 15:27:41','2016-05-04 15:27:41'),(130,'2016-05-04 12:16:47',0,10,'2016-05-04 16:16:47','2016-05-04 16:16:47'),(131,'2016-05-09 10:00:08',0,4,'2016-05-09 14:00:08','2016-05-09 14:00:08');
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `users` VALUES (3,'Luis','Quisbert','Quispe','TI','Pasante',7074342,0,'$2y$10$8pzeern5CknQGOR9wPHZvO1UVSFFkTcMgle3CRMQYteTPA69ty8Vm','9JdPbEuPWe0Xt0ndmawwTx8B2s3hdlhI1owEFaoOrTHLZmB0uII6bIopkN9D','2016-03-17 18:13:01','2016-05-06 13:21:22','7074342'),(4,'Felipe','Quisbert','Quispe','TI','Pasante',9959333,2,'$2y$10$lGgcabWCujsYIxp0YekLj.O4Pi4ZayorggOySDfYYNIdPtMWXh1/6','SjxmYX9MjwZfVv9Jeh0Ku7mz4pSPprk5DICf2dY4pZR8zQH7ikqPNIALHGuS','2016-03-17 18:13:01','2016-05-04 15:19:46','9959333'),(7,'Fernando','Alvarez','Fernandez','Recursos Humanos','Otros1',123456,2,'$2y$10$cGeHEIUZN/8OgX2oPsPGSus1SKrZfa8YXHxAyPmIOYbBVkxMIh1IK','bE5qB4yNNsHEowD1D8ZzrTmS0yvsyoNvH6yzREYUbVXqfMFL8STsXzTnMPEr','2016-03-17 20:23:08','2016-04-11 19:45:18','123456'),(8,'Alberto','Velasco','rocha','Recursos Humanos','Director',60522919,2,'$2y$10$lEG0ZakAsfE9OPJtzp/QTOrwhDzB37iJkKJkJihcaCz4BFnYZ9/bG','QiBSkdWUtl6WKmvNquX827aQejBzx3pvyFThRDmTf9VI8a65feQpHrxkuWLf','2016-03-22 16:42:04','2016-04-14 20:08:28','60522919'),(9,'Luis','Quisbert','Quispe','Recursos Humanos','Director',1234567,2,'$2y$10$yNYKazyV8Qpn2QDCpgH99eb7uC9nJN2f0TIJc27oNKYKeBlyqY//e',NULL,'2016-03-22 18:59:37','2016-03-22 18:59:37','1234567'),(10,'Josue','Roca','Velasco','Recursos Humanos','Director',1234567,1,'$2y$10$tHk5zKgBsGQPAUYiGqjZx.azMECxZjCD2LCIPKo7TQRMTBKVMBJlm','SaewLKoABp9vtPIC6zVXzuuTFe5lalvcbOMp6IM1eU3MJk0TfgYpr3cgJuXk','2016-04-11 19:47:59','2016-05-06 13:33:58','12345678'),(11,'Pedro','Callejas','Monter','Tecnologias de Informacion','Director',2441193,1,'$2y$10$N1C/URtyldQ3bnGqcEAZMelL277mSoixDB/Q/.I6fPVdSPEfhaQDm',NULL,'2016-04-18 19:08:31','2016-04-18 19:08:31','2441193'),(12,'Jose','Aguilar','Alvarez','Recursos Humanos','Director',1234565,2,'$2y$10$pyiGLL3HTmI.5TAPg94IA.oiFYPyN63dPVd1aLYbXOGD3.nOMkyhC',NULL,'2016-04-18 19:23:11','2016-04-18 19:23:11','1234565'),(16,'Fernando','Albarracin','Quinteros','Tecnologias de Informacion','Otros1',999999,2,'$2y$10$isiFOoNH2XGyGCmzEIyVLOxFu64v4FoJdsYpTLpV.97lsqGQT/k4O',NULL,'2016-04-18 20:22:56','2016-04-18 20:22:56','9999999'),(17,'Roberto','Aguilar','Campos','Recursos Humanos','Otros1',78789898,1,'$2y$10$lEDYj44tZiNxo.vGfO5wd.TW0fSGzVOAVzQJQapERakTuWCAAtqw2',NULL,'2016-04-25 14:52:26','2016-04-25 14:52:26','78789898');
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

-- Dump completed on 2016-05-09 11:09:55
