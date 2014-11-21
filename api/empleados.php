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
		$telefono=$_POST['txtTelefono'];
		$email=$_POST['txtEmail'];
		$estadoCivil=$_POST['cmbEstadoCivil'];
		$tipoDocumento=$_POST['cmbTipoDocumento'];
		$documento=$_POST['txtDocumento'];
		$cargo=$_POST['cmbCargo'];
		$pais=$_POST['cmbPais'];
		$fCreacion=date("Y-m-d H:i:s");
		if($accion=="nvo"){
			if(mysql_query("INSERT INTO USUARIO(usuario, clave, estado, fecha_creacion, fk_id_rol) VALUES('$usuario','$clave','A','$fCreacion','2')",$ln)){
				$idUsuario=mysql_insert_id($ln);
				if(mysql_query("INSERT INTO EMPLEADO(nombres, apellidos, genero, fecha_nacimiento, telefono, email, estado_civil, numero_documento, fk_id_cargo, fk_id_pais, fk_id_tipo_documento, fk_id_usuario) VALUES('$nombre','$apellido','$genero','$fNacimiento','$telefono','$email','$estadoCivil','$documento','$cargo','$pais','$tipoDocumento','$idUsuario')",$ln)) $success=true;
			}
		}else if($accion=="mod" && $id!=""){
			$qrIdUser=mysql_query("SELECT fk_id_usuario FROM EMPLEADO WHERE id_empleado='$id'",$ln);
			list($idUser)=mysql_fetch_array($qrIdUser);
			if($idUser!=""){
				if($clave!="") mysql_query("UPDATE USUARIO set clave=md5('$clave') WHERE id_usuario='$idUser'",$ln);
				if(mysql_query("UPDATE EMPLEADO SET nombres='$nombre', apellidos='$apellido', genero='$genero', fecha_nacimiento='$fNacimiento', telefono='$telefono', email='$email', estado_civil='$estadoCivil', numero_documento='$documento', fk_id_cargo='$cargo', fk_id_pais='$pais', fk_id_tipo_documento='$tipoDocumento' WHERE id_empleado='$id'",$ln)) $success=true;
			}
		}
		$resp=array("success"=>$success);
		echo json_encode($resp);
	}else if($accion=="get"){
		$id=$_REQUEST['id'];
		$datos=array();
		$qr=mysql_query("SELECT e.id_empleado, e.nombres, e.apellidos, e.genero, e.fecha_nacimiento, e.telefono, e.email, e.estado_civil, e.numero_documento, e.fk_id_cargo, e.fk_id_pais, e.fk_id_tipo_documento, u.usuario FROM EMPLEADO e LEFT JOIN USUARIO u ON e.fk_id_usuario=u.id_usuario WHERE e.id_empleado='$id'",$ln);
		if(mysql_num_rows($qr)==1){
			$row=mysql_fetch_array($qr);
			$datos[]=array(
				"id_empleado"=>$row['id_empleado'],
				"nombres"=>$row['nombres'],
				"apellidos"=>$row['apellidos'],
				"genero"=>$row['genero'],
				"fecha_nacimiento"=>fromMysqlDate($row['fecha_nacimiento']),
				"telefono"=>$row['telefono'],
				"email"=>$row['email'],
				"estado_civil"=>$row['estado_civil'],
				"numero_documento"=>$row['numero_documento'],
				"fk_id_cargo"=>$row['fk_id_cargo'],
				"fk_id_pais"=>$row['fk_id_pais'],
				"fk_id_tipo_documento"=>$row['fk_id_tipo_documento'],
				"usuario"=>$row['usuario']
			);
		}
		$resp=array("success"=>true,"datos"=>$datos);
		echo json_encode($resp);
	}else if($accion=="mod"){
		$resp=array("success"=>true,"datos"=>"si");
		echo json_encode($resp);
	}else if($accion=="elim"){
		$id=$_REQUEST['id'];
		$qr=mysql_query("SELECT fk_id_usuario FROM EMPLEADO WHERE id_empleado='$id'");
		$row=mysql_fetch_array($qr);
		$idUsuario=$row['fk_id_usuario'];
		if(mysql_query("DELETE FROM EMPLEADO WHERE id_empleado='$id'")){
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