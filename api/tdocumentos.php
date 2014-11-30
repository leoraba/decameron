<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_POST['accion'];
	if($accion=="get"){
		$id=$_POST['id'];
		$qry=mysql_query("SELECT tipo_documento FROM TIPO_DOCUMENTO WHERE id_tipo_documento='$id'",$ln);
		$row=mysql_fetch_array($qry);
		$tipo=$row['tipo_documento'];
		$success=true;
		$resp=array("success"=>$success, "tipo"=>$tipo);
		echo json_encode($resp);
	}else if($accion=="mdo"){
		$id=$_POST['idEdit'];
		$tipo=$_POST['txtTipoDocumentoEdit'];
		
		
		if(mysql_query("UPDATE TIPO_DOCUMENTO SET tipo_documento='$tipo' WHERE id_tipo_documento='$id'",$ln)) $success=true;
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}
}

?>