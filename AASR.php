<?php
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
?>