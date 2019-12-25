<?php
	
	$client = new MongoDB\Client;
	$companydb = $client->companydb;
	$collection = $companydb->collection;

	//insert
	$insertOne = $collection->insertOne(['name'=>'Jon','age'=>25]);
	$insertMany = $collection->insertMany([
		['name':'ABC'],
		['name':'XYZ'],
	]);

	echo "Count: ".$insertOne->getInsertedCount();
	var_dump($insertOne->getInsertedId());


	// Find
	$document = $collection ->findOne(['_id'=>1]);
	var_dump($document);

	$document = $collection ->find(['name'=>'ABC']);
	foreach($document aS $doc) {
		var_dump($doc);
	}

	// projection
	$document = $collection->find(
		['skill'=>'mongodb'],
		['project'=>['_id'=>0, 'name'=>1]]
	);

	foreach($document aS $doc) {
		var_dump($doc);
	}


	//update
	$updateRes = $collection->update(
		['age'=>25],
		['$set'=>['age'=>23]]
	);

	echo "$updateRes->getMatchedCount()";
	echo "$updateRes->getModifiedCount()";

	// replace
	$replace = $collection->replace(
		['_id'=>4],
		['_id'=>4,'favColor'=>'blue']
	);
		echo "$replace->getMatchedCount()";
	echo "$replace->getModifiedCount()";

	// limit,skip,sort
	$document = $collection->find(
		[],
		[
			'limit'=>2,
			'skip'=>2,
			'sort'=>['age'=>1]
		]
	);
	foreach ($document as $doc) {
		var_dump($doc);
	}

	// Delete One
	$delete = $collection->deleteOne(
		['_id'=>1]
	);

	$delete = $collection->deleteMany(
		['_id'=>1],
		['_id'=>3]
	);

	echo "delete->getDeletedCount()";
?>