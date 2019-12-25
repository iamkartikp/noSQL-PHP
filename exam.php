<?php

	//FIND

	// $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	// $query = new MongoDB\Driver\Query([]);
	// $rows = $mng->executeQuery("try.try",$query);
	// foreach($rows as $row) {
	// 	var_dump($row);
	// }

	

	//INSERT

	// $mng = new MongoDB\Driver\Manager('mongodb://localhost:27017');
	// $bulkWrite = new MongoDB\Driver\BulkWrite;
	// $doc = (['_id'=>new MongoDB\BSON\ObjectID, 'name'=>'Gus']);
	// $bulkWrite->insert($doc);
	// $mng->executeBulkWrite('try.products',$bulkWrite);
	// $query =  new MongoDB\Driver\Query([]);
	// $rows = $mng->executeQuery('try.products',$query);
	// foreach($rows as $row) {
	// 	var_dump($row);
	// }



	//UPDATE

	// $m=new MongoDB\Driver\Manager("mongodb://localhost:27017");
	// $bulk = new MongoDB\Driver\BulkWrite;
	// $bulk->update(['name'=>'Gus'],['$set' =>['name'=>'Heisenberg']]);
	// $m->executeBulkWrite('try.products', $bulk);
	// echo  "successfully updated";
	// $query =new MongoDB\Driver\Query([]);
	// $rows=$m->executeQuery("try.products",$query);
	// foreach ($rows as $row) {
	// 	var_dump($row);
	// }



	//DELETE

	// $mng=new MongoDB\Driver\Manager('mongodb://localhost:27017');
	// $bulk = new MongoDB\Driver\BulkWrite;
	// $bulk->delete(['name' => 'BOOK']);
	// $mng -> executeBulkWrite('try.products', $bulk);
	// echo  'successfully deleted';
	// $query =new MongoDB\Driver\Query([]);
	// $rows=$mng->executeQuery('try.products',$query);
	// foreach ($rows as $row) {
	// 	var_dump($row);
	// }
?>