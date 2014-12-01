<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_giro FROM GIRO_EMPRESA WHERE id_giro_empresa='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_giro'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreGiroEdit'];
		
		
		if(mysql_query("UPDATE GIRO_EPMPRESA SET nombre_giro='$nombre' WHERE id_giro_empresa='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>



