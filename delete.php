<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
<?php
if(isset($_POST['submit'])) {
	require('vendor/autoload.php');
	$client = new MongoDB\Client;
	$companydb = $client->db;
	$collection = $companydb->products;

	$deleteResult = $collection->deleteOne(
    	['_id' => $_POST['brand']]
	);
}
?>
<style type="text/css">
	.form {
		padding: 10%;
	}
</style>
</head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<body>
	<form method="post" class="form">
		<h2>Delete</h2>
		<label>Enter Brand to delete</label> <input class="form-control" type="text" name="brand">
		<input style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">
	</form>
</body>
</html>