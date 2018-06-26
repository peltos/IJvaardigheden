-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- ------------------------------------------------------
-- Server version	5.5.57-MariaDB

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
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badges` (
  `idbadges` int(11) NOT NULL AUTO_INCREMENT,
  `subject_subject` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `pathToImage` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbadges`),
  KEY `subject_subject_idx` (`subject_subject`),
  CONSTRAINT `subject_subject` FOREIGN KEY (`subject_subject`) REFERENCES `subject` (`subject`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badges`
--

LOCK TABLES `badges` WRITE;
/*!40000 ALTER TABLE `badges` DISABLE KEYS */;
INSERT INTO `badges` VALUES (1,'Biologie','test','badge-01'),(2,'Nederlands','TEST2','badge-01');
/*!40000 ALTER TABLE `badges` ENABLE KEYS */;

--
-- Table structure for table `schoolGroup`
--

DROP TABLE IF EXISTS `schoolGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schoolGroup` (
  `schoolGroup` varchar(45) NOT NULL,
  PRIMARY KEY (`schoolGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolGroup`
--

LOCK TABLES `schoolGroup` WRITE;
/*!40000 ALTER TABLE `schoolGroup` DISABLE KEYS */;
INSERT INTO `schoolGroup` VALUES ('IJB102'),('IJB106'),('IJB108');
/*!40000 ALTER TABLE `schoolGroup` ENABLE KEYS */;

--
-- Table structure for table `scoreList`
--

DROP TABLE IF EXISTS `scoreList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scoreList` (
  `users_email` varchar(45) NOT NULL,
  `badges_idbadges` int(11) NOT NULL,
  `done` int(11) DEFAULT NULL,
  PRIMARY KEY (`users_email`,`badges_idbadges`),
  KEY `badges_idbadges_idx` (`badges_idbadges`),
  CONSTRAINT `badges_idbadges` FOREIGN KEY (`badges_idbadges`) REFERENCES `badges` (`idbadges`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scoreList`
--

LOCK TABLES `scoreList` WRITE;
/*!40000 ALTER TABLE `scoreList` DISABLE KEYS */;
INSERT INTO `scoreList` VALUES ('leerling@ijburg.com',1,0),('leerling@ijburg.com',2,1);
/*!40000 ALTER TABLE `scoreList` ENABLE KEYS */;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES ('Biologie'),('Engels'),('Natuurkunde'),('Nederlands'),('Rekenen');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `email` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `insertion` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int(1) NOT NULL,
  `schoolGroup_schoolGroup` varchar(45) DEFAULT NULL,
  `oauth_uid` varchar(45) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `otherInfo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `schoolgroup_idx` (`schoolGroup_schoolGroup`),
  CONSTRAINT `schoolgroup` FOREIGN KEY (`schoolGroup_schoolGroup`) REFERENCES `schoolGroup` (`schoolGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin@ijburg.com','admin',NULL,'admin','admin',2,NULL,'AdMiN','http://www.jmkxyy.com/admin-icon-png/admin-icon-png-18.jpg',NULL),('docent@ijburg.com','docent',NULL,'docent','admin',1,NULL,'DoCeNt','https://mannennieuws.nl/wp-content/uploads/2017/03/Leraar-beroep.jpg',NULL),('leerling@ijburg.com','leerling',NULL,'leerling','leerling',0,'IJB108','LeErLiNg','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl1ByHlpy--i0bLJ6lljK1gKyKSfQigFJ75O2UJhuK4WIy8VXW',NULL);
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

-- Dump completed on 2018-06-26 22:13:34
