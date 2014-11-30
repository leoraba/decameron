<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_edificio FROM EDIFICIO WHERE id_edificio='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_edificio'];
		
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreEdificioEdit'];
		
		
		if(mysql_query("UPDATE EDIFICIO SET nombre_edificio='$nombre' WHERE id_edificio='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>