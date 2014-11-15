<?php
include("../includes/conexion.php");
$from = $_POST['from'];
$to = $_POST['to'];
$n_habitaciones = $_POST['n_habitaciones'];
$t_hab = $_POST['t_hab'];


$sql = "SELECT COUNT(id_reserva_habitacion) FROM RESERVA_HABITACION WHERE fecha_inicio >= $from AND fecha_fin <= $to AND fk_id_tipo_habitacion=$t_hab";
$sq2 = "SELECT COUNT(id_habitacion) FROM HABITACION WHERE fk_id_tipo_habitacion =$t_hab AND estado_habitacion='d' ";

$qr1=mysql_query($sq1,$ln);
$row_reserva=mysql_fetch_array($qr1);
$resultado_reserva=$row_reserva[0];

$qr2=mysql_query($sq2,$ln);
$row_habitacion=mysql_fetch_array($qr1);
$resultado_habitacion=$row_habitacion[0];

if($resultado_reserva>=$resultado_habitacion){
	echo "no hay disponibles";
} else {
	echo "si hay disponibles";
}

?>