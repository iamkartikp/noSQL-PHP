<?php
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$query = new MongoDB\Driver\Query([]);
	$rows = $mng->executeQuery("ecommerce.customer", $query);
	foreach($rows as $row) {
		echo "$row->firstName"."<br>";
	} 
?>
