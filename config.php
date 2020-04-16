<?php 
session_start();
global $pdo;
try{

$pdo = new PDO('mysql:host=localhost;dbname=covid','root','');


} catch (PDOException $e) {

	print "Error!: ".$e->getMessage();
	die();

}

 ?>