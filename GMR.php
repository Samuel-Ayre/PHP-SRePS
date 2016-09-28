<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharamacy Sales System: Generate Monthly Report</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>

	<a href="index.html"><img src="img/header.jpg" alt="People Health Pharmacy"></a>
	<div id="MainDisplay">
		<div id="Menu" span="menu">
		<a href="AAII.php"><img src="img/menu1.jpg" alt="Add an Inventory Item"></a><br />
		<a href="GMR.php"><img src="img/menu2.jpg" alt="Generate a Monthly Report"></a><br />
		<a href="AASR.php"><img src="img/menu3.jpg" alt="Add a Sales Record"></a>
	</div>
		<Div id="Body">
			<h2>Generate Monthly Report</h2>
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
				echo "<a href=Export.php?FDate=",urlencode($FDate),"&LDate=",urlencode($LDate),">Export to CSV File</a>";
			}
		}
		mysqli_close($conn);
		
	}
?>
		


		</Div>
	</div>
	</body>
</html>