<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharmacy - Generate a Report</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>

<div id="Header"><a href="index.html"><img src="img/header.jpg" alt="People Health Pharmacy"></a></div>
	<div id="MainDisplay">
		<div id="Menu" span="menu">
		<a href="AAII.php"><img src="img/menuInv.jpg" alt="Add an Inventory Item"></a><br />
		<a href="AASR.php"><img src="img/menuSale.jpg" alt="Add a Sales Record"></a><br />
		<a href="GMR.php"><img src="img/menuRep.jpg" alt="Generate a Report"></a>
	</div>
		<div id="Body">
			<h2 id="Center">Generate a Report</h2>
			<form id="Cutomer Range" method="GET">
				<table>
					<tr>
						<td><label>From:</label></td>
						<td><input type="Date" name="FDate"></td>
					</tr>
					<tr>
						<td><label>To:</label></td>
						<td><input type="Date" name="LDate"></td>
					</tr>
					<tr>
						<td></td>
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
							<th>Sales Number</th>
							<th>Inventory Name</th>
							<th>Date</th>
							<th>Amount Sold</th>
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
		


		</div>
		<div id="Help"><a href="help.html"><img src="img/help.jpg" alt="Need Help?"></a></div>
	</div>
	</body>
</html>