<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharmacy - Add a Sale Record</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>
	<!-- This is the menu for the website, allowing users to navigate the various webpageds  -->
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
	$max = [];
			$query = "SELECT * FROM inventorydata";
			$result = mysqli_query($conn, $query);
			$reference = mysqli_fetch_row($result);
				echo "<Table border='1'>
						<tr>
							<td width='150px'>Inventory Number</td>
							<td width='300px'>Inventory Name</td>
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
						$max[] = $reference[0];
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
	$Date = $_GET['Date'];
	$AmountSold = $_GET['AmountSold'];
	$INVNo = intval($INVNo);
	$error = 0;
			echo "<div id='error'";
      
	//validates if value is a integer then checks if it is greater than the values 
	 if (!preg_match("/^[1-9][0-9]{0,15}$/", $INVNo)) {
           		echo "Please enter a valid inventory number<br/>";
				$error = 1;
			}else if (!in_array($INVNo, $max)) {
			echo "Please enter in a valid inventory number<br/>";
			$error = 1;
		}
	 if (!preg_match("/^[1-9][0-9]{0,15}$/", $AmountSold)) {
	           		echo "Please enter a valid Amount<br/>";
					$error = 1;
				}
    echo "</div>";
		if ($error == 0) {
			
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
			<div id="Help"><a href="help.html"><img src="img/help.jpg" alt="Need Help?"></a></div>
		</div>
	</body>
</html>
