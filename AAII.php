<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>BuyOnline Add New Item</title>
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
<h2>Adding a Inventory Item</h2>

<form id ="AAII">

<p><label for = "name">Item Name</label>
	<input type = "text" id = "name" name = "name"/></p>
<p><label for = "category">Category</label>
	<input type = "text" id = "category" name = "category"/></p>
<p><label for = "price">Price</label>
	<input type = "text" id = "price" name = "price"/></p>
<p><label for = "quantity">Quantity</label>
	<input type = "number" id = "quantity" name = "quantity"/></p>
<p><input type = "submit" value = "Submit"/>


</form>
<?php
	if(isset($_GET['name'],$_GET['category'],$_GET['price'], $_GET['quantity']))
		{	
	session_start();
	$name = $_GET['name'];
	$category = $_GET['category'];
	$price = $_GET['price'];
	$quantity = $_GET['quantity'];

	$conn = mysqli_connect('110.142.49.152:3306/', 'php3', 'php', 'PHP_SREPS');
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
</div>

</body>
</html>

