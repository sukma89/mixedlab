-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: airquality
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(20) NOT NULL,
  `location_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_city` (`city`),
  KEY `idx_location_id` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'beijing','ds','东城东四'),(2,'beijing','tt','东城天坛'),(3,'beijing','gy','西城官园'),(4,'beijing','wsxg','西城万寿西宫'),(5,'beijing','atzx','朝阳奥体中心'),(6,'beijing','nzg','朝阳农展馆'),(7,'beijing','wl','海淀万柳'),(8,'beijing','bbxq','海淀北部新区'),(9,'beijing','zwy','海淀北京植物园'),(10,'beijing','fthy','丰台花园'),(11,'beijing','yg','丰台云岗'),(12,'beijing','gc','石景山古城'),(13,'beijing','yz','亦庄开发区'),(14,'beijing','mtgq','门头沟龙泉镇'),(15,'beijing','lx','房山良乡'),(16,'beijing','tzq','通州新城'),(17,'beijing','syq','顺义新城'),(18,'beijing','cpq','昌平镇'),(19,'beijing','dxq','大兴黄村镇'),(20,'beijing','yf','大兴榆垡'),(21,'beijing','pgq','平谷镇'),(22,'beijing','hrq','怀柔镇'),(23,'beijing','myx','密云镇'),(24,'beijing','mysk','密云水库'),(25,'beijing','yqx','延庆镇'),(26,'beijing','bdl','延庆八达岭');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_data`
--

DROP TABLE IF EXISTS `quality_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` int(10) unsigned NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `origin_time` varchar(32) NOT NULL DEFAULT '',
  `so2` decimal(5,2) DEFAULT NULL,
  `no2` decimal(5,2) DEFAULT NULL,
  `pm10` decimal(5,2) DEFAULT NULL,
  `pm25` decimal(5,2) DEFAULT NULL,
  `co` decimal(7,2) DEFAULT NULL,
  `ozone` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location_id` (`location_id`),
  KEY `idx_timestamp` (`timestamp`),
  KEY `idx_so2` (`so2`),
  KEY `idx_no2` (`no2`),
  KEY `idx_pm10` (`pm10`),
  KEY `idx_pm25` (`pm25`),
  KEY `idx_co` (`co`),
  KEY `idx_ozone` (`ozone`),
  CONSTRAINT `quality_data_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_data`
--

LOCK TABLES `quality_data` WRITE;
/*!40000 ALTER TABLE `quality_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-22 15:02:37
