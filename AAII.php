<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharmacy - Add an Inventory Item</title>
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
<h2 id="Center">Add an Inventory Item</h2>

<form id ="AAII" action = "addItem.php" method = "get">
	<table>
		<tr>
			<td><label for = "name">Item Name:</label></td>
			<td><input type = "text" id = "name" name = "name"/></td>
		</tr>
		<tr>
			<td><label for = "category">Category:</label></td>
			<td><input type = "text" id = "category" name = "category"/></td>
		</tr>
		<tr>
			<td><label for = "price">Price:</label></td>
			<td><input type = "text" id = "price" name = "price"/></td>
		</tr>
		<tr>
			<td><label for = "quantity">Quantity:</label></td>
			<td><input type = "number" id = "quantity" name = "quantity"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type = "submit" value = "Submit"/></td>
		</tr>
	</table>
</form>

<?php
	if(isset($_GET['name'],$_GET['category'],$_GET['price'], $_GET['quantity']))
		{	
	session_start();
	$name = $_GET['name'];
	$category = $_GET['category'];
	$price = $_GET['price'];
	$quantity = $_GET['quantity'];

	$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
	if($conn)
	{
		$query = "INSERT INTO Inventorydata (INVName, Category, Price, Quantity) VALUES ('$name', '$category', $price, $quantity)";
		$result = mysqli_query($conn, $query);
		if($result)
			echo "<p>information successfully added<p>";
		else
			echo "nope";
		mysqli_close($conn);
	}
}
?>
</div>
<div id="Help"><a href="help.html"><img src="img/help.jpg" alt="Need Help?"></a></div>
</div>

</body>
</html>

