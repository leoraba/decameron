<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT  dia, precio_regular, tipo_huesped FROM TARIFA WHERE id_tarifa='$id'",$ln);
		$row=mysql_fetch_array($qry);
		
		$dia=$row['dia'];
		$precio=$row['precio_regular'];
		$tipo=$row['tipo_huesped'];
		$success=true;
		$resp=array("success"=>$success, "dia"=>$dia, "precio"=>$precio, "tipo"=>$tipo);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		
		$dia=$_POST['cmbDiaEdit'];
		$precio=$_POST['txtPrecioEdit'];
		$tipo=$_POST['radTipoEdit'];
		
		if(mysql_query("UPDATE TARIFA SET dia='$dia', precio_regular='$precio', tipo_huesped='$tipo' WHERE id_tarifa='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>