<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_banco FROM BANCO WHERE id_banco='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_banco'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreEdit'];
		
		
		if(mysql_query("UPDATE BANCO SET nombre_banco='$nombre' WHERE id_banco='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>