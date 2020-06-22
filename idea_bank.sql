-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: idea_bank
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Current Database: `idea_bank`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `idea_bank` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `idea_bank`;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` varchar(700) NOT NULL,
  `comment_content` text,
  `name` varchar(50) DEFAULT NULL,
  `post_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('1491827905c13db2531ec7a64c226ca8c0846241d30cc30c50bd475c7f88e3a70f33edeac8b72496','comment again!','neeraj','efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5'),('50b7f55cc86c6a7ef0e9e3faadf405060370108d4fb3586575ccd3eeb4de56f9690f9445342db98d','comment','neeraj','efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5'),('8960268bb8414b3ff817c2e0780e332700b1af39a9af0fe61bd86c25107a568686ec3ba1aa3bcceb','suffering from success ','gsingh','5e6b1f40f3086926f41fdc136304fed4511e0d850be28867181f13be5d927ccdbe38abd3e1cf54d3');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contributors`
--

DROP TABLE IF EXISTS `contributors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contributors` (
  `post_id` varchar(200) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `contribution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributors`
--

LOCK TABLES `contributors` WRITE;
/*!40000 ALTER TABLE `contributors` DISABLE KEYS */;
INSERT INTO `contributors` VALUES ('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','gagan',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','gsingh',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','neeraj',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','qwerty2',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','qwerty3',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','qwerty4',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','qwerty5',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','satyam',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','vashist',10),('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','vishal',10),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','gagan',10),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','gsingh',10),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','qwerty4',10),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','qwerty5',10),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','satyam',10),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','vishal',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','gagan',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','gsingh',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','neeraj',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','qwerty2',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','qwerty5',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','satyam',10),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','vishal',10),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','gsingh',10),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','qwerty3',10),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','qwerty4',10),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','qwerty5',10),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','satyam',10),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','vishal',10),('5098d3ff445ba87502768eccaf2440fff32cbe5df5bba42a40dcda7822e0a4d35830b40cf3e8feb1','gsingh',10),('5098d3ff445ba87502768eccaf2440fff32cbe5df5bba42a40dcda7822e0a4d35830b40cf3e8feb1','satyam',10),('5098d3ff445ba87502768eccaf2440fff32cbe5df5bba42a40dcda7822e0a4d35830b40cf3e8feb1','qwerty3',10),('5e6b1f40f3086926f41fdc136304fed4511e0d850be28867181f13be5d927ccdbe38abd3e1cf54d3','gsingh',10),('1ba875a3956ff325acf5dfffca72fbe39db50c8654c4205a61a04454994e86ee965c36590c160d0f','gsingh',10);
/*!40000 ALTER TABLE `contributors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `offer_title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,'Extra Leave','Buy this offer by expending 2000 MWPoints and get an extra leave in the next month.',2000),(2,'Amazon Coupon - Rs.100','Buy this offer by expending 500 MWPoints and get an AMAZON Gift Coupon worth Rs. 100.',500),(3,'Amazon Coupon - Rs.200','Buy this offer by expending 1000 MWPoints and get an AMAZON Gift Coupon worth Rs. 200.',1000),(4,'Amazon Coupon - Rs.500','Buy this offer by expending 2500 MWPoints and get an AMAZON Gift Coupon worth Rs. 500.',2500);
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` varchar(200) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `current_status` varchar(30) DEFAULT NULL,
  `post_creation_time` datetime DEFAULT NULL,
  `post_text` text,
  `type` varchar(20) DEFAULT NULL,
  `post_heading` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES ('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a','gsingh','Idea proposed','2020-06-21 07:11:01','ikugwf ic rwuee eiugvb ','problem','My First Problem'),('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6','vishal','Idea proposed','2020-06-21 07:09:17','rfhg  rgmd bkjfg ','idea','First Idea'),('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37','vishal','Idea proposed','2020-06-21 07:09:45','kdfjbgv vvoerbivn ne','problem','Problem 1'),('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5','gsingh','Completed','2020-06-21 07:11:14','terdbv  rkuisvnb  roftgibuvls','idea','Great Idea'),('5098d3ff445ba87502768eccaf2440fff32cbe5df5bba42a40dcda7822e0a4d35830b40cf3e8feb1','gsingh','Completed','2020-06-21 23:13:50','This idea is great','idea','idea 2 '),('5e6b1f40f3086926f41fdc136304fed4511e0d850be28867181f13be5d927ccdbe38abd3e1cf54d3','gsingh','In progress','2020-06-22 01:50:13','bites the dust :)','idea','Another One'),('1ba875a3956ff325acf5dfffca72fbe39db50c8654c4205a61a04454994e86ee965c36590c160d0f','gsingh','In progress','2020-06-22 02:12:35','are back','idea','backstreet boys');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `purchase_id` varchar(260) NOT NULL,
  `username` varchar(50) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES ('02ef3ee095e7253a5ac4d90f568959c7315e1113f17b491b68dfac85f8b37b4c1609c86e652fc501','vishal',2,500,'2020-06-21'),('2ad55a23bf9c8ef1217663b4a8c8a84328736899340f06e81d0a1107b03e6709d21b85238f6c4025','gsingh',2,500,'2020-06-21'),('ab7fa4a9337e89401266c706137e872ceca065af96ae4fcbd12c0b62c2db9f140e649009a0ab1846','gsingh',2,500,'2020-06-21'),('cb382484c03c753824ebd07c534fa88bed25bcc5b7092ee11eb1974f3e91a4eaddd07e9e719cc7d7','gsingh',3,1000,'2020-06-21'),('eb99fed1a0fcdab92f033c8e9955b4d93a5e8c67743da413f8e5f051299e691951ad727569230380','vishal',2,500,'2020-06-21');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `MWpoints` int(11) DEFAULT '100',
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'vishal',580,'vishal'),(2,'gsingh',625,'123'),(3,'neeraj',800,'neeraj'),(4,'vashist',870,'vashist'),(5,'gagan',1140,'gagan'),(6,'satyam',600,'satyam'),(7,'qwerty2',80,'123'),(8,'qwerty3',170,'123'),(9,'qwerty4',150,'123'),(10,'qwerty5',140,'123');
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

-- Dump completed on 2020-06-22  5:53:45
