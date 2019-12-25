<?php
  // $doc = ($user = [
  //   'email'=> $email, 
  //   'pnumber'=> $pnumber, 
  //   'fname'=>$fname, 
  //   'address'=>
  //     array('location'=>$address,
  //         'city'=>$city),
  //   'password'=> $password]);



  require('vendor/autoload.php');
  $client = new MongoDB\Client;
  $companydb = $client->db;
  $collection = $companydb->products;

  // $collection->insertOne(array("firstname" => "Bob", "lastname" => "Jones",'address'=>array('location'=>'ABC Road','city'=>'Mysuru') ));
  $newdata = array('$set' => array("address" => array('location'=>"HELLO")));
  // $newdata = array('$set' => array("address"=>array("location"=>'Mongo')));
  $collection->updateOne(array("firstname" => "Bob"), $newdata);

  var_dump($collection->findOne(array("firstname" => "Bob")));
?>