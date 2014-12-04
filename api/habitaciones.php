<?php
$success=false;
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$accion=$_REQUEST['accion'];
	if($accion=="checkin"){
		$idReserva=$_POST['idReservaCheckin'];
		$habitacion=$_POST['cmbHabitacion'];
		$fechaHoy=date("Y-m-d H:i:s");
		mysql_query("UPDATE RESERVA_HABITACION SET checkin='$fechaHoy', id_habitacion='$habitacion'  WHERE id_reserva_habitacion='$idReserva'",$ln);
		mysql_query("UPDATE HABITACION SET estado_habitacion='o' WHERE id_habitacion='$habitacion'");
		$success=true;
	}else if($accion=="estadoHabitaciones"){
		file_put_contents("../arduino.text", "");
		$qrHab=mysql_query("SELECT estado_habitacion, num_habitacion FROM HABITACION ORDER BY num_habitacion ASC limit 8",$ln);
		while($rowHab=mysql_fetch_array($qrHab)){
			$estado=$rowHab['estado_habitacion'];
			$numHab=$rowHab['num_habitacion'];
			$nuevoEstado="";
			if($numHab==1){
				if(strtolower($estado)=="d") $nuevoEstado=1;
				else if(strtolower($estado)=="f") $nuevoEstado=2;
				else if(strtolower($estado)=="o") $nuevoEstado=3;
			}else if($numHab==2){
				if(strtolower($estado)=="d") $nuevoEstado=4;
				else if(strtolower($estado)=="f") $nuevoEstado=5;
				else if(strtolower($estado)=="o") $nuevoEstado=6;
			}else if($numHab==3){
				if(strtolower($estado)=="d") $nuevoEstado=7;
				else if(strtolower($estado)=="f") $nuevoEstado=8;
				else if(strtolower($estado)=="o") $nuevoEstado=9;
			}else if($numHab==4){
				if(strtolower($estado)=="d") $nuevoEstado=10;
				else if(strtolower($estado)=="f") $nuevoEstado=11;
				else if(strtolower($estado)=="o") $nuevoEstado=12;
			}else if($numHab==5){
				if(strtolower($estado)=="d") $nuevoEstado=13;
				else if(strtolower($estado)=="f") $nuevoEstado=14;
				else if(strtolower($estado)=="o") $nuevoEstado=15;
			}else if($numHab==6){
				if(strtolower($estado)=="d") $nuevoEstado=16;
				else if(strtolower($estado)=="f") $nuevoEstado=17;
				else if(strtolower($estado)=="o") $nuevoEstado=18;
			}else if($numHab==7){
				if(strtolower($estado)=="d") $nuevoEstado=19;
				else if(strtolower($estado)=="f") $nuevoEstado=20;
				else if(strtolower($estado)=="o") $nuevoEstado=21;
			}else if($numHab==8){
				if(strtolower($estado)=="d") $nuevoEstado=22;
				else if(strtolower($estado)=="f") $nuevoEstado=23;
				else if(strtolower($estado)=="o") $nuevoEstado=24;
			}
			file_put_contents("../arduino.text", "$nuevoEstado\n",FILE_APPEND);
			chmod("../arduino.text", 0777);
		}
	}else if($accion=="elim"){
		$idReserva=$_GET['id'];
		mysql_query("DELETE FROM ACOMPANANTE WHERE fk_id_reserva_habitacion='$idReserva'",$ln);
		mysql_query("DELETE FROM RESERVA_HABITACION WHERE id_reserva_habitacion='$idReserva'",$ln);
		$success=true;
	}else if($accion=="checkout"){
		$idReserva=$_GET['id'];
		$fechaHoy=date("Y-m-d H:i:s");
		mysql_query("UPDATE RESERVA_HABITACION SET checkout='$fechaHoy' WHERE id_reserva_habitacion='$idReserva'",$ln);
		$qrIdFactura=mysql_query("SELECT fk_id_factura FROM RESERVA_HABITACION WHERE id_reserva_habitacion='$idReserva'",$ln);
		$rwFactura=mysql_fetch_array($qrIdFactura);
		$idFactura=$rwFactura['fk_id_factura'];
		mysql_query("UPDATE FACTURA SET estado='C' WHERE id_factura='$idFactura'",$ln);
		$success=true;
	}

}
$resp=array("success"=>$success);
echo json_encode($resp);
?>