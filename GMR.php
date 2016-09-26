<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharamacy Sales System: Generate Monthly Report</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>

<a href="index.html"><img src="header.jpg" alt="People Health Pharmacy"></a>
<div id="MainDisplay">
<div id="Menu" span="menu">
<a href="AAII.php"><img src="menu1.jpg" alt="Add an Inventory Item"></a><br />
<a href="GMR.php"><img src="menu2.jpg" alt="Generate a Monthly Report"></a><br />
<a href="AASR.php"><img src="menu3.jpg" alt="Add a Sales Record"></a>
		</div>
		<Div id="Body">
			<h2>Generate Monthly Report</h2>
			<h3>Multiple Item Report</h3>
			<form id="multisearch">
				<table>
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
						<td><input type=submit name="multisubmit" value="Submit"><!-- Input PHP code here --></input></td>
					</tr>
				</table>
			</form>
			<form id="Cutomer Range" method="GET">
				<table>
					<tr>
						<td>Custom Dates</td>
					</tr>
					<tr>
						<td><input type="Date" name="FDate"></td>
					</tr>
					<tr>
						<td><input type="Date" name="LDate"></td>
					</tr>
					<tr>
						<td><input type="submit" name="CSubmit" value="Submit"></td>
					</tr>
				</table>
				<input type='submit' name='Export' value='Export to CSV File'>

			</form>

<?php 
		
	if (isset($_GET['FDate'], $_GET['LDate'], $_GET['CSubmit'])) {
		$FDate = date("Y-m-d", strtotime($_GET['FDate']));
		$LDate = date("Y-m-d", strtotime($_GET['LDate']));

	$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
		if (!$conn)
			echo "<p>Couldn't connect to database</p>";
		else
			{
			$query = "SELECT SaleNo, inventorydata.INVName, Date, AmountSold FROM salesdata INNER JOIN inventorydata ON salesdata.InvNo = inventorydata.INVNO where Date BETWEEN '$FDate' AND '$LDate' ORDER by date asc";
			
			$result = mysqli_query($conn, $query);
			
			if(!$result)
				echo "querys wrong";
			else
			{
				$reference = mysqli_fetch_row($result);
				echo "<Table border='1'>
						<tr>
							<td>Sales Number</td>
							<td>Inventory Name</td>
							<td>Date</td>
							<td>Amount Sold</td>
						</tr>";							;
				while($reference)
				{
					echo "
						<tr>
							<td>$reference[0]</td>
							<td>$reference[1]</td>
							<td>$reference[2]</td>
							<td>$reference[3]</td>
						</tr>";
					$reference = mysqli_fetch_row($result);
				}
				echo "</table>";
			}
		}
		mysqli_close($conn);
		
	}
	if (isset($_GET['FDate'], $_GET['LDate'], $_GET['Export'])) {
		$FDate = date("Y-m-d", strtotime($_GET['FDate']));
		$LDate = date("Y-m-d", strtotime($_GET['LDate']));

		$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
			if (!$conn)
				echo "<p>Couldn't connect to database</p>";
			else
			{
				//Reference: http://code.stephenmorley.org/php/creating-downloadable-csv-files/
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename=data.csv');

				$output = fopen('php://output', 'w');
				fputcsv($output, array('Sales Number', 'Inventory Name', 'Date', 'Amount Sold'));
			
				$result = mysql_query("SELECT SaleNo, inventorydata.INVName, Date, AmountSold FROM salesdata INNER JOIN inventorydata ON salesdata.InvNo = inventorydata.INVNO where Date BETWEEN '$FDate' AND '$LDate' ORDER by date asc");

				while ($row = mysql_fetch_assoc($result)) fputcsv($output, $row);

	}
}
?>
				
		</Div>
	</div>
	</body>
</html>