<?php
/*  header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
 header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); */

/* 

	$servername	="localhost";
	$username 	="root";
	$password 	="";
	$database 	="todo";
	$conn 		= mysqli_connect($servername, $username, $password, $database);  */

 	try{
		$db=new PDO("mysql:host=localhost;dbname=todo;charset=utf8","root","");
	}catch(PDOException $e){
		echo $e->getMessage();
	} 
?>