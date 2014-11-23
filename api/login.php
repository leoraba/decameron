<?php
if(isset($_POST)){
	if(isset($_POST['username']) && isset($_POST['password']))
	include("../includes/conexion.php");
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	$success=false;
	$qr=mysql_query("SELECT u.id_usuario, u.fk_id_rol, u.is_admin, e.nombres, e.apellidos FROM USUARIO u INNER JOIN EMPLEADO e ON e.fk_id_usuario=u.id_usuario WHERE usuario='$username' and clave=md5('$password') and estado='A'",$ln);
	$row=mysql_fetch_array($qr);
	if(!is_null($row['id_usuario'])){
		$idUser=$row['id_usuario'];
		$idRol=$row['fk_id_rol'];
		$isAdmin=$row['id_admin'];
		$nombre=$row['nombres'];
		$apellido=$row['apellidos'];
		$success=true;
		session_start();
		$_SESSION['id_user']=$idUser;
		$_SESSION['id_rol']=$idRol;
		$_SESSION['is_admin']=$isAdmin;
		$_SESSION['nombre']=$nombre;
		$_SESSION['apellido']=$apellido;
	}
	echo json_encode(array("success"=>$success));
}	
?>