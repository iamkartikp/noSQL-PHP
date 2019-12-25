<!DOCTYPE html>
<html>
<head>
	<title>Find</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<style type="text/css">
	p {
		margin-left: 50px;
		margin-top: 25px;
	}
</style>
</head>
<?php
	if(isset($_POST['submit'])){
		require('vendor/autoload.php');
		$client = new MongoDB\Client;
		$companydb = $client->db;
		$collection = $companydb->products;

		$id = $_POST['id'];		

		$document = $collection ->findOne(['brand'=>$id]);
		foreach($document as $doc) {
			echo "<p>  $doc </p>";
		}
	}
?>
<body>
	<form method="post" action="find.php">
		<input class="form-control" type="text" name="id">
		<input type="submit" name="submit">
	</form>
</body>
</html>