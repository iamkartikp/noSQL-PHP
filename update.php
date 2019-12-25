<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		.form {
			margin: 10% 25%;	
		}
		.dropdown-toggle {
			margin: 10px auto;
		}
	</style>
</head>
<?php
	if(isset($_POST['submit'])) {
		require('vendor/autoload.php');
		$client = new MongoDB\Client;
		$companydb = $client->db;
		$collection = $companydb->products;

		$select = $_POST['select'];

		$updateRes = $collection->updateOne(
			[$select=>(int)$_POST['value']],
			['$set'=>[$_POST['select1']=>$_POST['value1']]]
		);
	}
?>
<body>
	<form class="form" name="myform" method="post">
		<h2>Update</h2>
		<select class="btn btn-secondary dropdown-toggle" name="select">
			<option value="_id">ID</option>
			<option value="brand">Brand</option>
			<option value="category">Category</option>
			<option value="description">Description</option>
			<option value="price">Price</option>
		</select>
		<input class="form-control" type="text" name="value">
<br>
		<select class="btn btn-secondary dropdown-toggle" name="select1">
			<option value="brand">Brand</option>
			<option value="category">Category</option>
			<option value="description">Description</option>
			<option value="price">Price</option>
		</select>
		<input class="form-control" type="text" name="value1"><br>
		<input class="btn btn-primary " type="submit" name="submit">
	</form>
</body>
</html>