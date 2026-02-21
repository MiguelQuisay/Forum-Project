-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: portfolio
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `comment` longtext NOT NULL,
  `creator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,8,0,'2026-02-19 19:43:00','sdfasd gagi',2),(2,8,1,'2026-02-19 19:44:48','(comment has been deleted.)',2),(3,8,2,'2026-02-19 19:45:23','reps',2),(4,8,3,'2026-02-19 19:47:06','yep',2),(5,8,4,'2026-02-19 19:48:14','nope',2),(6,8,5,'2026-02-19 19:50:00','asdfs',2),(7,1,0,'2026-02-19 19:51:35','No comment',2),(8,1,0,'2026-02-19 19:52:15','What the helly?!>',2),(9,1,0,'2026-02-19 19:54:00','7:54:00',2),(10,8,2,'2026-02-19 20:06:51','Yuhg',2),(11,8,10,'2026-02-19 20:07:02','Iopu',2),(12,10,0,'2026-02-19 21:48:51','edit ulit',2),(13,10,12,'2026-02-19 21:48:57','er',2),(14,13,0,'2026-02-19 22:56:25','(comment has been deleted.)',2),(15,13,14,'2026-02-19 22:56:53','2',4),(16,6,0,'2026-02-19 23:03:53','Yow',5),(17,14,0,'2026-02-19 23:04:56','I dont kno',5),(18,15,0,'2026-02-22 01:01:14','(comment has been deleted.)',2);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'KAILANGAN MAY BACKER','WATCH: Newly-appointed Sarangani Assistant District Engineer Abdul Motsalib Kansi Jr. shares how it took him 11 years and 10 application attempts before finally getting promoted at the DPWH because of the old padrino system. | via Andrea Taguines, ABS-CBN News',1,'2026-02-18 08:38:26'),(2,'Title 2','Body text',1,'2026-02-18 08:50:20'),(3,'New Post&nbsp;','TINGNAN: Claim Stub para sa Food Packs distribusyon ni Gov. Lray Villafuerte Jr sa mga taga San. Ramon, Salvacion sa Daldagon Peak sa Siruma, Cam. Sur ngayong Hapon Pebrero 18, ipinamigay na. Nakakuha ka na ba? Mga Lray Villafuerte Dancers at Performers nagsimula ng humataw sa stage habang may Peaceful Protest Rally sa isyu ng land grabbing daw. #kapwerte #AsintadoNews',1,'2026-02-18 10:14:13'),(4,'😂Will this work?','My close bet are:- Possible release/protection of close allied politicians accused of corruption- Weakening/detaching from U.S. treaties and other long standing allied partnerships- Moving closer to China in foreign policy- Compromised stance on West Philippine Sea (China will take this as an opportunity)- Quiboloy being pardoned (if not extradited immediately)- Imprisonment or targeting of political opponents- Continuation of drug war and extrajudicial killings- Hostility toward businesses and major Filipino enterprises, TycoonsWhat\'s yours?',1,'2026-02-18 10:20:00'),(5,'My first post','dfasdfdsafsdBody text',2,'2026-02-18 12:04:36'),(6,'Her first post','dsafds asd fsaBody text',4,'2026-02-18 12:05:04'),(7,'Post ko','Body text MO',2,'2026-02-18 12:10:25'),(8,'Didn\'t slave owners know?','Slave owners know you are not going to be able to get to the pub for a while and I think I can do it now and I can do it for you and you can you just reply to the email address and I\'ll be on the phone. 🙉 ❤️',2,'2026-02-18 17:55:36'),(13,'Title 2',' wefnslka Body text',4,'2026-02-19 22:55:53'),(14,'Ninyas post','Temepjxie 😊🫂🎄🫂🫂😜🫂🔴😞🎄💕🥱😘💦👋💦🫂🫣🫂😂😁🔴🫂😆😄😗😚😗🙂😗😅😗🔴😊😉😗🏌️🏋️🤹🏋️🤾🤺🤸🥝🥒🧄🫛🧄🫛🍠🫛🚗🚛🚅🚲🚅🚲',5,'2026-02-19 23:04:27'),(15,'Not','🎂',2,'2026-02-22 01:01:06');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authority` enum('regular','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'testuser','testuser@example.com','$2y$10$aCNrexPjJGVzUf5dNGf8JuIWTABiaZBx0FnpCHRKSEU0ek1AOy/K2','regular'),(2,'quisay.miguel.m@gmail.com','miguelquisay','$2y$10$sWnu14vrIvVyQqDdTbCalusLFRu870.V88D.MDx5wZ0nYCPFIMSGS','regular'),(3,'','','$2y$10$Vb..W05bxKzM5AOzhKhAR.N.x23gs4W.RvrHhBNL9Yy1qMqfuJPB6','regular'),(4,'rizabelle','r@r.com','$2y$10$pUwcmTS/V/kVJUoIqEMlKeXyZuevmlM1hEHYaQrd/QWYwlrPzLt2e','regular'),(5,'ninya','n@n.com','$2y$10$YorNvTDEzzawnhyIcPMnCew83aN4oDoZG98PoSaUjZMXPbj.Q0us.','regular');
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

-- Dump completed on 2026-02-22  1:50:00
