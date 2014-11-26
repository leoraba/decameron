<?php
include("../includes/conexion.php");
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$num_documento = $_POST['num_documento'];
$fec_nacimiento = $_POST['nacimiento'];
$contra = $_POST['contra'];
$usuario = $_POST['usuario'];
$cmbpais = $_POST['cmbPais'];
$cmbtipodoc = $_POST['cmbTipoDocumento'];

$sql = "INSERT INTO USUARIO (usuario, clave, estado, fecha_creacion, fk_id_rol) VALUES ('$usuario', '$contra', 'A','".date('Y-m-d H:i:s')."', '1')";

if (mysql_query($sql,$ln)) {
	$id=mysql_insert_id($ln);
	$sq2 = "INSERT INTO CLIENTE_TITULAR (nombres, apellidos, email, genero, num_documento, nacimiento, fk_id_tipo_cliente, fk_id_tipo_documento, fk_id_pais, fk_id_usuario) VALUES ('$nombres', '$apellidos', '$email','$genero', '$num_documento', '$nacimiento', '1','$cmbtipodoc','$cmbpais','$id')";
	mysql_query($sq2,$ln);
	echo "Usted se ha registrado exitosamente";
}else {
	echo "Error en el registro";
}
?>