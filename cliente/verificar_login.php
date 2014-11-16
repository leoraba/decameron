<?php
session_start();
include("../includes/conexion.php");
$user = $_POST['user'];
$pass = $_POST['pass'];

$sq1 = "SELECT (usuario, clave) FROM USUARIO WHERE usuario='$_POST[user]' ";

$sesion=mysql_fetch_array($sq1);

if ($_POST['pass'] == $sesion['pass']){

	$_SESSION['username'] = $_POST['user'];
	echo "Inicio sesion";
} else {
	echo "error iniciando sesion";
}

?>
