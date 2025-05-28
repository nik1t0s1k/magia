-- MariaDB dump 10.19  Distrib 10.8.4-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: res
-- ------------------------------------------------------
-- Server version	10.8.4-MariaDB

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES
(1,'рап','вр','вра');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES
('admin',1,NULL,NULL,NULL,1747338111,1747338111),
('guest',1,NULL,NULL,NULL,1747338111,1747338111),
('manager',1,NULL,NULL,NULL,1747338111,1747338111),
('user',1,NULL,NULL,NULL,1747338111,1747338111),
('viewAdminPanel',2,NULL,NULL,NULL,1747338111,1747338111);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES
('admin','manager'),
('admin','viewAdminPanel'),
('manager','user'),
('user','guest');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `counts` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` VALUES
(8,9,20,4,450),
(9,10,20,1,450),
(10,10,32,1,500);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Супы',1),
(2,'Горячие блюда',2),
(3,'Салаты',3),
(4,'Десерты',4),
(5,'Напитки',5);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES
('m000000_000000_base',1746877100),
('m140506_102106_rbac_init',1747337075),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1747337075),
('m180523_151638_rbac_updates_indexes_without_prefix',1747337076),
('m200409_110543_rbac_update_mssql_trigger',1747337076),
('m250507_105220_create_tables_table',1746877102),
('m250507_175014_create_user_table',1746877102),
('m250508_200026_create_categories_table',1746877102),
('m250508_200034_create_product_table',1746877102),
('m250508_200125_create_orders_table',1746877102),
('m250508_200236_create_reservations_table',1746877102);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order-user_id` (`user_id`),
  CONSTRAINT `fk-order-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `counts` int(11) NOT NULL DEFAULT 10,
  PRIMARY KEY (`id`),
  KEY `fk-product_category` (`category_id`),
  CONSTRAINT `fk-product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES
(1,'Том Ям','Кисло-острый суп с креветками и курицей',450.00,'hot.png',2,1,'2025-05-11 14:32:43',10),
(2,' Bельгийское блюдо','Мясо, нут и стручковая фасоль',400.00,'2.png',2,1,'2025-05-11 16:06:09',10),
(4,'Удон с говядиной','Блюдо азиатской кухни, которое представляет собой лапшу удон',500.00,'3.png',2,1,'2025-05-11 16:16:55',10),
(5,'Борщ','Горячий заправочный суп на основе свёклы',250.00,'4.png',2,1,'2025-05-11 17:46:01',10),
(7,'Вок с креветками','Лапша с креветками и овощами',550.00,'6.png',2,1,'2025-05-11 17:58:28',10),
(8,'Удон с морепродуктами','Яичная лапша с креветками и кальмарами',650.00,'7.png',2,1,'2025-05-11 18:01:47',8),
(9,'Медальоны ','Медальоны с овощами и грибами ',450.00,'8.png',2,1,'2025-05-11 18:04:54',10),
(10,'Картофель с мясом','Картофель с говядиной и овощами',520.00,'9.png',2,1,'2025-05-11 18:07:31',10),
(11,'Фреш боул с лососем','Шампиньоны свежие, креветки, помидоры черри, имбирь, лайм рыбный соус тайский ',350.00,'a.png',3,1,'2025-05-11 19:40:27',10),
(14,'Боул с соусом терияки','Боул с курицей терияки и овощами в соусе, чили свежий',300.00,'b.png',3,1,'2025-05-11 20:06:44',10),
(15,'Салат','Салат',400.00,'f.png',3,1,'2025-05-11 20:07:51',10),
(16,'Салат','Салат',400.00,'c.png',3,1,'2025-05-11 20:09:09',10),
(17,'Салат','Салат',360.00,'d.png',3,1,'2025-05-11 20:09:57',10),
(18,'Салат','Салат',450.00,'e.png',3,1,'2025-05-11 20:10:59',10),
(19,'Грибной суп','Грибной заправочный суп со свежими лисичками',400.00,'a1.png',1,1,'2025-05-11 20:15:18',0),
(20,'Том Ям','Кисло-острый суп с креветками и курицей',450.00,'a2.png',1,1,'2025-05-11 20:16:24',0),
(21,'Харчо','Говядина с рисом, грецкими орехами и тклапи',320.00,'a3.png',1,1,'2025-05-11 20:17:19',10),
(22,'Борщ','Горячий заправочный суп на основе свёклы',330.00,'a4.png',1,1,'2025-05-11 20:18:11',9),
(23,'Солянка','Колбасы, мясо, маслины, томатная паста и огурцы.',330.00,'a5.png',1,1,'2025-05-11 20:19:08',10),
(24,'Лапша с овощами','Яичная лапша с куриным бульоном и овощами',400.00,'a6.png',1,1,'2025-05-11 20:19:43',10),
(25,'Десерт с клубникой','десерт',300.00,'d1.png',4,1,'2025-05-11 20:24:11',10),
(26,'Чизкейк с малиной','чизкейк',400.00,'d2.png',4,1,'2025-05-11 20:24:39',10),
(27,'Чизкейк с вишней','чизкейк',310.00,'d3.png',4,1,'2025-05-11 20:25:10',10),
(28,'Десерт с якодами','десерт',340.00,'d4.png',4,1,'2025-05-11 20:25:48',10),
(29,'Вафли с мороженым','вафли',460.00,'d5.png',4,1,'2025-05-11 20:26:47',10),
(30,'Шоколадный фондан','Популярное французское десертное блюдо, кекс из шоколадного бисквитного теста.',450.00,'d6.png',4,1,'2025-05-11 20:28:03',10),
(31,'Ленивые щи','Ленивые щи из свежей капусты с фасолью и овощами',350.00,'a7.png',1,1,'2025-05-13 17:06:57',10),
(32,'Рамэн','С курицей и острым перцем ',500.00,'a8.jpg',1,1,'2025-05-13 17:12:50',9),
(33,'Салат с лососем','Салат из лосося, с айсбергом, помидорами и перепелиными яйцами — это взрыв вкуса',420.00,'s.jpg',3,1,'2025-05-13 17:21:25',10),
(34,'Салат с креветками','Вкусный и аппетитный салат с креветками',470.00,'n.jpg',3,1,'2025-05-13 17:24:14',10),
(35,'Десерт','десерт',320.00,'d7.jpg',4,1,'2025-05-13 17:40:07',10),
(36,'Имбирный чай','Имбирь, мята, медовый сироп, апельсин, лимон, корица, вода',290.00,'rt.png',5,1,'2025-05-15 13:24:22',10),
(37,'Облепиховый чай ','Облепиха, груша, медовый сироп, вода',300.00,'yu.png',5,1,'2025-05-15 13:29:58',10),
(38,'Цитрусовый чай','Апельсиновый сок, грейпфрут, сироп медовый, мята, имбирь, чай Сенча, вода',300.00,'zx.png',5,1,'2025-05-15 13:34:37',10),
(39,'Чай манго маракуйя ','Цукаты манго и маракуйи, вода',400.00,'cv.png',5,1,'2025-05-15 13:43:31',10),
(40,'Вишнёвый чай','Вишня, вишневый сироп, чай Ассам, вода',330.00,'df.png',5,1,'2025-05-15 13:45:54',10),
(41,'Чай малина маракуйя','Сок из маракуйи, малина, вода',400.00,'hj.png',5,1,'2025-05-15 13:48:09',10),
(42,'Чай малина имбирь','Свежая малина, корень имбиря, вода ',330.00,'tg.png',5,1,'2025-05-15 13:52:00',9),
(43,'Чай яблоко с корицей','Яблочный сок, корица, вода',360.00,'qr.png',5,1,'2025-05-15 13:54:55',10);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `table_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-user` (`user_id`),
  KEY `fk-tables` (`table_id`),
  CONSTRAINT `fk-tables` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES
(4,9,1,'2025-05-02 18:00:00');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES
(1,'1'),
(2,'2');
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(9,'admin1','admin1','admin1','admin@mail.ru','$2y$13$.y5dBwhW73/H4Fl2S1xO0ObDM3pIyjUb2G3Box66die2rppIyeY8e','316318236','2025-05-24 18:50:40'),
(10,'admin','Никита','Пахарьков','nkpahar@gmail.com','$2y$13$wd541O8xb0nHa5oWUm4cOuzU9Vp9qfl7ElBux1wioC9JCrCIPP6UG','+7 (595) 995 95 95','2025-05-27 16:11:02');
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

-- Dump completed on 2025-05-28 22:22:09
