-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: mundochs_dev
-- ------------------------------------------------------
-- Server version	5.5.5-10.6.15-MariaDB

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
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `activity_datetime` datetime DEFAULT NULL,
  `activity_name` varchar(100) DEFAULT NULL,
  `table` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `current_URL` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22429 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `alimentos`
--

DROP TABLE IF EXISTS `alimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` varchar(150) NOT NULL,
  `campaign_id` varchar(150) NOT NULL,
  `discipline_id` varchar(150) DEFAULT NULL,
  `total_persons` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `persons_name` varchar(250) NOT NULL,
  `event` varchar(255) DEFAULT NULL,
  `discipline` varchar(255) DEFAULT NULL,
  `import_method` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `departure_date` date NOT NULL,
  `returning_date` date NOT NULL,
  `departure_time` varchar(115) NOT NULL,
  `returning_time` varchar(115) NOT NULL,
  `meals_data` longtext DEFAULT NULL,
  `upload_meal` longtext DEFAULT NULL,
  `meal_type` varchar(255) DEFAULT NULL,
  `pass_type` longtext DEFAULT NULL,
  `enter_type` longtext DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `banner_management`
--

DROP TABLE IF EXISTS `banner_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banner_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ordering` int(6) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_cars` int(11) NOT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `plate` varchar(20) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `no_serie` varchar(20) NOT NULL,
  `pasajeros` varchar(70) NOT NULL,
  `per_day_cost` varchar(20) NOT NULL,
  `odometro` varchar(20) NOT NULL,
  `car_feature` longtext NOT NULL,
  `rendimiento_por_litro` varchar(50) NOT NULL,
  `fuel_capacity` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Liter''s',
  `fuel_type` enum('Gasolina','Diesel') NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `insurance_policy` varchar(255) DEFAULT NULL,
  `car_type` varchar(150) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime DEFAULT NULL,
  `model` int(10) NOT NULL DEFAULT 0,
  `car_type_desc` varchar(50) DEFAULT NULL,
  `num_permission` varchar(100) DEFAULT NULL,
  `url_slug` varchar(255) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `meta_keywords` longtext DEFAULT NULL,
  `vehicle_cost` varchar(40) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `car_status` enum('Disponible','Reservado','Bloqueado','Mantenimiento') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cars_FK` (`category_cars`),
  CONSTRAINT `cars_FK` FOREIGN KEY (`category_cars`) REFERENCES `cars_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cars_category`
--

DROP TABLE IF EXISTS `cars_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cars_gallery`
--

DROP TABLE IF EXISTS `cars_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars_gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `cars_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cars_gallery_cars` (`cars_id`),
  CONSTRAINT `FK_cars_gallery_cars` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `casetas`
--

DROP TABLE IF EXISTS `casetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` int(11) NOT NULL,
  `category_cars` int(11) DEFAULT NULL,
  `caseta_name` varchar(100) NOT NULL,
  `costo_casetas` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_casetas_FK` (`route_id`),
  KEY `route_casetas_FK_1` (`category_cars`),
  CONSTRAINT `route_casetas_FK_1` FOREIGN KEY (`category_cars`) REFERENCES `cars_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `casetas_category_cars`
--

DROP TABLE IF EXISTS `casetas_category_cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casetas_category_cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cars_category` int(11) DEFAULT NULL,
  `casetas_id` int(11) DEFAULT NULL,
  `costo_casetas` double DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `casetas_category_cars_FK` (`cars_category`),
  KEY `casetas_category_cars_FK_1` (`casetas_id`),
  CONSTRAINT `casetas_category_cars_FK` FOREIGN KEY (`cars_category`) REFERENCES `cars_category` (`id`),
  CONSTRAINT `casetas_category_cars_FK_1` FOREIGN KEY (`casetas_id`) REFERENCES `casetas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT 0,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cost_per_services`
--

DROP TABLE IF EXISTS `cost_per_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cost_per_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cars_id` int(11) DEFAULT NULL,
  `category_cars` int(11) NOT NULL,
  `routes_id` int(11) DEFAULT NULL,
  `departure_city` varchar(200) DEFAULT NULL,
  `destination_city` varchar(250) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `departure_time` varchar(100) DEFAULT NULL,
  `returning_date` date DEFAULT NULL,
  `returning_time` time DEFAULT NULL,
  `no_of_days` double DEFAULT NULL,
  `cost_per_days` varchar(100) DEFAULT NULL,
  `kms_total` float DEFAULT NULL,
  `extra_kilometres` int(11) DEFAULT NULL,
  `total_travel_kms` varchar(100) DEFAULT NULL,
  `car_performance_liter` varchar(100) DEFAULT NULL,
  `total_liter_consume` float DEFAULT NULL,
  `cost_per_liter` varchar(100) DEFAULT NULL,
  `booth_expense` varchar(100) DEFAULT NULL,
  `no_drivers` varchar(100) DEFAULT NULL,
  `driver_name` int(11) DEFAULT NULL,
  `second_drivers` int(11) DEFAULT NULL,
  `driver_fee` varchar(100) DEFAULT NULL,
  `total_fee_drivers` int(11) DEFAULT NULL,
  `hotel_fee` varchar(100) DEFAULT NULL,
  `road_fee` double DEFAULT NULL,
  `airport_fee` double DEFAULT NULL,
  `car_wash` float DEFAULT NULL,
  `amenities` int(11) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `utility` int(11) DEFAULT NULL,
  `sugested_price` float DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `total_fuel_expense` varchar(100) DEFAULT NULL,
  `fee_first_driver` double DEFAULT 0,
  `fee_seconds_drivers` double DEFAULT 0,
  `total_casetas` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cost_per_services_FK` (`cars_id`),
  KEY `cost_per_services_FK_1` (`routes_id`),
  KEY `cost_per_services_FK_2` (`category_cars`),
  CONSTRAINT `cost_per_services_FK` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`),
  CONSTRAINT `cost_per_services_FK_1` FOREIGN KEY (`routes_id`) REFERENCES `route_travel` (`id`),
  CONSTRAINT `cost_per_services_FK_2` FOREIGN KEY (`category_cars`) REFERENCES `cars_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `costperservices`
--

DROP TABLE IF EXISTS `costperservices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `costperservices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `route` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `returning_date` date NOT NULL,
  `returning_time` time NOT NULL,
  `miles_trip` float NOT NULL,
  `kilometers_travel` int(11) NOT NULL,
  `extra_kilometers` int(11) NOT NULL,
  `no_of_days` double NOT NULL,
  `car_id` int(11) NOT NULL,
  `no_of_drivers` int(11) NOT NULL,
  `first_driver` int(11) NOT NULL,
  `second_driver` int(11) NOT NULL,
  `driver_fee` int(11) NOT NULL,
  `road_fee` int(11) NOT NULL,
  `gasoline_liters` int(11) NOT NULL,
  `cost_per_liters` int(11) NOT NULL,
  `airport_fee` int(11) NOT NULL,
  `car_wash` int(11) NOT NULL,
  `utility_percent` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `performance` int(11) NOT NULL,
  `hotel_fee` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `suggested_price` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `consumption_liters` int(11) DEFAULT NULL,
  `frequent` int(1) NOT NULL DEFAULT 0,
  `courtesy_cost` double(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2372 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `depositos`
--

DROP TABLE IF EXISTS `depositos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depositos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` varchar(150) NOT NULL,
  `campaign_id` varchar(150) NOT NULL,
  `discipline_id` varchar(150) NOT NULL,
  `card_number` varchar(150) DEFAULT NULL,
  `card_image` varchar(255) DEFAULT NULL,
  `Deposit_proof` longtext DEFAULT NULL,
  `event_name` varchar(255) NOT NULL,
  `holder_name` varchar(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `comments` longtext DEFAULT NULL,
  `discipline` int(11) DEFAULT NULL,
  `deposit_type` varchar(80) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `discipline_2` (`discipline`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `disciplines`
--

DROP TABLE IF EXISTS `disciplines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `categories` varchar(100) NOT NULL,
  `president_name` varchar(200) NOT NULL,
  `head_coach` varchar(100) NOT NULL,
  `delegate_name` varchar(100) NOT NULL,
  `local_uniform` varchar(100) NOT NULL,
  `visitant_uniform` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `from_name` varchar(50) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `sms_status` enum('Inactive','Active') NOT NULL DEFAULT 'Inactive',
  `sms_message` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimate_request`
--

DROP TABLE IF EXISTS `estimate_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estimate_request` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `route` varchar(300) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `car_type` varchar(50) DEFAULT NULL,
  `passangers_num` int(3) DEFAULT NULL,
  `comment` varchar(800) DEFAULT NULL,
  `form_zasady` bit(1) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `date_status` datetime DEFAULT NULL,
  `comment_cancel` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `costperservices_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=561 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `event_new_users`
--

DROP TABLE IF EXISTS `event_new_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_new_users` (
  `event_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `count_users` int(11) NOT NULL,
  `checkbox` int(11) NOT NULL,
  PRIMARY KEY (`event_users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=706 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `new_modules_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `discipline` varchar(100) NOT NULL,
  `Cliente` varchar(100) NOT NULL,
  `campaign_id` varchar(100) NOT NULL,
  `where_are_you_going` varchar(200) NOT NULL,
  `place_from` varchar(200) NOT NULL,
  `departure_date` varchar(32) NOT NULL,
  `departure_time` varchar(32) NOT NULL,
  `returning_date` varchar(32) NOT NULL,
  `returning_time` varchar(32) NOT NULL,
  `travel_time` varchar(32) NOT NULL,
  `count_users` varchar(32) NOT NULL,
  `username` varchar(200) NOT NULL,
  `service_order` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `services` varchar(200) NOT NULL,
  `quotation` varchar(200) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 active 1 inactive',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`new_modules_id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ground_transportaion`
--

DROP TABLE IF EXISTS `ground_transportaion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ground_transportaion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_type` varchar(150) NOT NULL,
  `Cliente` varchar(150) NOT NULL,
  `campaign_id` varchar(150) NOT NULL,
  `discipline_id` varchar(150) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL,
  `car_size` varchar(150) NOT NULL,
  `drivers_name` longtext DEFAULT NULL,
  `passenger_name` longtext DEFAULT NULL,
  `pass_type` longtext DEFAULT NULL,
  `enter_type` longtext DEFAULT NULL,
  `total_passnger` varchar(150) NOT NULL,
  `total_drivers` varchar(150) NOT NULL,
  `images` longtext DEFAULT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `departure_location` varchar(150) NOT NULL,
  `departure_destination` varchar(150) NOT NULL,
  `departure_expenses` decimal(10,0) unsigned zerofill DEFAULT NULL,
  `departure_mileage` varchar(150) NOT NULL,
  `returning_mileage` varchar(150) NOT NULL,
  `returning_date` date NOT NULL,
  `returning_time` time NOT NULL,
  `returning_location` varchar(150) NOT NULL,
  `returning_destination` varchar(150) NOT NULL,
  `returning_expenses` decimal(10,0) unsigned zerofill DEFAULT NULL,
  `departure_Booths` varchar(100) NOT NULL,
  `departure_Combustible` varchar(100) NOT NULL,
  `departure_Other` varchar(100) NOT NULL,
  `returning_Booths` varchar(100) NOT NULL,
  `returning_Combustible` varchar(100) NOT NULL,
  `returning_Other` varchar(100) NOT NULL,
  `status` enum('Pending','In Progress','Accomplished','Cancelled') NOT NULL,
  `net_price` decimal(10,0) NOT NULL,
  `comments` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hospedaje`
--

DROP TABLE IF EXISTS `hospedaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospedaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` varchar(150) NOT NULL,
  `campaign_id` varchar(150) NOT NULL,
  `discipline_id` varchar(150) NOT NULL,
  `hotel_name` varchar(150) NOT NULL,
  `no_rooms` varchar(150) DEFAULT NULL,
  `customer_name` varchar(150) NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `disciplane` longtext DEFAULT NULL,
  `event_name` longtext DEFAULT NULL,
  `city` varchar(150) NOT NULL,
  `reservation_number` varchar(150) NOT NULL,
  `meals_data` longtext NOT NULL,
  `total_persons` int(25) NOT NULL,
  `persons_name` varchar(255) NOT NULL,
  `Comments` longtext DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menu_types`
--

DROP TABLE IF EXISTS `menu_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `menu_title` varchar(255) DEFAULT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_type` varchar(50) NOT NULL DEFAULT 'custom',
  `menu_type_id` int(11) DEFAULT NULL,
  `ordering` tinyint(3) DEFAULT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `params` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `module_title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `ordering` int(4) NOT NULL DEFAULT 0,
  `show_on_menu` tinyint(1) NOT NULL DEFAULT 1,
  `actions` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `newusers`
--

DROP TABLE IF EXISTS `newusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newusers` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_number` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `user_discipline` varchar(100) NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 male 2 female',
  `user_type` varchar(100) NOT NULL,
  `dob` varchar(32) NOT NULL,
  `age` int(11) NOT NULL,
  `Chest` varchar(32) NOT NULL,
  `Length` varchar(32) NOT NULL,
  `Waist` varchar(32) NOT NULL,
  `Hip` varchar(32) NOT NULL,
  `clothes_size` varchar(100) NOT NULL,
  `chest1` varchar(32) NOT NULL,
  `length1` varchar(32) NOT NULL,
  `identification_number` varchar(100) NOT NULL,
  `cell_number` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `travel_kit` varchar(100) NOT NULL,
  `travel_kit_date` varchar(31) NOT NULL,
  `travel_kit_image` varchar(100) NOT NULL,
  `additional_uniform_info` varchar(100) NOT NULL,
  `additional_uniform_date` varchar(32) NOT NULL,
  `additional_uniform_image` varchar(100) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 1 COMMENT '2 deleted 1 not deleted',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1549 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `option_value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `access` enum('Public','Private') NOT NULL DEFAULT 'Public',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `friendly_url` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `show_title` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `tagline` tinytext DEFAULT NULL,
  `content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `meta_keywords` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` enum('published','unpublished') NOT NULL DEFAULT 'published',
  `thumbnail` varchar(100) DEFAULT NULL,
  `template` varchar(100) NOT NULL DEFAULT 'default',
  `ordering` int(4) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `passenger_type`
--

DROP TABLE IF EXISTS `passenger_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passenger_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_concept`
--

DROP TABLE IF EXISTS `payment_concept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_concept` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `concept` varchar(200) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_order`
--

DROP TABLE IF EXISTS `payment_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `terms` varchar(100) NOT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `total` double NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `supplier_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `cost_id` int(11) DEFAULT NULL,
  `approved` enum('Aprobado','En proceso','Cancelado') DEFAULT NULL,
  `date_approved` datetime DEFAULT NULL,
  `approved_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `concept_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_payment_order_payment_types` (`type_id`),
  KEY `FK_payment_order_users` (`user_id`),
  KEY `FK_payment_order_users_2` (`approved_id`),
  KEY `FK_payment_order_users_3` (`applicant_id`),
  KEY `FK_payment_order_supplier` (`supplier_id`),
  KEY `FK_payment_order_supplier_2` (`company_id`),
  KEY `payment_order_FK` (`cost_id`),
  CONSTRAINT `FK_payment_order_payment_types` FOREIGN KEY (`type_id`) REFERENCES `payment_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_order_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_order_supplier_2` FOREIGN KEY (`company_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_order_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_order_users_2` FOREIGN KEY (`approved_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_order_users_3` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4515 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_order_product`
--

DROP TABLE IF EXISTS `payment_order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_order_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(20,2) NOT NULL DEFAULT 0.00,
  `total` decimal(20,2) NOT NULL DEFAULT 0.00,
  `position` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_payment_order_product_payment_order` (`order_id`),
  CONSTRAINT `FK_payment_order_product_payment_order` FOREIGN KEY (`order_id`) REFERENCES `payment_order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7678 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_types`
--

DROP TABLE IF EXISTS `payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `clave_sat` varchar(3) DEFAULT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `plane_ticket`
--

DROP TABLE IF EXISTS `plane_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plane_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_passenger` int(11) NOT NULL,
  `Cliente` varchar(150) NOT NULL,
  `campaign_id` varchar(150) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `service_type` varchar(115) NOT NULL,
  `passenger_name` varchar(150) NOT NULL,
  `persons_name` varchar(250) NOT NULL,
  `user_type` varchar(150) NOT NULL,
  `airline_name` varchar(150) NOT NULL,
  `airline_type` varchar(150) NOT NULL,
  `arrival_from` varchar(150) NOT NULL,
  `arrival_to` varchar(150) NOT NULL,
  `upload_pticket` longtext DEFAULT NULL,
  `boarding_pass` longtext DEFAULT NULL,
  `pass_type` longtext DEFAULT NULL,
  `enter_type` longtext DEFAULT NULL,
  `arrival_departure_date` date NOT NULL,
  `arrival_departure_time` varchar(255) NOT NULL,
  `return_departure_date` date DEFAULT NULL,
  `return_departure_time` varchar(255) NOT NULL,
  `reservation_number` varchar(150) NOT NULL,
  `net_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `services` varchar(150) NOT NULL DEFAULT '',
  `additional_price` decimal(10,2) DEFAULT 0.00,
  `total_days` int(10) DEFAULT NULL,
  `comments` text NOT NULL DEFAULT '\'',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `discipline_id` (`discipline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `plane_ticket_images`
--

DROP TABLE IF EXISTS `plane_ticket_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plane_ticket_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `upload_pticket` varchar(1000) NOT NULL,
  `boarding_pass` varchar(1000) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `plane_ticket_user_types`
--

DROP TABLE IF EXISTS `plane_ticket_user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plane_ticket_user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `invoice_number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'quantity',
  `item_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `customer_note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_notes` varchar(255) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mail_status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `request_change` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_file` varchar(255) NOT NULL,
  `memo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `payment_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `terms_conditions` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `reference` int(11) NOT NULL,
  `item_amount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_total_amount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_amount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `note_business` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotes_FK` (`reference`),
  CONSTRAINT `quotes_FK` FOREIGN KEY (`reference`) REFERENCES `cost_per_services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quotes_invoice`
--

DROP TABLE IF EXISTS `quotes_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotes_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_invoice` varchar(255) DEFAULT NULL,
  `quotes_id` int(11) DEFAULT NULL,
  `showing` enum('Y','N') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quotes_items`
--

DROP TABLE IF EXISTS `quotes_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotes_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `quotes_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quotes_payment`
--

DROP TABLE IF EXISTS `quotes_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotes_payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_note` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `balance` double NOT NULL,
  `quotes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_quotes_payment` (`quotes_id`),
  CONSTRAINT `FK1_quotes_payment` FOREIGN KEY (`quotes_id`) REFERENCES `quotes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `route_travel`
--

DROP TABLE IF EXISTS `route_travel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `route_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_routes` varchar(100) DEFAULT NULL,
  `route_name` varchar(250) DEFAULT NULL,
  `departure` varchar(250) DEFAULT NULL,
  `destination` varchar(250) DEFAULT NULL,
  `travel_type` varchar(60) DEFAULT NULL,
  `total_kms` int(11) DEFAULT NULL,
  `liters_consumed` double DEFAULT NULL,
  `fuel_expense` double DEFAULT NULL,
  `yield` varchar(100) DEFAULT NULL,
  `no_booths` int(11) DEFAULT NULL,
  `booth_expense` int(11) DEFAULT NULL,
  `no_drivers` int(11) DEFAULT NULL,
  `driver_name` int(11) DEFAULT NULL,
  `category_cars` int(11) DEFAULT NULL,
  `car_name` int(11) DEFAULT NULL,
  `travel_time` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_travel_FK` (`category_cars`),
  KEY `route_travel_FK_1` (`car_name`),
  CONSTRAINT `route_travel_FK` FOREIGN KEY (`category_cars`) REFERENCES `cars_category` (`id`),
  CONSTRAINT `route_travel_FK_1` FOREIGN KEY (`car_name`) REFERENCES `cars` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `routes_casetas`
--

DROP TABLE IF EXISTS `routes_casetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `routes_casetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casetas_id` int(11) DEFAULT NULL,
  `routes_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_advance`
--

DROP TABLE IF EXISTS `service_advance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_advance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `advance_1` double DEFAULT 0,
  `advance_2` double DEFAULT 0,
  `driver_id_1` int(11) NOT NULL,
  `driver_id_2` int(11) DEFAULT NULL,
  `payment_total_1` double NOT NULL DEFAULT 0,
  `payment_total_2` double DEFAULT NULL,
  `date_reg` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_service_advance_services` (`service_id`),
  KEY `FK_service_advance_users` (`user_id`),
  CONSTRAINT `FK_service_advance_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `service_advance_FK` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_destination`
--

DROP TABLE IF EXISTS `service_destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `odometer_at_destination` double DEFAULT 0,
  `fuel_tank_at_destination` double DEFAULT 0,
  `photo_destination` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_destinations`
--

DROP TABLE IF EXISTS `service_destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_destinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `KM_in_destination` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gas_level` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_id` int(11) NOT NULL,
  `images` text NOT NULL,
  `last_destination` tinyint(2) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_expense`
--

DROP TABLE IF EXISTS `service_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_expense` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fuel_litre_go` double DEFAULT 0,
  `fuel_exp_go` double DEFAULT 0,
  `fuel_exp_img_go` varchar(255) DEFAULT '0',
  `road_fee_go` double DEFAULT 0,
  `road_fee_img_go` varchar(255) DEFAULT '0',
  `hotel_fee_go` double DEFAULT 0,
  `hotel_fee_img_go` varchar(255) DEFAULT '0',
  `car_wash_go` double DEFAULT 0,
  `car_wash_img_go` varchar(255) DEFAULT '0',
  `airport_fee_go` double DEFAULT 0,
  `airport_fee_img_go` varchar(255) DEFAULT '0',
  `other_exp_go` double DEFAULT 0,
  `fuel_litre_return` double DEFAULT 0,
  `fuel_exp_return` double DEFAULT 0,
  `fuel_exp_img_return` varchar(255) DEFAULT '0',
  `road_fee_return` double DEFAULT 0,
  `road_fee_img_return` varchar(255) DEFAULT '0',
  `hotel_fee_return` double DEFAULT 0,
  `hotel_fee_img_return` varchar(255) DEFAULT '0',
  `car_wash_return` double DEFAULT 0,
  `car_wash_img_return` varchar(255) DEFAULT '0',
  `other_exp_return` double DEFAULT 0,
  `date_add` datetime DEFAULT NULL,
  `user_add_id` int(11) DEFAULT 0,
  `date_update` datetime DEFAULT NULL,
  `user_update` int(11) DEFAULT 0,
  `service_id` bigint(20) NOT NULL DEFAULT 0,
  `other_exp_desc_go` varchar(300) DEFAULT NULL,
  `other_exp_desc_return` varchar(300) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_files`
--

DROP TABLE IF EXISTS `service_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_files` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `filename` varchar(120) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_home`
--

DROP TABLE IF EXISTS `service_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `home_odometer_arrival` double DEFAULT NULL,
  `home_fuel_level_arrival` double DEFAULT NULL,
  `home_charge_fill_tank` double DEFAULT NULL,
  `home_cost_fuel_fill_tank` double DEFAULT NULL,
  `home_photo_evidence` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_initial`
--

DROP TABLE IF EXISTS `service_initial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_initial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `init_odometer` varchar(100) DEFAULT NULL,
  `initial_fuel_tank` double NOT NULL,
  `evidencia` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `others_fuel` enum('yes','no') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_intermediate`
--

DROP TABLE IF EXISTS `service_intermediate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_intermediate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `odometer_time_charge` double DEFAULT NULL,
  `amount_liters_charged` double DEFAULT NULL,
  `cost_charged_fuel` double DEFAULT NULL,
  `photo_evidence` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_returning`
--

DROP TABLE IF EXISTS `service_returning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_returning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `return_odometer_time_charge` double DEFAULT NULL,
  `return_amount_liters_charged` double DEFAULT NULL,
  `return_cost_charged_fuel` double DEFAULT NULL,
  `return_photo_evidence` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_types2`
--

DROP TABLE IF EXISTS `service_types2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_types2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `costperservices_id` int(11) NOT NULL DEFAULT 0,
  `itinerary` longtext DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_departure` time DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `meeting_point` varchar(255) DEFAULT NULL,
  `departure` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `expenses` decimal(10,2) DEFAULT 0.00,
  `end_time` varchar(64) DEFAULT NULL,
  `campaign` varchar(100) DEFAULT NULL,
  `KM_initial` decimal(10,2) DEFAULT 0.00,
  `fuel_level` decimal(10,2) DEFAULT 0.00,
  `credit` decimal(10,2) DEFAULT 0.00,
  `days` decimal(10,2) NOT NULL DEFAULT 1.00,
  `price` decimal(10,2) DEFAULT 0.00,
  `KM_in_destination` decimal(10,2) DEFAULT 0.00,
  `gas_level` decimal(10,2) DEFAULT 0.00,
  `final_kms` decimal(10,2) DEFAULT 0.00,
  `final_fuel_level` decimal(10,2) DEFAULT 0.00,
  `fuel_expense` decimal(10,2) NOT NULL DEFAULT 0.00,
  `road_fee_expense` decimal(10,2) NOT NULL DEFAULT 0.00,
  `otros_expense` decimal(10,2) NOT NULL DEFAULT 0.00,
  `breakfast_expense` decimal(10,2) NOT NULL DEFAULT 0.00,
  `lunch_expense` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dinner_expense` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) DEFAULT 0.00,
  `trip_milage` decimal(10,2) DEFAULT 0.00,
  `kms_liter` decimal(10,2) DEFAULT 0.00,
  `created` datetime DEFAULT NULL,
  `status` enum('Pending','In Progress','Accomplished','Cancelled') NOT NULL DEFAULT 'Pending',
  `payment_status` enum('Pending','Paid') NOT NULL DEFAULT 'Pending',
  `images` text DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_un` (`costperservices_id`),
  CONSTRAINT `services_FK` FOREIGN KEY (`costperservices_id`) REFERENCES `cost_per_services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `colony` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `municipality` varchar(200) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `num_ext` varchar(50) DEFAULT NULL,
  `num_int` varchar(50) DEFAULT NULL,
  `code_postal` int(5) DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `company` bit(1) NOT NULL DEFAULT b'0',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `bank_data` longtext DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_content` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_settings_un` (`kode_content`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tourism_route`
--

DROP TABLE IF EXISTS `tourism_route`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tourism_route` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `start_hour` time NOT NULL,
  `end_date` date NOT NULL,
  `end_hour` time DEFAULT NULL,
  `num_days` int(11) NOT NULL,
  `route` varchar(400) NOT NULL,
  `available_date` date DEFAULT NULL,
  `available_hour` time DEFAULT NULL,
  `note` varchar(800) DEFAULT NULL,
  `reg_date` datetime NOT NULL,
  `operador` varchar(255) DEFAULT NULL,
  `operador_id` int(11) DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tourism_route_users` (`operador_id`),
  KEY `FK_tourism_route_cars` (`car_id`),
  KEY `FK_tourism_route_users_2` (`user_id`),
  CONSTRAINT `FK_tourism_route_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tourism_route_users` FOREIGN KEY (`operador_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tourism_route_users_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_files`
--

DROP TABLE IF EXISTS `user_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_files` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(120) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_type_module_rel`
--

DROP TABLE IF EXISTS `user_type_module_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type_module_rel` (
  `user_type_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `actions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_types2`
--

DROP TABLE IF EXISTS `user_types2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_types2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL DEFAULT 3 COMMENT '3 Frontend member',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `newsletter` int(1) DEFAULT 0,
  `status` enum('Active','Inactive','Pending') NOT NULL DEFAULT 'Pending',
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `token_num` varchar(255) DEFAULT NULL,
  `license` varchar(30) NOT NULL,
  `fee_per_day` varchar(20) NOT NULL,
  `license_exp` date NOT NULL,
  `photo_licence` varchar(255) NOT NULL,
  `photo_psicofisico` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `driver_skills` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `view_estimate_request`
--

DROP TABLE IF EXISTS `view_estimate_request`;
/*!50001 DROP VIEW IF EXISTS `view_estimate_request`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_estimate_request` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `telefono`,
 1 AS `correo`,
 1 AS `ruta`,
 1 AS `fecha_inicio`,
 1 AS `fecha_final`,
 1 AS `estado`,
 1 AS `estado_correo`,
 1 AS `nombre_usuario`,
 1 AS `fecha_registro`,
 1 AS `fecha_atencion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_payment_order`
--

DROP TABLE IF EXISTS `view_payment_order`;
/*!50001 DROP VIEW IF EXISTS `view_payment_order`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_payment_order` AS SELECT 
 1 AS `id`,
 1 AS `folio`,
 1 AS `company_name`,
 1 AS `supplier_name`,
 1 AS `applicant`,
 1 AS `concept`,
 1 AS `terms`,
 1 AS `total`,
 1 AS `date`,
 1 AS `status`,
 1 AS `date_reg`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_services`
--

DROP TABLE IF EXISTS `view_services`;
/*!50001 DROP VIEW IF EXISTS `view_services`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_services` AS SELECT 
 1 AS `id`,
 1 AS `customer_name`,
 1 AS `driver`,
 1 AS `car_name`,
 1 AS `date`,
 1 AS `departure`,
 1 AS `destination`,
 1 AS `trip_milage`,
 1 AS `kms_liter`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'mundochs_dev'
--

--
-- Final view structure for view `view_estimate_request`
--

/*!50001 DROP VIEW IF EXISTS `view_estimate_request`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_estimate_request` AS select `r`.`id` AS `id`,`r`.`name` AS `nombre`,`r`.`phone` AS `telefono`,`r`.`email` AS `correo`,`r`.`route` AS `ruta`,`r`.`date_start` AS `fecha_inicio`,`r`.`date_end` AS `fecha_final`,case when `r`.`status` is null then 'Sin atención' when `r`.`status` = 0 then 'Cancelado' when `r`.`status` = 1 then 'Atendido' end AS `estado`,ifnull((select `q`.`mail_status` from (`quotes` `q` join `costperservices` `c`) where `q`.`reference` = `c`.`id` and `c`.`id` = `r`.`costperservices_id` order by `q`.`id` desc limit 1),'Sin asignar') AS `estado_correo`,ifnull((select `u`.`first_name` from `users` `u` where `u`.`id` = `r`.`user_id`),'') AS `nombre_usuario`,`r`.`date_reg` AS `fecha_registro`,`r`.`date_status` AS `fecha_atencion` from `estimate_request` `r` order by `r`.`date_reg` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_payment_order`
--

/*!50001 DROP VIEW IF EXISTS `view_payment_order`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`mundochs_campaig`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_payment_order` AS select `p`.`id` AS `id`,concat_ws('-',date_format(`p`.`date`,'%d%m%Y'),`p`.`id`) AS `folio`,`c`.`name` AS `company_name`,`s`.`name` AS `supplier_name`,concat_ws(' ',`a`.`first_name`,`a`.`last_name`) AS `applicant`,`pc`.`concept` AS `concept`,`p`.`terms` AS `terms`,`p`.`total` AS `total`,`p`.`date` AS `date`,case when `p`.`approved` is null then 'En proceso' when `p`.`approved` = 0 then 'Cancelado' when `p`.`approved` = 1 then 'Aprobado' end AS `status`,`p`.`date_reg` AS `date_reg` from ((((`payment_order` `p` join `supplier` `c` on(`c`.`id` = `p`.`company_id`)) join `supplier` `s` on(`s`.`id` = `p`.`supplier_id`)) join `users` `a` on(`a`.`id` = `p`.`applicant_id`)) join `payment_concept` `pc` on(`pc`.`id` = `p`.`concept_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_services`
--

/*!50001 DROP VIEW IF EXISTS `view_services`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`mundochs_campaig`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_services` AS select `mundochs_dev`.`services`.`id` AS `id`,ifnull((select `c`.`customer_name` from `costperservices` `c` where `c`.`id` = `mundochs_dev`.`services`.`costperservices_id`),'N/A') AS `customer_name`,trim(concat(ifnull(`drivers`.`first_name`,''),' ',ifnull(`drivers`.`last_name`,''))) AS `driver`,`mundochs_dev`.`cars`.`car_name` AS `car_name`,`mundochs_dev`.`services`.`date` AS `date`,`mundochs_dev`.`services`.`departure` AS `departure`,`mundochs_dev`.`services`.`destination` AS `destination`,`mundochs_dev`.`services`.`trip_milage` AS `trip_milage`,`mundochs_dev`.`services`.`kms_liter` AS `kms_liter`,`mundochs_dev`.`services`.`status` AS `status` from ((`services` join `users` `drivers` on(`mundochs_dev`.`services`.`driver_id` = `drivers`.`id`)) join `cars` on(`mundochs_dev`.`services`.`car_id` = `mundochs_dev`.`cars`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-09  9:25:20
