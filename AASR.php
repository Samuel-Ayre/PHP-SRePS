<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>BuyOnline Add A New Sales Record</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
	<body>
		<h1>People Health Pharmacy</h1>
		<div id="MainDisplay">
			<div id="Menu" span="menu">
				<a href="index.html"><h3>Main Menu</h3></a>
				<a href="AAII.php">Add a Inventory Item</a><br />
				<a href="GMR.php">Generate Monthly Report</a><br />
				<a href="AASR.php">Add a Sales Record</a><br />
			</div>
			<Div id="Body">
				<h2>Add A Sales Record</h2>

				<form id ="AASR">
				<table>
						<tr>
							<td>Inventory Item No: </td>
							<td><input type="number" name="INVNo" min="1" max="9999" id="INVNo"></td>
						</tr>
						<tr>
							<td>Date Of Sale</td>
							<td><input type="date" name="Date" id="Date"></td>
						</tr>
						<tr>
							<td>Amount Sold</td>
							<td><input type="number" name="AmountSold" min="1" max="99999" id="AmountSold"></td>
						</tr>
						<tr>
							<td><input type="Submit" name="Submit"></td>
						</tr>
					</table>
				</form>

<?php
	if (isset($_GET['INVNo'], $_GET['Date'], $_GET['AmountSold'])) {
		
	session_start();
	$INVNo = $_GET['INVNo'];
	$Date = strtotime($_GET['Date']);
	$AmountSold = $_GET['AmountSold'];

	//converts date to a acceotable format in MYSQL
	$Date1 = Date('Y-m-d', $Date);



	$conn = mysqli_connect('110.142.49.152:3306/', 'php3', 'php', 'PHP_SREPS');
	if($conn)
	{
		$query = "INSERT INTO salesdata (InvNo, Date, AmountSold) VALUES ('$INVNo', '$Date1', $AmountSold)";
		$result = mysqli_query($conn, $query);
		if($result)
			echo "information successfully added";
		else
			echo "nope";
		mysqli_close($conn);
	}
}
?>



			</div>
		</div>
	</body>
</html>