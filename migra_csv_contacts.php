<?php
/*----------------------------------------
Estructura de Contacts en 4.2

id
deleted
date_entered
date_modified
modified_user_id
assigned_user_id
created_by
salutation
first_name
last_name
lead_source
title
department
reports_to_id
birthdate
do_not_call // no importar
phone_home
phone_mobile
phone_work
phone_other
phone_fax
email1
email2
assistant
assistant_phone
email_opt_out // no importar
primary_address_street
primary_address_city
primary_address_state
primary_address_postalcode
primary_address_country
alt_address_street
alt_address_city
alt_address_state
alt_address_postalcode
alt_address_country
description
portal_name
portal_active // no importar
portal_app
invalid_email // no importar


-----------------------------------------
Estructura de Contacts en 6.5

id
date_entered
date_modified
modified_user_id
created_by
description
deleted
assigned_user_id
salutation
first_name
last_name
title
department
do_not_call // no importar
phone_home
phone_mobile
phone_work
phone_other
phone_fax
primary_address_street
primary_address_city
primary_address_state
primary_address_postalcode
primary_address_country
alt_address_street
alt_address_city
alt_address_state
alt_address_postalcode
alt_address_country
assistant
assistant_phone
lead_source
reports_to_id
birthdate
campaign_id
/*----------------------------------------*/
require_once("databases.php");

$query = "SELECT * FROM contacts ";
$query .= "WHERE deleted = 0";


 
	$result_query = mysql_query($query, $connection);
 		if (!$result_query) {
			die("Database query failed: " . mysql_error());
		}

echo "\"id\",\"date_entered\",\"date_modified\",\"modified_user_id\",\"created_by\",\"description\",\"deleted\",\"assigned_user_id\",\"salutation\",\"first_name\",\"last_name\",\"title\",\"department\",\"phone_home\",\"phone_mobile\",\"phone_work\",\"phone_other\",\"primary_address_street\",\"primary_address_city\",\"primary_address_state\",\"primary_address_postalcode\",\"primary_address_country\",\"alt_address_street\",\"alt_address_city\",\"alt_address_state\",\"alt_address_postalcode\",\"alt_address_country\",\"assistant\",\"assistant_phone\",\"lead_source\",\"reports_to_id\",\"birthdate\",\"\",\"phone_fax\",\"email1\",\"email2\",\"portal_name\",\"portal_app\"";
echo "\n";

	while ($row_query = mysql_fetch_array($result_query)) {


			echo "\"" . $row_query['id'] . "\", ";
			echo "\"" . $row_query['date_entered'] . "\", ";
			echo "\"" . $row_query['date_modified'] . "\", ";
			echo "\"" . $row_query['modified_user_id'] . "\", ";
			echo "\"" . $row_query['created_by'] . "\", ";
			echo "\"" . $row_query['description'] . "\", ";
			echo "\"" . $row_query['deleted'] . "\", ";
			echo "\"" . $row_query['assigned_user_id'] . "\", ";
			echo "\"" . $row_query['salutation'] . "\", ";
			echo "\"" . $row_query['first_name'] . "\", ";
			echo "\"" . $row_query['last_name'] . "\", ";
			echo "\"" . $row_query['title'] . "\", ";
			echo "\"" . $row_query['department'] . "\", ";
//			echo "\"" . $row_query['do_not_call '] . "\", "; No se incluye por irrelevante.
			echo "\"" . $row_query['phone_home'] . "\", ";
			echo "\"" . $row_query['phone_mobile'] . "\", ";
			echo "\"" . $row_query['phone_work'] . "\", ";
			echo "\"" . $row_query['phone_other'] . "\", ";
			echo "\"" . $row_query['primary_address_street'] . "\", ";
			echo "\"" . $row_query['primary_address_city'] . "\", ";
			echo "\"" . $row_query['primary_address_state'] . "\", ";
			echo "\"" . $row_query['primary_address_postalcode'] . "\", ";
			echo "\"" . $row_query['primary_address_country'] . "\", ";

			echo "\"" . $row_query['alt_address_street'] . "\", ";
			echo "\"" . $row_query['alt_address_city'] . "\", ";
			echo "\"" . $row_query['alt_address_state'] . "\", ";
			echo "\"" . $row_query['alt_address_postalcode'] . "\", ";
			echo "\"" . $row_query['alt_address_country'] . "\", ";

			echo "\"" . $row_query['assistant'] . "\", ";
			echo "\"" . $row_query['assistant_phone'] . "\", ";
			echo "\"" . $row_query['lead_source'] . "\", ";
			echo "\"" . $row_query['reports_to_id'] . "\", ";
			echo "\"" . $row_query['birthdate'] . "\", ";
			echo "\"\", "; // campaign_id

			echo "\"" . $row_query['phone_fax'] . "\", ";
			echo "\"" . $row_query['email1'] . "\", ";
			echo "\"" . $row_query['email2'] . "\", ";
//			echo "\"" . $row_query['email_opt_out '] . "\", "; //no está en sugar 6_5 y además no nos sirve.
			echo "\"" . $row_query['portal_name'] . "\", ";
//			echo "\"" . $row_query['portal_active '] . "\", "; //no está en sugar 6_5 y además no nos sirve.
			echo "\"" . $row_query['portal_app'] . "\", ";
//			echo "\"" . $row_query['invalid_email '] . "\", ";//no está en sugar 6_5 y además no nos sirve.
			echo "\n";
	}

?>
