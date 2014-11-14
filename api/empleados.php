<?php
include("../includes/conexion.php");
if(isset($_REQUEST)){
	$accion=$_REQUEST['accion'];
	if($accion=="nvo"){
		$success=false;
		$nombre=$_POST['txtNombre'];
		$apellido=$_POST['txtApellido'];
		$usuario=$_POST['txtUsuario'];
		$clave=$_POST['txtClave'];
		$genero=$_POST['radGenero'];
		$fNacimiento=$_POST['txtFechaNacimiento'];
		$telefono=$_POST['txtTelefono'];
		$email=$_POST['txtEmail'];
		$estadoCivil=$_POST['cmbEstadoCivil'];
		$tipoDocumento=$_POST['cmbTipoDocumento'];
		$documento=$_POST['txtDocumento'];
		$cargo=$_POST['cmbCargo'];
		$pais=$_POST['cmbPais'];
		$fCreacion=date("Y-m-d H:i:s");
		if(mysql_query("INSERT INTO USUARIO(usuario, clave, estado, fecha_creacion, fk_id_rol) VALUES('$usuario','$clave','A','$fCreacion','2')",$ln)){
			$idUsuario=mysql_insert_id($ln);
			if(mysql_query("INSERT INTO EMPLEADO(nombres, apellidos, genero, fecha_nacimiento, telefono, email, estado_civil, numero_documento, fk_id_cargo, fk_id_pais, fk_id_tipo_documento) VALUES('$nombre','$apellido','$genero','$fNacimiento','$telefono','$email','$estadoCivil','$documento','$cargo','$pais','$tipoDocumento')",$ln)) $success=true;
		}
	}else if($accion=="mod"){

	}else if($accion=="elim"){
		$id=$_REQUEST['id'];
		$qr=mysql_query("SELECT fk_id_usuario FROM EMPLEADO WHERE id_empleado='$id'");
		$row=mysql_fetch_array($qr);
		$idUsuario=$row['fk_id_usuario'];
		if(mysql_query("DELETE FROM EMPLEADO WHERE id_empleado='$id'")){
			mysql_query("DELETE FROM USUARIO WHERE id_usuario='$idUsuario'");
			echo true;
		}

	}
}
?>