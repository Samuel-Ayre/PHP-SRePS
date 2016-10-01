<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharmacy - Add a Sale Record</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>
		<div id="Header"><a href="index.html"><img src="img/header.jpg" alt="People Health Pharmacy"></a></div>
		<div id="MainDisplay">
		<div id="Menu" span="menu">
		<a href="AAII.php"><img src="img/menuInv.jpg" alt="Add an Inventory Item"></a><br />
		<a href="AASR.php"><img src="img/menuSale.jpg" alt="Add a Sale Record"></a><br />
		<a href="GMR.php"><img src="img/menuRep.jpg" alt="Generate a Report"></a>
	</div>
			<div id="Body">
				<h2 id="Center">Add a Sale Record</h2>



<?php
	$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
	$max=0;
			$query = "SELECT * FROM inventorydata";
			$result = mysqli_query($conn, $query);
			$reference = mysqli_fetch_row($result);
				echo "<Table border='1'>
						<tr>
							<th>Inventory Number</th>
							<th>Inventory Name</th>
							<th>Category</th>
							<th>Price</th>
							<th>Quantity</th>
						</tr>";	
			while($reference)
					{
						echo "
							<tr>
								<td>$reference[0]</td>
								<td>$reference[1]</td>
								<td>$reference[2]</td>
								<td>$$reference[3]</td>
								<td>$reference[4]</td>
							</tr>";
						$max = $max + 1;
						$reference = mysqli_fetch_row($result);
					}
?>

			<form>
				<table>
						<tr>
							<td><label for="INVNo">Inventory Item No:</label></td>
							<td><input type="number" name="INVNo" min="1" max="9999" id="INVNo"></td>
						</tr>
						<tr>
							<td><label for="Date">Date Of Sale:</label></td>
							<td><input type="date" name="Date" id="Date"></td>
						</tr>
						<tr>
							<td><label for="AmountSold">Quantity Sold:</label></td>
							<td><input type="number" name="AmountSold" min="1" max="99999" id="AmountSold"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="Submit" name="Submit"></td>
						</tr>
					</table>
				</form>
			


<?php
	
	if (isset($_GET['INVNo'], $_GET['Date'], $_GET['AmountSold'])) {
		
	

	$INVNo = $_GET['INVNo'];
	$Date = strtotime($_GET['Date']);
	$AmountSold = $_GET['AmountSold'];

	// if (!($INVNo >= 1 && $INVno <= $max)) {
	// 	echo "Please enter a valid inventory number</br>";

	// }else {
	// if (!($AmountSold >=1 && $AmountSold <= 9999)) {
	// 		echo "Please enter a valid Amount number</br>";
	// 	}else {

		//converts date to a acceotable format in MYSQL
		$Date1 = Date('Y-m-d', $Date);



		$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
		if($conn)
		{
			$query = "INSERT INTO salesdata (InvNo, Date, AmountSold) VALUES ('$INVNo', '$Date1', $AmountSold)";
			$result = mysqli_query($conn, $query);
			if($result)
				echo "information successfully added";
			else
				echo "Failed to upload data, please ensure you have entered in the correct fields";
			mysqli_close($conn);
		}
	}
// 	}
// }

?>
			</div>
			<div id="Help"><a href="help.html"><img src="img/help.jpg" alt="Need Help?"></a></div>
		</div>
	</body>
</html>
