<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		.form {
			margin-left: 50px;
		}
	</style>
</head>
<?php
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulkWrite = new MongoDB\Driver\BulkWrite;

	if(isset($_POST['submit'])) {
		$doc =($user = [
			'_id'=>(int)$_POST['_id'],
			'brand'=>$_POST['brand'],
			'category'=>$_POST['category'],
			'description'=>$_POST['description'],
			'price'=>(int)$_POST['price'],
			'cod'=>(bool)$_POST['cod'],
			'manfacture_details'=> array(	'model_number'=>(int)$_POST['model_number'],
											'release_date'=>$_POST['release_date']),
			'shipping_details'=> array(		'weight'=>(int)$_POST['weight'],
											'width'=>(int)$_POST['width'],
											'height'=>(int)$_POST['height'],
											'depth'=>(int)$_POST['depth']),
			'location'=> array(				'type'=>$_POST['type'],
											'coordinates'=>array((int)$_POST['c1'],(int)$_POST['c2'])),
		]);

		$bulkWrite->insert($doc);
		$mng->executeBulkWrite("db.products", $bulkWrite); 
			echo "Inserted successfully!";
		$query = new MongoDB\Driver\Query([]);
	}
?>
<body>
	<form method="post" class="form">
		<h2>Insert Data</h2>
	<label>ID</label> <input class="form-control col-6" type="number" name="_id">
		<label>Brand</label> <input class="form-control col-6" type="text" name="brand">
		<label>Category</label><input class="form-control col-6" type="text" name="category">
		<label>Description</label><input class="form-control col-6" type="text" name="description">
		<label>Price</label><input class="form-control col-6" type="number" name="price">
		<label>CashOnDelivery</label><input class="form-control col-6" type="number" name="cod">

		<h4>Manufacture Details</h4><br>
		<label>Model Number</label><input class="form-control col-6" type="number" name="model_number">
		<label>Release Date</label><input class="form-control col-6" type="date" name="release_date">

		<h4>Shipping Details</h4><br>
		<label>Weight</label><input class="form-control col-6" type="number" name="weight">
		<label>Width</label><input class="form-control col-6" type="number" name="width">
		<label>Height</label><input class="form-control col-6" type="number" name="height">
		<label>Depth</label><input class="form-control col-6" type="number" name="depth">

		<h4>Location</h4><br>
		<label>Type</label><input class="form-control col-6" type="text" name="type">
		<label>Longitude</label><input class="form-control col-6" type="number" name="c1">
		<label>Latitude</label><input class="form-control col-6" type="number" name="c2">
		<input class="btn btn-primary" type="submit" name="submit">	
	</form>
</body>
</html>