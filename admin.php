<?php ini_set('display_errors',0); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		.form {
			margin: 50px;
		}
		.bg-primary {
			margin: auto 10px;
			border-radius: 5px;
			padding: 6px 18px;
			color: white;
		}
	</style>
<?php
	session_start();
	$_SESSION['username'] = $_POST['username'];
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulkWrite = new MongoDB\Driver\BulkWrite;

	$username = 'admin';
	$password = '1234';

	if(isset($_POST['submit'])) {
		if($_POST['username'] == $username && $_POST['password'] = $password){
			header('Location: adminhome.php');
		}
		else {
			echo "INVALID DETAILS!";
			
	}
}
?> 

</head>
</head>
<body background="https://i2.wp.com/www.ecommerce-nation.com/wp-content/uploads/2016/10/How-to-put-your-Customer-First-in-E-Commerce-Strategy.png?fit=1000%2C600&ssl=1">
<form name="myForm" class="form" method="post">
	<h2 style="margin-left: 15px;">Admin Login</h2>
	<div class="form-group col-8">
		<label for="exampleInputEmail1">Email address</label>
		<input type="text" class="form-control" name="username" placeholder="Admin Username" /required>
	</div>
	<div class="form-group col-8">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Password" /required>
	</div>
	<input class="bg bg-primary" type="submit" name="submit">
</form>
</body>
</html>