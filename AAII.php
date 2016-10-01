<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>BuyOnline Add New Item</title>
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
<h2>Adding a Inventory Item</h2>

<form id ="AAII" method = "get">
	<table>
		<tr
		>
			<td width="120px"><label for = "name" id="FormLabel">Item Name:</label></td>
			<td><input type = "text" id = "name" name = "name" maxlength="35" minlength="8" /></td>
		</tr>
		<tr>
			<td><label for = "category" id="FormLabel">Category:</label></td>
			<td><input type = "text" id = "category" name = "category" maxlength="35" minlength="8" n/></td>
		</tr>
		<tr>
			<td><label for = "price" id="FormLabel">Price:</label></td>
			<td><input type = "text" id = "price" name = "price" max="9999" /></td>
		</tr>
		<tr>
			<td><label for = "quantity" id="FormLabel">Quantity:</label></td>
			<td><input type = "number" id = "quantity" name = "quantity" max="9999" /></td>
		</tr>
		<tr>
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
		$error = 0;

		 if (!preg_match("/^[a-zA-Z ]*$/",$name))
            {
                echo "Please only use letters and spaces<br/>"; 
                $error = 1;
            }
         if (!preg_match("/^[a-zA-Z ]*$/",$category))
            {
                echo "Please only use letters and spaces<br/>"; 
                $error = 1;
            }
           if (!preg_match("/^\d+(?:\.\d{2})?$/", $price)) {
				echo "Please enter a valid Price</br>";
				$error = 1;
           }
           if (!preg_match("/^[1-9][0-9]{0,15}$/", $quantity)) {
           		echo "Please enter a valid Quantity";
				$error = 1;
           }

     if ($error = 0) {
     		
     
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
}
?>
</div>
</div>

</body>
</html>

