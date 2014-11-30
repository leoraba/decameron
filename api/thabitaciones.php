<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_tipo, precio FROM TIPO_HABITACION WHERE id_tipo_habitacion='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_tipo'];
		$precio=$row['precio'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre, "precio"=>$precio);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreTipoEdit'];
		$precio=$_POST['txtPrecioEdit'];
		
		if(mysql_query("UPDATE TIPO_HABITACION SET nombre_TIPO='$nombre', precio_regular='$precio' WHERE id_tipo_habitacion='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>