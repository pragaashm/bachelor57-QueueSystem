-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: Backend
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Queue`
--

DROP TABLE IF EXISTS `Queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Queue` (
  `QueueTableID` int NOT NULL,
  `QueueSessionID` int NOT NULL,
  `QueueTimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `QueueSolved` tinyint DEFAULT '0',
  PRIMARY KEY (`QueueTableID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Queue`
--

LOCK TABLES `Queue` WRITE;
/*!40000 ALTER TABLE `Queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `Queue` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`Andy`@`localhost`*/ /*!50003 TRIGGER `Queue_BEFORE_INSERT` BEFORE INSERT ON `Queue` FOR EACH ROW BEGIN
DECLARE SessionID INT;
SELECT TableSessionID INTO SessionID FROM TableList WHERE TableID = NEW.QueueTableID;
SET NEW.QueueSessionID = SessionID;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `SessionList`
--

DROP TABLE IF EXISTS `SessionList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SessionList` (
  `SessionID` int NOT NULL AUTO_INCREMENT,
  `SessionUserID` int DEFAULT NULL,
  PRIMARY KEY (`SessionID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SessionList`
--

LOCK TABLES `SessionList` WRITE;
/*!40000 ALTER TABLE `SessionList` DISABLE KEYS */;
/*!40000 ALTER TABLE `SessionList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TableList`
--

DROP TABLE IF EXISTS `TableList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TableList` (
  `TableID` int NOT NULL,
  `TableUserID` int DEFAULT NULL,
  `TableSessionID` int DEFAULT NULL,
  PRIMARY KEY (`TableID`),
  UNIQUE KEY `TableID_UNIQUE` (`TableID`),
  UNIQUE KEY `TableUser_UNIQUE` (`TableUserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TableList`
--

LOCK TABLES `TableList` WRITE;
/*!40000 ALTER TABLE `TableList` DISABLE KEYS */;
INSERT INTO `TableList` VALUES (1,NULL,NULL),(2,NULL,NULL),(3,NULL,NULL),(4,NULL,NULL),(5,NULL,NULL),(6,NULL,NULL),(7,NULL,NULL),(8,NULL,NULL),(9,NULL,NULL),(10,NULL,NULL),(11,NULL,NULL),(12,NULL,NULL),(13,NULL,NULL),(14,NULL,NULL),(15,NULL,NULL),(16,NULL,NULL),(17,NULL,NULL),(18,NULL,NULL),(19,NULL,NULL),(20,NULL,NULL),(21,NULL,NULL),(22,NULL,NULL),(23,NULL,NULL),(24,NULL,NULL),(25,NULL,NULL),(26,NULL,NULL),(27,NULL,NULL),(28,NULL,NULL),(29,NULL,NULL),(30,NULL,NULL),(31,NULL,NULL),(32,NULL,NULL),(33,NULL,NULL),(34,NULL,NULL),(35,NULL,NULL),(36,NULL,NULL),(37,NULL,NULL),(38,NULL,NULL),(39,NULL,NULL),(40,NULL,NULL),(41,NULL,NULL),(42,NULL,NULL),(43,NULL,NULL),(44,NULL,NULL),(45,NULL,NULL),(46,NULL,NULL),(47,NULL,NULL),(48,NULL,NULL),(49,NULL,NULL),(50,NULL,NULL),(51,NULL,NULL),(52,NULL,NULL),(53,NULL,NULL),(54,NULL,NULL),(55,NULL,NULL),(56,NULL,NULL),(57,NULL,NULL),(58,NULL,NULL),(59,NULL,NULL),(60,NULL,NULL),(61,NULL,NULL),(62,NULL,NULL),(63,NULL,NULL),(64,NULL,NULL),(65,NULL,NULL),(66,NULL,NULL),(67,NULL,NULL),(68,NULL,NULL),(69,NULL,NULL),(70,NULL,NULL),(71,NULL,NULL),(72,NULL,NULL),(73,NULL,NULL),(74,NULL,NULL),(75,NULL,NULL),(76,NULL,NULL),(77,NULL,NULL),(78,NULL,NULL),(79,NULL,NULL),(80,NULL,NULL),(81,NULL,NULL),(82,NULL,NULL),(83,NULL,NULL),(84,NULL,NULL),(85,NULL,NULL),(86,NULL,NULL),(87,NULL,NULL);
/*!40000 ALTER TABLE `TableList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserCred`
--

DROP TABLE IF EXISTS `UserCred`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `UserCred` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `UserKey` varchar(12) DEFAULT NULL,
  `UserLevel` tinyint DEFAULT '0',
  `UserName` varchar(20) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  UNIQUE KEY `UserKey_UNIQUE` (`UserKey`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserCred`
--

LOCK TABLES `UserCred` WRITE;
/*!40000 ALTER TABLE `UserCred` DISABLE KEYS */;
INSERT INTO `UserCred` VALUES (2,'meh',3,'Andy'),(3,'kek',1,'Bandy');
/*!40000 ALTER TABLE `UserCred` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-31 13:57:45
