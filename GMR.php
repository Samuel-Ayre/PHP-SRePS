<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharamacy Sales System: Generate Monthly Report</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>

	<h1>People Health Pharmacy - Sales and Inventory Management</h1>
	<div id="MainDisplay">
		<div id="Menu" span="menu">
			<a href="index.html"><h3>Main Menu</h3></a>
			<a href="AAII.php">Add a Inventory Item</a><br />
			<a href="GMR.php">Generate Monthly Report</a><br />
			<a href="AASR.php">Add a Sales Record</a><br />
		</div>
		<Div id="Body">
			<h2>Generate Monthly Report</h2>
			<h3>Multiple Item Report</h3>
			<form id="multisearch">
<!-- 				<table>
					<tr>
						<td>Item 1 Name</td>
						<td><input type=text name="i1name" width=30px maxlength=255></input></td>
					</tr>
					<tr>
						<td>Item 2 Name</td>
						<td><input type=text name="i2name" width=30px maxlength=255></input></td>
					</tr>
					<tr>
						<td>Item 3 Name</td>
						<td><input type=text name="i3name" width=30px maxlength=255></input></td>
					</tr>
					<tr>
						<td><input type=submit name="multisubmit" value="Submit"></input></td>
					</tr>
				</table>
			 </form>-->
			<h3>All Item Report</h3>
			<form id="allsearch">
				<table>
					<tr>
						<td><select name="Month" id="Month">
							<option Value="January">January</option>
							<option Value="February">February</option>
							<option Value="March">March</option>
							<option Value="April">April</option>
							<option Value="May">May</option>
							<option Value="June">June</option>
							<option Value="July">July</option>
							<option Value="August">August</option>
							<option Value="September">September</option>
							<option Value="October">October</option>
							<option Value="November">November</option>
							<option Value="December">December</option>
						</select>
						<td><input type=submit name="allsubmit" value="Submit"></input></td>
					</tr>
				</table>
			</form>





<?php
	if (isset($_GET['Month'])) {
	
	session_start();
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
	$sales = 0;
	$total = 0;
	$conn = mysqli_connect('110.142.49.152:3306/', 'php3', 'php', 'PHP_SREPS');
		if (!$conn)
			echo "<p>Couldn't connect to database</p>";
		else
			{
			$query = "Select inventorydata.INVName, SaleNo, Date, AmountSold, inventorydata.Price from salesdata INNER JOIN inventorydata on Salesdata.INVno=inventorydata.INVNo where $month";
			
			$result = mysqli_query($conn, $query);
			
			if(!$result)
				echo "querys wrong";
			else
			{	
				echo "<table border='1'>
							<tr>
								<td>Inventory Item Name</td>
								<td>Sale Number</td>
								<td>Date of Sales</td>
								<td>Amount Sold</td>
							</tr>

				";
				$reference = mysqli_fetch_row($result);
				while($reference)
				{
					echo "<tr>
								<td>$reference[0]</td> 
								<td>$reference[1]</td>
								<td>$reference[2]</td> 
								<td>$reference[3]</td>
							</tr>";
						$sales=$reference[3] * $reference[4];
						$total=$total + $sales;
					$reference = mysqli_fetch_row($result);
				}
				echo "
				<tr>
					<tr>
						<td> total sales </td>
						<td></td>
						<td></td>
						<td>$ $total</td>

					</tr>
				</table>";
			}
		}
		mysqli_close($conn);
	}
?>

		</Div>
	</div>
	</body>
</html>
