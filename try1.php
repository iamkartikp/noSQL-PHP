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
<!-- Write a php program to insert 3 documents in employee collection using insertMany().

	db.employee.insert([
	{ _id: 20, emp_name: "John Wick", emp_id: "se", designation:’Tester’, department: ’it’},
	{_id:21,emp_id:’STR’,emp_name:’Moti’, designation:’Developer’, department:’it’},
	{_id:22,emp_id:’SE’,emp_name:’Mahesh’,designation:’Team Lead’, department:’it’}]); -->


<?php
	session_start();
	require('vendor/autoload.php');
	$client = new MongoDB\Client;
	$companydb = $client->db;
	$collection = $companydb->products;;
	// echo "
	// <table class='table'>
 //  <thead>
 //    <tr>
 //      <th scope='col'>Brand</th>
 //      <th scope='col'>Catrgory</th>
 //      <th scope='col'>Description</th>
 //      <th scope='col'>Price</th>
 //    </tr>
 //  </thead>
 //  </table>";

// 	foreach($rows as $row)
// 	{echo "
// <table class='table'>
//   <tbody>
//   	<tr>
//   		<th scope='col'> $row->brand<th>
//   		<th scope='col'> $row->category<th>
//   		<th scope='col'> $row->description<th>
//   		<th scope='col'> $row->price<th>
//   		<th scope='col'> $row->cod<th>
//   		  	<a href=''>Update </a>
//   	</tr>
//   	</tbody>
//   	</table>
//   </tbody>";}  
?>

<body>
	<table class="table">
		<thead>
			<th> <?php echo $_SESSION['email']; ?> </th>
			<th><a href="sortbyid.php">Sort by ID </a></th>
			<th><a href="">Sort by brand </a></th>
			<th><a href="">Sort by category </a></th>
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
		foreach ($results as $res){
			echo "<tr>";
				echo "<td scope='col'>".$res->_id."</td>";
				echo "<td scope='col'>".$res->brand."</td>";
				echo "<td scope='col'>".$res->category."</td>";
				echo "<td scope='col'>".$res->description."</td>";
				echo "<td scope='col'>".$res->price."</td>";
				echo "<td scope='col'>".$res->cod."</td>";
			//	$res1 = $res->manufacture_details;
			//	foreach($res1 as $x) 
			//		echo "<td scope='col'>".print_r($x['release_date']); "</td>";
			echo "</tr>";	
		}
		?>
	</table>
</body>
</html>