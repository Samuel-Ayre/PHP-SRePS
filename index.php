<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
	<title>BuyOnline Add New Item</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="JavascriptRequest.js"></script> 
	</head>
<body>

<img src="header.jpg" alt="People Health Pharmacy"><div id="MainDisplay">
<div id="Menu" span="menu">
<a href="index.php"><h3>Main Menu</h3></a>
<a href="AAII.php">Add a Inventory Item</a><br />
<a href="GMR.php">Generate Monthly Report</a><br />
<a href="AASR.php">Add a Sales Record</a><br />
</div>
<Div id="Body">
<h2> Welcome!</h2>
</div>
</div>

</body>
</html>

<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
