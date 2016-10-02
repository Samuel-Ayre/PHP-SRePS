<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>People Health Pharmacy - Add an Inventory Item</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
<body>
<!-- This is the menu for the website, allowing users to navigate the various webpageds  -->
<div id="Header"><a href="index.html"><img src="img/header.jpg" alt="People Health Pharmacy"></a></div>
<div id="MainDisplay">
		<div id="Menu" span="menu">
		<a href="AAII.php"><img src="img/menuInv.jpg" alt="Add an Inventory Item"></a><br />
		<a href="AASR.php"><img src="img/menuSale.jpg" alt="Add a Sales Record"></a><br />
		<a href="GMR.php"><img src="img/menuRep.jpg" alt="Generate a Report"></a>
		</div>
<div id="Body">
<h2 id="Center">Add an Inventory Item</h2>

<form id ="AAII" method = "get">
	<table>
		<tr>
			<td><label for = "name">Item Name:</label></td>
			<td><input type = "text" id = "name" name = "name" maxlength="60" minlength="8"/></td>
		</tr>
		<tr>
			<td><label for = "category">Category:</label></td>
			<td><input type = "text" id = "category" name = "category" maxlength="35" minlength="8"/></td>
		</tr>
		<tr>
			<td><label for = "price">Price:</label></td>
			<td><input type = "text" id = "price" name = "price"  max="9999"/></td>
		</tr>
		<tr>
			<td><label for = "quantity">Quantity:</label></td>
			<td><input type = "number" id = "quantity" name = "quantity"  max="9999"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type = "submit" value = "Submit"/></td>
		</tr>
	</table>
</form>


		
<?php
	// this is used to check if inputs have been given and then if so attempt to upload the data
	if(isset($_GET['name'],$_GET['category'],$_GET['price'], $_GET['quantity']))
		{	
		session_start();
		//sets variables
		$name = $_GET['name'];
		$category = $_GET['category'];
		$price = $_GET['price'];
		$quantity = $_GET['quantity'];
		$error = 0;
		echo "<div id='error'";
		//Validates existing variables to ensure that the data is valid for our mysql database
		 if ($name == "")  {
                echo "Please only use letters and numbers<br/>"; 
                $error = "1";
            }
         if ($category == ""){
                echo "Please only use letters and numbers for the category field<br/>"; 
                $error = "1";
            }
           if (!preg_match("/^\d+(?:\.\d{2})?$/", $price)) {
				echo "Please enter a valid Price</br>";
				$error = "1";
           }
           if (!preg_match("/^[1-9][0-9]{0,15}$/", $quantity)) {
           		echo "Please enter a valid Quantity";
				$error = "1";
           }
          echo "</div>";
     //if no errors occur then run the code bellow
     if ($error == 0) {
   
		$conn = mysqli_connect('192.168.183.128:3306/', 'php3', 'php', 'PHP_SREPS');
		if($conn)
		{
			$query = "INSERT INTO Inventorydata (INVName, Category, Price, Quantity) VALUES ('$name', '$category', '$price', '$quantity')";
			$result = mysqli_query($conn, $query);
			if($result)
				echo "<p>information successfully added<p>";
			else
				echo "Failed to upload data, please ensure you have entered in the correct fields";
			mysqli_close($conn);
		}
		else {
			echo "Failed to connect";
		}
	
}
}
?>
</div>
<div id="Help"><a href="help.html"><img src="img/help.jpg" alt="Need Help?"></a></div>
</div>

</body>
</html>

