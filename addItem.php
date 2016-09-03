<?php
	$name = $_GET['name'];
	$category = $_GET['category'];
	$price = $_GET['price'];
	$quantity = $_GET['quantity'];

	$conn = mysqli_connect("http://110.142.49.152:32123", "root", "TeamGreen123", /*database*/);
	if($conn)
	{
		$query = "INSERT INTO items (name, category, price, quantity) VALUES ('$name', '$category', $price, $quantity)";
		$result = mysqli_query($conn, $query);
		if($result)
			echo "information successfully added";
		else
			echo "nope";
		mysqli_close($conn);
	}
?>