<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT empre.id_empresa, empre.numero_registro_iva, empre.nit, empre.nombre_registro, empre.fk_id_giro_empresa FROM EMPRESA empre LEFT JOIN GIRO_EMPRESA g on empre.fk_id_giro_empresa=g.id_giro_empresa WHERE empre.id_empresa='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$numero=$row['numero_registro_iva'];
		$nit=$row['nit'];
		$nombreRegistro=$row['nombre_registro'];
		$idGiro=$row['cmbGiroEmpresa'];
		
		$success=true;
		$resp=array("success"=>$success, "nombre"=>$nombre, "precio"=>$precio);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$nombre=$_POST['txtNombreGiroEdit'];
		
		
		if(mysql_query("UPDATE EMPRESA SET nombre_giro='$nombre' WHERE id_empresa='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>




