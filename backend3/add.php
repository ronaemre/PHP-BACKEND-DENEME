<?php  
   header("Access-Control-Allow-Origin: *");
	include 'conn.php';

	$_POST=json_decode(file_get_contents("php://input"),true);

	$name=addslashes(htmlentities($_POST['name']));



	if ($_POST === null) {
		$result="";
	} else {
		$sql=$conn->query("INSERT INTO malzemeler VALUES ('', '$name')");
	}

	

	if($sql === TRUE) {
		$result="rona";
	} else {
		$result="Error: " . $sql . "<br/>" . $conn->error;
	}

	echo json_encode($result);
	$conn->close();
?>
