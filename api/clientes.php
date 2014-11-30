<?php
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$success=false;
	$accion=$_REQUEST['accion'];
	if($accion=="nvo" || $accion=="mod"){
		$id=$_POST['id'];
		$nombre=$_POST['txtNombre'];
		$apellido=$_POST['txtApellido'];
		$usuario=$_POST['txtUsuario'];
		$clave=trim($_POST['txtClave']);
		$genero=$_POST['radGenero'];
		$fNacimiento=toMysqlDate($_POST['txtFechaNacimiento']);
		
		$email=$_POST['txtEmail'];
		
		$tipoDocumento=($_POST['cmbTipoDocumento']!="")?$_POST['cmbTipoDocumento']:'1';
		$documento=$_POST['txtDocumento'];
		$tipoCliente=$_POST['cmbTipoCliente'];
		$pais=$_POST['cmbPais'];
		
		$estado=$_POST['radEstado'];
		$fCreacion=date("Y-m-d H:i:s");
		if($accion=="nvo"){
			if(mysql_query("INSERT INTO USUARIO(usuario, clave, estado, fecha_creacion, is_admin, tipo, fk_id_rol) VALUES('$usuario',md5('$clave'),'$estado','$fCreacion','$admin','E','2')",$ln)){
				$idUsuario=mysql_insert_id($ln);
				if(mysql_query("INSERT INTO CLIENTE_TITULAR(nombres, apellidos, genero, fecha_nacimiento, email, numero_documento, fk_id_tipo_cliente, fk_id_pais, fk_id_tipo_documento, fk_id_usuario) VALUES('$nombre','$apellido','$genero','$fNacimiento','$email','$documento','$tipoCliente','$pais','$tipoDocumento','$idUsuario')",$ln)) $success=true;
			}
		}else if($accion=="mod" && $id!=""){
			$qrIdUser=mysql_query("SELECT fk_id_usuario FROM CLIENTE_TITULAR WHERE id_cliente_titular='$id'",$ln);
			list($idUser)=mysql_fetch_array($qrIdUser);
			if($idUser!=""){
				$modPass="";
				if($clave!="") $modPass=",clave=md5('$clave')";
				mysql_query("UPDATE USUARIO set estado='$estado', $modPass WHERE id_usuario='$idUser'",$ln);
				if(mysql_query("UPDATE CLIENTE_TITULAR SET nombres='$nombre', apellidos='$apellido', genero='$genero', fecha_nacimiento='$fNacimiento', email='$email', numero_documento='$documento', fk_id_tipo_cliente='$tipoCliente', fk_id_pais='$pais', fk_id_tipo_documento='$tipoDocumento' WHERE id_cliente_titular='$id'",$ln)) $success=true;
			}
		}
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}else if($accion=="get"){
		$id=$_REQUEST['id'];
		$datos=array();
		$qr=mysql_query("SELECT ct.id_cliente_titular, ct.nombres, ct.apellidos, ct.genero, ct.fecha_nacimiento, ct.email, ct.numero_documento, 
			ct.fk_id_tipo_cliente, ct.fk_id_pais, ct.fk_id_tipo_documento, u.usuario, u.estado FROM CLIENTE_TITULAR ct LEFT JOIN USUARIO u ON ct.fk_id_usuario=u.id_usuario WHERE ct.id_cliente_titular='$id'",$ln);
		if(mysql_num_rows($qr)==1){
			$row=mysql_fetch_array($qr);
			$datos[]=array(
				"id_cliente_titular"=>$row['id_cliente_titular'],
				"nombres"=>$row['nombres'],
				"apellidos"=>$row['apellidos'],
				"genero"=>$row['genero'],
				"fecha_nacimiento"=>fromMysqlDate($row['fecha_nacimiento']),
				
				"email"=>$row['email'],
				
				"numero_documento"=>$row['numero_documento'],
				"fk_id_tipo_cliente"=>$row['fk_id_tipo_cliente'],
				"fk_id_pais"=>$row['fk_id_pais'],
				"fk_id_tipo_documento"=>$row['fk_id_tipo_documento'],
				"usuario"=>$row['usuario'],
				"estado"=>$row['estado'],
				
			);
		}
		$resp=array("success"=>true,"datos"=>$datos);
		echo json_encode($resp);
	}else if($accion=="mod"){
		$resp=array("success"=>true,"datos"=>"si");
		echo json_encode($resp);
	}else if($accion=="elim"){
		$id=$_REQUEST['id'];
		$qr=mysql_query("SELECT fk_id_usuario FROM CLIENTE_TITULAR WHERE id_cliente_titular='$id'");
		$row=mysql_fetch_array($qr);
		$idUsuario=$row['fk_id_usuario'];
		if(mysql_query("DELETE FROM CLIENTE_TITULAR WHERE id_cliente_titular='$id'")){
			mysql_query("DELETE FROM USUARIO WHERE id_usuario='$idUsuario'");
			$success=true;
		}
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