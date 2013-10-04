<?php
/***************************************************
*Genera un archivo .sql para importar la tabla account de sugar 4.2.x a 6.5.x.
*No se porque corta los campos cuando encuentra una tilde....
*
*
/***************************************************/
?>
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sugar_6_5
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` char(36) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `modified_user_id` char(36) DEFAULT NULL,
  `created_by` char(36) DEFAULT NULL,
  `description` text,
  `deleted` tinyint(1) DEFAULT '0',
  `assigned_user_id` char(36) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `industry` varchar(50) DEFAULT NULL,
  `annual_revenue` varchar(100) DEFAULT NULL,
  `phone_fax` varchar(100) DEFAULT NULL,
  `billing_address_street` varchar(150) DEFAULT NULL,
  `billing_address_city` varchar(100) DEFAULT NULL,
  `billing_address_state` varchar(100) DEFAULT NULL,
  `billing_address_postalcode` varchar(20) DEFAULT NULL,
  `billing_address_country` varchar(255) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL,
  `phone_office` varchar(100) DEFAULT NULL,
  `phone_alternate` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `ownership` varchar(100) DEFAULT NULL,
  `employees` varchar(10) DEFAULT NULL,
  `ticker_symbol` varchar(10) DEFAULT NULL,
  `shipping_address_street` varchar(150) DEFAULT NULL,
  `shipping_address_city` varchar(100) DEFAULT NULL,
  `shipping_address_state` varchar(100) DEFAULT NULL,
  `shipping_address_postalcode` varchar(20) DEFAULT NULL,
  `shipping_address_country` varchar(255) DEFAULT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `sic_code` varchar(10) DEFAULT NULL,
  `campaign_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_accnt_id_del` (`id`,`deleted`),
  KEY `idx_accnt_name_del` (`name`,`deleted`),
  KEY `idx_accnt_assigned_del` (`deleted`,`assigned_user_id`),
  KEY `idx_accnt_parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
<?php
/*
Estructura de Accounts en sugar 4.2.1:
----------------------------------------------------------------------
id
date_entered
date_modified
modified_user_id
assigned_user_id
created_by
name
parent_id
account_type
industry
annual_revenue
phone_fax
billing_address_street
billing_address_city
billing_address_state
billing_address_postalcode
billing_address_country
description
rating
phone_office
phone_alternate
email1 <---------- No está en 6.5.x
email2 <---------- No está en 6.5.x
website
ownership
employees
sic_code
ticker_symbol
shipping_address_street
shipping_address_city
shipping_address_state
shipping_address_postalcode
shipping_address_country
deleted

Estructura de Accounts en sugar 6.5.15
----------------------------------------------------------------------

id
name
date_entered
date_modified
modified_user_id
created_by
description
deleted
assigned_user_id
account_type
industry
annual_revenue
phone_fax
billing_address_street
billing_address_city
billing_address_state
billing_address_postalcode
billing_address_country
rating
phone_office
phone_alternate
website
ownership
employees
ticker_symbol
shipping_address_street
shipping_address_city
shipping_address_state
shipping_address_postalcode
shipping_address_country
parent_id
sic_code
campaign_id <---------- Agregado en 6.5 ; no está en 4.2 

*/
require_once("databases.php");

$query = "SELECT * FROM accounts ";
$query .= "WHERE deleted = 0";


 
	$result_query = mysql_query($query, $connection);
 		if (!$result_query) {
			die("Database query failed: " . mysql_error());
		}

	$aux = 0; //simplemente un flag para que en el loop siguiente cierren bien los parentesis.

			echo "INSERT INTO `accounts` VALUES (";
	while ($row_query = mysql_fetch_array($result_query)) {

			if ($aux == 0) {
			}else{
			echo ",(";
			}
			
//			$description = fgetcsv($row_query['description']);
			echo "'" . $row_query['id'] . "', ";
			echo "'" . $row_query['name'] . "', ";
			echo "'" . $row_query['date_entered'] . "', ";
			echo "'" . $row_query['date_modified'] . "', ";
			echo "'" . $row_query['modified_user_id'] . "', ";
			echo "'" . $row_query['created_by'] . "', ";
			$description = $row_query['description'];
			str_replace(array("\r","\n"), array('',''), $description);
			echo "'" . $description . "', ";
//			echo "'" . $row_query['description'] . "', ";
			echo "'" . $row_query['deleted'] . "', ";
			echo "'" . $row_query['assigned_user_id'] . "', ";
			echo "'" . $row_query['account_type'] . "', ";
			echo "'" . $row_query['industry'] . "', ";
			echo "'" . $row_query['annual_revenue'] . "', ";
			echo "'" . $row_query['phone_fax'] . "', ";
			echo "'" . $row_query['billing_address_street'] . "', ";
			echo "'" . $row_query['billing_address_city'] . "', ";
			echo "'" . $row_query['billing_address_state'] . "', ";
			echo "'" . $row_query['billing_address_postalcode'] . "', ";
			echo "'" . $row_query['billing_address_country'] . "', ";
			echo "'" . $row_query['rating'] . "', ";
			echo "'" . $row_query['phone_office'] . "', ";
			echo "'" . $row_query['phone_alternate'] . "', ";
			echo "'" . $row_query['website'] . "', ";
			echo "'" . $row_query['ownership'] . "', ";
			echo "'" . $row_query['employees'] . "', ";
			echo "'" . $row_query['ticker_symbol'] . "', ";
			echo "'" . $row_query['shipping_address_street'] . "', ";
			echo "'" . $row_query['shipping_address_city'] . "', ";
			echo "'" . $row_query['shipping_address_state'] . "', ";
			echo "'" . $row_query['shipping_address_postalcode'] . "', ";
			echo "'" . $row_query['shipping_address_country'] . "', ";
			echo "'" . $row_query['parent_id'] . "', ";
			echo "'" . $row_query['sic_code'] . "', ";
			echo "''"; //campaign_id
			echo ")";
	
			$aux=1;
	}
			echo ";";


?>
