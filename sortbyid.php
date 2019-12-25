<!DOCTYPE html>
<html>
<head>
	<title> Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		form {
			margin: 10vh 30px;
		}
		.bg-primary {
			margin: auto 10px;
			border-radius: 5px;
			padding: 6px 18px;
			color: white;
		}
		.register {
			margin-left: 10px;
		}
		p {
			margin: 20px;
		}
		tr {
			text-align: center;
			align-items: center;
		}
		h4 {
			margin: 25px;
		}
		.dropdown-toggle {
			margin-left: 25px;
		}
		.form-control {
			margin-left: 25px;
		}
	</style>
</head>
<?php
	require('vendor/autoload.php');
	$client = new MongoDB\Client;
	$companydb = $client->db;
	$collection = $companydb->products;

	$sort = $collection->find(
		[],
		[
			'sort'=>['_id'=>1]
		]
	);
?>

<body>
	<table class="table">
		<thead>
			<th> <a href="index.php"><button class="btn btn-dark">Home</button> </a></th>
		</thead>
		<thead>
			<th><a href="sortbyid.php">Sort by ID </a></th>
			<th><a href="sortbybrand.php">Sort by brand </a></th>
			<th><a href="sortbycat.php">Sort by category </a></th>
			<th><a href="sortbyprice.php">Sort by price </a></th>
			<th><a href="logout.php"> Logout</a></th>			
			<tr bgcolor='#CCCCCC'>
				<th scope="col">Id</th>
				<th scope="col">Brand</th>
				<th scope="col">Category</th>
				<th scope="col">Description</th>
				<th scope="col">Price</th>
				<th scope="col">Cash On Delivery</th>
			</tr>
		</thead>
		<?php
			foreach($sort as $doc) {
				print_r ("<tr>");
					print_r("<td>".$doc['_id']."</td>");
					print_r("<td>".$doc['brand']."</td>");
					print_r("<td>".$doc['category']."</td>");
					print_r("<td>".$doc['description']."</td>");
					print_r("<td>".$doc['price']."</td>");
					print_r("<td>".$doc['cod']."</td>");
				print_r("</tr>");
			}
		?>
	</table>
</body>
</html>