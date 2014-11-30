
<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT nombre_tipo_producto FROM TIPO_PRODUCTO WHERE id_tipo_producto='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$nombre=$row['nombre_tipo_producto'];
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreEdit'];
		
		
		if(mysql_query("UPDATE TIPO_PRODUCTO SET nombre_tipo_producto='$nombre' WHERE id_tipo_producto='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>