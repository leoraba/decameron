<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_tarifa, dia, precio_regular FROM TARIFA WHERE id_tarifa='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_tarifa'];
		$dia=$row['dia'];
		$precio=$row['precio_regular'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre, "dia"=>$dia, "precio"=>$precio);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreEdit'];
		$dia=$_POST['cmbDiaEdit'];
		$precio=$_POST['txtPrecioRegularEdit'];
		
		if(mysql_query("UPDATE TARIFA SET nombre_tarifa='$nombre', dia='$dia', precio_regular='$precio' WHERE id_tarifa='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>