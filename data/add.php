<?php

/*  header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
 header( "Access-Control-Allow-Methods": "GET,PUT,POST,DELETE,PATCH,OPTIONS"); */

 	include "database.php";

 header('Access-Control-Allow-Origin: *');
 header("Access-Control-Allow-Headers: *");
 header("Access-Control-Allow-Methods: *");
 header("Allow: *");
 $method = $_SERVER['REQUEST_METHOD'];
 if ($method === "OPTIONS") {
	 die();
 }


/* 	require_once("database.php"); */

	

	$postdata=file_get_contents("php://input");

	$request= json_decode($postdata);

	$numbers=$request->numbers;
	$details=$request->details;
	$tedarikci=$request->tedarikci;
	$weights=$request->weights;
	$statu=$request->statu;


	$insert =$db->prepare("INSERT INTO malzemeler SET 
	numbers=: numbers,
    details=: details,
    tedarikci=: tedarikci,
    weights=: weights,
    statu=: statu,
   
	");
	$control=$insert->execute(array(
		"numbers"=>$numbers,
		"details"=>$details,
		"tedarikci"=>$tedarikci,
		"weights"=>$weights,
		"statu"=>$statu,
		
	));

	if ($control){
		echo "eklendi";
	}
	else{
		echo "hata";
	} 
	
	?>