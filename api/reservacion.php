<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	
	//print_r($_REQUEST);
	$success=true;


	$resp=array("success"=>$success);
	echo json_encode($resp);
}