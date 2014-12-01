<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_descuento_habitacion, descripcion, porcentaje_descuento, estado, fecha_inicio, fecha_fin, tipo_huesped FROM DESCUENTO_HABITACION WHERE id_descuento_habitacion='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_descuento_habitacion'];
		$descripcion=$row['descripcion'];
		$porcentaje=$row['porcentaje_descuento'];
	    $estado=$row['estado'];
	    $fechaIn=$row['fecha_inicio'];
	    $fechaFin=$row['fecha_fin'];
	    $tipo=$row['tipo_huesped'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre, "descripcion"=>$descripcion, "porcentaje"=>$porcentaje, "estado"=>$estado, "fechaIn"=>$fechaIn, "fechaFin"=>$fechaFin, "tipo"=>$tipo);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreDescuentoEdit'];
		$descripcion=$_POST['txtDescripcionEdit'];
		$porcentaje=$_POST['txtPorcentajeEdit'];
		$estado=$_POST['radEstadoEdit'];
		$fechaIn=$_POST['txtFechaInicioEdit'];
		$fechaFin=$_POST['txtFechaFinEdit'];
		$tipo=$_POST['radTipoEdit'];

		if(mysql_query("UPDATE DESCUENTO_HABITACION SET nombre_descuento_habitacion='$nombre', descripcion='$descripcion', porcentaje_descuento='$porcentaje', estado='$estado', fecha_inicio='$fechaIn', fecha_fin='$fechaFin', tipo='$tipo' WHERE id_descuento_habitacion='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}


function toMysqlDate($fecha){
	list($d,$m,$y)=explode("/",$fecha);
	$cad=$y."-".$m."-".$d;
	return $cad;
}
function fromMysqlDate($fecha){
	list($y,$m,$d)=explode("-",$fecha);
	$cad=$d."/".$m."/".$y;
	return $cad;
}
?>



