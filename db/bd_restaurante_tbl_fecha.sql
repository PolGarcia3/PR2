-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_restaurante
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `tbl_fecha`
--

DROP TABLE IF EXISTS `tbl_fecha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_fecha` (
  `id_fecha` int NOT NULL AUTO_INCREMENT,
  `fecha_reserva` varchar(45) DEFAULT NULL,
  `hora_reserva` varchar(45) DEFAULT NULL,
  `id_mesa` int DEFAULT NULL,
  `hora_salida` varchar(45) DEFAULT NULL,
  `fecha_lugar_reserva` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_fecha`),
  KEY `fk_fecha_mesa_idx` (`id_mesa`),
  CONSTRAINT `fk_fecha_mesa` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fecha`
--

LOCK TABLES `tbl_fecha` WRITE;
/*!40000 ALTER TABLE `tbl_fecha` DISABLE KEYS */;
INSERT INTO `tbl_fecha` VALUES (49,'2021-11-09','15:44:40',14,NULL,'Terraza Oeste'),(50,'2021-11-09','15:45:33',12,NULL,'Terraza Oeste'),(51,'2021-11-09','15:49:38',20,'16:56:39','Comedor Deluxe'),(52,'2021-11-09','16:56:43',20,'16:56:52','Comedor Deluxe');
/*!40000 ALTER TABLE `tbl_fecha` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-09 17:17:37
