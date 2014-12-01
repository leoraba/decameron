<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_marca FROM MARCA WHERE id_marca='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_marca'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreEdit'];
		
		
		if(mysql_query("UPDATE MARCA SET nombre_marca='$nombre' WHERE id_marca='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>
