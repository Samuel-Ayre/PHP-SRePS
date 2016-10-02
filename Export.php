<?php		
		$FDate = $_GET['FDate'];
		$LDate = $_GET['LDate'];

		Export($FDate, $LDate);

		function Export($FDate, $LDate){
		$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
			if (!$conn)
				echo "<p>Couldn't connect to database</p>";
			else
			{
				//Reference: http://code.stephenmorley.org/php/creating-downloadable-csv-files/
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename=data.csv');
				//writes the output to a CSV file
				$output = fopen('php://output', 'w');
				fputcsv($output, array('Sales Number', 'Inventory Name', 'Date', 'Amount Sold'));
			
				$query = "SELECT SaleNo, inventorydata.INVName, Date, AmountSold FROM salesdata INNER JOIN inventorydata ON salesdata.InvNo = inventorydata.INVNO where Date BETWEEN '$FDate' AND '$LDate' ORDER by date asc";
			
				$result = mysqli_query($conn, $query);
			
				if(!$result)
					echo "Failed to upload data, please ensure you have entered in the correct fields";
				else
				{
					//for every row write to file
					$reference = mysqli_fetch_row($result);
					while ($reference) {
						fputcsv($output, array($reference[0], $reference[1],$reference[2], $reference[3]));
						$reference = mysqli_fetch_row($result);
					}
			
			}
			mysqli_close($conn);
		}
		}
	
?>