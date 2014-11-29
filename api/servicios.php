
<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_servicio, precio_regular FROM SERVICIO WHERE id_servicio='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_servicio'];
		$precio=$row['precio_regular'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre, "precio"=>$precio);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreServicioEdit'];
		$precio=$_POST['txtPrecioRegularEdit'];
		
		if(mysql_query("UPDATE SERVICIO SET nombre_servicio='$nombre', precio_regular='$precio' WHERE id_servicio='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>