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
-- Table structure for table `tbl_mesa`
--

DROP TABLE IF EXISTS `tbl_mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_mesa` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `lugar_mesa` varchar(45) DEFAULT NULL,
  `numero_mesa` int DEFAULT NULL,
  `comensales_mesa` int DEFAULT NULL,
  `incidencia_mesa` varchar(45) DEFAULT NULL,
  `id_lugar` int DEFAULT NULL,
  `estado_mesa` varchar(45) DEFAULT NULL,
  `lugar_reserva` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `fk_lugar_mesa_idx` (`id_lugar`),
  CONSTRAINT `fk_lugar_mesa` FOREIGN KEY (`id_lugar`) REFERENCES `tbl_lugar` (`id_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mesa`
--

LOCK TABLES `tbl_mesa` WRITE;
/*!40000 ALTER TABLE `tbl_mesa` DISABLE KEYS */;
INSERT INTO `tbl_mesa` VALUES (1,'Sala privada 1',1,12,NULL,2,'Disponible',NULL),(2,'Terraza Norte',1,8,NULL,1,'Disponible',NULL),(3,'Terraza Norte',2,8,NULL,1,'Disponible',NULL),(4,'Terraza Norte',3,8,NULL,1,'Disponible',NULL),(5,'Comedor Principal',1,8,NULL,3,'Disponible',NULL),(6,'Comedor Principal',2,8,NULL,3,'Disponible',NULL),(7,'Comedor Principal',3,8,NULL,3,'Disponible',NULL),(8,'Comedor Principal',4,8,NULL,3,'Disponible',NULL),(9,'Terraza Sur',1,8,NULL,4,'Disponible',NULL),(10,'Terraza Sur',2,8,NULL,4,'Disponible',NULL),(11,'Terraza Sur',3,8,NULL,4,'Disponible',NULL),(12,'Terraza Oeste',1,8,NULL,5,'Ocupado',NULL),(13,'Terraza Oeste',2,8,NULL,5,'Disponible',NULL),(14,'Terraza Oeste',3,8,NULL,5,'Ocupado',NULL),(15,'Sala privada 2',1,12,NULL,6,'Disponible',NULL),(16,'Comedor Gourmet',1,8,NULL,7,'Disponible',NULL),(17,'Comedor Gourmet',2,8,NULL,7,'Disponible',NULL),(18,'Comedor Gourmet',3,8,NULL,7,'Disponible',NULL),(19,'Comedor Gourmet',4,8,NULL,7,'Disponible',NULL),(20,'Comedor Deluxe',1,8,NULL,8,'Disponible',NULL),(21,'Comedor Deluxe',2,8,NULL,8,'Disponible',NULL),(22,'Comedor Deluxe',3,8,NULL,8,'Disponible',NULL),(23,'Comedor Deluxe',4,8,NULL,8,'Disponible',NULL),(24,'Sala privada 2',1,12,NULL,9,'Disponible',NULL),(25,'Sala privada 3',1,12,NULL,10,'Ocupado',NULL);
/*!40000 ALTER TABLE `tbl_mesa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-09 17:17:36
