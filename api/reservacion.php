<?php
if(isset($_REQUEST)){
    include("../includes/conexion.php");
    $success=false;

    function generateRandomString() {
        $length = 6;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function toSqlDateFormat($ff){
        list($d,$m,$a)=explode("/",$ff);
        $cad=$a."-".$m."-".$d;
        return $cad;
    }

    function getCuotaHuesped($finicio,$ffinal,$arrDescuento,$tipo_huesped,$tarifas){
        $begin=$finicio;
        $cuotaFinal=0;
        while($begin<$ffinal){
            $esteDiaEs=date("N",strtotime($begin));
            $cuotaEstandar=0;
            $factorDescuento=1;
            foreach($tarifas as $tarifa){
                if($tarifa['dia']=="$esteDiaEs" && $tarifa['tipo_huesped']=="$tipo_huesped"){
                    $cuotaEstandar=$tarifa['precio_regular'];
                    continue;
                }
            }
            foreach($arrDescuento as $descuento){
                if($descuento['fecha_inicio']<=$begin && $descuento['fecha_fin']>=$begin && $descuento['tipo_huesped']=="$tipo_huesped"){
                    $factorDescuento=$descuento['porcentaje_descuento'];
                    continue;
                }
            }
            $cuotaFinal+=$cuotaEstandar*$factorDescuento;
            $begin=date("Y-m-d",strtotime("+1 day",strtotime($begin)));
        }
        return $cuotaFinal;
    }

    function edad($fNacimiento){
        list($anio,$mes,$dia) = explode("/",$fNacimiento);
        $anio_dif = date("Y") - $anio;
        $mes_dif = date("m") - $mes;
        $dia_dif = date("d") - $dia;
        if ($dia_dif < 0 || $mes_dif < 0) $anio_dif--;
        return $anio_dif;
    }
	
	$fechaInicio=toSqlDateFormat($_POST['txtFechaInicio']);
	$fechaFin=toSqlDateFormat($_POST['txtFechaFin']);
	$fechaHoyUnido=date('Ymd');
	$fechaHoy=date('Y-m-d H:i:s');
	$idDescuento="1";
	$idClienteTitular=$_POST['txtSearchHuesped'];
	$estadoReserva="R";
	$tipoPago="1";
	$cantHabitaciones=$_POST['cmbHabitacion'];

    $qrDescuento=mysql_query("SELECT fecha_inicio, fecha_fin, porcentaje_descuento, tipo_huesped FROM DESCUENTO_HABITACION WHERE estado='A'",$ln);
    $arrayDescuento=array();
    while($rwDescuento=mysql_fetch_array($qrDescuento)){
        $arrayDescuento[]=array("fecha_inicio"=>$rwDescuento['fecha_inicio'], "fecha_fin"=>$rwDescuento['fecha_fin'], "porcentaje_descuento"=>$rwDescuento['porcentaje_descuento'], "tipo_huesped"=>$rwDescuento['tipo_huesped']);
    }
    $qrTarifas=mysql_query("SELECT dia, precio_regular, tipo_huesped FROM TARIFA",$ln);
    $arrayTarifas=array();
    while($rwTar=mysql_fetch_array($qrTarifas)){
        $arrayTarifas[]=array("dia"=>$rwTar['dia'], "precio_regular"=>$rwTar['precio_regular'], "tipo_huesped"=>$rwTar['tipo_huesped']);
    }
	//ingresar factura
    $totaCosto=0;
	$numFactura=$fechaHoyUnido.rand(1000,9999);
	if(mysql_query("INSERT INTO FACTURA(num_factura, fecha_emision, estado, fk_id_tipo_pago, fk_id_cliente_titular)
		VALUES('$numFactura','$fechaHoy','$estadoReserva','$tipoPago','$idClienteTitular')",$ln)){
    	$lastIdFactura=mysql_insert_id($ln);
    	
        $costoTotalHabitacion=0;
    	for($i=1;$i<=$cantHabitaciones;$i++){
    		$codRandReserva=generateRandomString();
            $tipoHab=$_POST["cmbTipoHabitacion".$i];
    		mysql_query("INSERT INTO RESERVA_HABITACION(fecha_reservacion, fecha_inicio, fecha_fin, codigo_reserva, costo, fk_id_factura, fk_id_descuento_habitacion, fk_id_cliente_titular, fk_id_tipo_habitacion)
    			VALUES('$fechaHoy','$fechaInicio','$fechaFin','$codRandReserva','0','$lastIdFactura','1','$idClienteTitular','$tipoHab')",$ln);
    		$idReserva=mysql_insert_id($ln);

            $cantHuespedesXHab=$_POST['cmbHuespedes'.$i];
            for($j=1;$j<=$cantHuespedesXHab;$j++){
                $nombreHuespedHab=$_POST['txtNombreHab'.$i.'Huesped'.$j];
                $apellidoHuespedHab=$_POST['txtApellidoHab'.$i.'Huesped'.$j];
                $sexoHuespedHab=$_POST['sexoHab'.$i.'Huesped'.$j];
                $fNacimientoHuespedHab=toSqlDateFormat($_POST['txtFechaNacimientoHab'.$i.'Huesped'.$j]);
                $tipoDocHuespedHab=$_POST['cmbTipoDocumentoHab'.$i.'Huesped'.$j];
                $docHuespedHab=$_POST['txtDocumentoHab'.$i.'Huesped'.$j];
                $edad=edad($fNacimientoHuespedHab);
                $tipo_huesped=($edad>=18)?"A":"N";
                $cuotaHuesped=getCuotaHuesped($fechaInicio,$fechaFin,$arrayDescuento,$tipo_huesped,$arrayTarifas);
                $costoTotalHabitacion+=$cuotaHuesped;
                mysql_query("INSERT INTO ACOMPANANTE(nombres, apellidos, genero, num_documento, fecha_nacimiento, cuota, fk_id_tipo_documento, fk_id_reserva_habitacion)
                    VALUES('$nombreHuespedHab','$apellidoHuespedHab','$sexoHuespedHab','$docHuespedHab','$fNacimientoHuespedHab','$cuotaHuesped','$tipoDocHuespedHab','$idReserva')",$ln);
            }
            $totaCosto+=$costoTotalHabitacion;
            mysql_query("UPDATE RESERVA_HABITACION SET costo='$costoTotalHabitacion' WHERE id_reserva_habitacion='$idReserva'",$ln);
        }
        mysql_query("UPDATE FACTURA SET total_costo='$totalCosto', subtotal_costo_habitacion='$totalCosto' WHERE id_factura='$lastIdFactura'",$ln);
    	$success=true;
    }



	$resp=array("success"=>$success);
	echo json_encode($resp);