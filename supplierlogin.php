<?php ini_set('display_errors',0); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		form {
			margin: 25px;
		}
	</style>
</head>
<?php
	session_start();
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulkWrite = new MongoDB\Driver\BulkWrite;
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = new MongoDB\Driver\Query([]);
	$rows = $mng->executeQuery("db.supplier",$query);

	$_SESSION['email'] = $_POST['email'];

	if(isset($_POST['submit'])){
	foreach($rows as $row) {
		// echo "$row->email";
		if($row->email==$email && $row->password==$password) 
			header('location:supplierhome.php');
			// echo "Login successful!";
		else 
			echo "<script>";
			echo "alert('Invalid Login Details')";
			echo "</script>";
	}
}
?>
<body background="https://image.freepik.com/free-vector/e-commerce-background-design_1223-90.jpg">
	<form method="post">
		<h3>Login Form</h3>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control col-6" name="email" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control col-6" name="password" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
	<a href="admin.php" ><button class="btn btn-dark"> Admin Login</button> </a> 
	<a href="supplier.php" ><button class="btn btn-dark">New Supplier? Register here</button> </a> 
</body>
</html>