<?php
/***************************************************
*Genera un archivo .sql para importar la tabla notes de sugar 4.2.x a 6.5.x.
*
*
/***************************************************/

/*
Estructura sugar 4_2

id
date_entered
date_modified
modified_user_id
created_by
name
filename
file_mime_type
parent_type
parent_id
contact_id
portal_flag
description
deleted



Estructura sugar 6_5

assigned_user_id
id
date_entered
date_modified
modified_user_id
created_by
name
file_mime_type
filename
parent_type
parent_id
contact_id
portal_flag
embed_flag
description
deleted




*/
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



DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `assigned_user_id` char(36) DEFAULT NULL,
  `id` char(36) NOT NULL,
  `date_entered` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `modified_user_id` char(36) DEFAULT NULL,
  `created_by` char(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file_mime_type` varchar(100) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `contact_id` char(36) DEFAULT NULL,
  `portal_flag` tinyint(1) DEFAULT NULL,
  `embed_flag` tinyint(1) DEFAULT '0',
  `description` text,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_note_name` (`name`),
  KEY `idx_notes_parent` (`parent_id`,`parent_type`),
  KEY `idx_note_contact` (`contact_id`),
  KEY `idx_notes_assigned_del` (`deleted`,`assigned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;


<?php
require_once("databases.php");

$query = "SELECT * FROM notes ";
$query .= "WHERE deleted = 0";


 
	$result_query = mysql_query($query, $connection);
 		if (!$result_query) {
			die("Database query failed: " . mysql_error());
		}

	$aux = 0; //simplemente un flag para que en el loop siguiente cierren bien los parentesis.

			echo "INSERT INTO `notes` VALUES (";
	while ($row_query = mysql_fetch_array($result_query)) {

			if ($aux == 0) {
			}else{
			echo ",(";
			}
		/*Así tiene que ser el output.
		
			Estructura sugar 6_5
			
			assigned_user_id
			id
			date_entered
			date_modified
			modified_user_id
			created_by
			name
			file_mime_type
			filename
			parent_type
			parent_id
			contact_id
			portal_flag
			embed_flag
			description
			deleted

		*/

		//***********************************************************************	
			echo "'" . $row_query['date_modified'] . "', "; //para suplantar assigned_user_id
			echo "'" . $row_query['id'] . "', ";
			echo "'" . $row_query['date_entered'] . "', ";
			echo "'" . $row_query['date_modified'] . "', ";
			echo "'" . $row_query['modified_user_id'] . "', ";
			echo "'" . $row_query['created_by'] . "', ";
			echo "'" . $row_query['name'] . "', ";
			echo "'" . $row_query['filename'] . "', ";
			echo "'" . $row_query['file_mime_type'] . "', ";
			echo "'" . $row_query['parent_type'] . "', ";
			echo "'" . $row_query['parent_id'] . "', ";
			echo "'" . $row_query['contact_id'] . "', ";
			echo "'" . $row_query['portal_flag'] . "', ";
			echo "'" . $row_query['description'] . "', ";
			echo "'" . $row_query['deleted'];
			echo ")";
	
			$aux=1;
	}
			echo ";";


?>
