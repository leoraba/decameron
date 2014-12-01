<?php
include("includes/conexion.php");

echo $_POST['n_acomp'];
/*
$desde = $_POST['from1'];
$hasta = $_POST['to1'];
$t_hab = $_POST['t_hab'];
$c_extra = $_POST['c_extra'];
$n_acomp = $_POST['n_acomp'];
$t_balcon = $_POST['t_balcon'];
$n_acomp = $_POST['n_acomp']; 
$nom_acom_1 = $_POST['nom_acom_1'];
$ape_acom_1 = $_POST['ape_acom_1'];
$genero_acom_1 = $_POST['genero1'];
$cmbTipoDocumento1 = $_POST['cmbTipoDocumento1'];
$num_documento_acomp_1 = $_POST['num_documento_acomp_1'];
$edad_acom_1 = $_POST['edad_acom_1'];
$nom_acom_2 = $_POST['nom_acom_2'];
$ape_acom_2 = $_POST['ape_acom_2'];
$genero_acom_2 = $_POST['genero2'];
$cmbTipoDocumento2 = $_POST['cmbTipoDocumento2'];
$num_documento_acomp_2 = $_POST['num_documento_acomp_2'];
$edad_acom_2 = $_POST['edad_acom_2'];
$nom_acom_3 = $_POST['nom_acom_3'];
$ape_acom_3 = $_POST['ape_acom_3'];
$genero_acom_3 = $_POST['genero3'];
$cmbTipoDocumento3 = $_POST['cmbTipoDocumento3'];
$num_documento_acomp_2 = $_POST['num_documento_acomp_2'];
$edad_acom_3 = $_POST['edad_acom_3'];
$nom_acom_4 = $_POST['nom_acom_4'];
$ape_acom_4 = $_POST['ape_acom_4'];
$genero_acom_4 = $_POST['genero4'];
$cmbTipoDocumento4 = $_POST['cmbTipoDocumento4'];
$num_documento_acomp_4 = $_POST['num_documento_acomp_4'];
$edad_acom_4 = $_POST['edad_acom_4'];
$preciototal = $_POST['preciototal'];

function generateRandomString() {
        $length = 6;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

function insertar(){

if ($n_acomp = 1){
$sql = "INSERT INTO  reserva_habitacion VALUES ('".date('Y-m-d H:i:s')."', '$desde', '$hasta','".generateRandomString()."', '$preciototal','$desde','$hasta','$c_extra')";
$sq2 = "INSERT INTO  acompanante VALUES ('$nom_acom_1', '$ape_acom_1','$genero_acom_1', '$num_documento_acomp_1','".date('Y-m-d H:i:s')."','$preciototal')";
echo "Se ha realizado la reserva exitosamente";
} else if ($n_acomp = 2){
echo "no ha realizado la reserva exitosamente";
} else if ($n_acomp = 3){
echo "no ha realizado la reserva exitosamente";
} else ($n_acomp = 4) {
echo "no ha realizado la reserva exitosamente";
 }
}

if (mysql_query($sql,$ln)) {
	$id=mysql_insert_id($ln);
	$sq2 = "INSERT INTO  (nombres, apellidos, email, genero, num_documento, fecha_nacimiento, fk_id_tipo_cliente, fk_id_tipo_documento, fk_id_pais, fk_id_usuario) VALUES ('$nombres', '$apellidos', '$email','$genero', '$num_documento', '$fec_nacimiento', '1','$cmbtipodoc','$cmbpais','$id')";
	mysql_query($sq2,$ln);
	echo "Se ha realizado la reserva exitosamente";
}else {
	echo "Error al realizar la reserva, verifique los valores ingresados";
}*/
?>

