<?php
	require('vendor/autoload.php');
	$client = new MongoDB\Client;
	$companydb = $client->db;
	$collection = $companydb->products;

	$pipeline = array(
	    array(
	        '$group' => array(
	            '_id' => array('brand' => '$brand'),
	            'price' => array('$sum' => '$price')
	        )
	    ),
	    array(
	        '$match' => array(
	            'price' => array('$gte' => 100)
	        )
	    ),
	);
	$out = $collection->aggregate($pipeline);
	foreach($out as $x) {
		print_r($x);
	}
?>