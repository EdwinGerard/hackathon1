-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: wildfighter
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.17.10.1

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
-- Table structure for table `Hero`
--

DROP TABLE IF EXISTS `Hero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `isDefense` tinyint(1) DEFAULT NULL,
  `stats_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Hero_1_idx` (`stats_id`),
  KEY `fk_Hero_2_idx` (`position_id`),
  KEY `fk_Hero_3_idx` (`game_id`),
  CONSTRAINT `fk_Hero_1` FOREIGN KEY (`stats_id`) REFERENCES `stats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hero_2` FOREIGN KEY (`position_id`) REFERENCES `cell` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hero_3` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hero`
--

LOCK TABLES `Hero` WRITE;
/*!40000 ALTER TABLE `Hero` DISABLE KEYS */;
/*!40000 ALTER TABLE `Hero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `army`
--

DROP TABLE IF EXISTS `army`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `army` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hero_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Army_1_idx` (`hero_id`),
  KEY `fk_Army_3_idx` (`game_id`),
  KEY `fk_Army_4_idx` (`player_id`),
  CONSTRAINT `fk_Army_1` FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Army_3` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Army_4` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `army`
--

LOCK TABLES `army` WRITE;
/*!40000 ALTER TABLE `army` DISABLE KEYS */;
/*!40000 ALTER TABLE `army` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cell`
--

DROP TABLE IF EXISTS `cell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positionX` int(11) DEFAULT NULL,
  `postionY` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cell`
--

LOCK TABLES `cell` WRITE;
/*!40000 ALTER TABLE `cell` DISABLE KEYS */;
/*!40000 ALTER TABLE `cell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `player_id1` int(11) NOT NULL,
  `player_id2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Game_1_idx` (`player_id1`),
  KEY `fk_game_2_idx` (`player_id2`),
  CONSTRAINT `fk_Game_1` FOREIGN KEY (`player_id1`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_2` FOREIGN KEY (`player_id2`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'zrgzrg',1,2),(4,'zrgzrh',1,2),(5,'efea',1,2),(6,'gzrhr',2,NULL),(7,'aeaea',2,1),(9,'zrhnet',1,2),(10,'zrrh',1,2),(11,'zrgrzg',1,2),(12,'thtehe',1,2),(13,'fgzrgz',1,2),(14,'brbrb',1,2);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gameStep`
--

DROP TABLE IF EXISTS `gameStep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gameStep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `step` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `game_id_UNIQUE` (`game_id`),
  KEY `fk_gameStep_1_idx` (`game_id`),
  CONSTRAINT `fk_gameStep_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gameStep`
--

LOCK TABLES `gameStep` WRITE;
/*!40000 ALTER TABLE `gameStep` DISABLE KEYS */;
INSERT INTO `gameStep` VALUES (1,1,4),(5,1,5),(6,1,1),(7,2,11),(8,2,13),(9,1,14),(10,1,7),(11,1,12);
/*!40000 ALTER TABLE `gameStep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pa` int(11) DEFAULT NULL,
  `pv` int(11) DEFAULT NULL,
  `melee` int(11) DEFAULT NULL,
  `distant` int(11) DEFAULT NULL,
  `spell` int(11) DEFAULT NULL,
  `resistance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'spouk','4861b233d39eb8743d1c5523e5fe33dd'),(2,'test','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-06 11:21:02
