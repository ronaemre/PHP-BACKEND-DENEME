<?php  
   header("Access-Control-Allow-Origin: *");
	$conn = new mysqli("localhost", "root", "", "deneme");

	if ( $conn->connect_error ) {
		die("deneme");
	}
?>
