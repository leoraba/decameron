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
	$numFactura=$fechaHoyUnido.rand(1000,9999);
	if(mysql_query("INSERT INTO FACTURA(num_factura, fecha_emision, estado, fk_id_tipo_pago, fk_id_cliente_titular)
		VALUES('$numFactura','$fechaHoy','$estadoReserva','$tipoPago','$idClienteTitular')",$ln)){
    	$lastIdFactura=mysql_insert_id($ln);
    	
        
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
    		    mysql_query("INSERT INTO ACOMPANANTE(nombres, apellidos, genero, num_documento, fecha_nacimiento, cuota, fk_id_tipo_documento, fk_id_reserva_habitacion)
                    VALUES('$nombreHuespedHab','$apellidoHuespedHab','$sexoHuespedHab','$docHuespedHab','$fNacimientoHuespedHab','$cuotaHuesped','$tipoDocHuespedHab','$idReserva')",$ln);
            }
        }
    	$success=true;
    }



	$resp=array("success"=>$success);
	echo json_encode($resp);


/*
	Array
(
    [txtFechaInicio] => 28/11/2014
    [txtFechaFin] => 30/11/2014
    [cmbHabitacion] => 2
    [cmbTipoHabitacion1] => Sencilla
    [cmbTipoHabitacion2] => Doble
    [cmbTipoHabitacion3] => Sencilla
    [txtSearchHuesped] => 5
    [cmbHuespedes1] => 1
    [txtNombreHab1Huesped1] => leonardo
    [txtApellidoHab1Huesped1] => rivera
    [sexoHab1Huesped1] => M
    [txtFechaNacimientoHab1Huesped1] => 05/11/2014
    [cmbTipoDocumentoHab1Huesped1] => Pasaporte
    [txtDocumentoHab1Huesped1] => 123455
    [txtNombreHab1Huesped2] => 
    [txtApellidoHab1Huesped2] => 
    [sexoHab1Huesped2] => M
    [txtFechaNacimientoHab1Huesped2] => 
    [cmbTipoDocumentoHab1Huesped2] => Pasaporte
    [txtDocumentoHab1Huesped2] => 
    [txtNombreHab1Huesped3] => 
    [txtApellidoHab1Huesped3] => 
    [sexoHab1Huesped3] => M
    [txtFechaNacimientoHab1Huesped3] => 
    [cmbTipoDocumentoHab1Huesped3] => Pasaporte
    [txtDocumentoHab1Huesped3] => 
    [txtNombreHab1Huesped4] => 
    [txtApellidoHab1Huesped4] => 
    [sexoHab1Huesped4] => M
    [txtFechaNacimientoHab1Huesped4] => 
    [cmbTipoDocumentoHab1Huesped4] => Pasaporte
    [txtDocumentoHab1Huesped4] => 
    [cmbHuespedes2] => 1
    [txtNombreHab2Huesped1] => david
    [txtApellidoHab2Huesped1] => mancia
    [sexoHab2Huesped1] => M
    [txtFechaNacimientoHab2Huesped1] => 27/11/2014
    [cmbTipoDocumentoHab2Huesped1] => Pasaporte
    [txtDocumentoHab2Huesped1] => 1231222
    [txtNombreHab2Huesped2] => 
    [txtApellidoHab2Huesped2] => 
    [sexoHab2Huesped2] => M
    [txtFechaNacimientoHab2Huesped2] => 
    [cmbTipoDocumentoHab2Huesped2] => Pasaporte
    [txtDocumentoHab2Huesped2] => 
    [txtNombreHab2Huesped3] => 
    [txtApellidoHab2Huesped3] => 
    [sexoHab2Huesped3] => M
    [txtFechaNacimientoHab2Huesped3] => 
    [cmbTipoDocumentoHab2Huesped3] => Pasaporte
    [txtDocumentoHab2Huesped3] => 
    [txtNombreHab2Huesped4] => 
    [txtApellidoHab2Huesped4] => 
    [sexoHab2Huesped4] => M
    [txtFechaNacimientoHab2Huesped4] => 
    [cmbTipoDocumentoHab2Huesped4] => Pasaporte
    [txtDocumentoHab2Huesped4] => 
    [btnGuardarHabitacion2] => 
    [cmbHuespedes3] => 1
    [txtNombreHab3Huesped1] => 
    [txtApellidoHab3Huesped1] => 
    [sexoHab3Huesped1] => M
    [txtFechaNacimientoHab3Huesped1] => 
    [cmbTipoDocumentoHab3Huesped1] => Pasaporte
    [txtDocumentoHab3Huesped1] => 
    [txtNombreHab3Huesped2] => 
    [txtApellidoHab3Huesped2] => 
    [sexoHab3Huesped2] => M
    [txtFechaNacimientoHab3Huesped2] => 
    [cmbTipoDocumentoHab3Huesped2] => Pasaporte
    [txtDocumentoHab3Huesped2] => 
    [txtNombreHab3Huesped3] => 
    [txtApellidoHab3Huesped3] => 
    [sexoHab3Huesped3] => M
    [txtFechaNacimientoHab3Huesped3] => 
    [cmbTipoDocumentoHab3Huesped3] => Pasaporte
    [txtDocumentoHab3Huesped3] => 
    [txtNombreHab3Huesped4] => 
    [txtApellidoHab3Huesped4] => 
    [sexoHab3Huesped4] => M
    [txtFechaNacimientoHab3Huesped4] => 
    [cmbTipoDocumentoHab3Huesped4] => Pasaporte
    [txtDocumentoHab3Huesped4] => 
)
*/
	
}