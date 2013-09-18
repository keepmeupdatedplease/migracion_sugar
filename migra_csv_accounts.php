<?php
/***************************************************
*Genera un archivo .sql para importar la tabla account de sugar 4.2.x a 6.5.x.
*No se porque corta los campos cuando encuentra una tilde....
*
*
/***************************************************/
?>
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

echo "\"id\",\"name\",\"date_entered\",\"date_modified\",\"modified_user_id\",\"created_by\",\"description\",\"deleted\",\"assigned_user_id\",\"account_type\",\"industry\",\"annual_revenue\",\"phone_fax\",\"billing_address_street\",\"billing_address_city\",\"billing_address_state\",\"billing_address_postalcode\",\"billing_address_country\",\"rating\",\"phone_office\",\"phone_alternate\",\"website\",\"ownership\",\"employees\",\"ticker_symbol\",\"shipping_address_street\",\"shipping_address_city\",\"shipping_address_state\",\"shipping_address_postalcode\",\"shipping_address_country\",\"parent_id\",\"sic_code\",\"campaign_id\"";
echo "\n";
	while ($row_query = mysql_fetch_array($result_query)) {

			echo "\"" . $row_query['id'] . "\", ";
			echo "\"" . $row_query['name'] . "\", ";
			echo "\"" . $row_query['date_entered'] . "\", ";
			echo "\"" . $row_query['date_modified'] . "\", ";
			echo "\"" . $row_query['modified_user_id'] . "\", ";
			echo "\"" . $row_query['created_by'] . "\", ";
			echo "\"" . $row_query['description'] . "\", ";
			echo "\"" . $row_query['deleted'] . "\", ";
			echo "\"" . $row_query['assigned_user_id'] . "\", ";
			echo "\"" . $row_query['account_type'] . "\", ";
			echo "\"" . $row_query['industry'] . "\", ";
			echo "\"" . $row_query['annual_revenue'] . "\", ";
			echo "\"" . $row_query['phone_fax'] . "\", ";
			echo "\"" . $row_query['billing_address_street'] . "\", ";
			echo "\"" . $row_query['billing_address_city'] . "\", ";
			echo "\"" . $row_query['billing_address_state'] . "\", ";
			echo "\"" . $row_query['billing_address_postalcode'] . "\", ";
			echo "\"" . $row_query['billing_address_country'] . "\", ";
			echo "\"" . $row_query['rating'] . "\", ";
			echo "\"" . $row_query['phone_office'] . "\", ";
			echo "\"" . $row_query['phone_alternate'] . "\", ";
			echo "\"" . $row_query['website'] . "\", ";
			echo "\"" . $row_query['ownership'] . "\", ";
			echo "\"" . $row_query['employees'] . "\", ";
			echo "\"" . $row_query['ticker_symbol'] . "\", ";
			echo "\"" . $row_query['shipping_address_street'] . "\", ";
			echo "\"" . $row_query['shipping_address_city'] . "\", ";
			echo "\"" . $row_query['shipping_address_state'] . "\", ";
			echo "\"" . $row_query['shipping_address_postalcode'] . "\", ";
			echo "\"" . $row_query['shipping_address_country'] . "\", ";
			echo "\"" . $row_query['parent_id'] . "\", ";
			echo "\"" . $row_query['sic_code'] . "\", ";
			echo "\"\""; //campaign_id
			echo "\n";
	}

?>
