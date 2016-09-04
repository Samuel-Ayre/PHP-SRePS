<?php
	$month = $_GET['Month'];

	switch ($month) {
		case 'January':
			$month = "MONTH(date) = 1";
			break;
		case 'February':
			$month = "MONTH(date) = 2";
			break;
		case 'March':
			$month = "MONTH(date) = 3";
			break;
		case 'April':
			$month = "MONTH(date) = 4";
			break;
		case 'May':
			$month = "MONTH(date) = 5";
			break;
		case 'June':
			$month = "MONTH(date) = 6";
			break;
		case 'July':
			$month = "MONTH(date) = 7";
			break;
		case 'August':
			$month = "MONTH(date) = 8";
			break;
		case 'September':
			$month = "MONTH(date) = 9";
			break;
		case 'October':
			$month = "MONTH(date) = 10";
			break;
		case 'November':
			$month = "MONTH(date) = 11";
			break;
		case 'December':
			$month = "MONTH(date) = 12";
			break;
		default:
			break;
	}
	$month += " AND YEAR(date) = 2016";
	
	$conn = mysqli_connect('110.142.49.152:3306/', 'php3', 'php', 'PHP_SREPS');
		if (!$conn)
			echo "<p>Couldn't connect to database</p>";
		else
			{
			$query = "Select * from SalesData where $month";
			
			$result = mysqli_query($conn, $query);
		
			$reference = mysqli_fetch_row($result);

			echo "$reference";
		}
		mysqli_close($conn);
?>