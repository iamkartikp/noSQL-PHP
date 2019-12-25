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
		.abc {
			display: grid;
			grid-template-columns: repeat(3,1fr);
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
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$query = new MongoDB\Driver\Query([]);
	$rows = $mng->executeQuery("db.products", $query);
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

<body background="https://previews.123rf.com/images/arrow/arrow1508/arrow150800028/43966988-online-shopping-e-commerce-concept-background.jpg">

	<table class="table">
		<thead>
			<th> <?php echo $_SESSION['email']; ?> </th>
			<th><a href="sortbyid.php">Sort by ID </a></th>
			<th><a href="">Sort by brand </a></th>
			<th><a href="">Sort by category </a></th>
			<th><a href="sortbyprice.php">Sort by price </a></th>
			<th><a href="logout.php"> Logout</a></th>			
		</thead>
	</table>
		<div class="abc">
		<?php 	
		foreach ($rows as $res) {
			$a= '';
			if($res->cod) 
				$a = 'Available';
			else
				$a = 'Not Available';
			echo "<div class='cards'>";
			echo "<tr>";
			echo "<div class='card text-center' >
	  <div class='card-body'>
	    <h5 class='card-title'>Product Id $res->_id</h5>
	    <h6 class='card-subtitle mb-2 text-muted'>Brand: $res->brand</h6>
	    <h6 class='card-subtitle mb-2 text-muted'>Category: $res->category</h6>
	    <h6 class='card-subtitle mb-2 text-muted'>Description: $res->description</h6>
	    <h6 class='card-subtitle mb-2 text-muted'>Price: $res->price</h6>
	    <h6 class='card-subtitle mb-2 text-muted'>COD: $a</h6>
	  </div>
	</div>";
	}
?>
</div>
</body>
</html>