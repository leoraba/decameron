<?php
include("../includes/conexion.php");
$desde = $_POST['from'];
$hasta = $_POST['to'];
$t_hab = $_POST['t_hab'];
$c_extra = $_POST['c_extra'];
$n_acomp = $_POST['n_acomp'];
$nom_acom_1 = $_POST['nom_acom_1'];
$ape_acom_1 = $_POST['ape_acom_1'];
$edad_acom_1 = $_POST['edad_acom_1'];
$nom_acom_2 = $_POST['nom_acom_2'];
$ape_acom_2 = $_POST['ape_acom_2'];
$edad_acom_2 = $_POST['edad_acom_2'];
$nom_acom_3 = $_POST['nom_acom_3'];
$ape_acom_3 = $_POST['ape_acom_3'];
$edad_acom_3 = $_POST['edad_acom_3'];

$sql = "INSERT INTO  (usuario, clave, estado, fecha_creacion, fk_id_rol) VALUES ('$usuario', '$contra', 'A','".date('Y-m-d H:i:s')."', '1')";

if (mysql_query($sql,$ln)) {
	$id=mysql_insert_id($ln);
	$sq2 = "INSERT INTO  (nombres, apellidos, email, genero, num_documento, fecha_nacimiento, fk_id_tipo_cliente, fk_id_tipo_documento, fk_id_pais, fk_id_usuario) VALUES ('$nombres', '$apellidos', '$email','$genero', '$num_documento', '$fec_nacimiento', '1','$cmbtipodoc','$cmbpais','$id')";
	mysql_query($sq2,$ln);
	echo "Usted se ha registrado exitosamente";
}else {
	echo "Error en el registro";
}
?>




?>
