<?php

$servername = "localhost";
$username = "root";
$password = "";

try {

  $conn = new PDO("mysql:host=$servername;dbname=covid", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo "Connected successfully";

} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$d = json_decode($_POST['item']);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  	$sql = "INSERT INTO result (name, age, gender,temp_type,temp,points,result)
  	VALUES ('$d->name', '$d->age', '$d->gender','$d->temp_type',$d->temp, $d->points,'$d->r')";
  // use exec() because no results are returned
  	$conn->exec($sql);

}