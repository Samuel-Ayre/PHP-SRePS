<?php
	$month = $_Get['month'];

	switch ($month) {
		case 'January':
			$month = "Date >= '2016/01/01' and <= '2016/01/31'"
			break;
		case 'February':
			$month = "Date >= '2016/02/01' and <= '2016/02/29'"
			break;
		case 'March':
			$month = "Date >= '2016/03/01' and <= '2016/03/31'"
			break;
		case 'April':
			$month = "Date >= '2016/04/01' and <= '2016/04/30'"
			break;
		case 'May':
			$month = "Date >= '2016/05/01' and <= '2016/05/31'"
			break;
		case 'June':
			$month = "Date >= '2016/06/01' and <= '2016/06/30'"
			break;
		case 'July':
			$month = "Date >= '2016/07/01' and <= '2016/07/31'"
			break;
		case 'August':
			$month = "Date >= '2016/08/01' and <= '2016/08/31'"
			break;
		case 'September':
			$month = "Date >= '2016/09/01' and <= '2016/09/30'"
			break;
		case 'October':
			$month = "Date >= '2016/10/01' and <= '2016/10/31'"
			break;
		case 'November':
			$month = "Date >= '2016/11/01' and <= '2016/11/30'"
			break;
		case 'December':
			$month = "Date >= '2016/12/01' and <= '2016/12/31'"
			break;
		default:
			break;
	}
	
	$conn = mysqli_connect('http://110.142.49.152:32123/', 'root', 'TeamGreen123', 'PHP-SRePS');
		if (!$conn)
			echo "<p>Couldn't connect to database</p>";
		else
			$query = "Select * from SalesData where $month"
			
			$result = mysqli_query($conn, $query);
		
			$reference = mysqli_fetch_row($result);
			echo "$reference";

		mysqli_close($conn);
?>