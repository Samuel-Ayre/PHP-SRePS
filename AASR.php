<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>BuyOnline Add A New Sales Record</title>
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
				<h2>Add A Sales Record</h2>



<?php
	$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
	$max=0;
			$query = "SELECT * FROM inventorydata";
			$result = mysqli_query($conn, $query);
			$reference = mysqli_fetch_row($result);
				echo "<Table border='1'>
						<tr>
							<td width='150px'>Inventory Number</td>
							<td width='150px'>Inventory Name</td>
							<td width='150px'>Category</td>
							<td width='150px'>Price</td>
							<td width='150px'>Quantity</td>
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
							<td><label for="INVNo" id="FormLabel">Inventory Item No:</label></td>
							<td><input type="number" name="INVNo" min="1" max="9999" id="INVNo"></td>
						</tr>
						<tr>
							<td><label for="Date" id="FormLabel">Date Of Sale:</label></td>
							<td><input type="date" name="Date" id="Date"></td>
						</tr>
						<tr>
							<td><label for="AmountSold" id="FormLabel">Amount Sold:</label></td>
							<td><input type="number" name="AmountSold" min="1" max="9999" id="AmountSold"></td>
						</tr>
						<tr>
							<td><input type="Submit" name="Submit"></td>
						</tr>
					</table>
				</form>
			


<?php
	
	if (isset($_GET['INVNo'], $_GET['Date'], $_GET['AmountSold'])) {
		
	

	$INVNo = $_GET['INVNo'];
	$Date = $_GET['Date'];
	$AmountSold = $_GET['AmountSold'];
	$INVNo = intval($INVNo);
	$error = 0;

	 if (!preg_match("/^[1-9][0-9]{0,15}$/", $INVNo)) {
           		echo "Please enter a valid inventory number<br/>";
				$error = 1;
			}else if ($INVNo >= $max) {
			echo "Please enter in a valid inventory number<br/>";
			$error = 1;
		}

	 if (!preg_match("/^[1-9][0-9]{0,15}$/", $AmountSold)) {
	           		echo "Please enter a valid Amount<br/>";
					$error = 1;
				}

		if ($error = 0) {
			
		$Date = strtotime($_GET['Date']);
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
}

?>
			</div>
		</div>
	</body>
</html>
