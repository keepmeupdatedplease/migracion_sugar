<?php
//	include 'required.php';
	require_once("databases.php");
	include 'class.pdf.php';
	include 'class.ezpdf.php';

			
		$pdf = new Cpdf(); 
		$pdf->selectFont('./fonts/Helvetica');
		
		
		$query = "select a.name, c.salutation, c.first_name, c.last_name, c.title, a.billing_address_street, a.billing_address_city, a.billing_address_state, a.billing_address_postalcode ";
		$query .= "from contacts c ";
		$query .= "inner join contacts_cstm cc on c.id = cc.id_c ";
		$query .= "inner join accounts_contacts ac on c.id = ac.contact_id ";
		$query .= "inner join accounts a on a.id = ac.account_id ";	
		$query .= "inner join accounts_cstm acs on acs.id_c = a.id ";
		$query .= "where cc.Recibe_Kairos_c = 1 ";
		$query .= "AND a.name != 'Borrar' ";
		$query .= "AND a.name != 'Fuera de Industria' ";
		$query .= "AND c.deleted = 0 ";
		$query .= "AND ac.deleted = 0 ";
		$query .= "AND a.deleted = 0 ";
		$query .= "AND acs.Zona_c != '999' ";
		$query .= "ORDER BY a.name ";

		
								
		$result_query = mysql_query($query, $connection);
 		if (!$result_query) {
			die("Database query failed: " . mysql_error());
		}



		$max = mysql_num_rows($result_query);
		$et=0;


		while ($et<$max) {
			$y=0;
			$x=0;
			$et+=30;

				for ($i=0; $i<10;$i++) {
					$x=0;

					for ($v=0; $v<3; $v++) {
						$row_query = mysql_fetch_array($result_query);
						$nombre_completo = $row_query[2] . " " . $row_query[3] ;
						$direccion = $row_query[8] . "," . $row_query[6];
						$cuenta = "<b> ".$row_query[0]."</b>";
						$pdf->addText($x+10,$y+750,10,$cuenta);
						$pdf->addText($x+10,$y+740,10,$nombre_completo);
						$pdf->addText($x+10,$y+730,10,$row_query[5]);
						$pdf->addText($x+10,$y+720,10,$direccion);
						$pdf->addText($x+10,$y+710,10,$row_query[7]);
						$x+=205;
					}
			
					$y-=75;
			
				}

				$pdf->newPage(); 
			}
	
				
		$string_randomeado = "etiqueta_kairos_sin999_".md5(rand()).".pdf";

		$pdfcode = $pdf->output(); 
		$fp=fopen($string_randomeado,'wb'); 
		fwrite($fp,$pdfcode); 
		fclose($fp);
?>		
		<html>
			<head>
				<title>Remitos</title>
			</head>
			<body>
			<a href=<?php echo $string_randomeado; ?>>etiquetas_kairos_sin999.pdf</a>
					<br>
				<a href="menu.php">Volver</a>


			</body>
		</html>
<?	
?>

