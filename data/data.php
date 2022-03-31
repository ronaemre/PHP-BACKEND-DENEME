<?php
/*  header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); */

 header('Access-Control-Allow-Origin: *');
 header("Access-Control-Allow-Headers: *");
 header("Access-Control-Allow-Methods: *");
 header("Allow: *");
 $method = $_SERVER['REQUEST_METHOD'];
 if ($method === "OPTIONS") {
	 die();
 }


	require_once("database.php");
	$action=$_GET['action'];
	switch ($action) {
		case 'addMetarials':
			$numbers=$_POST['numbers'];
			$details=$_POST['details'];
			$tedarikci=$_POST['tedarikci'];
			$weights=$_POST['weights'];
			$statu=$_POST['statu'];
			$conn-> query("insert into malzemeler (numbers,details,tedarikci,weights,statu) VALUES ('$numbers','$details','$tedarikci','$weights','$statu') ");
		 	/* header("location:../index.php");  */
		break;
		case 'updataMetarials':
			$updateId=$_GET['id'];
			$numbers=$_POST['numbers'];
			$details=$_POST['details'];
			$tedarikci=$_POST['tedarikci'];
			$weights=$_POST['weights'];
			$statu=$_POST['statu'];
			$updata = mysqli_query($conn, "UPDATE malzemeler SET numbers = '$numbers',details = '$details',tedarikci = '$tedarikci',weights = '$weights',statu = '$statu' WHERE id = '$updateId'");
			header("location:../index.php");
		break;
		case 'deleteMetarials':
			$id=$_GET['id'];
			$delete = mysqli_query($conn,"DELETE FROM malzemeler WHERE id=$id ");
			header("location:../index.php");
		break;
		case 'getMetarials':
			$veriSorgusu = mysqli_query($conn,"SELECT * FROM malzemeler ");
			$veriDizisi = array();
			foreach ($veriSorgusu as $veriSorgusu ) :
			    $veri["veri"]=array(
			    	"numbers"=>$veriSorgusu["numbers"],
			    	"details"=>$veriSorgusu["details"],
			    	"tedarikci"=>$veriSorgusu["tedarikci"],
			    	"weights"=>$veriSorgusu["weights"],
			    	"statu"=>$veriSorgusu["statu"],
			    	"registerDate"=>$veriSorgusu["registerDate"],
			    	"updateDate"=>$veriSorgusu["updateDate"]
			    );
			array_push($veriDizisi, $veri);
			endforeach;
			header('Content-Type: application/json; charset=utf-8');
			print_r(json_encode($veriDizisi,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
		break;
		default:
			echo "none";
			break;
	}
?>