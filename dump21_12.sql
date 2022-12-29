-- MySQL dump 10.13  Distrib 8.0.28, for macos12.2 (arm64)
--
-- Host: localhost    Database: licar
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bonuses`
--

DROP TABLE IF EXISTS `bonuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bonuses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus` int NOT NULL,
  `driver_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bonuses_driver_id_foreign` (`driver_id`),
  CONSTRAINT `bonuses_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonuses`
--

LOCK TABLES `bonuses` WRITE;
/*!40000 ALTER TABLE `bonuses` DISABLE KEYS */;
INSERT INTO `bonuses` VALUES (7,'bayram',9090,39,'2022-12-18 21:15:15','2022-12-18 21:15:15'),(13,'DASASD',23234,60,'2022-12-19 18:35:40','2022-12-19 18:35:40'),(15,'dg',345,70,'2022-12-19 18:58:08','2022-12-19 18:58:08'),(18,'dg',345,73,'2022-12-19 18:59:46','2022-12-19 18:59:46'),(19,'sdfsdfsdfsdf',23423423,73,'2022-12-19 20:15:38','2022-12-19 20:15:38'),(20,'sdf',123,76,'2022-12-21 01:02:25','2022-12-21 01:02:25');
/*!40000 ALTER TABLE `bonuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (10,'Fillial1',NULL,NULL),(11,'Fillial1',NULL,NULL),(12,'Fillial1',NULL,NULL),(13,'Fillial1',NULL,NULL),(14,'Fillial1',NULL,NULL),(15,'Fillial1',NULL,NULL),(16,'Fillial1',NULL,NULL),(17,'Fillial1',NULL,NULL),(18,'Fillial1',NULL,NULL),(19,'Fillial1',NULL,NULL),(20,'Fillial1',NULL,NULL),(21,'Fillial1',NULL,NULL),(22,'Fillial1',NULL,NULL),(23,'Fillial1',NULL,NULL),(24,'Fillial1',NULL,NULL),(25,'Fillial1',NULL,NULL),(26,'Fillial1',NULL,NULL),(27,'Fillial1',NULL,NULL),(28,'Fillial1',NULL,NULL),(29,'Fillial1',NULL,NULL),(30,'Fillial1',NULL,NULL),(31,'Fillial1',NULL,NULL),(32,'Fillial1',NULL,NULL),(33,'Fillial1',NULL,NULL),(34,'Fillial1',NULL,NULL),(35,'Fillial1',NULL,NULL),(36,'Fillial1',NULL,NULL),(37,'Fillial1',NULL,NULL),(38,'Fillial1',NULL,NULL),(39,'Fillial1',NULL,NULL),(40,'Fillial1',NULL,NULL),(41,'Fillial1',NULL,NULL),(42,'Fillial1',NULL,NULL),(43,'Fillial1',NULL,NULL),(44,'Fillial1',NULL,NULL),(45,'Fillial1',NULL,NULL),(46,'Fillial1',NULL,NULL),(47,'Fillial1',NULL,NULL),(48,'Fillial1',NULL,NULL),(49,'Fillial1',NULL,NULL),(50,'Fillial1',NULL,NULL),(51,'Fillial1',NULL,NULL),(52,'Fillial1',NULL,NULL),(53,'Fillial1',NULL,NULL),(54,'Fillial1',NULL,NULL),(55,'Fillial1',NULL,NULL),(56,'Fillial1',NULL,NULL),(57,'Fillial1',NULL,NULL),(58,'Fillial1',NULL,NULL),(59,'Fillial1',NULL,NULL),(60,'rtyrty','2022-12-19 18:30:06','2022-12-19 18:30:06'),(61,'fghfghfghfghfghfgh456456456','2022-12-19 18:30:12','2022-12-19 18:30:12');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cars_name_uindex` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (2,'Matiz','2022-12-14 16:31:28','2022-12-14 16:31:28'),(3,'rthrthrthrth','2022-12-18 06:24:30','2022-12-18 06:24:30'),(4,'rthrthrthrthrth','2022-12-18 06:24:34','2022-12-18 06:24:34'),(5,'rthrthrththrth','2022-12-18 06:24:38','2022-12-18 06:24:38'),(6,'rthrththrthrth','2022-12-18 06:24:43','2022-12-18 06:24:43'),(7,'cobalt','2022-12-18 06:35:27','2022-12-18 06:35:27'),(19,'ert','2022-12-18 12:26:11','2022-12-18 12:26:11'),(32,'dfgdf','2022-12-19 18:47:56','2022-12-19 18:47:56'),(35,'fgh','2022-12-19 18:58:08','2022-12-19 18:58:08');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_d` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_o` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` int unsigned DEFAULT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int unsigned DEFAULT NULL,
  `c_start` date NOT NULL,
  `c_end` date NOT NULL,
  `l_cost` int unsigned DEFAULT NULL,
  `l_start` date NOT NULL,
  `l_end` date NOT NULL,
  `payment` int unsigned NOT NULL,
  `account` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` json DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers_branch_id_foreign` (`branch_id`),
  KEY `drivers_car_id_foreign` (`car_id`),
  CONSTRAINT `drivers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `drivers_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (35,'testwewwww','test','45','545',2,'454t43',10,'2022-12-22','2022-12-26',3434,'2022-12-02','2022-12-17',343,248811,NULL,'2022-12-18 20:17:06','2022-12-18 23:25:04',NULL,'2023-01-09'),(39,'dfgdfgdfgdfg fgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg','rerltjerklter rtjekr tjekrtjekrt ertertertert','998765656','987876056',2,'60a112qa',10,'2022-12-17','2022-12-21',234000,'2022-12-04','2022-12-14',234000,234000,'2022-12-18 22:45:01','2022-12-18 21:15:15','2022-12-18 22:45:01',NULL,'2023-01-09'),(56,'ertertert','ertert','76576','87687',19,'ert',10,'2022-12-09','2022-12-15',3454,'2022-12-15','2022-12-21',34345,345,NULL,'2022-12-19 18:33:40','2022-12-19 18:33:40',NULL,'2022-12-25'),(57,'ertertert','ertert','76576','87687',19,'ert',10,'2022-12-09','2022-12-15',3454,'2022-12-15','2022-12-21',34345,345,NULL,'2022-12-19 18:34:05','2022-12-19 18:34:05',NULL,'2023-01-09'),(60,'ertertert','ertert','76576','87687',19,'ert',10,'2022-12-09','2022-12-15',3454,'2022-12-15','2022-12-21',34345,345,NULL,'2022-12-19 18:35:40','2022-12-19 18:35:40',NULL,'2023-01-09'),(65,'sdfsdf','dsdfsdf','456456','456456',32,'345',10,'2022-12-15','2022-12-23',45645,'2022-12-11','2022-12-06',4564,45645,NULL,'2022-12-19 18:47:56','2022-12-19 18:47:56',NULL,'2022-12-25'),(66,'sdfsdf','dsdfsdf','456456','456456',32,'345',10,'2022-12-15','2022-12-23',45645,'2022-12-11','2022-12-06',4564,45645,NULL,'2022-12-19 18:49:29','2022-12-19 18:49:29',NULL,'2023-01-09'),(67,'sdfsdf','dsdfsdf','456456','456456',32,'345',10,'2022-12-15','2022-12-23',45645,'2022-12-11','2022-12-06',4564,45645,NULL,'2022-12-19 18:49:42','2022-12-19 18:49:42',NULL,'2023-01-09'),(70,'ert','dgd','345','345',35,'345',10,'2022-12-24','2022-12-22',345,'2022-12-16','2022-12-07',345,345,NULL,'2022-12-19 18:58:08','2022-12-19 18:58:08',NULL,'2022-12-25'),(73,'qwqw','dgd','345','345',35,'345',10,'2022-12-24','2022-12-22',345,'2022-12-16','2022-12-07',345,69373105,NULL,'2022-12-19 18:59:46','2022-12-20 19:06:40',NULL,'2023-01-09'),(74,'sf','wer','2543','345',2,'234234',10,'2022-12-17','2022-12-26',234,'2022-12-09','2022-12-22',234,0,NULL,'2022-12-20 19:48:10','2022-12-20 19:48:10',NULL,'2023-01-09'),(75,'sf','wer','2543','345',2,'234234',10,'2022-12-17','2022-12-26',234,'2022-12-09','2022-12-22',234,0,NULL,'2022-12-20 19:51:45','2022-12-20 19:51:45',NULL,'2022-12-25'),(76,'sf','wer','2543','345',2,'234234',10,'2022-12-17','2022-12-26',234,'2022-12-25','2022-12-22',234,-579,NULL,'2022-12-20 19:52:08','2022-12-21 01:02:25',NULL,'2022-12-25');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2022_01_01_213636_create_branches_table',1),(4,'2022_01_01_231134_create_cars_table',1),(5,'2022_01_04_061332_create_drivers_table',1),(6,'2022_01_04_061620_create_payments_table',1),(7,'2022_12_11_222237_create_bonuses_table',1),(8,'2022_12_11_222250_create_services_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` int unsigned NOT NULL,
  `account` bigint unsigned NOT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_driver_id_foreign` (`driver_id`),
  CONSTRAINT `payments_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (13,35,343,2,'2022-12-18 20:17:06','2022-12-18 20:17:06'),(17,39,234000,1,'2022-12-18 21:15:15','2022-12-18 21:15:15'),(18,35,123123,1,'2022-12-18 23:21:12','2022-12-18 23:21:12'),(19,35,123123,1,'2022-12-18 23:23:30','2022-12-18 23:23:30'),(20,35,2222,1,'2022-12-18 23:25:04','2022-12-18 23:25:04'),(35,57,345,1,'2022-12-19 18:34:05','2022-12-19 18:34:05'),(38,60,345,1,'2022-12-19 18:35:40','2022-12-19 18:35:40'),(43,65,45645,1,'2022-12-19 18:47:56','2022-12-19 18:47:56'),(44,66,45645,1,'2022-12-19 18:49:29','2022-12-19 18:49:29'),(45,67,45645,1,'2022-12-19 18:49:42','2022-12-19 18:49:42'),(48,70,345,1,'2022-12-19 18:58:08','2022-12-19 18:58:08'),(51,73,345,1,'2022-12-19 18:59:46','2022-12-19 18:59:46'),(52,73,2700,1,'2022-12-19 19:09:47','2022-12-19 19:09:47'),(53,73,800,1,'2022-12-19 19:09:59','2022-12-19 19:09:59'),(54,73,1234,1,'2022-12-19 19:10:09','2022-12-19 19:10:09'),(55,73,1234,1,'2022-12-19 19:10:17','2022-12-19 19:10:17'),(56,73,1234,1,'2022-12-19 19:10:22','2022-12-19 19:10:22'),(57,73,234,1,'2022-12-19 20:05:56','2022-12-19 20:05:56'),(58,73,45,1,'2022-12-19 20:20:01','2022-12-19 20:20:01'),(59,73,45,1,'2022-12-19 20:20:04','2022-12-19 20:20:04'),(60,73,5,1,'2022-12-19 20:20:08','2022-12-19 20:20:08'),(64,73,232323,1,'2022-12-20 19:06:22','2022-12-20 19:06:22'),(65,73,34543453,1,'2022-12-20 19:06:33','2022-12-20 19:06:33'),(66,73,45455,1,'2022-12-20 19:06:40','2022-12-20 19:06:40'),(67,74,234,1,'2022-12-20 19:48:10','2022-12-20 19:48:10'),(68,75,234,1,'2022-12-20 19:51:45','2022-12-20 19:51:45');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `definition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_driver_id_foreign` (`driver_id`),
  CONSTRAINT `services_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'sdfsdf','dfg',73,'2022-12-19 18:59:46','2022-12-19 18:59:46'),(2,'misol','masala',73,'2022-12-19 20:06:42','2022-12-19 20:06:42'),(3,'dfg','dfg',73,'2022-12-20 16:50:49','2022-12-20 16:50:49'),(4,'xvb',NULL,73,'2022-12-20 16:50:54','2022-12-20 16:50:54'),(5,'ertertert',NULL,73,'2022-12-20 16:51:26','2022-12-20 16:51:26'),(6,'aasdasdasdasdasdasdasd',NULL,73,'2022-12-20 18:55:10','2022-12-20 18:55:10'),(7,'ssdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf','sfsdfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsdfsdfsd',73,'2022-12-20 19:07:44','2022-12-20 19:07:44');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Joshuah Collins','licar@gmail.com','2022-12-12 18:36:07','$2y$10$X0QiFYUvr/X2G0kUwdZt5.ZxfbNYYDsoQR/YBuNO2fL8A.0vdriVy','9VlBvJ1Gz5W19uEN8ntL5mHEmnX74dLzQtWOAYulvCRGLFg0taEXIr2mM2iJ','2022-12-12 18:36:08','2022-12-12 18:36:08');
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

-- Dump completed on 2022-12-21 15:22:15
