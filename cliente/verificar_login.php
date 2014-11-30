<?php
include("includes/conexion.php");
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql=mysql_query("SELECT u.id_usuario, c.nombres, c.apellidos FROM USUARIO u INNER JOIN CLIENTE_TITULAR c ON c.fk_id_usuario=u.id_usuario WHERE usuario='$user' and clave=md5('$pass') and estado='A'",$ln);
if(mysql_num_rows($sql)==1){
	$row=mysql_fetch_array($sql);
	$idUser=$row['id_usuario'];
	$nombre=$row['nombres'];
	$apellido=$row['apellidos'];
	session_start();
	$_SESSION['id_user']=$idUser;
	$_SESSION['nombre']=$nombre;
	$_SESSION['apellido']=$apellido;
	echo "Inicio sesion $nombre $apellido";
} else {
	echo "SELECT u.id_usuario, c.nombres, c.apellidos FROM USUARIO u INNER JOIN CLIENTE_TITULAR c ON c.fk_id_usuario=u.id_usuario WHERE usuario='$user' and clave=md5('$pass') and estado='A'";
	echo "Usuario o contrasena son incorrectas, por favor verificar";
}

?>
