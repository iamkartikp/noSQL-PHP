<?php ini_set('display_errors',0); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Register a supplier</title>
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
		.btn {
			margin-top: -10px;
			margin-left: 43px;
		}
	</style>
</head>
<!-- Write a php program to insert 3 documents in employee collection using insertMany().

	db.employee.insert([
	{ _id: 20, emp_name: "John Wick", emp_id: "se”, designation:’Tester’, department: ’it’},
	{_id:21,emp_id:’STR’,emp_name:’Moti’, designation:’Developer’, department:’it’},
	{_id:22,emp_id:’SE’,emp_name:’Mahesh’,designation:’Team Lead’, department:’it’}]); -->


<?php
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulkWrite = new MongoDB\Driver\BulkWrite;
	if(isset($_POST['submit'])) {
		$companyname = $_POST['companyname'];
		$contactname = $_POST['contactname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$password = $_POST['password'];


		$doc = ($user = [
		'companyname'=> $companyname, 
		'contactname'=> $contactname, 
		'email'=>$email, 
		'address'=>
			array('location'=>$address,
				  'city'=>$city),
		'password'=> $password]);
	 
		$bulkWrite->insert($doc);
		$mng->executeBulkWrite("db.supplier", $bulkWrite); 
		header('location:supplierhome.php');
		$query = new MongoDB\Driver\Query([]);
		 //$rows = $mng->executeQuery("db.employee", $query);
		 //foreach($rows as $row)	{
		 	//printf("$row->email");
		 //}
}
?>
<body background="https://images.all-free-download.com/images/graphiclarge/ecommerce_background_shopping_design_elements_icons_6838055.jpg">
	<form class="my-from" method="post">
		<h2>Register Here</h2>
		<div class="form-group col-8">
			<label for="exampleInputcompanyname1">Company Name</label>
			<input type="companyname" class="form-control" name="companyname" placeholder="name@gmail.com" /required>
		</div>

		<div class="form-group col-8">
			<label for="exampleInputPassword1">Contact Name</label>
			<input type="text" class="form-control" name="contactname" placeholder="Phone Number" minlength="10" /required>
		</div> 

		<div class="form-group col-8">
			<label for="exampleInputPassword1">Email</label>
			<input type="text" class="form-control" name="email" placeholder="Full Name" /required>
		</div>

		<div class="form-group col-8">
			<label for="exampleInputPassword1">Address</label>
			<input type="text" class="form-control" name="address" placeholder="Address" /required>
		</div>

		<div class="form-group col-8">
			<label for="exampleInputPassword1">City</label>
			<input type="text" class="form-control" name="city" placeholder="City" /required>
		</div>

		<div class="form-group col-8">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password" /required>
		</div>
		<input class="bg bg-primary" type="submit" name="submit" value="Register">
	</form>
	<a href="admin.php"><button class="btn btn-primary">Admin Login</button> </a><br><br>
	<a href="login.php"><button class="btn btn-dark register">Already a user? Login</button> </a>
</body>
</html>