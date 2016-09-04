<?php
	$month = $_GET['Month'];

	switch ($month) {
		case 'January':
			$month = "MONTH(Date) = 1";
			break;
		case 'February':
			$month = "MONTH(Date) = 2";
			break;
		case 'March':
			$month = "MONTH(Date) = 3";
			break;
		case 'April':
			$month = "MONTH(Date) = 4";
			break;
		case 'May':
			$month = "MONTH(Date) = 5";
			break;
		case 'June':
			$month = "MONTH(Date) = 6";
			break;
		case 'July':
			$month = "MONTH(Date) = 7";
			break;
		case 'August':
			$month = "MONTH(Date) = 8";
			break;
		case 'September':
			$month = "MONTH(Date) = 9";
			break;
		case 'October':
			$month = "MONTH(Date) = 10";
			break;
		case 'November':
			$month = "MONTH(Date) = 11";
			break;
		case 'December':
			$month = "MONTH(Date) = 12";
			break;
		default:
			break;
	}
	$month .= " AND YEAR(Date) = 2016";
	
	$conn = mysqli_connect('110.142.49.152:3306/', 'php3', 'php', 'PHP_SREPS');
		if (!$conn)
			echo "<p>Couldn't connect to database</p>";
		else
			{
			$query = "Select * from salesdata where $month";
			
			$result = mysqli_query($conn, $query);
			
			if(!$result)
				echo "querys wrong";
			else
			{
				$reference = mysqli_fetch_row($result);
				while($reference)
				{
					echo "$reference[0], $reference[1], $reference[2], $reference[3] \n";
					$reference = mysqli_fetch_row($result);
				}
			}
		}
		mysqli_close($conn);
?>