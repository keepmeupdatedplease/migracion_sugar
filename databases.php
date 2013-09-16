<?php

//Local
//$connection = mysql_connect("localhost","root","root");
	
//Publicado
$connection = mysql_connect("localhost","root","root");

	if (!$connection) {
		die("Database error: ".mysql_error());
	}
	
	
	$db_select = mysql_select_db("sugar_4_2",$connection);
	
	if (!$db_select) {
		die("Database selection failed: ".mysql_error());
	}
	
	


?>
